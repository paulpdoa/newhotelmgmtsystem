<div class="pdf-container">
    <h1>List of Guests</h1>
    <p>Hotel Management System</p>
    <table border="1" style="border-collapse: collapse;" width="100%;">
        <tr>
            <th>Profession</th>
            <th>Guest Name</th>
            <th>Address</th>
            <th>Mobile Phone</th>
        </tr>
        @foreach($guests as $guest)
        <tr>
            <th>{{ $guest->title }}</th>
            <th>{{ $guest->first_name }} {{ $guest->last_name }}</th>
            <th>{{ $guest->street }} {{ $guest->town }}, {{ $guest->province }}</th>
            <th>{{ $guest->contact_number }}</th>
        </tr>
        @endforeach
    </table>
</div>
