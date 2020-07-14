<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="_token" content="{{ csrf_token() }}">
		<meta name="description" content="">
        <meta name="author" content="">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ mix('css/all.css') }}">
        @yield('css')
    </head>
        <body class="large-sidebar fixed-sidebar fixed-header content-appear">
            <div class="wrapper">
    
                <!-- Sidebar -->
                @include ('backend.partials.sidebar')
    
                <!-- Header -->
                @include ('backend.partials.header')
    
                <div class="site-content">
                    <!-- Content -->
                    <div class="content-area p-y-1">
                        @yield('content')
                    </div>
                    <!-- Footer -->
                    <footer class="footer">
                        @include ('backend.partials.footer')
                    </footer>
                </div>
    
            </div>
    
           <!--js-->
           <script src="{{ mix('js/all.js') }}"></script>
           @yield('script')
        </body>