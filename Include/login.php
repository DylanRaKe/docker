<section class="panel center" id="loginsystem">
    <p id="logo" role="img"></p>
    <div class="form">
        <input type="email" placeholder="Email" id="email"><br>
        <input style="margin-bottom: 2em;" type="password" placeholder="Password" id="password"><br>
        <button onclick="login();">Connect</button><br>
        <div class="other">
            <button onclick="loginTwitter();">Twitter</button>
            <button onclick="loginGoogle();">Google</button>
        </div>
    </div>
    <h2>You can create an account by<br><a onclick="pSwitch('register')">Clicking here</a></h2><br>
    <a href="portfolio.php"><button class="pfbutton">Portfolio</button></a>
</section>

<section style="display: none;" class="panel" id="registersystem">
    <p id="logo" role="img"></p>
    <div class="form">
        <input type="email" placeholder="Email" id="r_email"><br>
        <input style="margin-bottom: 2em;" type="password" placeholder="Password" id="r_password"><br>
        <button onclick="register();">Register new account</button><br>
    </div>
    <h2>You can login to an account by<br><a onclick="pSwitch('login')">Clicking here</a></h2><br>
    <a href="portfolio.php"><button class="pfbutton">Portfolio</button></a>
</section>