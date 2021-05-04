<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Guest;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;


use Barryvdh\DomPDF\Facade as PDF;

class UserController extends Controller
{
    public function customer()
    {
        $customers = Customer::get();
        // loads the view as pdf format
            $pdf = PDF::loadView('pdfreports.customer',['customers' => $customers]);
            return $pdf->download('customers.pdf');
     
        return view('pdfreports.customer',['customers' => $customers]);
    }

    public function guest()
    {
        $guests = Guest::get();
        // loads the view as pdf format
            $pdf = PDF::loadView('pdfreports.guest',['guests' => $guests]);
            return $pdf->download('guests.pdf');
     
        return view('pdfreports.guest',['customers' => $guests]);
    }

    public function room()
    {
        $rooms = Room::
            join('room_types','rooms.room_type_id','=','room_types.room_type_id')
                ->join('room_prices','rooms.room_price_id','=','room_prices.room_price_id')
                    ->join('room_bands','rooms.room_band_id','=','room_bands.room_band_id')
                        ->select('rooms.room_id','room_types.room_type','room_prices.room_price','room_bands.room_description')
                            ->get();

         
            $pdf = PDF::loadView('pdfreports.room',['rooms' => $rooms]);
            return $pdf->download('rooms.pdf'); 
      
        // loads the view as pdf format
           
     
        return view('pdfreports.room',['rooms' => $rooms]);
    }

    public function bookingroom(){
        $bookingrooms = Booking::
        join('customers','bookings.customer_id','=','customers.customer_id')
        ->join('payments','bookings.booking_id','=','payments.booking_id')
        ->join('payment_methods','payments.payment_method_id','=','payment_methods.payment_method_id')
        ->join('booking_rooms','bookings.booking_id','=','booking_rooms.booking_id')
        ->join('guests','booking_rooms.guest_id','=','guests.guest_id')
        ->join('rooms','booking_rooms.room_id','=','rooms.room_id')
        ->join('room_types','rooms.room_type_id','=','room_types.room_type_id')
        ->select('customers.first_name as customername','customers.last_name as customersurname',
        'guests.first_name as guestname','guests.last_name as guestsurname',
        'room_types.room_type','payments.payment_amount',
        'payment_methods.payment_method','bookings.booked_start_date')
        ->get();

        // loads the view as pdf format
            $pdf = PDF::loadView('pdfreports.bookingroom',['bookingrooms' => $bookingrooms]);
            return $pdf->download('Booking_Rooms.pdf');
     
        return view('pdfreports.bookingroom',['bookingrooms' => $bookingrooms]);
    }
    public function roomfacility(){
        $roomfacilities=DB::select("
        SELECT rt.room_type,rf.facility_details,fl.facility_description from room_facilities rf join facility_lists fl 
        using(facility_id) join rooms r using(room_id) join room_types rt using(room_type_id)
        ");

        $pdf = PDF::loadView('pdfreports.roomfacility',['roomfacilities' => $roomfacilities]);
        return $pdf->download('Room Facility.pdf');
 
        return view('pdfreports.roomfacility',['roomfacilities' => $roomfacilities]);
    }
}
