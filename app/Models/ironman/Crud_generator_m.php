<?php

namespace App\Models\ironman;

use CodeIgniter\Model;

class Crud_generator_m extends Model
{
    protected $table = 'rm';
    protected $primaryKey = 'rm_id';
    protected $allowedFields = ['rm_id', 'rm_name', 'rm_sku', 'rm_category', 'rm_attribute', 'rm_unit_price', 'rm_minimum_stock_level', 'rm_maximum_stock_level', 'rm_image', 'rm_tag'];
    protected $column_order = array('sl', 'rm_name', 'rm_sku', 'rm_category', 'rm_attribute', 'rm_unit_price', 'rm_minimum_stock_level', 'rm_maximum_stock_level', 'rm_image', 'rm_tag');
    protected $order = array('rm_id' => 'asc');

    public function get_all_data()
    {
        $builder = $this->db->table("rm");
        $builder->select('rm.*,rm_category.rm_category_name,rm_attribute.rm_attribute_name');
        $builder->join('rm_category', 'rm.rm_category = rm_category.rm_category_id');
        $builder->join('rm_attribute', 'rm.rm_attribute = rm_attribute.rm_attribute_id');
        //search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $query = "rm_name LIKE '%$search%' OR rm_category LIKE '%$search%' OR rm_sku LIKE '%$search%'";
        } else {
            $query = "rm_id !=''";
        }
        //order
        if (isset($_POST["order"])) {
            $result_order = $this->column_order[$_POST['order']['0']['column']];
            $result_dir = $_POST['order']['0']['dir'];
        } else if ($this->order) {
            $order = $this->order;
            $result_order = Key($order);
            $result_dir = $order[Key($order)];
        }
        if ($_POST["length"] != -1) {

            $query = $builder->where($query)
                ->orderBy($result_order, $result_dir)
                ->limit($_POST["length"], $_POST["start"])
                ->get();
            return $query->getResult();
        }
    }
    public function countAll()
    {
        $builder = $this->db->table("rm");
        $query = $builder->countAllResults();
        return $query;
    }
    public function countFiltered()
    {
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $query = "AND (rm_name LIKE '%$search%' OR rm_category LIKE '%$search%' OR rm_sku LIKE '%$search%')";
        } else {
            $query = "";
        }
        $db = \Config\Database::connect();
        $query2 = "SELECT COUNT(rm_id) as rowcount FROM rm WHERE rm_id !='' $query";
        $query2 = $db->query($query2)->getRow();
        return $query2->rowcount;
    }

    /*Common Functions Started*/

    public function get_all_table_data($tbl_name, $column_name)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($tbl_name);
        $builder->select($column_name);
        $query = $builder->get();
        $result = $query->getResult();
        if ($result) {
            return $result;
        } else {
            return '';
        }
    }
    public function get_all_unique_table_data($tbl_name, $column_name)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($tbl_name);
        $builder->select($column_name);
        $builder->distinct();
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
    public function get_data_by_id($tbl, $column_name, $where, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($tbl);
        $builder->select($column_name);
        $builder->where($where, $id);
        $query = $builder->get();
        $result = $query->getRow();
        if ($result) {
            return $result;
        } else {
            return '';
        }
    }
    public function insert_data_into_table($tbl, $data_array)
    {
        $builder = $this->db->table($tbl);
        return $builder->insert($data_array);
    }
    public function update_data_by_id($column_name, $id, $tbl, $data_array)
    {
        $builder = $this->db->table($tbl);
        $builder->set($data_array);
        $builder->where($column_name, $id);
        return $builder->update();
    }
    public function delete_rm($tbl, $rm_id)
    {
        $builder = $this->db->table($tbl);
        $builder->where('rm_id', $rm_id);
        $builder->delete();
    }
}