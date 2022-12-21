<?php


function uploadFile($filePath, $allowedTypes, $name)
{
    $ci =& get_instance();

    $config['upload_path'] = $filePath;                 //'uploads/blog_image/';
    $config['allowed_types'] = $allowedTypes;         //'gif|jpg|png';
    $config['overwrite'] = 'false';


    $ci->load->library('upload', $config);

    if (!$ci->upload->do_upload($name)) {

        $error = array('error' => $ci->upload->display_errors());
        $ci->session->set_flashdata('error_message', $error);
        return false;

    } else {

        $file_data = $ci->upload->data();
        return $filePath . $file_data['file_name'];
    }
}