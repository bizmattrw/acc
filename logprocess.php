<?php
session_unset();
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Authentification - CDMS</title>
    <style type="text/css">
        body {
            margin: auto;
            margin-top: 0px;
            margin-bottom: 20px;
            background-image: url("images/fond.png");
            background-color: #303030;
        }

        #window {
            background-color: #0F0923;
            height: 200px;
            width: 50%;
            color: #FFFFFF;
            margin-top: 0px;
            margin-left: 25%;
            -moz-border-radius: 0.5em 0.5em 0.5em 0.5em;
            border-radius: 0.5em 0.5em 0.5em 0.5em;
            box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 1px 1px;
        }
    </style>
</head>

<body bgcolor="#D9D6DA">
    <br />
    <br />
    <br />

    <body id="window">
        <br />
        <br />
        <br />
        <?php

        include("dbcon.php");
        $username = $_POST['username'];
        $password = $_POST['password'];
        	//$password = password_hash($password, PASSWORD_DEFAULT);
          //  $password = password_hash($password, PASSWORD_DEFAULT);
        $result = mysqli_query($con, "SELECT * FROM login where Binary username='$username'") or die(mysqli_error($con));

        $num_row = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
        //$category=$row['type'];
        $ogpwd = $row['password'];
        $username = $row['username'];
        $dbInstitutionID = $row["institution_id"];
        $test = password_verify($password,$ogpwd);
        var_dump($test);

        if( (password_verify($password,$ogpwd))) {

            
            header('location:dashboard.php');
            $_SESSION['coopid'] = $_SESSION["institution"] = $dbInstitutionID;
            $_SESSION['id'] = $_SESSION["user_id"] = $row["id"];
            $_SESSION['user'] = $row['names'];
        } else {
            echo "<center>";
            echo "<font color=red size=+2>Incorrect password! </font><br> wait 2 secondes to try again $password  $ogpwd";
        ?>
            <form name="redirect">
                <input type="text" size="1" name="redirect2" align="middle" border="0">
            </form>
            <script>
                //change below target URL to your own
                var targetURL = "index.php"
                //change the second to start counting down from
                var countdownfrom = 200

                var currentsecond = document.redirect.redirect2.value = countdownfrom + 1

                function countredirect() {
                    if (currentsecond != 0) {
                        currentsecond -= 1
                        document.redirect.redirect2.value = currentsecond
                    } else {
                        window.location = targetURL
                        return
                    }
                    setTimeout("countredirect()", 1000)
                }

                countredirect()
            </script>
            <br />
            <hr />
        <?php
            echo "</center>";
        }
        ?>
    </body>

</html>