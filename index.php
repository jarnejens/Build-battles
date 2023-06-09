<?php
//error handeling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'bootstrap.php';

$themeManager = new getTheme();
$theme = $themeManager->getTheme();
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
                <a href="index.php"><div class="nav__sign"><p>Build theme</p></div></a>
                <a href="builders.html"><div class="nav__sign"><p>Who are we?</p></div></a>
                <a href="winners.html"><div class="nav__sign"><p>Previous<br>winners</p></div></a>
            </nav>
            <div id="themeSign" href="#buildThemeScroll">
                <section>
                    <h3 id="themeSign__title">Current Theme:</h3>
                    <p class="themeSign__description" id="longText">
                        <?php
                        echo $theme["theme_name"];
                        ?>
                    </p>
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
                        //use getTheme() from getTheme.php to get the current theme
                        echo $theme["theme"];
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