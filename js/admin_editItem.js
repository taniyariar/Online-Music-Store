$(document).ready(function(){
  $.ajax({
    url:'php/admin_editItem.php',
    type:"GET",
    success:function(response){
      $("#edit-table").append(response);
    },
    error:function(response){
      alert("Unable to retrieve data");
    }
  });
  window.editSong = function(id){
    window.location= "php/admin_editperitem.php?songId="+id;
    //window.close();
  }
});
