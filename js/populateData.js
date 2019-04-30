$(document).ready(function(){
  loadData();
  function loadData(page){
    //var page = 1;
    $.ajax({
      url:"php/populateData.php",
      type:"GET",
      data:{page:page},
      success:function(response){
        var json = $.parseJSON(response);
        //console.log(json.data);
        //console.log(json.total_pages);
        $("#album-data").html(json.data);
        $(".pagination").html('<a class="pagination_link" href="javascript:void(0)" id="arrows">&laquo;</a>');
        $(".pagination").append(json.total_pages);
        var pagination_end = "<a class='pagination_link' href='#'>&raquo;</a>";
        $(".pagination").append(pagination_end);
      },
      error:function(response){
        alert("Unable to retrieve data");
    }
    });
  }
  $(document).on('click',".pagination_link",function(){
    var page= $(this).attr("id");
    loadData(page);
  });
  $.ajax({
    url:"php/cartCounter.php",
    type:"POST",
    dataType:'json',
    success:function(response){
      $("#counter").val(response.counter);
    },
    error:function(){}
  });
  var favorite = [];

  $("#search-form").submit(function(e){
    e.preventDefault();
    favorite = [];
    var searchstring  = $('#searchItem').val();
    favorite.push(searchstring);
    $.ajax({
      url:"php/filteredPopulateData.php",
      type:"POST",
      data:{info:favorite},
      success:function(response){
        $("#album-data").empty();
        var json = $.parseJSON(response);
        //console.log($.type(response));
        for (var i = 0, len = json.length; i < len; i++) {
          var string = "img/"+json[i].image;
          var tileinfo = '<li>'+json[i].title+'</li><li>'+json[i].artist+'</li><li>$'+json[i].price+'</li>';
          var info = '<button id="info-btn" style="margin-left:70px;" class = "btn btn-info" onclick="detailsShow(\''+json[i].genre+'\',\''+json[i].info+'\','+json[i].year+','+json[i].dur+')">Description</button>'
          var details = '<ul id="details" style="list-style-type:none;padding:10px;color:white;text-align:center;">'+tileinfo+'<li style="list-style-type:none;float:left;"><button class = "btn btn-info" onclick="addToCart('+json[i].id+')">Add to Cart</button>'+info+'</li></ul>'
          var img = '<li style="list-style-type: none;float:left;padding:50px;"><img src='+string+' style="width:300px;height:300px;border:3px solid grey;" >'+details+'</li>';
          $("#album-data").append(img);
        }
      $(".pagination").empty();
      },
      error:function(response){
        alert("Unable to retrieve data");
    }
    });
  });

  $("#filter-btn").click(function(){
    favorite = [];
    $("input[type=checkbox]").each(function(index, item) {
      if ($(item).prop('checked')){
        favorite.push($(item).val());
      }
    });
    if(favorite.length == 0){
      loadData();
    }
    else{
      $.ajax({
        url:"php/filteredPopulateData.php",
        type:"POST",
        data:{info:favorite},
        success:function(response){
          $("#album-data").empty();
          var json = $.parseJSON(response);
          for (var i = 0, len = json.length; i < len; i++) {
            var string = "img/"+json[i].image;
            var tileinfo = '<li>'+json[i].title+'</li><li>'+json[i].artist+'</li><li>$'+json[i].price+'</li>';
            var info = '<button id="info-btn" style="margin-left:70px;" class = "btn btn-info" onclick="detailsShow(\''+json[i].genre+'\',\''+json[i].info+'\','+json[i].year+','+json[i].dur+')">Description</button>'
            var details = '<ul id="details" style="list-style-type:none;padding:10px;color:white;text-align:center;">'+tileinfo+'<li style="list-style-type:none;float:left;"><button class = "btn btn-info" onclick="addToCart('+json[i].id+')">Add to Cart</button>'+info+'</li></ul>'
            var img = '<li class="list-group" style="list-style-type: none;float:left;padding:50px;"><img src='+string+' style="width:300px;height:300px;border:3px solid grey;" >'+details+'</li>';
            $("#album-data").append(img);
          }
          $(".pagination").empty();
        },
        error:function(response){
          alert("Unable to retrieve data");
      }
      });
    }
  });

  window.detailsShow = function(g,i,y,d){
    var l = event.pageX+5;
    var r = event.pageY+5;
    $("#info-btn").attr("disabled", true);
    $("body").append('<div id="info-box"></div>');
    $("#info-box").css(
        {
          "left": l,
          "top": r,
          "display":"block",
          "padding":"10px"
        });
    var btnstr = '<button id="done-btn" style="margin-left:70px;" class = "btn btn-primary">Close</button>'
    var detailstr = "<p>Genre: "+g+"</p><p>Highlights: "+i+"</p><p>Release Year: "+y+"</p><p>Duration: "+d+" mins</p><p>"+btnstr+"</p>";
    $("#info-box").append(detailstr);
    $("#done-btn").click(function(){
      $("#info-box").empty();
      $("#info-box").remove();
      $("#info-btn").attr("disabled", false);
    });
  }
});
