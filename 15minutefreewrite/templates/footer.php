
				<?php 
					if (!empty($_SESSION))
					{
						echo ("</br><a href='../public/logout.php'> Log Out </a>");
					}
					else if (basename($_SERVER["SCRIPT_FILENAME"], '.php') !== "login")
					{
						echo ("</br><a href='../public/login.php'> Log In </a>");
					}
				?>
			</br><a href="javascript:history.go(-1);">Back</a>
			</div>
            <div id="bottom">
                Copyright &#169; Fabien Ma, 2015
            </div>

        </div>

    </body>

</html>