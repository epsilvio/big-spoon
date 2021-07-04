var userID;
window.onload = (function (){
	var logoutBtn = document.getElementById("logoutBtn");
	var firebase = app_fireBase;
	var isAccNew;
	var searchBtn = document.getElementById("searchBtn");
	firebase.auth().onAuthStateChanged((user) => {
      		if (user) {
			userID = user.uid;
			var result;
			$user = user.uid;
			check($user);
			function checkAcc($user){
				$.ajax({
					url: "check_register.php",
					type: "get",
					async: true,
					data:{uid: $user},
					success: function(data){
						result = JSON.parse(data);
					}
				});
			}
			checkAcc($user);
			setTimeout(function(){
				if (result.localeCompare("Nope") === 0){
					alert("No info registered on your account. Please complete your account details first!");
					window.location.replace("create_acc.php");
				}
			},1000);
      		}else{
              		userID = null;
			window.location.replace("login.php");
        	}
	})
	try {
  		loadPosts(0, userID);
	}catch(err) {
  		console.log("Oh you're in another page "+err);
	}
	logoutBtn.onclick  = function(){
		logOutBtn();
	}
	searchBtn.onclick = function(){
		loadPosts(1);
	}
});

