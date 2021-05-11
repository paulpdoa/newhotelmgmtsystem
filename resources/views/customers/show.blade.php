@extends('layouts.app')
@section('content')

<div class="insert-customer-container-main">
    <a href="/"><button class="submit btn-success"><i class="fa fa-chevron-left"></i> Back</button></a>
    <h1>Customer Information</h1>
    <p>Please fill in the following</p>
    <form class="insert-customer-container" action="{{ route('customers.update') }}"  method="POST">
        @csrf
        
        {{-- get in controller to manipulate updating --}}
        <input type="hidden" name="id" value="{{ $customer->customer_id}}">
        <div class="customer-input-container row-one">
            <div class="customer-input">
                <label for="title">Title</label><br/>
                <input class="customer-title" type="text" name="title" value="{{$customer->title}}" required>
            </div>
        </div>
        <div class="customer-input-container row-two">
            <div class="customer-input">
                <label for="firstname">First Name</label><br/>
                <input type="text" name="firstname" value="{{$customer->first_name}}">
            </div>
        
            <div class="customer-input">
                <label for="lastname">Last Name</label><br/>
                <input type="text" name="lastname" value="{{$customer->last_name}}">
            </div>
            <div class="customer-input">
                <label for="dateofbirth">Date of Birth</label><br/>
                <input type="date" name="dateofbirth" value="{{$customer->date_of_birth}}">
            </div>
        </div>
        <div class="customer-input-container row-three">
            <div class="customer-input">
                <label for="street">Street</label><br/>
                <input type="text" name="street" value="{{$customer->street}}">
            </div>
            <div class="customer-input">
                <label for="town">Town</label><br/>
                <input type="text" name="town" value="{{$customer->town}}">
            </div>
            <div class="customer-input">
                <label for="province">Province</label><br/>
                <input type="text" name="province" value="{{$customer->province}}">
            </div>
        </div>
        <div class="customer-input-container row-four">
            <div class="customer-input">
                <label for="homephone">Home Phone</label><br/>
                <input type="number" name="homephone" value="{{$customer->home_phone}}">
            </div>
            <div class="customer-input">
                <label for="workphone">Work Phone</label><br/>
                <input type="number" name="workphone" value="{{$customer->work_phone}}">
            </div>
            <div class="customer-input">
                <label for="mobilephone">Mobile Phone</label><br/>
                <input type="number" name="mobilephone" value="{{$customer->mobile_phone}}">
            </div>
        </div>
        <div class="customer-input-container row-five">
            <div class="customer-input">
                <label for="postalcode">Postal Code</label><br/>
                <input  type="number" name="postalcode" value="{{$customer->postal_code}}">
            </div>
            <div class="customer-input">
                <label for="email">Email Address</label><br/>
                <input class="customer-email" type="email" name="email" value="{{$customer->email}}">
            </div>
        </div>
        <div class="update-container">
            <button class="submit update"><i class="fa fa-edit"></i>Update</button>
        </div>
    </form>
    <form class="delete-form" action={{ route('customers.destroy', $customer->customer_id) }} method="POST">
        @csrf
        @method('DELETE')
        <button class="submit delete-btn delete delete-customer"><i class="fas fa-trash"></i>Delete</button>
    </form>
</div>

@endsection