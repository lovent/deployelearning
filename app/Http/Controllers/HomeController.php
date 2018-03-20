<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $top_teacher = Teacher::where('active', 1)->orderBy('experience', 'DESC')->paginate(8);

        return view('pages.home', compact('top_teacher'));
    }

    public function changeLanguage(Request $request)
    {
    \Session::put('website_language', $request->language);

    return redirect()->back();
    }
}
