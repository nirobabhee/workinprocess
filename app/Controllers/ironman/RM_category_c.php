<?php

namespace App\Controllers\ironman;

use App\Controllers\BaseController;

class RM_category_c extends BaseController
{
    public function __construct()
	{
        helper('crud_check');
        $this->rm_category_model = model('App\Models\ironman\RM_category_m');
	}
    public function index()
    {
        $data['title'] = "RM Category";
        $data['categories'] = $this->rm_category_model->get_all();
        echo view('ironman/template/header', $data);
        echo view('ironman/template/left_nav');
        echo view('ironman/template/top_nav');
        echo view('ironman/rm_category/rm_category_v');
        echo view('ironman/template/footer');
    }

    public function insert_category()
    {
        $model = new \App\Models\Rm_category_m;
        $category = $this->requests->getPost();
        $this->validation->setRules([
            'rm_category_name' => 'required',           
        ]);
        if ($this->validation->withRequest($this->request)->run() == false) {
            $sdata['message'] = "Category Creation Failed";

            $this->session->setFlashdata('red_alert', $sdata['message']);
            return redirect()->to('/ironman/rm_category_c');
        } else {
            $category_info = [
                "rm_category_name" => $category["rm_category_name"],
                "rm_category_chain_parent" => $category['rm_category_chain_parent'],
                "rm_category_chain_child" => $category['rm_category_chain_parent'],
                "rm_category_parent_id" => $category['rm_category_chain_parent'],
                "rm_category_status" => 'active',
            ];
            $inserted = $this->rm_category_model->insert_category($category_info);
            // ````````````````````````` For Children Category`````````````````````````````````````` 
            $get_category_data_final = $this->rm_category_model->get_row_by_id($inserted);
            $explode_cate_chain = explode(',', $get_category_data_final->rm_category_chain_parent);
            for ($c = 0; $c < count($explode_cate_chain); $c++) {
                $get_child_chain = $this->rm_category_model->get_row_by_id($explode_cate_chain[$c]);
                if ($get_child_chain->rm_category_chain_child != NULL) {
                    $pre_unique_chain = $get_child_chain->rm_category_chain_child . ',' . $inserted;
                    $unique_chain = explode(',', $pre_unique_chain);
                    $unique_chain_result = array_unique($unique_chain);
                    $update_child_chain = array(
                        'rm_category_chain_child' => implode(',', $unique_chain_result)
                    );
                } else {
                    $pre_unique_chain = $inserted;
                    $unique_chain = explode(',', $pre_unique_chain);
                    $unique_chain_result = array_unique($unique_chain);
                    $update_child_chain = array(
                        'rm_category_chain_child' => implode(',', $unique_chain_result)
                    );
                }
                $this->rm_category_model->update_by_id($update_child_chain, $explode_cate_chain[$c]);
            }
            // End Children Category
            if ($inserted) {
                $sdata['message'] = "Category Successfully Created";
            } else {
                $sdata['message'] = "Category Creation Failed";
            }
            $this->session->setFlashdata('green_alert', $sdata['message']);
            return redirect()->to("/ironman/Rm_category_c");
        }
    }

    // For Datatable
    public function get_all_category_dt_ajax()
    {
        // echo "paisi";
        // exit;
        $data = array();
        $memData = $this->rm_category_model->get_all_categories_ajax($_POST);
        $i = $_POST['start'];
        foreach ($memData as $member) {
            $btn_link_edit = base_url() . "/ironman/rm_category_c/edit_rm_category/" . $member->rm_category_id;
            $btn_link_delete = base_url() . "/ironman/rm_category_c/delete_rm_category/" . $member->rm_category_id;
            $actionHtml = view('ironman/rm_category/rm_category_action_button', array(
                "edit" => $btn_link_edit,
                "delete" => $btn_link_delete
            ));
            $i++;
            $data[] = array(
                $i,
                $member->rm_category_id,
                $member->rm_category_name,
                $member->rm_category_chain_parent,
                $member->rm_category_chain_child,
                $member->rm_category_status,

            );
        }

        $records_total = $this->rm_category_model->get_all_rm_category_count($_POST);
        $records_filtered =  $this->rm_category_model->get_all_rm_category_filtered($_POST);
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $records_total,
            "recordsFiltered" => $records_filtered->rowcount,
            "data" => $data,
            "my" => $records_filtered
        );

        echo json_encode($output);
    }


    public function rm_category_edit($id)
    {
        $data['title'] = "Rm Category Edit";
        $data['category'] = $this->rm_category_model->get_row_by_id($id);
        $data['categories'] = $this->rm_category_model->get_all();
        echo view('ironman/template/header', $data);
        echo view('ironman/template/left_nav');
        echo view('ironman/template/top_nav');
        echo view('ironman/rm_category/rm_category_edit_v');
        echo view('ironman/template/footer');
    }

    public function update_category()
    {
        $model = new \App\Models\Rm_category_m;
        $category = $this->requests->getPost();
       
        $id=$category['rm_category_id'];      
        $get_cate_data = $this->rm_category_model->get_row_by_id($id);// Start Chain Update
        $expld_cate_chain = explode(',',$get_cate_data->rm_category_chain_parent);       

     
    if($get_cate_data->rm_category_parent_id != $category['rm_category_chain_parent']){
      //  if($get_cate_data->rm_category_chain_parent){
            
            for($d = 0; $d < count($expld_cate_chain); $d++){               
                $get_chain = $this->rm_category_model->get_row_by_id($expld_cate_chain[$d]);               
                $old_child_chain = explode(',', $get_chain->rm_category_chain_child);
                $old_chain = explode(',', $get_cate_data->rm_category_chain_child);
                $array_removed = array_diff($old_child_chain, $old_chain);
               if($old_child_chain == $old_chain){
                    $final_child_chain = array(
                        'rm_category_chain_child' => implode(',',$old_chain)
                    );                   
                }else{
                    $final_child_chain = array(                        
                        'rm_category_chain_child' => implode(',',$array_removed)
                    );
                }             
                $this->rm_category_model->update_by_id($final_child_chain,$expld_cate_chain[$d]);        
            }
        }// for Removing old Child Chain
       
        if ($category['rm_category_chain_parent']) {
            // $category_chain = $this->product_model->get_product_category_chain($this->input->post("parent_category"));
            $category_chain = $this->rm_category_model->get_row_by_id($category['rm_category_chain_parent']);
            $update_chain = array(
                'rm_category_chain_parent' => $category_chain->rm_category_chain_parent . ',' . $id
            );
        } else {
            $update_chain = array(
                'rm_category_chain_parent' =>$id
            );
        }
       $this->rm_category_model->update_by_id($update_chain,$category['rm_category_id']); 
      // End Update Single category_chain

        // ........................................................................      

        $get_category_data_final = $this->rm_category_model->get_row_by_id($id);    
        $explode_cate_chain = explode(',',$get_category_data_final->rm_category_chain_parent);       
        for($c = 0; $c < count($explode_cate_chain); $c++){          
            $get_child_chain = $this->rm_category_model->get_row_by_id($explode_cate_chain[$c]);
            if($get_child_chain->rm_category_chain_child != NULL){   
               // $get_category_data_parent = $this->db->where("parent_id", $id)->get('category');

                $get_category_data_parent = $this->rm_category_model->get_parent_rows_by_id($id);
                if(count($get_category_data_parent) > 0){
                    $parent_c = $get_category_data_parent;                    
                    foreach($parent_c as $prnt){
                        $prnt_child_array[] = $prnt->rm_category_chain_child;
                    }
                    $impld_prnt_child_array = implode(',', $prnt_child_array);
                    $pre_unique_chain = $get_child_chain->rm_category_chain_child .','. $get_category_data_final->rm_category_chain_child .','. $impld_prnt_child_array;
                }else{
                    $pre_unique_chain = $get_child_chain->rm_category_chain_child .','. $get_category_data_final->rm_category_chain_child;
                }                

                $unique_chain = explode(',',$pre_unique_chain);
                $unique_chain_result = array_unique($unique_chain);
                $update_child_chain = array(
                    'rm_category_chain_child' => implode(',',$unique_chain_result)
                );
            }else{              
                $get_category_data_parent = $this->rm_category_model->get_parent_rows_by_id($d);

                if(count($get_category_data_parent) > 0){
                    $parent_c = $get_category_data_parent;                     
                    foreach($parent_c as $prnt){
                        $prnt_array[] = $prnt->id;
                    }                    
                    $unique_chain_result = array_unique($prnt_array);
                    $update_child_chain = array(
                        'rm_category_chain_child' => $id .','. implode(',',$unique_chain_result)
                    );                    
                    $this->rm_category_model->update_by_id($update_child_chain,$explode_cate_chain[$c]);
                }else{
                   $update_child_chain = array(
                    'rm_category_chain_child' => $id
                );
               }
           } 
           $this->rm_category_model->update_by_id($update_child_chain,$explode_cate_chain[$c]); 

        }// Add New child chain Up to Bottom
        // ```````````````````````````` Start Synchronization ```````````````````````````````````````````````````````
        $update_childs_chains = array(
            'rm_category_chain_child' => NULL
        );
        $this->rm_category_model->update_by_id($update_childs_chains,$category['rm_category_id']); 

        $get_category_data_parent = $this->rm_category_model->get_parent_rows_by_id($category['rm_category_id']);
        
        if(count($get_category_data_parent) > 0){
            $parent_c = $get_category_data_parent;                    
            foreach($parent_c as $prnt){
                $prnt_array[] = $prnt->rm_category_id;
            }                    
            $unique_chain_result = array_unique($prnt_array);
            $update_childs_chains = array(
                'rm_category_chain_child' => $category['rm_category_id'] .','. implode(',',$unique_chain_result)
            );
            $this->rm_category_model->update_by_id($update_childs_chains,$category['rm_category_id']); 
            $get_category_data_final_child = $this->rm_category_model->get_row_by_id($category['rm_category_id']);
           
            $explode_cates_chains = explode(',',$get_category_data_final_child->rm_category_chain_child);
            
            for($v = 0; $v < count($explode_cates_chains); $v++){                
                $get_categories_data_parents = $this->rm_category_model->get_parent_rows_by_id($explode_cates_chains[$v]);
                $get_category_data_final_child = $this->rm_category_model->get_row_by_id($explode_cates_chains[$v]);
                if(count($get_categories_data_parents) > 0){
                    $parent_s_c = $get_categories_data_parents;                    
                    foreach($parent_s_c as $prnt_c){
                        $prnt_childs_array[] = $prnt_c->rm_category_id;
                    }
                    $implds_prnt_child_array = implode(',', $prnt_childs_array);
                    $pre_unique_chains = $get_category_data_final_child->rm_category_chain_child .','.$implds_prnt_child_array;
                    $uniques_chain = explode(',',$pre_unique_chains);
                    $uniques_chains_result = array_unique($uniques_chain);
                    $update_child_chains = array(
                        'rm_category_chain_child' => implode(',',$uniques_chains_result)
                    );
                }
            } 
            
            $this->rm_category_model->update_by_id($update_child_chains,$id); 
         
        }else{
           $update_childs_chains = array(
            'rm_category_chain_child' => $id
        );       

           $this->rm_category_model->update_by_id($update_childs_chains,$id);
             // }
       } 
        // ````````````````````````````End Synchoronization```````````````````````````````````````````````````````
      
      $get_category_data = $this->rm_category_model->get_row_by_id($id);    

       $explde_cate_chain = explode(',',$get_category_data->rm_category_chain_child);
       if(count($explde_cate_chain) > 1){
        for($w = 0; $w < count($explde_cate_chain); $w++){          
           $category_new_parents = $this->rm_category_model->get_parent_rows_by_id($explde_cate_chain[$w]);
            if(count($category_new_parents) > 0){
                $category_new_parent = $category_new_parents;
                $category_new_parent = $this->rm_category_model->get_row_by_id($explde_cate_chain[$w]);
                $pre_unique_root_chain = $category['rm_category_chain_parent'].','. $id .','. $category_new_parent->rm_category_parent_id  . ',' . $explde_cate_chain[$w];
            }else{
                $pre_unique_root_chain = $category['rm_category_chain_parent'].','. $id . ',' . $explde_cate_chain[$w];
            }

            $unique_root_chain = explode(',',$pre_unique_root_chain);
            $filter = array_filter($unique_root_chain);
            $unique_root = array_unique($filter);
            $update_chain_cat = array(
                'rm_category_chain_parent' =>  implode(',',$unique_root)
            );           

            $this->rm_category_model->update_by_id($update_chain_cat,$explde_cate_chain[$w]); 

            }// Add category chain
            
        }

 // End Children Category
        if ($category["rm_category_id"]) {
            $sdata['message'] = "Category Successfully Updated";
        } else {
            $sdata['message'] = "Category Creation Failed";
        }
        $this->session->setFlashdata('green_alert', $sdata['message']);
        return redirect()->to("/ironman/Rm_category_c");
    }
// ----------- STARTmenu status ---------------
public function update_list_of_category_status()
{

    $rm_category_status = $_REQUEST["rm_category_status"];
    $rm_category_id  = $_REQUEST["rm_category_id"];
    $this->rm_category_model->update_list_of_rm_category_status($rm_category_status, $rm_category_id );
}
// ------------ ENDmenu status--------------


    public function delete_category($cat_id)
	{
		$data["category_data"] = $this->rm_category_model->get_row_by_id($cat_id);
		$this->rm_category_model->delete_category($cat_id);

		$sdata['message'] = "Category " . $data["category_data"]->rm_category_id . " Successfully Deleted";
		$this->session->setFlashdata('red_alert', $sdata['message']);
		return redirect()->to("/ironman/rm_category_c");
	}
    public function test()
    {
        $search  = array('A', 'B', 'C', 'D', 'E');
        // $d=implode("->",$search);
        $check = str_replace(",", "''", $search);
        $checkbox1 = str_replace("->", "", $check);
        echo '<pre>';
        print_r($checkbox1);
        //    print_r($d);
        exit;
    }
}
