<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">ข้อมูลสินค้า</h4>
</div>
<div class="modal-body">
	<table class="table table-bordered">
		<tbody>
			@foreach($product_info as $pro)
			<tr>
				<td>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="product[]" 
							data-proname="{{$pro->ProductName}}" 
							data-qty="1"
							data-price="{{$pro->ProductPrice}}"
							value="{{$pro->ProductCode}}">
							{{$pro->ProductCode}}
						</label>
					</div>
				</td>
				<td>{{$pro->ProductName}}</td>
				<td><input type="text" name="pqty[]" id="pqty" class="form-control" value="1"></td>
				<td><input type="text" name="pprice[]" id="pprice" class="form-control" value="{{$pro->ProductPrice}}"></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="modal-footer">
	<button type="button" id="submitproduct" class="btn btn-primary">Submit</button>
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>