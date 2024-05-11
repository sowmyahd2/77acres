<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('price_format'))
{
	function price_format($price = '')
	{
		if($price >= 10000000) $price = round($price/10000000) . ' Cr';
		else if($price >= 100000) $price = round($price/100000) . ' Lac';
		else if($price >= 1000) $price = round($price/1000) . ' K';
		return $price;
	}
}