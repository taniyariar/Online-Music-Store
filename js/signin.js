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
           username: $('#email').val(),
            password: $('#passwd').val()
        }
    })
}
 });

 });