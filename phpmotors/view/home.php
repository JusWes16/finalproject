<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/phpmotors.css" media="screen">
    <link rel="stylesheet" href="css/normalize.css" media="screen">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <title>Home | PHP Motors</title>
</head>
<body>
    <div id="content">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?> 
        </header>
        <nav>
            <!-- <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>  -->
            <?php echo $navList; ?>
        </nav>
        <main>
            <h2 id="home_title">Welcome to PHP Motors!</h2>
            <section id="home_top_img">
                <div>
                    <h3>DMC Delorean</h3>
                    <p>3 Cup holders</p>
                    <p>Superman doors</p>
                    <p>Fuzzy dice!</p>
                </div>
                <img id="delorean" src="images/vehicles/delorean.jpg" alt="images of a DMC delorean">
                <a href="#"><img id="own_today" src="images/site/own_today.png" alt="own today button"></a>
            </section>
            <section id="upgrades_reviews">
                <div id="reviews">
                    <h3>DMC Delorean Reviews</h3>
                    <ul>
                        <li>"So fast its almost like trasveling in time." (4/5)</li>
                        <li>"Coolest ride on the road." (4/5)</li>
                        <li>"I'm feeling like Marty McFly!" (5/5)</li>
                        <li>"The most futuristic ride of our day." (4.5/5)</li>
                        <li>"80's livin and I love it!" (5/5)</li>
                    </ul>
                </div>
                <div id="upgrades">
                    <h3>Delorean Upgrades</h3>
                    <div>
                        <div>
                            <img src="images/upgrades/flux-cap.png" alt="flux capacitor image">
                        </div>
                        <p><a href="#">Flux Capacitor</a></p>
                    </div>
                    <div>
                        <div>
                            <img src="images/upgrades/flame.jpg" alt="flame decals image">
                        </div>
                        <p><a href="#">Flame Decals</a></p>
                    </div>
                    <div>
                        <div>
                            <img src="images/upgrades/bumper_sticker.jpg" alt="bumper stickers image">
                        </div>
                        <p><a href="#">Bumper Stickers</a></p>
                    </div>
                    <div>
                        <div>
                            <img src="images/upgrades/hub-cap.jpg" alt="hub cap image">
                        </div>
                        <p><a href="#">Hub Caps</a></p>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?> 
        </footer>
    </div>
</body>
</html>