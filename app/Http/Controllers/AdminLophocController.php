<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lophoc;
use App\Http\Request\LophocRequest;

class AdminLophocController extends Controller
{
    public function index()
    {
        $lophocs = Lophoc::orderBy('status')->paginate(10);

        return view('admin.class.index', compact('lophocs'));
    }

    public function create()
    {
        return view('admin.class.add');
    }

    public function store(LophocRequest $request)
    {
        $lophoc = new Lophoc();
        $lophoc->lophoc_name = $request['lophoc_name'];
        $lophoc->begin_at = $request['begin_at'];
        $lophoc->number_of_lesson = $request['number_of_lesson'];
        $lophoc->max_slot = $request['max_slot'];
        $lophoc->price = $request['price'];
        $lophoc->save();

        return redirect('/adminlophoc')->with('Successfully!');
    }

    public function edit(Lophoc $lophoc)
    {
        return view('admin.class.update')->with('lophoc', $lophoc);
    }

    public function update(Request $request, $id)
    {
        $lophoc = new Lophoc();
        $lophoc->save();

        return redirect('/adminlophoc')->with('Successfully!');
    }

    public function destroy($id)
    {
        $lophoc = Lophoc::find($id);
        $lophoc->delete();
        
        return redirect('/adminlophoc')->with('Successfully!');
    }
}
