
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
   
    <div class="title_content_mail"><span>Tiêu đề mail</span></div>
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
            <input type="radio" name="option_send_mail" onClick="option_send_mail(this)" id="option_send_mail"><span>Tùy chọn gửi mail</span>
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
              <span>chọn email</span>
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
              <span>Status</span>
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
                      <input value="status" name="check_all" type="checkbox" onClick="toggle(this)" id="check_all" ><span>Chọn tất cả</span>
                    </div>
                  </li>
                  <li >
                    <div class="text">
                      <input type="checkbox" name="invert_check" onClick="invert(this)"><span>Đảo vùng chọn</span>
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
                              <div id="status_send_mail" class="error">
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
                              <div id="status_send_mail">
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
        <input id="btn_send_mail" type="submit" class="keyvalueeditor-key"  value="Send">
    </div>
    
    
    
  </div>
</div>

<input type="hidden" value="<?php echo $url?>" id="hidUrl">
<input type="hidden" value="" id="from_mail">
<input type="hidden" value="<?php echo $id_template;?>" id="id_template">

<script>
 
 $(document).ready(function() {
     $("#disable").css({
       display: "none"
     });
 });
   
   function displayResult(selTag)
    {
      var x=selTag.options[selTag.selectedIndex].text;
      $('#from_mail').val(x);
    }
  
  function toggle(source) {
      //invert_check
       var checkboxes1 = document.getElementsByName('invert_check');
      for(var i=0, n=checkboxes1.length;i<n;i++) {
        checkboxes1[i].checked = false;
      }
      
      var checkboxes = document.getElementsByName('list_mail_check');
      for(var i=0, n=checkboxes.length;i<n;i++) {
      checkboxes[i].checked = source.checked;
     }
   }
   
    function toggle_item(source) {
      var checkboxes = document.getElementsByName('check_all');
      var checkboxes1 = document.getElementsByName('invert_check');
      for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = false;
      }
      for(var i=0, n=checkboxes1.length;i<n;i++) {
        checkboxes1[i].checked = false;
      }
      
   }
   
    function invert(source) {
      //check all==false
         var checkboxes = document.getElementsByName('check_all');
          for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = false;
          }
          
          var checkboxes = document.getElementsByName('list_mail_check');
          for(var i=0, n=checkboxes.length;i<n;i++) {
            if(checkboxes[i].checked == false){
             checkboxes[i].checked = true;
            }
            else{
              checkboxes[i].checked = false;
            }
           
         }
       }
    
   function send_all_mail(source) {
      var checkboxes = document.getElementsByName('option_send_mail');
      for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = false;
      }
       $("#disable").css({
         display: "none"
       });
      
      
   }
    function option_send_mail(source) {
      var checkboxes = document.getElementsByName('send_all_mail');
      for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = false;
      }
       $("#disable").css({
       display: "block"
       });
      
      
      
   }
   
   
   
  $('#btn_send_mail').click(function (){
    var id_template=$('#id_template').val();
    var id_mail_form=$('.info_send_mail').val();
    
    var send_all_mail = document.getElementsByName('send_all_mail');
    var option_send_mail = document.getElementsByName('option_send_mail');
    
    
   //check error param
    var error="";
    if(id_template=="default"){
      error=error+"bạn chưa chọn template!\n\
       ";
    }
    if(send_all_mail[0].checked==false && option_send_mail[0].checked==false){
      
      error=error+'bạn chưa chọn mail để gửi!';
    }
    
    
    if(error!=""){
      alert(error);
    }
    
    //start send mail------
    if(error==""){
      
        //if send all mail=======================================================
        var send_all_mail = document.getElementsByName('send_all_mail');
        if(send_all_mail[0].checked==true){
           $("#disable_screen").addClass("active");
           var data={
                  id_template:id_template,
                  id_mail_form:id_mail_form,
                  status:"send_all"
            }
           var url_api = $('#hidUrl').val()+'index.php/home_controller/send_all_mail';
            $.ajax({
             url: url_api ,
             type: 'POST',
             data:data,
             success: function(data){
               //alert(data);
               $("#disable_screen").removeClass("active");
             },
            error: function(a,textStatus,b){
              alert('khong thanh cong');
            }
          });
         }

        //if option send mail======================================================
        var option_send_mail = document.getElementsByName('option_send_mail');
        if(option_send_mail[0].checked==true){
           //list mail to
            var checkedValue; 
            var inputElements = $('input:checkbox[name="list_mail_check"]:checked');
            var url_api = $('#hidUrl').val()+'index.php/home_controller/send_mail';
           
            //vong lap for send one email
            for(var i=0; inputElements[i]; ++i){
                 checkedValue=inputElements[i].value;                
                 var data={
                    id_template:id_template,
                    id_mail_form:id_mail_form,
                    mail_to:checkedValue
                  }
                   $.ajax({
                      url: url_api ,
                      type: 'POST',
                      data:data,
                      success: function(data){
                        //alert(data);
                        if(data=="SUCCESSFUL"){
                          var status="#status_send_mail_"+checkedValue;
                          $(status).addClass('success');
                        }
                      },
                     error: function(a,textStatus,b){
                       alert('khong thanh cong');
                     }
                   });
                   
                   
                   
            }
             
               
               
          }

    }
    //end if error
    
    function strcmp (str1, str2) {
      return ((str1 == str2) ? 0 : ((str1 > str2) ? 1 : -1));
    }
    
    
    
    
    
   /*    $("#disable_screen").addClass("active");
       var id_template=$('#id_template').val();
       var id_mail_form=$('.info_send_mail').val();
      // var list_mail_to=$('#id_s').val();
       //list mail to
        var checkedValue = ""; 
        var inputElements = $('input:checkbox[name="list_mail_check"]:checked');
        for(var i=0; inputElements[i]; ++i){
                   checkedValue = checkedValue+','+inputElements[i].value;
        }
        if(checkedValue==""){
          checkedValue="null";
        }
        else
          {
            
            checkedValue=checkedValue.slice(1);
          }
       //check all status
       var checkall="false";
       if($("#check_all").is(":checked")){
         checkall="true";
       }
         
         
         
      /* alert('sub:'+param_subject+'\n\
              id_template:'+id_template+'\n\
              id_mail_form:'+id_mail_form+'\n\
              list_mail_to:'+checkedValue+'\n\
               checkall:'+checkall
               );*/
       
     /*    var data={
                id_template:id_template,
                id_mail_form:id_mail_form,
                list_mail_to:checkedValue ,
                checkall:checkall
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
       });*/
  });
</script>

<div id="disable_screen">
  <div class="img_load_send">
    
  </div>
</div>