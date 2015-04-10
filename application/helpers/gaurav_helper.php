<?php



function is_loogedin(){

$CI =& get_instance();

if($CI->session->userdata('Dsessionid')) return true;
else return false;

}
