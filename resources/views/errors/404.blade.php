@extends('layouts.default')

@section('title_page') 404 Page Not Found @stop

@section('content')
	<div class="jumbotron" style="margin-top: 30vh; background-color: #BB3D3D; color: #fff;">
		<div class="container text-center">
			<h1>404 Page Not Found</h1>
			<p>This page not found</p>
			<p>
				<a href="{{url('/')}}" class="btn btn-primary btn-lg">Back to home page</a>
			</p>
		</div>
	</div>
@stop