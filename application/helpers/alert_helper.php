<?php

function successAlert()
{
    $ci =& get_instance();

    if ($ci->session->has_userdata('success_message')):?>
        <div class="alert alert-success" role="alert">
            <?php
            echo $ci->session->flashdata('success_message');
            $ci->session->unset_userdata('success_message');
            ?>
        </div>
    <?php endif;
}

function errorAlert()
{
    $ci =& get_instance();

    if ($ci->session->has_userdata('error_message')):?>
        <div class="alert alert-danger" role="alert">
            <?php
            echo $ci->session->flashdata('error_message');
            $ci->session->unset_userdata('error_message');
            ?>
        </div>
    <?php endif;
}