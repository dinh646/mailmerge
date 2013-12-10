
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
   
<!--    <div class="input_items">
          <div class="keyvalueeditor-row" data-orther="1">
            <input id="param_email" type="text" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Email"  name="keyvalueeditor-action" value="">
            <input id="param_subject" type="text" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Subject"  name="keyvalueeditor-action" value="">
            <input id="btn_list_mail" type="submit" class="keyvalueeditor-key keyvalueeditor_check_status"   name="keyvalueeditor-action" value="Gửi nhi�?u ngư�?i">
          </div>
        
          <input type="submit" value="Them" id="btn_add_email">
          
          
    </div>-->
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
    <div class="img_form">
      
      
      <select class="pass_send_mail" onchange="displayResult(this)">
        <?php 
          if(is_array($email_config_list)&&  sizeof($email_config_list)>0){
            foreach ($email_config_list as $key => $email_config_item) {
              echo'<option value="'.$email_config_item['password'].'">'.$email_config_item['email_send'].'</option>';
            }
            
            
          }
        ?>
          
      </select>
      
      
    </div>
    <div class="btn_save">
        <input id="btn_send_mail" type="submit" class="keyvalueeditor-key"  value="G?i mail">
    </div>
    
    
    
  </div>
</div>
<input type="hidden" value="<?php echo $url?>" id="hidUrl">
<input type="hidden" value="" id="from_mail">
<script>
  
   function displayResult(selTag)
    {
      
      var x=selTag.options[selTag.selectedIndex].text;
      $('#from_mail').val(x);
      
    }
  
  $('#btn_send_mail').click(function (){
     var param_email = $('#param_email').val();
     var param_subject = $('#param_subject').val();
     
     
       var from_mail=$('#from_mail').val();
       var pass=$('.pass_send_mail').val();
      
    //noi dung bai viet=======================================================>
       var content_ckeditor=CKEDITOR.instances.editor1.getData();
          $('#trackingDiv').html(content_ckeditor);
          var content = $('#trackingDiv').html();
          function escapeHtml(unsafe) {
              return unsafe
                   .replace(/&/g, "&amp;")
                   .replace(/</g, "&lt;")
                   .replace(/>/g, "&gt;")
                   .replace(/"/g, "&quot;")
                   .replace(/'/g, "&#039;");
           }

         content=escapeHtml(content);
         
    
         var data={
                from_mail:from_mail,
                pass:pass,
                to_email : param_email,
                subject :param_subject, 
                content : content
          }
        
    var url_api = $('#hidUrl').val()+'index.php/home_controller/send_mail'
   // alert(url_api);
      $.ajax({
          url: url_api ,
          type: 'POST',
          data:data,
          success: function(data){
            
            //alert('them thanh cong');
          //  location.reload();
            alert(data);
          },

         //timeout:5000,
         error: function(a,textStatus,b){
           alert('khong thanh cong');
         }
       });
       
       
       
       
      //alert(string_image_filter);
        
    
  });
</script>

