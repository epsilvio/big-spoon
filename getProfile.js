var userId;
var profileId;
var loc;
var logoutBtn;
var name;
var cnum;
var rating;
var profPic;
var picF;
var nameF;
var cnumF;
var rateF
var joinDate;
var reportBtn;
var submitBtn;
var reportErr;
var starId = ["stars1", "stars2", "stars3"];
var commId = ["comment1", "comment2", "comment3"];
var fromId = ["rateFrom1", "rateFrom2", "rateFrom3"];
var dateId = ["rateDate1", "rateDate2", "rateDate3"];
var itemId = ["rate1", "rate2", "rate3", "nxtBtn", "prevBtn"];
var stars = new Array();
var comments = new Array();
var froms = new Array();
var dates = new Array();
var rateItems = new Array();
var emptyRev;
var totPg;
var currPg;
var startIndex;
var jsonSize;
var result;
window.onload = function(){
	logoutBtn = document.getElementById("logoutBtn");
	loc = window.location.search;
	profileId = loc.substr(4);
	picF = document.getElementById("defPic");
	nameF = document.getElementById("name");
	cnumF = document.getElementById("cnum");
	uidF = document.getElementById("uid");
	rateF = document.getElementById("rating");
	logoutBtn = document.getElementById("logoutBtn");
	joinDate = document.getElementById("joinDate");
	reportBtn = document.getElementById("reportBtn");
	submitBtn = document.getElementById("submitBtn");
	reportErr = document.getElementById("reportErr");
	emptyRev = document.getElementById("emptyReview");
	emptyRev.style.display = 'none';
	reportErr.style.display = 'none';
	startIndex = 0;
	currPg = 1;
	var jDate;
	for(var a=0; a<3; a++){
		stars[a] = document.getElementById(starId[a]);
		comments[a] = document.getElementById(commId[a]);
		froms[a] = document.getElementById(fromId[a]);
		dates[a] = document.getElementById(dateId[a]);
	}
	for(var a=0; a<5; a++){
		rateItems[a] = document.getElementById(itemId[a]);
	}
	firebase.auth().onAuthStateChanged((user) => {
      		if (user) {
			this.userId = user.uid;
			if(userId.localeCompare(profileId) == 0){
				window.location.replace("my_profile.php");
			}else{
				showProfile(profileId);
			}
		}else{
			logOutBtn();
		}
	})
	logoutBtn.onclick = function(){
		logOutBtn();
	}
	reportBtn.onclick = function(){
		$('#reportModal').modal('show');
	}
	submitBtn.onclick = function(){
		comment = document.getElementById("reportComm").value;
		if ($("input[type=radio][name='report']:checked").length == 1) {
    			type = $("input[type='radio'][name='report']:checked").val();
			reportErr.style.display = 'none';
			reportUser(profileId, userId, type, comment);
		}else{
			reportErr.style.display = 'block';
		}
	}
	$("#reportModal").on("hidden.bs.modal", function(){
    		$("input[type='radio'][name='report']:checked").prop('checked', false);
		document.getElementById("reportComm").value = "";
		reportErr.style.display = 'none';
	});
	rateItems[3].onclick = function(){
		if(currPg == totPg){
			alert("This is the last page!");
		}else{
			currPg++;
			startIndex+=3;
			showRatings(jsonSize, startIndex);
		}
	}
	rateItems[4].onclick = function(){
		if(currPg == 1){
			alert("This is the last page!");
		}else{
			currPg--;
			startIndex-=3;
			showRatings(jsonSize, startIndex);
		}
	}
	$(document).keypress(function(event){
    		if (event.which == '13') {
      			event.stopPropagation();
    		}
	});
}
function showProfile(pId){
	var result;
	$.ajax({
		url: "getProfile.php",
		method: "get",
		async: true,
		data: {id: pId},
		success: function(data){
			try{
				result = JSON.parse(data);
				name = result.fname+" "+result.lname;
				cnum = result.cnum;
				rating = result.user_rating;
				picF.src = result.photo_url;
				nameF.innerHTML = name;
				cnumF.innerHTML = cnum;
				rateF.innerHTML = rating+"/5.0";
				jDate = result.creationDate;
				joinDate.innerHTML = jDate;
				getRatings(pId);
			}catch(e){
				alert(data);
			}
		}
	});
}
function reportUser(reportTo, reportFrom, type, comment){
	var details = {"info":
		{
			"to": reportTo,
			"from": reportFrom,
			"repType": type,
			"comm": comment
		}
	}
	$.ajax({
		url: "submit_report.php",
		method: "post",
		data: details,
		success: function(data){
			alert(data);
			window.location.replace("home.php");
		}
	})
}
function getRatings(id){
	$.ajax({
		url: "get_rating.php",
		method: "get",
		data: {id: id},
		success: function(data){
			try{
				result = JSON.parse(data);
				jsonSize = Object.keys(result).length;
				if(!(jsonSize%3 == 0)){
					totPg = Math.floor((jsonSize/3)+1);
				}else{
					totPg = jsonSize/3;
				}
				showRatings(jsonSize, 0);
			}catch(e){
				console.log(e);
				emptyRev.style.display = 'block';
				for(var a=0; a<5; a++){
					rateItems[a].style.display = 'none';
				}
			}
		}
	})
}
function showRatings(size, startIndex){
	var starSign;
	var emptyStar;
	$("#stars1").empty();
	$("#stars2").empty();
	$("#stars3").empty();
	if(size == 0){
		emptyRev.style.display = 'block';
		for(var a=0; a<5; a++){
			rateItems[a].style.display = 'none';
		}
	}else{
		for(var i=0; i<3; i++){
			if((startIndex+i) < size){
				for(var x = 0; x < 5; x++){
					if(x < parseInt(result[startIndex+i].stars)){
						starSign = document.createElement("I");
						starSign.className = "fas fa-star";
						stars[i].appendChild(starSign);
					}else{
						emptyStar = document.createElement("I");
						emptyStar.className = "far fa-star";
						stars[i].appendChild(emptyStar);
					}	
				}
				comments[i].innerHTML = result[startIndex+i].comment;
				froms[i].innerHTML = result[startIndex+i].fromName;
				froms[i].href = "view_profile.php?id="+result[startIndex+i].ratingFrom;
				dates[i].innerHTML = result[startIndex+i].timestamp;
				rateItems[i].style.display = 'block';
			}else{
				rateItems[i].style.display = 'none';
			}
		}
	}
}