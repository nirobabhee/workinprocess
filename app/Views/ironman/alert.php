<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script type="text/javascript">

$this->session->set_flashdata('error','Crediancial is wrong');
<?php
if($this->session->flashdata('notice') != ''){
echo '<script>toastr.warning("'.$this->session->flashdata('notice').'","Notice");</script>';
}

if($this->session->flashdata('error') != ''){
echo '<script>toastr.error("'.$this->session->flashdata('notice').'","Error");</script>';
}

if($this->session->flashdata('success') != ''){
echo '<script>toastr.success("'.$this->session->flashdata('success').'","Success");</script>';
}
?>