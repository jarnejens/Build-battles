<?php
//connect to database and start session src/hidden/config/config.php
require_once "src/hidden/config/config.php";
//connect to databse
$link = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
//check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//start session
session_start();
//get theme_name, theme and last_used from tabel 'themes'
$sql = "SELECT theme_name, theme, last_used FROM themes";
$result = mysqli_query($link, $sql);
//check if there are any results
if (mysqli_num_rows($result) > 0) {
    //output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //get theme_name, theme and last_used from tabel 'themes'
        $theme_name = $row["theme_name"];
        $theme = $row["theme"];
        $last_used = $row["last_used"];
        //echo theme_name, theme and last_used
        echo "$theme_name:<br> $theme <br> $last_used<br><br>";
    }
} else {
    echo "0 results";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The buildbattle community</title>
    <link rel="shortcut icon" href="src/public/img/favicon/server-icon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="src/public/img/favicon/server-icon.png">
    <meta name="description" content="We're stiving to become the number 1 builders and buildbattle community! If you're interested in participating, consider joining our discord server!">
    <meta name="keywords" content="buildbattle, buildbattles, build, battles, minecraft, minecraft buildbattle, minecraft buildbattles, minecraft build, minecraft battles, minecraft buildbattles, minecraft buildbattle, minecraft buildbattle theme, minecraft buildbattles theme, minecraft build theme, minecraft battles theme, minecraft buildbattles theme, minecraft buildbattle theme, minecraft buildbattle theme, minecraft buildbattles theme, minecraft build theme, minecraft battles theme, minecraft buildbattles theme, minecraft buildbattle theme, buildbattle theme, buildbattles theme, build theme, battles theme, buildbattles theme, buildbattle theme, buildbattle theme, buildbattles theme, build theme, battles theme, buildbattles theme, buildbattle theme">
    <meta name="author" content="Duckstyle">
    <link rel="stylesheet" href="src/hidden/css/fonts.css">
    <link rel="stylesheet" href="src/public/css/style.css">
</head>
<body>
    <header>
        <section id="slideshow">
            <nav>
                <div class="nav__sign"><a href="builders.html">Who are we?</a></div>
                <div class="nav__sign"><a href="#">Previous<br>winners</a></div>
            </nav>
            <div id="themeSign" href="#buildThemeScroll">
                <section>
                    <h3 id="themeSign__title">Current Theme:</h3>
                    <p class="themeSign__description" id="longText">Castle in style/<br>shape of any mob</p>
                    <p class="themeSign__description" id="smallText">Click here!</p>
                </section>
            </div>
            <div id="buildbattle__title">
                <h1>buildbattles</h1>
                <a class="discord__sign" target=”_blank” href="https://discord.gg/QpT383Ygq9">
                    <img src="src/public/img/discord_sign.webp" alt="link to the community discord">
                </a>
            </div>
        </section>
    </header>
    <main>
        <section id="cave">
                <div id="buildThemeScroll">
                    <h2 class="buildbattle-title">Build Theme</h2>
                    <p >
                        <?php
                            //check if there is a theme used within the last month
                            if ($last_used > date("Y-m-d", strtotime("-1 month"))) {
                                //if there is a theme used within the last month, echo the theme
                                echo $theme;
                            } else {
                                //if there is no theme used within the last month, get random theme from database which hasn't been used in 3 months
                                $sql = "SELECT theme_name, theme, last_used FROM themes WHERE last_used < date_sub(now(), interval 3 month) ORDER BY RAND() LIMIT 1";
                                $result = mysqli_query($link, $sql);
                                //check if there are any results
                                if (mysqli_num_rows($result) > 0) {
                                    //output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                        //get theme_name, theme and last_used from tabel 'themes'
                                        $theme_name = $row["theme_name"];
                                        $theme = $row["theme"];
                                        $last_used = $row["last_used"];
                                        //echo theme_name, theme and last_used
                                        echo $theme;
                                        //update last_used in database to the first day of the currect month 12:00:00
                                        $sql = "UPDATE themes SET last_used = DATE_FORMAT(NOW() ,'%Y-%m-01 12:00:00') WHERE theme_name = '$theme_name'";
                                        $result = mysqli_query($link, $sql);
                                    }
                                } else {
                                    echo "0 results, contact the admin";
                                }
                            }
                        
                            //close connection
                            mysqli_close($link);
                        ?>
                        <br><br>
                        If you have any questions, hop over to our Discord!
                    </p>
                    <a href="https://discord.gg/QpT383Ygq9" target=”_blank” class="button-discord">
                        <img src="src/public/img/icon_clyde_white_RGB.svg" alt="discord logo">
                        Join now!
                    </a>
                </div>
        </section>
        
        <section id="nether">
            <div id="buildThemeScroll">
                <h2 class="buildbattle-title">How to join</h2>
                <p>
                    If you want to participate in a more competitive way or simply want to see what other people have created, feel free to join our Discord.
                    Being a part of our Discord community allows you to engage with like-minded individuals and explore various builds.
                    Whether you're interested in showcasing your skills or simply enjoying the creative atmosphere. You are more than welcome!
                    Just click the button below.
                </p>
                <a href="https://discord.gg/QpT383Ygq9" target=”_blank” class="button-discord">
                    <img src="src/public/img/icon_clyde_white_RGB.svg" alt="discord logo">
                    Join now!
                </a>
            </div>
        </section>
    </main>
    <footer>
        <a id="copyright" href="https://www.duckstyle-design.be">Copyright Duckstyle 2023</a>
    </footer>
</body>
<!--
<script src="src/js/buildslideshow.js"></script>
-->
</html>