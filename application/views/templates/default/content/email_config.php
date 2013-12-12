<?php $url = base_url();?>
<div id="form_content_mail">
  <div class="page_center">
    <div class="banner_mail">
      <div class="logo_sendmail">
      </div>
    </div>
    <div class="input_items">
      <div class="info_add_email">
          
            <div class="keyvalueeditor-row" data-orther="1">
            <input id="param_email" type="text" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Email"  name="keyvalueeditor-action" value="">
            <input id="param_password" type="password" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Password"  name="keyvalueeditor-action" value="">
            <input id="param_protocol" type="text" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Protocol"  name="keyvalueeditor-action" value="">
            <input id="param_smtp_host" type="password" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Smtp host"  name="keyvalueeditor-action" value="">
            <input id="param_smtp_port" type="text" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Smtp port"  name="keyvalueeditor-action" value="">
            <input id="param_mailtype" type="password" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Mail type"  name="keyvalueeditor-action" value="">
            
          </div>
      </div>
    </div>
   <div class="div_btn_save"><input id="btn_add_email" type="submit" value="Lưu"></div>
      <div class="list_email_added">
        <ul class="title_email_list">
          <li>
            <div class="text">
              <span>Email</span>
            </div>
          </li>
          <li class="pass">
            <div class="text">
              <span>Password</span>
            </div>
          </li>
          <li>
            <div class="text">
              <span>Protocol</span>
            </div>
          </li>
          <li>
            <div class="text">
              <span>Smtp host</span>
            </div>
          </li>
          <li>
            <div class="text">
              <span>Smtp port</span>
            </div>
          </li>
          <li>
            <div class="text">
              <span>Mail type</span>
            </div>
          </li>
          
        </ul>
    
        
        <?php 
         $stt=1;
            foreach ($email_config_list as $email_item){
                $id      = $email_item['id'];
                $email      = $email_item['email_send'];
                $password      = $email_item['password'];
                $protocol = $email_item['protocol'];
                $smtp_host =  $email_item['smtp_host'];
                $smtp_port = $email_item['smtp_port'];
                $mailtype =$email_item['mailtype'];
                
                
                $created_date      = $email_item['created_date'];
                $updated_date      = $email_item['updated_date'];
               if($stt%2!=0){  
                
                echo  '
                        <ul class="blue">
                          <li>
                            <div class="text">
                              <span>'.$email.'</span>
                            </div>
                          </li>
                          <li class="pass">
                            <div class="text">
                              <span>*********</span>
                            </div>
                          </li>
                          <li>
                            <div class="text">
                              <span>'.$protocol.'</span>
                            </div>
                          </li>
                          <li>
                            <div class="text">
                              <span>'.$smtp_host.'</span>
                            </div>
                          </li>
                          <li>
                            <div class="text">
                              <span>'.$smtp_port.'</span>
                            </div>
                          </li>
                          <li>
                            <div class="text">
                              <span>'.$mailtype.'</span>
                            </div>
                          </li>


                          <li class="delete_mail">
                            <div class="text">
                              <a href="'.$url.'index.php/home_controller/delete_email_config?id_mail='.$id.'"><span>del</span></a>
                            </div>
                          </li>
                        </ul>';
               }
               else{
                   echo  '
                        <ul>
                          <li>
                            <div class="text">
                              <span>'.$email.'</span>
                            </div>
                          </li>
                          <li class="pass">
                            <div class="text">
                              <span>*********</span>
                            </div>
                          </li>
                          <li>
                            <div class="text">
                              <span>'.$protocol.'</span>
                            </div>
                          </li>
                          <li>
                            <div class="text">
                              <span>'.$smtp_host.'</span>
                            </div>
                          </li>
                          <li>
                            <div class="text">
                              <span>'.$smtp_port.'</span>
                            </div>
                          </li>
                          <li>
                            <div class="text">
                              <span>'.$mailtype.'</span>
                            </div>
                          </li>


                          <li class="delete_mail">
                            <div class="text">
                              <a href="'.$url.'index.php/home_controller/delete_email_config?id_mail='.$id.'"><span>del</span></a>
                            </div>
                          </li>
                        </ul>';
               }
             $stt=$stt+1;
            }
        
        ?>
       
        
        
        
      </div>
      
      
      
    </div>
  </div>


<script>
  $('#btn_add_email').click(function (){
    
    //alert('ok');
    var email = $('#param_email').val();
    var password = $('#param_password').val();  
    
    var protocol=$('#param_protocol').val();
    var smtp_host=$('#param_smtp_host').val();
    var smtp_port=$('#param_smtp_port').val();
    var mailtype=$('#param_mailtype').val();
    
    
    
    var url =document.URL;
    var str= url.substr(0, url.indexOf('index.php')); 
    var str_url=str+"index.php/home_controller/add_email_config";
    //alert(str);
    var data={
              email:  email,
              password:  password,
              protocol:protocol,
              smtp_host:smtp_host,
              smtp_port:smtp_port,
              mailtype:mailtype
              
              
              
          }
  
     $.ajax({
          url: str_url ,
          type: 'POST',
          data:data,
          success: function(data){
             window.location=url;
          },

         error: function(a,textStatus,b){
           alert('khong thanh cong');
         }
       });
    
  });
</script>