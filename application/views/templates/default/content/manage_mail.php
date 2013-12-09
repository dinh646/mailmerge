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
            <input id="param_full_name" type="text" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Full name"  name="keyvalueeditor-action" value="">
            <input id="param_titles_name" type="text" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Titles name vd: MR. "  name="keyvalueeditor-action" value="">
            <!--<select id="param_titles_name">
              <option value="n">MR. </option>
              <option value="y">MS. </option>
            </select>-->

          </div>
          <input id="btn_add_email" type="submit" class="keyvalueeditor-key"  value="Lưu">
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
              <span>Full name</span>
            </div>
          </li>
          <li>
            <div class="text">
              <span>Titles name</span>
            </div>
          </li>
          
        </ul>
        
        
        <?php 
            foreach ($email_list as $email_item){
                $id      = $email_item['id'];
                $email      = $email_item['email'];
                $titles_names      = $email_item['titles_names'];
                $full_name      = $email_item['full_name'];
                $created_date      = $email_item['created_date'];
                $updated_date      = $email_item['updated_date'];
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