
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
            <input id="param_title_email" type="text" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Title email"  name="keyvalueeditor-action" value="">
            <input id="param_title_names" type="text" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Title names"  name="keyvalueeditor-action" value="">
            <input id="param_full_name" type="text" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Full name"  name="keyvalueeditor-action" value="">
          </div>
        
        <!--  <input type="submit" value="Them" id="btn_add_email">-->
          
          
      </div>
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
        <input id="btn_add_template" type="submit" class="keyvalueeditor-key"  value="Lưu">
    </div>
  </div>
</div>
<input type="hidden" value="<?php echo $url;?>" id="hidUrl" >
<script>
  $('#btn_add_template').click(function (){
    var title_email = $('#param_title_email').val();
    var title_names = $('#param_title_names').val();
    var full_name = $('#param_full_name').val();
    //noi dung bai viet=======================================================>
       var content_ckeditor=CKEDITOR.instances.editor1.getData();//nội dung chi tiết bài viết
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
         
     //lấy chuổi tên image upload sử dụng cho bài viết
        var elem_img_content_post = document.getElementsByClassName("img_content_post");
        var img_content_post="";

        for (var i = 0; i < elem_img_content_post.length; ++i) {
            if (typeof elem_img_content_post[i].value !== "undefined") {
                img_content_post +=elem_img_content_post[i].value+',';
              }
            }
        img_content_post=img_content_post.slice(0,-1); //bỏ dấu phẩy cuối dòng
       
        //đổ chuổi tên image upload sử dụng cho bài viết vào mảng array_images_content
        var array_images_content = new Array();
        for (var i = 0; i < elem_img_content_post.length; ++i) {
            if (typeof elem_img_content_post[i].value !== "undefined") {
                array_images_content[i]=elem_img_content_post[i].value;
              }
            }
        //so sánh và lay ten nhung hinh anh có trong noi dung bài viết
        var string_image_filter="";
        for (var i = 0; i < array_images_content.length; ++i) {
                if(content.indexOf(array_images_content[i])>-1)
                  {
                    string_image_filter+= array_images_content[i]+',';
                  }

            }
        string_image_filter=string_image_filter.slice(0,-1);//bỏ ký tự phẩy cuối
        if(string_image_filter==""){
          string_image_filter="null";
        }
        
         var data={
                
                title_email : title_email,
                title_names :    title_names,          
                full_name : full_name,
                content :    content, 
                string_image_filter : string_image_filter
          }
        
    var url_api = $('#hidUrl').val()+'index.php/home_controller/add_template'
    $.ajax({
          url: url_api ,
          type: 'POST',
          data:data,
          success: function(data){
            
            //alert('them thanh cong');
            location.reload();
           // alert(data);
          },

         //timeout:5000,
         error: function(a,textStatus,b){
           alert('khong thanh cong');
         }
       });
       
       
       
       
      //alert(string_image_filter);
        
    
  });
</script>

