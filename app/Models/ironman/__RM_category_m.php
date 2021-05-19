<?php

namespace App\Models;

use CodeIgniter\Model;

class RM_category_m extends Model
{
    protected $table = 'rm_category';
    protected $primaryKey = 'rm_category_id';
    
    protected $allowedFields = ['rm_category_name', 'rm_category_chain_parent', 'rm_category_chain_child', 'rm_category_status'];
    protected $validationRules = [
        'rm_category_name' => 'required'
    ];
    
    protected $validationMessages = [
        'description' => [
            'required' => 'Please enter a Category Name'
        ]
    ];
    // For Data table
    protected $column_order = array('rm_category_id','rm_category_name','rm_category_chain_parent','rm_category_chain_child','rm_category_status');
    protected $order = array('rm_category_id'=>'asc');
    


    public function insert_category($data)
    {       
        $pre_data=$this->get_row_by_id($data['rm_category_chain_parent']);
        if(isset($pre_data) && $pre_data->rm_category_chain_parent)
        {
            $parent_ids=$pre_data->rm_category_chain_parent;
        }else{
            $parent_ids=$data['rm_category_chain_parent'];
        }
        $db = db_connect('default'); 
        $builder = $this->db->table($this->table);
        $builder->insert($data);
        $insertId= $db->insertID();

        if($insertId) //  For Update
        {
            $category_info = [                           
                "rm_category_chain_parent" => $parent_ids ? $parent_ids.','. $insertId : $insertId,
                "rm_category_chain_child" =>$insertId,
            ];
            $this->update_by_id($category_info,$insertId);
            return $insertId;
        }else{
            return false;
        }
        
    }

    public function update_by_id($data,$id)
    {
        $db = db_connect('default'); 
        $builder = $this->db->table($this->table)->where('rm_category_id',$id);
        $builder->update($data);
    }

    public function get_row_by_id($id)
    {
        $row=$this->db->table($this->table)->where('rm_category_id',$id)->get()->getRow();	
        return $row;
    }

    public function get_last_id()
    {
        $last_id=$this->db->table($this->table)->orderBy('rm_category_id','desc')->limit(1)->get()->getRow();	
        return $last_id;
    }

    public function get_all()
    {
        $categories=$this->db->table($this->table)->get()->getResult();	
        return $categories;
    }

   

    public function get_detail($a)
    {
        $last_id=$this->db->table($this->table)->where('rm_category_id',$a)->get()->getRow();	
        return $last_id;     
    }

    // For Datatable 
    public function get_all_categories_ajax()
    {
        // $categories=$this->db->table($this->table)->get()->getResult();	
        // return $categories;    
            $categories = $this->db->table($this->table);
            //search
            if($_POST['search']['value']){
                $search = $_POST['search']['value'];
                $query = "rm_category_name LIKE '%$search%'";
            }
            else{
                $query = "rm_category_id !=''";
            }    
            //order
            if(isset($_POST["order"])){
                $result_order = $this->column_order[$_POST['order']['0']['column']];
                $result_dir = $_POST['order']['0']['dir'];    
            }
            else if($this->order){
                $order = $this->order;
                $result_order = Key($order);
                $result_dir = $order[Key($order)];
            }
            if($_POST["length"]!=-1){
                $query = $categories->select("*")
                                ->where($query)
                                ->orderBy($result_order,$result_dir)
                                ->limit($_POST["length"],$_POST["start"])
                                ->get();
    
                return $query->getResult();
    
            }
       

    }

    public function get_all_rm_category_count()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->countAllResults();
       
        // $query = "SELECT COUNT(id) as rowcount FROM users";
        // $query = $db->query($query)->getRow();
        // print_r($query);
        return $query;

    }

    public function get_all_rm_category_filtered()
    {
        if($_POST['search']['value']){
            $search = $_POST['search']['value'];
            $query = "AND (rm_category_name LIKE '%$search%')";
        }
        else{
            $query = "";
        }

        $db = \Config\Database::connect();

        $query2 = "SELECT COUNT(rm_category_id) as rowcount FROM $this->table WHERE rm_category_id !='' $query";
        $query2 = $db->query($query2)->getRow();
        return $query2;
    }



}


