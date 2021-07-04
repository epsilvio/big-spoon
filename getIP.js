window.onload = (function(){
	let apiKey = '7321f8e013804ce5bb63a7d42aa38150';
	$.getJSON('https://ipgeolocation.abstractapi.com/v1/?api_key=' + apiKey, function(data) {
 		console.log(JSON.stringify(data, null, 2));
	});
})