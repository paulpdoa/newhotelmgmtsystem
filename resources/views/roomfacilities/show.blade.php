@extends('layouts.app')
@section('content')


<div class="insert-room-container-main">
    <h1>Room Facility Information</h1>
    <p>room facility</p>
    
    <form action="{{ route('roomfacilities.update') }}" method="POST" class="insert-room-container">
        @csrf
        
        {{-- id to be used in updating --}}
        {{-- <input type="hidden" name="id" value="{{$rooms->room_id}}">
        <input type="hidden" name="roomtypeid" value="{{ $rooms->room_type_id }}">
        <input type="hidden" name="roompriceid" value="{{ $rooms->room_price_id }}">
        <input type="hidden" name="roombandid" value="{{ $rooms->room_band_id }}"> --}}
        {{-- for facilities --}}
        {{-- <input type="hidden" name="roomfacilityid" value="{{ $rooms->room_facility_id }}">
        <input type="hidden" name="facilityid" value="{{ $rooms->facilitylistid }}"> --}}
        {{-- end of id's --}}
        
        <div class="room-input-container row-one">
            <div class="room-input">
                <label for="roomtype">Room Type</label><br/>
                <input type="text" name="roomtype" value="{{$room->room_type}}" readonly>
            </div>
        </div>
        <div class="room-input-container row-two">
            <div class="room-input">
                <input type="hidden" name="roomfacilityid" value="{{ $room->room_facility_id }}">
                <label for="facilitydetail">Facility Detail</label><br/>
                <input type="text" name="facilitydetail" value="{{ $room->facility_details }}">
            </div>
        </div>
        <div class="room-input-container row-three">
            <div class="room-input">
                <input type="hidden" name="facilityid" value="{{ $room->facility_id }}">
                <label for="facilitydescription">Facility Description</label><br/>
                <input type="text" name="facilitydescription" value="{{ $room->facility_description }}">
            </div>
        </div>
        <div class="updateroom-container">
            <input type="submit" value="Update" class="submit update btn-light">
        </div>
    </form>
    {{-- <form class="deletefacility-container" action="{{ route('roomfacilities.destroy',$room->facility_id) }}">
        @csrf
        @method('DELETE')
            <input style="width:150px;" type="submit" value="Delete" class="btn-light update submit">
    </form> --}}
</div>
@endsection