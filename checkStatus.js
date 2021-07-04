(function(){
	
	$.ajax({
		url: "check_status.php",
		method: "get",
		data: {},
		success: function(){
			alert(data);
		}	
	})
}();