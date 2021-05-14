@extends('layouts.app')
@section('content')
<a href="/"><button class="submit btn-success"><i class="fa fa-chevron-left"></i> Back</button></a>
<h1 class="title">List of Available Rooms</h1>
<div class="available-container">
    
    @foreach($availables as $available)
    <div class="available-box">
        <center><h1>{{ $available->room_type }}</h1><br/> <h3>{{ $available->V }}</h3><br/>
        <a href="{{ route('rooms.show',$available->room_id) }}"><button class="show submit btn-primary"><i class="fa fa-eye"></i>View</button></a></center>
    </div>
    @endforeach
</div>

@endsection