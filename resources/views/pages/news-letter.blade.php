@extends('layouts.default')

@section('title_page') New Letter @stop

@section('content')
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{url('/')}}">Modal App</a>
		</div>
	
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			
			<ul class="nav navbar-nav">
				<li ><a href="#">Category</a></li>
				<li><a href="#">Product</a></li>
				<li><a href="#">Order</a></li>
				<li><a href="#">Customer</a></li>
				<li><a href="#">Report</a></li>
				<li><a href="{{url('news-letter')}}">News Letter</a></li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
				</form>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li><a href="#">Separated link</a></li>
					</ul>
				</li>
			</ul>
			
		</div><!-- /.navbar-collapse -->
		</div>
	</nav>

	<div class="jumbotron">
		<div class="container">
			<h1>News Letter</h1>
		</div>
	</div>

	<div class="container">
		<form action="{{url('news-letter')}}" method="POST" role="form">
			<h2>Send Letter</h2>
		
			<div class="form-group">
				<label >Fullname</label>
				<input type="text" class="form-control" name="fullname">
			</div>

			<div class="form-group">
				<label >Email</label>
				<input type="text" class="form-control" name="email">
			</div>

			<div class="form-group">
				<label >Message</label>
				<textarea name="message" class="form-control" rows="3"></textarea>
			</div>

			<input type="hidden" name="_token" value="{{csrf_token()}}">

			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-primary" value="Send">
			</div>
		</form>
	</div>
@stop