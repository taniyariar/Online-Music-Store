function wrapupfunc(){
  window.location.href="http://localhost:81/WPL/adminpage.php";
}
function validationfunc(key,name){
  var id = key;
  var imname = name;
  //console.log(id,imname);
  var formData =  new FormData($("#edit-item-form"));
  var title = $.trim($("#title").val());
  var artists = $.trim($("#artists").val());
  var genre = $.trim($("#genreSelect").find(":selected").text());
  var description = $.trim($("#description").val());
  var dur = $.trim($("#dur").val());
  var year = $.trim($("#year").val());
  var price = $.trim($("#price").val());
  var file = $("input[type=file]").get(0).files[0];
  var flag = $.trim($("#instockSelect").find(":selected").val());

  console.log(title,artists,genre,description,dur,year,price,file,id,flag);
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

  var imageIndicator = 0;
  if(!file){
    imageIndicator = 1;
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
      url:"../php/admin_updateItem.php",
      data: {title:title,artists:artists,genre:genre,description:description,dur:dur,year:year,price:price,id:id,flag:flag},
      success:function(response){
        var json = $.parseJSON(response);
        console.log(json);
        if($.isNumeric(json.id) && imageIndicator == 0){
          formData.append('id',json.id);
          console.log(formData.get('id'));
          formData.append('image',file);
          console.log(formData.get('image'));
          formData.append('image_name',imname);
          console.log(formData.get('image_name'));
          $.ajax({
             url: "../php/admin_updateImage.php",
             type: "POST",
             data: formData,
             contentType: false,
             processData: false,
             cache: false,
             success:function(reply){
               var j = $.parseJSON(reply);
               console.log(j.id);
               if($.isNumeric(j.id)){
                 wrapupfunc();
                 window.close();
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
        //window.close('../admin_editperitem.php');
        wrapupfunc();
      },
      error:function(response){
          alert("Error Occurred while adding Item to inventory");
      }
    });
  }
}
