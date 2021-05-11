@extends('layouts.app')
@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                {{-- <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a> --}}
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
<div class="customers-main-container">
    <a href="/"><button class="submit btn-success"><i class="fa fa-chevron-left"></i> Back</button></a>
    <h1>Customer Record</h1>
    <p>records of customer in hotel</p>
    <div class="searched-customer">
        <form class="searchbox" action="{{ route('customers.search') }}" method="GET">
            <input class="search-box" type="text" name="search-customer" placeholder="Enter a name to search">
            <button class="submit btn-info"><i class="fa fa-search"></i>Search</button>
            
        </form>
        <div class="buttons">
            <a class="submit btn-light" href="{{ route('pdfreports.customer') }}">Download PDF</a>
            <a class="submit btn-light" href="{{ route('customers.index') }}">Back to List</a>
            <a class="submit btn-light" href="{{ route('customers.create') }}">Add Customer</a>
        </div>
    </div>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-light">
        <thead class="thead-dark">
        <tr>
            <th>Title</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Postal Code</th>
            <th>Mobile Phone</th>
            <th>Email Address</th>
            <th>Booked Time</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customer as $client)
        <tr class="rows">
            <td>{{ $client->title }}</td>
            <td>{{ $client->first_name }}</td>
            <td>{{ $client->last_name }}</td>
            <td>{{ $client->street }} {{ $client->town }}, {{ $client->province }}</td>
            <td>{{ $client->postal_code }}</td> 
            <td>{{ $client->mobile_phone }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->created_at }}</td>
            <td><button class="remover submit btn-danger"><i class="fas fa-trash"></i>Remove</button></td>
            <td><a class="view-customer" href="{{ route('customers.show', $client->customer_id) }}"><button class="show submit btn-primary"><i class="fa fa-eye"></i>View</button></a></td>
        </tr>
        
        @endforeach
    </tbody>
    </table>
    </div>
    </div>
</div>

    <script>
        const removeBtn = document.querySelectorAll('.remover');
        const rows = document.querySelectorAll('.rows');
        
        removeBtn.forEach((btn,index) => {
            btn.addEventListener('click', () => {
                rows[index].remove();
            })
        })
    </script>
@endsection