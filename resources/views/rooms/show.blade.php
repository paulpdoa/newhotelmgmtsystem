@extends('layouts.app')

@section('content')

<div class="insert-room-container-main">
    <h1>Room Information</h1>
    <form action="{{ route('rooms.update') }}" method="POST" class="insert-room-container">
        @csrf
        
        {{-- id to be used in updating --}}
        <input type="hidden" name="id" value="{{$rooms->room_id}}">
        <input type="hidden" name="roomtypeid" value="{{ $rooms->room_type_id }}">
        <input type="hidden" name="roompriceid" value="{{ $rooms->room_price_id }}">
        <input type="hidden" name="roombandid" value="{{ $rooms->room_band_id }}">
        {{-- for facilities --}}
        <input type="hidden" name="roomfacilityid" value="{{ $rooms->room_facility_id }}">
        <input type="hidden" name="facilityid" value="{{ $rooms->facilitylistid }}">
        {{-- end of id's --}}
        <div class="room-input-container row-one">
            <div class="room-input">
                <label for="roomtype">Room Type</label><br/>
                <input type="text" name="roomtype" value="{{$rooms->room_type}}">
            </div>
        </div>
        <div class="room-input-container row-two">
            <div class="room-input">
                <label for="roomprice">Room Price</label><br/>
                <input type="number" name="roomprice" value="{{ $rooms->room_price }}">
            </div>
        </div>
        <div class="room-input-container row-three">
            <div class="room-input">
                <label for="roomdescription">Room Description</label><br/>
                <input type="text" name="roomdescription" value="{{ $rooms->room_description }}">
            </div>
        </div>
        <div class="updateroom-container">
            <input type="submit" value="Update" class="submit update btn-light">
        </div>
    </form>

    {{-- a form for passing the data to room facilities
    <form action="{{ route('roomfacility.store') }}" method="POST">
        @csrf
        <div class="room-input-container row-three">
            <div class="room-input">
                <label for="facilitydesc">Facility Description</label><br/>
                <input type="text" name="facilitydesc" value="{{ $rooms->facility_description }}"> 
            </div>
        </div>
        <div class="room-input-container row-three">
            <div class="room-input">
                <label for="facilitydetail">Facility Details</label><br/>
                <input type="text" name="facilitydetail" value="{{ $rooms->facility_details }}"> 
            </div>
        </div>

        <input class="submit btn-light deleteroom-btn" type="submit" value="Add to Facilities">
    </form> --}}

    <form class="deleteroom-form" action={{ route('rooms.destroy', $rooms->room_id) }} method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" class="submit btn-light deleteroom-btn" value="Delete">
    </form>
</div>




@endsection