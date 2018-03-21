<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lophoc;
use App\Models\Rate;
use App\User;
use App\Models\Teacher;
use Auth;
use Session;
use Mail;
use DB;

class ClassController extends Controller
{
    public function index()
    {
        return view('admin.class.index');
    }

    public function classes(Request $request)
    {   
        if($request->has('titlesearch')){
            $classes = Lophoc::search($request->titlesearch)
                ->paginate(6);
        } else {
            $classes = Lophoc::where('status', 'Sắp diễn ra')->paginate(6);
        }

        return view('pages.classes',compact('classes', 'teacher'));          
    }

    public function class_detail($id)
    {
        $class = Lophoc::find($id);
        $comments = DB::table('rates')
                        ->select('*', 'comments.id as cid', 'users.id as uid')
                        ->join('users', 'rates.user_id', '=', 'users.id')
                        ->select('rates.*', 'users.user_name')
                        ->where('lophoc_id', '=', $id)
                        ->paginate(4);
        $teacher = Teacher::find($class->teacher_id);
         // dd($teacher);

        return view('pages.class_detail' , compact(
            'class',
            'comments',
            'teacher'
        ));
    }    

    public function show_class_register()
    {
        return view('pages.class_register');
    }    

    public function showSubjectInClass(Request $request)
    {
        if ($request->ajax()) {
            $class_id = $request->class_id;
            $subject = Lophoc::select('subject')->where('id' , '=' ,$class_id)->get();

            return response()->json($subject);
        }       
    }

    public function send_mail(Request $request)
    {
        $input = $request->all();
        Mail::send('mailfb', array('name'=>$input["name"],'email'=>$input["email"], 'content'=>$input['message']), function($message){
            $message->to('tranphuonganh28495@gmail.com', 'Visitor')->subject('Visitor Feedback!');
        });
        Session::flash('flash_message', 'Send message successfully!');
        
        return view('pages.class_register');
    }
}
