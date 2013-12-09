<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of common_model
 *
 * @author Huynh
 */
class Common_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('common_enum');
        
    }
    
    public function getCurrentDate($str_format) {
        $UTC = new DateTimeZone("UTC");
        $newTZ = new DateTimeZone("Asia/Ho_Chi_Minh");
        $date = new DateTime( date($str_format), $UTC );
        $date->setTimezone( $newTZ );
        return $date->format($str_format);
    }
    
}
