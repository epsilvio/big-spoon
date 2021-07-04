var cookie;
var repBtn;
var postBtn;
var accBtn;
var logoutBtn;
var editAccBtn;
var reportPill;
var postPill;
var accPill;
var res;
var emptyRep;
var emptyPost;
var emptyAcc;
var cUname;
var cPwd;
var cpBtn;
var cookies= new Array();
var repSave = new Array();
var postDel = new Array();
var accBan = new Array();
window.onload = function(){
	checkCookie();
	if(document.cookie == "null" || document.cookie == ""){
		window.location.replace("admin.php");
	}	repBtn = document.getElementById("reportBtn");
	postBtn = document.getElementById("postBtn");
	accBtn = document.getElementById("accountBtn");
	saveBtn = document.getElementById("saveChange");
	logoutBtn = document.getElementById("logoutBtn");
	reportPill = document.getElementById("reportPill");
	postPill = document.getElementById("postPill");
	accPill = document.getElementById("accPill");
	emptyRep = document.getElementById("emptyRep");
	emptyPost = document.getElementById("emptyPost");
	emptyAcc = document.getElementById("emptyAcc");
	emptyRep.style.display = 'none';
	emptyPost.style.display = 'none';
	emptyAcc.style.display = 'none';
	cpBtn = document.getElementById("cpBtn");
	cUname = document.getElementById("username");
	cPwd = document.getElementById("password");
	cUname.value = document.cookie.substr(5);
	cUname.disabled = true;
	let saveCP = document.getElementById("cpSave");

	repBtn.onclick = function(){
		$('#reportModal').modal('show');
		getPills();
		showReports();
	}
	postBtn.onclick = function(){
		$('#postModal').modal('show');
		getPills();
		showPosts();
	}
	accBtn.onclick = function(){
		$('#accountModal').modal('show');
		getPills();
		showAccounts();
	}
	var saveBtn = document.getElementsByClassName("btn btn-primary");
        for(var i = 0; i < saveBtn.length; i++) {
            var save = saveBtn[i];
            save.onclick = function() {
                alert("Changes Saved");
		window.location.replace("admin_dash.php");
            }
        }
	cpBtn.onclick = function(){
		$('#cpModal').modal('show');
	}
	logoutBtn.onclick = function(){
		document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
		window.location.replace("admin.php");
	}
	$('#reportModal').on('hidden.bs.modal', function (e) {
		getPills();
  		repBtn.className = "list-group-item list-group-item-action";
		$("#reportContent").html("");
	})
	$('#postModal').on('hidden.bs.modal', function (e) {
		getPills();
  		postBtn.className = "list-group-item list-group-item-action";
		$("#postContent").html("");
	})
	$('#cpModal').on('hidden.bs.modal', function (e) {
		document.getElementById("password").value = "";
		document.getElementById("nPass1").value = "";
		document.getElementById("nPass2").value = "";
	})
	$('#accountModal').on('hidden.bs.modal', function (e) {
		getPills();
  		accBtn.className = "list-group-item list-group-item-action";
		$("#accContent").html("");
	})
	getPills();
	saveCP.onclick = function(){
		let uname = document.getElementById("username").value;
		let pwd = document.getElementById("password").value;
		let np1 = document.getElementById("nPass1").value;
		let np2 = document.getElementById("nPass2").value;
		if(np1 == np2 && (!(np1 == pwd))){
			changePass(uname, pwd, np1, np2);
		}else{
			alert("New password fields should be the same and should not be equal to the old password!");
		}
	}
}
function getPills(){
	var user = document.cookie.substr(5);
	$.ajax({
		url: "get_pill.php",
		method: "get",
		data: {admin: user},
		success: function(data){
			res = JSON.parse(data);
			reportPill.innerHTML = res["reports"].reportCt;
			postPill.innerHTML = res["posts"].postCt;
			accPill.innerHTML = res["accounts"].accCt;
			if(res["reports"].reportCt == 0){
				emptyRep.style.display = 'block';	
			}else{
				emptyRep.style.display = 'none';
			}
			if(res["posts"].postCt == 0){
				emptyPost.style.display = 'block';
			}else{
				emptyPost.style.display = 'none';
			}
			if(res["accounts"].accCt == 0){
				emptyAcc.style.display = 'block';	
			}else{
				emptyAcc.style.display = 'none';
			}
		}
	})
}
function changePass(uname, p1, p2, p3){
	if(confirm("This will change the password of admin: '"+uname+"'. Proceed?")){
		$.ajax({
			url: "admin_cp.php",
			method: "get",
			data: {user: uname, pass: p1, npass: p2},
			success: function(data){
				alert(data);
				window.location.reload();
			}
		})
	}else{
		window.location.reload();
	}
}
function showReports(){
	if((Object.keys(res["reports"]).length)-1 > 0){
		let container = document.getElementById("reportContent");
		for(let a = 0; a < (Object.keys(res["reports"]).length)-1; a++){
			let item = document.createElement("LI");
			let solveBtn = document.createElement("A");
			item.className = "list-group-item";
			item.innerHTML = "Report ID: "+res["reports"][a].reportId
					+"<br>Type: "+res["reports"][a].reportType
					+"<br>Complaint: "+res["reports"][a].comment
					+"<br>Report From: "+res["reports"][a].reportFrom
					+"<br>Report To: "+res["reports"][a].reportTo;
			container.appendChild(item);
			solveBtn.href="#";
			solveBtn.innerHTML = "<br>Resolve Report";
			repSave[a] = solveBtn;
			item.appendChild(solveBtn);
		}
	}
	for(let a = 0; a < (Object.keys(res["reports"]).length)-1; a++){
		repSave[a].onclick = function(){
			solveRep(res["reports"][a].reportId);
		}
	}
}
function showAccounts(){
	if((Object.keys(res["accounts"]).length)-1 > 0){
		let container = document.getElementById("accContent");
		for(let a = 0; a < (Object.keys(res["accounts"]).length)-1; a++){
			let item = document.createElement("LI");
			let banBtn = document.createElement("A");
			item.className = "list-group-item";
			item.innerHTML = "UID: "+res["accounts"][a].uid
					+"<br>Name: "+res["accounts"][a].fname
					+" "+res["accounts"][a].lname
					+"<br>Contact #: "+res["accounts"][a].cnum;
			container.appendChild(item);
			banBtn.href="#";
			banBtn.innerHTML = "&emsp;Disable Account";
			item.appendChild(banBtn);
			accBan[a] = banBtn;
		}
	}
	for(let a = 0; a < (Object.keys(res["accounts"]).length)-1; a++){
		accBan[a].onclick = function(){
			banAcc(res["accounts"][a].uid);
		}
	}
}
function showPosts(){
	if((Object.keys(res["posts"]).length)-1 > 0){
		let container = document.getElementById("postContent");
		for(let a = 0; a < (Object.keys(res["posts"]).length)-1; a++){
			let item = document.createElement("LI");
			let pic = document.createElement("A");
			let delBtn = document.createElement("A");
			item.className = "list-group-item";
			item.innerHTML = "Post ID: "+res["posts"][a].postId
					+"<br>Name: "+res["posts"][a].foodName
					+"<br>Category: "+res["posts"][a].category
					+"<br>Description: "+res["posts"][a].description
					+"<br>Location: "+res["posts"][a].location
					+"<br>Timestamp: "+res["posts"][a].date_posted+" "+res["posts"][a].time_posted
					+"<br>Owner: "+res["posts"][a].owner_name
					+"<br>Food Pic: ";
			container.appendChild(item);
			pic.href = res["posts"][a].pic_link;
			pic.innerHTML = res["posts"][a].pic_link.replace("http://192.53.175.7/upload/","");
			item.appendChild(pic);
			delBtn.href="#";
			delBtn.innerHTML = "<br>Delete Post";
			item.appendChild(delBtn);
			postDel[a] = delBtn;
		}
	}
	for(let a = 0; a < (Object.keys(res["posts"]).length)-1; a++){
		postDel[a].onclick = function(){
			deletePost(res["posts"][a].owner, res["posts"][a].postId);
		}
	}
}
function checkCookie(){
	let user = document.cookie.substr(5);
	$.ajax({
		url: "get_cookies.php",
		method: "get",
		success: function(data){
			let temp = JSON.parse(data);
			for(let i = 0; i < Object.keys(temp).length; i++){
				cookies.push(temp[i].username);
			}
			if(cookies.includes(user)){
				console.log("Valid user");
			}else{
				alert("Invalid Credentials!");
				document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
				window.location.replace("admin.php");
			}
		}	
	})
}
function deletePost(owner, postId){
	if(confirm("Delete Post ID: "+postId+" of user ID: "+owner+"?")){
		$.ajax({
			url: "deletePost.php",
			method: "get",
			data:{uid: owner, post: postId},
			success: function(data){
				alert(data);
				window.location.reload();
			}
		})
	}else{
		window.location.reload();
	}
}
function solveRep(id){
	if(confirm("Changing status of Report ID: "+id+" to 'Resolved', are you sure?")){
		$.ajax({
			url: "solve_rep.php",
			method: "get",
			data: {rId: id},
			success: function(data){
				alert(data)
				window.location.reload();
			}
		})
	}else{
		window.location.reload();
	}
}
function banAcc(uid){
	if(confirm("Disable UserID: "+uid+" from Big Spoon Web App?")){
		$.ajax({
			url: "disable_acc.php",
			method: "get",
			data: {uid: uid},
			success: function(data){
				alert(data)
				window.location.reload();
			}
		})
	}else{
		window.location.reload();
	}
}
