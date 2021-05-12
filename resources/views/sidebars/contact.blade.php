@extends('layouts.app')
@section('content')
<div class="contact-container-main">
    <h1 class="title">About the developers</h1>
    <div class="contact-subcontainer">
        <div class="contact-box">
            <div class="about-me">
                <div class="contact-img">
                    <img src="/img/paul.png" alt="paul">
                </div>
                <div class="contact-name">
                    <h2>Paul D. Andres</h2>
                </div>
            </div>
            <div class="contact-socmed">
                <div class="fb-box">
                    <center><label for="fb">Facebook</label><br></center>
                    <a href="https://www.facebook.com/paulpdoa/"><button>@paulpdoa</button></a>
                </div>
                <div class="ig-box">
                    <center><label for="ig">Instagram</label><br></center>
                    <a href="https://www.instagram.com/paulpdoa/"><button>@paulpdoa</button></a>
                </div>
            </div>
        </div>
        <div class="contact-box">
            <div class="about-me">
                <div class="contact-img">
                    <img src="/img/renz.png" alt="renz">
                </div>
                <div class="contact-name">
                    <h2>Renz Mark B. Olaer</h2>
                </div>
            </div>
            <div class="contact-socmed">
                <div class="fb-box">
                    <center><label for="fb">Facebook</label><br></center>
                    <a href="https://www.facebook.com/renzomarko"><button>@ondyyyyyyyy</button></a>
                </div>
                <div class="ig-box">
                    <center><label for="ig">Instagram</label><br></center>
                    <a href="https://www.instagram.com/ondyyyyyyyy/"><button>@ondyyyyyyyy</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-subcontainer-2">
       <div class="contact-us-container">
           <h1 class="title">Feel free to contact us!</h1>
           <form class="contact-form-container" action="mailto:polopdoandres@gmail.com" method="POST">
               <div class="contact-input">
                <label for="fullname">Name</label><br>
                <input type="text" name="fullname" placeholder="Enter your name" required>
               </div>
               <div class="contact-input">
                  <label for="email">Email Address</label><br>
                  <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="contact-input">
                    <label for="message">Message</label><br>
                    <textarea placeholder="Enter your message..." name="message">
                        
                    </textarea>
                </div>
                    <button class="submit btn-primary">Submit</button>
           </form>
       </div>
    </div>
</div>

@endsection