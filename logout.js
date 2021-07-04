function logOutBtn(){
	firebase.auth().signOut().then(function() {
                windows.location.replace("index.php");
        }).catch(function(error) {
        	console.log("error");
        });
}