
<div id="form_content_mail">
  <div class="page_center">
    <div class="banner_mail">
      <div class="logo_sendmail">
      </div>
    </div>
    <div class="input_items">
      
      <span>email</span><br>
      <input type="text" id="param_email" placeholder="vd a@gmail.com"><br><br>
      <span>titles name</span><br>
      <input type="text" id="param_titles_name" placeholder="vd MR."><br><br>
       <span>full name</span><br>
      <input type="text" id="param_full_name" placeholder="vd Nguyen A"><br><br>
      
      <input type="submit" value="Them" id="btn_add_email">
      
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
             alert(data);
            // window.location=url+"index.php/admin/admin_controller/coupon_page";
          },

         //timeout:5000,
         error: function(a,textStatus,b){
           alert('khong thanh cong');
         }
       });
    
  });
</script>