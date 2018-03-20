<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Lophoc;

class TeacherController extends Controller
{
    public function index()
    {
        $top_teacher = Teacher::where('active', 1)->get();
        
        return view('pages.home', compact('top_teacher'));
    }

    public function teacher(Request $request)
    {

        if($request->has('titlesearch')){
            $teachers = Teacher::search($request->titlesearch)
                ->paginate(6);
        } 
        else {
            $teachers = Teacher::orderBy('id', 'DESC')->paginate(6);
        }

        return view('pages.teachers', compact('teachers'));     
    }

    public function teacher_detail($id)
    {
        $id = Teacher::find($id);
        $img = $id->avatar_url;

        $teacher = Teacher::where('id', '=', $id);
        $lophocs = Lophoc::select('*', 'lophocs.id as lid')
                        ->join('teachers', 'lophocs.teacher_id', '=', 'teachers.id')
                        ->where('lophocs.teacher_id', $id->id)
                        ->orderBy('status')
                        ->paginate(10);

        return view('pages.teacher_detail' , compact('id','img', 'lophocs'));
    }
}
