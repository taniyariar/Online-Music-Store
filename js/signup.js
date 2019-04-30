$(document).ready(function(){
  var errormsg = "";
  $(".btn-done").click(function(e){
    e.preventDefault();
    window.location.href='signin.html';
  });
  $(".btn-signup").click(function(e){
    e.preventDefault();
    var email = $.trim($("#email").val());
    var fname = $.trim($("#fname").val());
    var lname = $.trim($("#lname").val());
    var phone = $.trim($("#phone").val());
    var code = $.trim($("#selectBox option").val());
    var passwd = $.trim($("#passwd").val());
    var cpasswd = $.trim($("#c-passwd").val());
    //console.log(email,fname,lname,phone,code,passwd,cpasswd);
    var check= $('#check').prop('checked');


    if(fname.length < 1){
      errormsg += "Enter First Name <br/>";
      $("#fname").css({"border":"solid 3px red"});
      $("#fname").focus(function(){
        $(this).css({"border":"none"});
        $("#validate").empty();
      });
    }

    if(lname.length < 1){
      errormsg += "Enter First Name <br/>";
      $("#lname").css({"border":"solid 3px red"});
      $("#lname").focus(function(){
        $(this).css({"border":"none"});
        $("#validate").empty();
      });
    }

    if(email.length < 1){
      errormsg += "Enter Email Id <br/>";
      $("#email").css({"border":"solid 3px red"});
      $("#email").focus(function(){
        $(this).css({"border":"none"});
        $("#validate").empty();
      });
    }
    else{
      if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))){
        errormsg += "Enter Valid Email id <br/>";
        $("#email").css({"border":"solid 3px red"});
        $("#email").focus(function(){
          $(this).css({"border":"none"});
          $("#validate").empty();
        });
      }
    }

    if(code.length < 1){
      errormsg += "Select Country Code <br/>";
      $("#selectBox").css({"border":"solid 3px red"});
      $("#selectBox").focus(function(){
        $(this).css({"border":"none"});
        $("#validate").empty();
      });
    }

    if(phone.length < 1){
      errormsg += "Enter Phone Number <br/>";
      $("#phone").css({"border":"solid 3px red"});
      $("#phone").focus(function(){
        $(this).css({"border":"none"});
        $("#validate").empty();
      });
    }
    if(phone.length != 10){
      errormsg += "Enter Valid Phone Number <br/>";
      $("#phone").css({"border":"solid 3px red"});
      $("#phone").focus(function(){
        $(this).css({"border":"none"});
        $("#validate").empty();
      });
    }


    if(passwd.length < 1){
      errormsg += "Enter Password <br/>";
      $("#passwd").css({"border":"solid 3px red"});
      $("#passwd").focus(function(){
        $(this).css({"border":"none"});
        $("#validate").empty();
      });
    }
    if(passwd.length < 6){
      errormsg += "Password must be at least 6 characters long<br/>";
      $("#passwd").css({"border":"solid 3px red"});
      $("#passwd").focus(function(){
        $(this).css({"border":"none"});
      });
    }


    if(cpasswd.length < 1){
      errormsg += "Enter Confirm Password <br/>";
      $("#c-passwd").css({"border":"solid 3px red"});
      $("#c-passwd").focus(function(){
        $(this).css({"border":"none"});
        $("#validate").empty();
      });
    }

    if(cpasswd != passwd){
      errormsg += "Passwords do not Match <br/>";
      $("#c-passwd").css({"border":"solid 3px red"});
      $("#passwd").css({"border":"solid 3px red"});
      $("#c-passwd").focus(function(){
        $(this).css({"border":"none"});
        $("#validate").empty();
      });
      $("#passwd").focus(function(){
        $(this).css({"border":"none"});
        $("#validate").empty();
      });
    }

    if(check == false){
      errormsg += "Accept the Privacy Policy and Terms of Usage <br/>";
      $("#terms").css({"border":"solid 3px red"});
      $("#check").focus(function(){
        $("#terms").css({"border":"none"});
        $("#validate").empty();
      });
    }

    if(errormsg != ""){
      $("#validate").addClass("error");
      $("#validate").html(errormsg);
      errormsg = "";
      return false;
    }
    else{
      $.ajax({
        type:'POST',
        url: "php/signup.php",
        dataType:"json",
        data: {
          email:email,
          fname:fname,
          lname:lname,
          phone:phone,
          code:code,
          passwd:passwd
        },
        success: function (response) {
            var json = $.parseJSON(response);
            console.log(json.status);
            if(json.status == "exist"){
              $("#email").after('<span class="error">Email Id already exists.</span><a href="signin.html"> Try Logging In.</a>');
              $("#email").css({"border":"solid 3px red"});
              $("#email").focus(function(){
                $("#email").css({"border":"none"});
                $("span").remove();
              });
            }
           if(json.status == "inserted"){
              $("#validate").removeClass("error");
              $("#validate").html("<a href='signin.html'>Thanks for signing up! Click Here to Sign In Now</a>");
              $("form")[0].reset();
            }
        },
        error: function(data) {
          console.log(data);
        }
      });
    }
  })
});
