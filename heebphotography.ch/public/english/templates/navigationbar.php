<!-- only temporary -->
<head>
    <link rel="stylesheet" href="navigationbar.css">
</head>
<!-- only temporary -->

<nav>
    <?php
    echo "<script src=\"" . "https://" . $_SERVER['HTTP_HOST'] . "/templates/navigationbar.js" . "\"></script>"
    ?>
    <div class="navigation_button" onclick="navigation_button(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
    <div id="navigation">
        <ul>
            <?php
        echo "<li class=\"links\"><a href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "gallery/" . "\">Gallery</a></li>";
        echo "<li class=\"links\"><a href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "about me/" . "\">About me</a></li>";
        echo "<li class=\"links\"><a href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "linktree/" . "\">Linktree</a></li>";
        echo "<li class=\"links\"><a href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "contact/" . "\">Contact</a></li>";
        echo "<li class=\"links\"><a href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "impressum/" . "\">Impressum</a></li>";
        ?>
        </ul>
    </div>
</nav>