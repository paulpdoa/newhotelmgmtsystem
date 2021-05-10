<div class="pdf-container">
    <h1>List of Room Facility</h1>
    <p>Hotel Management System</p>
    Room Facilities
    <hr/>
    <table border="1" style="border-collapse: collapse;" width="100%;">
        <tr>
            <th>Room Type</th>
            <th>Facility Detail</th>
            <th>Facility Description</th>
        </tr>
        @foreach($roomfacilities as $roomfacility)
        <tr>
            <td>{{ $roomfacility->room_type }}</td>
            <td>{{ $roomfacility->facility_details }}</td>
            <td>{{ $roomfacility->facility_description }}</td>  
        </tr>
        @endforeach
    </table>
</div>
