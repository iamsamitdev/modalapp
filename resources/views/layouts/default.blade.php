<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       	<title>
	@section('title_page')
	  |  Laravel Modal App
	@show
	</title>
	@include('includes._begin')
	@yield('stylesheet')
    </head>
    <body>
        <div class="container-fluid">
        	@yield('content')
        </div>
    
    	@include('includes._end')
    	@yield('scripts')
    </body>
</html>