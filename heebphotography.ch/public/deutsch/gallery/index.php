<?php
// // start session for storing data
// session_start();
// if (!array_key_exists("all", $_SESSION)) { // if this is the first time the page as been loaded, make the variables, else dont
//     $_SESSION["all"] = true; //at the start, all categories and types are selected in the filter
//     $_SESSION["blacklist"] = array(); //blacklist for types and categories
// }
// $_SESSION["everything"] =  array(); //categories and types (clears it if the page had been reloaded)

// if (!array_key_exists("searchbar_input", $_SESSION)) { // creates the searchbar_input key if it doesnt exist already
//     $_SESSION["searchbar_input"] = "";
// }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- metatags -->
        <?php include __DIR__ . "/../../templates/general_metatags.php"?>
        <meta name="keywords" content="deutsch, andreas, heeb, andreas heeb, bilder, heebphotography, galerie, bildergalerie, fotos, tiere, beispiele">
        <meta name="description" content="Vielzählige Bilder von Andreas Heeb">
        <!-- rest -->
        <link rel="stylesheet" href="https://heebphotography.ch/public/styles/main.css">
        <script src="https://heebphotography.ch/public/script/gallery.js"></script>
        <title>Bildergalerie | Tierfotografie Andreas Heeb</title>
        <script>
        // // sets the cookies to false so that there are no bugs
        // // everything button
        // var d = new Date();
        // d.setTime(d.getTime() + 5000 * 60 * 60);
        // document.cookie = "all_first_clicked=false;expires=" + d.toUTCString() + ";path=/;samesite=lax";
        // // searchfield
        // var d = new Date();
        // d.setTime(d.getTime() + 5000 * 60 * 60);
        // document.cookie = "searchbar_first_clicked=false;expires=" + d.toUTCString() + ";path=/;samesite=lax";
        </script>
        <link rel="shortcut icon" type="image/x-icon" href="https://heebphotography.ch/public/images/favicon/favicon.ico"/>
    </head>

    <body id="gallery" onload="body_load()">
        <!-- wip bar -->
        <?php require __DIR__ . "/../../templates/work_in_progress.php"?>
        <?php require __DIR__ . "/../../templates/header.php"?>

        <div id="filter_bar">
            <!-- filter form -->
            <!-- <form id="gallery_filter" action="./filter_backend.php" target="_self" method="post">
                <?php
                // if ($_SESSION["searchbar_input"] == "") { // if no searchbar_input was sent from the backend, just do the normal thing
                //     if ($_SESSION["all"]) { //only selects everything if the filter is "off"
                //         // connect to the database
                //         $dbconn = pg_connect("host=heebphotography.ch port=5500 dbname=heebphotography user=postgres password=Y1qhk9nzfI2B");
                //         // gets all categories from the database which arent NULL
                //         $query = "SELECT DISTINCT category FROM images WHERE category IS NOT NULL GROUP BY category";
                //         $query_result = pg_query($query);
                //         $all_rows = pg_fetch_all($query_result);
                //         // button to select everything
                //         echo '<input onChange="all_button(this)" type="checkbox" id="all" name="all" value="all" checked="checked" class="selected">';
                //         echo '<label for="all" class="selected">Everything</label>';
                //         // checkbox for each category
                //         foreach ($all_rows as $row) {
                //             echo '<input onChange="this.form.submit()" type="checkbox" id="category_' . $row["category"] . '" name="category_' . $row["category"] . '" value="' . $row["category"] . '">';
                //             echo '<label for="category_' . $row["category"] . '">' . $row["category"] . '</label>';
                //             array_push($_SESSION["everything"], $row["category"]); //adds the category to the session list of categories and types
                //         }
                //     } else {
                //         // connect to the database
                //         $dbconn = pg_connect("host=heebphotography.ch port=5500 dbname=heebphotography user=postgres password=Y1qhk9nzfI2B");
                //         // gets all categories from the database which arent NULL
                //         $query = "SELECT DISTINCT category FROM images WHERE category IS NOT NULL GROUP BY category";
                //         $query_result = pg_query($query);
                //         $all_rows = pg_fetch_all($query_result);
                //         // button to select everything (not checked)
                //         echo '<input onChange="all_button(this)" type="checkbox" id="all" name="all" value="all">';
                //         echo '<label for="all">Everything</label>';
                //         // checkbox for each row
                //         foreach ($all_rows as $row) {
                //             if (in_array($row["category"], $_SESSION["blacklist"])) { // unchecks the checkbox if it is in the blacklist
                //                 echo '<input onChange="this.form.submit()" type="checkbox" id="category_' . $row["category"] . '" name="category_' . $row["category"] . '" value="' . $row["category"] . '">';
                //                 echo '<label for="category_' . $row["category"] . '">' . $row["category"] . '</label>';
                //                 array_push($_SESSION["everything"], $row["category"]); //adds the category to the session list of categories and types
                //             } else {
                //                 echo '<input onChange="this.form.submit()" type="checkbox" id="category_' . $row["category"] . '" name="category_' . $row["category"] . '" value="' . $row["category"] . '" checked="checked" class="selected">';
                //                 echo '<label for="category_' . $row["category"] . '" class="selected">' . $row["category"] . '</label>';
                //                 array_push($_SESSION["everything"], $row["category"]); //adds the category to the session list of categories and types
                //             }
                //         }
                //     }
                //     // selects all types and categories and makes a searchbar
                //     echo '<input onchange="searchbar_clicked(this)" type="search" list="searchbar_elements" name="searchbar" id="searchbar">';
                //     echo '<datalist id="searchbar_elements">';
                //     // gets all distinct types and categories from the database
                //     $categories = pg_fetch_all(pg_query("SELECT DISTINCT category FROM images WHERE category IS NOT NULL GROUP BY category"));
                //     $temp = [];
                //     foreach ($categories as $category) {
                //         array_push($temp, str_replace("_", " ", $category["category"]));
                //     }
                //     $all_distinct_rows_and_types = $temp;
                //     $types = pg_fetch_all(pg_query("SELECT DISTINCT type FROM images WHERE type IS NOT NULL GROUP BY type"));
                //     $temp = [];
                //     foreach ($types as $type) {
                //         array_push($temp, str_replace("_", " ", $type["type"]));
                //     }
                //     $all_distinct_rows_and_types = array_merge($all_distinct_rows_and_types, $temp);
                //     foreach ($all_distinct_rows_and_types as $item) {
                //         echo '<option value="' . $item . '">';
                //     }
                //     echo '</datalist>';
                // } else { // if a searchbar_input was sent from the backend, underline nothing and send value to gallery maker
                //     // connect to the database
                //     $dbconn = pg_connect("host=heebphotography.ch port=5500 dbname=heebphotography user=postgres password=Y1qhk9nzfI2B");
                //     // gets all categories from the database which arent NULL
                //     $query = "SELECT DISTINCT category FROM images WHERE category IS NOT NULL GROUP BY category";
                //     $query_result = pg_query($query);
                //     $all_rows = pg_fetch_all($query_result);
                //     // button to select everything
                //     echo '<input onChange="all_button(this)" type="checkbox" id="all" name="all" value="all">';
                //     echo '<label for="all">Everything</label>';
                //     // checkbox for each category
                //     foreach ($all_rows as $row) {
                //         echo '<input onChange="this.form.submit()" type="checkbox" id="category_' . $row["category"] . '" name="category_' . $row["category"] . '" value="' . $row["category"] . '">';
                //         echo '<label for="category_' . $row["category"] . '">' . $row["category"] . '</label>';
                //         array_push($_SESSION["everything"], $row["category"]); //adds the category to the session list of categories and types
                //     }
                //     // selects all types and categories and makes a searchbar
                //     echo '<input onchange="searchbar_clicked(this)" type="search" list="searchbar_elements" name="searchbar" id="searchbar">';
                //     echo '<datalist id="searchbar_elements">';
                //     // gets all distinct types and categories from the database
                //     $categories = pg_fetch_all(pg_query("SELECT DISTINCT category FROM images WHERE category IS NOT NULL GROUP BY category"));
                //     $temp = [];
                //     foreach ($categories as $category) {
                //         array_push($temp, str_replace("_", " ", $category["category"]));
                //     }
                //     $all_distinct_rows_and_types = $temp;
                //     $types = pg_fetch_all(pg_query("SELECT DISTINCT type FROM images WHERE type IS NOT NULL GROUP BY type"));
                //     $temp = [];
                //     foreach ($types as $type) {
                //         array_push($temp, str_replace("_", " ", $type["type"]));
                //     }
                //     $all_distinct_rows_and_types = array_merge($all_distinct_rows_and_types, $temp);
                //     foreach ($all_distinct_rows_and_types as $item) {
                //         echo '<option value="' . $item . '">';
                //     }
                //     echo '</datalist>';
                //     $searched_item = $_SESSION["searchbar_input"];
                //     $_SESSION["searchbar_input"] = ""; // clears the $_SESSION["searchbar_input"] to avoid confusion
                // }
                ?>
                <input type="submit" value="Filter">
            </form> -->
            <!-- all filters -->
            <div id="filters">
                <?php
                // connect to the database
                $dbconn = pg_connect("host=heebphotography.ch port=5500 dbname=heebphotography user=postgres password=Y1qhk9nzfI2B");
                // gets all categories from the database which arent NULL
                $query = "SELECT DISTINCT de_category FROM images WHERE de_category IS NOT NULL GROUP BY de_category";
                $query_result = pg_query($query);
                $all_rows = pg_fetch_all($query_result);
                // button to select everything
                // echo '<input onChange="all_button(this)" type="checkbox" id="all" name="all" value="all" checked="checked" class="selected">';
                echo '<p id="everything" class="filter_option selected" onclick="filter(this)">Alles</p>';
                // checkbox for each category
                foreach ($all_rows as $row) {
                    // echo '<input onChange="this.form.submit()" type="checkbox" id="category_' . $row[" category"] . '" name="category_' . $row["category"] . '" value="' . $row["category"] . '">';
                    echo '<p id="' . $row["de_category"] . '" class="filter_option" onclick="filter(this)">' . $row["de_category"] . '</p>';
                    array_push($_SESSION["everything"], $row["de_category"]); //adds the category to the session list of categories and types
                }
                // selects all types and categories and makes a searchbar
                echo '<input onchange="filter(this)" type="search" list="searchbar_elements" name="searchbar" id="searchbar" autocomplete="off">';
                echo '<datalist id="searchbar_elements">';
                // gets all distinct types and categories from the database
                $categories = pg_fetch_all(pg_query("SELECT DISTINCT de_category FROM images WHERE de_category IS NOT NULL GROUP BY de_category"));
                $temp = [];
                foreach ($categories as $category) {
                    array_push($temp, str_replace("_", " ", $category["de_category"]));
                }
                $all_distinct_rows_and_types = $temp;
                $types = pg_fetch_all(pg_query("SELECT DISTINCT de_type FROM images WHERE de_type IS NOT NULL GROUP BY de_type"));
                $temp = [];
                foreach ($types as $type) {
                    array_push($temp, str_replace("_", " ", $type["de_type"]));
                }
                $all_distinct_rows_and_types = array_merge($all_distinct_rows_and_types, $temp);
                // gets all distinct latin_names from the database
                $latin_names = pg_fetch_all(pg_query("SELECT DISTINCT latin_name FROM images WHERE latin_name IS NOT NULL GROUP BY latin_name"));
                $temp = [];
                foreach ($latin_names as $latin_name) {
                    array_push($temp, str_replace("_", " ", $latin_name["latin_name"]));
                }
                $all_distinct_rows_and_types = array_merge($all_distinct_rows_and_types, $temp);
                foreach ($all_distinct_rows_and_types as $item) {
                    echo '<option value="' . $item . '">';
                }
                echo '</datalist>';
                ?>
            </div>
        </div>

        <div>
            <?php
            // if (isset($searched_item)) { // if the user has searched something, only show the images that mach this item
            //     $searched_item = strtolower(str_replace(" ", "_", $searched_item)); // makes the searchstring ready for the databse
            //     // connect to the database
            //     $dbconn = pg_connect("host=heebphotography.ch port=5500 dbname=heebphotography user=postgres password=Y1qhk9nzfI2B");
            //     // gets the names of the images from the databse
            //     $query = "SELECT name, category, type FROM images WHERE LOWER(category) LIKE '%" . $searched_item . "%' OR LOWER(type) LIKE '%" . $searched_item . "%' ORDER BY upload_date DESC";
            //     $query_result = pg_query($query);
            //     $all_rows = pg_fetch_all($query_result);
            //     pg_close($dbconn); //ends connection to database
            // } else { // if the user didn't search something, display everything normally
                // if ($_SESSION["all"]) { //only selects everything if the filter is "off"
                    // connect to the database
                    $dbconn = pg_connect("host=heebphotography.ch port=5500 dbname=heebphotography user=postgres password=Y1qhk9nzfI2B");
                    // gets the names of the images from the databse
                    $query = "SELECT name, de_category, de_type, latin_name FROM images ORDER BY upload_date DESC";
                    $query_result = pg_query($query);
                    $all_rows = pg_fetch_all($query_result);
                    pg_close($dbconn); //ends connection to database
                // } else { // only selects the ones which are not in the blacklist
                //     // connect to the database
                //     $dbconn = pg_connect("host=heebphotography.ch port=5500 dbname=heebphotography user=postgres password=Y1qhk9nzfI2B");
                //     $blacklist = "(''";
                //     foreach ($_SESSION["blacklist"] as $item) {
                //         $blacklist .= ",'" . $item . "'";
                //     }
                //     $blacklist .= ")";
                //     $query = "SELECT name, category, type FROM images WHERE category NOT IN " . $blacklist . "and type NOT IN " . $blacklist . " ORDER BY upload_date DESC";
                //     $query_result = pg_query($query);
                //     $all_rows = pg_fetch_all($query_result);
                //     pg_close($dbconn); //ends connection to database
                // }
            // }
            echo '<script>let images_array = [];';
            for ($i=0; $i < sizeof($all_rows); $i++) {
                echo 'images_array.push({"category":"';
                echo $all_rows[$i]["de_category"];
                echo '", "name":"';
                echo $all_rows[$i]["name"];
                echo '", "type":"';
                echo $all_rows[$i]["de_type"];
                echo '", "latin_name":"';
                echo $all_rows[$i]["latin_name"];
                echo '"});';
            }
            echo 'sessionStorage.setItem("all_images", JSON.stringify(images_array));';
            echo "</script>";
            // // splits the images in 4 seperate arrays with +- 1 the same amount of images
            //     $image_column_1 = array();
            //     $image_column_2 = array();
            //     $image_column_3 = array();
            //     $image_column_4 = array();
            //     $i = 0;
            //     $c = 0;
            // while ($i <= sizeof($all_rows)) {
            //     $image_column_1[$c] = $all_rows[$i++];
            //     if ($i >= sizeof($all_rows)) {
            //         break;
            //     }
            //     $image_column_2[$c] = $all_rows[$i++];
            //     if ($i >= sizeof($all_rows)) {
            //         break;
            //     }
            //     $image_column_3[$c] = $all_rows[$i++];
            //     if ($i >= sizeof($all_rows)) {
            //         break;
            //     }
            //     $image_column_4[$c++] = $all_rows[$i++];
            //     if ($i >= sizeof($all_rows)) {
            //         break;
            //     }
            // }
            ?>

            <!-- makes 4 rows of images -->
            <div id="all_rows">
                <div>
                    <?php
                    // foreach ($image_column_1 as $image) {
                    //     echo "<img src=\"https://heebphotography.ch/public/images/gallery/thumbnail/";
                    //     echo $image["name"];
                    //     echo ".jpg\" class=\"image";
                    //     echo "\" id=\"";
                    //     echo $image["category"];
                    //     echo " ";
                    //     echo $image["type"];
                    //     echo "\" onclick=\"slideshow_on(this.src)\">";
                    // }
                    ?>
                </div>

                <div>
                    <?php
                    // foreach ($image_column_2 as $image) {
                    //     echo "<img src=\"https://heebphotography.ch/public/images/gallery/thumbnail/";
                    //     echo $image["name"];
                    //     echo ".jpg\" class=\"image";
                    //     echo "\" id=\"";
                    //     echo $image["category"];
                    //     echo " ";
                    //     echo $image["type"];
                    //     echo "\" onclick=\"slideshow_on(this.src)\">";
                    // }
                    ?>
                </div>

                <div>
                    <?php
                    // foreach ($image_column_3 as $image) {
                    //     echo "<img src=\"https://heebphotography.ch/public/images/gallery/thumbnail/";
                    //     echo $image["name"];
                    //     echo ".jpg\" class=\"image";
                    //     echo "\" id=\"";
                    //     echo $image["category"];
                    //     echo " ";
                    //     echo $image["type"];
                    //     echo "\" onclick=\"slideshow_on(this.src)\">";
                    // }
                    ?>
                </div>

                <div>
                    <?php
                    // foreach ($image_column_4 as $image) {
                    //     echo "<img src=\"https://heebphotography.ch/public/images/gallery/thumbnail/";
                    //     echo $image["name"];
                    //     echo ".jpg\" class=\"image";
                    //     echo "\" id=\"";
                    //     echo $image["category"];
                    //     echo " ";
                    //     echo $image["type"];
                    //     echo "\" onclick=\"slideshow_on(this.src)\">";
                    // }
                    ?>
                </div>
            </div>
        </div>

        <!-- the slideshow that pops up when clicking on an image -->
        <div id="slideshow_background">
            <div id="slideshow" onkeydown="key_pressed(event)">
                <img id="slideshow_image" src=""
                    onload="resizeToMax()">

                <div id="picture_description"></div>

                <!-- for navigation within the slideshow -->
                <div class="arrows_background">
                    <div onclick="last_picture()" style="z-index: 7; position: fixed;">
                        <?php require '../../templates/arrow_btn_left.php'?>
                    </div>
                </div>

                <div class="arrows_background" style="right:0;">
                    <div onclick="next_picture()" style="z-index: 7; position: fixed;">
                        <?php require '../../templates/arrow_btn_right.php'?>
                    </div>
                </div>

                <div onclick="slideshow_off()">
                    <!-- adds close button -->
                    <?php require '../../templates/close_btn.php'?>
                </div>
            </div>
        </div>

        <div class="filter_btn" onclick="filter()">
            <img src="https://heebphotography.ch/public/images/gallery/icons/filter_alt-black-18dp.svg">
        </div>

        <!-- <div id="filter_menu"> -->
        <!-- filter form -->
        <!-- <form id="gallery_filter" action="./filter_backend.php" target="_self" method="post"> -->
        <?php /*
                if ($_SESSION["all"]) { //only selects everything if the filter is "off"
                    // connect to the database
                    $dbconn = pg_connect("host=heebphotography.ch port=5500 dbname=heebphotography user=postgres password=Y1qhk9nzfI2B");
                    // gets all categories from the database which arent NULL
                    $query = "SELECT category FROM images WHERE category IS NOT NULL GROUP BY category";
                    $query_result = pg_query($query);
                    $all_rows = pg_fetch_all($query_result);
                    foreach ($all_rows as $row) {
                        echo '<input type="checkbox" id="category_' . $row["category"] . '" name="category_' . $row["category"] . '" value="' . $row["category"] . '" checked="checked">';
                        echo '<label for="category_' . $row["category"] . '">' . $row["category"] . '</label>';
                        array_push($_SESSION["everything"], $row["category"]); //adds the category to the session list of categories and types
                    }
                    // gets all types from the database which arent NULL
                    $query = "SELECT type FROM images WHERE type IS NOT NULL GROUP BY type";
                    $query_result = pg_query($query);
                    $all_rows = pg_fetch_all($query_result);
                    pg_close($dbconn); //ends connection to database
                    foreach ($all_rows as $row) {
                        echo '<input type="checkbox" id="type_' . $row["type"] . '" name="type_' . $row["type"] . '" value="' . $row["type"] . '" checked="checked">';
                        echo '<label for="type_' . $row["type"] . '">' . $row["type"] . '</label>';
                        array_push($_SESSION["everything"], $row["type"]); //adds the type to the session list of categories and types
                    }
                } else {
                    // connect to the database
                    $dbconn = pg_connect("host=heebphotography.ch port=5500 dbname=heebphotography user=postgres password=Y1qhk9nzfI2B");
                    // gets all categories from the database which arent NULL
                    $query = "SELECT category FROM images WHERE category IS NOT NULL GROUP BY category";
                    $query_result = pg_query($query);
                    $all_rows = pg_fetch_all($query_result);
                    foreach ($all_rows as $row) {
                        if (in_array($row["category"], $_SESSION["blacklist"])) { // unchecks the checkbox if it is in the blacklist
                            echo '<input type="checkbox" id="category_' . $row["category"] . '" name="category_' . $row["category"] . '" value="' . $row["category"] . '">';
                            echo '<label for="category_' . $row["category"] . '">' . $row["category"] . '</label>';
                            array_push($_SESSION["everything"], $row["category"]); //adds the category to the session list of categories and types
                        } else {
                            echo '<input type="checkbox" id="category_' . $row["category"] . '" name="category_' . $row["category"] . '" value="' . $row["category"] . '" checked="checked">';
                            echo '<label for="category_' . $row["category"] . '">' . $row["category"] . '</label>';
                            array_push($_SESSION["everything"], $row["category"]); //adds the category to the session list of categories and types
                        }
                    }
                    // gets all types from the database which arent NULL
                    $query = "SELECT type FROM images WHERE type IS NOT NULL GROUP BY type";
                    $query_result = pg_query($query);
                    $all_rows = pg_fetch_all($query_result);
                    pg_close($dbconn); //ends connection to database
                    foreach ($all_rows as $row) {
                        if (in_array($row["type"], $_SESSION["blacklist"])) { // unchecks the checkbox if it is in the blacklist
                            echo '<input type="checkbox" id="type_' . $row["type"] . '" name="type_' . $row["type"] . '" value="' . $row["type"] . '">';
                            echo '<label for="type_' . $row["type"] . '">' . $row["type"] . '</label>';
                            array_push($_SESSION["everything"], $row["type"]); //adds the type to the session list of categories and types
                        } else {
                            echo '<input type="checkbox" id="type_' . $row["type"] . '" name="type_' . $row["type"] . '" value="' . $row["type"] . '" checked="checked">';
                            echo '<label for="type_' . $row["type"] . '">' . $row["type"] . '</label>';
                            array_push($_SESSION["everything"], $row["type"]); //adds the type to the session list of categories and types
                        }
                    }
                } */
        ?>
        <!-- <input type="submit" value="Filter">
            </form>
        </div> -->

        <?php require  __DIR__ . "/../../templates/footer.php"?>
    </body>

</html>
