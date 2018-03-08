<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use App\InternshipApplication;
use App\TrainingBatch;

class InternshipController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function create(Request $requests){

        $batch = TrainingBatch::all();

        $student = $requests->id ? InternshipApplication::find($requests->id) : false;

        return view('intership-training-programming.applicant.create', compact('batch','student'));

    }

    public function json_delete_application( Request $requests ){
        InternshipApplication::find($requests->id)->delete();

        return 'deleted';
    }

    public function userItpProfile(){

        $applications = \Auth::user()->intershipApplication()->get();

        return view('intership-training-programming.applicant.profile', compact('applications'));
    }

    public function save_application(Request $requests){


        if (!$requests->has('skills')) {
            $requests->skills = "";
        }

        $this->validate($requests,[
            'skills' => 'required',
            'objective' => 'required',
            'school' => 'required',
            'course' => 'required',
            'batch' => 'required',
        ]);

        $application;   
        if($requests->id){
            $application = InternshipApplication::find($requests->id);
            $application->update([
                'objectives'=>$requests->objective,
                'school'=>$requests->school,
                'course'=>$requests->course,
                'training_batch_id'=>$requests->batch
            ]);
        }
        else
        {
            $application = InternshipApplication::create([
                'user_id'=>\Auth::user()->id,
                'objectives'=>$requests->objective,
                'school'=>$requests->school,
                'course'=>$requests->course,
                'training_batch_id'=>$requests->batch
            ]);
        }

        foreach ($requests->skills as $skill) {
            if (! $application->skills->contains($skill)) {
                $application->skills()->attach($skill);
            }
        }

        return redirect()->route('itp_applicant_profile');

    }

    public function json_get_application_datatable(Request $requests){
        $ids = \Auth::user()->intershipApplication()->pluck('internship_applications.id');

        // return Datatables::of($companies)->make(true);
        return Datatables::of(InternshipApplication::query()->leftJoin('users','users.id','=','internship_applications.user_id')
            ->leftJoin('training_batches','training_batches.id','=','internship_applications.training_batch_id')
            ->select(['internship_applications.id', \DB::raw('training_batches.name as batch_name'),\DB::raw('concat(users.f_name," ",users.l_name) as applicant_name'),'school','course'])->whereIn('internship_applications.id',$ids))
        ->filterColumn('batch_name', function($query, $keyword) {
            $query->whereRaw('training_batches.name like', ["%{$keyword}%"]);
        })
        ->make(true);
    }
}
