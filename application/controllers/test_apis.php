<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_apis extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
            parent::__construct();
            $this->load->model('apis');
        }
    
	public function index(){
		//$this->load->view('welcome_message');
//                $get_data_table_emails = $this->apis->getTableEmails();
                
//                    var_dump($get_data_table_emails);
//                $this->apis->insertTableEmails('xinhhuynh@innoria.com', 'Mr', 'Huynh Xinh');
//                
//                var_dump($this->apis->getError());
                
//                $this->apis->editTableEmails(19, 'dsf@gmail.com', 'Mr', 'Edit');
//                
//                $this->apis->deleteTableEmails(18);
                
//                $this->apis->insertTableEmailConfig('xxx@gmail.com', '123456789@');
//        var_dump($this->apis->getTableEmailConfigById(3));
                
//                $this->apis->deleteTableEmailConfig(4);
                
//                var_dump($this->apis->getTableEmailConfigById(6));
                
                $this->apis->insertTableTemplates('Temple','Spring', 'bla bla...');
                
//                var_dump($this->apis->getTableTemplates());
//                $this->apis->editTableTemplates(1, 'Edit ', 'Mrs', 'edit ', 'edit bla bla...');
                
//                $this->apis->deleteTableTemplates(1);
//                    $this->apis->sendMail('xinhhuynh@innoria.com', 'Xinh1091646', 'Xinh Huynh', 'phule@innoria.com', 'Subject', 'Message...bla bla....');
//                var_dump($this->apis->sendListMail(6, 2, array(20), 'Ttt'));
                
                var_dump($this->apis->getError());
                
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */