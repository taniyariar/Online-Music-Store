$(document).ready(function(){
  $.ajax({
    url:'php/admin_deleteItem.php',
    type:"GET",
    success:function(response){
      $("#delete-table").append(response);
    },
    error:function(response){
      alert("Unable to retrieve data");
    }
  });
  window.deleteSong = function(id){
    if(confirm('Are you sure you want to Delete the Item ?')){
      $.ajax({
  			url: 'php/admin_deleteperitem.php',
  			type: 'POST',
  			dataType: "json",
  			data: {id: id },
  			success: function(response){
            var json = $.parseJSON(response);
            if(json.status == "OK"){
              window.location.href="http://localhost:81/WPL/adminpage.php";
            }
  			},
  			error: function(data) {
  			}
  		});
    }		
  }
});
