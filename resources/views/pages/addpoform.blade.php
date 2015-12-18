<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">New PO</h4>
</div>
<div class="modal-body">
	<form class="form-horizontal">
		<div class="form-group">
			<label class="col-sm-2 control-label">PO No</label>
			<div class="col-sm-10">
				 <input type="text" class="form-control" name="po_no" id="po_no">
			</div>
		</div>


		<div class="form-group">
			<label class="col-sm-2 control-label">Customer Group</label>
			<div class="col-sm-10">
				 <select name="cust_group" id="cust_group" class="form-control">
				 	@foreach($cust_group as $cg)
				 		<option value="{{$cg->CustGroup}}">{{$cg->CustGroup}}</option>
				 	@endforeach
				 </select>
			</div>
		</div>


		<div class="form-group">
			<label class="col-sm-2 control-label">Customer Code</label>
			<div class="col-sm-10">
				<div class="row">
					<div class="col-md-10">
				 		<input type="text" class="form-control" name="cust_code" id="cust_code">
					</div>
					<div class="col-md-2">
						<a href="#addcust" rel="addcustomer" class="btn btn-block btn-primary">
						<i class="fa fa-plus-square-o"></i> Add</a>
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Customer Name</label>
			<div class="col-sm-10">
				 <input type="text" class="form-control" name="cust_name" id="cust_name">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Scan Barcode</label>
			<div class="col-sm-10">
				<div class="row">
					<div class="col-md-10">
						 <input type="text" class="form-control" name="bar_code" id="bar_code">
					</div>
					<div class="col-md-2">
						<a href="#addproduct" rel="addproduct" class="btn btn-block btn-primary">
						<i class="fa fa-plus-square-o"></i> Add</a>
					</div>
				</div>
			</div>
		</div>

		<input type="hidden" name="_token" value="{{csrf_token()}}">
	
	</form>

	<div id="product_table">
		
	</div>

</div>
<div class="modal-footer">
	<button type="button" id="SubmitOrder" class="btn btn-primary">Submit Order</button>
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
