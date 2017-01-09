<div class="sitetext">
<form action="register.php" method="post">
    <fieldset>
        <div>
            <input autofocus name="username" placeholder="Username" type="text"/>
        </div>
        <div>
            <input name="email" placeholder="Email" type="text"/>
        </div>
        <div>
            <input name="password" placeholder="Password" type="password"/>
        </div>
        <div>
            <input name="confirmation" placeholder="Confirmation" type="password"/>
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </fieldset>
</form>
<div>
    <a href="login.php">Log in</a> or </br>
    <a href="nunya.biz" onClick="openURL(); return false;">Continue </a> as a guest

</div>
<script>
        function openURL()
        {
            window.location.href="../public/freewrite.php";
        }
</script> 