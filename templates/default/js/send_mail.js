
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
    if(id_mail_form==null){
      error=error+"bạn chưa chọn mail gửi!\n\
       ";
    }
    id_mail_form
    if(send_all_mail[0].checked==false && option_send_mail[0].checked==false){
      
      error=error+'bạn chưa chọn mail nhận!';
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
               alert(data);
               $("#disable_screen").removeClass("active");
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
            
            var inputElements = $('input:checkbox[name="list_mail_check"]:checked');
            var url_api = $('#hidUrl').val()+'index.php/home_controller/send_mail';
           
            //vong lap for send one email
            
            for(var i=0; i<inputElements.length; i++){
               var che=inputElements[i].value; 
                 $('.status_send_mail_'+che).addClass('loading');
                 $('.status_send_mail_'+che).removeClass('success');
                 $('.status_send_mail_'+che).removeClass('error');
                 
                  
                 var data={
                    id_template:id_template,
                    id_mail_form:id_mail_form,
                    id_mail:che
                    
                  }
                   $.ajax({
                      url: url_api ,
                      type: 'POST',
                      data:data,
                      success: function(data){
                        //alert(data);
                         var data_res=data.split(",");
                         var data_res0=data_res[0];
                         var data_res1=data_res[1];
                         if(data_res0=="SUCCESSFUL"){
                           $('.status_send_mail_'+data_res1).removeClass('loading');
                           $('.status_send_mail_'+data_res1).addClass('success');
                         
                          // alert(status);
                          }else
                          if(data_res0=="ERROR"){
                         
                            $('.status_send_mail_'+data_res1).removeClass('loading');
                            $('.status_send_mail_'+data_res1).addClass('error');
                          }
                          
                      },
                     error: function(a,textStatus,b){
                       alert('link post khong ton tai');
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

