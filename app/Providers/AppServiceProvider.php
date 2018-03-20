<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Booking;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('header', function(){
            if(Session('booking')){
                $oldBooking = Session::get('booking');
                $booking = new Booking($oldBooking);
            }
            $view->with(['booking'=>Session::get('booking'), 'lophoc_booking'=>$booking->items, 'totalPrice'=>$booking->totalPrice, 'totalQty'=>$booking->totalQty]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
