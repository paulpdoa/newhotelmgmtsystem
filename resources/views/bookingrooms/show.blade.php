@extends('layouts.app')
@section('content')
<div class="booking-room-container-main">
    <a href="/"><button class="submit btn-success"><i class="fa fa-chevron-left"></i> Back</button></a>
    <h1>Checked In Customer</h1>
    <input type="hidden" name="bookingid" value="{{ $bookingroom->booking_room_id }}">

    <input type="hidden" name="bookingid" value="{{ $bookingroom->booking_id }}">
    <input type="hidden" name="bookingid" value="{{ $bookingroom->room_id }}">
    <input type="hidden" name="bookingid" value="{{ $bookingroom->guest_id }}">
    <div class="booking-room-container">
        <div class="booking-room-input row-one">
            <div class="bookingroom-input">
                <label for="customername">Customer Name</label><br/>
                <input type="text" name="" value="{{$bookingroom->customername}} {{$bookingroom->customersurname}}">
            </div>
            <div class="bookingroom-input">
                <label for="guestname">Guest Name</label><br/>
                <input type="text" name="" value="{{$bookingroom->guestname}} {{$bookingroom->guestsurname}}">
            </div>
        </div>
        <div class="booking-room-input row-two">
            <div class="bookingroom-input">
                <label for="roomtype">Room Type</label><br/>
                <input type="text" name="" value="{{$bookingroom->room_type}}">
            </div>
            <div class="bookingroom-input">
                <label for="paymentmethod">Payment Method</label><br/>
                <input type="text" name="" value="{{$bookingroom->payment_method}}">
            </div>
        </div>
        <div class="booking-room-input row-three">
            <div class="bookingroom-input">
                <label for="paymentamount">Payment Amount</label><br/>
                <input type="number" name="" value="{{$bookingroom->payment_amount}}">
            </div>
            <div class="bookingroom-input">
                <label for="startdate">Booked Start Date</label><br/>
                <input type="date" name="" value="{{$bookingroom->booked_start_date}}">
            </div>
        </div>
        <form class="deletebookingroom-form" action={{ route('bookingrooms.destroy', $bookingroom->booking_room_id) }} method="POST">
            @csrf
            @method('DELETE')
            <button style="width:200px;" class="endbooking submit delete-btn delete delete-booking"><i class="fas fa-trash"></i>End Booking</button>
        </form>
    </div>
</div>
@endsection

