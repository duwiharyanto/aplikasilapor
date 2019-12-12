<?php
	class Route extends CI_Controller
	{
		
		function __construct(){
			parent::__construct();
		}

		function index(){
			redirect(site_url('bukutamu'));
		}	
	
	}
?>