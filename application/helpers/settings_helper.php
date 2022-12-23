<?php
function get_settings($key)
{
    $ci = &get_instance();
    $ci->load->model('Settings_model', 'settings_md');
    return $ci->settings_md->select_data($key);
}

