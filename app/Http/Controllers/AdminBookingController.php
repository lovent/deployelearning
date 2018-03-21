<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;

class AdminBookingController extends Controller
{
    public function index()
    {
    	$bookings = Booking::select('*', 'bookings.id as bid', 'bookings.created_at as bcreated_at', 'bookings.updated_at as bupdated_at')
    					->join('users', 'user_id', '=', 'users.id')
    					->join('lophocs', 'lophoc_id', '=', 'lophocs.id')
    					->where('bookings.status', 1)
    					->orderBy('bupdated_at', 'DESC')
    					->paginate(10);

        return view('admin.booking.index', compact('bookings'));
    }
}
