<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">ข้อมูลลูกค้า</h4>
</div>
<div class="modal-body">
	<table class="table table-bordered">
		<tbody>
			@foreach($cust_info as $cs)
			<tr>
				<td>
					<div class="radio">
						<label>
							<input type="radio" name="radcus" 	data-custname="{{$cs->CustName}}" value="C{{str_pad($cs->CustCode,3,'0',STR_PAD_LEFT)}}">
							C{{str_pad($cs->CustCode,3,'0',STR_PAD_LEFT)}}
						</label>
					</div>
				</td>
				<td>{{$cs->CustName}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="modal-footer">
	<button type="button" id="submitcust" class="btn btn-primary">Submit</button>
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
