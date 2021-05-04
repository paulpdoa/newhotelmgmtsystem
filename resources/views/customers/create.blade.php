@extends('layouts.app')
@section('content')

<div class="insert-customer-container-main">
    <h1>Customer Form</h1>
    <p>Please fill in the following</p>
    <form class="insert-customer-container" action="{{ route('customers.store') }}" method="POST">
        @csrf
        <div class="customer-input-container row-one">
            <div class="customer-input">
                <label for="title">Title</label><br/>
                <input required style="width:945px" type="text" name="title" placeholder="Enter Profession" required>
            </div>
        </div>
        <div class="customer-input-container row-two">
            <div class="customer-input">
                <label for="firstname">First Name</label><br/>
                <input required type="text" name="firstname" placeholder="Enter First Name">
            </div>
        
            <div class="customer-input">
                <label for="lastname">Last Name</label><br/>
                <input required type="text" name="lastname" placeholder="Enter Last Name">
            </div>
            <div class="customer-input">
                <label for="dateofbirth">Date of Birth</label><br/>
                <input required type="date" name="dateofbirth">
            </div>
        </div>
        <div class="customer-input-container row-three">
            <div class="customer-input">
                <label for="street">Street</label><br/>
                <input required type="text" name="street" placeholder="Enter Street">
            </div>
            <div class="customer-input">
                <label for="town">Town</label><br/>
                <input required type="text" name="town" placeholder="Enter Town">
            </div>
            <div class="customer-input">
                <label for="province">Province</label><br/>
                <input required type="text" name="province" placeholder="Enter Province">
            </div>
        </div>
        <div class="customer-input-container row-four">
            <div class="customer-input">
                <label for="homephone">Home Phone</label><br/>
                <input required type="number" name="homephone" placeholder="Enter Home Phone">
            </div>
            <div class="customer-input">
                <label for="workphone">Work Phone</label><br/>
                <input required type="number" name="workphone" placeholder="Enter Work Phone">
            </div>
            <div class="customer-input">
                <label for="mobilephone">Mobile Phone</label><br/>
                <input required type="number" name="mobilephone" placeholder="Enter Mobile Phone">
            </div>
        </div>
        <div class="customer-input-container row-five">
            <div class="customer-input">
                <label for="postalcode">Postal Code</label><br/>
                <input required type="number" name="postalcode" placeholder="Enter Postal Code">
            </div>
            <div class="customer-input">
                <label for="email">Email Address</label><br/>
                <input required style="width:50vw;" type="email" name="email" placeholder="Enter Email Address">
            </div>
        </div>

        <input class="submit" type="submit" value="Submit">
    </form>
</div>

@endsection