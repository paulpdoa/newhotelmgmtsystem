@extends('layouts.app')
@section('content')

        <div class="content">
           <div class="hotel-management-title">
               <h1>Hotel Records</h1>
               <p>Paul Andres and Renz Mark Olaer</p>
           </div>
           <p>{{ session('mssg') }}</p>
        </div>
      <div class="jumbotron">
        <div class="card-group">
            <div class="card border border-primary">
              <div class="card-body">
                <h5 class="card-title">Customer</h5>
                <strong><p class="counter card-text" data-target="{{ $customerCount }}" >0</p></strong>
              </div>
            </div>
            <div class="card border border-warning">
              <div class="card-body">
                <h5 class="card-title">Guest</h5>
                <strong><p class="counter card-text" data-target="{{ $guestCount }}">0</p></strong>              
              </div>
            </div>
            <div class="card border border-success">
              
              <div class="card-body">
                <h5 class="card-title">Room</h5>
                <strong><p class="counter card-text" data-target="{{ $roomCount }}">0</p></strong>              
              </div>
            </div>
            <div class="card border border-danger"> 
                <div class="card-body">
                  <h5 class="card-title">Booking</h5>
                  <strong><p class="counter card-text" data-target="{{ $bookingroomCount }}">0</p></strong>             
                </div>
              </div>
          </div>
        </div>
        <div class="steps-container">
          <div class="card border-info mb-3">
            <div class="card-body">
              <h5 class="card-title">Hotel Management Project</h5>
              <p class="card-text">This is a project in database which we will use to show customer, guest, rooms, and booking records in this website using MySQL and PHP with the help of Laravel Framework.</p>
            </div>
          </div>
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
