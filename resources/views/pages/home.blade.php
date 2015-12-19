@extends('layouts.default')

@section('title_page') Home @stop

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
				<li><a href="{{url('import-csv')}}">Import CSV</a></li>
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
			<h1>Order Data</h1>
		</div>
	</div>

	<div class="container">
		<a href="#NewPO" rel="newpo" class="btn btn-lg btn-primary"><i class="fa fa-plus-square-o"></i> Add new PO</a>
		<table class="table table-bordered top20">
			<thead>
				<tr>
					<th>ID</th>
					<th>PO_NO</th>
					<th>Customer Code</th>
					<th>Customer Name</th>
					<th>Amount</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td><a href="#">PO#001S2</a></td>
					<td>C001</td>
					<td>Samit Koyom</td>
					<td>1800</td>
					<td class="col-md-3">
						<a href="#" class="btn btn-sm btn-primary">View Detail</a>
						<a href="#" class="btn btn-sm btn-success">Print PO</a>
						<a href="#" class="btn btn-sm btn-danger">Delete</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>


	<!--Modal New PO FORM-->
	<div class="modal fade pomodal" data-backdrop="static">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" id="pomodal">
				
			</div>
		</div>
	</div>


	<!--Modal Customer-->
	<div class="modal fade custmodal" data-backdrop="static">
		<div class="modal-dialog modal-sm">
			<div class="modal-content" id="custmodal">
				
			</div>
		</div>
	</div>

	<!--Modal Product-->
	<div class="modal fade productmodal" data-backdrop="static">
		<div class="modal-dialog modal-md">
			<div class="modal-content" id="productmodal">
				
			</div>
		</div>
	</div>

@stop