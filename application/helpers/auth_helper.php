<?php

function auth()
{
    $ci = get_instance();
    $ci->load->library('session');

    if ($ci->session->userdata('login') == false) {
        redirect(base_url());
    }
}
