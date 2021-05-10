<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingRoom;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class BookingRoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['store','create']);
    }

    public function index(){

        // $records = BookingRoom::
        // join('bookings','booking_rooms.booking_id','=','bookings.booking_id')
        // ->join('guests','booking_rooms.guest_id','=','guests.guest_id')
        // ->join('rooms','booking_rooms.room_id','=','rooms.room_id')
        // ->join('room_types','rooms.room_type_id','=','room_types.room_type_id')
        // ->join('payments','bookings.booking_id','=','payments.booking_id')
        // ->join('payment_methods','payments.payment_method_id','=','payment_methods.payment_method_id') 
        // ->join('customers','bookings.customer_id','=','customers.customer_id') 
        // ->select('booking_rooms.booking_room_id as bookingroomid','bookings.booking_id','rooms.room_id','guests.guest_id','customers.first_name as customername','customers.last_name as customersurname',
        // 'guests.first_name as guestname','guests.last_name as guestsurname',
        // 'room_types.room_type','payments.payment_amount',
        // 'payment_methods.payment_method','bookings.booked_start_date')   
        // ->get();
    // RAW QUERIES \m/
        $records = DB::select(
            "SELECT concat(c.first_name,' ',c.last_name) as customername
            ,concat(g.first_name,' ',g.last_name) as guestname,br.booking_room_id as booking_room_id,
            rt.room_type,pm.payment_method,p.payment_amount,date_format(b.booked_start_date,'%M %D %Y') as BookedDate,
            date_format(b.booked_end_date,'%M %D %Y') as EndDate,
            CASE 
                WHEN b.booked_start_date < CURDATE() THEN 'Archive'
                WHEN b.booked_start_date > CURDATE() THEN 'Future'
                ELSE 'Present'
            END AS History   
            FROM booking_rooms br join bookings b using(booking_id)
            join guests g using(guest_id) join rooms r using(room_id) join
            room_types rt using(room_type_id) join payments p using(booking_id)
            join payment_methods pm using(payment_method_id) join customers c 
            on b.customer_id = c.customer_id
            ");
       

        return view('bookingrooms.index',[
            'records' => $records
        ]);
    }

    public function store(){
        $bookingRooms = new BookingRoom();

        $payments = new Payment();
        // insert to bookin rooms table
        $bookingRooms->booking_id = request('bookingid');
        $bookingRooms->room_id = request('roomtype');
        $bookingRooms->guest_id = request('guestid');

        //insert to payment table
        $payments->booking_id = request('bookingid');
        $payments->customer_id = request('customerid');
        $payments->payment_method_id = request('paymentmethodid');
        $payments->payment_amount = request('totalpaymentmadeon');

        $bookingRooms->save();

        $payments->save();

        return redirect('/')->with('mssg','Customer booking has been confirmed!');

    }

    public function search(Request $req) {

        $search = $req->get('search-bookingroom');

        $records = DB::select(
            "SELECT concat(c.first_name,' ',c.last_name) as customername
            ,concat(g.first_name,' ',g.last_name) as guestname,br.booking_room_id as booking_room_id,
            rt.room_type,pm.payment_method,p.payment_amount,date_format(b.booked_start_date,'%M %D %Y') as BookedDate,
            CASE 
                WHEN b.booked_start_date < CURDATE() THEN 'Archive'
                WHEN b.booked_start_date > CURDATE() THEN 'Future'
                ELSE 'Present'
            END AS History   
            FROM booking_rooms br join bookings b using(booking_id)
            join guests g using(guest_id) join rooms r using(room_id) join
            room_types rt using(room_type_id) join payments p using(booking_id)
            join payment_methods pm using(payment_method_id) join customers c 
            on b.customer_id = c.customer_id where c.first_name like '%$search%'");
       
               
        return view('bookingrooms.index',['records' => $records]);

    }

    public function show($id){
        $bookingroom = BookingRoom::
        join('bookings','booking_rooms.booking_id','=','bookings.booking_id')
        -> join('guests','booking_rooms.guest_id','=','guests.guest_id')
        -> join('rooms','booking_rooms.room_id','=','rooms.room_id')
        ->join('room_types','rooms.room_type_id','=','room_types.room_type_id')
        ->join('payments','bookings.booking_id','=','payments.booking_id')
        ->join('payment_methods','payments.payment_method_id','=','payment_methods.payment_method_id') 
        ->join('customers','bookings.customer_id','=','customers.customer_id') 
        ->select('booking_rooms.booking_room_id','bookings.booking_id','rooms.room_id','guests.guest_id','customers.first_name as customername','customers.last_name as customersurname',
        'guests.first_name as guestname','guests.last_name as guestsurname',
        'room_types.room_type','payments.payment_amount',
        'payment_methods.payment_method','bookings.booked_start_date')     
        ->findOrFail($id);
      
        return view('bookingrooms.show',['bookingroom' => $bookingroom]);

        
    }

    public function destroy($id){
        $bookingroom = BookingRoom::findOrFail($id);

        $bookingroom->delete();

        return redirect('/')->with('mssg','Customer left the hotel');
    }

   
}
