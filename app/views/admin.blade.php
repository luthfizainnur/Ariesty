<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ariesty Cake</title>
    </head>

    <body>
        <div class="wrapper">
            <div class="navbar navbar-inverse">
                @include('menuadmin')
            </div>

            <div class="container">
                @include('notifikasi')
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>


        <!-- Bootstrap core css -->
        {{HTML::style('asset/bootstrap/css/bootstrap.css/')}}

        <!-- javascript -->
        {{HTML::script('asset/bootstrap/js/jquery.js/')}}
        @yield('javascript')
        <div class="footer">
            @include('footer')
        </div>
    </body>
</html>
