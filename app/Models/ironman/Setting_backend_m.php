<?php

namespace App\Models;

use CodeIgniter\Model;

class Setting_backend_m extends Model
{
    protected $table = 'setting_backend';
    protected $primaryKey = 'setting_backend_id';
    protected $allowedFields = ['setting_backend_id','setting_backend_company_name','setting_backend_phone','setting_backend_registration_no','setting_backend_email','setting_backend_address','setting_backend_vat','setting_backend_tax','setting_backend_logo'];
    
    
    public function backend_setting_data()
    {
        $builder = $this->db->table("setting_backend");
        $builder->where('setting_backend_id',1);
        $query = $builder->get()->getRow();
        return $query; 
    }

public function update_setting_backend($setting_info)
{
        $builder = $this->db->table("setting_backend");
        $builder->where('setting_backend_id', $setting_info['setting_backend_id']);
        $builder->replace($setting_info);
}













}










