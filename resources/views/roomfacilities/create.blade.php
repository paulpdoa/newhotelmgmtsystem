@extends('layouts.app')
@section('content')
<div class="insert-facility-main-container">
    <h1>Add Facilities for Rooms</h1>
    <p>facilities for rooms</p>
    <form class="insert-facility-container" action="{{ route('roomfacilities.store') }}" method="POST">
        @csrf
        <div class="facility-input-container row-one">
            <div class="facility-input">
                <label for="roomtypes">Room Type</label><br/>
                <select name="roomid">
                    @foreach($rooms as $room)
                    <option value="{{ $room->room_id }}">{{$room->room_type}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="facility-input-container row-two">
            <div class="facility-input">
                <label for="facilitydesc">Facility Description</label><br/>
                <select name="roomfacilityid">
                    @foreach($facilityLists as $facilityList)
                    <option value="{{ $facilityList->facility_id }}" required>{{$facilityList->facility_description}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="facility-input-container row-three">
            <div class="facility-input">
                <label for="facilitydetail">Facility Detail</label><br/>
                <input type="text" name="facilitydetail" placeholder="Enter facility detail" required>
            </div>
        </div>
        <input type="submit" value="Add to Facilities" class="submit btn-light add-facility">

    </form>
</div>
@endsection