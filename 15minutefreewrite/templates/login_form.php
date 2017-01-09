<div class="sitetext">
    <form action="login.php" method="post">

        <fieldset>
            <div>
                <input autofocus name="username" placeholder="Username or Email" type="text"/>
            </div>
            <div>
                <input name="password" placeholder="Password" type="password"/>
            </div>
            <div>
                <button type="submit">Log In</button>
            </div>
        </fieldset>
    
    </form>
    <div>
        <a href="register.php">Register</a> for an account or </br>
        <a href="nunya.biz" onClick="openURL(); return false;">continue </a> as a Guest
    </div>

<script>
        function openURL(){
            window.location.href="../public/freewrite.php";
        }
</script> 