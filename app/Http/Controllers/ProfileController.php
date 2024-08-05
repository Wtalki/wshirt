<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //profile
    function profile(){
        return view('profile.profile');
    }

    function editProfile(){
        return view('profile.editProfile');
    }
    function profileEdit(Request $request){
        $data = $this->getProfileData($request);
        if($request->hasFile('image')){
            $oldImage = User::where('id', Auth::user()->id)->first();
            $oldImage = $oldImage->image;
            if($oldImage != null){
                Storage::delete('public/' . $oldImage);
            }
            $fileName =uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $fileName);
            $data['image'] = $fileName;

        }
        User::where('id',Auth::user()->id)->update($data);
        return to_route('profile');
    }

    //password change page
    function passwordChangePage(){
        return view('profile.passwordChange');
    }
    //password change
    function passwordChange(Request $request){
        $user = User::select('password')->where('id',Auth::user()->id)->first();
        $dbHash = $user->password;
        if(Hash::check($request->oldPassword,$dbHash)){
            $data = ['password' => Hash::make($request->newPassword)];

            User::where('id', Auth::user()->id)->update($data);
            return back()->with([
                'success' => 'password changee successfully'
            ]);
        }
        return back()->with(['notMatch' => 'the old password does not match']);
    }

    //get profile data
    private function getProfileData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
    }
}