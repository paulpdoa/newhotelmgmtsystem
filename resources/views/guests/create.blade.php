@extends('layouts.app')
@section('content')

<div class="insert-guest-container-main">
    <a href="/"><button class="submit btn-success"><i class="fa fa-chevron-left"></i> Back</button></a>
    <h1 class="title">Guest Form</h1>
    <p>Please fill in the following</p>
    <form class="insert-guest-container" action="{{ route('guests.store') }}" method="POST">
        @csrf
        <div class="guest-input-container row-one">
            <div class="guest-input">               
                <label for="title">Title</label><br/>
                <input class="guest-title" type="text" name="title" placeholder="Enter Profession" required>
            </div>
        </div>
        <div class="guest-input-container row-two">
            <div class="guest-input">
                <label for="firstname">First Name</label><br/>
                <input required style="width:310px;" type="text" name="firstname" placeholder="Enter First Name">
            </div>
            <div class="guest-input">
                <label for="lastname">Last Name</label><br/>
                <input required style="width:310px;" type="text" name="lastname" placeholder="Enter Last Name">
            </div>
        </div>
        <div class="guest-input-container row-three">
            <div class="guest-input">
                <label for="dateofbirth">Date of Birth</label><br/>
                <input required class="guest-dob" type="date" name="dateofbirth">
            </div>
        </div>
        <div class="guest-input-container row-four">
            <div class="guest-input">
                <label for="street">Street</label><br/>
                <input required type="text" name="street" placeholder="Enter Street">
            </div>
            <div class="guest-input">
                <label for="town">Town</label><br/>
                <input required type="text" name="town" placeholder="Enter Town">
            </div>
            <div class="guest-input">
                <label for="province">Province</label><br/>
                <input required type="text" name="province" placeholder="Enter Province">
            </div>
        </div>
        <div class="guest-input-container row-five">
            <div class="guest-input">
                <label for="postalcode">Postal Code</label><br/>
                <input required style="width:310px;" type="number" name="postalcode" placeholder="Enter Postal Code">
            </div>
            <div class="guest-input">
                <label for="contactnumber">Contact Number</label><br/>
                <input required style="width:310px;" type="number" name="contactnumber" placeholder="Enter Contact Number">
            </div>
        </div>

        <button class="submit btn-success"><i class='far fa-hand-point-right'></i>Insert</button>
    </form>
</div>

@endsection