<div class="pdf-container">
    
    <h1>List of Rooms</h1>
    <p>Hotel Management System</p>
    <hr/>
    <table border="1" style="border-collapse: collapse;" width="100%;">
        <tr>
            <th>Customer Name</th>
            <th>Guest Name</th>
            <th>Room Type</th>
            <th>Payment Method</th>
            <th>Payment Amount</th>
            <th>Booked Date</th>
        </tr>
        @foreach($bookingrooms as $bookingroom)
        <tr>
            <td>{{ $bookingroom->customername }} {{ $bookingroom->customersurname }}</td>
            <td>{{ $bookingroom->guestname }} {{ $bookingroom->guestsurname }}</td>
            <td>{{ $bookingroom->room_type }}</td>
            <td>{{ $bookingroom->payment_method }}</td>
            <td>{{ $bookingroom->payment_amount }}</td>
            <td>{{ $bookingroom->booked_start_date }}</td>
        </tr>
        @endforeach
    </table>
</div>
