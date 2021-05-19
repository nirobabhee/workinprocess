<?php

namespace App\Controllers\ironman;

use App\Controllers\BaseController;

class User_c extends BaseController
{
	public function __construct()
	{
		helper("crud_check");
		$this->user_model = model('App\Models\ironman\User_m');
	}
	public function index()
	{
		$data['title'] = "User";
		$data['all_section'] = $this->user_model->get_all_table_data('section', '*'); //here 'section is Table name, '*' is all column indicator.
		$data['all_rm_godown'] = $this->user_model->get_all_table_data('rm_godown', '*'); //here 'rm_godown is Table name, '*' is all column indicator.
		$data['all_fg_godown'] = $this->user_model->get_all_table_data('fg_godown', '*'); //here 'fg_godown is Table name, '*' is all column indicator.
		echo view('ironman/template/header', $data);
		echo view('ironman/template/left_nav');
		echo view('ironman/template/top_nav');
		echo view('ironman/user/user_v', $data);
		echo view('ironman/template/footer');
	}

	// Images Upload

	public function image_upload($img, $id)
	{
		$model = new \App\Models\Setting_backend_m;
		$setting = $model->find($id);
		$newName = '';
		if ($img->isValid() && !$img->hasMoved()) {
			// --------
			$img_size = $img->getSizeByUnit("mb");
			$img_type = $img->getMimeType();
			if (!in_array($img_type, ['image/png', 'image/jpeg'])) {
				$sdata['message'] = "Setting Backend Failed";
				$this->session->setFlashdata('red_alert', $sdata['message']);
				return redirect()->back()->with('warning', 'Invalid file format (PNG or JPEG only)');
			}
			if ($img_size > 2) {
				$sdata['message'] = "Setting Backend Failed";
				$this->session->setFlashdata('red_alert', $sdata['message']);
				return redirect()->back()->with('warning', 'Image size must be less than 5 MB');
			}
			$newName = "backend_logo" . time() . ".jpg";
			unlink("setting/" . $setting['setting_backend_logo']);
			$img->move('setting/', $newName);
		}
		return $newName;
	}

	public function create_user_submit()
	{
		$this->validation->setRules([
			'user_email' => 'required',
			'user_password' => 'required',
			'user_phone' => 'required',
			'user_full_name' => 'required',
			'user_group' => 'required',
			// 'user_status' => 'required',
		]);
		if ($this->validation->withRequest($this->request)->run() == false) {
			$sdata['message'] = "User Creation Failed";

			$this->session->setFlashdata('red_alert', $sdata['message']);
			return redirect()->to('/ironman/user_c');
		} else {
			$img = $this->request->getFile('user_picture');
			if ($img->isValid() && !$img->hasMoved()) {
				$img_size = $img->getSizeByUnit("mb");
				$img_type = $img->getMimeType();
				if (!in_array($img_type, ['image/png', 'image/jpeg'])) {
					$sdata['message'] = "User Creation Failed";
					$this->session->setFlashdata('red_alert', $sdata['message']);

					return redirect()->back()->with('warning', 'Invalid file format (PNG or JPEG only)');
				}
				if ($img_size > 5) {

					$sdata['message'] = "User Creation Failed";
					$this->session->setFlashdata('red_alert', $sdata['message']);

					return redirect()->back()->with('warning', 'Image size must be less than 5 MB');
				}
				$newName = $_REQUEST["user_phone"] . ".jpg";
				$img->move('user_img/', $newName);
				service("image")
					->withFile("user_img/" . $newName)
					->resize(200, 200, true, 'height')
					->save("user_img/" . $newName);
				$user_crud = implode(",", $_REQUEST["user_crud"]);
				$user_info = [
					"user_phone" => $_REQUEST["user_phone"],
					"user_email" => $_REQUEST["user_email"],
					"user_password" => md5($_REQUEST["user_password"]),
					"user_full_name" => $_REQUEST["user_full_name"],
					"user_group" => $_REQUEST["user_group"],
					"user_section" => $_REQUEST["user_section"],
					"user_mac_address" => $_REQUEST["user_mac_address"],
					"user_rm_godown" => $_REQUEST["user_rm_godown"],
					"user_fg_godown" => $_REQUEST["user_fg_godown"],
					"user_status" => $_REQUEST["user_status"],
					"user_picture" => base_url() . '/user_img/' . $_REQUEST["user_phone"] . ".jpg",
					"user_crud" => $user_crud,
				];
			} else {
				$user_crud = implode(",", $_REQUEST["user_crud"]);
				if (isset($_REQUEST["user_status"])) {
					$user_status = "active";
				} else {
					$user_status = "inactive";
				}
				$user_info = [
					"user_phone" => $_REQUEST["user_phone"],
					"user_email" => $_REQUEST["user_email"],
					"user_password" => md5($_REQUEST["user_password"]),
					"user_full_name" => $_REQUEST["user_full_name"],
					"user_group" => $_REQUEST["user_group"],
					"user_section" => $_REQUEST["user_section"],
					"user_mac_address" => $_REQUEST["user_mac_address"],
					"user_rm_godown" => $_REQUEST["user_rm_godown"],
					"user_fg_godown" => $_REQUEST["user_fg_godown"],
					"user_status" => $user_status,
					"user_crud" => $user_crud,

				];
			}
			// $status = $this->user_model->create_user_submit($user_info);
			$inserted = $this->user_model->create_user_submit($user_info);
			if ($inserted) {

				$sdata['message'] = "User Successfully Created";
			} else {

				$sdata['message'] = "User Creation Failed";
			}
			$this->session->setFlashdata('green_alert', $sdata['message']);
			return redirect()->to("/ironman/user_c");
		}
	}

	//user update part starts ↓↓↓↓↓
	// public function edit_user($user_id)
	// {
	// 	$data["user_data"] = $this->user_model->get_user_by_id($user_id);
	// 	$data['title'] = "User Edit";
	// 	$data["user_id"] = $user_id;
	// 	echo view('ironman/template/header', $data);
	// 	echo view('ironman/template/left_nav');
	// 	echo view('ironman/template/top_nav');

	// 	echo view('ironman/user/user_edit_v', $data);

	// 	echo view('ironman/template/footer');
	// }

	public function update_user_submit()
	{
		$this->validation->setRules([
			'user_full_name' => 'required',
		]);
		if ($this->validation->withRequest($this->request)->run() == false) {
			$sdata['message'] = "User Update Failed";

			$this->session->setFlashdata('red_alert', $sdata['message']);
			return redirect()->to('/ironman/user_c');
		} else {
			// $img = $this->request->getFile('user_picture');
			// 	if ($img->isValid() && !$img->hasMoved()) {
			// 		$img_size = $img->getSizeByUnit("mb");
			// 		$img_type = $img->getMimeType();
			// 		if(!in_array($img_type,['image/png','image/jpeg'])){
			// 			$sdata['message'] = "User Creation Failed";
			// 			$this->session->setFlashdata('red_alert', $sdata['message']);

			// 			return redirect()->back()->with('warning','Invalid file format (PNG or JPEG only)');
			// 		}
			// 		if($img_size > 5){

			// 			$sdata['message'] = "User Creation Failed";
			// 			$this->session->setFlashdata('red_alert', $sdata['message']);

			// 			return redirect()->back()->with('warning','Image size must be less than 5 MB');

			// 		}
			// 		$newName = $_REQUEST["user_phone"] . ".jpg";
			// 		$data["user_data"] = $this->user_model->get_user_by_id($user_id);
			// 		if($data["user_data"]->user_picture != ""){
			// 			unlink("user_img/".$data["user_data"]->user_phone.".jpg");
			// 		}
			// 		$img->move('user_img/', $newName);
			// 		service("image")
			// 				->withFile("user_img/".$newName)
			// 				->resize(200,200,true,'height')
			// 				->save("user_img/".$newName);
			// 		$user_crud = implode(",", $_REQUEST["user_crud"]);
			// 		$user_info = [
			// 			"user_id" => $user_id,
			// 			"user_phone" => $_REQUEST["user_phone"],
			// 			"user_email" => $_REQUEST["user_email"],
			// 			"user_password" => $_REQUEST["user_password"],
			// 			"user_full_name" => $_REQUEST["user_full_name"],
			// 			"user_group" => $_REQUEST["user_group"],
			// 			"user_section" => $_REQUEST["user_section"],
			// 			"user_mac_address" => $_REQUEST["user_mac_address"],
			// 			"user_godown" => $_REQUEST["user_godown"],
			// 			"user_status" => $_REQUEST["user_status"],
			// 			"user_picture" => base_url().'/user_img/' . $_REQUEST["user_phone"].".jpg",
			// 			"user_crud" => $user_crud,
			// 		];
			// 	}
			//  else {

			$user_crud = implode(",", $_REQUEST["user_crud"]);
			if (isset($_REQUEST["user_status"])) {
				$user_status = "active";
			} else {
				$user_status = "inactive";
			}
			$user_info = [
				"user_id" => $_REQUEST["user_id"],
				"user_full_name" => $_REQUEST["user_full_name"],
				"user_section" => $_REQUEST["user_section"],
				"user_rm_godown" => $_REQUEST["user_rm_godown"],
				"user_fg_godown" => $_REQUEST["user_fg_godown"],
				"user_status" => $user_status,
				"user_crud" => $user_crud,

			];
			// }
			$this->user_model->update_user_submit($user_info);
			$sdata['message'] = "User Successfully Updated";
			$this->session->setFlashdata('green_alert', $sdata['message']);
			return redirect()->to("/ironman/user_c");
		}
	}

	public function update_user_status()
	{
		$user_status = $_REQUEST["user_status"];
		$user_id = $_REQUEST["user_id"];
		$this->user_model->update_user_status($user_status, $user_id);
	}

	public function update_user_privilege()
	{
		$user_crud = $_REQUEST["user_crud"];
		$user_id = $_REQUEST["user_id"];
		$this->user_model->update_user_privilege($user_crud, $user_id);
	}

	//user update part ends ↑↑↑↑↑


	public function delete_user($user_id)
	{
		$data["user_data"] = $this->user_model->get_user_by_id($user_id);
		if ($data["user_data"]->user_picture != "") {
			unlink("user_img/" . $data["user_data"]->user_phone . ".jpg");
		}
		$this->user_model->delete_user($user_id);

		$sdata['message'] = "User " . $data["user_data"]->user_full_name . " Successfully Deleted";
		$this->session->setFlashdata('red_alert', $sdata['message']);
		return redirect()->to("/ironman/user_c");
	}

	// dt_user_list ajax starts
	public function get_all_user_dt_ajax()
	{
		$data = array();
		$memData = $this->user_model->get_all_user($_POST);
		$i = $_POST['start'];
		foreach ($memData as $member) {
			// $btn_link_edit = base_url() . "/ironman/user_c/edit_user/" . $member->user_id;
			// $btn_link_delete = base_url() . "/ironman/user_c/delete_user/" . $member->user_id;
			// $actionHtml = view('ironman/user/user_action_button', array(
			// 	"edit" => $btn_link_edit,
			// 	"delete" => $btn_link_delete
			// ));
			$i++;
			$data[] = array(
				$i,
				$member->user_id,
				$member->user_full_name,
				$member->user_email,
				$member->user_phone,
				$member->user_group, //index 5
				$member->user_rm_godown,
				$member->user_fg_godown,
				$member->user_section,
				$member->user_crud,
				$member->user_status,

			);
		}
		$records_total = $this->user_model->get_all_user_count($_POST);
		$records_filtered =  $this->user_model->get_all_user_filtered($_POST);
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $records_total,
			"recordsFiltered" => $records_filtered->rowcount,
			"data" => $data,
		);

		echo json_encode($output);
	}

	// dt_user_list ajax ends






}
