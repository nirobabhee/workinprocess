<?php

namespace App\Models;

use CodeIgniter\Model;

class Bom_m extends Model
{
    protected $column_order = array('sl','bom_id','bom_fg_id','bom_fg_attribute','bom_created_by','bom_approved_by','bom_details','bom_status','bom_authorization','bom_json');
    protected $order = array('bom_id' => 'asc');
    public function get_all_table_data($tbl_name, $column_name)
    {     
        $builder = $this->db->table($tbl_name);
        $builder->select($column_name);
        $query = $builder->get();
        $result = $query->getResult();
        if ($result) {
            return $result;
        } else {
            return '';
        }
    }

    public function get_matched_values($tbl, $column_name, $val)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($tbl);
        $builder->select($column_name);
        $builder->like($column_name, $val);
        $builder->distinct();
        $query = $builder->get();
        $result = $query->getResult();
        if ($result) {
            return $result;
        } else {
            return '';
        }
    }

    public function bom_create($bom)
    {
        $data = [
            'bom_details'=>json_encode($bom),
        ];
       
        $builder = $this->db->table("bom");
        return $builder->insert($data);
    }

    //data table bom details by fg id
    public function get_bom_details_by_fg_id()
    {
        $builder = $this->db->table("bom");
        $builder = $builder->where("bom_id", 4);
                $query = $builder->select("*")
                ->get();

            return $query->getRow();
        //search
        // if ($_POST['search']['value']) {
        //     $search = $_POST['search']['value'];
        //     $query = "bom_fg_id LIKE '%$search%'";
        // } else {
        //     $query = "bom_id !=''";
        // }

        // //order
        // if (isset($_POST["order"])) {
        //     $result_order = $this->column_order[$_POST['order']['0']['column']];
        //     $result_dir = $_POST['order']['0']['dir'];
        // } else if ($this->order) {
        //     $order = $this->order;
        //     $result_order = Key($order);
        //     $result_dir = $order[Key($order)];
        // }
        // if ($_POST["length"] != -1) {
        //     $query = $builder->select("*")
        //         ->where($query)
        //         ->orderBy($result_order, $result_dir)
        //         ->limit($_POST["length"], $_POST["start"])
        //         ->get();

        //     return $query->getResult();
        // }
    }
    public function get_all_bom_count()
    {
        $builder = $this->db->table("bom");
        // $builder->where('menu_admin_type', $_POST["menu_type"]);
        $query = $builder->countAllResults();

        // $query = "SELECT COUNT(id) as rowcount FROM users";
        // $query = $db->query($query)->getRow();
        // print_r($query);
        return $query;
    }

    public function get_all_bom_filtered()
    {
        // $menu_type = $_POST["menu_type"];
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $query = "AND (bom_id LIKE '%$search%')";
        } else {
            $query = "";
        }

        $db = \Config\Database::connect();

        $query2 = "SELECT COUNT(bom_id) as rowcount FROM bom WHERE  bom_id !='' $query";
        $query2 = $db->query($query2)->getRow();
        return $query2;
    }
    //dt side menu ends
}
