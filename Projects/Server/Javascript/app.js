var loginForm,
    mainForm;

function test() {
    loginForm = document.createElement("section")
    loginForm.id = "loginForm";
    document.body.appendChild(loginForm);
    $("#loginForm").load('./Include/login.html');
}

test();