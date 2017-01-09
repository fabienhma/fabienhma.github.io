<?php
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via URL bar)
    if (($_SERVER["REQUEST_METHOD"] == "GET") && (empty($_SESSION["id"])))
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }
    // should not be accessible if you're logged in
    else if (!empty($_SESSION["id"]))
    {
        apologize("Make sure you log out first!");
    }
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check that username has been inputted
        if (empty($_POST["username"]))
        {
            apologize("Username Error: Please enter a username!");
        }
        // check that email has been inputted and is of valid form
        if (empty($_POST["email"]) || strpos($_POST["email"],'@') === FALSE || strpos($_POST["email"],'.') === FALSE)
        {
            apologize("Email Error: Please enter a valid email address!");
        }
        // check that password exists
        else if (empty($_POST["password"]))
        {
            apologize("Password Error: Please enter a password!");
        }
        // passwords mismatch
        else if ($_POST["confirmation"] != $_POST["password"])
        {
            apologize("Confirmation Error: Please make sure passwords match!");
        }
        // we can register... maybe
        else
        {
            $options = [
                'cost' => 11,
            ];
            $hash = password_hash($_POST["password"], PASSWORD_BCRYPT, $options);
            $result = query("INSERT INTO users (username, hash, email) VALUES(?, ?, ?)", htmlspecialchars($_POST["username"]), $hash, htmlspecialchars($_POST["email"]));
            if ($result !== FALSE)
            {
                $rows = query("SELECT LAST_INSERT_ID() AS id");
                $id = $rows[0]["id"];
                render("login_form.php");
            }
            else
            {
                apologize("Registration failed.  Username already exists");
            }
        }
    }
?>