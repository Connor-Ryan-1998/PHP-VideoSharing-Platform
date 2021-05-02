<?php
defined('BASEPATH') or exit('No direct script access allowed');

class managementdashboard extends CI_Controller
{
    public function index()
    {
        $data['error'] = "";
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('dashboard_model');

        $data['user_list'] = $this->dashboard_model->fetch_users();
        $this->load->view('template/header');
        // $this->load->view('managementdashboard', $data);
        $this->load->view('template/footer');
    }
    function fetch_data()
    {
        if ($this->input->post('users')) {
            $chart_data = $this->dynamic_chart_model->fetch_chart_data($this->input->post('year'));

            foreach ($chart_data->result_array() as $row) {
                $output[] = array(
                    'month'  => $row["month"],
                    'profit' => floatval($row["profit"])
                );
            }
            echo json_encode($output);
        }
    }
}
