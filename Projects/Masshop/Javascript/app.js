firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        $(function() {
            $("#Main").load("./Include/main.php");
        })
    } else {
        $(function() {
            $("#Login").load("./Include/login.php");
        })
    }
})

function login() {
    var email = document.getElementById('email').value,
        password = document.getElementById('password').value;

    firebase.auth().setPersistence(firebase.auth.Auth.Persistence.LOCAL).then(function() {
        firebase.auth().signInWithEmailAndPassword(email, password)
            .then((user) => {
                window.location.reload(true);
            })
            .catch((error) => {
                window.alert("Erreur :\n" + error.code + "\n" + error.message);
            })
    })
}

function register() {
    var email = document.getElementById('email').value,
        password = document.getElementById('password').value;

    firebase.auth().createUserWithEmailAndPassword(email, password)
        .then((user) => {
            login()
        })
        .catch((error) => {
            window.alert("Erreur :\n" + error.code + "\n" + error.message);
        })
}

function logout() {
    firebase.auth().signOut().then(function() {
        window.location.reload(true);
    })
}


var active = 'log';

function PanelSwitch() {
    var log = document.getElementById('log'),
        reg = document.getElementById('reg'),
        pSwitch = document.getElementById('pSwitch');

    if (active == 'log') {
        log.style.display = 'none';
        reg.style.display = 'block';
        pSwitch.textContent = 'Login';
        active = 'reg';
    } else if (active == 'reg') {
        log.style.display = 'block';
        reg.style.display = 'none';
        pSwitch.textContent = 'Register';
        active = 'log';
    }
}