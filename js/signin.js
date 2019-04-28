$(document).ready(function(){
    $("form").submit(function(e){
       e.preventDefault();
       var username = $('#email').val();
        var email_regex =  /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var passwd = $('#passwd').val();

   // if(!username.match(email_regex) || username.length < 1) {
   //    $('#email').after('<span class = "error">Please enter a valid email address!</span>');
   // }
   // if(passwd.length==0){
   //     $('#passwd').after('<span class = "error">Please enter a valid password!</span>');
   //  }
   if(!username.match(email_regex) || username.length < 1){
       $("#email").after('<span class="error"><br/>Please enter a valid email address</span>');
       $("#email").css({"border":"solid 3px red"});
       $("#email").focus(function(){
         $(this).css({"border":"none"});
         $("span").remove();
       });
   }

   if(passwd.length == 0){
       $("#passwd").after('<span class="error"><br/>Password must be filled</span>');
       $("#passwd").css({"border":"solid 3px red"});
       $("#passwd").focus(function(){
         $(this).css({"border":"none"});
         $("span").remove();
       });
   }
   else{
       $.ajax({
            url: 'php/signin.php',
            type: 'POST',
            dataType: "json",
           data: {
               email: $('#email').val(),
               password: $('#passwd').val()
            },
            success:function(response){
               var json= $.parseJSON(response);
               console.log(json.status);
               if(json.status == "OK"){
                 if(json.level == "a"){
                   window.location = "adminpage.php";
                 }
                 else{
                   window.location = "homepage.php";
                 }
               }
               else{
                 alert("Entered Credentials are not correct !!! ");
               }
            },
            error: function(response){
                //alert("Entered Credentials not correct !!! ");
            }
        })
       }
    });

    });
