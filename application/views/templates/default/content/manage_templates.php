
<?php $url = base_url();?>
<script>
  $(document).ready(function() {
     $("#dialog_help").css({
       display: "none"
     });
 });
</script>
<div id="form_content_mail">
  <div class="page_center">
    <div class="banner_mail">
      <div class="logo_sendmail">
      </div>
      <div id="show_help" class="show_list_template">
        <span class="help"><div class="text">Hướng dẫn</div></span>
      </div>
    </div>
    <div class="input_items">
      <div class="info_add_email">
          
          <div class="keyvalueeditor-row" data-orther="1">
            <input id="param_template_name" type="text" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Tên template"  name="keyvalueeditor-action" value="">
            <input id="param_subject" type="text" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Tiêu đề"  name="keyvalueeditor-action" value="">
          </div>
        
        <!--  <input type="submit" value="Them" id="btn_add_email">-->
          
          
      </div>
    </div>
    <div class="editor_form">
      <span class="title_content">Nội dung</span>
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
        <input id="btn_add_template" type="submit"  value="Lưu">
    </div>
  </div>
</div>
<!--help-->
<div id="dialog_help">
  <p>V&iacute; dụ ta c&oacute;&nbsp;nội dung mail mẫu&nbsp;như h&igrave;nh 1. Mail n&agrave;y đ&atilde; được gửi th&agrave;nh c&ocirc;ng.</p>

  <p style="text-align: center;"><img class="preview" src="<?php echo $url; ?>templates/default/img/capture-send.png" style="border-style:solid; border-width:1px; height:300px; width:750px" /></p>

  <p style="text-align: center;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;h&igrave;nh 1</p>

  <p>Để soạn&nbsp;được nội dung mail như h&igrave;nh 1, trong khung soạn thảo văn bản&nbsp;ta cần c&oacute; những từ kh&oacute;a đặt biệt sau để nhận biết từ xưng danh, họ t&ecirc;n đầy đủ v&agrave; email, cụ thể như sau (xem h&igrave;nh 2):</p>

  <p>Theo h&igrave;nh 1, tương ứng với từ xưng danh <span style="color:#008000">Mr&nbsp;</span>ta c&oacute; từ kh&oacute;a [Titles_Names], tương ứng với t&ecirc;n <span style="color:#FF8C00">L&ecirc; Vĩnh Ph&uacute;&nbsp;</span>ta&nbsp;c&oacute; từ kh&oacute;a [Full_Name], tương ứng với email <span style="color:#0000FF">phule@innoria.com&nbsp;</span>l&agrave; từ kh&oacute;a [Email] .</p>

  <p><span style="line-height:1.6em; text-align:center">&nbsp;</span><img class="preview" src="<?php echo $url; ?>templates/default/img/capture_editor.png" style="border-style:solid; border-width:1px; height:300px; line-height:1.6em; text-align:center; width:750px" /></p>

  <p style="text-align: center;">h&igrave;nh 2</p>

</div>
<!--end help-->

<input type="hidden" value="<?php echo $url;?>" id="hidUrl" >
<script>
 
  
  
  $('#btn_add_template').click(function (){
    var param_template_name = $('#param_template_name').val();
    var param_subject=$('#param_subject').val();
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
                
                name : param_template_name,
                content :    content, 
                string_image_filter : string_image_filter,
                param_subject:param_subject
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
  
  $('#show_help').click(function (){
  
        $( "#dialog_help" ).dialog({
          title: "Help", 
          show: "scale",
          hide: "explode",
          closeOnEscape: true,
          modal: true,
          minWidth: 800,
          minHeight: 600,
          resizable: false,
          backgroundColor:"red",
          modal: true
    
      });
  });
  jQuery("#show_help .ui-dialog-titlebar").css("background-color", "red");
  
</script>

 <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

