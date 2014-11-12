<?php

	/*
	 * Class for store utm in cookie
	 *
	 * Usege:
	 *		$UTM = new UTMCookie;
	 *		$UTM->readURL(); // try to get new utm from URL
	 *		print_Rr( $UTM->last() ); // print array('utm_medium' => 'value', 'utm_source' => 'value', 'utm_campaign' => 'value', 'utm_term' => 'value', 'utm_content' => 'value')
	 *
	 *
	*/

class UTMCookie { 

	private $UTM = array('first' => false, 'last' => false);
	private $utmList = array('utm_medium', 'utm_source', 'utm_campaign', 'utm_term', 'utm_content');

	function __construct(){
		if( !empty($_COOKIE['UTMCOOKIE']) )
			$this->UTM = json_decode($_COOKIE['UTMCOOKIE'], true);
		setcookie('UTMCOOKIE', json_encode($this->UTM));
	}

	private function write( $input ){
		if( empty($this->UTM['first']) )
			$this->UTM['first'] = $input;
		if( empty($this->UTM['last']) || $this->UTM['last']['utm_source'] != $input['utm_source'] )
			$this->UTM['last'] = $input;
	}

	public function readURL(){
		if( $_GET['utm_source'] ){
			foreach ($this->utmList as $utm_value) 
				if( !empty($_GET[$utm_value]) )
					$utm[$utm_value] = $_GET[$utm_value];

			$this->write( $utm );
			return true;
		}else
			return false;
	}

	public function last(){
		return $this->UTM['last'];
	}
	public function first(){
		return $this->UTM['first'];
	}

}
