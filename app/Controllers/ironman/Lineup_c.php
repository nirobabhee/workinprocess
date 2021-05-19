<?php

namespace App\Controllers\ironman;

use App\Controllers\BaseController;

class Lineup_c extends BaseController
{
    public function __construct()
    {
        helper('crud_check');
        $this->lineup_model = model('App\Models\ironman\Lineup_m');
    }
    public function index()
    {
        $data['title'] = "Product Lineup";
        $data["locations"] = $this->lineup_model->get_locations();
        $data["lineup_list"] = $this->lineup_model->get_lineup();

        echo view('ironman/template/header', $data);
        echo view('ironman/template/left_nav');
        echo view('ironman/template/top_nav');
        echo view('ironman/lineup/lineup_create_v');
        echo view('ironman/template/footer');
    }


    public function lineup_submit()
    {
        $lineup = $this->requests->getPost();
        // echo '<pre>';
        // print_r($lineup);
        // exit;
        $lineup_json = array();
        $locations = count($lineup['location_id']);
        $this->validation->setRules([
            'short_order' => 'required',
            'location_id' => 'required',
            'lineup_code' => 'trim|required|is_unique[lineup.lineup_code,lineup_id,$lineup_id]',
            'process_lead_time' => 'required',
            'process_lead_type' => 'required'
            
        ],
        [
            'lineup_code' => [
                'required' => 'Lineup code must be unique',
            ]
        ]
    );

        if ($this->validation->withRequest($this->request)->run() == false) {
            $sdata['message'] = "Lineup Creation Failed";

            $this->session->setFlashdata('red_alert', $sdata['message']);
            return redirect()->to('/ironman/lineup_c')->withInput();
        } else {

            for ($i = 0; $i < $locations; $i++) {
                $json = array(
                    'short_order' => $lineup['short_order'][$i],
                    'location_id' => $lineup['location_id'][$i],
                    'section_name' => $lineup['section_name'][$i],
                    'process_lead_time' => $lineup['process_lead_time'][$i],
                    'process_lead_type' => $lineup['process_lead_type'][$i]
                );

                array_push($lineup_json, $json);

                $line = asort($lineup_json);
            }
            $data = array(
                'lineup_name' => $lineup['lineup_name'],
                'lineup_code' => $lineup['lineup_code'],
                'lineup_section' => json_encode($lineup_json),
                'lineup_status' => 'active',
            );
            $insert = $this->lineup_model->insert_lineup($data);
            if ($insert) {
                $sdata['message'] = "Lineup Successfully Created";
            } else {
                $sdata['message'] = "Lineup Creation Failed";
            }
            $this->session->setFlashdata('green_alert', $sdata['message']);
            return redirect()->to("/ironman/lineup_c");
        }
    }

    public function lineup_edit($id)
    {
        $data['title'] = "Product Lineup"; 
        $data["locations"] = $this->lineup_model->get_locations();        
        $data["lineup_data"] = $this->lineup_model->get_lineup_by_id($id);
                
        echo view('ironman/template/header', $data);
        echo view('ironman/template/left_nav');
        echo view('ironman/template/top_nav');
        echo view('ironman/lineup/lineup_edit_v');
        echo view('ironman/template/footer');
    }


    public function update_lineup()
    {
        $lineup_data = $this->requests->getPost();
        // echo '<pre>';
        // print_r($lineup_data);
        // exit;
        $id=$lineup_data['lineup_id'];
        $lineup_json=array();       
        $locations=count($lineup_data['location_id']);        
        $this->validation->setRules([
            'short_order' => 'required',
            'location_id' => 'required',
            'lineup_code' =>'required',
            'process_lead_time' => 'required',
            'process_lead_type' => 'required',
        ]);
        
        if ($this->validation->withRequest($this->request)->run() == false) {
            $sdata['message'] = "Lineup Creation Failed";
            $this->session->setFlashdata('red_alert', $sdata['message']);
            return redirect()->back();
        } else {

        for ($i=0; $i < $locations ; $i++) {           
            $json = array(           
            'short_order' => $lineup_data['short_order'][$i], 
            'location_id' => $lineup_data['location_id'][$i],
            'section_name' => $lineup_data['section_name'][$i],    
            'process_lead_time' => $lineup_data['process_lead_time'][$i],    
            'process_lead_type' => $lineup_data['process_lead_type'][$i],    
        ); 
        array_push($lineup_json,$json);    
        }
        $data=array(
            'lineup_name'=>$lineup_data['lineup_name'],
            'lineup_code'=>$lineup_data['lineup_code'],
            'lineup_section'=>json_encode($lineup_json),
            'lineup_status'=>'active',
        );
        $update=$this->lineup_model->update_lineup($data,$id);    
        if ($update) {
            $sdata['message'] = "Lineup Successfully Updated";
        } else {
            $sdata['message'] = "Lineup Creation Failed";
        }
        $this->session->setFlashdata('green_alert', $sdata['message']);
        return redirect()->to("/ironman/lineup_c");
    }

    }


    public function update_lineup_status()
    {
        $lineup_status = $_REQUEST["lineup_status"];
        $lineup_id = $_REQUEST["lineup_id"];
        $this->lineup_model->get_update_lineup_status($lineup_status, $lineup_id);
    }

    public function delete_lineup($lineup_id)
	{
		$this->lineup_model->delete_lineup_row($lineup_id);
		return redirect()->to("/ironman/lineup_c");
	}
}
