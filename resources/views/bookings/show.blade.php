@extends('layouts.app')
@section('content')

<div class="insert-booking-container-main">
    <h1>Booking Confirmation</h1>
    <form class="insert-booking-container" action="{{ route('bookingrooms.store') }}" method="POST">
        @csrf
        <div class="booking-input-container row-one">
            {{-- insert to payments table --}}
            <input type="hidden" name="bookingid" value="{{ $bookings->booking_id }}">
            <div class="booking-input">
                <label for="customerid">Customer Name</label><br/>
                {{-- insert to payments table --}}
                    <input readonly type="text" value="{{ $bookings->first_name }} {{ $bookings->last_name }}">
                   <input readonly type="hidden" name="customerid" value="{{ $bookings->customer_id }}">
            </div>
            <div class="booking-input">
                <label for="guestname">Choose Customer's Guest</label><br/>
                <select name="guestid" class="">
                    @foreach($guests as $guest)
                    <option value="" disabled selected hidden>Choose Guest</option>
                    <option value="{{ $guest->guest_id }}">{{ $guest->first_name }} {{ $guest->last_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="booking-input-container row-two">
            <div class="booking-input">
                <label for="datebookingmade">Date Booking Made</label><br/>
                <input type="date" name="datebookingmade" value="{{ $bookings->date_booking_made }}">
            </div>
            <div class="booking-input">
                <label for="timebookingmade">Time Booking Made</label><br/>
                <input type="time" name="timebookingmade" value="{{ $bookings->time_booking_made }}">
            </div>
        </div>
        <div class="booking-input-container row-three">
            <div class="booking-input">
                <label for="bookingstartdate">Booking Start Date</label><br/>
                <input type="date" name="bookingstartdate" value="{{ $bookings->booked_start_date }}">
            </div>
            <div class="booking-input">
                <label for="bookingenddate">Booking End Date</label><br/>
                <input type="date" name="bookingenddate" value="{{ $bookings->booked_end_date }}">
            </div>
        </div>
        <div class="booking-input-container row-four">
            <div class="booking-input">
                <label for="roomtype">Room Type</label><br/>
                <select name="roomtype" class="roomtype">
                    @foreach($rooms as $room)
                    <option value="" disabled selected hidden>Choose Room Type</option>
                    <option class="roomprice" value="{{ $room->room_id }}">{{ $room->room_type }} | ${{$room->room_price}}</option> 
                    @endforeach
                </select>
            </div>
            <div class="booking-input">
                <label for="totalpaymentduedate">Total Payment Due Date</label><br/>
                <input class="payment" type="date" name="totalpaymentduedate" value="{{ $bookings->total_payment_due_date }}">  
            </div>
        </div>
        <div class="booking-input-container row-five">
            <div class="booking-input">
                <label for="totalpaymentdueamount">Total Payment Due Amount</label><br/>
                <input type="number" name="totalpaymentdueamount" value="{{ $bookings->total_payment_due_amount }}">
            </div>
            <div class="booking-input">
                <label for="totalpaymentmadeon">Total Payment Made On</label><br/>
                <input type="number" value="{{ $bookings->total_payment_made_on }}" name="totalpaymentmadeon">
            </div>
        </div>
        <div class="booking-input-container row-five">
            <div class="booking-input">
                <label for="paymentmethod">Payment Method</label><br/>
                <select style="width:410px;" name="paymentmethodid">
                    @foreach($paymentMethods as $paymentMethod)    
                    <option value="" disabled selected hidden>Choose Payment Method</option>
                    <option value="{{ $paymentMethod->payment_method_id }}">{{ $paymentMethod->payment_method }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="confirm-booking">
            <input type="submit" value="Confirm Booking" class="submit">
        </div>
        
    </form>
    <form class="deletebooking-form" action={{ route('bookings.destroy', $bookings->booking_id) }} method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" class="submit deletebooking-btn" value="Delete">
    </form>
</div>


@endsection