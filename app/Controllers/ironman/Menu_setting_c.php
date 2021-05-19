<?php

namespace App\Controllers\ironman;

use App\Controllers\BaseController;

class Menu_setting_c extends BaseController
{
	public function __construct()
	{
		helper("crud_check");
		$this->menu_model = model('App\Models\ironman\Menu_m');
	}
	public function index()
	{
		$data['title'] = "Menu Setting";
		$data['side_menu'] = $this->menu_model->get_menu_list("side_menu");
		$data['left_top_nav'] =  $this->menu_model->get_menu_list("left_top_nav");
		$data['top_menu'] =  $this->menu_model->get_menu_list("top_menu");
		$data['right_nav'] =  $this->menu_model->get_menu_list("right_nav");
		$data['mobile_top_menu'] =  $this->menu_model->get_menu_list("mobile_top_menu");

		$data["side_menu_chain_menu"] = $this->get_chain_menu_name($data["side_menu"]);
		$data["left_top_nav_chain_menu"] = $this->get_chain_menu_name($data["left_top_nav"]);
		$data["top_menu_chain_menu"] = $this->get_chain_menu_name($data["top_menu"]);
		$data["right_nav_chain_menu"] = $this->get_chain_menu_name($data["right_nav"]);
		$data["mobile_top_menu_chain_menu"] = $this->get_chain_menu_name($data["mobile_top_menu"]);

		echo view('ironman/template/header', $data);
		echo view('ironman/template/left_nav');
		echo view('ironman/template/top_nav');
		echo view('ironman/menu/menu_setting_v', $data); //Task file
		echo view('ironman/template/footer');
	}
	public function get_chain_menu_name($menu_portion)
	{
		$all_menu = $this->menu_model->get_all_menu();

		$menu_chain_array = array();
		foreach ($menu_portion as $menu_portion_menu) {
			$menu_name = "";
			$menu_chain = explode(",", $menu_portion_menu->menu_admin_chain);
			foreach ($menu_chain as $single_chain_value) {
				foreach ($all_menu as $menu) {
					if ($menu->menu_admin_id == $single_chain_value) {
						if ($menu_name == "") {
							$menu_name = $menu->menu_admin_name;
						} else {
							$menu_name = $menu_name . ' > ' . $menu->menu_admin_name;
						}
					}
				}
			}
			array_push($menu_chain_array, ["menu_chain" => $menu_name, "menu_id" => $menu_portion_menu->menu_admin_id]);
		}
		return $menu_chain_array;
	}

	public function create_menu()
	{
		$this->validation->setRules([
			'menu_admin_name' => 'required',
			'menu_admin_parent_menu' => 'required',
			'menu_admin_sort_order' => 'required',
			'menu_admin_user_privilege' => 'required',
			'menu_admin_type' => 'required',
		]);
		if ($this->validation->withRequest($this->request)->run() == false) {
			$sdata['message'] = "Menu Creation Failed";

			$this->session->setFlashdata('red_alert', $sdata['message']);
			return redirect()->to('/ironman/menu_setting_c');
		} else {
			if (isset($_REQUEST["menu_admin_status"])) {
				$menu_admin_status = "active";
			} else {

				$menu_admin_status = "inactive";
			}

			$menu_info = [
				"menu_admin_name" => $_REQUEST["menu_admin_name"],
				"menu_admin_parent_menu" => $_REQUEST["menu_admin_parent_menu"],
				"menu_admin_url" => $_REQUEST["menu_admin_url"],
				"menu_admin_icon" => $_REQUEST["menu_admin_icon"],
				"menu_admin_sort_order" => $_REQUEST["menu_admin_sort_order"],
				'menu_admin_user_privilege' => implode(",", $_REQUEST["menu_admin_user_privilege"]),
				"menu_admin_type" => $_REQUEST["menu_admin_type"],
				"menu_admin_status" => $menu_admin_status,

			];
			$inserted = $this->menu_model->create_menu_submit($menu_info);
			if ($inserted) {

				$sdata['message'] = "Menu Successfully Created";
			} else {

				$sdata['message'] = "Menu Creation Failed";
			}
			$this->session->setFlashdata('insert_alert', $sdata['message']);
			return redirect()->to("/ironman/Menu_setting_c");
		}
	}

	public function get_menu_list_dt_ajax()
	{
		// $data['side_menu'] = $this->menu_model->get_menu_list_dt($_POST["menu_type"]);
		$data = array();
		$memData = $this->menu_model->get_menu_list_dt();
		$i = $_POST['start'];
		foreach ($memData as $member) {
			// $btn_link_edit = base_url() . "/ironman/menu_setting_c/edit_menu/" . $member->menu_admin_id;
			// $btn_link_delete = base_url() . "/ironman/menu_setting_c/delete_menu/" . $member->menu_admin_id;
			// $actionHtml = view('ironman/menu/action_menu_button', array(
			// 	"edit" => $btn_link_edit,
			// 	"delete" => $btn_link_delete
			// ));
			$i++;
			$data[] = array(
				$i,
				$member->menu_admin_id,
				$member->menu_admin_name,
				$member->menu_admin_parent_menu,
				$member->menu_admin_url,
				$member->menu_admin_icon,
				$member->menu_admin_sort_order,
				$member->menu_admin_user_privilege,
				$member->menu_admin_status,
				// $actionHtml,

			);
		}

		$records_total = $this->menu_model->get_menu_list_count();
		$records_filtered =  $this->menu_model->get_menu_list_filtered();
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $records_total,
			"recordsFiltered" => $records_filtered->rowcount,
			"data" => $data,
			"my" => $records_filtered
		);

		echo json_encode($output);
	}

	public function edit_menu($menu_id)
	{
		$data['title'] = "Edit Menu";
		$data['side_menu'] = $this->menu_model->get_menu_list("side_menu");
		$data['left_top_nav'] =  $this->menu_model->get_menu_list("left_top_nav");
		$data['top_menu'] =  $this->menu_model->get_menu_list("top_menu");
		$data['right_nav'] =  $this->menu_model->get_menu_list("right_nav");
		$data['mobile_top_menu'] =  $this->menu_model->get_menu_list("mobile_top_menu");

		$data["side_menu_chain_menu"] = $this->get_chain_menu_name($data["side_menu"]);
		$data["left_top_nav_chain_menu"] = $this->get_chain_menu_name($data["left_top_nav"]);
		$data["top_menu_chain_menu"] = $this->get_chain_menu_name($data["top_menu"]);
		$data["right_nav_chain_menu"] = $this->get_chain_menu_name($data["right_nav"]);
		$data["mobile_top_menu_chain_menu"] = $this->get_chain_menu_name($data["mobile_top_menu"]);
		// ------
		$data["menu_info"] = $this->menu_model->update_menu($menu_id);

		$data["explode_user_privilege"] = explode(',', $data["menu_info"]->menu_admin_user_privilege);
		// echo '<pre>';
		// print_r($data["explode_user_privilege"]);
		// exit;
		$data["parent_menu_name"] = $this->menu_model->get_parent_menu_name($data["menu_info"]->menu_admin_parent_menu);

		// echo '<pre>';
		// print_r($data["side_menu_chain_menu"]);
		// print_r($data["parent_menu_name"]);
		// exit;
		echo view('ironman/template/header', $data);
		echo view('ironman/template/left_nav');
		echo view('ironman/template/top_nav');
		echo view('ironman/menu/menu_edit_v', $data); //Task file
		echo view('ironman/template/footer');
	}

	public function update_menu($menu_id)
	{
		$data['title'] = "Menu Edit";

		$data["menu_info"] = $this->menu_model->update_menu($menu_id);

		echo view('ironman/template/header', $data);
		echo view('ironman/template/left_nav');
		echo view('ironman/template/top_nav');
		echo view('ironman/menu/menu_edit_v', $data);
		echo view('ironman/template/footer');
	}

	public function update_menu_submit()
	{
		if (isset($_REQUEST["menu_admin_status"])) {
			$menu_status = "active";
		} else {
			$menu_status = "inactive";
		}
		$this->validation->setRules([
			'menu_admin_name' => 'required',
			'menu_admin_parent_menu' => 'required',
			'menu_admin_sort_order' => 'required',
			'menu_admin_user_privilege' => 'required',
			'menu_admin_type' => 'required',
		]);
		if ($this->validation->withRequest($this->request)->run() == false) {
			$sdata['message'] = "Menu Update validation Failed";

			$this->session->setFlashdata('red_alert', $sdata['message']);
			return redirect()->to('/ironman/menu_setting_c');
		} else {
			$menu_info = [
				"menu_admin_id" => $_REQUEST["menu_admin_id"],
				"menu_admin_name" => $_REQUEST["menu_admin_name"],
				"menu_admin_parent_menu" => $_REQUEST["menu_admin_parent_menu"],
				"menu_admin_url" => $_REQUEST["menu_admin_url"],
				"menu_admin_icon" => $_REQUEST["menu_admin_icon"],
				"menu_admin_sort_order" => $_REQUEST["menu_admin_sort_order"],
				"menu_admin_user_privilege" => implode(',', $_REQUEST["menu_admin_user_privilege"]),
				"menu_admin_type" => $_REQUEST["menu_admin_type"],
				"menu_admin_status" => $menu_status,
			];
			$inserted = $this->menu_model->update_menu_submit($menu_info);
			if ($inserted) {
				$sdata['message'] = "Menu Successfully Updated";
			} else {
				$sdata['message'] = "Menu Update Failed !";
			}
			$this->session->setFlashdata('green_alert', $sdata['message']);
			return redirect()->to("/ironman/Menu_setting_c");
		}
	}
	// ----------- menu status ---------------
	public function update_side_menu_status_list()
	{
		$menu_admin_status = $_REQUEST["menu_admin_status"];
		$menu_admin_id  = $_REQUEST["menu_admin_id"];
		$this->menu_model->update_menu_admin_status($menu_admin_status, $menu_admin_id);
	}
	// ------------ menu status--------------
	// ------------Delete menu status--------------
	public function delete_admin_menu($menu_admin_id)
	{
		$data["menu_data"] = $this->menu_model->get_admin_menu_by_id($menu_admin_id);
		// if ($data["user_data"]->user_picture != "") {
		// 	unlink("user_img/" . $data["user_data"]->user_phone . ".jpg");
		// }
		$this->menu_model->delete_menu($menu_admin_id);
		$sdata['message'] = "Menu " . $data["menu_data"]->menu_admin_name . " Successfully Deleted";
		$this->session->setFlashdata('red_alert', $sdata['message']);
		return redirect()->to("/ironman/menu_setting_c");
	}
	// ------------Delete menu status--------------

}
