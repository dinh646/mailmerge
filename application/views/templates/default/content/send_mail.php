
<?php $url=base_url();
  


?>


<div id="form_content_mail">
  <div class="page_center">
    <div class="banner_mail">
 
       <div class="template">
        <form action="<?php echo current_url(); ?>" id="change_language" method="get"> 
           <select name="template" onchange="this.form.submit();" class="select_menu_option">
            <?php 
             // var_dump($id_template);
               if(strcmp($id_template,'default')==0){
                 echo'<option value="default" selected="selected">Templates</option>';
                 if(is_array($list_template)&&  sizeof($list_template)){
                    foreach ($list_template as $key => $item_template) {
                       echo ' <option value="'.$item_template['id'].'">'.$item_template['name'].'</option>';
                    }
                  } 
                 
               }
               
               if(strcmp($id_template,'default')!=0){
                 echo'<option value="default" >Templates</option>';
                 if(is_array($list_template)&&  sizeof($list_template)){
                    foreach ($list_template as $key => $item_template) {
                      if(strcmp($item_template['id'],$id_template)==0){
                       echo ' <option value="'.$item_template['id'].'" selected="selected">'.$item_template['name'].'</option>';
                      }
                      if(strcmp($item_template['id'],$id_template)!=0){
                       echo ' <option value="'.$item_template['id'].'" >'.$item_template['name'].'</option>';
                      }
                      
                    }
                  } 
                 
               }
               
                 
                 
               
               
               
                
            
            ?>
           <!-- <option value="n">Chủ đ�? mặc định</option>
            <option value="y">template2</option>-->
          </select>
        </form>
           
        </div>

    </div>
   
    <div class="title_content_mail"><span>Tiêu đ�? mail</span></div>
    <div class="subject_mail"><span>
      <?php 
      if(!empty($subject_mail)){
        echo $subject_mail;
      }
          
      ?>
      </span></div>
    <div class="title_content_mail"><span>Nội dung mail</span></div>
    <div class="editor_form">
<!--      <script src="<?php //echo $url;?>templates/default/plugins/ckeditor/ckeditor.js"></script>
        <form action="#" method="post">
              <p>
                <textarea  class="ckeditor" cols="80" id="editor1" name="editor1" rows="10">-->
                  <?php
                  if(!empty($content_template)){
                    if(is_array($content_template)&&  sizeof($content_template)>0){
                      
                      foreach ($content_template as $key => $content_template_item) {
                        
                        $content=$content_template_item['content'];
                        
                      }
                      
                      
                      $content=  html_entity_decode($content);
                      echo $content;
                    }
                  }
                  
                  ?>
                
<!--                </textarea>
              </p>
        </form>
        <div style="display: none;" id="trackingDiv" ></div>-->

    </div>
    <div class="title_mail_config">
      <span>Mail gửi</span>
    </div>
    <div class="img_form">
      
      
      <select class="info_send_mail" onchange="displayResult(this)">
        <?php 
          if(is_array($email_config_list)&&  sizeof($email_config_list)>0){
            foreach ($email_config_list as $key => $email_config_item) {
              echo'<option value="'.$email_config_item['id'].'">'.$email_config_item['email_send'].'</option>';
            }
          }
        ?>
          
      </select>
      
      
    </div>
   <div class="tabs">
      <ul>
        <li>
          <div class="text">
            <input value="status" name="send_all_mail" type="radio" onClick="send_all_mail(this)" id="send_all_mail" ><span>Gửi mail đến tất cả</span>
          </div>
        </li>
        <li >
          <div class="text">
            <input type="radio" name="option_send_mail" onClick="option_send_mail(this)" id="option_send_mail"><span>Tùy ch�?n gửi mail</span>
          </div>
        </li>
      </ul>
   </div>
    
    
 <div id="disable"> 
    <div class="list_mail_to">
      <span>Danh sánh mail nhận</span>
    </div>
    <div class="table_list_email_to">
       <ul class="title_email_list">
          <li class="chose_email">
            <div class="text">
              <span>ch�?n email</span>
            </div>
          </li>
          <li class="li_email">
            <div class="text">
              <span>Email</span>
            </div>
          </li>
          <li>
            <div class="text">
              <span>Tên đầy đủ</span>
            </div>
          </li>
          <li>
            <div class="text">
              <span>Xưng danh</span>
            </div>
          </li>
          <li>
            <div class="text">
              <span>Tr?ng th�i</span>
            </div>
          </li>
          
        </ul>
      <?php 
           $stt=1;
           if(is_array($email_list)&&  sizeof($email_list)>0){
           echo '
             
                <ul class="ul_check_all">
                  <li>
                    <div class="text">
                      <input value="status" name="check_all" type="checkbox" onClick="toggle(this)" id="check_all" ><span>Ch�?n tất cả</span>
                    </div>
                  </li>
                  <li >
                    <div class="text">
                      <input type="checkbox" name="invert_check" onClick="invert(this)"><span>�?ảo vùng ch�?n</span>
                    </div>
                  </li>
                  <li>
                    <div class="text">
                    
                    </div>
                  </li>
                  <li>
                    <div class="text">
                      
                    </div>
                  </li>

                </ul>

            ';  
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
                       
                         <li class="chose_email">
                            <div class="text">
                              <input onClick="toggle_item(this)" type="checkbox" name="list_mail_check" class="list_mail_check" value="'.$id.'">
                            </div>
                          </li>
                          <li class="li_email">
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
                           <li>
                            <div class="text">
                              <div id="status_send_mail" class="status_send_mail_'.$id.' ">
                              </div>
                            </div>
                          </li>
                        </ul>';
                  
                }
                else {
                  
                  echo  '
                        <ul>
               
                         <li class="chose_email">
                            <div class="text">
                              <input onClick="toggle_item(this)" type="checkbox" name="list_mail_check" class="list_mail_check" value="'.$id.'">
                            </div>
                          </li>
                          <li class="li_email">
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
                          <li>
                            <div class="text">
                              <div id="status_send_mail" class="status_send_mail_'.$id.' ">
                              </div>
                            </div>
                          </li>
                        </ul>';
                  
                  
                }
  
                  
                      $stt=$stt+1;

            }
            
           }
            
        
        ?>
    </div>
   
 </div>
    
    
    
    <div class="btn_save">
        <input class="btn_send_mail" id="btn_send_mail" type="submit" value="Send">
    </div>
    
    
    
  </div>
</div>

<input type="hidden" value="<?php echo $url?>" id="hidUrl">
<input type="hidden" value="" id="from_mail">
<input type="hidden" value="<?php echo $id_template;?>" id="id_template">



<div id="disable_screen">
  <div class="img_load_send">
    
  </div>
</div>

 <script src="<?php echo $url;?>templates/default/js/send_mail.js"></script>