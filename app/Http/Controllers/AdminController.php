<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Lophoc;
use App\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
    	$newTeacher = Teacher::where('created_at', '>=', Carbon::today())->count();
    	$newLophoc = Lophoc::where('created_at', '>=', Carbon::today())->count();
    	$newUser = User::where('created_at', '>=', Carbon::today())->count();

        return view('admin.home.index', compact('newTeacher', 'newLophoc', 'newUser'));
    }
}
