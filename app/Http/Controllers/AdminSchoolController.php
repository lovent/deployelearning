<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\FormRequest;
use App\Http\Controllers\Controller;
use App\Models\School;
use App\User;
use App\Models\Teacher;
use App\Http\Requests\SchoolRequest;
use DB;

class AdminSchoolController extends Controller
{
    public function index()
    {
        $schools = School::orderBy('id')->paginate(10);

        return view('admin.school.index', compact('schools'));
    }

    public function create()
    {
        return view('admin.school.add');
    }

    public function store(SchoolRequest $request)
    {
        $school = new School;
        $school->school_name = $request['school_name'];
        $school->city = $request['city'];
        $school->description = $request['description'];
        $school->save();

        return redirect('/adminschool')->with('Successfully');
    }

    public function edit(School $school)
    {
        return view('admin.school.update')->with(['school'=> $school]);
    }

    public function update(SchoolRequest $request, School $school)
    {
        $school = $this->find($id);
        $school->school_name = $request['school_name'];
        $school->city = $request['city'];
        $school->description = $request['description'];
        $school->update();

        return redirect('/school')->with('Successfully');
    }

    public function destroy($id)
    {
        $school = School::find($id);
        $school->delete();

        return redirect('/adminschool')->with('Successfully!');
    }
}
