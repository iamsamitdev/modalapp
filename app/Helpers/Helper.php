<?php namespace App\Helpers;

class Helper
{
	public static function CustCode($code)
	{
		$CodeFormat = str_pad($code,3,'0',STR_PAD_LEFT);
		return $CodeFormat;
	}

	public static function prettyJson($inputArray, $statusCode)
	{
		  return response()->json($inputArray, $statusCode, array('Content-Type'=> 'application/json'),JSON_PRETTY_PRINT);
	}
}