<?php

/**
 * This class will handle all category based data
 * User: Ushan
 * Date: 11/17/2015
 * Time: 5:58 AM
 */
class category_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    /**
     * This method will return all the categories available in database
     */
    function  getAllCategories(){
        $query = $this->db->query("SELECT category_name FROM category");
        return $query->result_array();
    }

}