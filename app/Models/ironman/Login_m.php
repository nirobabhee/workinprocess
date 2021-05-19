<?php

namespace App\Models;

use CodeIgniter\Model;

class Login_M extends Model
{
    public function check_login($login_info)
    {
        $builder = $this->db->table("user");
        if (strpos($login_info["user_email_or_phone"], "@")) { // if string contains @ then it's email
            $query = $builder->select("*")
                ->where("user_email", $login_info["user_email_or_phone"])
                ->where("user_password", $login_info["user_password"])
                ->get();
        } else {
            $query = $builder->select("*")
                ->where("user_phone", $login_info["user_email_or_phone"])
                ->where("user_password", $login_info["user_password"])
                ->get();
        }
        return $query->getRow();
    }
    public function update_user_login_status($user_status, $column_name, $id)
    {
        $builder = $this->db->table("user");
        $builder->set($user_status);
        $builder->where($column_name, $id);
        return $builder->update();
    }
    public function get_data_by_condition($columns, $tbl, $condition_column1, $condition_column2, $value1, $value2)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($tbl);
        $builder->select($columns);
        $builder->where($condition_column1, $value1);
        $builder->where($condition_column2 . '!=', $value2);
        $query = $builder->get();
        $result = $query->getResult();
        if ($result) {
            return $result;
        } else {
            return '';
        }
    }
}