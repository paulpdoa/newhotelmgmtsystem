@extends('layouts.app')
@section('content')

<div class="guests-main-container">
    <a href="/"><button class="submit btn-success"><i class="fa fa-chevron-left"></i> Back</button></a>
    <h1>Guest Record</h1>
    <p>records of guest in hotel</p>
    <div class="searched-guest">
        <form class="searchbox" action="{{ route('guests.search')}}" method="GET">
            <input class="search-box" type="text" name="search-guest" placeholder="Enter a name to search">
            <button class="submit btn-info"><i class="fa fa-search"></i>Search</button>
            
        </form>
        <div class="buttons">
            <a href="{{ route('pdfreports.guest') }}" class="submit btn-light">Download PDF</a>
            <a href="{{ route('guests.index') }}" class="submit btn-light">Back to List</a>
            <a href="{{ route('guests.create') }}" class="submit btn-light">Add Guest</a>
        </div>
    </div>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-light">
        <thead class="thead-dark">
        <tr>
            <th>Title</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Address</th>
            <th>Postal Code</th>
            <th>Contact Phone</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($guests as $guest)
        <tr class="rows">
            <td>{{ $guest->title }}</td>
            <td>{{ $guest->first_name }}</td>
            <td>{{ $guest->last_name }}</td>
            <td>{{ $guest->date_of_birth }}</td>
            <td>{{ $guest->street }} {{ $guest->town }}, {{ $guest->province }}</td>
            <td>{{ $guest->postal_code }}</td>
            <td>{{ $guest->contact_number }}</td>
            <td><button class="remover submit btn-danger"><i class="fas fa-trash"></i>Remove</button></td>
            <td><a class="view-guest" href="{{ route('guests.show', $guest->guest_id) }}"><button class="show submit btn-primary"><i class="fa fa-eye"></i>View</button></a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    
    </div>
<script>
    const remover = document.querySelectorAll('.remover');
    const rows = document.querySelectorAll('.rows');

    remover.forEach((btn,index) => {
        btn.addEventListener('click',() => {
            rows[index].remove();
        })
    })
</script>
@endsection