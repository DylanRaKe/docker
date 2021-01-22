var provider = new firebase.auth.TwitterAuthProvider();
var providerG = new firebase.auth.GoogleAuthProvider();

function register() {
    var email = document.getElementById('r_email').value,
        password = document.getElementById('r_password').value;

    if (window.confirm("Êtes vous sur de vouloir créer un compte ?")) {
        firebase.auth().createUserWithEmailAndPassword(email, password)
            .then((user) => {
                loginin(email, password);
            })
            .catch((error) => {
                var errorCode = error.code;
                var errorMessage = error.message;

                window.alert("Erreur " + errorCode + " | " + errorMessage);
            });
    }
}

function login() {
    var email = document.getElementById('email').value,
        password = document.getElementById('password').value;

    loginin(email, password);
}

function loginTwitter() {
    firebase.auth().signInWithPopup(provider).then(function(result) {
        // This gives you a the Twitter OAuth 1.0 Access Token and Secret.
        // You can use these server side with your app's credentials to access the Twitter API.
        var token = result.credential.accessToken;
        var secret = result.credential.secret;
        // The signed-in user info.
        var user = result.user;
        firebase.auth().setPersistence(firebase.auth.Auth.Persistence.LOCAL)
        window.location.reload(true);
    }).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // The email of the user's account used.
        var email = error.email;
        // The firebase.auth.AuthCredential type that was used.
        var credential = error.credential;
        window.alert(errorCode + errorMessage + credential);
    });
}

function loginGoogle() {
    firebase.auth().signInWithPopup(providerG).then(function(result) {
        // This gives you a the Twitter OAuth 1.0 Access Token and Secret.
        // You can use these server side with your app's credentials to access the Twitter API.
        var token = result.credential.accessToken;
        var secret = result.credential.secret;
        // The signed-in user info.
        var user = result.user;
        firebase.auth().setPersistence(firebase.auth.Auth.Persistence.LOCAL)
        window.location.reload(true);
    }).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // The email of the user's account used.
        var email = error.email;
        // The firebase.auth.AuthCredential type that was used.
        var credential = error.credential;
        window.alert(errorCode + errorMessage + credential);
    });
}

function loginin(email, password) {

    firebase.auth().setPersistence(firebase.auth.Auth.Persistence.LOCAL)
        .then(function() {
            firebase.auth().signInWithEmailAndPassword(email, password)
                .then((user) => {
                    window.location.reload(true);
                })
                .catch((error) => {
                    var errorCode = error.code;
                    var errorMessage = error.message;

                    window.alert("Erreur " + errorCode + " | " + errorMessage);
                });
        })
        .catch(function(error) {
            var errorCode = error.code;
            var errorMessage = error.message;
        });
}

function logout() {
    firebase.auth().signOut().then(function() {
        window.location.reload(true);
    }, function(error) {

    });
}

firebase.auth().onAuthStateChanged(function(user) {
    if (user)
        $("#main").load('../Include/main.php');
    else {
        $("#login").load('../Include/login.php');
    }
});

function pSwitch(i) {
    var registerPanel = document.getElementById('registersystem'),
        loginpanel = document.getElementById('loginsystem'),
        mainPanel = document.getElementById('main');

    if (i == 'login') {
        loginpanel.style.display = 'block';
        registerPanel.style.display = 'none';
    } else if (i == 'register') {
        loginpanel.style.display = 'none';
        registerPanel.style.display = 'block';
    }
}