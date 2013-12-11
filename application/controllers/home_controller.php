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
     //load list templates
      if(isset($_GET['template'])){
        $id=$_GET['template'];
        $data['content_template']=$this->apis->getTableTemplatesById($id);
        $data['id_template']=$id;
        $data['list_template']=$this->apis->getTableTemplates();
        $data['status_active_menu']="send_mail";
        $data['email_list']=$this->apis->getTableEmails();
        $data['email_config_list']=$this->apis->getTableEmailConfig();
        $this->load->view('templates/default/header/header.php');
        $this->load->view('templates/default/menu/menu.php',$data);
        $this->load->view('templates/default/content/send_mail.php',$data);
        $this->load->view('templates/default/footer/footer.php');
       // var_dump($data['content_template']);
      }
      else {
              $data['list_template']=$this->apis->getTableTemplates();
              $data['id_template']='default';
              $data['email_config_list']=$this->apis->getTableEmailConfig();
              $data['status_active_menu']="send_mail";
              $data['email_list']=$this->apis->getTableEmails();
              $this->load->view('templates/default/header/header.php');
              $this->load->view('templates/default/menu/menu.php',$data);
              $this->load->view('templates/default/content/send_mail.php');
              $this->load->view('templates/default/footer/footer.php');
           }
    
     
      
     
    
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
  public function delete_mail(){
      $id=$_GET['id_mail'];
      $data['status_active_menu']="manage_mail";
      $this->apis->deleteTableEmails($id);
      
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
 public function add_template(){
      
      $name =$_POST['name'];
      $content =$_POST['content'];  
      $string_image_filter =$_POST['string_image_filter'];
      
      $url=base_url();
      $link_img_in_content=$url."templates/default/plugins/post/upload_temp/";
      $link_img_replace=$url."templates/default/plugins/post/images/";
      $content=  str_replace($link_img_in_content, $link_img_replace, $content);
      
      if(strcmp($string_image_filter,"null")!=0){
        $array_img=  explode(",",$string_image_filter);
      }
      else {
        $array_img="null";
           }
          
      if(is_array($array_img) && sizeof($array_img)>0){
        foreach ($array_img as $img_item) {
            $old_link_img="templates/default/plugins/post/upload_temp/".$img_item;
            $new_link_img="templates/default/plugins/post/images/".$img_item;
            rename($old_link_img, $new_link_img);
        }
      }
      
      $this->apis->insertTableTemplates($name,$content);
      echo $this->apis->getError();
  }


  public function add_email(){
      $email       =$_POST['email'];
      $titles_names =$_POST['titles_name'];
      $full_name   =$_POST['full_name'];
      $this->apis->insertTableEmails($email,$titles_names,$full_name);
      echo $this->apis->getError();
  }
  
  public function email_config(){
      $data['status_active_menu']="email_config";
      $data['email_config_list']=$this->apis->getTableEmailConfig();
      $this->load->view('templates/default/header/header_email_config.php');
      $this->load->view('templates/default/menu/menu.php',$data);
      $this->load->view('templates/default/content/email_config.php');
      $this->load->view('templates/default/footer/footer.php'); 
  }
   public function add_email_config(){
     
      $email_send       =$_POST['email'];
      $password =$_POST['password'];
      $this->apis->insertTableEmailConfig($email_send,$password);
      echo $this->apis->getError();
     
      $data['status_active_menu']="email_config";
      $data['email_config_list']=$this->apis->getTableEmailConfig();
      $this->load->view('templates/default/header/header_email_config.php');
      $this->load->view('templates/default/menu/menu.php',$data);
      $this->load->view('templates/default/content/email_config.php');
      $this->load->view('templates/default/footer/footer.php'); 
  }
  public function delete_email_config(){
    
      $id=$_GET['id_mail'];
      $this->apis->deleteTableEmailConfig($id);
     
      $data['status_active_menu']="email_config";
      $data['email_config_list']=$this->apis->getTableEmailConfig();
      $this->load->view('templates/default/header/header_email_config.php');
      $this->load->view('templates/default/menu/menu.php',$data);
      $this->load->view('templates/default/content/email_config.php');
      $this->load->view('templates/default/footer/footer.php'); 
  }
  
  public function show_email_list(){
      
    
      $data['email_list']=$this->apis->getTableEmails();
      $this->load->helper('url');
      $this->load->view('templates/default/header/header_show_email_list.php');
      $this->load->view('templates/default/menu/menu.php');
      $this->load->view('templates/default/content/show_email_list.php',$data);
      $this->load->view('templates/default/footer/footer.php');
    
  }
  
  public function send_mail(){
    $from_mail=$_POST['from_mail'];
    $pass=$_POST['pass'];
    $to_mail=$_POST['to_email'];
    $subject=$_POST['subject'];
    $message=$_POST['content'];
    echo $from_mail."==".$pass."==".$to_mail."==".$subject."==".$message;
   /* $this->apis->sendMail($from_mail, $pass, $full_name=null, $to_mail, $subject, $message);
    echo $this->apis->getError();
    */
    
  }
  
  
  
  
}
