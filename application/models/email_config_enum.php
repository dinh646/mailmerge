<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of templates_enum
 *
 * @author Huynh
 */
class Email_config_enum {
    const  ID = 'id';
    const EMAIL_SEND = 'email_send';
    const PASSWORD = 'password';
    const PROTOCOL = 'protocol';
    const SMTP_HOST = 'smtp_host';
    const SMTP_PORT = 'smtp_port';
    const MAIL_TYPE = 'mailtype';
    const CREATED_DATE = 'created_date';
    const UPDATED_DATE = 'updated_date';
    
    //  More
    const TABLE_NAME = 'email_config';
    
    const PROTOCOL_DEFAULT = 'smtp';
    const SMTP_HOST_DEFAULT = 'ssl://smtp.googlemail.com';
    const SMTP_PORT_DEFAULT = 465;
    const MAIL_TYPE_DEFAULT = 'html';
}
