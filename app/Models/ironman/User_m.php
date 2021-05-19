<?php

namespace App\Models;

use CodeIgniter\Model;

class User_m extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_id', 'user_full_name', 'user_email', 'user_phone', 'user_group', 'user_section'];

    protected $column_order = array('sl', 'user_full_name', 'user_email', 'user_phone', 'user_group', 'user_section', 'user_status');
    protected $order = array('user_group' => 'asc');

    //master data query for all table column.
    public function get_all_table_data($table, $columns)
    {
        $builder = $this->db->table($table);
        $builder->select($columns);
        $query = $builder->get();
        $result = $query->getResult();
        if ($result) {
            return $result;
        } else {
            return '';
        }
    }

    // DataTable:_user_list ajax START//
    public function get_all_user()
    {
        $builder = $this->db->table("user");

        $user_session = $_SESSION['login_user']->user_group; // GET SESSION DATA user group

        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $query = "user_full_name LIKE '%$search%' OR user_email LIKE '%$search%' OR user_phone LIKE '%$search%' OR user_group LIKE '%$search%'";
        } else {
            $query = "user_id !=''";
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
            if ($user_session == "developer") {

                $query = $builder->select("*")
                    ->where($query)
                    // ->orderBy($result_order, $result_dir)
                    ->orderBy($result_order, $result_dir)
                    ->limit($_POST["length"], $_POST["start"])
                    ->get();
            } else {
                $query = $builder->select("*")
                    ->where($query)
                    ->where("user_group !=", "developer")
                    ->orderBy($result_order, $result_dir)
                    ->limit($_POST["length"], $_POST["start"])
                    ->get();
            }

            return $query->getResult();
        }
    }

    public function get_all_user_count()
    {
        $user_session = $_SESSION['login_user']->user_group; // GET SESSION DATA user group
        if ($user_session == "developer") {

            $builder = $this->db->table("user");
            $query = $builder->countAllResults();
        } else {
            $builder = $this->db->table("user");
            $builder->where("user_group !=", "developer");
            $query = $builder->countAllResults();
        }


        // $query = "SELECT COUNT(id) as rowcount FROM users";
        // $query = $db->query($query)->getRow();
        // print_r($query);
        return $query;
    }

    public function get_all_user_filtered()
    {
        $user_session = $_SESSION['login_user']->user_group; // GET SESSION DATA user group
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            if ($user_session == "developer") {
                $query = "AND (user_full_name LIKE '%$search%' OR user_email LIKE '%$search%' OR user_phone LIKE '%$search%'  OR user_group LIKE '%$search%')";
            } else {
                $query = "AND user_group !='developer' AND ( AND user_full_name LIKE '%$search%' OR user_email LIKE '%$search%' OR user_phone LIKE '%$search%'  OR user_group LIKE '%$search%')";
            }
        } else {
            if ($user_session == "developer") {
                $query = "";
            } else {
                $query = "AND user_group !='developer' ";
            }
        }

        $db = \Config\Database::connect();

        $query2 = "SELECT COUNT(user_id) as rowcount FROM user WHERE user_id !='' $query";
        $query2 = $db->query($query2)->getRow();
        return $query2;
    }
    //  DataTable:_user_list ajax END//

    //create_user
    public function create_user_submit($user)
    {
        $builder = $this->db->table("user");
        return $builder->insert($user);
    }
    //delete user 

    public function delete_user($user_id)
    {
        $builder = $this->db->table("user");
        $builder->where('user_id', $user_id);
        $builder->delete();
    }
    //user update part starts ↓↓↓↓↓
    public function update_user_submit($user_info)
    {
        $builder = $this->db->table("user");
        $builder->where('user_id', $user_info["user_id"]);
        $builder->update($user_info);
    }
    public function update_user_status($user_status = "", $user_id = "")
    {
        $builder = $this->db->table("user");
        $builder->set('user_status', $user_status);
        $builder->where('user_id', $user_id);
        $builder->update();
    }
    public function update_user_privilege($user_crud = "", $user_id = "")
    {
        $builder = $this->db->table("user");
        $builder->set('user_crud', $user_crud);
        $builder->where('user_id', $user_id);
        $builder->update();
    }

    //user update part ends ↑↑↑↑↑

    //get user by id

    // public function get_user_by_id($user_id)
    // {
    //     $builder = $this->db->table("user");
    //     $builder->where('user_id', $user_id);
    //     $query = $builder->get()->getRow();
    //     return $query;
    // }
}
