<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Lophoc;
use Session;
use App\User;
use Auth;

class BookingController extends Controller
{
    public function pendingbook()
    {
    	$bookings = Booking::select('*', 'bookings.id as bid', 'bookings.created_at as bcreated_at', 'bookings.updated_at as bupdated_at')
                            ->join('lophocs', 'bookings.lophoc_id', '=', 'lophocs.id')
                            ->join('users', 'user_id', '=', 'users.id')
                            ->where('bookings.status', 0)
                            ->orderBy('bcreated_at', 'DESC')
                            ->paginate(10);

        return view('admin.booking.pending', compact('bookings'));
    }

    public function confirm(Booking $bid)
    {
    	$booking = Booking::where('id', '=', $bid->id)
    						->update(['status'=>1]);

    	return redirect('/adminbooking');
    }

    public function addbook($id, Request $request)
    {
        $booking = new Booking;
        $booking->lophoc_id = $id;
        $booking->user_id = Auth::user()->id;
        $booking->save();

        return redirect('/home');
    }

    public function addtocart($id, Request $request)
    {
        $lophoc = Lophoc::find($id);
        $oldbooking = Session('booking')?Session::get('booking'):null;
        $booking = new Booking($oldbooking);
        $booking->add($lophoc, $id);
        $request->session()->put('booking', $booking);

        return redirect()->back();

    }

    public function list(Lophoc $lid)
    {
        $lophoc = Lophoc::where('lophoc_id as sid', '=', $lid);
        $bookings = Booking::select('*', 'bookings.id as bid', 'users.id as uid')
                            ->join('users', 'user_id', '=', 'users.id')
                            ->where('lophoc_id', $lid->id)
                            ->where('status', '=', '1')
                            ->orderBy('uid')
                            ->paginate(10);

        return view('admin.booking.list', compact('bookings'));
    }
}
