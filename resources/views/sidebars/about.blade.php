@extends('layouts.app')
@section('content')
<div class="about-container-main">
    <div class="about-subcontainer">
        <h1>Used in Developing this System</h1>
        <div class="about-box">
            <div class="about-info">
               <h2>PHP is a general-purpose scripting<br>
                language especially suited to web<br>
                development. It was originally created<br>
                by Danish-Canadian programmer Rasmus<br>
                Lerdorf in 1994. The PHP reference<br>
                implementation is now produced by The PHP Group.</h2> 
            </div>
            <div class="about-img">
                <img src="/img/php.jpg" alt="php">
            </div>
        </div>
        <div class="about-box">
            <div class="about-img">
                <img src="/img/laravel.png" alt="laravel">
            </div>
            <div class="about-info">
               <h2>Laravel is a free, open-source PHP<br>
                web framework, created by Taylor Otwell<br>
                and intended for the development of web<br>
                applications following the model–view–controller<br>
                architectural pattern and based on Symfony.</p> 
            </div>
        </div>
        <div class="about-box">
            <div class="about-info">
                <h2>JavaScript is high-level, often<br>
                    just-in-time compiled, and multi-paradigm.<br>
                    It has curly-bracket syntax, dynamic typing,<br>
                    prototype-based object-orientation, and<br>
                    first-class functions</h2>
            </div>
            <div class="about-img">
                <img src="/img/js.png" alt="javascript">
            </div>
        </div>
        <div class="about-box">
            <div class="about-info">
                <h2>Cascading Style Sheets is a style sheet language<br>
                     used for describing the presentation of a document<br> 
                     written in a markup language such as HTML. CSS is<br>
                     a cornerstone technology of the World Wide Web,<br> 
                     alongside HTML and JavaScript.</h2>
            </div>
            <div class="about-img">
                <img src="/img/css.png" alt="css">
            </div>     
        </div>
        <div class="about-box">
            <div class="about-img">
                <img src="/img/bootstrap.png" alt="bootstrap">
            </div>
            <div class="about-info">
               <h2>Bootstrap is a free and open-source CSS framework<br> 
                   directed at responsive, mobile-first front-end web<br> 
                   development. It contains CSS- and JavaScript-based<br> 
                   design templates for typography, forms, buttons, navigation,<br>
                   and other interface components.</h2>
            </div>
        </div>
    </div>
</div>
@endsection