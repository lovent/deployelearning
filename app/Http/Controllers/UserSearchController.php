<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class UserSearchController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('usersearch')){
            $users = User::search($request->studentsearch)->where('active', 1)->paginate(10);
        }
        // 
        // else{
        //     return 'Không có kết quả tương ứng';
        // }
        return view('admin.student.student-search', compact('users'));
    }
}
