$(document).ready(function(){

    $("#additemform").submit(function(e){
      e.preventDefault();
      var formData =  new FormData($(this));

      var title = $.trim($("#title").val());
      var artists = $.trim($("#artists").val());
      var genre = $.trim($("#genreSelect").find(":selected").text());
      var description = $.trim($("#description").val());
      var dur = $.trim($("#dur").val());
      var year = $.trim($("#year").val());
      var price = $.trim($("#price").val());
      var file = $("input[type=file]").get(0).files[0];

      console.log(title,artists,genre,description,dur,year,price,file);
      var error = "";
      if(title.length < 1){
        error ="All fields are mandatory <br/>";
        $("#title").css({"border":"solid 3px red"});
        $("#title").focus(function(){
          $(this).css({"border":"solid 1px grey"});
          $("#validate").empty();
        });
      }
      if(artists.length < 1){
        error ="All fields are mandatory <br/>";
        $("#artists").css({"border":"solid 3px red"});
        $("#artists").focus(function(){
          $(this).css({"border":"solid 1px grey"});
          $("#validate").empty();
        });
      }
      if(genre == "Select Genre"){
        error ="All fields are mandatory <br/>";
        $("#genreSelect").css({"border":"solid 3px red"});
        $("#genreSelect").focus(function(){
          $(this).css({"border":"solid 1px grey"});
          $("#validate").empty();
        });
      }
      if(description.length < 1){
        error ="All fields are mandatory <br/>";
        $("#description").css({"border":"solid 3px red"});
        $("#description").focus(function(){
          $(this).css({"border":"solid 1px grey"});
          $("#validate").empty();
        });
      }
      if(dur.length < 1){
        error ="All fields are mandatory <br/>";
        $("#dur").css({"border":"solid 3px red"});
        $("#dur").focus(function(){
          $(this).css({"border":"solid 1px grey"});
          $("#validate").empty();
        });
      }
      else{
        var dur = parseFloat(dur);
        if(isNaN(dur)){
          error ="Duration must be numerical <br/>";
          $("#dur").css({"border":"solid 3px red"});
          $("#dur").focus(function(){
            $(this).css({"border":"solid 1px grey"});
            $("#validate").empty();
          });
        }
      }
      if(year.length < 1){
        error ="All fields are mandatory <br/>";
        $("#year").css({"border":"solid 3px red"});
        $("#year").focus(function(){
          $(this).css({"border":"solid 1px grey"});
          $("#validate").empty();
        });
      }
      else{
        var year = parseInt(year);
        if(isNaN(year)){
          error ="Invalid Year of release value <br/>";
          $("#year").css({"border":"solid 3px red"});
          $("#year").focus(function(){
            $(this).css({"border":"solid 1px grey"});
            $("#validate").empty();
          });
        }
      }

      if(price.length < 1){
        error ="All fields are mandatory <br/>";
        $("#price").css({"border":"solid 3px red"});
        $("#price").focus(function(){
          $(this).css({"border":"solid 1px grey"});
          $("#validate").empty();
        });
      }
      else{
        var price = parseFloat(price);
        if(isNaN(price)){
          error ="Price must be numerical <br/>";
          $("#price").css({"border":"solid 3px red"});
          $("#price").focus(function(){
            $(this).css({"border":"solid 1px grey"});
            $("#validate").empty();
          });
        }
      }

      if(!file){
        error ="All fields are mandatory <br/>";
        $("input[type=file]").css({"border":"solid 3px red"});
        $("input[type=file]").focus(function(){
          $(this).css({"border":"solid 1px grey"});
          $("#validate").empty();
        });
      }
      else{
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            error ='Please select a valid image file (JPEG/JPG/PNG).';
            $("input[type=file]").val('');
            $("input[type=file]").css({"border":"solid 3px red"});
            $("input[type=file]").focus(function(){
              $(this).css({"border":"solid 1px grey"});
              $("#validate").empty();
            });
        }
      }
      if(error != ""){
        $("#validate").addClass("error");
        $("#validate").html(error);
        error = "";
        return false;
      }
      else{
        $.ajax({
          type:"POST",
          dataType:"json",
          url:"php/admin_addItem.php",
          data: {title:title,artists:artists,genre:genre,description:description,dur:dur,year:year,price:price},
          success:function(response){
            var json = $.parseJSON(response);
            console.log(json);
            if($.isNumeric(json.id)){
              formData.append('id',json.id);
              console.log(formData.get('id'));
              formData.append('image',file);
              console.log(formData.get('image'));
              $.ajax({
                 url: "php/admin_addImage.php",
                 type: "POST",
                 data: formData,
                 contentType: false,
                 processData: false,
                 cache: false,
                 success:function(reply){
                   var j = $.parseJSON(reply);
                   console.log(j.id);
                   if($.isNumeric(j.id)){
                     alert("Item added to Inventory");
                     $('#additemform')[0].reset();
                     window.location.href="http://localhost:81/WPL/adminpage.php";
                   }
                   else{
                     alert("Error Occurred while adding Image to inventory");
                   }
                 },
                 error:function(reply){
                   alert("Error in Inserting Image");
                 }
               });
            }
          },
          error:function(response){
              alert("Error Occurred while adding Item to inventory");
          }
        });
      }
    })
});
