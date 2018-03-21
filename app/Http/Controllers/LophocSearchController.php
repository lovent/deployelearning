<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Lophoc;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LophocSearchController extends Controller
{
    public function list(Teacher $tid)
    {   
        $teacher = Teacher::where('id', '=', $tid);
        $lophocs = Lophoc::select('*', 'lophocs.id as lid')
                        ->join('teachers', 'lophocs.teacher_id', '=', 'teachers.id')
                        ->where('lophocs.teacher_id', $tid->id)
                        ->orderBy('status')
                        ->paginate(10);

        return view('admin.class.index', compact('lophocs'));
    }

    public function index(Request $request)
    {
        if($request->has('lophocsearch')){
            $lophocs = Lophoc::search($request->lophocsearch)->paginate(10);
        }
        // 
        // else{
        //     return 'Không có kết quả tương ứng';
        // }

        return view('admin.class.lophoc-search', compact('lophocs'));
    }
}
