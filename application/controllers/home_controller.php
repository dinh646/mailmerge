<?php 
/**
 * @author		 : 	phule@innoria.com 
 * @category   :	Controller
 * @name       :  Home_controller
 * @description:  home_controller.php is file default load. first load to funtion index().  
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_controller extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->helper('url'); 
    $this->load->model('apis');
  }


  public function index()
	{
      $data['status_active_menu']="send_mail";
      $this->load->view('templates/default/header/header.php');
      $this->load->view('templates/default/menu/menu.php',$data);
      $this->load->view('templates/default/content/send_mail.php');
      $this->load->view('templates/default/footer/footer.php');
      
     
    
	}
  
  public function page_add_email(){
      
      $this->load->view('templates/default/header/header_add_email.php');
      $this->load->view('templates/default/menu/menu.php');
      $this->load->view('templates/default/content/add_email.php');
      $this->load->view('templates/default/footer/footer.php');  
    
  }
  
  public function manage_mail(){
      $data['status_active_menu']="manage_mail";
      $data['email_list']=$this->apis->getTableEmails();
      $this->load->view('templates/default/header/header_manage_mail.php');
      $this->load->view('templates/default/menu/menu.php',$data);
      $this->load->view('templates/default/content/manage_mail.php');
      $this->load->view('templates/default/footer/footer.php'); 
  }
 public function manage_templates(){
      $data['status_active_menu']="manage_templates";
      $this->load->view('templates/default/header/header_manage_templates.php');
      $this->load->view('templates/default/menu/menu.php',$data);
      $this->load->view('templates/default/content/manage_templates.php');
      $this->load->view('templates/default/footer/footer.php'); 
  }



  public function add_email(){
      $email       =$_POST['email'];
      $titles_names =$_POST['titles_name'];
      $full_name   =$_POST['full_name'];
      $this->apis->insertTableEmails($email,$titles_names,$full_name);
      echo $this->apis->getError();
  }
  
  public function show_email_list(){
      
    
      $data['email_list']=$this->apis->getTableEmails();
      $this->load->helper('url');
      $this->load->view('templates/default/header/header_show_email_list.php');
      $this->load->view('templates/default/menu/menu.php');
      $this->load->view('templates/default/content/show_email_list.php',$data);
      $this->load->view('templates/default/footer/footer.php');
    
  }
  
  
  
  
  
}
