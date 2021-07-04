var userID;
var name;
var cnum;
var rating;
var profPic;
var picF;
var nameF;
var cnumF;
var uidF;
var rateF;
var logoutBtn;
var picsId= ["foodPic1", "foodPic2", "foodPic3"];
var titleId = ["foodName1", "foodName2", "foodName3"];
var descId = ["description1", "description2", "description3"];
var catId = ["category1", "category2", "category3"];
var ownerId = ["postOwner1", "postOwner2", "postOwner3"];
var ptimeId = ["post1", "post2", "post3"];
var locId = ["location1", "location2", "location3"];
var delId = ["delBtn1", "delBtn2", "delBtn3"];
var joinDate;
var titles = new Array();
var descs = new Array();
var cats = new Array();
var owners = new Array();
var posIds = new Array();
var ptimes = new Array();
var locs = new Array();
var pics = new Array();
var delBtns = new Array();
var items = ["food1", "food2", "food3"];
var currPg = 1;
var totPg;
var startIndex;
var postId = ["postId1", "postId2", "postId3"];
var emptyText;
var delBtn;
var temp_selected;
var starId = ["stars1", "stars2", "stars3"];
var commId = ["comment1", "comment2", "comment3"];
var fromId = ["rateFrom1", "rateFrom2", "rateFrom3"];
var dateId = ["rateDate1", "rateDate2", "rateDate3"];
var itemId = ["rate1", "rate2", "rate3", "nxtBtn2", "prevBtn2"];
var stars = new Array();
var comments = new Array();
var froms = new Array();
var dates = new Array();
var rateItems = new Array();
var emptyRev;
var ratings;
var rateSize;
var ratePg;
var rateIndex;
var currRate;
window.onload = (function(){
	var firebase = app_fireBase;
	var result;
	ratePg = 1;
	rateIndex = 0;
	currRate = 1;
	picF = document.getElementById("defPic");
	nameF = document.getElementById("name");
	cnumF = document.getElementById("cnum");
	uidF = document.getElementById("uid");
	rateF = document.getElementById("rating");
	logoutBtn = document.getElementById("logoutBtn");
	emptyText = document.getElementById("emptyPost");
	delBtn = document.getElementById("deleteBtn");
	joinDate = document.getElementById("joinDate");
	var jDate;
	emptyRev = document.getElementById("emptyReview");
	emptyRev.style.display = 'none';
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
			userID = user.uid;
			profPic = user.photoURL;
			profPic = profPic.replace('s96-c', 's480-c', true);
			jDate = user.metadata.creationTime;
			jDate = jDate.substr(0,17);
			$.ajax({
				url: "get_rating.php",
				method: "get",
				data: {id: userID},
				success: function(data){
					try{
						ratings = JSON.parse(data);
						rateSize = Object.keys(ratings).length;
						if(!(rateSize%3 == 0)){
							ratePg = Math.floor((rateSize/3)+1);
						}else{
							ratePg = rateSize/3;
						}
						showRatings(rateIndex);
					}catch(e){
						emptyRev.style.display = 'block';
						for(var a=0; a<5; a++){
							rateItems[a].style.display = 'none';
						}
					}
					getDetails();
				}
			})
			function getDetails(){
				$.ajax({
					url: "getMyProfile.php",
					type: "get",
					async: true,
					data:{uid: userID},
					success: function(data){
						result = JSON.parse(data);
					}
				});
			}
			setTimeout(function(){
				name = result.fname+" "+result.lname;
				cnum = result.cnum;
				rating = result.user_rating;
				picF.src = result.photo_url;
				nameF.innerHTML = name;
				cnumF.innerHTML = cnum;
				uidF.innerHTML = user.uid;
				rateF.innerHTML = rating+"/5.0";
				joinDate.innerHTML = jDate;
				loadPosts(userID);			
			},1000)
		}else{
			logOutBtn();
		}
	})
	logoutBtn.onclick = (function(){
		logOutBtn();
	})
	rateItems[3].onclick = function(){
		if(currRate == ratePg){
			alert("This is the last page!");
		}else{
			currRate++;
			rateIndex+=3;
			showRatings(rateIndex);
		}
	}
	rateItems[4].onclick = function(){
		if(currRate == 1){
			alert("This is the last page!");
		}else{
			currRate--;
			rateIndex-=3;
			showRatings(rateIndex);
		}
	}
});
function loadPosts(user){
	var stat = "Available";
	var result;
	var jsonSize;
	var nxtBtn = document.getElementById("nxtBtn");
	var prevBtn = document.getElementById("prevBtn");
	for (var a = 0; a < 3; a++){
		titles[a] = document.getElementById(titleId[a]);
		descs[a] = document.getElementById(descId[a]);
		cats[a] = document.getElementById(catId[a]);
		ptimes[a] = document.getElementById(ptimeId[a]);
		locs[a] = document.getElementById(locId[a]);
		owners[a] = document.getElementById(ownerId[a]);
		posIds[a] = document.getElementById(postId[a]);
		delBtns[a] = document.getElementById(delId[a]);
		pics[a] = document.getElementById(picsId[a]);
	}
	var status = '"'+stat+'"';
	function getPosts(status){
		$.ajax({
			url: "getMyPosts.php",
			type: "get",
			async: true,
			data:{status: status, uid: user},
			success: function(data){
				result = JSON.parse(data);
				jsonSize = Object.keys(result).length;
				if(!(jsonSize%3 == 0)){
					totPg = Math.floor((jsonSize/3)+1);
				}else{
					totPg = jsonSize/3;
				}				
			}
		});
	}
	getPosts(status);
	setTimeout(function (){
		if(jsonSize == 0){
			emptyText.style.display = 'block';
			prevBtn.style.pointerEvents = 'none';
			nxtBtn.style.pointerEvents = 'none';
		}
		startIndex = (currPg-1)*3;
		for(i = 0; i < 3; i++){
			var count = startIndex+i;
			if(count < jsonSize){
				pics[i].src = result[count].pic_link;
				titles[i].innerHTML = result[count].foodName;
				descs[i].innerHTML = result[count].description;
				cats[i].innerHTML = "  "+result[count].category;
				ptimes[i].innerHTML = "  "+result[count].time_posted;
				locs[i].innerHTML = "  "+result[count].location;
				owners[i].innerHTML = "Posted by: "+result[count].owner_name;
				posIds[i].innerHTML = result[count].postId;
				document.getElementById(items[i]).style.display = 'block';
			}else{
				for(a = i; a < 3; a++){
					document.getElementById(items[a]).style.display = 'none';
				}
				break;
			}
			
		}
	},1000)
	nxtBtn.onclick = (function(){
		if(currPg == totPg){
			alert("Oops! This is the last page");
			
		}else{
			currPg++;
			startIndex = (currPg-1)*3;
			console.log("Displaying items starting from index "+startIndex);
			for(i = 0; i < 3; i++){
				var count = startIndex+i;
				if(count < jsonSize){
					if(i < 3){
						pics[i].src = result[startIndex+i].pic_link;
						document.getElementById(titleId[i]).innerHTML = result[startIndex+i].foodName;
						document.getElementById(descId[i]).innerHTML = result[startIndex+i].description;
						cats[i].innerHTML = " "+result[count].category;
						ptimes[i].innerHTML = " "+result[count].time_posted;
						locs[i].innerHTML = " "+result[count].location;
						owners[i].innerHTML = "Posted by: "+result[count].owner_name;
						posIds[i].innerHTML = result[count].postId;
						document.getElementById(items[i]).style.display = 'block';
					}
				}else{
					for(a = i; a < 3; a++){
						document.getElementById(items[a]).style.display = 'none';
					}
					break;
				}
			
			}
		}
	})
	prevBtn.onclick = (function(){
		if(currPg == 1){
			alert("Oops! This is already the first page");
		}else{
			for(a = i; a < 3; a++){
						document.getElementById(items[a]).style.display = 'block';
			}
			currPg--;
			console.log("You've gone back!");
			startIndex = (currPg-1)*3;
			console.log("Displaying items starting from index "+startIndex);
			for(i = 0; i < 3; i++){
				var count = startIndex+i;
				if(count < jsonSize){
					pics[i].src = result[count].pic_link;
					titles[i].innerHTML = result[count].foodName;
					descs[i].innerHTML = result[count].description;
					cats[i].innerHTML = " "+result[count].category;
					ptimes[i].innerHTML = " "+result[count].time_posted;
					locs[i].innerHTML = " "+result[count].location;
					owners[i].innerHTML = "Posted by: "+result[count].owner_name;
					posIds[i].innerHTML = result[count].postId;
					document.getElementById(items[i]).style.display = 'block';
				}else{
					for(a = i; a < 3; a++){
						document.getElementById(items[a]).style.display = 'none';
					}
					break;
				}
			
			}
		}
	})
	delBtns[0].onclick = function(){
		$('#deleteModal').modal('show');
		temp_selected  = posIds[0].innerHTML;		
	}
	delBtns[1].onclick = function(){
		$('#deleteModal').modal('show');
		temp_selected  = posIds[1].innerHTML;
	}
	delBtns[2].onclick = function(){
		$('#deleteModal').modal('show');
		temp_selected  = posIds[2].innerHTML;
	}
	delBtn.onclick = function(){
		deletePost(userID, temp_selected);
	}
}
function deletePost(user, postId){
	var response;
	function delDetails(){
	$.ajax({
			url: "deletePost.php",
			type: "get",
			async: true,
			data:{uid: userID, post: postId},
			success: function(data){
				response = JSON.parse(data);
				alert(response);
				window.location.reload();
			}
		});
	}
	delDetails();
}
function showRatings(rateIndex){
	var starSign;
	var emptyStar;
	$("#stars1").empty();
	$("#stars2").empty();
	$("#stars3").empty();
	if(rateSize == 0){
		emptyRev.style.display = 'block';
		for(var a=0; a<5; a++){
			rateItems[a].style.display = 'none';
		}
	}else{
		for(var i=0; i<3; i++){
			if((rateIndex+i) < rateSize){
				for(var x = 0; x < 5; x++){
					if(x < parseInt(ratings[rateIndex+i].stars)){
						starSign = document.createElement("I");
						starSign.className = "fas fa-star";
						stars[i].appendChild(starSign);
					}else{
						emptyStar = document.createElement("I");
						emptyStar.className = "far fa-star";
						stars[i].appendChild(emptyStar);
					}	
				}
				comments[i].innerHTML = ratings[rateIndex+i].comment;
				froms[i].innerHTML = ratings[rateIndex+i].fromName;
				froms[i].href = "view_profile.php?id="+ratings[rateIndex+i].ratingFrom;
				dates[i].innerHTML = ratings[rateIndex+i].timestamp;
				rateItems[i].style.display = 'block';
			}else{
				rateItems[i].style.display = 'none';
			}
		}
	}
}