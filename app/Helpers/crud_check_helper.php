<?php 

if ( ! function_exists('crud_check')){
   function crud_check($btn_type=""){
     
       $session = session();
       $login_user = $session->get("login_user");
       $explode_create = explode(",", $login_user->user_crud);
        if($btn_type=="create"){
            $crud_check = in_array("c", $explode_create);
            if ($crud_check != NULL && !empty($crud_check)) {

                return true;
            }
            else{
                return false;
            }
        }
        else if($btn_type=="update"){
            $crud_check = in_array("u", $explode_create);
            if ($crud_check != NULL && !empty($crud_check)) {

                return true;
            }
            else{
                return false;
            }
        }
        else if($btn_type=="delete"){
            $crud_check = in_array("d", $explode_create);
            if ($crud_check != NULL && !empty($crud_check)) {

                return true;
            }
            else{
                return false;
            }
        }
        else{

            $crud_check = in_array("r", $explode_create);
            if ($crud_check != NULL && !empty($crud_check)) {

                return true;
            }
            else{
                return false;
            }

        }
        
   }
}