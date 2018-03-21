<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rate;
use App\Models\Lophoc;

class AdminRateController extends Controller
{
    public function index()
    {
    	$lophocs = Lophoc::select('*', 'avg($point)')
                        ->withcount('rates')
                        ->paginate(10);
        
        return view('admin.rate.index', compact('lophocs'));
    }

    public function destroy($id)
    {
        $rate = Rate::find($id);
        $rate->delete();

        return redirect('/adminrate')->with('Successfully!');
    }
}
