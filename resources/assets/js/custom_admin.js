$(function(){
	$("button#btn_add_product").click(function(){

		var rows;
		var checked = []

		$("input[name='options[]']:checked").each(function ()
		{
			// if is number
		    	//checked.push(parseInt($(this).val()));
		    	checked.push($(this).val());
		});

		var mytable = "<table class='table table-bordered'>"+
				   "<thead>"+
					"<tr>"+
						"<th>ID</th>"+
						"<th>Code</th>"+
						"<th>Name</th>"+
						"<th>Amount</th>"+
						"<th>Price</th>"+
						"<th>Action</th>"+
					"</tr>"+
				"</thead>"+
				"<tbody>";

		for(rows=1;rows<=checked.length;rows++)
		{
			mytable += "<tr>"+
						"<td>"+rows+"</td>"+
						"<td>"+checked[(rows-1)]+"</td>"+
						"<td>Bed and foame</td>"+
						"<td>3</td>"+
						"<td>1245</td>"+
						"<td>Delete</td>"+
					"</tr>";
		}


		mytable += "</tbody>"+
			        "</table>";

		

		//console.log(checked.length);
		$("#showresult").html(mytable);
	});
});