<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\Helper; // เรียกใช้ Helper
use DB;

use Illuminate\Http\Request;

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


	public function customerform()
	{
		$cust_info = DB::table('customers')->get();
		return view('pages.addcustform')->with('cust_info',$cust_info);
	}

	public function productform()
	{
		$product_info = DB::table('products')->get();
		return view('pages.productform')->with('product_info',$product_info);
	}

	public function submitOrder()
	{
		return "OK";
	}

}
