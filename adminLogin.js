var uname;
var pwd;
var login;
var err;
var cookie;
var res;
window.onload = function(){
	if(!(document.cookie == "null" || document.cookie == "")){
		window.location.replace("admin_dash.php");
	}
	login = document.getElementById("loginBtn");
	err = document.getElementById("err");
	err.style.display = 'none';
	login.onclick = function (){
		uname = document.getElementById("username").value;
		pwd = document.getElementById("password").value;
		checkCredential(uname, pwd);
	}
}
function checkCredential(uname, pwd){
	$.ajax({
		url: "admin_login.php",
		method: "get",
		async: true,
		data: {user: uname, pass: pwd},
		success: function(data){
			if(!(data == 0)){
				res = JSON.parse(data);
				err.style.display = 'none';
				document.cookie = "user="+uname;
				window.location.replace("admin_dash.php");
			}else{
				err.style.display = 'block';
			}
		}
	})
}