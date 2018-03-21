<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Database\Query\Builder;
use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller
{
    public function banedstudent()
    {
    	$users = User::select('*', 'users.id as uid', 'users.updated_at as uupdated_at')
                    ->join('schools', 'school_id', '=', 'schools.id')
                    ->where('active', 0)
                    ->orderBy('uupdated_at', 'DESC')
                    ->paginate(10);

        return view('admin.user.baned', compact('users'));
    }

    public function baned(User $uid)
    {
    	$user = User::where('id', '=', $uid->id)
    						->update(['active'=>0]);

    	return redirect('/banedstudent');
    }

    public function unbaned(User $uid)
    {
    	$user = User::where('id', '=', $uid->id)
    						->update(['active'=>1]);

    	return redirect('/adminuser');
    }

    public function settings($id)
    {
        $setting = User::find($id);
        $booking = DB::table('bookings')
                        ->join('users', 'bookings.user_id', '=', 'users.id')
                        ->join('lophocs', 'bookings.lophoc_id', '=', 'lophocs.id')
                        ->where('user_id', '=', $id)
                        ->where('bookings.status', '=', 1)
                        ->get();
        //dd($booking)
        return view('pages.user_settings', compact('setting', 'booking'));
    }

    public function edit_user($id, Request $request)
    {
        $info = DB::table('users')
                    ->where('id', '=', $id)
                    ->update([
                    'user_name'=>$request->user_name,
                    'email'=>$request->email,
                    'address'=>$request->address,
                    'phone_number'=>$request->Phone_number
                ]);

        return redirect("settings/$id");        
    }
}
