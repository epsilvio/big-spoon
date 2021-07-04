var titleId = ["foodName1", "foodName2", "foodName3", "foodName4", "foodName5", "foodName6"];
var descId = ["description1", "description2", "description3", "description4", "description5", "description6"];
var catId = ["category1", "category2", "category3", "category4", "category5", "category6"];
var ownerId = ["postOwner1", "postOwner2", "postOwner3", "postOwner4", "postOwner5", "postOwner6"];
var ptimeId = ["post1", "post2", "post3", "post4", "post5", "post6"];
var locId = ["location1", "location2", "location3", "location4", "location5", "location6"];
var picsId = ["foodPic1", "foodPic2", "foodPic3", "foodPic4", "foodPic5", "foodPic6"];
var titles = new Array();
var descs = new Array();
var cats = new Array();
var owners = new Array();
var ownIds = new Array();
var posIds = new Array();
var ptimes = new Array();
var pics = new Array();
var locs = new Array();
var reqBtn = new Array();
var items = ["food1", "food2", "food3", "food4", "food5", "food6"];
var currPg = 1;
var totPg;
var startIndex;
var timeF;
var ownerUid = ["ownerId1","ownerId2","ownerId3","ownerId4","ownerId5","ownerId6"];
var postId = ["postId1", "postId2", "postId3", "postId4", "postId5", "postId6"];
var reqbId = ["reqBtn1", "reqBtn2", "reqBtn3", "reqBtn4", "reqBtn5", "reqBtn6"];
var searchField = document.getElementById("searchField");
var searchKey;
var noPost;
function loadPosts(mode, user){
	var currentdate = new Date(); 
	var currTime = "Updated as of: " + (currentdate.getMonth()+1) + "/"
                + currentdate.getDate() + "/" 
                + currentdate.getFullYear() + " @ "  
                + ('0'+currentdate.getHours()).slice(-2) + ":"  
                + ('0'+currentdate.getMinutes()).slice(-2) + ":" 
                + ('0'+currentdate.getSeconds()).slice(-2);
	var stat = "Available";
	var result;
	var jsonSize;
	searchKey = searchField.value;
	timeF = document.getElementById("upTime");
	var nxtBtn = document.getElementById("nxtBtn");
	var prevBtn = document.getElementById("prevBtn");
	noPost = document.getElementById("noPost");
	noPost.style.display = 'none';
	for (var a = 0; a < 6; a++){
		titles[a] = document.getElementById(titleId[a]);
		descs[a] = document.getElementById(descId[a]);
		cats[a] = document.getElementById(catId[a]);
		ptimes[a] = document.getElementById(ptimeId[a]);
		locs[a] = document.getElementById(locId[a]);
		owners[a] = document.getElementById(ownerId[a]);
		ownIds[a] = document.getElementById(ownerUid[a]);
		posIds[a] = document.getElementById(postId[a]);
		reqBtn[a] = document.getElementById(reqbId[a]);
		pics[a] = document.getElementById(picsId[a]);
	}
	var status = '"'+stat+'"';
	if(mode = 0){
		function getPosts(status){
			$.ajax({
				url: "get_posts.php",
				type: "get",
				async: true,
				data:{status: status},
				success: function(data){
					result = JSON.parse(data);
					jsonSize = Object.keys(result).length;
					if(!(jsonSize%6 == 0)){
						totPg = Math.floor((jsonSize/6)+1);
					}else{
						totPg = jsonSize/6;
					}
				}
			});
		}
		getPosts(status);
	}else if(mode = 1){
		function searchFood(keyword){
			$.ajax({
				url: "search_food.php",
				type: "get",
				async: true,
				data:{kword: keyword},
				success: function(data){
					result = JSON.parse(data);
					jsonSize = Object.keys(result).length;
					if(!(jsonSize%6 == 0)){
						totPg = Math.floor((jsonSize/6)+1);
					}else{
						totPg = jsonSize/6;
					}
				}
			});
		}
		searchFood(searchKey);
	}
	setTimeout(function (){
		timeF.innerHTML = currTime;
		if(jsonSize == 0){
			noPost.style.display = 'block';
			prevBtn.style.pointerEvents = 'none';
			nxtBtn.style.pointerEvents = 'none';
			prevBtn.style.display = 'none';
			nxtBtn.style.display = 'none';
		}
		startIndex = (currPg-1)*6;
		console.log("Displaying items starting from index "+startIndex);
		for(i = 0; i < 6; i++){
			var count = startIndex+i;
			if(count < jsonSize){
				pics[i].src = result[count].pic_link;
				titles[i].innerHTML = result[count].foodName;
				descs[i].innerHTML = result[count].description;
				cats[i].innerHTML = "  "+result[count].category;
				ptimes[i].innerHTML = "  "+result[count].time_posted;
				locs[i].innerHTML = "  "+result[count].location;
				owners[i].innerHTML = "Posted by: "+result[count].owner_name;
				owners[i].href = "view_profile.php?id="+result[count].owner;
				ownIds[i].innerHTML = result[count].owner;
				posIds[i].innerHTML = result[count].postId;
				document.getElementById(items[i]).style.display = 'block';
			}else{
				for(a = i; a < 6; a++){
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
			console.log("You've pressed next!");
			startIndex = (currPg-1)*6;
			console.log("Displaying items starting from index "+startIndex);
			for(i = 0; i < 6; i++){
				var count = startIndex+i;
				if(count < jsonSize){
					if(i < 6){
						pics[i].src = result[startIndex+i].pic_link;
						document.getElementById(titleId[i]).innerHTML = result[startIndex+i].foodName;
						document.getElementById(descId[i]).innerHTML = result[startIndex+i].description;
						cats[i].innerHTML = " "+result[count].category;
						ptimes[i].innerHTML = " "+result[count].time_posted;
						locs[i].innerHTML = " "+result[count].location;
						owners[i].innerHTML = "Posted by: "+result[count].owner_name;
						owners[i].href = "view_profile.php?id="+result[count].owner;
						ownIds[i].innerHTML = result[count].owner;
						posIds[i].innerHTML = result[count].postId;
						document.getElementById(items[i]).style.display = 'block';
					}
				}else{
					for(a = i; a < 6; a++){
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
			for(a = i; a < 6; a++){
						document.getElementById(items[a]).style.display = 'block';
			}
			currPg--;
			console.log("You've gone back!");
			startIndex = (currPg-1)*6;
			console.log("Displaying items starting from index "+startIndex);
			for(i = 0; i < 6; i++){
				var count = startIndex+i;
				if(count < jsonSize){
					pics[i].src = result[count].pic_link;
					titles[i].innerHTML = result[count].foodName;
					descs[i].innerHTML = result[count].description;
					cats[i].innerHTML = " "+result[count].category;
					ptimes[i].innerHTML = " "+result[count].time_posted;
					locs[i].innerHTML = " "+result[count].location;
					owners[i].innerHTML = "Posted by: "+result[count].owner_name;
					owners[i].href = "view_profile.php?id="+result[count].owner;
					ownIds[i].innerHTML = result[count].owner;
					posIds[i].innerHTML = result[count].postId;
					document.getElementById(items[i]).style.display = 'block';
				}else{
					for(a = i; a < 6; a++){
						document.getElementById(items[a]).style.display = 'none';
					}
					break;
				}
			
			}
		}
	})
	reqBtn[0].onclick = (function(){
		reqPost1(ownIds[0].innerHTML, posIds[0].innerHTML);
	})
	reqBtn[1].onclick = (function(){
		reqPost2(ownIds[1].innerHTML, posIds[1].innerHTML);
	})
	reqBtn[2].onclick = (function(){
		reqPost3(ownIds[2].innerHTML, posIds[2].innerHTML);
	})
	reqBtn[3].onclick = (function(){
		reqPost4(ownIds[3].innerHTML, posIds[3].innerHTML);
	})
	reqBtn[4].onclick = (function(){
		reqPost5(ownIds[4].innerHTML, posIds[4].innerHTML);
	})
	reqBtn[5].onclick = (function(){
		reqPost6(ownIds[5].innerHTML, posIds[5].innerHTML);
	})
}


