var fnameField;
var lnameField;
var cnumField;
var submitBtn;
var confirmBtn;
window.onload = function(){
	var data;
	var userUID;
	var photo;
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
			console.log("logged in as: "+userUID);
			photo = user.photoURL;
			photo = photo.replace('s96-c', 's480-c', true);
			getDefaultVal(userUID);
       		}else{
              		uid = null;
	      		alert("expired token, please log in again");
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
		submitInfo(fname,lname,cnum,userUID,photo);
	}
	$(document).keypress(function(event){
    		if (event.which == '13') {
      			event.stopPropagation();
    		}
	});
}
function submitInfo(fname, lname, cnum, user, photoURL){
	$.ajax({
		url: "update_acc.php",
		method: "get",
		async: true,
		data: {uid: user, fName: fname.replace(/'/g, "\\'"), lName: lname.replace(/'/g, "\\'"), cNum: cnum, photo: photoURL},
		success: function(data){
			alert(data);
			window.location.replace("home.php");
		}
	});
}
function checkData(fname, lname, cnum){ 
	var errCt = 0;
	if(fname.length < 3){
		console.log("1");
		errCt++;
	}
	if(lname.length < 3){
		console.log("2");
		errCt++;
	}
	if(!cnum.substr(0,3).localeCompare("+63") == 0){
		console.log("3");
		errCt++;
	}
	if(!(cnum.length == 13)){
		console.log("4");
		errCt++;
	}
	if(isNaN(cnum.substr(1))){
		console.log("5");
		errCt++;
	}
	if(errCt > 0){
		return false;
	} else {
		return true;
	}
}
function getDefaultVal(user){
	var result;
	$.ajax({
		url: "getProfile.php",
		method: "get",
		async: true,
		data: {id: user},
		success: function(data){
			result = JSON.parse(data);
			console.log(result);
			fnameField.value = result.fname;
			lnameField.value = result.lname;
			cnumField.value = result.cnum;
		}
	});
}