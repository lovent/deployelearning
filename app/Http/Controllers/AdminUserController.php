<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Scopes\ActiveScope;
use App\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::select('*', 'users.id as uid', 'schools.id as sid')
                    ->join('schools', 'school_id', '=', 'schools.id')->where('active', 1)
                    ->orderBy('users.updated_at', 'DESC')->paginate(10);

        return view('admin.user.index', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/student')->with('Successfully!');
    }
}
