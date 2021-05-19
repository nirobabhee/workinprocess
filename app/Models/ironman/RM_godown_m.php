<?php

namespace App\Models;

use CodeIgniter\Model;

class RM_godown_m extends Model
{
    protected $table = 'rm_godown';
    protected $primaryKey = 'rm_godown_id';

    protected $allowedFields = ['rm_godown_name', 'rm_godown_chain_parent', 'rm_godown_chain_child', 'rm_godown_status'];
    protected $validationRules = [
        'rm_godown_chain_parent' => 'required',
        'rm_godown_status' => 'required'
    ];

    protected $validationMessages = [
        'description' => [
            'required' => 'Please enter a RM godown Name'
        ]
    ];
    public function create_rm_godown($rm_godown_info)
    {
        $pre_data = $this->get_row_by_id($rm_godown_info['rm_godown_chain_parent']);
        if (isset($pre_data) && $pre_data->rm_godown_chain_parent) {
            $parent_ids = $pre_data->rm_godown_chain_parent;
        } else {
            $parent_ids = $rm_godown_info['rm_godown_chain_parent'];
        }
        $db = db_connect('default');
        $builder = $this->db->table($this->table);
        $builder->insert($rm_godown_info); //insert
        $insertId = $db->insertID();

        if ($insertId) //For Update
        {
            $rm_godown_info = [
                "rm_godown_chain_parent" => $parent_ids ? $parent_ids . ',' . $insertId : $insertId,
                "rm_godown_chain_child" => $insertId,
            ];
            $this->update_by_id($rm_godown_info, $insertId);
            return $insertId;
        } else {
            return false;
        }
    }
    public function update_by_id($data, $id)
    {
        $db = db_connect('default');
        $builder = $this->db->table($this->table)->where('rm_godown_id', $id);
        $builder->update($data);
    }
    public function get_row_by_id($id)
    {
        $row = $this->db->table($this->table)->where('rm_godown_id', $id)->get()->getRow();
        return $row;
    }
    public function get_last_id()
    {
        $last_id = $this->db->table($this->table)->orderBy('rm_godown_id', 'desc')->limit(1)->get()->getRow();
        return $last_id;
    }
    public function get_all_rm_godown()
    {
        $categories = $this->db->table($this->table)->get()->getResult();
        return $categories;
    }
    public function get_detail($id)
    {
        $last_id = $this->db->table($this->table)->where('rm_godown_id', $id)->get()->getRow();
        return $last_id;
    }
     // --------------------RMg status Updated-------------------------
     public function update_list_of_rmg_status($rmg_status = "", $rmg_id = "")
     {
         $builder = $this->db->table("rm_godown");
         $builder->set('rm_godown_status', $rmg_status);
         $builder->where('rm_godown_id', $rmg_id);
         $builder->update();
     }
     // -----------------------RMg status Updated----------------------
}
