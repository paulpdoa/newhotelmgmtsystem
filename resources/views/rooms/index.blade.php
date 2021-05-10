@extends('layouts.app')
@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="main-room-container">
        <h1>Room Record</h1>
        <p>records of room in hotel</p>
        <div class="searched-room">
            <form action="{{ route('rooms.search') }}" method="GET">
                <input class="search-box" type="text" name="search-room" placeholder="Enter a room name to search">
                <button class="submit btn-info"><i class="fa fa-search"></i>Search</button>
                
            </form>
            <div class="buttons">
                <a class="submit btn-light" href="{{ route('pdfreports.room') }}">Download PDF</a>
                <a class="submit btn-light" href="{{ route('rooms.index') }}">Back to List</a>
                <a class="submit btn-light" href="{{ route('rooms.create') }}">Add Room</a>
                <a class="submit btn-light" href="{{ route('roomfacilities.create') }}">Add Facility</a>
            </div>
        </div>
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-light">
            <thead class="thead-dark">
            <tr>
            
                <th>Room Type</th>
                <th>Room Price</th>
                <th>Room Description</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rooms as $room)
            <tr class="rows">
                <td>{{ $room->room_type }}</td>
                <td>{{ $room->room_price }}</td>
                <td>{{ $room->room_description }}</td>
                <td><button class="remover submit btn-danger"><i class="fas fa-trash"></i>Remove</button></td>
                <td><a class="view-room" href="{{ route('rooms.show',$room->room_id) }}"><button class="view submit btn-primary"><i class="fa fa-eye"></i>View</button></a></td>
            </tr>
            @endforeach
        </tbody>
        </table>
        </div>


      {{-- which one will I use? to insert new rooms--}}
    </div>
</div>
<script>
    const rows= document.querySelectorAll('.rows');
    const remove = document.querySelectorAll('.remover');

    remove.forEach((btn,idx) => {
        btn.addEventListener('click',() => {
            rows[idx].remove();
        })
    })

</script>
@endsection