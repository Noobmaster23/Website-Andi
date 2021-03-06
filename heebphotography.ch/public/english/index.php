<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- metatags -->
        <?php include __DIR__ . "/../templates/general_metatags.php"?>
        <meta name="keywords" content="english, andreas, heeb, andreas heeb, home, heebphotography">
        <meta name="description" content="English Homepage of Andreas Heeb">
        <!-- rest -->
        <title>Wildlifephotography Andreas Heeb</title>
        <link rel="stylesheet" href="https://heebphotography.ch/public/styles/main.css">
        <script src="https://heebphotography.ch/public/script/home.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="https://heebphotography.ch/public/images/favicon/favicon.ico"/>
    </head>

    <body id="home" onload="slideshow(5000)">

        <?php require __DIR__ . "/../templates/work_in_progress.php"?>
        <?php require __DIR__ . "/../templates/header.php"?>

        <section>
            <?php
            // looks if the device is a phone or a pc and changes which pictures get selected
            // gets portrait images
            // gets last 5 images from db
            $dbconn = pg_connect("host=heebphotography.ch port=5500 dbname=heebphotography user=postgres password=Y1qhk9nzfI2B");
            $query = "SELECT name FROM images WHERE width < height ORDER BY upload_date DESC LIMIT 10";
            $query_result = pg_query($query);
            $all_rows = pg_fetch_all($query_result);
            pg_close($dbconn); //ends connection to database
            // displays the images
            $first_run = true;
            foreach ($all_rows as $name) {
                $name = $name["name"];
                if ($first_run) {
                    echo "<div class=\"portrait_slides\" id=\"portrait_first_slide\" style=\"background:center center/cover no-repeat url(https://heebphotography.ch/public/images/gallery/" . $name . ".jpg);\"></div>";
                    $first_run = false;
                } else {
                    echo "<div class=\"portrait_slides\" style=\"background:center center/cover no-repeat url(https://heebphotography.ch/public/images/gallery/" . $name . ".jpg);\"></div>";
                }
            }
            // gets landscape pictures
            // gets last 5 images from db
            $dbconn = pg_connect("host=heebphotography.ch port=5500 dbname=heebphotography user=postgres password=Y1qhk9nzfI2B");
            $query = "SELECT name FROM images WHERE width > height ORDER BY upload_date DESC LIMIT 10";
            $query_result = pg_query($query);
            $all_rows = pg_fetch_all($query_result);
            pg_close($dbconn); //ends connection to database
            // displays the images
            $first_run = true;
            foreach ($all_rows as $name) {
                $name = $name["name"];
                if ($first_run) {
                    echo "<div class=\"landscape_slides\" id=\"landscape_first_slide\" style=\"background:center center/100vw no-repeat url(https://heebphotography.ch/public/images/gallery/" . $name . ".jpg);\"></div>";
                    $first_run = false;
                } else {
                    echo "<div class=\"landscape_slides\" style=\"background:center center/cover no-repeat url(https://heebphotography.ch/public/images/gallery/" . $name . ".jpg);\"></div>";
                }
            }
            ?>
        </section>

        <aside id="profile">
            <img id="profile_picture" src="https://heebphotography.ch/public/images/home/profile_picture.jpg"></img>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tempor volutpat
            elit. Praesent pretium mauris nibh, sit amet rutrum mi lobortis non. Morbi eget ligula tristique nunc
            lobortis malesuada. Proin quis vestibulum arcu. Vestibulum at aliquet mi. Donec efficitur euismod ligula
            sit amet lacinia. Cras ac sem quam.
        </aside>

        <section id="instagram_feed">
            <?php
            $embedded_html = json_decode(file_get_contents("embeddedhtml.json", true));
            for ($i=0; $i < sizeof($embedded_html); $i++) {
                echo "<article class=\"instagram-posts\">";
                echo $embedded_html[$i];
                echo "</article>";
            }
            ?>
        </section>
        <!-- <?php require  __DIR__ . "/../templates/footer.php"?> -->
    </body>

</html>
