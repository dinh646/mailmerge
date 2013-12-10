
<?php $url=base_url();?>
<div id="form_content_mail">
  <div class="page_center">
    <div class="banner_mail">
 
         <div class="template">
          <select class="select_menu_option">
            <?php 
               if(is_array($list_template)&&  sizeof($list_template)){
                 foreach ($list_template as $key => $item_template) {
                    echo ' <option value="y">'.$item_template.'</option>';
                 }
               
                 
               } 
                
            
            ?>
           <!-- <option value="n">Chủ đề mặc định</option>
            <option value="y">template2</option>-->
          </select>
        </div>

    </div>
   
    <div class="input_items">
          <div class="keyvalueeditor-row" data-orther="1">
            <input id="param_email" type="text" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Email"  name="keyvalueeditor-action" value="">
            <input id="param_subject" type="text" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Subject"  name="keyvalueeditor-action" value="">
            <input id="btn_list_mail" type="submit" class="keyvalueeditor-key keyvalueeditor_check_status"   name="keyvalueeditor-action" value="Gửi nhiều người">
          </div>
        
        <!--  <input type="submit" value="Them" id="btn_add_email">-->
          
          
    </div>
    <div class="editor_form">
      <span>Content</span>
      <script src="<?php echo $url;?>templates/default/plugins/ckeditor/ckeditor.js"></script>
        <form action="#" method="post">
              <p>
                <textarea  class="ckeditor" cols="80" id="editor1" name="editor1" rows="10">
                </textarea>
              </p>
        </form>
        <div style="display: none;" id="trackingDiv" ></div>

    </div>
     <div class="img_form">
      <script type="text/javascript" src="<?php echo $url;?>templates/default/plugins/post/scripts/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo $url;?>templates/default/plugins/post/scripts/jquery.form.js"></script>
      <ul class="image_content_post">
             <li>
              <span>Hình ảnh sử dụng cho nội dung mail</span><br>
              
               <!-- ajax upload button-->
                <script type="text/javascript" >
                  
                 $(document).ready(function() { 
                          var stt=1;
                          $('#photoimg_post').live('change', function(){
                            var next = stt+1;
                            var new_div_preview_post = "<div class='preview_post' id='preview_post_"+next+"'></div>";
                            $("#append_img_content").append(new_div_preview_post);
                            $("#preview_post_"+stt).html('');
                            $("#preview_post_"+stt).html('<img src="<?php echo $url;?>templates/default/plugins/post/loader.gif" alt="Uploading...."/>');
                            $("#imageform_post").ajaxForm({
                              target: "#preview_post_"+stt

                             }).submit();
                              stt=stt+1;
                          });
                  }); 
                </script>
                <form id="imageform_post" method="post" enctype="multipart/form-data" action="<?php echo $url;?>templates/default/plugins/post/content.php?url=<?php echo $url; ?>">
                  <input type="file" name="photoimg_post" id="photoimg_post" />
                </form>
                
                <div id="append_img_content">
                  <div class="preview_post" id='preview_post_1'>
                  </div>
                  
                </div>
              
              <!--end ajax upload button-->
            </li>
           </ul>
      
    
    </div>
    <div class="btn_save">
        <input id="btn_add_template" type="submit" class="keyvalueeditor-key"  value="Gửi mail">
    </div>
    
    
    
  </div>
</div>

