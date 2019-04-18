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
    //window.location= "php/admin_editperitem.php?songId="+id;
    console.log(id);
		$.ajax({
			url: 'php/admin_deleteperitem.php',
			type: 'POST',
			dataType: "json",
			data: {id: id },
			success: function () {
			    window.open('../adminpage.html','_blank');
          window.close();
			},
			error: function(data) {
			}
		});
  }
});
