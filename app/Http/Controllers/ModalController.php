<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\Helpers\Helper; // เรียกใช้ Helper
use DB;
use Mail;

class ModalController extends Controller {

	public function home()
	{
		//return Helper::CustCode(5);
		return view('pages.home');
	}

	public function poform()
	{
		$cust_group = DB::table('customers')->groupBy('CustGroup')->get(['CustGroup']);
		//dd($cust_group);
		return view('pages.addpoform')->with('cust_group',$cust_group);
	}


	public function customerform($group)
	{
		$cust_info = DB::table('customers')->where('CustGroup',$group)->get();
		return view('pages.addcustform')->with('cust_info',$cust_info);
	}

	public function productform()
	{
		$product_info = DB::table('products')->get();
		return view('pages.productform')->with('product_info',$product_info);
	}

	public function submitOrder()
	{
		if(!empty(Request::input('po_no')))
		{
			$data_po_head = array(
				'PoNo'			=> Request::input('po_no'),
				'CustCode'		=> Request::input('cust_code'),
				'CusName'		=> Request::input('cust_name'),
				'created_at'		=> date('Y-m-d H:i:s')
			);

			// Insert to po_heads
			$po_head_insert = DB::table('po_heads')->insertGetId($data_po_head);

			// Insert to po_details
			if($po_head_insert){
				// รับค่าจาก jQuery
				$getprocode = Request::input('procode');
				$getproname = Request::input('proname');
				$getqty = Request::input('qty');
				$getprice = Request::input('price');

				$count_po = count($getprocode);

				// ต้องเลือกรายสินค้าอย่างน้อย 1 รายการ
				if($count_po)
				{
					for($i=0;$i<$count_po;$i++)
					{
						$data_podetail = array(
							'Po_Head_Id'	=> $po_head_insert,
							'ProductCode'	=> $getprocode[$i],
							'ProductName'	=> $getproname[$i],
							'Qty'		=> $getqty[$i],
							'UnitPrice'	=> $getprice[$i],
							'created_at'	=> date('Y-m-d H:i:s')
						);

						 DB::table('po_details')->insert($data_podetail);
					}

					return "Insert_Success";
				}

			}
		}
	}



	################################# News Letter #############################3
	public function newsletter()
	{
		return view('pages.news-letter');
	}

	public function postnewsletter()
	{
		/*
		$data = array(
			'fullname' 	=> Request::input('fullname'),
			'email'		=> Request::input('email'),
			'message'	=> Request::input('message'),
			'from' 		=> 'contact@itgenius.in.th',
               		'from_name' 	=> 'IT GENIUS'
		);

		if(!empty($data['email']))
		{
			Mail::send('emails.newsletter',$data,function($msg) use ($data){
				$msg->from($data['from'], $data['from_name']);
				$msg->cc('contact@itgenius.co.th');
				$msg->bcc('itgenius2015@gmail.com');
				$msg->to($data['email'],$data['fullname']);
				$msg->subject('IT Genius Newsletter');
			});

			return "Send mail successfully";
		}
		*/

		$data_user_mail = DB::table('customers')->get(['CustName','email']);
		//dd($data_user_mail);

		foreach ($data_user_mail as $duser)
		{
			$data = array(
		                    'email'                	=> $duser->email,
		                    'CustName'           => $duser->CustName,
		                    'from' 		=> 'samitkoyom@gmail.com',
               		        'from_name' 	=> 'Samit Koyom'                  
		               );

			Mail::send('emails.newsletter',$data,function($msg) use ($data){
				$msg->from($data['from'], $data['from_name']);
                    			$msg->to($data['email'],$data['CustName']);
                    			$msg->subject('IT Genius Newsletter');
			});
		}

		// เช็คสถานะการส่ง
              	 if(count(Mail::failures()) > 0 ) {
              	 	echo "There was one or more failures. They were: <br />";
	            		foreach(Mail::failures as $email_address) {
	                         		echo " - $email_address <br />";
	             	}
              	 }else {
                        		echo "No errors, all sent successfully!";
               	}
	}


	##################### Import CSV ##################
	public function importcsv()
	{
		return view('pages.import-csv');
	}

	public function postimportcsv()
	{
		function csv_to_array($filename='', $delimiter=',')
		{
			  if(!file_exists($filename) || !is_readable($filename))
			  {
			  	return FALSE;
			  }else{
			  	$header = NULL;
	                        		$data = array();

	                        		if (($handle = fopen($filename, 'r')) !== FALSE)
	                        		{
	                        			while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
	                            		{
	                            			 if(!$header){
				                                    $header = $row;
	                            			 }else{
				                                    $data[] = array_combine($header, $row);
	                            			 }
	                            		}
	                            		fclose($handle);
	                        		}
	                        		 return $data;
			  }
		}

		 if (Request::hasFile('myfile')){
		 	$file = Request::file('myfile');
		 	$name = time() . '-' . $file->getClientOriginalName();
		 	$extension = Request::file('myfile')->getClientOriginalExtension();

		 	// Check file extension
		 	if($extension=="csv")
		 	{
		 		// Path to upload file
		 		 $path = 'resources/assets/csvfile';

		 		// Moves file to folder on server
		 		if($file->move($path, $name))
		 		{
		 			$csvFile = 'resources/assets/csvfile/'.$name;
					$areas = csv_to_array($csvFile);

					// import to db
					DB::table('books')->insert($areas);

					return "Import Successfully";
		 		}

		 	}else{
		 		return "This extension file not allow to import !!!";
		 	}
		 }
	}


	################### API Customer ########################
	public function apicustomers()
	{
		$data_customer = DB::table('customers')->get();
		return Helper::prettyJson($data_customer, 200);
	}

}
