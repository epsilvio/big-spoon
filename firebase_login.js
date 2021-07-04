var newAcc;
(function(){
    // Initialize the FirebaseUI Widget using Firebase
    var ui = new firebaseui.auth.AuthUI(firebase.auth());
    var uiConfig = {
    callbacks: {
      signInSuccessWithAuthResult: function(authResult, redirectUrl) {
        // User successfully signed in.
        // Return type determines whether we continue the redirect automatically
        // or whether we leave that to developer to handle.
        newAcc = authResult.additionalUserInfo.isNewUser;
        return false
      },
      //uiShown: function() {
        // The widget is rendered.
        // Hide the loader.
        //document.getElementById('loader').style.display = 'none';
      //}
    },
    // Will use popup for IDP Providers sign-in flow instead of the default, redirect.
    signInFlow: 'popup',
    //signInSuccessUrl: 'home.php',
    signInOptions: [
      // Leave the lines as is for the providers you want to offer your users.
      firebase.auth.GoogleAuthProvider.PROVIDER_ID

    ],
    // Terms of service url.
    tosUrl: 'eula.php',
    // Privacy policy url.
    privacyPolicyUrl: 'eula.php'
  };
    ui.start('#firebaseui-auth-container', uiConfig);
})();
firebase.auth().onAuthStateChanged( function(user) {
  if (user) {
    if(newAcc){
      window.location.replace("create_acc.php");
    }else{
      window.location.replace("home.php");
    }
  }
});
  