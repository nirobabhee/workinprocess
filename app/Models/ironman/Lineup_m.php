<?php

namespace App\Models;

use CodeIgniter\Model;

class Lineup_model extends Model
{
    protected $table = 'lineup';
    protected $primaryKey = 'lineup_id';

    protected $allowedFields = ['product_id', 'lineup_code', 'lineup_name', 'lineup_section', 'lineup_status'];
    protected $validationRules = [
        'product_id' => 'required',
        'lineup_code' => 'required',
        'lineup_name' => 'required',
        'lineup_status' => 'required',
    ];

    protected $validationMessages = [
        'product_id' => [
            'required' => 'Please enter a Product SKU'
        ],
        'lineup_code' => [
            'required' => 'Please enter a Lineup Code'
        ],
        'lineup_name' => [
            'required' => 'Please enter a Category Name'
        ],
        'lineup_section' => [
            'required' => 'Please enter a Category Name'
        ],
    ];



    public function get_locations()
    {
        $locations = $this->db->table('locations')->where('location_status', 'active')->get()->getResult();
        return $locations;
    }
    public function get_lineup()
    {
        $lineup = $this->db->table('lineup')->get()->getResult();
        return $lineup;
    }

    public function insert_lineup($lineup)
    {
        $db = db_connect('default');
        $builder = $this->db->table($this->table);
        $builder->insert($lineup); //insert
        $insertId = $db->insertID();
        return $insertId;
    }

    public function update_lineup($data,$id)
    {
        $lineup = $this->db->table('lineup')->where('lineup_id',$id)->update($data);
        return $lineup;
    }

    public function get_lineup_by_id($id)
    {
        $lineup = $this->db->table('lineup')->where('lineup_id',$id)->get()->getRow();
        return $lineup;
    }
    public function get_location_by_id($id)
    {
        $location = $this->db->table('locations')->where('location_id',$id)->get()->getRow();
        return $location;
    }
    //lineup row Delete 

    public function delete_lineup_row($lineup_id)
    {
        $builder = $this->db->table("lineup");
        $builder->where('lineup_id', $lineup_id);
        $builder->delete();
    }
     //Status Lineup 
    public function get_update_lineup_status($lineup_status = "", $lineup_id = "")
    {
        $builder = $this->db->table("lineup");
        $builder->set('lineup_status', $lineup_status);
        $builder->where('lineup_id', $lineup_id);
        $builder->update();
    }
}
