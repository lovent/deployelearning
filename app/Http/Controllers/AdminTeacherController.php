<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\School;
use App\Models\Lophoc;

class AdminTeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::select('*', 'teachers.id as tid')
                            ->join('schools', 'school_id', '=', 'schools.id')
                            ->where('teachers.active', 1)
                            ->withcount('lophocs')
                            ->orderBy('teachers.created_at', 'DESC')
                            ->paginate(10);

        return view('admin.teacher.index', compact('teachers'));
    }

    public function create()
    {   
        return view('admin.teacher.add');
    }

    public function store(Request $request)
    {
        $teacher = new Teacher();
        $teacher = $this->validate($request,[
            'teacher_name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'gender'=>'required',
            'experience'=>'required'
        ]);
        $teacher->save();

        return redirect('/teacher')->with('Successfully');
    }

    public function edit(Teacher $teacher)
    {
        return view('admin.teacher.update')->with('teacher', $teacher);
    }

    public function update(Request $request, $id)
    {
        $teacher = new Teacher();
        $data = $this->validate($request, [
            'teacher_name'=>'required',
            'email'=>'required',
            'experience'=>'required'
        ]);
        $data['id'] = $id;
        $teacher->update($data);
        
        return redirect('/teacher')->with('Successfully!');
    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        
        return redirect('/teacher')->with('Successfully!');
    }
}
