var userID;
var firebase = app_fireBase;
var searchKey;
var searchField;
var notifItem = ["notif1","notif2","notif3","notif4","notif5","notif6"];
var nameIds = ["notifName1","notifName2","notifName3","notifName4","notifName5","notifName6"];
var typeIds = ["notifType1","notifType2","notifType3","notifType4","notifType5","notifType6"];
var senderIds = ["notifSender1","notifSender2","notifSender3","notifSender4","notifSender5","notifSender6"];
var dateIds = ["notifDate1","notifDate2","notifDate3","notifDate4","notifDate5","notifDate6"];
var acceptIds = ["acceptBtn1","acceptBtn2","acceptBtn3","acceptBtn4","acceptBtn5","acceptBtn6"];
var rejectIds = ["rejectBtn1","rejectBtn2","rejectBtn3","rejectBtn4","rejectBtn5","rejectBtn6"];
var rateIds = ["rateBtn1","rateBtn2","rateBtn3","rateBtn4","rateBtn5","rateBtn6"];
var notifs = new Array();
var notifName = new Array();
var notifType = new Array();
var notifFrom = new Array();
var notifDate = new Array();
var acceptBtn = new Array();
var rejectBtn = new Array();
var rateBtn = new Array();
var submitRateBtn;
var currPg;
var totPg;
var startIndex;
var jsonSize;
var result;
var notifAction;
var confirmBtn;
var selected;
var action;
var stars;
var comment;
var rate;
window.onload = (function (){
	var logoutBtn = document.getElementById("logoutBtn");
	var searchBtn = document.getElementById("searchBtn");
	searchField = document.getElementById("searchField");
	var nxtBtn = document.getElementById("nxtBtn");
	var prevBtn = document.getElementById("prevBtn");
	confirmBtn = document.getElementById("confirmBtn");
	notifAction = document.getElementById("notifAction");
	submitRateBtn = document.getElementById("rateBtn");
	currPg = 1;
	for(var a = 0; a < 6; a++){
		notifs[a] = document.getElementById(notifItem[a]);
		notifName[a] = document.getElementById(nameIds[a]);
		notifType[a] = document.getElementById(typeIds[a]);
		notifFrom[a] = document.getElementById(senderIds[a]);
		notifDate[a] = document.getElementById(dateIds[a]);
		acceptBtn[a] = document.getElementById(acceptIds[a]);
		rejectBtn[a] = document.getElementById(rejectIds[a]);
		rateBtn[a] = document.getElementById(rateIds[a]);
	}
	firebase.auth().onAuthStateChanged((user) => {
      		if (user) {
			userID = user.uid;
			check(userID);
			loadNotif(userID);
			
      		}else{
              		userID = null;
	      		alert("expired token, please log in again");
			window.location.replace("login.php");
        	}
	})
	logoutBtn.onclick  = function(){
		logOutBtn();
	}
	nxtBtn.onclick = (function(){
		if(currPg == totPg){
			alert("Oops! This is the last page");	
		}else{
			currPg++;
			console.log("You've pressed next!");
			startIndex = (currPg-1)*6;
			console.log("Displaying items starting from index "+startIndex);
			showNotif(userID, currPg, totPg, jsonSize, result);
		}
	})
	prevBtn.onclick = (function(){
		if(currPg == 1){
			alert("Oops! This is already the first page");
		}else{
			for(a = i; a < 6; a++){
				notifs[a].style.display = 'none';			
			}
			currPg--;
			console.log("You've gone back!");
			startIndex = (currPg-1)*6;
			console.log("Displaying notifications starting from index "+startIndex);
			showNotif(userID, currPg, totPg, jsonSize, result);
		}
	})
	$('#confirmAction').on('hidden.bs.modal', function (e) {
  		notifAction.innerHTML = "Choosing this action will ";
	})
	acceptBtn[0].onclick = function(){
		var text = document.createTextNode("ACCEPT the request of "+result[startIndex].notifFrom+" to your post: "+result[startIndex].foodName);
		selected = JSON.parse('[{"uid" : "'+ userID + '", "receive" : "'+ result[startIndex].notifFrom + '", "postId" : "'+ result[startIndex].postId +'", "notifId" : "'+ result[startIndex].notifId+'"}]');
		action = 1;
		notifAction.appendChild(text);
		$('#confirmAction').modal('show');
	}
	acceptBtn[1].onclick = function(){
		var text = document.createTextNode("ACCEPT the request of "+result[startIndex+1].notifFrom+" to your post: "+result[startIndex+1].foodName);
		selected = JSON.parse('[{"uid" : "'+ userID + '", "receive" : "'+ result[startIndex+1].notifFrom + '", "postId" : "'+ result[startIndex+1].postId +'", "notifId" : "'+ result[startIndex+1].notifId+'"}]');		
		action = 1;
		notifAction.appendChild(text);
		$('#confirmAction').modal('show');
	}
	acceptBtn[2].onclick = function(){
		var text = document.createTextNode("ACCEPT the request of "+result[startIndex+2].notifFrom+" to your post: "+result[startIndex+2].foodName);
		selected = JSON.parse('[{"uid" : "'+ userID + '", "receive" : "'+ result[startIndex+2].notifFrom + '", "postId" : "'+ result[startIndex+2].postId +'", "notifId" : "'+ result[startIndex+2].notifId+'"}]');		
		action = 1;
		notifAction.appendChild(text);
		$('#confirmAction').modal('show');
	}
	acceptBtn[3].onclick = function(){
		var text = document.createTextNode("ACCEPT the request of "+result[startIndex+3].notifFrom+" to your post: "+result[startIndex+3].foodName);
		selected = JSON.parse('[{"uid" : "'+ userID + '", "receive" : "'+ result[startIndex+3].notifFrom + '", "postId" : "'+ result[startIndex+3].postId +'", "notifId" : "'+ result[startIndex+3].notifId+'"}]');		
		action = 1;
		notifAction.appendChild(text);
		$('#confirmAction').modal('show');
	}
	acceptBtn[4].onclick = function(){
		var text = document.createTextNode("ACCEPT the request of "+result[startIndex+4].notifFrom+" to your post: "+result[startIndex+4].foodName);
		selected = JSON.parse('[{"uid" : "'+ userID + '", "receive" : "'+ result[startIndex+4].notifFrom + '", "postId" : "'+ result[startIndex+4].postId +'", "notifId" : "'+ result[startIndex+4].notifId+'"}]');
		action = 1;
		notifAction.appendChild(text);
		$('#confirmAction').modal('show');
	}
	acceptBtn[5].onclick = function(){
		var text = document.createTextNode("ACCEPT the request of "+result[startIndex+5].notifFrom+" to your post: "+result[startIndex+5].foodName);
		selected = JSON.parse('[{"uid" : "'+ userID + '", "receive" : "'+ result[startIndex+5].notifFrom + '", "postId" : "'+ result[startIndex+5].postId +'", "notifId" : "'+ result[startIndex+5].notifId+'"}]');
		action = 1;
		notifAction.appendChild(text);
		$('#confirmAction').modal('show');
	}
	rejectBtn[0].onclick = function(){
		var text = document.createTextNode("REJECT the request of "+result[startIndex].notifFrom+" to your post: "+result[startIndex].foodName);
		selected = JSON.parse('[{"uid" : "'+ userID + '", "receive" : "'+ result[startIndex].notifFrom + '", "postId" : "'+ result[startIndex].postId +'", "notifId" : "'+ result[startIndex].notifId+'"}]');	
		action = 2;
		notifAction.appendChild(text);
		$('#confirmAction').modal('show');
	}
	rejectBtn[1].onclick = function(){
		var text = document.createTextNode("REJECT the request of "+result[startIndex+1].notifFrom+" to your post: "+result[startIndex+1].foodName);
		selected = JSON.parse('[{"uid" : "'+ userID + '", "receive" : "'+ result[startIndex+1].notifFrom + '", "postId" : "'+ result[startIndex+1].postId +'", "notifId" : "'+ result[startIndex+1].notifId+'"}]');
		action = 2;
		notifAction.appendChild(text);
		$('#confirmAction').modal('show');
	}
	rejectBtn[2].onclick = function(){
		var text = document.createTextNode("REJECT the request of "+result[startIndex+2].notifFrom+" to your post: "+result[startIndex+2].foodName);
		selected = JSON.parse('[{"uid" : "'+ userID + '", "receive" : "'+ result[startIndex+2].notifFrom + '", "postId" : "'+ result[startIndex+2].postId +'", "notifId" : "'+ result[startIndex+2].notifId+'"}]');		
		action = 2;
		notifAction.appendChild(text);
		$('#confirmAction').modal('show');
	}
	rejectBtn[3].onclick = function(){
		var text = document.createTextNode("REJECT the request of "+result[startIndex+3].notifFrom+" to your post: "+result[startIndex+3].foodName);
		selected = JSON.parse('[{"uid" : "'+ userID + '", "receive" : "'+ result[startIndex+3].notifFrom + '", "postId" : "'+ result[startIndex+3].postId +'", "notifId" : "'+ result[startIndex+3].notifId+'"}]');		
		action = 2;
		notifAction.appendChild(text);
		$('#confirmAction').modal('show');
	}
	rejectBtn[4].onclick = function(){
		var text = document.createTextNode("REJECT the request of "+result[startIndex+4].notifFrom+" to your post: "+result[startIndex+4].foodName);
		selected = JSON.parse('[{"uid" : "'+ userID + '", "receive" : "'+ result[startIndex+4].notifFrom + '", "postId" : "'+ result[startIndex+4].postId +'", "notifId" : "'+ result[startIndex+4].notifId+'"}]');		
		action = 2;
		notifAction.appendChild(text);
		$('#confirmAction').modal('show');
	}
	rejectBtn[5].onclick = function(){
		var text = document.createTextNode("REJECT the request of "+result[startIndex+5].notifFrom+" to your post: "+result[startIndex+5].foodName);
		selected = JSON.parse('[{"uid" : "'+ userID + '", "receive" : "'+ result[startIndex+5].notifFrom + '", "postId" : "'+ result[startIndex+5].postId +'", "notifId" : "'+ result[startIndex+5].notifId+'"}]');
		action = 2;
		notifAction.appendChild(text);
		$('#confirmAction').modal('show');
	}
	rateBtn[0].onclick = function(){
		rate = 0;
		$('#rateModal').modal('show');
	}
	rateBtn[1].onclick = function(){
		rate = 1;
		$('#rateModal').modal('show');
	}
	rateBtn[2].onclick = function(){
		rate = 2;
		$('#rateModal').modal('show');
	}
	rateBtn[3].onclick = function(){
		rate = 3;
		$('#rateModal').modal('show');
	}
	rateBtn[4].onclick = function(){
		rate = 4;
		$('#rateModal').modal('show');
	}
	rateBtn[5].onclick = function(){
		rate = 5;
		$('#rateModal').modal('show');
	}
	confirmBtn.onclick= function(){
		if(action == 1){
			acceptReq(selected);	
		}else if(action == 2){
			rejectReq(selected);
		}
	}
	submitRateBtn.onclick = function(){
		comment = document.getElementById("ratingComm").value;
		stars = $("input[type='radio'][name='rating']:checked").val();
		selected = JSON.parse('[{"to" : "'+ result[startIndex+rate].notifFrom+ '", "from" : "'+ userID + '", "transactId" : "'+ result[startIndex+rate].transacId +'", "stars" : "'+stars+'", "comment" : "'+comment+'"}]');
		rateUser(selected);
	}
	$("#rateModal").on("hidden.bs.modal", function(){
    		$("input[type='radio'][name='rating']:checked").prop('checked', false);
		document.getElementById("ratingComm").value = "";
	});
	$(document).keypress(function(event){
    		if (event.which == '13') {
      			event.stopPropagation();
    		}
	});
});
function loadNotif(user){	
	$.ajax({
		url: "getNotif.php",
		type: "get",
		async: true,
		data:{uid: user},
		success: function(data){
			result = JSON.parse(data);
			jsonSize = Object.keys(result).length;
			if(!(jsonSize%6 == 0)){
				totPg = Math.floor(jsonSize/6)+1;
			}else{
				totPg = jsonSize/6;
			}
			showNotif(user, currPg, totPg, jsonSize, result);
		}
	});
}
function showNotif(user, currPg, totPg, jsonSize, result){
	if(jsonSize == 0){
		$('#emptyNotif').modal('show');
		prevBtn.style.pointerEvents = 'none';
		nxtBtn.style.pointerEvents = 'none';
	}
	startIndex = (currPg-1)*6;
	console.log("Displaying notifications starting from index "+startIndex);
	for(i = 0; i < 6; i++){
		var count = startIndex+i;
		if(count < jsonSize){
			notifName[i].innerHTML = "  "+result[count].foodName;
			notifFrom[i].innerHTML = result[count].notifSender;
			notifFrom[i].href = "view_profile.php?id="+result[count].notifFrom;
			notifType[i].innerHTML = "  "+result[count].notifType+" by: ";
			notifType[i].appendChild(notifFrom[i]);
			notifDate[i].innerHTML = result[count].notifDate;
			notifs[i].style.display = 'block';
			if(result[count].status.localeCompare("Available") == 0){
				if(result[count].response.localeCompare("Rejected") == 0){
					acceptBtn[i].style.pointerEvents = 'none';
					rejectBtn[i].style.pointerEvents = 'none';
					rateBtn[i].style.pointerEvents = 'none';
					acceptBtn[i].style.color = 'DarkGray';
					rejectBtn[i].style.color = 'DarkGray';
					rateBtn[i].style.color = 'DarkGray';
				}if(result[count].response.localeCompare("Waiting") == 0){
					acceptBtn[i].style.pointerEvents = 'auto';
					rejectBtn[i].style.pointerEvents = 'auto';
					rateBtn[i].style.pointerEvents = 'none';
					acceptBtn[i].style.color = 'Black';
					rejectBtn[i].style.color = 'Black';
					rateBtn[i].style.color = 'DarkGray';
				}
			}
			if(result[count].status.localeCompare("Claimed") == 0){
				if(user.localeCompare(result[count].owner) == 0 && result[count].notifFrom.localeCompare(result[count].receiver) == 0){
					acceptBtn[i].style.pointerEvents = 'none';
					rejectBtn[i].style.pointerEvents = 'none';
					rateBtn[i].style.pointerEvents = 'auto';
					acceptBtn[i].style.color = 'DarkGray';
					rejectBtn[i].style.color = 'DarkGray';
					rateBtn[i].style.color = 'Black';
				}else if(user.localeCompare(result[count].receiver) == 0 && result[count].notifFrom.localeCompare(result[count].owner) == 0){
					acceptBtn[i].style.pointerEvents = 'none';
					rejectBtn[i].style.pointerEvents = 'none';
					rateBtn[i].style.pointerEvents = 'auto';
					acceptBtn[i].style.color = 'DarkGray';
					rejectBtn[i].style.color = 'DarkGray';
					rateBtn[i].style.color = 'Black';
				}else{
					acceptBtn[i].style.pointerEvents = 'none';
					rejectBtn[i].style.pointerEvents = 'none';
					rateBtn[i].style.pointerEvents = 'none';
					acceptBtn[i].style.color = 'DarkGray';
					rejectBtn[i].style.color = 'DarkGray';
					rateBtn[i].style.color = 'DarkGray';
				}
			}
			if(result[count].status.localeCompare("Deleted") == 0){
				acceptBtn[i].style.pointerEvents = 'none';
				rejectBtn[i].style.pointerEvents = 'none';
				rateBtn[i].style.pointerEvents = 'none';
				acceptBtn[i].style.color = 'DarkGray';
				rejectBtn[i].style.color = 'DarkGray';
				rateBtn[i].style.color = 'DarkGray';
			}
		}else{
			for(a = i; a < 6; a++){
				notifs[a].style.display = 'none';
			}
			break;
		}
	}
}
function acceptReq(selected){
	console.log("Accept Req: "+selected[0].uid+" "+selected[0].receive+" "+selected[0].postId+" "+selected[0].notifId);
	$.ajax({
		url: "claimedPost.php",
		type: "get",
		async: true,
		data:{uid: selected[0].uid, receive: selected[0].receive, post: selected[0].postId, notifId: selected[0].notifId},
		success: function(data){
			alert(data);
			window.location.reload();
		}	
	})

}
function rejectReq(selected){
	console.log("Reject Req: "+selected[0].uid+" "+selected[0].receive+" "+selected[0].postId+" "+selected[0].notifId);
	$.ajax({
		url: "rejectReq.php",
		type: "get",
		async: true,
		data:{uid: selected[0].uid, receive: selected[0].receive, post: selected[0].postId, notifId: selected[0].notifId},
		success: function(data){
			alert(data);
			window.location.reload();
		}	
	})
}
function rateUser(selected){
	console.log("Rate User: "+selected[0].to+" by "+selected[0].from+" for trasactID: "+result[startIndex+rate].foodName+" "+selected[0].transactId+" with "+selected[0].stars+" stars and comment: "+selected[0].comment);
	$.ajax({
		url: "submitRating.php",
		type: "get",
		async: true,
		data:{to: selected[0].to, from: selected[0].from, transact: selected[0].transactId, stars: selected[0].stars, comment: selected[0].comment},
		success: function(data){
			alert(data);
			window.location.reload();
		}	
	})
}


