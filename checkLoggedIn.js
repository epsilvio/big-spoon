var mainApp = {};

(function(){
    var firebase = app_fireBase;
    var uid = null;
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
          // User is signed in.
          uid = user.id;
          window.location.replace("home.php");
        }else{
          uid = null;
        }
    }); 
})()