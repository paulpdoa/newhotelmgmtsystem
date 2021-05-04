@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hotel Management System</div>

                <div class="card-body registration-form-container-main">
                    <form class="registration-form-container" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="registration-form-input-container row-one">
                            <div class="registration-form-input">
                                <label for="name" class="">Username</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="registration-form-input">
                                <label for="email" class="">E-mail Address</label><br/>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="registration-form-input-container row-two">
                            <div class="registration-form-input">
                                <label for="password" class="">Password</label><br/>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                           
                            </div>
                            <div class="registration-form-input">
                                <label for="password-confirm" class="">Confirm Password</label><br>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                                <center><button type="submit" class="btn submit btn-light">
                                    Register
                                </button></center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
