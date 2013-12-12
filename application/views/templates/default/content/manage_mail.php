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
            <input id="param_full_name" type="text" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="H? và tên"  name="keyvalueeditor-action" value="">
            <input id="param_titles_name" type="text" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Xýng danh vd: Mr "  name="keyvalueeditor-action" value="">
          </div>
      </div>
    </div>
    <div class="div_btn_save"><input id="btn_add_email" type="submit" value="LÆ°u"></div>
      <div class="list_email_added">
        <ul class="title_email_list">
          <li>
            <div class="text">
              <span>Email</span>
            </div>
          </li>
          <li>
            <div class="text">
              <span>H? và tên</span>
            </div>
          </li>
          <li>
            <div class="text">
              <span>Xýng danh</span>
            </div>
          </li>
          
        </ul>
        
        
        <?php 
         $stt=1;
            foreach ($email_list as $email_item){
                $id      = $email_item['id'];
                $email      = $email_item['email'];
                $titles_names      = $email_item['titles_names'];
                $full_name      = $email_item['full_name'];
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
                          <li>
                            <div class="text">
                              <span>'.$full_name.'</span>
                            </div>
                          </li>
                          <li>
                            <div class="text">
                              <span>'.$titles_names.'</span>
                            </div>
                          </li>
                          <li class="delete_mail">
                            <div class="text">
                              <a href="'.$url.'index.php/home_controller/delete_mail?id_mail='.$id.'"><span>xóa</span></a>
                            </div>
                          </li>
                        </ul>';
                 }
                
                else{
                   echo  '
                        <ul >
                          <li>
                            <div class="text">
                              <span>'.$email.'</span>
                            </div>
                          </li>
                          <li>
                            <div class="text">
                              <span>'.$full_name.'</span>
                            </div>
                          </li>
                          <li>
                            <div class="text">
                              <span>'.$titles_names.'</span>
                            </div>
                          </li>
                          <li class="delete_mail">
                            <div class="text">
                              <a href="'.$url.'index.php/home_controller/delete_mail?id_mail='.$id.'"><span>xóa</span></a>
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
    var titles_name = $('#param_titles_name').val();
    var full_name = $('#param_full_name').val();        
    var url =document.URL;
    var str= url.substr(0, url.indexOf('index.php')); 
    var str_url=str+"index.php/home_controller/add_email";
    //alert(str);
    var data={
              email:  email,
              titles_name:  titles_name,
              full_name:  full_name
          }
  
     $.ajax({
          url: str_url ,
          type: 'POST',
          data:data,
          success: function(data){
             //alert(data);
             window.location=url;
             
          },

         //timeout:5000,
         error: function(a,textStatus,b){
           alert('khong thanh cong');
         }
       });
    
  });
</script>