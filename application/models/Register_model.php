<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Register_model extends CI_Model
{
    public function register_user($username, $emailAddress, $password)
    {
        ///Hash Password
        $password = password_hash($password, PASSWORD_DEFAULT);

        //Get Max id
        $this->db->select_max('id');
        $result = $this->db->get('users')->result_array();
        foreach ($result as $row) {
            $data = array(
                'id' => (int)$row['id'] + 1,
                'username' => $username,
                'emailAddress' => $emailAddress,
                'password' => $password
            );
        }
        //Insert New Record
        $query = $this->db->insert('users', $data);
        // $this->send($emailAddress);
    }
    public function send($emailAddress)
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mailhub.eait.uq.edu.au',
            'smtp_port' => 25,
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE,
            'mailtype' => 'html',
            'starttls' => true,
            'newline' => "\r\n"
        );

        $message = "";

        $this->email->initialize($config);
        $this->email->from(get_current_user() . '@student.uq.edu.au', get_current_user());
        $this->email->to($emailAddress);
        $this->email->subject('PHP-VideoSharing-Platform Email Verification');
        $this->email->message($message);
        $this->email->send();
        $this->load->view('template/header');
        $this->load->view('email');
        $this->load->view('template/footer');
    }
}
