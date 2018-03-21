<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;
use Auth;

class CommentController extends Controller
{
    public function postComment($id , Request $request)
    {
        $comment = new Rate;
        $comment->point = $request->point;
        $comment->lophoc_id = $id;
        $comment->user_id = Auth::user()->id;
        $comment->content = $request->comment;
        $comment->save();

        return redirect("class_detail/$id", compact('comments'));
    }

    public function list(Lophoc $lid)
    {
        $lophoc = Lophoc::where('id', '=', $id);
        $rates = Rate::where('lophoc_id', $id->id)->join('users', 'user_id', '=', 'users.id')->paginate(10);

        return view('admin.rate.list', compact('rates'));
    }

}
