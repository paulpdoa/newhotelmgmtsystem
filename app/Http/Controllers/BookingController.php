<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Room;
use App\Models\Guest;
use App\Models\BookingRoom;
use App\Models\Booking;
use App\Models\PaymentMethod;
use App\Models\Payment;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['store','create']);
    }
    
    public function index(){
        $bookings = Booking::
        join('customers','bookings.customer_id','=','customers.customer_id')
        ->get();
        
        return view('bookings.index',[
            'bookings' => $bookings
        ]); 
    }

    public function create(){

        $bookings = Booking::get();

        $customers = Customer::get();

        $guests = Guest::get();

        $paymentMethods = PaymentMethod::get();

        $rooms = Room::
        join('room_types','rooms.room_type_id','=','room_types.room_type_id')
            ->join('room_prices','rooms.room_price_id','=','room_prices.room_price_id')
                ->join('room_bands','rooms.room_band_id','=','room_bands.room_band_id')
                    ->select('rooms.room_id','room_types.room_type','room_prices.room_price','room_bands.room_description')
                        ->get();

        // get date today
        $today = today()->format('Y-m-d');
        // get time now
        $time = now()->format('h:i:s');

        return view('bookings.create',[
            'customers' => $customers,
            'today' => $today,
            'time' => $time,
            'rooms' => $rooms,
            'guests' => $guests,
            'bookings' => $bookings,
            'paymentMethods' => $paymentMethods
            ]);
    }

    public function store(){
        $bookings = new Booking();

        // $payments = new Payment();
        // $bookingRooms = new BookingRoom();

        // insert into bookings and use bookings table to insert it to the Booking Rooms table

        $bookings->customer_id = request('customerid');
        $bookings->date_booking_made = request('datebookingmade');
        $bookings->time_booking_made = request('timebookingmade');
        $bookings->booked_start_date = request('bookingstartdate');
        $bookings->booked_end_date = request('bookingenddate');
        $bookings->total_payment_due_date = request('totalpaymentduedate');
        $bookings->total_payment_due_amount = request('totalpaymentdueamount');
        $bookings->total_payment_made_on = request('totalpaymentmadeon');
        //insert to payment table
        // $payments->booking_id = request('bookingid');
        // $payments->customer_id = request('customerid');
        // $payments->payment_method_id = request('paymentmethodid');
        // $payments->payment_amount = request('totalpaymentmadeon');

        $bookings->save();

        // $payments->save();

        return redirect('/')->with('mssg','Booking has been confirmed! Please confirm it upon arrival');
    }
    
    public function show($id){
    //    join ko yung bookings sa customers para makita ko kung sino yung customer name sa bookings table
        $bookings = Booking::join('customers','bookings.customer_id','=','customers.customer_id')
        ->findOrFail($id);

        $paymentMethods = PaymentMethod::get();

        $customers = Customer::get();

        $guests = Guest::get();

        $rooms = Room::
        join('room_types','rooms.room_type_id','=','room_types.room_type_id')
            ->join('room_prices','rooms.room_price_id','=','room_prices.room_price_id')
                ->join('room_bands','rooms.room_band_id','=','room_bands.room_band_id')
                    ->select('rooms.room_id','room_types.room_type','room_prices.room_price','room_bands.room_description')
                        ->get();

        return view('bookings.show',[
        'bookings' => $bookings,
        'customers' => $customers,
        'guests' => $guests,
        'rooms' => $rooms,
        'paymentMethods' => $paymentMethods
        ]);
    }

    public function destroy($id){
        $bookings = Booking::findOrFail($id);

        $bookings->delete();

        return redirect('/')->with('mssg','Booking has been deleted!');

    }

    public function search(Request $req){
        $search = $req->get('search-bookings');

        $bookings = Booking::join('customers','bookings.customer_id','=','customers.customer_id')
        ->where('first_name','like','%'.$search.'%')
        ->orWhere('last_name','like','%'.$search.'%')
        ->paginate(5);

        return view('bookings.index',[
            'bookings' => $bookings
        ]);
        
        
    }

}
