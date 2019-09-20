<?php

namespace App\Http\Controllers\user;

use App\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        return view('user.profile.index');
    }

    public function edit() {
        return view('user.profile.form');
    }

    public function update(Request $request) {
        $data = $request->all();
        $user = Auth::user()->fill($data);

        $fileName = $photo = str_replace('.', '_', explode('@', $data['email'])[0]);
        $fileName .= '_'.date('dmYHis').'_'.str_random('5');

        $photoFile = $request->file('upload-photo');
        $photo = null;
        if($photoFile) {
            $photo = 'photo_'.$fileName.'.'.$photoFile->getClientOriginalExtension();
            $photoFile->move(public_path('uploads/photo'), $photo);
        }

        $cvFile = $request->file('upload-cv');
        $cv = null;
        if($cvFile) {
            $cv = 'cv_'.$fileName.'.'.$cvFile->getClientOriginalExtension();
            $cvFile->move(public_path('uploads/cv'), $cv);
        }

        $data = array_merge($data, [
                'user_id' => Auth::user()->id,
                'photo' => $photo,
                'cv' => $cv,
            ]);

        if($user->profile) {
            $profile = $user->profile->update($data);
        } else {
            $profile = Profile::create($data);
        }

        if($user->save() && $profile) {
            return redirect()->route('profile.index');
        } else {
            return view('user.profile.form');
        }
    }
}
