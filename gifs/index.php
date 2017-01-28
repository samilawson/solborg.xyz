<html>
    <head>
        <title>Solborg's Gif Collection</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
        <style>
            body {
                margin-top: 40px;
                font-family: "Montserrat", sans-serif;
                color: #444;
                text-align: center;
            }
            
            h1 {
                font-size: 38px;
            }
            
            h2 {
                font-size: 26px;
                font-weight: 400;
            }
            
            a, a:visited {
                background: #fff;
                position: fixed;
                top: 50%;
                display: block;
                padding: 12px 0;
                width: 120px;
                text-align: center;
                border: 1px solid #444;
                border-radius: 8px;
                color: #444;
                font-size: 20px;
                text-decoration: none;
                transition: background 0.5s, color 0.5s;
                font-weight: 700;
            }
            
            a:hover {
                background: #444;
                color: #fff;
            }
            
            #back {
                left: 8%;
            }
            
            #forward {
                right: 8%;
            }
            
            #gifview {
                width: 600px;
                height: 650px;
                margin: 20px auto;
                background-color: #ddd;
                background-size: contain;
                background-repeat: no-repeat;
            }
        </style>
    </head>
    <body>
        <?php
        if (isset($_GET["gif"])) {
            $gifnum = $_GET["gif"];
        } else {
            $gifnum = 0;
        }
        $url = "imgs/$gifnum.gif";
        ?>
        <h1>Solborg's Gif Collection</h1>
        <h2>Currently Displaying Gif Number <?php echo $gifnum + 1 ?></h2>
        <div id="gifview" style="background-image: url(<?php echo $url ?>)"></div>
        <a id="back" href="?gif=<?php echo $gifnum - 1 ?>">Previous</span>
        <a id="forward" href="?gif=<?php echo $gifnum + 1?>">Next</span>
    </body>
</html>