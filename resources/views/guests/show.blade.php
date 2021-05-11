@extends('layouts.app')
@section('content')

<div class="insert-guest-container-main">
    <a href="/"><button class="submit btn-success"><i class="fa fa-chevron-left"></i> Back</button></a>
    <h1>Guest Information</h1>
    <p>Please fill in the following</p>
    <form class="insert-guest-container" action="{{ route('guests.update') }}"  method="POST">
        @csrf

        {{-- get in controller to manipulate updating --}}
        <input type="hidden" name="id" value="{{$guests->guest_id}}">
        <div class="guest-input-container row-one">
            <div class="guest-input">               
                <label for="title">Title</label><br/>
                <input class="guest-title" type="text" name="title" value="{{$guests->title}}" required>
            </div>
        </div>
        <div class="guest-input-container row-two">
            <div class="guest-input">
                <label for="firstname">First Name</label><br/>
                <input style="width:310px;" type="text" name="firstname" value="{{$guests->first_name}}">
            </div>
            <div class="guest-input">
                <label for="lastname">Last Name</label><br/>
                <input style="width:310px;" type="text" name="lastname" value="{{$guests->last_name}}">
            </div>
        </div>
        <div class="guest-input-container row-three">
            <div class="guest-input">
                <label for="dateofbirth">Date of Birth</label><br/>
                <input class="guest-dob" type="date" name="dateofbirth" value="{{$guests->date_of_birth}}">
            </div>
        </div>
        <div class="guest-input-container row-four">
            <div class="guest-input">
                <label for="street">Street</label><br/>
                <input type="text" name="street" value="{{$guests->street}}">
            </div>
            <div class="guest-input">
                <label for="town">Town</label><br/>
                <input type="text" name="town" value="{{$guests->town}}">
            </div>
            <div class="guest-input">
                <label for="province">Province</label><br/>
                <input type="text" name="province" value="{{$guests->province}}">
            </div>
        </div>
        <div class="guest-input-container row-five">
            <div class="guest-input">
                <label for="postalcode">Postal Code</label><br/>
                <input style="width:310px;" type="number" name="postalcode" value="{{$guests->postal_code}}">
            </div>
            <div class="guest-input">
                <label for="contactnumber">Contact Number</label><br/>
                <input style="width:310px;" type="number" name="contactnumber" value="{{$guests->contact_number}}">
            </div>
        </div>
      
        <div class="updateguest-container">
            <button class="submit update"><i class="fa fa-edit"></i>Update</button>
        </div>
        
    </form>
    <form class="deleteguest-form" action={{ route('guests.destroy', $guests->guest_id) }} method="POST">
        @csrf
        @method('DELETE')
        <button class="submit delete-btn delete delete-guest"><i class="fas fa-trash"></i>Delete</button>
    </form>
</div>

@endsection