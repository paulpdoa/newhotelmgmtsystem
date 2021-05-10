@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hotel Management System</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <center><h2>Welcome to our project!</h2></center><br/>
                    <p>Created by Paul Andres and Renz Mark Olaer</p><br/>
                    <center><a href="/" class="btn-light"><button class="btn-primary submit go-record">Go to Records</button></a></center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
