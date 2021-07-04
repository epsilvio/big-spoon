var fnameField;
var lnameField;
var cnumField;
var submitBtn;
var confirmBtn;
window.onload = function(){
	var userUID;
	var photo;
	var joinDate;
	var fname;
	var lname;
	var cnum;
	var valid = false;
	fnameField = document.getElementById("fname");
	lnameField = document.getElementById("lname");
	cnumField = document.getElementById("cnum");
	submitBtn = document.getElementById("submitBtn");
	confirmBtn = document.getElementById("confirmBtn");
	firebase.auth().onAuthStateChanged((user) => {
      		if (user) {
			userUID = user.uid;
			check(userUID);
			console.log("logged in as: "+userUID);
			photo = user.photoURL;
			photo = photo.replace('s96-c', 's480-c', true);
			joinDate = user.metadata.creationTime;
			joinDate = joinDate.substr(0,17);
       		}else{
              		uid = null;
			window.location.replace("login.php");
        	}
	});
	submitBtn.onclick = function(){
		fname = fnameField.value;
		lname = lnameField.value;
		cnum = cnumField.value;
		valid = checkData(fname, lname, cnum);
		if(!valid){
			$('#errModal').modal('show');
		}else{
			$('#submitModal').modal('show');
		}
	}
	confirmBtn.onclick = function(){
		submitInfo(fname,lname,cnum,userUID,photo,joinDate);
	}
	$(document).keypress(function(event){
    		if (event.which == '13') {
      			event.stopPropagation();
    		}
	});
}
function submitInfo(fname, lname, cnum, user, photoURL, jDate){
	$.ajax({
		url: "submit_info.php",
		method: "get",
		async: true,
		data: {uid: user, fName: fname.replace(/'/g, "\\'"), lName: lname.replace(/'/g, "\\'"), cNum: cnum, photo: photoURL, jdate: jDate},
		success: function(data){
			alert(data);
			window.location.replace("home.php");
		}
	});
}
function checkData(fname, lname, cnum){ 
	var errCt = 0;
	if(fname.length < 3){
		errCt++;
	}
	if(lname.length < 3){
		errCt++;
	}
	if(!cnum.substr(0,3).localeCompare("+63") == 0){
		errCt++;
	}
	if(!(cnum.length == 13)){
		errCt++;
	}
	if(isNaN(cnum.substr(1))){
		errCt++;
	}
	if(errCt > 0){
		return false;
	} else {
		return true;
	}
}