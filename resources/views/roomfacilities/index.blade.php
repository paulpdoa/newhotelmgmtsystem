@extends('layouts.app')
@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="main-room-container">
        <h1>Room Facilites</h1>
        <p>records of room facilities in hotel</p>
        <div class="searched-room">
            <form action="{{ route('roomfacilities.search') }}" method="GET">
                <input class="search-box" type="text" name="search-roomfacility" placeholder="Enter a room name to search">
                <button class="submit btn-info"><i class="fa fa-search"></i>Search</button>
            </form>
            <div class="buttons">
                <a class="submit btn-light" href="{{ route('pdfreports.roomfacility') }}">Download PDF</a>
                <a class="submit btn-light" href="{{ route('roomfacilities.index') }}">Refresh</a>
            </div>
        </div>
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-light">
            <thead class="thead-dark">
            <tr>
                <th>Room Type</th>
                <th>Facility Detail</th>
                <th>Facility Description</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rooms as $room)
            <tr class="rows">
                <td>{{ $room->room_type }}</td>
                <td>{{ $room->facility_details }}</td>
                <td>{{ $room->facility_description }}</td>  
                <td><button class="remover submit btn-danger"><i class="fas fa-trash"></i>Remove</button></td>
                <td><a class="view-room" href="{{ route('roomfacilities.show',$room->room_facility_id) }}"><button class="view submit btn-primary"><i class="fa fa-eye"></i>View</button></a></td>
            </tr>
            @endforeach
        </tbody>
        </table>
        </div>


      {{-- which one will I use? to insert new rooms--}}
    </div>
</div>
<script>
    const remover = document.querySelectorAll('.remover');
    const rows = document.querySelectorAll('.rows');

    remover.forEach((btn,index) => {
        btn.addEventListener('click', () => {
            rows[index].remove();
        })
    })
</script>
@endsection