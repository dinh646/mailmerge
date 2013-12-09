/* 
    Document   : common.js
    Created on : 09-12-2013, 11:40:26
    Author     : phule@innoria.com
    Description: file common.js 

*/

/*====================================================|
 * add_email                                          |
 * 
 * 
 ======================================================*/
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
            // window.location=url+"index.php/admin/admin_controller/coupon_page";
            alert('them thanh cong');
          },

         //timeout:5000,
         error: function(a,textStatus,b){
           alert('khong thanh cong');
         }
       });
    
  });


/*====================================================|
 * add_email                                          |
 * 
 * 
 ======================================================*/
