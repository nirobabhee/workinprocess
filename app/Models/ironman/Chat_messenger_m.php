<?php

namespace App\Models\ironman;

use CodeIgniter\Model;

class Chat_messenger_m extends Model
{
    public function get_chat_data($my_id, $others_id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('chat_messenger');
        $builder->select('*');
        $builder->where('cm_sender', $my_id);
        $builder->where('cm_receiver', $others_id);
        $builder->orWhere('cm_sender', $others_id);
        $builder->where('cm_receiver', $my_id);
        $builder->orderBy('cm_date_time');
        $query = $builder->get();
        $result = $query->getResult();
        if ($result) {
            return $result;
        } else {
            return '';
        }
    }
    public function insert_chat_data($my_id, $others_id, $msg)
    {
        $data_set = [
            'cm_sender' => $my_id,
            'cm_receiver' => $others_id,
            'cm_message' => $msg,
            'cm_date_time' => date('Y-m-d H:i:s')
        ];
        $builder = $this->db->table('chat_messenger');
        return $builder->insert($data_set);
    }
}