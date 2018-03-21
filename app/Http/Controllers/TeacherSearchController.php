<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\School;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeacherSearchController extends Controller
{
    public function list(School $school_id)
    {   
        $school = School::where('school_id as sid', '=', $school_id);
        $teachers = Teacher::select('*', 'teachers.id as tid', 'teachers.name as tname')
                            ->join('schools', 'teachers.school_id', '=', 'schools.id')
                            ->where('school_id', $school_id->id)
                            ->withcount('lophocs')
                            ->paginate(10);

        return view('admin.teacher.index', compact('teachers'));
    }

    public function index(Request $request)
    {
        if($request->has('teachersearch')){
            $teachers = Teacher::search($request->teachersearch)->orderBy('created_at', 'DESC')->paginate(10);
        }
        // 
        // else{
        //     return 'Không có kết quả tương ứng';
        // }

        return view('admin.teacher.teacher-search', compact('teachers'));
    }
}
