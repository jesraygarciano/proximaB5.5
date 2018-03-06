<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use App\InternshipApplication;

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

    public function userItpProfile(){

        $applications = \Auth::user()->intershipApplication()->get();

        return view('intership-training-programming.applicant.profile', compact('applications'));
    }

    public function json_get_application_datatable(Request $requests){
        $ids = \Auth::user()->intershipApplication()->pluck('internship_applications.id');

        // return Datatables::of($companies)->make(true);
        return Datatables::of(InternshipApplication::query()->leftJoin('users','users.id','=','internship_applications.user_id')
            ->select(['internship_applications.id',\DB::raw('concat(users.f_name," ",users.l_name) as applicant_name'),'school','preffered_training_date','course'])->whereIn('internship_applications.id',$ids))
        ->make(true);
    }
}
