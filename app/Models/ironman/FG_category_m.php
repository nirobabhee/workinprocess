<?php

namespace App\Models;

use CodeIgniter\Model;

class FG_category_m extends Model
{
    protected $table = 'fg_category';
    protected $primaryKey = 'fg_category_id';

    protected $allowedFields = ['fg_category_name', 'fg_category_chain_parent', 'fg_category_chain_child', 'fg_category_status'];
    protected $validationRules = [
        'fg_category_chain_parent' => 'required',
        'fg_category_status' => 'required'
    ];

    protected $validationMessages = [
        'description' => [
            'required' => 'Please enter a Category Name'
        ]
    ];



    public function create_category($category_info)
    {

        $pre_data = $this->get_row_by_id($category_info['fg_category_chain_parent']);
        if (isset($pre_data) && $pre_data->fg_category_chain_parent) {
            $parent_ids = $pre_data->fg_category_chain_parent;
        } else {
            $parent_ids = $category_info['fg_category_chain_parent'];
        }
        $db = db_connect('default');
        $builder = $this->db->table($this->table);
        $builder->insert($category_info); //insert
        $insertId = $db->insertID();

        if ($insertId) //For Update
        {
            $category_info = [
                "fg_category_chain_parent" => $parent_ids ? $parent_ids . ',' . $insertId : $insertId,
                "fg_category_chain_child" => $insertId,
            ];
            $this->update_by_id($category_info, $insertId);
            return $insertId;
        } else {
            return false;
        }
    }

    public function update_by_id($data, $id)
    {
        $db = db_connect('default');
        $builder = $this->db->table($this->table)->where('fg_category_id', $id);
        $builder->update($data);
    }

    public function get_row_by_id($id)
    {

        $row = $this->db->table($this->table)->where('fg_category_id', $id)->get()->getRow();
        return $row;
    }

    public function get_last_id()
    {
        $last_id = $this->db->table($this->table)->orderBy('fg_category_id', 'desc')->limit(1)->get()->getRow();
        return $last_id;
    }

    public function get_all_fg()
    {
        $categories = $this->db->table('fg_category')->get()->getResult();
        return $categories;
    }



    public function get_detail($a)
    {
        $last_id = $this->db->table($this->table)->where('fg_category_id', $a)->get()->getRow();
        return $last_id;
    }
    public function delete_category($fg_category_id = "")
    {
        $builder = $this->db->table('fg_category');
        $builder->where('fg_category_id', $fg_category_id);
        $builder->delete();
    }
    // --------------------RMC status Updated-------------------------
    public function update_list_of_fg_category_status($fg_category_status = "", $fg_category_id = "")
    {
        $builder = $this->db->table("fg_category");
        $builder->set('fg_category_status', $fg_category_status);
        $builder->where('fg_category_id', $fg_category_id);
        $builder->update();
    }
    // -----------------------RMC status Updated----------------------
}
