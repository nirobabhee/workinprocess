<?php

function template_view($view_name = "")
{
    // echo '<pre>';
    // print_r($data);
    // exit;
    echo view("template/header");
    echo view("template/left_nav");
    echo view("template/top_nav");

    // echo  view($view_name);
    echo  view($view_name);
    // echo $data;

    echo view("template/footer");
}
