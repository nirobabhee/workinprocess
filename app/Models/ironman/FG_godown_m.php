<?php

namespace App\Models;

use CodeIgniter\Model;

class FG_godown_m extends Model
{
    protected $table = 'fg_godown';
    protected $primaryKey = 'fg_godown_id';

    protected $allowedFields = ['fg_godown_name', 'fg_godown_chain_parent', 'fg_godown_chain_child', 'fg_godown_status'];
    protected $validationRules = [
        'fg_godown_chain_parent' => 'required',
        'fg_godown_status' => 'required'
    ];

    protected $validationMessages = [
        'description' => [
            'required' => 'Please enter a FG godown Name'
        ]
    ];
    public function create_fg_godown($fg_godown_info)
    {
        $pre_data = $this->get_row_by_id($fg_godown_info['fg_godown_chain_parent']);
        if (isset($pre_data) && $pre_data->fg_godown_chain_parent) {
            $parent_ids = $pre_data->fg_godown_chain_parent;
        } else {
            $parent_ids = $fg_godown_info['fg_godown_chain_parent'];
        }
        $db = db_connect('default');
        $builder = $this->db->table($this->table);
        $builder->insert($fg_godown_info); //insert
        $insertId = $db->insertID();

        if ($insertId) //For Update
        {
            $fg_godown_info = [
                "fg_godown_chain_parent" => $parent_ids ? $parent_ids . ',' . $insertId : $insertId,
                "fg_godown_chain_child" => $insertId,
            ];
            $this->update_by_id($fg_godown_info, $insertId);
            return $insertId;
        } else {
            return false;
        }
    }
    public function update_by_id($data, $id)
    {
        $db = db_connect('default');
        $builder = $this->db->table($this->table)->where('fg_godown_id', $id);
        $builder->update($data);
    }
    public function get_row_by_id($id)
    {
        $row = $this->db->table($this->table)->where('fg_godown_id', $id)->get()->getRow();
        return $row;
    }
    public function get_last_id()
    {
        $last_id = $this->db->table($this->table)->orderBy('fg_godown_id', 'desc')->limit(1)->get()->getRow();
        return $last_id;
    }
    public function get_all_fg_godown()
    {
        $categories = $this->db->table($this->table)->get()->getResult();
        return $categories;
    }
    public function get_detail($id)
    {
        $last_id = $this->db->table($this->table)->where('fg_godown_id', $id)->get()->getRow();
        return $last_id;
    }
    public function update_fg_godown_status($fg_godown_status = "", $fg_godown_id = "")
    {
        $builder = $this->db->table("fg_godown");
        $builder->set('fg_godown_status', $fg_godown_status);
        $builder->where('fg_godown_id', $fg_godown_id);
        $builder->update();
    }
}
