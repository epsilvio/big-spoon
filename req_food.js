function reqPost1(ownerId, postId){
	var user = firebase.auth().currentUser;
	if (ownerId == user.uid){
		alert("You cannot send request to your own post!");
	}else{
		sendRequest(user.uid, ownerId, postId, "Waiting");
	}
}
function reqPost2(ownerId, postId){
	var user = firebase.auth().currentUser;
	if (ownerId == user.uid){
		alert("You cannot send request to your own post!");
	}else{
		sendRequest(user.uid, ownerId, postId, "Waiting");
	}
}
function reqPost3(ownerId, postId){
	var user = firebase.auth().currentUser;
	if (ownerId == user.uid){
		alert("You cannot send request to your own post!");
	}else{
		sendRequest(user.uid, ownerId, postId, "Waiting");
	}
}
function reqPost4(ownerId, postId){
	var user = firebase.auth().currentUser;
	if (ownerId == user.uid){
		alert("You cannot send request to your own post!");
	}else{
		sendRequest(user.uid, ownerId, postId, "Waiting");
	}
}
function reqPost5(ownerId, postId){
	var user = firebase.auth().currentUser;
	if (ownerId == user.uid){
		alert("You cannot send request to your own post!");
	}else{
		sendRequest(user.uid, ownerId, postId, "Waiting");
	}
}
function reqPost6(ownerId, postId){
	var user = firebase.auth().currentUser;
	if (ownerId == user.uid){
		alert("You cannot send request to your own post!");
	}else{
		sendRequest(user.uid, ownerId, postId, "Waiting");
	}
}
function sendRequest(userId, ownerId, postId, response){
	var currentDT = new Date();
	var result;
	var reqDT = currentDT.getFullYear()+"-"+('0'+(currentDT.getMonth()+1)).slice(-2)+"-"+('0'+currentDT.getDate()).slice(-2)+" "
		+('0'+currentDT.getHours()).slice(-2) + ":"  
                + ('0'+currentDT.getMinutes()).slice(-2) + ":" 
                + ('0'+currentDT.getSeconds()).slice(-2);
	$.ajax({
		url: "food_req.php",
		type: "get",
		async: true,
		data:{receiver : userId, giver : ownerId, postId : postId, response : response, datetime : reqDT},
		success: function(data){
			console.log(userId, ownerId, postId, response, reqDT);
			result = data;
			console.log(result);
			alert(result);
		}
	});
}


