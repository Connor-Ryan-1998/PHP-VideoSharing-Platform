<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model
{

    // Log in
    public function login($username, $password)
    {
        // Validate
        $this->db->select('password');
        $this->db->where('username', $username);
        $result = $this->db->get('users')->result_array();

        foreach ($result as $row) {
            if (password_verify($password, $row['password'])) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function userData($username)
    {
        $query = $this->db->select('*')->from('users')->where('username', $username)->get();
        return $query->result_array();
    }
    public function updateUserData($userDataArray)
    {
        $isVerified =  $this->verifyUID($userDataArray['username'], $userDataArray['verificationCode']);

        $this->db->set('emailAddress', $userDataArray['emailAddress']);
        $this->db->set('isVerified', $isVerified);
        $this->db->where('username', $userDataArray['username']);
        $this->db->update('users');
    }
    function verifyUID($username, $uid)
    {
        // Validate
        $this->db->select('userUID');
        $this->db->where('username', $username);
        $result = $this->db->get('users')->result_array();
        foreach ($result as $row) {
            if ($uid == $row['userUID']) {
                return true;
            } else {
                return false;
            }
        }
    }
    function forgotPassword($emailAddress)
    {
        $this->db->trans_start();
        /// Time to expire 
        $expireDatetime = new DateTime('NOW');
        $expireDatetime->modify("+30 minutes");
        // Validate
        $this->db->set('resetPasswordToken', uniqid());
        $this->db->set('resetPasswordTime', $expireDatetime->format('Y-m-d H:i:s'));
        $this->db->where('emailAddress', $emailAddress);
        $this->db->update('users');
        $this->db->trans_complete();
        // error or update
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            // any trans error?
            if ($this->db->trans_status() === FALSE) {
                return false;
            }
            return true;
        }
    }
    function forgotPasswordEmail($emailAddress)
    {
        // Validate
        $this->db->select('resetPasswordToken');
        $this->db->select('resetPasswordTime');
        $this->db->where('emailAddress', $emailAddress);
        $result = $this->db->get('users')->result_array();
        return $result;
    }
    function resetPassword($emailAddress, $resetToken, $newPassword)
    {
        // $password = password_hash($newPassword, PASSWORD_DEFAULT);
        // $currentTimeChecker = new DateTime('NOW');
        // $this->db->trans_start();
        // /// Time to expire 
        // // Validate
        // $this->db->set('password', $password);
        // // $this->db->where('resetPasswordTime >=', $currentTimeChecker->format('Y-m-d H:i:s'));
        // // $this->db->where('resetPasswordToken', $resetToken);
        // // $this->db->where('emailAddress', $emailAddress);
        // $this->db->update('users');
        // $this->db->trans_complete();
        // // error or update
        // if ($this->db->affected_rows() == '1') {
        //     return TRUE;
        // } else {
        //     return FALSE;
        // }
        return true;
    }
}
