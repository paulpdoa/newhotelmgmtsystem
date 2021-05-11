@extends('layouts.app')
@section('content')

        <div class="content">
           <h1>Hotel Management Records</h1>
           <p>{{ session('mssg') }}</p>
        </div>
      <div class="count-container">
          <a href="{{route('customers.index')}}">
            <div class="count-body">
              <img class="count-image" src="/img/customer.png" alt="customer">
              <div class="counts">
                <h5 class="card-title">Customer</h5>
                <strong><p class="counter card-text" data-target="{{ $customerCount }}" >0</p></strong>
              </div>
            </div>
          </a>
          <a href="{{ route('guests.index') }}">
          <div class="count-body">
              <img class="count-image" src="/img/guest.png" alt="guest">
              <div class="counts">
                <h5 class="card-title">Guest</h5>
                <strong><p class="counter card-text" data-target="{{ $guestCount }}">0</p></strong> 
              </div>
            </div>
          </a>
          <a href="{{ route('rooms.index') }}">
          <div class="count-body">
              <img class="count-image" src="/img/room.png" alt="room">
              <div class="counts">
                <h5 class="card-title">Room</h5>
                <strong><p class="counter card-text" data-target="{{ $roomCount }}">0</p></strong> 
              </div>     
            </div>
          </a>
          <a href="{{ route('bookings.index') }}">
            <div class="count-body">
              <img class="count-image" src="/img/booking.png" alt="booking">
              <div class="counts">
                <h5 class="card-title">Booking</h5>
                <strong><p class="counter card-text" data-target="{{ $bookingroomCount }}">0</p></strong> 
              </div> 
            </div>
          </a>
          <a href="{{ route('bookingrooms.index') }}">
            <div class="count-body">
              <img class="count-image" src="/img/booked.png" alt="booked">
              <div class="counts">
                <h5 class="card-title">Guest Booked</h5>
                <strong><p class="counter card-text" data-target="{{ $guestbooking }}">0</p></strong> 
              </div> 
            </div>
          </a>
          <a href="{{ route('paymentmethods.create') }}">
            <div class="count-body">
              <img class="count-image" src="/img/payment.png" alt="payment">
              <div class="counts">
                <h5 class="card-title">Add More Payment Method</h5>
                <strong><p class="counter card-text" data-target="{{ $paymentmethod }}">0</p></strong> 
              </div> 
            </div>
          </a>
          <a href="{{ route('availablerooms.index') }}">
            <div class="count-body">
              <img class="count-image" src="/img/availableroom.png" alt="availableroom">
              <div class="counts">
                <h5 class="card-title">Available Rooms</h5>
                <strong><p class="counter card-text" data-target="{{ $availableroom }}" >0</p></strong>
              </div>
            </div>
          </a>
          <a href="{{ route('roomfacilities.index') }}">
            <div class="count-body">
              <img class="count-image" src="/img/roomfacility.png" alt="roomfacility">
              <div class="counts">
                <h5 class="card-title">Room Facilities</h5>
                <strong><p class="counter card-text" data-target="{{ $roomfacility }}" >0</p></strong>
              </div>
            </div>
          </a>
        </div>
        
        <script>
          const counters = document.querySelectorAll('.counter');

            counters.forEach(counter => {
                let tempCount = 0;
                const updateCount = () => {
                    const target = +counter.getAttribute('data-target');
                    // const count = +counter.innerText;
                    
                    // Lower inc to slow and higher to slow
                    const inc = target / 200

                    // console.log(inc);
                    // console.log(count);

                    // Check if target is reached
                    if (tempCount < target) {
                        // Add inc to count and output in counter 
                        tempCount = tempCount + inc  
                        counter.innerText = Math.ceil(tempCount)
                        
                        // Call function every ms
                        setTimeout(updateCount, 1);
                    } else {
                        counter.innerText = target;
                    }
                };

                updateCount();
            });
        </script>
        
@endsection
