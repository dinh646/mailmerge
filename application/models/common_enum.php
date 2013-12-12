<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of common_enum
 *
 * @author Huynh
 */
class Common_enum {
    
    const STATUS = 'status';
    const STATUS_ERROR = 'ERROR';
    const STATUS_SUCCESSFUL = 'SUCCESSFUL';
    const ACTION_INSERT = 'ACTION_INSERT';
    const ACTION_EDIT = 'ACTION_EDIT';
    const ACTION_DELETE = 'ACTION_DELETE';
    const ACTION_SEND = 'ACTION_SEND';
    const DATE_FORMAT_d_m_Y_H_i_s = 'd-m-Y H:i:s';
    const MASK_No = 3;
    const MASK_FULL_NAME = '[Full_Name]';
    const MASK_TITLES_NAMES = '[Titles_Names]';
    const MASK_EMAIL = '[Email]';
    
    //  DB
    const DATABASE_NAME = 'mailmerge';
    
    //  NAME FIELD
    const TYPE = 'type';
    const CONSTRAINT = 'constraint';
    const UNSIGNED = 'unsigned';
    const AUTO_INCREMENT = 'auto_increment';
    const CHARACTER_SET = 'CHARACTER_SET';
    const COLLATION = 'collation';
    
    //  DEFAULT FIELD VALUE
    const DEFAULT_CONSTRAINT_DATE_VALUE = 20;
    const DEFAULT_CONSTRAINT_EMAIL_VALUE = 100;
    const DEFAULT_CONSTRAINT_FULL_NAME_VALUE = 100;
    const DEFAULT_CONSTRAINT_TITLES_NAMES_VALUE = 5;
    const DEFAULT_CONSTRAINT_INT_VALUE = 11;
    const DEFAULT_AUTO_INCREMENT_VALUE = TRUE;
    const DEFAULT_CHARACTER_SET_VALUE = 'utf8';
    const DEFAULT_COLLATION_VALUE = 'utf8_general_ci';
    
    //  Datatype
    const INT = 'INT';
    const TEXT = 'TEXT';
    const VARCHAR = 'VARCHAR';
    
}
