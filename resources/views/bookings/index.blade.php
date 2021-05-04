@extends('layouts.app')
@section('content')

<div class="bookings-main-container">
    <h1>Booking Record</h1>
    <p>records of bookings in hotel</p>
    <div class="searched-booking">
        <form action="{{ route('bookings.search') }}" method="GET">
            <input class="search-box" type="text" name="search-bookings" placeholder="Enter a name to search">
            <input class="submit btn-light" type="submit" value="Search">
            
        </form>
        <div class="buttons">
            <a class="submit" href="{{ route('bookings.index') }}">Refresh</a>
            <a class="submit" href="{{ route('bookings.create') }}">Add Booking</a>
        </div>
    </div>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-info">
        <thead class="thead-light">
        <tr>
            <th>Customer Name</th>
            <th>Date Booking Made</th>
            <th>Time Booking Made</th>
            <th>Booked Start Date</th>
            <th>Booked End Date</th>
            <th>Total Payment Due Date</th>
            <th>Total Payment Due Amount</th>
            <th>Total Payment Made On</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bookings as $booking)
        <tr class="rows">
            <td>{{ $booking->first_name }} {{ $booking->last_name }}</td>
            <td>{{ $booking->date_booking_made }}</td>
            <td>{{ $booking->time_booking_made }}</td>
            <td>{{ $booking->booked_start_date }}</td>
            <td>{{ $booking->booked_end_date }}</td>
            <td>{{ $booking->total_payment_due_date }}</td>
            <td>{{ $booking->total_payment_due_amount }}</td>
            <td>{{ $booking->total_payment_made_on }}</td>
            <td><button class="remover submit btn-light">Remove</button></td>
            <td><a class="view-bookings" href="{{ route('bookings.show',$booking->booking_id) }}"><button class="show submit btn-light">View</button></a></td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
    
    </div>
    <script>
        const remover = document.querySelectorAll('.remover');
        const rows = document.querySelectorAll('.rows');
    
        remover.forEach((btn,index) => {
            btn.addEventListener('click',() => {
                rows[index].remove();
            })
        })
    </script>
@endsection