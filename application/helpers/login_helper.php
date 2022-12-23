<?php

function is_logged()
{
    $ci = &get_instance();
    if (empty($ci->session->userdata('loggedin'))) {
        redirect('backend/login');
    }
}

function no_logged()
{
    $ci = &get_instance();
    if ($ci->session->has_userdata('loggedin')) {
        redirect('backend/dashboard');
    }
}