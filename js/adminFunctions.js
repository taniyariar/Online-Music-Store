
	function deleteSong(productid){
		
		$.ajax({
			url: '../php/DeleteSong.php',
			type: 'POST',
			dataType: "json",    
			data: {
				productid: productid
			},
			success: function (data) {
			    //window.location= " /l/WPL/php/adminpage.php";
				$(location).attr('href',"http://localhost/l/WPL/php/adminpage.php");
			},
			error: function(data) {
			}
		});
	   // window.location=  "/l/WPL/php/adminpage.php";
	   $(location).attr('href',"http://localhost/l/WPL/php/adminpage.php");

	}