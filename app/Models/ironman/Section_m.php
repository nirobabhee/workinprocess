<?php

namespace App\Models;

use CodeIgniter\Model;

class Section_m extends Model
{
    protected $table = 'section';
    protected $primaryKey = 'section_id';

    protected $allowedFields = ['section_name', 'section_chain_parent', 'section_chain_child', 'section_status'];
    protected $validationRules = [
        'section_chain_parent' => 'required',
        'section_status' => 'required'
    ];

    protected $validationMessages = [
        'description' => [
            'required' => 'Please enter a Section Name'
        ]
    ];
    public function create_section($section_info)
    {
        $pre_data = $this->get_row_by_id($section_info['section_chain_parent']);
        if (isset($pre_data) && $pre_data->section_chain_parent) {
            $parent_ids = $pre_data->section_chain_parent;
        } else {
            $parent_ids = $section_info['section_chain_parent'];
        }
        $db = db_connect('default');
        $builder = $this->db->table($this->table);
        $builder->insert($section_info); //insert
        $insertId = $db->insertID();

        if ($insertId) //For Update
        {
            $section_info = [
                "section_chain_parent" => $parent_ids ? $parent_ids . ',' . $insertId : $insertId,
                "section_chain_child" => $insertId,
            ];
            $this->update_by_id($section_info, $insertId);
            return $insertId;
        } else {
            return false;
        }
    }
    public function update_by_id($data, $id)
    {
        $db = db_connect('default');
        $builder = $this->db->table($this->table)->where('section_id', $id);
        $builder->update($data);
    }
    public function get_row_by_id($id)
    {
        $row = $this->db->table($this->table)->where('section_id', $id)->get()->getRow();
        return $row;
    }
    public function get_last_id()
    {
        $last_id = $this->db->table($this->table)->orderBy('section_id', 'desc')->limit(1)->get()->getRow();
        return $last_id;
    }
    public function get_all_section()
    {
        $categories = $this->db->table($this->table)->get()->getResult();
        return $categories;
    }
    public function get_detail($id)
    {
        $last_id = $this->db->table($this->table)->where('section_id', $id)->get()->getRow();
        return $last_id;
    }
     // --------------------RMC status Updated-------------------------
     public function update_list_of_section_status($section_status = "", $section_id = "")
     {
         $builder = $this->db->table("section");
         $builder->set('section_status', $section_status);
         $builder->where('section_id', $section_id);
         $builder->update();
     }
     // -----------------------RMC status Updated----------------------
     public function delete_in_section_row($section_id)
     {
         $builder = $this->db->table('section');
         $builder->where('section_id', $section_id);
         $builder->delete();
     }
}
