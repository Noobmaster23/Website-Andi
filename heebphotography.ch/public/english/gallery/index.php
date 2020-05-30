<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Gallery | Wildlifephotography Andreas Heeb</title>
</head>

<body>
    <nav>
    </nav>
    <div id="gallery">
        <?php
    // searches the filename of all images in the images folder
    $images = scandir("images", 1);
    // deletes the last two elements of the filename list --> are always . and .. so not usefull
    unset($images[sizeof($images)-1]);
    unset($images[sizeof($images)-1]);
    // splits the images in 4 seperate arrays with +- 1 the same amount of images
    $image_column_1 = array();
    $image_column_2 = array();
    $image_column_3 = array();
    $image_column_4 = array();  
    $i = 0;
    $c = 0;
    while ($i <= sizeof($images)) {
        $image_column_1[$c] = $images[$i++];
        if ($i >= sizeof($images)) {
        break;
        }
        $image_column_2[$c] = $images[$i++];
        if ($i >= sizeof($images)) {
        break;
        }
        $image_column_3[$c] = $images[$i++];
        if ($i >= sizeof($images)) {
        break;
        }
        $image_column_4[$c++] = $images[$i++];
    }
        ?>

        <!-- makes 4 rows of images -->
        <div class="row">
            <div class="column">
                <?php
                foreach ($image_column_1 as $image) {
                        echo "<img src=\"images/";
                        echo $image;
                        echo "\" class=\"image\">";
                }
                ?>
            </div>

            <div class="column">
                <?php
                foreach ($image_column_2 as $image) {
                        echo "<img src=\"images/";
                        echo $image;
                        echo "\" class=\"image\">";
                }
                ?>
            </div>

            <div class="column">
                <?php
                foreach ($image_column_3 as $image) {
                        echo "<img src=\"images/";
                        echo $image;
                        echo "\" class=\"image\">";
                }
                ?>
            </div>

            <div class="column">
                <?php
                foreach ($image_column_4 as $image) {
                        echo "<img src=\"images/";
                        echo $image;
                        echo "\" class=\"image\">";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>