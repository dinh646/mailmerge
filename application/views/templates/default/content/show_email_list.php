
<div id="form_content_mail">
  <div class="page_center">
    <div class="banner_mail">
      <div class="logo_sendmail">
      </div>
    </div>
    <div class="input_items">
      
      <?php
     // var_dump($email_list);
      $stt=1;
      foreach ($email_list as $email_item){
        $id      = $email_item['id'];
        $email      = $email_item['email'];
        $titles_names      = $email_item['titles_names'];
        $full_name      = $email_item['full_name'];
        $created_date      = $email_item['created_date'];
        $updated_date      = $email_item['updated_date'];
        
        
        
        echo $stt.'====='
                .$id.'=====         '.
                $email.'=====          '.
                $titles_names.'=====         '.
                $full_name.'=====        '.
                $created_date.'=====         '.
                $updated_date;
        
        echo '<br>';
        
        $stt++;
      }
      
      ?>
      
    </div>
  </div>
</div>