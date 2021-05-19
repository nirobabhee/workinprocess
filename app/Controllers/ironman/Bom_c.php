<?php

namespace App\Controllers\ironman;

use App\Controllers\BaseController;
use App\Models\ironman\Bom_m;


class Bom_c extends BaseController
{
    private $bom_model;
    public function __construct()
    {
        helper('crud_check');
        // $this->bom_model = new \App\Models\ironman\Bom_m();
        $this->bom_model = model('App\Models\ironman\Bom_m');
    }
    public function index()
    {
        $data['sections'] = $this->bom_model->get_all_table_data('section', '*');
		$data['machines'] = $this->bom_model->get_all_table_data('machine', '*');
        $data['title'] = "BOM";

        if(isset($_SESSION["bomdata"])){

            $data['footer_qty_total'] = 0;
            $data['footer_wastage_total'] = 0;
            $data['footer_final_qty_total'] = 0;
            $data['footer_unit_price_total'] = 0;
            $data['footer_total_cost_total'] = 0;
            $data['footer_start_day_total'] = 0;
            $data['footer_end_day_total'] = 0;
            foreach($_SESSION['bomdata'] as $bomdata){
                $data["footer_qty_total"] +=$bomdata["bom_qty"];
                $data["footer_wastage_total"] +=$bomdata["bom_wastage_max_percent"];
                $data["footer_final_qty_total"] +=$bomdata["bom_final_qty"];
                $data["footer_unit_price_total"] +=$bomdata["bom_unit_price"];
                $data["footer_total_cost_total"] +=$bomdata["bom_total_cost"];
                $data["footer_start_day_total"] +=$bomdata["bom_start_day"];
                $data["footer_end_day_total"] +=$bomdata["bom_end_day"];
            }
        }

        echo view('ironman/template/header', $data);
        echo view('ironman/template/left_nav');
        echo view('ironman/template/top_nav');
        echo view('ironman/bom/bom_v', $data);
        echo view('ironman/template/footer');
    }
    public function bom_add_to_session()
    {
        $bomdata = [
            'bom_name'  => $_REQUEST['bom_name'],
            'bom_alternative'  => $_REQUEST['bom_alternative'],

            'bom_length'  => $_REQUEST['bom_length'],
            'bom_length_mixture'  => $_REQUEST['bom_length_mixture'],
            
            'bom_width'  => $_REQUEST['bom_width'],
            'bom_width_mixture'  => $_REQUEST['bom_width_mixture'],
            
            'bom_thickness'  => $_REQUEST['bom_thickness'],
            'bom_thickness_mixture'  => $_REQUEST['bom_thickness_mixture'],
            
            'bom_machine'  => $_REQUEST['bom_machine'],
            'bom_machine_uses_hours'  => $_REQUEST['bom_machine_uses_hours'],
           
            'bom_per_person'  => $_REQUEST['bom_per_person'],
            'bom_per_person_hours'  => $_REQUEST['bom_per_person_hours'],
           
            'bom_qty'  => $_REQUEST['bom_qty'],
            'bom_wastage_max_percent'  => $_REQUEST['bom_wastage_max_percent'],
            'bom_final_qty'  => $_REQUEST['bom_final_qty'],
           
            'bom_unit_price'  => $_REQUEST['bom_unit_price'],
            'bom_total_cost'  => $_REQUEST['bom_total_cost'],

            'bom_start_day'  => $_REQUEST['bom_start_day'],
            'bom_end_day'  => $_REQUEST['bom_end_day'],
        ];
        $_SESSION['bomdata'][] = $bomdata;

        return redirect()->to('/ironman/bom_c');
    }
    //bom create btn action
    public function bom_create()
    {
        $bom_section = $_REQUEST["bom_section"];
        foreach($_SESSION['bomdata'] as $key=>$bomdata){
            $bomdata['bom_section']=$bom_section;
            $_SESSION['bomdata'][$key] = $bomdata;
        }
        
        $bom = [
            $bom_section => $_SESSION['bomdata'],
        ];
       
        $this->bom_model->bom_create($bom);
        unset($_SESSION["bomdata"]);
        return redirect()->to('/ironman/bom_c');

    }
    //Session Item Delete 
    public function delete_bom_item($key)
    {
        if (isset($_SESSION['bomdata'])) {
            unset($_SESSION['bomdata'][$key]);
        }
        echo json_encode($_SESSION['bomdata']);
    }
    //bom update modal update btn
    public function update_bom_before_submit()
    {
        $updated_bom_session_index = $_REQUEST["modal_session_index"];
        $bomdata = [
            'bom_name'  => $_REQUEST['modal_bom_name'],
            'bom_alternative'  => $_REQUEST['modal_bom_alternative'],

            'bom_length'  => $_REQUEST['modal_bom_length'],
            'bom_length_mixture'  => $_REQUEST['modal_bom_length_mixture'],
            
            'bom_width'  => $_REQUEST['modal_bom_width'],
            'bom_width_mixture'  => $_REQUEST['modal_bom_width_mixture'],
            
            'bom_thickness'  => $_REQUEST['modal_bom_thickness'],
            'bom_thickness_mixture'  => $_REQUEST['modal_bom_thickness_mixture'],
            
            'bom_machine'  => $_REQUEST['modal_bom_machine'],
            'bom_machine_uses_hours'  => $_REQUEST['modal_bom_machine_hour'],
           
            'bom_per_person'  => $_REQUEST['modal_bom_per_person'],
            'bom_per_person_hours'  => $_REQUEST['modal_bom_per_person_hour'],
           
            'bom_qty'  => $_REQUEST['modal_bom_qty'],
            'bom_wastage_max_percent'  => $_REQUEST['modal_bom_wastage_max_percent'],
            'bom_final_qty'  => $_REQUEST['modal_bom_final_qty'],
           
            'bom_unit_price'  => $_REQUEST['modal_bom_unit_price'],
            'bom_total_cost'  => $_REQUEST['modal_bom_total_cost'],

            'bom_start_day'  => $_REQUEST['modal_bom_start_day'],
            'bom_end_day'  => $_REQUEST['modal_bom_end_day'],
        ];

        $_SESSION['bomdata'][$updated_bom_session_index] = $bomdata;
        return redirect()->to('/ironman/bom_c');

    }

    //data table bom details by fg id
    public function get_bom_details_by_fg_id()
    {
        $data = array();
		$bomData = $this->bom_model->get_bom_details_by_fg_id($_POST);
        
        $json_decode=json_decode($bomData->bom_details);
        $bomData_arr=array();
        // echo '<pre>';
        foreach($json_decode as $val){
            foreach($val as $value){
                array_push($bomData_arr,$value);
            }
        }
        // print_r($bomData_arr);
        // exit;
		$i = $_POST['start'];
		foreach ($bomData_arr as $member) {
			
			$i++;
			$data[] = array(
				$i,
				$i,//bom id nite hbe
				$member->bom_name,
				$member->bom_alternative,
				$member->bom_section,
				$i,//bom category nite hbe
				$member->bom_length,
				$member->bom_machine,
				$member->bom_per_person, //index 5
				$member->bom_per_person,// bom unit nite hbe
				$member->bom_qty,
				$member->bom_wastage_max_percent,
				$member->bom_final_qty,
				$member->bom_unit_price,
				$member->bom_total_cost,
				$member->bom_start_day,
				$member->bom_end_day,
				$member->bom_end_day,

			);
		}
		$records_total = $this->bom_model->get_all_bom_count($_POST);
		$records_filtered =  $this->bom_model->get_all_bom_filtered($_POST);
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $records_total,
			"recordsFiltered" => $records_filtered->rowcount,
			"data" => $data,
		);

		echo json_encode($output);
    }

}
