@extends('layouts.app')
@section('content')

<div class="insert-booking-container-main">
    <form class="insert-booking-container" action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <h1>Create Bookings</h1>
        <div class="booking-input-container row-one">
            <div class="booking-input">
                <label for="customername">Customer Name</label><br/>
                <select style="width:410px;" name="customerid">
                    @foreach($customers as $customer)
                    <option value="" disabled selected hidden>Choose Customer</option>
                    <option value="{{ $customer->customer_id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                    @endforeach
                </select>
            </div>
           
        </div>
        <div class="booking-input-container row-two">
            <div class="booking-input">
                <label for="datebookingmade">Date Booking Made</label><br/>
                <input type="date" name="datebookingmade" value="{{ $today }}">
            </div>
            <div class="booking-input">
                <label for="timebookingmade">Time Booking Made</label><br/>
                <input type="time" name="timebookingmade" value="{{ $time }}">
            </div>
        </div>
        <div class="booking-input-container row-three">
            <div class="booking-input">
                <label for="bookingstartdate">Booking Start Date</label><br/>
                <input required type="date" name="bookingstartdate">
            </div>
            <div class="booking-input">
                <label for="bookingenddate">Booking End Date</label><br/>
                <input required type="date" name="bookingenddate">
            </div>
        </div>
        <div class="booking-input-container row-four">
            {{-- <div class="booking-input">
                <label for="roomtype">Room Type</label></br>
                <select name="roomtype" class="roomtype">
                    @foreach($rooms as $room)
                    <option class="roomprice" value="{{ $room->room_id }}">{{ $room->room_type }} | ${{$room->room_price}}</option> 
                    @endforeach
                </select>
            </div> --}}
            <div class="booking-input">
                <label for="totalpaymentduedate">Total Payment Due Date</label><br/>
                <input required style="width:410px;" class="payment" type="date" name="totalpaymentduedate">  
            </div>
        </div>
        <div class="booking-input-container row-five">
            <div class="booking-input">
                <label for="totalpaymentdueamount">Total Payment Due Amount</label><br/>
                <input required type="number" name="totalpaymentdueamount" placeholder="Enter Amount on Due Date">
            </div>
            <div class="booking-input">
                <label for="totalpaymentmadeon">Total Payment Made On</label><br/>
                <input required type="number" placeholder="Total Payment Made" name="totalpaymentmadeon">
            </div>
        </div>
        {{-- <div class="booking-input-container row-five">
            <div class="booking-input">
                <label for="paymentmethod">Payment Method</label><br/>
                <select style="width:410px;" name="paymentmethodid">
                    @foreach($paymentMethods as $paymentMethod)    
                    <option value="{{ $paymentMethod->payment_method_id }}">{{ $paymentMethod->payment_method }}</option>
                    @endforeach
                </select>
            </div>
        </div> --}}
        <input type="submit" value="Book Now" class="submit">
    </form>
</div>


@endsection