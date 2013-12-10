<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of connect_database
 *
 * @author Huynh Xinh
 * @date 12/9/2013
 */
class Apis extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('emails_enum');
        $this->load->model('email_config_enum');
        $this->load->model('logs_enum');
        $this->load->model('emails_enum');
        $this->load->model('templates_enum');
        $this->load->model('common_model');
        
        $this->current_date = $this->common_model->getCurrentDate(Common_enum::DATE_FORMAT_d_m_Y_H_i_s);
        
        $this->TAG = 'Apis';
        
        $this->ERROR = '';
        
        $this->STATUS = '';
        
    }
    
    public function setError($e) {
        $this->ERROR = $e;
    }
    
    public function getError() {
        return $this->ERROR;
    }
    
    public function setStatus($s) {
        $this->STATUS = $s;
    }
    
    public function getStatus() {
        return $this->STATUS;
    }
    
    /*--------------------------------------------------------------------------
     *
     *                      TABLE EMAILS
     -------------------------------------------------------------------------*/
    
    /**
     * getTableEmails
     * 
     * @return Array
     */
    public function getTableEmails() {
        
        $this->load->database();
        $results = array();
        
        $select_all = $this->db->get(Emails_enum::TABLE_NAME)->result();
        foreach ($select_all as $value) {
           
            $row = array(
                         Emails_enum::ID => $value->id,
                         Emails_enum::EMAIL => $value->email,
                         Emails_enum::TITLES_NAMES => $value->titles_names,
                         Emails_enum::FULL_NAME => $value->full_name,
                         Emails_enum::CREATED_DATE => $value->created_date,
                         Emails_enum::UPDATED_DATE => $value->updated_date,
            );
            
            $results[]=$row;
        }
        
        return $results;
    }
    
    /**
     * getTableEmailsById
     * 
     * @param int $id
     * @return Array
     */
    public function getTableEmailsById($id) {
        
        $this->load->database();
        $results = array();
        
        $select_all = $this->db->get_where(Emails_enum::TABLE_NAME, array(Emails_enum::ID => $id))->result();
        foreach ($select_all as $value) {
           
            $row = array(
                         Emails_enum::ID => $value->id,
                         Emails_enum::EMAIL => $value->email,
                         Emails_enum::TITLES_NAMES => $value->titles_names,
                         Emails_enum::FULL_NAME => $value->full_name,
                         Emails_enum::CREATED_DATE => $value->created_date,
                         Emails_enum::UPDATED_DATE => $value->updated_date,
            );
            
            $results[]=$row;
        }
        
        return $results;
    }
    
    /**
     * insertTableEmails
     * 
     * @param String $email
     * @param String $titles_names
     * @param String $full_name
     * @param String $c_d
     * @param String $u_d
     */
    public function insertTableEmails($email, $titles_names, $full_name, $c_d = null, $u_d = null) {
        $data = array(
                      Emails_enum::EMAIL => $email,
                      Emails_enum::TITLES_NAMES => $titles_names,
                      Emails_enum::FULL_NAME => $full_name,
                      Emails_enum::CREATED_DATE => ($c_d == null)? $this->current_date : $c_d,
                      Emails_enum::UPDATED_DATE => ($u_d == null)? $this->current_date : $u_d,
        );
        try{
            $this->load->database();
            $insert = $this->db->insert(Emails_enum::TABLE_NAME, $data);
            if(!$insert){
                $this->setError($this->db->_error_message());
                $this->setStatus(Common_enum::STATUS_ERROR);
                //
                //  write logs
                //
            }
        }
        catch(Exception $exc){
            //
            //  write logs
            //
            return;
        }
    }
    
    /**
     * editTableEmails
     * 
     * @param int $id
     * @param String $email
     * @param String $titles_names
     * @param String $full_name
     * @param String $c_d
     * @param String $u_d
     */
    public function editTableEmails($id, $email, $titles_names, $full_name, $c_d = null, $u_d = null) {
        $data = array(
                      Emails_enum::EMAIL => $email,
                      Emails_enum::TITLES_NAMES => $titles_names,
                      Emails_enum::FULL_NAME => $full_name,
//                      Emails_enum::CREATED_DATE => ($c_d == null)? $this->current_date : $c_d,
                      Emails_enum::UPDATED_DATE => ($u_d == null)? $this->current_date : $u_d,
        );
        try{
            $this->load->database();
            $this->db->where('id', $id);
            $edit = $this->db->update(Emails_enum::TABLE_NAME, $data); 
            
            if(!$edit){
                $this->setError($this->db->_error_message());
                $this->setStatus(Common_enum::STATUS_ERROR);
                //
                //  write logs
                //
            }
        }
        catch(Exception $exc){
            //
            //  write logs
            //
            return;
        }
    }
    
    /**
     * deleteTableEmails
     * 
     * @param int $id
     */
    public function deleteTableEmails($id){
        try{
            $this->load->database();
            $this->db->where('id', $id);
            $delete = $this->db->delete(Emails_enum::TABLE_NAME); 
            if(!$delete){
                $this->setError($this->db->_error_message());
                $this->setStatus(Common_enum::STATUS_ERROR);
                //
                //  write logs
                //
            }
        }
        catch(Exception $exc){
            //
            //  write logs
            //
            return;
        }
    }
    
    /*--------------------------------------------------------------------------
     *
     *                      TABLE EMAIL_CONFIG
     -------------------------------------------------------------------------*/
    
    /**
     * getTableEmailConfig
     * 
     * @return Array
     */
    public function getTableEmailConfig() {
        $this->load->database();
        $results = array();
        
        $select_all = $this->db->get(Email_config_enum::TABLE_NAME)->result();
        foreach ($select_all as $value) {
            $row = array(
                         Email_config_enum::ID => $value->id,
                         Email_config_enum::EMAIL_SEND => $value->email_send,
                         Email_config_enum::PASSWORD => $value->password,
                         Email_config_enum::CREATED_DATE => $value->created_date,
                         Email_config_enum::UPDATED_DATE => $value->updated_date
            );
            
            $results[]=$row;
        }
        return $results;
    }
    
    /**
     * getTableEmailConfigById
     * 
     * @param int $id
     * @return Array
     */
    public function getTableEmailConfigById($id) {
        $this->load->database();
        $results = array();
        
        $select_all = $this->db->get_where(Email_config_enum::TABLE_NAME, array(Email_config_enum::ID => $id))->result();
        foreach ($select_all as $value) {
            $row = array(
                         Email_config_enum::ID => $value->id,
                         Email_config_enum::EMAIL_SEND => $value->email_send,
                         Email_config_enum::PASSWORD => $value->password,
                         Email_config_enum::CREATED_DATE => $value->created_date,
                         Email_config_enum::UPDATED_DATE => $value->updated_date
            );
            
            $results[]=$row;
        }
        return $results;
    }
    
    /**
     * insertTableEmailConfig
     * 
     * @param String $email_send
     * @param String $password
     * @param String $c_d
     * @param String $u_d
     */
    public function insertTableEmailConfig($email_send, $password, $c_d = null, $u_d = null) {
        $data = array(
                      Email_config_enum::EMAIL_SEND => $email_send,
                      Email_config_enum::PASSWORD => $password,
                      Email_config_enum::CREATED_DATE => ($c_d == null)? $this->current_date : $c_d,
                      Email_config_enum::UPDATED_DATE => ($u_d == null)? $this->current_date : $u_d
        );
        try{
            $this->load->database();
            $insert = $this->db->insert(Email_config_enum::TABLE_NAME, $data);
            if(!$insert){
                $this->setError($this->db->_error_message());
                $this->setStatus(Common_enum::STATUS_ERROR);
                //
                //  write logs
                //
            }
        }
        catch(Exception $exc){
            //
            //  write logs
            //
            return;
        }
    }
    
    /**
     * editTableEmailConfig
     * 
     * @param int $id
     * @param String $email_send
     * @param String $password
     * @param String $c_d
     * @param String $u_d
     */
    public function editTableEmailConfig($id, $email_send, $password, $c_d = null, $u_d = null) {
        $data = array(
                      Email_config_enum::EMAIL_SEND => $email_send,
                      Email_config_enum::PASSWORD => $password,
//                      Email_config_enum::CREATED_DATE => ($c_d == null)? $this->current_date : $c_d,
                      Email_config_enum::UPDATED_DATE => ($u_d == null)? $this->current_date : $u_d
        );
        try{
            $this->load->database();
            $this->db->where('id', $id);
            $edit = $this->db->update(Email_config_enum::TABLE_NAME, $data); 
            if(!$edit){
                $this->setError($this->db->_error_message());
                $this->setStatus(Common_enum::STATUS_ERROR);
                //
                //  write logs
                //
            }
        }
        catch(Exception $exc){
            //
            //  write logs
            //
            return;
        }
    }
    
    /**
     * deleteTableEmailConfig
     * 
     * @param int $id
     */
    public function deleteTableEmailConfig($id){
        try{
            $this->load->database();
            $this->db->where('id', $id);
            $delete= $this->db->delete(Email_config_enum::TABLE_NAME); 
            if(!$delete){
                $this->setError($this->db->_error_message());
                $this->setStatus(Common_enum::STATUS_ERROR);
                //
                //  write logs
                //
            }
        }
        catch(Exception $exc){
            //
            //  write logs
            //
            return;
        }
    }
    
    /*--------------------------------------------------------------------------
     *
     *                      TABLE LOGS
     -------------------------------------------------------------------------*/
    /**
     * insertTableLogs
     * 
     * @param String $action
     * @param String $location_error
     * @param String $error
     * @param String $status
     * @param String $c_d
     * @param String $u_d
     */
    public function insertTableLogs($action, $location_error, $error, $status, $c_d = null, $u_d = null) {
        $data = array(
                      Logs_enum::ACTION => $action,
                      Logs_enum::LOCATION_ERROR => $location_error,
                      Logs_enum::ERROR => $error,
                      Logs_enum::STATUS => $status,
                      Logs_enum::CREATED_DATE => ($c_d == null)? $this->current_date : $c_d,
                      Logs_enum::UPDATED_DATE => ($u_d == null)? $this->current_date : $u_d
        );
        try{
            $this->load->database();
            $insert = $this->db->insert(Logs_enum::TABLE_NAME, $data);
            if(!$insert){
                $this->setError($this->db->_error_message());
                $this->setStatus(Common_enum::STATUS_ERROR);
                //
                //  write logs
                //
            }
        }
        catch(Exception $exc){
            //
            //  write logs
            //
            return;
        }
    }
    
    /*--------------------------------------------------------------------------
     *
     *                      TABLE TEMPLATES
     -------------------------------------------------------------------------*/
    
    /**
     * getTableTemplates
     * 
     * @return Array
     */
    public function getTableTemplates() {
        $this->load->database();
        $results = array();
        $select_all = $this->db->get(Templates_enum::TABLE_NAME)->result();
        foreach ($select_all as $value) {
            $row = array(
                         Templates_enum::ID => $value->id,
                         Templates_enum::NAME => $value->name,
                         Templates_enum::CONTENT => $value->content,
                         Templates_enum::CREATED_DATE => $value->created_date,
                         Templates_enum::UPDATED_DATE => $value->updated_date
            );
            
            $results[]=$row;
        }
        
        return $results;
    }
    
    /**
     * getTableTemplatesById
     * 
     * @param int $id
     * @return Array
     */
    public function getTableTemplatesById($id) {
        $this->load->database();
        $results = array();
        $select_all = $this->db->get_where(Templates_enum::TABLE_NAME, array(Templates_enum::ID => $id))->result();
        foreach ($select_all as $value) {
            $row = array(
                         Templates_enum::ID => $value->id,
                         Templates_enum::NAME => $value->name,
                         Templates_enum::CONTENT => $value->content,
                         Templates_enum::CREATED_DATE => $value->created_date,
                         Templates_enum::UPDATED_DATE => $value->updated_date
            );
            
            $results[]=$row;
        }
        
        return $results;
    }
    
    /**
     * insertTableTemplates
     * 
     * @param String $name
     * @param String $content
     * @param String $c_d
     * @param String $u_d
     */
    public function insertTableTemplates($name, $content, $c_d = null, $u_d = null) {
        $data = array(
                      Templates_enum::NAME => $name,
                      Templates_enum::CONTENT => $content,
                      Templates_enum::CREATED_DATE => ($c_d == null)? $this->current_date : $c_d,
                      Templates_enum::UPDATED_DATE => ($u_d == null)? $this->current_date : $u_d
        );
        try{
            $this->load->database();
            $insert = $this->db->insert(Templates_enum::TABLE_NAME, $data);
            if(!$insert){
                $this->setError($this->db->_error_message());
                $this->setStatus(Common_enum::STATUS_ERROR);
                //
                //  write logs
                //
            }
        }
        catch(Exception $exc){
            //
            //  write logs
            //
            return;
        }
    }
    
    /**
     * editTableTemplates
     * 
     * @param int $id
     * @param String $name
     * @param String $content
     * @param String $c_d
     * @param String $u_d
     */
    public function editTableTemplates($id, $name, $content, $c_d = null, $u_d = null) {
        $data = array(
                      Templates_enum::FULL_NAME => $name,
                      Templates_enum::CONTENT => $content,
//                      Email_config_enum::CREATED_DATE => ($c_d == null)? $this->current_date : $c_d,
                      Templates_enum::UPDATED_DATE => ($u_d == null)? $this->current_date : $u_d
        );
        try{
            $this->load->database();
            $this->db->where('id', $id);
            $edit = $this->db->update(Templates_enum::TABLE_NAME, $data); 
            if(!$edit){
                $this->setError($this->db->_error_message());
                $this->setStatus(Common_enum::STATUS_ERROR);
                //
                //  write logs
                //
            }
        }
        catch(Exception $exc){
            //
            //  write logs
            //
            return;
        }
    }
    
    /**
     * deleteTableTemplates
     * 
     * @param int $id
     */
    public function deleteTableTemplates($id){
        try{
            $this->load->database();
            $this->db->where('id', $id);
            $delete= $this->db->delete(Templates_enum::TABLE_NAME); 
            if(!$delete){
                $this->setError($this->db->_error_message());
                $this->setStatus(Common_enum::STATUS_ERROR);
                //
                //  write logs
                //
            }
        }
        catch(Exception $exc){
            //
            //  write logs
            //
            return;
        }
    }
    
    function sendMail($from_mail=null, $pass=null, $full_name=null, $to_mail=null, $subject=null, $message=null){
        $TAG = 'sendMail';
        
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => $from_mail,
            'smtp_pass' => $pass,
            'mailtype' => 'html'
        );
 
        // load the email library that provided by CI
        $this->load->library('email', $config);
        // this will bind your attributes to email library
        $this->email->set_newline("\r\n");
        $this->email->from($from_mail, $full_name);
        $this->email->to($to_mail);
        $this->email->subject($subject);
        $this->email->message($message);
 
        // send your email. if it produce an error it will print 'Fail to send your message!' for you
        $send = $this->email->send();
        
         if($send){
             $this->setStatus(Common_enum::STATUS_CUCCESSFUL);
         }
         else{
//             $this->setError($send->print_debugger());
            show_error($this->email->print_debugger());
         }
         
         $this->insertTableLogs(Common_enum::ACTION_SEND, $TAG, $this->getError(), $this->getStatus(), $this->current_date, $this->current_date);

    }


    
}
