<!DOCTYPE html>
<html>
    <head>
        <title>Norrland Website</title>
        <link rel="stylesheet" href="index_resources/style.css">
        <link rel="shortcut icon" href="favicon.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arimo|Montserrat:700">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div id="topsection">
            <h1>Norrland</h1>
            <p>a home for Nordic nations and others too</p>
        </div>
        <div id="section0" class="section">
            <div class="clickable" id="section0clickable" onclick="toggleDisplay(0)"></div>
            <h2>New Members' Guide</h2>
            <div id="section0content" class="content">
                <?php echo file_get_contents("index_resources/guide.html"); ?>
            </div>
        </div>
        
        <?php
        $dirname = "artwork";
        $imgs = array();
        
        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dirname)) as $filename) {
            // filter out "." and ".."
            if ($filename->isDir()) continue;
            
            //echo "$filename\n";
            array_push($imgs, $filename);
        }

        sort($imgs);
        ?>
        <div id="section1" class="section">
            <div class="clickable" id="section1clickable" onclick="toggleDisplay(1)"></div>
            <h2>Art Gallery</h2>
            <div id="section1content" class="content">
                <p>Below are the latest submissions:</p>
                <img src="<?php echo $imgs[count($imgs) - 1] ?>" class="preview">
                <img src="<?php echo $imgs[count($imgs) - 2] ?>" class="preview">
                <img src="<?php echo $imgs[count($imgs) - 3] ?>" class="preview">
                <p class="ending">Click here to see the full gallery (coming soon).</p>
            </div>
        </div>
        <div id="section2" class="section">
            <div class="clickable" id="section2clickable" onclick="toggleDisplay(2)"></div>
            <h2>Links and Utilities</h2>
            <div id="section2content" class="content">
                <a class="item" href="rp">
                    <img src="index_resources/rp_icon.png">
                    <p>Roleplay Site</p>
                </a>
                <a class="item" href="rp/military">
                    <img src="index_resources/military_icon.png">
                    <p>Military Program</p>
                </a>
                <a class="item" href="https://drive.google.com/open?id=1C-JWPhqhMrYVmNaZV_pnC3UVHwk&usp=sharing">
                    <img src="index_resources/map_icon.png">
                    <p>Regional Map</p>
                </a>
                <p class="ending"></p>
            </div>
        </div>
        
        <script>
            var modes = [false, false, false];
            
            function toggleDisplay(x) {
                var section = document.getElementById("section" + x);
                var clickable = document.getElementById("section" + x + "clickable");
                var content = document.getElementById("section" + x + "content");
                
                if (modes[x] === false) {
                    section.style.maxHeight = "1500px";
                    clickable.style.backgroundImage = "url('index_resources/arrow_up.png')";
                    content.style.animation = "fadein 1s linear forwards";
                } else {
                    content.style.animation = "fadeout 0.5s linear forwards";
                    section.style.maxHeight = "258px";
                    clickable.style.backgroundImage = "url('index_resources/arrow_down.png')";
                }
                
                modes[x] = !modes[x];
            }
        </script>
    </body>
</html>