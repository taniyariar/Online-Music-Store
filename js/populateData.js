$(document).ready(function(){
  $.ajax({
    url:"php/populateData.php";
    type:"GET",
    success:function(response){
      $("#edit-table").append(response);
    },
    error:function(response){
      alert("Unable to retrieve data");
    }
  });
});
