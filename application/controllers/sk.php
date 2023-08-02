<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sk extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'e-file perumda tugu tirta';
        $this->load->view('dashboard/menu_sk');
    }
}