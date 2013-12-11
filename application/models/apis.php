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
        $select_all = $this->db->get_where(Emails_enum::TABLE_NAME, array(Emails_enum::ID => $id))->result();
        $row = array(
                     Emails_enum::ID => $select_all[0]->id,
                     Emails_enum::EMAIL => $select_all[0]->email,
                     Emails_enum::TITLES_NAMES => $select_all[0]->titles_names,
                     Emails_enum::FULL_NAME => $select_all[0]->full_name,
                     Emails_enum::CREATED_DATE => $select_all[0]->created_date,
                     Emails_enum::UPDATED_DATE => $select_all[0]->updated_date,
        );
        return $row;
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
                         Email_config_enum::PROTOCOL => $value->protocol,
                         Email_config_enum::SMTP_HOST => $value->smtp_host,
                         Email_config_enum::SMTP_PORT => $value->smtp_port,
                         Email_config_enum::MAIL_TYPE => $value->mailtype,
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
                         Email_config_enum::PROTOCOL => $value->protocol,
                         Email_config_enum::SMTP_HOST => $value->smtp_host,
                         Email_config_enum::SMTP_PORT => $value->smtp_port,
                         Email_config_enum::MAIL_TYPE => $value->mailtype,
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
    public function insertTableEmailConfig($email_send, $password, 
                                           $protocol = Email_config_enum::PROTOCOL_DEFAULT, 
                                           $smtp_host = Email_config_enum::SMTP_HOST_DEFAULT, 
                                           $smtp_port = Email_config_enum::SMTP_PORT_DEFAULT, 
                                           $mailtype = Email_config_enum::MAIL_TYPE_DEFAULT, 
                                           $c_d = null, $u_d = null) {
        $data = array(
                      Email_config_enum::EMAIL_SEND => $email_send,
                      Email_config_enum::PASSWORD => $password,
                      Email_config_enum::PROTOCOL => $protocol,
                      Email_config_enum::SMTP_HOST => $smtp_host,
                      Email_config_enum::SMTP_PORT => $smtp_port,
                      Email_config_enum::MAIL_TYPE => $mailtype,
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
    public function editTableEmailConfig(   $id, 
                                            $email_send, $password, 
                                            $protocol = Email_config_enum::PROTOCOL_DEFAULT, 
                                            $smtp_host = Email_config_enum::SMTP_HOST_DEFAULT, 
                                            $smtp_port = Email_config_enum::SMTP_PORT_DEFAULT, 
                                            $mailtype = Email_config_enum::MAIL_TYPE_DEFAULT, 
                                            $c_d = null, $u_d = null) {
        $data = array(
                      Email_config_enum::EMAIL_SEND => $email_send,
                      Email_config_enum::PASSWORD => $password,
                      Email_config_enum::PROTOCOL => $protocol,
                      Email_config_enum::SMTP_HOST => $smtp_host,
                      Email_config_enum::SMTP_PORT => $smtp_port,
                      Email_config_enum::MAIL_TYPE => $mailtype,
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
    //
    //  id mail_config
    //
    //  id templates
    //
    //  list mail to
    //
    function sendMail($protocol, $smtp_host, $smtp_port, $mailtype, 
                      $from_mail=null, $pass=null, $full_name=null, 
                      $to_mail=null, $subject=null, $message=null){
        
        $TAG = 'sendMail';
        
        $config = array(
            'protocol' => $protocol,
            'smtp_host' => $smtp_host,
            'smtp_port' => $smtp_port,
            'smtp_user' => $from_mail,
            'smtp_pass' => $pass,
            'mailtype' => $mailtype
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
             $this->setError('Send to'.$to_mail.' fail');
             
         }
         $this->insertTableLogs(Common_enum::ACTION_SEND, $TAG, $this->getError(), $this->getStatus(), $this->current_date, $this->current_date);
    }

    public function sendListMail($id_mail_config, $id_template, $list_id_mail, $subject, $send_all = null) {
        $TAG = '';
        
        $temp_mail_cofig = $this->getTableEmailConfigById($id_mail_config);
        $temp_template = $this->getTableTemplatesById($id_template);

        $list_mail_send = array();
        
        if( (is_array($list_id_mail)) && 
            (is_array($temp_mail_cofig) && sizeof($temp_mail_cofig)) && 
            (is_array($temp_template) && sizeof($temp_template)) 
            ){

            //
            //  Get list mail from list_id_mail
            //
            $list_mail = array();
            if($send_all == null){
                foreach ($list_id_mail as $id_mail) {
                    $list_mail[] = $this->getTableEmailsById($id_mail);
                }
            }
            else{
                $list_mail = $this->getTableEmails();
            }
            
            //
            //  Load mail config
            //
            $mail_cofig = $temp_mail_cofig[0];
            $protocol = $mail_cofig['protocol'];
            $smtp_host = $mail_cofig['smtp_host'];
            $smtp_port = $mail_cofig['smtp_port'];
            $from_mail = $mail_cofig['email_send'];
            $pass = $mail_cofig['password'];
            $mailtype = $mail_cofig['mailtype'];

            $config = array(
                'protocol' => $protocol,
                'smtp_host' => $smtp_host,
                'smtp_port' => $smtp_port,
                'smtp_user' => $from_mail,
                'smtp_pass' => $pass,
                'mailtype' => $mailtype
            );
            
            //
            //  Load mail template
            //
            $template = $temp_template[0];
//            $name_template = $template['name'];
            $content = html_entity_decode($template['content']);


            // load the email library that provided by CI
            $this->load->library('email', $config);

            foreach ($list_mail as $mail) {

                $mail_address = $mail['email'];
                $titles_name = $mail['titles_names'];
                $full_name = $mail['full_name'];
                
                $message_replace_full_name = str_replace(Common_enum::MASK_FULL_NAME, $full_name, $content);
                $message_replace_titles_names = str_replace(Common_enum::MASK_TITLES_NAMES, $titles_name, $message_replace_full_name);
                $message_replace_email = str_replace(Common_enum::MASK_EMAIL, $mail_address, $message_replace_titles_names);
                
                // this will bind your attributes to email library
                $this->email->set_newline("\r\n");

                $this->email->from($from_mail/*, $full_name*/);
                $this->email->to($mail_address);
                $this->email->subject($subject);
                $this->email->message($message_replace_email);

                // send your email. if it produce an error it will print 'Fail to send your message!' for you
                $send = $this->email->send();
                
                if($send){
                    $mail_send = array(
                        Emails_enum::EMAIL => $mail_address,
                        Common_enum::STATUS => Common_enum::STATUS_CUCCESSFUL
                    );
                    $list_mail_send[] = $mail_send;
                }
                else{
                    $mail_send = array(
                        Emails_enum::EMAIL => $mail_address,
                        Common_enum::STATUS => Common_enum::STATUS_ERROR
                    );
                    $list_mail_send[] = $mail_send;
                }
                //  Write to logs
                $this->insertTableLogs(Common_enum::ACTION_SEND, $TAG, $this->getError(), $this->getStatus(), $this->current_date, $this->current_date);
            }
        }
        else{
            $this->setError('Can\'t load mail config or template or get list mail to');
        }
        return $list_mail_send;
    }
    
}
