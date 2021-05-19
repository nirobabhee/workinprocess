<?php

namespace App\Controllers\ironman;

use App\Controllers\BaseController;

class Chat_messenger_c extends BaseController
{
    public function __construct()
    {
        helper("crud_check");
        $this->crud_generator_model = model('App\Models\ironman\Crud_generator_m.php');
        $this->chat_messenger_model = model('App\Models\ironman\Chat_messenger_m.php');
    }
    public function index()
    {
        $data['title'] = "Raw Material";
        $data['get_category'] = $this->crud_generator_model->get_all_table_data('rm_category', '*');
        $data['get_attribute'] = $this->crud_generator_model->get_all_table_data('rm_attribute', '*');
        $data['get_tag'] = $this->crud_generator_model->get_all_unique_table_data('raw_material', 'rm_tag');
        $data['get_unit'] = $this->crud_generator_model->get_all_table_data('unit', '*');
        echo view('ironman/template/header', $data);
        echo view('ironman/template/left_nav');
        echo view('ironman/template/top_nav');
        echo view('ironman/rm/rm_v', $data);
        echo view('ironman/template/footer');
    }
    public function get_messages_by_id()
    {
        $my_id = $_SESSION['login_user']->user_id;
        $other_persons_id = $_REQUEST['others_id'];
        $get_chat_data =  $this->chat_messenger_model->get_chat_data($my_id, $other_persons_id);
        $output = '';
        if ($get_chat_data) {
            for ($i = 0; $i < count($get_chat_data); $i++) {
                //date_default_timezone_set("Asia/Dhaka");
                $day_name = date('D', strtotime($get_chat_data[$i]->cm_date_time));
                if ($get_chat_data[$i]->cm_sender != $my_id) {
                    $time = date('h:i A', strtotime($get_chat_data[$i]->cm_date_time));
                    $output .= '<div class="chat-segment chat-segment-get chat-start">';
                    $output .= '<div class="chat-message">';
                    $output .= '<p>' . $get_chat_data[$i]->cm_message . '</p>';
                    $output .= '</div>';
                    $output .= '<div class="fw-300 text-muted mt-1 fs-xs">';
                    $output .=  $day_name . ' ' . $time;
                    $output .= '</div>';
                    $output .= '</div>';
                } else {
                    $time = date('h:i A', strtotime($get_chat_data[$i]->cm_date_time));
                    $output .= '<div class="chat-segment chat-segment-sent">';
                    $output .= '<div class="chat-message">';
                    $output .= '<p>' . $get_chat_data[$i]->cm_message . '</p>';
                    $output .= '</div>';
                    $output .= '<div class="fw-300 text-muted mt-1 fs-xs">';
                    $output .=  $day_name . ' ' . $time;
                    $output .= '</div>';
                    $output .= '</div>';
                }
            }
        } else {
            $output .= '<div class="chat-segment">';
            $output .= '<div class="time-stamp text-center mb-2 fw-400">' . 'No Chat Messages Got Found !' . '</div>';
            $output .= '</div">';
        }
        echo $output;
    }
    public function insert_messages_by_id()
    {
        $my_id = $_SESSION['login_user']->user_id;
        $other_persons_id = $_REQUEST['others_id'];
        $my_message = $_REQUEST['msg'];
        $insert_data =  $this->chat_messenger_model->insert_chat_data($my_id, $other_persons_id, $my_message);
        if ($insert_data == true) {
            echo $response = 'Yes';
            exit;
        }
    }
}