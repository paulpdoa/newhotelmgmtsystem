<div class="pdf-container">
    <h1>List of Rooms</h1>
    <p>Hotel Management System</p>
    <table border="1" style="border-collapse: collapse;" width="100%;">
        <tr>
            <th>Room Type</th>
            <th>Room Description</th>
            <th>Room Price</th>
        </tr>
        @foreach($rooms as $room)
        <tr>
            <th>{{ $room->room_type }}</th>
            <th>{{ $room->room_description }}</th>
            <th>{{ $room->room_price }}</th>
        </tr>
        @endforeach
    </table>
</div>
