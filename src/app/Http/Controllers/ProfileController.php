<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    //
    public function show()
    {
        $user = auth()->user();

        return view('profile.show', compact('user'));
    }
    public function updateCoverImage(Request $request)
    {
        $request->validate([
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('cover_image');

        $imageName = 'cover_' . Auth::id() . '_' . time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/profile', $imageName);

        Auth::user()->profile->update(['cover_image' => $imageName]);

        return redirect()->back()->with('success', 'Cover image updated successfully.');
    }
    public function updateProfileImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('profile_image');

        $imageName = 'profile_' . Auth::id() . '_' . time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/profile', $imageName);

        Auth::user()->profile->update(['profile_image' => $imageName]);

        return redirect()->back()->with('success', 'You profile image updated successfully.');
    }

    public function addExperience(Request $request)
    {
        $validatedData = $request->validate([
            'companyName' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'startDate' => 'required|date',
            'endDate' => 'nullable|date|after_or_equal:startDate',
            'about' => 'nullable|string',
            'location' => 'required|string|max:255',
            'companyImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profile = auth()->user()->profile;

        $experiences = $profile->experience ?? [];

        $newExperience = [
            'companyName' => $validatedData['companyName'],
            'position' => $validatedData['position'],
            'startDate' => $validatedData['startDate'],
            'endDate' => $validatedData['endDate'],
            'location' => $validatedData['location'],
            'about' => $validatedData['about'],
        ];

        if ($request->hasFile('companyImage')) {
            $imagePath = $request->file('companyImage')->store('company_images', 'public');
            $newExperience['companyImage'] = $imagePath;
        }

        $experiences[] = $newExperience;

        $profile->update(['experience' => $experiences]);

        return redirect()->back()->with('success', 'Experience added successfully');
    }

    public function updateExperience(Request $request)
    {
        $validatedData = $request->validate([
            'editCompanyName' => 'required|string|max:255',
            'editPosition' => 'required|string|max:255',
            'editStartDate' => 'required|date',
            'editEndDate' => 'nullable|date|after_or_equal:editStartDate',
            'editAbout' => 'nullable|string',
            'editLocation' => 'required|string|max:255',
            'editCompanyImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profile = auth()->user()->profile;

        $experiences = $profile->experience ?? [];

        foreach ($experiences as $key => $experience) {
            if ($experience['startDate'] == $request->editStartDate) {

                $experiences[$key]['companyName'] = $validatedData['editCompanyName'];
                $experiences[$key]['position'] = $validatedData['editPosition'];
                $experiences[$key]['startDate'] = $validatedData['editStartDate'];
                $experiences[$key]['endDate'] = $validatedData['editEndDate'];
                $experiences[$key]['about'] = $validatedData['editAbout'];
                $experiences[$key]['location'] = $validatedData['editLocation'];

                if ($request->hasFile('editCompanyImage')) {
                    $imagePath = $request->file('editCompanyImage')->store('company_images', 'public');
                    $experiences[$key]['companyImage'] = $imagePath;
                }
                break;
            }
        }

        $profile->update(['experience' => $experiences]);

        return redirect()->back()->with('success', 'Experience updated successfully');
    }
    public function deleteExperience(Request $request)
    {
        $profile = auth()->user()->profile;

        $experiences = $profile->experience ?? [];

        foreach ($experiences as $key => $experience) {
            if ($experience['startDate'] == $request->editStartDate) {
                // Supprimer l'expérience du tableau des expériences
                unset($experiences[$key]);
                break;
            }
        }

        $profile->update(['experience' => array_values($experiences)]);

        return redirect()->back()->with('success', 'Experience deleted successfully');
    }
    public function addEducation(Request $request)
    {
        $validatedData = $request->validate([
            'institution' => 'required|string|max:255',
            'fieldOfStudy' => 'required|string|max:255',
            'startDate' => 'required|date',
            'endDate' => 'nullable|date|after_or_equal:startDate',
            'description' => 'nullable|string',
            'schoolImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profile = auth()->user()->profile;

        $educations = $profile->education ?? [];

        $newEducation = [
            'institution' => $validatedData['institution'],
            'fieldOfStudy' => $validatedData['fieldOfStudy'],
            'startDate' => $validatedData['startDate'],
            'endDate' => $validatedData['endDate'],
            'description' => $validatedData['description'],
        ];

        if ($request->hasFile('schoolImage')) {
            $imagePath = $request->file('schoolImage')->store('school_images', 'public');
            $newEducation['schoolImage'] = $imagePath;
        }

        $educations[] = $newEducation;

        $profile->update(['education' => $educations]);

        return redirect()->back()->with('success', 'Education added successfully');
    }
    public function updateEducation(Request $request)
    {
        $validatedData = $request->validate([
            'editInstitution' => 'required|string|max:255',
            'editFieldOfStudy' => 'required|string|max:255',
            'editStartDate' => 'required|date',
            'editEndDate' => 'nullable|date|after_or_equal:editStartDate',
            'editDescription' => 'nullable|string',
            'editSchoolImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $profile = auth()->user()->profile;

        $educations = $profile->education ?? [];

        foreach ($educations as $key => $education) {
            if ($education['startDate'] == $request->editStartDate) {

                $educations[$key]['institution'] = $validatedData['editInstitution'];
                $educations[$key]['fieldOfStudy'] = $validatedData['editFieldOfStudy'];
                $educations[$key]['startDate'] = $validatedData['editStartDate'];
                $educations[$key]['endDate'] = $validatedData['editEndDate'];
                $educations[$key]['description'] = $validatedData['editDescription'];


                if ($request->hasFile('editSchoolImage')) {
                    $imagePath = $request->file('editSchoolImage')->store('school_images', 'public');
                    $educations[$key]['schoolImage'] = $imagePath;
                }


                break;
            }
        }

        $profile->update(['education' => $educations]);

        return redirect()->back()->with('success', 'Education updated successfully');
    }
    public function deleteEducation(Request $request)
    {
        $profile = auth()->user()->profile;

        $educations = $profile->education ?? [];

        foreach ($educations as $key => $education) {
            if ($education['startDate'] == $request->editStartDate) {
                // Supprimer l'éducation du tableau des éducations
                unset($educations[$key]);
                break;
            }
        }

        $profile->update(['education' => array_values($educations)]);

        return redirect()->back()->with('success', 'Education deleted successfully');
    }



    public function updateProfileTitle(Request $request)
    {
        $validatedData = $request->validate([
            'newProfileTitle' => 'required|string|max:255',
        ]);

        $user = auth()->user();

        $user->profile->update(['title' => $validatedData['newProfileTitle']]);

        return redirect()->back()->with('success', 'Profile title updated successfully');
    }




    public function updateProfileAbout(Request $request)
    {
        $request->validate([
            'newAboutContent' => 'required|string',
        ]);

        $user = auth()->user();
        $user->profile->about = $request->newAboutContent;
        $user->profile->save();

        return redirect()->back()->with('success', 'About section updated successfully!');
    }

    public function addSkill(Request $request)
    {
        $request->validate([
            'skillName' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        $skills = $user->profile->skills ?? [];

        $skills[] = $request->skillName;

        $user->profile->update([
            'skills' => $skills
        ]);

        return redirect()->back()->with('success', 'Skill added successfully!');
    }

    public function deleteSkill(Request $request)
    {
        $profile = auth()->user()->profile;

        $skills = $profile->skills ?? [];

        if (in_array($request->input('skill'), $skills)) {
            $skills = array_diff($skills, [$request->input('skill')]);
            $profile->update(['skills' => array_values($skills)]);

            return redirect()->back()->with('success', 'Skill deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Skill not found or could not be deleted');
        }
    }


    public function addLanguage(Request $request)
    {

        $user = auth()->user();
        $profile = $user->profile;

        $language = $request->input('language');
        $level = $request->input('level');

        $languages = $profile->languages ?? [];

        $languages[$language] = $level;

        $profile->update(['languages' => $languages]);

        return redirect()->back()->with('success', 'Language added successfully.');
    }
}
