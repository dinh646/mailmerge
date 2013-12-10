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
            <input id="btn_add_email" type="submit" class="keyvalueeditor-key"  value="Lưu">
          </div>
          
        <!--  <input type="submit" value="Them" id="btn_add_email">-->
          
          
      </div>
      <div class="list_email_added">
        <ul class="title_email_list">
          <li>
            <div class="text">
              <span>Email</span>
            </div>
          </li>
          <li>
            <div class="text">
              <span>Password</span>
            </div>
          </li>
          
        </ul>
        
        
        <?php 
            foreach ($email_config_list as $email_item){
                $id      = $email_item['id'];
                $email      = $email_item['email_send'];
                $password      = $email_item['password'];
                $created_date      = $email_item['created_date'];
                $updated_date      = $email_item['updated_date'];
                  echo  '
                        <ul>
                          <li>
                            <div class="text">
                              <span>'.$email.'</span>
                            </div>
                          </li>
                          <li>
                            <div class="text">
                              <span>*********</span>
                            </div>
                          </li>
                          <li class="delete_mail">
                            <div class="text">
                              <a href="'.$url.'index.php/home_controller/delete_email_config?id_mail='.$id.'"><span>del</span></a>
                            </div>
                          </li>
                        </ul>';


            }
        
        ?>
       
        
        
        
      </div>
      
      
      
    </div>
  </div>
</div>

<script>
  $('#btn_add_email').click(function (){
    
    //alert('ok');
    var email = $('#param_email').val();
    var password = $('#param_password').val();   
    var url =document.URL;
    var str= url.substr(0, url.indexOf('index.php')); 
    var str_url=str+"index.php/home_controller/add_email_config";
    //alert(str);
    var data={
              email:  email,
              password:  password
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