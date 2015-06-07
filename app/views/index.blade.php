<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ariesty Cake</title>
    </head>
                
    <body>
        <div class="wrapper">
            <div class="navbar navbar-inverse navbar-fixed-top inverse">
                @include('menu')
            </div>
        
            <div class="container">
                <div class="content">

                </div>
            </div>
        </div>
                
        @yield('content')
    <!-- Bootstrap core css -->
    {{HTML::style('asset/bootstrap/css/bootstrap.css/')}}
            
    <!-- javascript -->
    {{HTML::script('asset/bootstrap/js/jquery.js/')}}
        @yield('javascript')
    </body>
</html>
