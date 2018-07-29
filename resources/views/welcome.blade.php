@extends('layouts.app')
        <title>Road Trips</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 80vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

 
@section('content')   
    
        <div class="flex-center position-ref full-height">
        

            <div class="content">
            
                <div class="title m-b-md">
                
                    Road Trips
                    
                </div>
                
                @if(!Auth::check())
                
                <div>
                 
                    <h3>To create a new Road trip please sign in or register a new account</h3>
                    
                </div>
                
				@endif
				
                <div class="links">
                
                    <a href="{{ route('roadtrips') }}">View Road Trips</a>
                    
                    @if(Auth::check())
                    
                    <a href="{{ route('roadtrip.create') }}">Create a new Road trip</a>
                    
                    @endif
                    
                </div>
            </div>
        </div>
        @stop
    </body>
</html>
