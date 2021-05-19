<?php

namespace App\Controllers\ironman;

use App\Controllers\BaseController;
class Setting_backend_c extends BaseController
{
	public function __construct()
    {
		$this->setting_backend_model = model('App\Models\ironman\Setting_backend_m');
    }
	public function index()
	{
		$data["backend_setting_data"] =$this->setting_backend_model->backend_setting_data();

		// $data["user_data"] = $this->user_model->get_user_by_id(1);

		$data['title'] = "Setting Backend Edit";
		$data["user_id"] = 1;
		echo view('ironman/template/header', $data);
		echo view('ironman/template/left_nav');
		echo view('ironman/template/top_nav');
		echo view('ironman/settings/setting_backend_edit_v');
		//****task view*****//
		echo view('ironman/template/footer');
	}


	public function update_setting_backend_submit($setting_backend_id)
	{
		$this->validation->setRules([
			'setting_backend_company_name' => 'required',			
			'setting_backend_phone' => 'required',
			'setting_backend_registration_no' => 'required',
			'setting_backend_email' => 'required',			
			'setting_backend_address' => 'required',
			// 'setting_backend_edit_vat' => 'required',			
		]);	
		if ($this->validation->withRequest($this->request)->run() == false) {
			$sdata['message'] = "Setting Backend Failed";
			$this->session->setFlashdata('delete_alert', $sdata['message']);
			return redirect()->to('/ironman/setting_backend_c');
		} else {
			if ($this->requests->getFile('setting_backend_logo')) { // if picture uploaded
				$img = $this->requests->getFile('setting_backend_logo');
				$images=$this->image_upload($img,$setting_backend_id);		
				$user_info = [
					"setting_backend_company_name" => $_REQUEST["setting_backend_company_name"],
					"setting_backend_phone" => $_REQUEST["setting_backend_phone"],
					"setting_backend_registration_no" => $_REQUEST["setting_backend_registration_no"],
					"setting_backend_email" => $_REQUEST["setting_backend_email"],
					"setting_backend_address" => $_REQUEST["setting_backend_address"],
					"setting_backend_vat" => $_REQUEST["setting_backend_vat"],
					"setting_backend_tax" => $_REQUEST["setting_backend_tax"],
					"setting_backend_id" => $_REQUEST["setting_backend_id"],
					"setting_backend_logo" => $images,					
				];
			} else {			
				$user_info = [
					"setting_backend_company_name" => $_REQUEST["setting_backend_company_name"],
					"setting_backend_phone" => $_REQUEST["setting_backend_phone"],
					"setting_backend_registration_no" => $_REQUEST["setting_backend_registration_no"],
					"setting_backend_email" => $_REQUEST["setting_backend_email"],
					"setting_backend_address" => $_REQUEST["setting_backend_address"],
					"setting_backend_edit_vat" => $_REQUEST["setting_backend_edit_vat"],
					"setting_backend_tax" => $_REQUEST["setting_backend_tax"],
					"setting_backend_id" => $_REQUEST["setting_backend_id"],
				];
			}
			// $status = $this->user_model->create_user_submit($user_info);
			$inserted = $this->setting_backend_model->update_setting_backend($user_info);
			if ($inserted) {
				$sdata['message'] = "Setting Successfully Updated";
			} else {
				$sdata['message'] = "Setting Creation Failed";
			}
			$this->session->setFlashdata('green_alert', $sdata['message']);
			return redirect()->to("/ironman/setting_backend_c");
		}		
	}


// Images Upload

public function image_upload($img,$id)
{
	$model = new \App\Models\Setting_backend_m;
	$setting=$model->find($id);
    $newName='';
	if ($img->isValid() && !$img->hasMoved()) {
		// --------
		$img_size = $img->getSizeByUnit("mb");
		$img_type = $img->getMimeType();
		if(!in_array($img_type,['image/png','image/jpeg'])){
			$sdata['message'] = "Setting Backend Failed";
			$this->session->setFlashdata('red_alert', $sdata['message']);
			return redirect()->back()->with('warning','Invalid file format (PNG or JPEG only)');
		}
		if($img_size > 2){
			$sdata['message'] = "Setting Backend Failed";
			$this->session->setFlashdata('red_alert', $sdata['message']);
			return redirect()->back()->with('warning','Image size must be less than 2MB');
		}
		$newName = "backend_logo".time() . ".jpg";
		unlink("setting/".$setting['setting_backend_logo']);
		$img->move('setting/', $newName);
	}
	return $newName;
}


	

    







}
