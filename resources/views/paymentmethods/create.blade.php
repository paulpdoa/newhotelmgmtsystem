@extends('layouts.app')
@section('content')
    <div class="payment-main-container">
        <a href="/"><button class="submit btn-success"><i class="fa fa-chevron-left"></i> Back</button></a>
        <h1>Add Payment Method</h1>
            <form class="payment-subcontainer" action="{{ route('paymentmethods.store') }}" method="POST">
                @csrf
                <div class="payment-input">
                    <label for="paymentmethod">Payment Method</label><br/>
                    <input type="text" name="paymentmethod" placeholder="Enter Payment Method">
                </div>
                <center>
                <div class="payment-input">
                    <button style="width:200px;" class="paymentadd submit update"><i class="fa fa-edit"></i>Add Payment Method</button>
                </div>
                </center>
            </form> 
    </div>
@endsection