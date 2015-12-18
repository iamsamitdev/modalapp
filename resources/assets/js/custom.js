$(function(){
	// Event newpo Link
	$("a[rel=newpo]").click(function(){
		$.get('poform',function(data){
			$("#pomodal").html(data);
			// เปิด modal
			$(".pomodal").modal('show');
		});
	});


	// Event Add Customer Form
	$('body').on('click','a[rel=addcustomer]',function(){
		$.get('customerform',function(data){
			$("#custmodal").html(data);
			// เปิด modal
			$(".custmodal").modal('show');
		});
	});

	// Event submit Customer
	$('body').on('click','button#submitcust',function(){
		var cuscode = $('input[name=radcus]:checked').val();
		var cusname = $('input[name=radcus]:checked').attr('data-custname');
		$('input[name=cust_code]').val(cuscode);
		$('input[name=cust_name]').val(cusname);
		$(".custmodal").modal('hide');
	});


	// Event Add Product Form
	$('body').on('click','a[rel=addproduct]',function(){
		$.get('productform',function(data){
			$("#productmodal").html(data);
			// เปิด modal
			$(".productmodal").modal('show');
		});
	});


	// Event Submit Product
	$('body').on('click','button#submitproduct',function(){
		
		var rows;
		var procode = [];
		var proname = [];

		$("input[name='product[]']:checked").each(function ()
		{
			procode.push($(this).val());
			proname.push($(this).attr('data-proname'));
		});

		if(procode.length){
			var mytable = "<table class='table table-bordered'>"+
					"<thead>"+
					"<tr>"+
					"<th>ID</th>"+
					"<th>Product Code</th>"+
					"<th>Product Name</th>"+
					"<th>Qty</th>"+
					"<th>Price</th>"+
					"<th>Action</th>"+
					"</tr>"+
					"</thead>"+
					"<tbody>";

			for(rows=1;rows<=procode.length;rows++)
			{
				mytable += "<tr>"+
						"<td>"+rows+"</td>"+
						"<td>"+procode[(rows-1)]+"<input type='hidden' name='procode[]' value='"+procode[(rows-1)]+"'></td>"+
						"<td>"+proname[(rows-1)]+"<input type='hidden' name='proname[]' value='"+proname[(rows-1)]+"'></td>"+
						"<td><input type=\"text\" name=\"qty[]\" id=\"qty\" class=\"form-control\" value=\"1\"></td>"+
						"<td><input type=\"text\" name=\"price[]\" id=\"price\" class=\"form-control\" value=\"1200\"></td>"+
						"<td><a href=\"#delete\" rel='pro_delete' class=\"btn btn-sm btn-danger\">Delete</a></td>"+
					        "</tr>";
			}


			mytable += 	"<tr>"+
					      "<td colspan=\"3\"></td>"+
					      "<td><span id='total_qty'></span></td>"+
					      "<td><span id='total_price'></span></td>"+
					      "<td></td>"+
					"</tr>"+
					"</tbody>"+
					 "</table>";

			$("#product_table").html(mytable);
			$(".productmodal").modal('hide');

		}else{
			alert('กรุณาเลือกอย่างน้อย 1 รายการ');
		}
	
	});


	// หาผลรวมของจำนวนชิ้น
	$('body').on("input","input#qty,input#price",function(){
		sum_qty_and_price();
	});

	// ลบรายการออกจากตาราง
	$("body").on("click","a[rel=pro_delete]",function(){
		$(this).parent().parent().remove();
		sum_qty_and_price();
	});


	// ฟังก์ชันคำนวนจำนวนชิ้นทั้งหมดและราคาสุทธิ
	function sum_qty_and_price()
	{
		var rows;
		var total_qty = 0;
		var total_price = 0;

		var pro_qty = [];
		var pro_price = [];

		// เก็บจำนวนชิ้นลง array
		$("input[name='qty[]']").each(function ()
		{
			pro_qty.push(parseInt($(this).val()));
		});

		// เก็บราคาแต่ละชิ้นลง array
		$("input[name='price[]']").each(function ()
		{
			pro_price.push(parseInt($(this).val()));
		});

		for(rows=1;rows<=pro_qty.length;rows++)
		{
			total_qty += pro_qty[(rows-1)];
			total_price += pro_qty[(rows-1)]*pro_price[(rows-1)];
		}

		$("span#total_qty").text(total_qty);
		$("span#total_price").text(total_price.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
	}



	// Event Submit Order
	$('body').on("click",'button#SubmitOrder',function(){

		var po_no = $("input#po_no").val();
		var cust_group = $("select#cust_group").val();
		var cust_code = $("input#cust_code").val();
		var cust_name = $("input#cust_name").val();
		var _token = $("input[name=_token]").val();

		var procode = [];
		$("input[name='procode[]']").each(function ()
		{
			procode.push($(this).val());
		});

		var proname = [];
		$("input[name='proname[]']").each(function ()
		{
			proname.push($(this).val());
		});

		var qty = [];
		$("input[name='qty[]']").each(function ()
		{
			qty.push($(this).val());
		});

		var price = [];

		$("input[name='price[]']").each(function ()
		{
			price.push($(this).val());
		});

		$.ajax({

			beforeSend:function() { 
				// Loading...
			},

			complete:function() {
				// Close Loading...
			},

			url:'submitOrder',
			type:'POST',
			cache:false,
			data:{
				_token:_token,
				po_no:po_no,
				cust_group:cust_group,
			},

			success: function(data)
			{
				alert(data);
			},

		},"json");
	});

});