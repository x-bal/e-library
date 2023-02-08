<?php

class DashboardController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        auth();
    }

    public function index()
    {
        $this->load->view('dashboard/index');
    }
}
