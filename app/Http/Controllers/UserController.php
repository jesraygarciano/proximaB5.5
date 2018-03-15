<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Resume;
use App\Resume_skill;
use App\Libs\Common;
use App\Experience;
use App\Education;

class UserController extends Controller
{
    public function profile(Request $requests)
    {
    	$user = \Auth::user();
        $resume = $user->resume()->first();
        $skill_ids = $resume->skills()->pluck('resume_skill_id');

        $skills = $resume->has_skill()->get();
        return view('profile.index', compact('resume', 'user', 'skill_ids', 'skills'));
    }

    public function resume_create(Request $requests){
    	$user = \Auth::user();
        $skills = Resume_skill::all();

    	return view('profile.resume_create', compact('user', 'skills'));
    }

    public function resume_edit(Request $requests){
        $user = \Auth::user();
        $skills = Resume_skill::all();
        $resume = Common::get_master_resume();
        $educations = $resume->educations()->get();
        $experiences = $resume->experiences()->get();
        $cr = $resume->character_references()->get();
        if($resume){
            $languages_ids = $resume->has_skill()->get()->pluck('id')->toArray();
        }else{
            $resume = new Resume;
            $languages_ids = array();
        }

        return view('profile.resume_edit', compact('user', 'skills', 'resume', 'languages_ids', 'educations', 'experiences', 'cr'));

    }

    public function resume_save(Request $request)
    {

        // dd($request->skills);
        $this->validate($request, [
            'f_name' => 'required',
            'l_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'birth_date' => 'required',
            'photo' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postal' => 'required',
            'spoken_language' => 'required',
            // 'ed_university' => 'required',
            // 'ed_from_month' => 'required',
            // 'ed_from_year' => 'required',
            // 'ed_to_month' => 'required',
            // 'ed_to_year' => 'required',
            'summary' => 'required',
            'objective' => 'required',
            'cr_company' => 'required',
            'cr_name' => 'required',
            'cr_phone_number' => 'required',
            // 'picture' => 'required',
        ],
        [
            'f_name.required' => 'Please enter your first name',
            'l_name.required' => 'Please enter your last name',
            'phone_number.required' => 'Please enter your valid phone number',
            'email.required' => 'Please enter valid email address',
            'birth_date.required' => 'Please enter your birthdate',
            'photo.required' => 'Photo required',
            'address1.required' => 'Please enter your first address',
            'address2.required' => 'Please enter your secondary address',
            'city.required' => 'Please enter your city',
            'country.required' => 'Please enter your country',
            'postal.required' => 'Please enter your postal',
            'spoken_language.required' => 'Please enter your spoken language',
            // 'ed_university.required' => 'Please enter your university',
            // 'ed_from_month.required' => 'month start',
            // 'ed_from_year.required' => 'year start',
            // 'ed_to_month.required' => 'month end',
            // 'ed_to_year.required' => 'year end',
            'summary.required' => 'Skill/Experience Summary required',
            'objective.required' => 'Objective required',
            'cr_company.required' => 'Company / University name required',
            'cr_name.required' => 'Company personnel name required',
            'cr_phone_number.required' => 'Company personnel number required',
        ]);

        $input = $request->except('photo','skills', '_token');
        $resume = $request->resume_id ? Resume::findOrFail($request->resume_id) : Resume::where('user_id',\Auth::user()->id)->first() ?? new Resume;
        $resume->fill($input);
        $resume->m_name = $request->m_name ?? '';
        $resume->other_skills = $request->other_skills ?? '';
        $resume->websites = $request->websites ?? '';
        $resume->seminars_attended = $request->seminars_attended ?? '';
        $resume->awards = $request->awards ?? '';
        $resume->save();

        if($request->photo){
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->photo));
            // $fileNameToStore = time().'.png';
            $fileNameToStore = Common::resume_photo_name($resume->id);
            file_put_contents(public_path('/storage/').$fileNameToStore, $data);
        	$resume->photo = $fileNameToStore;
        	$resume->save();
        }

        if ($request->ex_company){
            $experience = new Experience;
            $experience->resume_id = $resume->id;
            $experience->fill($input)->save();
        }

        $education = new Education;
        $education->resume_id = $resume->id;
        $education->fill($input)->save();


        if ($request->has('skills')) {
            $resume_skill_ids = $request->input('skills');
            foreach($resume_skill_ids as $resume_skill_id) {
                $resume->has_skill()->attach($resume_skill_id);
            }
        }
        return redirect(route('user_profile'))->with('success', 'Registered you resume.');
    }

    public function resume_save_edit(Request $request)
    {

        $this->validate($request, [
            'f_name' => 'required',
            'l_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'birth_date' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postal' => 'required',
            'spoken_language' => 'required',
            // 'ed_university' => 'required',
            // 'ed_from_month' => 'required',
            // 'ed_from_year' => 'required',
            // 'ed_to_month' => 'required',
            // 'ed_to_year' => 'required',
            'summary' => 'required',
            'objective' => 'required',
            // 'cr_company' => 'required',
            // 'cr_name' => 'required',
            // 'cr_phone_number' => 'required',
            // 'picture' => 'required',
        ],
        [
            'f_name.required' => 'Please enter your first name',
            'l_name.required' => 'Please enter your last name',
            'phone_number.required' => 'Please enter your valid phone number',
            'email.required' => 'Please enter valid email address',
            'birth_date.required' => 'Please enter your birthdate',
            'address1.required' => 'Please enter your first address',
            'address2.required' => 'Please enter your secondary address',
            'city.required' => 'Please enter your city',
            'country.required' => 'Please enter your country',
            'postal.required' => 'Please enter your postal',
            'spoken_language.required' => 'Please enter your spoken language',
            // 'ed_university.required' => 'Please enter your university',
            // 'ed_from_month.required' => 'month start',
            // 'ed_from_year.required' => 'year start',
            // 'ed_to_month.required' => 'month end',
            // 'ed_to_year.required' => 'year end',
            'summary.required' => 'Skill/Experience Summary required',
            'objective.required' => 'Objective required',
            // 'cr_company.required' => 'Company / University name required',
            // 'cr_name.required' => 'Company personnel name required',
            // 'cr_phone_number.required' => 'Company personnel number required',
        ]);

        $input = $request->except('photo', 'skills', '_token');
        $resume = Resume::findOrFail($request->resume_id);

        if($request->photo){
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->photo));
            $fileNameToStore = Common::resume_photo_name($resume->id);
            file_put_contents(public_path('/storage/').$fileNameToStore, $data);
            $resume->photo = $fileNameToStore;
        }

        // $resume->photo = $fileNameToStore;

        $resume->fill($input)->save();

        $resume->has_skill()->detach();
        $resume_skill_ids = $request->input('skills');
        foreach($resume_skill_ids as $resume_skill_id){
            $resume->has_skill()->attach($resume_skill_id);
        }

        return redirect(route('user_profile'))->with('success', 'Resume updated.');
    }
}
