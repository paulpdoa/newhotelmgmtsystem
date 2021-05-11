@extends('layouts.app')

@section('content')

<div class="insert-room-container-main">
    <h1>Room Form</h1>
    <p>Please fill in the following</p>
    <form method="POST" class="insert-room-container" action="{{ route('rooms.store') }}">
        @csrf
        <input type="hidden" name="roomtypeid" value="{{ $roomtype }}">
        <input type="hidden" name="roompriceid" value="{{ $roomprice }}">
        <input type="hidden" name="roomdescid" value="{{ $roomdesc }}">
        <div class="room-input-container row-one">
            <div class="room-input">
                <label for="roomtype">Room Type</label><br/>
                <input type="text" name="roomtype" placeholder="Enter Room Type">
            </div>
        </div>
        <div class="room-input-container row-two">
            <div class="room-input">
                <label for="roomprice">Room Price</label><br/>
                <input type="number" name="roomprice" placeholder="Enter Room Price" required>
            </div>
        </div>
        <div class="room-input-container row-three">
            <div class="room-input">
                <label for="roomdescription">Room Description</label><br/>
                <input type="text" name="roomdescription" placeholder="Enter Room Description" required>
            </div>
        </div>
        <div class="room-input-container row-three">
            <div class="room-input">
                <label for="facilitydesc">Facility Description</label><br/>
                <input type="text" name="facilitydescription" placeholder="Enter Facility Description" required>
            </div>
        </div>
        <button class="facility-add submit btn-success"><i class='far fa-hand-point-right'></i>Add Room</button>
    </form>
</div>

@endsection