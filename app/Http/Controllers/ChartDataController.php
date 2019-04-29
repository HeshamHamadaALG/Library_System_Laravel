<?php

namespace App\Http\Controllers;

use App\Lease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ChartDataController extends Controller
{

	function getAllMonths(){

		$month_array = array();
		// $leases_dates = Lease::orderBy( 'created_at', 'ASC' )->pluck( 'created_at' );
		$leases_dates = Lease::orderBy( 'created_at', 'ASC' )->pluck( 'created_at' );
		$leases_dates = json_decode( $leases_dates );
		// var_dump($leases_dates);
		
		if ( ! empty( $leases_dates ) ) {
			foreach ( $leases_dates as $unformatted_date ) {
				$date = new \DateTime( $unformatted_date );
				$month_no = $date->format( 'm' );
				$month_name = $date->format( 'M' );
				$month_array[ $month_no ] = $month_name;
			}
		}
		return $month_array;
	}

	function getMonthlyLeaseProfit( $month ) {
		// $monthly_lease_profit = Lease::whereMonth( 'created_at', $month )->get()->profit();
		$monthly_lease_profit = Lease::whereMonth( 'created_at', $month )->get()->sum('price');
		// var_dump($monthly_lease_profit);
		return $monthly_lease_profit;
	}

	function getMonthlyLeaseData() {

		$monthly_lease_profit_array = array();
		$month_array = $this->getAllMonths();
		$month_name_array = array();
		if ( ! empty( $month_array ) ) {
			foreach ( $month_array as $month_no => $month_name ){
				$monthly_lease_profit = $this->getMonthlyLeaseProfit( $month_no );
				array_push( $monthly_lease_profit_array, $monthly_lease_profit );
				array_push( $month_name_array, $month_name );
			}
		}
		// $max_no=0;
		$max_no = max( $monthly_lease_profit_array) ;
		$max = round(( $max_no + 10/2 ) / 10 ) * 10;
		$monthly_lease_data_array = array(
			'months' => $month_name_array,
			'lease_profit_data' => $monthly_lease_profit_array,
			'max' => $max,
		);

		return $monthly_lease_data_array;

    }
}
