var mainApp = {};
var userID = {};
(function(){
    var firebase = app_fireBase;
    var uid = null;
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
          uid = user.id;
        }else{
          uid = null;
          window.location.replace("login.php");
        }
    }); 
})();
function check(id){
	$.ajax({
		url: "check_status.php",
		method: "get",
		data: {uid: id},
		success: function(data){
			if(data == 'Disabled'){
				alert("Your account is disabled!");
				firebase.auth().signOut();
			}
		}	
	})
}