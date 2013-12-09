<?php $url = base_url();?>
<div id="menu_main">
 <div class="menu_main_center">
     <div class="text_sent_mail">
     </div>
     <div class="banner_mail">
      <div class="logo_sendmail">
      </div>
      <div class="menu_list">
        <ul>
          <li id="send_mail" data-link="send_mail" <?php if($status_active_menu=="send_mail") echo 'class="active_menu"';?>>
            <div class="text">
              <span>Gửi mail</span>
            </div>
          </li>
          <li id="manage_mail" data-link="manage_mail" <?php if($status_active_menu=="manage_mail") echo 'class="active_menu"';?>>
            <div class="text">
              <span>Quản lý mail</span>
            </div>
          </li>
          <li id="manage_templates" data-link="manage_templates" <?php if($status_active_menu=="manage_templates") echo 'class="active_menu"';?>>
            <div class="text">
              <span>Quản lý templates</span>
            </div>
          </li>
        </ul>
      </div>
    </div>
    
 </div>
</div>
<input type="hidden" id="hidUrl" value="<?php echo $url;?>">
<script>
  $('#send_mail').click(function (){
     var url = $('#hidUrl').val();
     window.location.href = url; 
  });
  
   $('#manage_mail').click(function (){
     var url = $('#hidUrl').val();
     window.location.href = url+"index.php/home_controller/manage_mail"; 
    
  });
  
  
   $('#manage_templates').click(function (){
     var url = $('#hidUrl').val();
     window.location.href = url+"index.php/home_controller/manage_templates"; 
    
  });
  
</script>
