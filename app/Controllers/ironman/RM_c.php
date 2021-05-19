<?php

namespace App\Controllers\ironman;

use App\Controllers\BaseController;

class RM_c extends BaseController
{
	public function __construct()
	{
		helper("crud_check");
		$this->crud_generator_model = model('App\Models\ironman\Crud_generator_m.php');
	}
	public function index()
	{
		$data['title'] = "Raw Material";
		$data['get_category'] = $this->crud_generator_model->get_all_table_data('rm_category', '*');
		$data['get_attribute'] = $this->crud_generator_model->get_all_table_data('rm_attribute', '*');
		$data['get_tag'] = $this->crud_generator_model->get_all_unique_table_data('rm', 'rm_tag');
		$data['get_unit'] = $this->crud_generator_model->get_all_table_data('unit', '*');
		echo view('ironman/template/header', $data);
		echo view('ironman/template/left_nav');
		echo view('ironman/template/top_nav');
		echo view('ironman/rm/rm_v', $data);
		echo view('ironman/template/footer');
	}

	public function create_raw_material_submit()
	{
		$this->validation->setRules([
			'raw_material_name' => 'required|trim',
			'raw_material_sku' => 'required|trim',
			'material_category' => 'required',
			'minimum_stock_level' => 'required|numeric',
			'maximum_stock_level' => 'required|numeric',
			'unit_price' => 'required|numeric',
			'cost_price' => 'required|numeric',
			'tag' => 'trim'
		]);
		if ($this->validation->withRequest($this->request)->run() == false) {
			$sdata['message'] = "Raw Material Creation Failed";
			$this->session->setFlashdata('red_alert', $sdata['message']);
			return redirect()->to('/ironman/RM_c');
		} else {
			if ($_REQUEST["maximum_stock_level"] > $_REQUEST["minimum_stock_level"]) {
				if ($this->requests->getFile('raw_material_picture')) { // if picture uploaded
					$img = $this->requests->getFile('raw_material_picture');
					$image_optimization = $this->image_upload($img, 1);
					$raw_material_info = [
						"rm_name" => $_REQUEST["raw_material_name"],
						"rm_sku" => $_REQUEST["raw_material_sku"],
						"rm_category" => $_REQUEST["material_category"],
						"rm_attribute" => implode(",", $_REQUEST["raw_material_attribute"]),
						"rm_minimum_stock_level" => $_REQUEST["minimum_stock_level"],
						"rm_maximum_stock_level" => $_REQUEST["maximum_stock_level"],
						"rm_unit_price" => $_REQUEST["unit_price"],
						"rm_cost_price" => $_REQUEST["cost_price"],
						"rm_image" => $image_optimization,
						'rm_tag' =>  !empty($_REQUEST["tag"]) ? strtoupper($_REQUEST["tag"]) : NULL
					];
				} else {
					$raw_material_info = [
						"rm_name" => $_REQUEST["raw_material_name"],
						"rm_sku" => $_REQUEST["raw_material_sku"],
						"rm_category" => $_REQUEST["material_category"],
						"rm_attribute" => implode(",", $_REQUEST["raw_material_attribute"]),
						"rm_minimum_stock_level" => $_REQUEST["minimum_stock_level"],
						"rm_maximum_stock_level" => $_REQUEST["maximum_stock_level"],
						"rm_unit_price" => $_REQUEST["unit_price"],
						"rm_cost_price" => $_REQUEST["cost_price"],
						"rm_image" => NULL,
						'rm_tag' =>  !empty($_REQUEST["tag"]) ? strtoupper($_REQUEST["tag"]) : NULL
					];
				}
				$inserted = $this->crud_generator_model->insert_data_into_table('rm', $raw_material_info);
				if ($inserted) {
					$sdata['message'] = "Raw Material Successfully Created";
				} else {
					$sdata['message'] = "Raw Material Creation Failed";
				}
				$this->session->setFlashdata('green_alert', $sdata['message']);
				return redirect()->to("/ironman/RM_c");
			} else {
				$sdata['message'] = "Raw Material Creation Failed";
				$this->session->setFlashdata('green_alert', $sdata['message']);
				return redirect()->to("/ironman/RM_c");
			}
		}
	}

	public function get_raw_material_list()
	{
		$raw_materials_data = $this->crud_generator_model->get_all_data($_POST);
		$i = $_POST['start'];
		foreach ($raw_materials_data as $val) {
			$get_attribute = $val->rm_attribute;
			$get_each_val = explode(",", $get_attribute);
			$attr_array = [];
			for ($j = 0; $j < count($get_each_val); $j++) {
				$get_name[] = $this->crud_generator_model->get_data_by_id('rm_attribute', 'rm_attribute_name', 'rm_attribute_id', $get_each_val[$j]);
				array_push($attr_array, $get_name[$j]->rm_attribute_name);
			}
			if (count($attr_array) > 1) {
				$attr = implode(" , ", $attr_array);
			} else {
				$attr = implode(" ", $attr_array);
			}
			$data[] = array(
				++$i,
				$val->rm_name,
				$val->rm_sku,
				$val->rm_category_name,
				$attr,
				number_format($val->rm_minimum_stock_level, 2),
				number_format($val->rm_maximum_stock_level, 2),
				number_format($val->rm_unit_price, 2),
				number_format($val->rm_cost_price, 2),
				!empty($val->rm_image) ? $val->rm_image : NULL,
				!empty($val->rm_tag) ? $val->rm_tag : '---',
				$val->rm_id
			);
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->crud_generator_model->countAll($_POST),
			"recordsFiltered" => $this->crud_generator_model->countFiltered($_POST),
			"data" => isset($data) ? $data : [],
		);
		echo json_encode($output);
	}
	public function get_tag_values()
	{
		$tag_val = $_REQUEST['tag'];
		if (isset($tag_val)) {
			$output = "";
			$get_tag_list = $this->crud_generator_model->get_matched_values('rm', 'rm_tag', $tag_val);
			$output = '<ul class="list-unstyled for_tags">';
			if ($get_tag_list) {
				foreach ($get_tag_list as $list) {
					$output .= '<li>' . $list->rm_tag . '</li>';
				}
			}
			$output .= '</ul>';
			echo $output;
		}
	}

	public function edit_raw_material($rm_id)
	{
		$data['title'] = "Raw Material Edit";
		$data["raw_material_data"] = $this->crud_generator_model->get_data_by_id('rm', '*', 'rm_id', $rm_id);
		$data['get_category'] = $this->crud_generator_model->get_all_table_data('rm_category', '*');
		$data['get_attribute'] = $this->crud_generator_model->get_all_table_data('rm_attribute', '*');
		$data['get_tag'] = $this->crud_generator_model->get_all_unique_table_data('rm', 'rm_tag');
		echo view('ironman/template/header', $data);
		echo view('ironman/template/left_nav');
		echo view('ironman/template/top_nav');
		echo view('ironman/rm/rm_edit_v', $data);
		echo view('ironman/template/footer');
	}
	public function image_upload($img, $status)
	{
		$newName = '';
		if ($img->isValid() && !$img->hasMoved()) {
			$img_size = $img->getSizeByUnit("mb");
			$img_type = $img->getMimeType();
			if (!in_array($img_type, ['image/png', 'image/jpeg'])) {
				$sdata['message'] = "Raw Material Image Uploading Failed";
				$this->session->setFlashdata('red_alert', $sdata['message']);
				return redirect()->back()->with('warning', 'Invalid file format (PNG or JPEG only)');
			}
			if ($img_size > 2) {
				$sdata['message'] = "Raw Material Image Uploading Failed";
				$this->session->setFlashdata('red_alert', $sdata['message']);
				return redirect()->back()->with('warning', 'Image size must be less than 500 KB');
			}
			$newName = "raw_material_" . $_REQUEST["raw_material_sku"] . ".jpg";
			$img->move('raw_material/', $newName);
		}
		if (!empty($newName)) {
			$newName = $newName;
		} else {
			$newName = NULL;
		}
		return $newName;
	}
	public function update_raw_material()
	{
		$this->validation->setRules([
			'raw_material_name' => 'required|trim',
			'raw_material_sku' => 'required|trim',
			'material_category' => 'required',
			'minimum_stock_level' => 'required|numeric',
			'maximum_stock_level' => 'required|numeric',
			'unit_price' => 'required|numeric',
			'cost_price' => 'required|numeric',
			'tag' => 'trim'
		]);
		if ($this->validation->withRequest($this->request)->run() == false) {
			$sdata['message'] = "Raw Material Update Failed";

			$this->session->setFlashdata('red_alert', $sdata['message']);
			return redirect()->to('/ironman/RM_c');
		} else {
			$rm_id = $_REQUEST["rm_id"];
			if ($this->requests->getFile('raw_material_picture')) { // if picture uploaded
				$img = $this->requests->getFile('raw_material_picture');
				$image_optimization = $this->image_upload($img, 2);
				$raw_material_info = [
					"rm_name" => $_REQUEST["raw_material_name"],
					"rm_category" => $_REQUEST["material_category"],
					"rm_attribute" => implode(",", $_REQUEST["raw_material_attribute"]),
					"rm_minimum_stock_level" => $_REQUEST["minimum_stock_level"],
					"rm_maximum_stock_level" => $_REQUEST["maximum_stock_level"],
					"rm_unit_price" => $_REQUEST["unit_price"],
					"rm_cost_price" => $_REQUEST["cost_price"],
					"rm_image" => $image_optimization,
					'rm_tag' =>  !empty($_REQUEST["tag"]) ? strtoupper($_REQUEST["tag"]) : NULL
				];
			} else {
				$raw_material_info = [
					"rm_name" => $_REQUEST["raw_material_name"],
					"rm_category" => $_REQUEST["material_category"],
					"rm_attribute" => implode(",", $_REQUEST["raw_material_attribute"]),
					"rm_minimum_stock_level" => $_REQUEST["minimum_stock_level"],
					"rm_maximum_stock_level" => $_REQUEST["maximum_stock_level"],
					"rm_unit_price" => $_REQUEST["unit_price"],
					"rm_cost_price" => $_REQUEST["cost_price"],
					"rm_image" => NULL,
					'rm_tag' =>  !empty($_REQUEST["tag"]) ? strtoupper($_REQUEST["tag"]) : NULL
				];
			}
			$updated = $this->crud_generator_model->update_data_by_id('rm_id', $rm_id, 'rm', $raw_material_info);
			if ($updated) {
				$sdata['message'] = "Raw Material Successfully Updated";
			} else {
				$sdata['message'] = "Raw Material Update Failed";
			}
			$this->session->setFlashdata('green_alert', $sdata['message']);
			return redirect()->to("/ironman/RM_c");
		}
	}
	public function check_data_existence()
	{
		$sku = $_REQUEST['raw_material_sku'];
		$has_data = $this->crud_generator_model->get_matched_values('rm', 'rm_sku', $sku);
		if ($has_data) {
			$result = 1;
		} else {
			$result = 0;
		}
		echo json_encode($result);
		exit;
	}
	///Delete........
	public function delete_raw_material($rm_id)
	{
		$this->crud_generator_model->delete_rm('rm', $rm_id);
		$sdata['message'] = "RM datum Successfully Deleted";
		$this->session->setFlashdata('red_alert', $sdata['message']);
		return redirect()->to("/ironman/rm_c");
	}
}