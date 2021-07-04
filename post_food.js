var userID;
var logoutBtn;
var currentDT = new Date();
var file;
var fdata = new FormData();
window.onload = function(){ 
	var firebase = app_fireBase;
	firebase.auth().onAuthStateChanged(function(user) {
  		if (user) {
			userID =  user.uid;
			check(userID);
      		} else {
    			console.log("Expired token");
			window.location.replace("login.php");
  		}
	});
	logoutBtn = document.getElementById("logoutBtn");
	var nameField = document.getElementById("foodName");
	var categoryField = document.getElementById("foodCategory");
	var descriptionField = document.getElementById("foodDesc");
	var locationField = document.getElementById("foodLoc");
	var durationField = document.getElementById("foodTime");
	var submit = document.getElementById("postBtn");
	var name;
	var category;
	var description;
	var location; 
	var currentdate; 
	var posted_time;
	var status;
	var valid = false;
	var date = currentDT.getFullYear()+"-"+('0'+(currentDT.getMonth()+1)).slice(-2)+"-"+('0'+currentDT.getDate()).slice(-2);
	submit.onclick = (function(){
		name = nameField.value;
		category  = categoryField.value;
		description = descriptionField.value;
		location = locationField.value;
		currentdate = new Date();
		posted_time = ('0'+currentdate.getHours()).slice(-2) + ":"  
                + ('0'+currentdate.getMinutes()).slice(-2) + ":" 
                + ('0'+currentdate.getSeconds()).slice(-2);
		status = "Available";
		valid = checkBlank(name, description, location);
		if(valid){
			$('#submitModal').modal('show');
		}else{
			$('#errModal').modal('show');
		}
	})
	logoutBtn.onclick = (function(){
		logOutBtn();
	})
	$(document).keypress(function(event){
    		if (event.which == '13') {
      			event.stopPropagation();
    		}
	});
	confirmBtn.onclick = function(){
		writeInfo(name, category, description, location, posted_time, date, status);
	}	
}
function writeInfo(name, category, description, location, posted_time, date, status){
	var fname = name.replace(/'/g, "\\'");
	var fdescription = description.replace(/'/g, "\\'");
	var flocation = location.replace(/'/g, "\\'");
	file = document.getElementById("img-food").files[0];
	fdata.append("file", file);
	var info = '[{"name": "'+fname+'", "category": "'+category+'", "description": "'+fdescription+'", "location": "'+flocation+'", "posted_time": "'+posted_time+'", "date": "'+date+'", "owner": "'+userID+'", "status": "'+status+'"}]';	
	fdata.append("info", info);
	$.ajax({
		url: "submit_food.php",
		method: "post",
		async: true,
		data: fdata,
		cache: false,
               	contentType: false,
                processData: false,
		success: function(data){
			alert(data);
			window.location.replace("home.php");
		}
	});	
}
function checkBlank(name, description, location){
	var err = 0;
	if(name == null || name.trim().localeCompare('') == 0){
		err++;
	}
	if(location == null || location.trim().localeCompare('') == 0){
		err++;
	}
	if(description == null || description.trim().localeCompare('') == 0){
		err++;
	}
	if(err > 0){
		return false;
		err = 0;
	}else{
		return true;
	}
}