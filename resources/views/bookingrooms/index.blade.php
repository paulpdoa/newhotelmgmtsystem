@extends('layouts.app')
@section('content')

<h1>Customers Checked In </h1>
<p>records of customers checked in</p>
<div class="searched-room">
    <form action="{{ route('bookingrooms.search') }}" method="GET">
        <input class="search-box" type="text" name="search-bookingroom" placeholder="Enter a name to search">
        <input class="submit btn-light" type="submit" value="Search">   
    </form>
    <div class="buttons">
        <a class="submit btn-light" href="{{ route('pdfreports.bookingroom') }}">Download PDF</a>
        <a class="submit btn-light" href="{{ route('bookingrooms.index') }}">Refresh</a>
    </div>
</div>
<div class="table-wrapper-scroll-y my-custom-scrollbar">
<table class="table table-light">
    <thead class="thead-dark">
        <tr>
            <th>Customer Name</th>
            <th>Guest Name</th>
            <th>Room Type</th>
            <th>Payment Method</th>
            <th>Payment Amount</th>
            <th>Booked Start Date</th>
            <th>Booked End Date</th>
            <th>Time Record</th>
            <th colspan="2">Action</th>
        </tr>
        @foreach($records as $record)
        <tr class="rows">
            <td>{{ $record->customername }}</td>
            <td>{{ $record->guestname }}</td>
            <td>{{ $record->room_type }}</td>
            <td>{{ $record->payment_method }}</td>
            <td>{{ $record->payment_amount }}</td>
            <td>{{ $record->BookedDate }}</td>
            <td>{{ $record->EndDate }}</td>
            <td>{{ $record->History }}</td>
            <td><button class="remover submit btn-light">Remove</button></td>
            <td><a href="{{ route('bookingrooms.show',$record->booking_room_id) }}"><button class="show submit btn-light">View</button></a></td>
        </tr>
        @endforeach
    </thead>
</table>
</div>
<script>
    const rows = document.querySelectorAll('.rows');
    const remover = document.querySelectorAll('.remover');

    remover.forEach((btn,index) => {
        btn.addEventListener('click',() => {
            rows[index].remove();

        })
    })
</script>
@endsection