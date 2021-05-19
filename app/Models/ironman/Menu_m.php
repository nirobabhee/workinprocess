<?php

namespace App\Models;

use CodeIgniter\Model;

class Menu_m extends Model
{

    protected $column_order = array('sl', 'menu_admin_name', 'menu_admin_parent_menu', 'menu_admin_url', 'menu_admin_sort_order', 'menu_admin_user_privilege', 'menu_admin_status');
    protected $order = array('menu_admin_id' => 'asc');
    public function get_all_menu()
    {
        $builder = $this->db->table("menu_admin");
        return  $builder->get()->getResult();
    }

    public function get_menu_list($menu_type)
    {
        $builder = $this->db->table("menu_admin");
        $builder->where('menu_admin_type', $menu_type);
        return $builder->get()->getResult();
    }

    public function create_menu_submit($menu_info)
    {
        $builder = $this->db->table("menu_admin");
        $builder->insert($menu_info);
        $new_menu_id = $this->insertID();

        $builder = $this->db->table("menu_admin");
        $builder->where("menu_admin_id", $menu_info["menu_admin_parent_menu"]);
        $parent_menu = $builder->get()->getResult();
        if ($parent_menu) {

            $new_menu_chain = $parent_menu[0]->menu_admin_chain . "," . $new_menu_id;
        } else {
            $new_menu_chain = $new_menu_id;
        }

        $builder = $this->db->table("menu_admin");
        $builder->set('menu_admin_chain', $new_menu_chain);
        $builder->where('menu_admin_id', $new_menu_id);
        return  $builder->update();
    }

    public function update_menu($menu_id)
    {
        $builder = $this->db->table("menu_admin");
        $builder->where("menu_admin_id", $menu_id);
        return $builder->get()->getRow();
    }


    //dt side menu starts
    public function get_menu_list_dt()
    {
        $builder = $this->db->table("menu_admin");
        $builder = $builder->where("menu_admin_type", $_POST["menu_type"]);
        $menu_type = $_POST["menu_type"];
        //search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $query = "menu_admin_name LIKE '%$search%'";
        } else {
            $query = "menu_admin_id !=''";
        }

        //order
        if (isset($_POST["order"])) {
            $result_order = $this->column_order[$_POST['order']['0']['column']];
            $result_dir = $_POST['order']['0']['dir'];
        } else if ($this->order) {
            $order = $this->order;
            $result_order = Key($order);
            $result_dir = $order[Key($order)];
        }
        if ($_POST["length"] != -1) {
            $query = $builder->select("*")
                ->where($query)
                ->orderBy($result_order, $result_dir)
                ->limit($_POST["length"], $_POST["start"])
                ->get();

            return $query->getResult();
        }
    }

    public function get_menu_list_count()
    {
        $builder = $this->db->table("menu_admin");
        $builder->where('menu_admin_type', $_POST["menu_type"]);
        $query = $builder->countAllResults();

        // $query = "SELECT COUNT(id) as rowcount FROM users";
        // $query = $db->query($query)->getRow();
        // print_r($query);
        return $query;
    }

    public function get_menu_list_filtered()
    {
        $menu_type = $_POST["menu_type"];
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $query = "AND (menu_admin_name LIKE '%$search%')";
        } else {
            $query = "";
        }

        $db = \Config\Database::connect();

        $query2 = "SELECT COUNT(menu_admin_id) as rowcount FROM menu_admin WHERE menu_admin_type='$menu_type' AND menu_admin_id !='' $query";
        $query2 = $db->query($query2)->getRow();
        return $query2;
    }
    //dt side menu ends

    //side menu list
    public function side_menu_list($parent_id)
    {
        if ($parent_id) {
            $sql = $this->db->query("SELECT * FROM menu_admin WHERE `menu_admin_parent_menu` = $parent_id AND `menu_admin_status` = 1 AND `menu_admin_type`='side_menu' ORDER BY `menu_admin_sort_order` ASC");
        } else {
            $sql = $this->db->query("SELECT * FROM menu_admin WHERE `menu_admin_parent_menu` =0 AND `menu_admin_status` = 1 AND `menu_admin_type`= 'side_menu' ORDER BY `menu_admin_sort_order` ASC");
        }
        $result = $sql->getResult();
        $menu = '';
        foreach ($result as $row) {
            $class = 'active';
            // $user_privilege = explode(",", $row->menu_user_privilege);
            // if (in_array($user_type, $user_privilege)) {
            //     if ($segement == $row->menu_url) {
            //         $class = 'active';
            //     } else {
            //         $class = '';
            //     }
            if ($row->menu_admin_url) {
                $menu .= '<li class="' . $class . '"><a href="' . base_url($row->menu_admin_url) . '"><i class="' . $row->menu_admin_icon . '"></i><span class="nav-link-text">' . $row->menu_admin_name . '</span></a>';
            } else {
                $menu .= '<li class="' . $class . '"><a href="#"><i class="' . $row->menu_admin_icon . '"></i><span class="nav-link-text">' . $row->menu_admin_name . '</span></a>';
            }
            $is_sub_menu = $this->is_sub_menu($row->menu_admin_id);
            if ($is_sub_menu) {
                $menu .= '<ul>' . $this->side_menu_list($row->menu_admin_id) . '</ul>';
            }
            $menu .= '</li>';
            // }
        }
        return $menu;
        //--------------------------------------------------------
    }
    public function is_sub_menu($parent_id)
    {
        $query = $this->db->query("SELECT * FROM menu_admin WHERE `menu_admin_parent_menu` = $parent_id AND `menu_admin_status` = 1");
        return $query->getRow();
    }

    public function get_parent_menu_name($parent_menu_id)
    {
        $builder = $this->db->table("menu_admin");
        $builder->where("menu_admin_id", $parent_menu_id);
        return $builder->get()->getRow();
    }

    public function update_menu_submit($menu_info)
    {
        $builder = $this->db->table("menu_admin");
        return $builder->replace($menu_info);
    }
    // --------------------status Updated-------------------------
    public function update_menu_admin_status($menu_admin_status = "", $menu_admin_id = "")
    {
        $builder = $this->db->table("menu_admin");
        $builder->set('menu_admin_status', $menu_admin_status);
        $builder->where('menu_admin_id', $menu_admin_id);
        $builder->update();
    }
    // -----------------------status Updated----------------------
     //get Menu by id

     public function get_admin_menu_by_id($menu_admin_id)
     {
         $builder = $this->db->table("menu_admin");
         $builder->where('menu_admin_id', $menu_admin_id);
         $query = $builder->get()->getRow();
         return $query;
     }
     //delete Menu 

    public function delete_menu($menu_admin_id)
    {
        $builder = $this->db->table("menu_admin");
        $builder->where('menu_admin_id', $menu_admin_id);
        $builder->delete();
    }

}
