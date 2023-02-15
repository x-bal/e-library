<?php

function auth()
{
    $ci = get_instance();
    $ci->load->library('session');

    if ($ci->session->userdata('login') == false) {
        redirect(base_url());
    }
}

function isAdmin()
{
    $ci = get_instance();
    $ci->load->library('session');

    if ($ci->session->userdata('level') != 1) {
        redirect('not-found');
    }
}
