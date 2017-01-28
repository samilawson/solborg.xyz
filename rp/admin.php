<?php
if (isset($_POST["nation"])) {
    ini_set("user_agent", "Norrland Regional Roleplay Program");
    
    $name = strtolower($_POST["nation"]);
    $code = $_POST["vcode"];
    
    $name = str_replace(" ", "_", $name);
    
    $coderesult = file_get_contents("http://www.nationstates.net/cgi-bin/api.cgi?a=verify&nation=$name&checksum=$code");
    
    if (strpos($coderesult, "1") !== false) {
        $memberdata = file_get_contents("members.txt");
        if (strpos($memberdata, "<$name>") !== false) {
            echo "Verification successful.<br>";
            
            $t = time();
            $title = $_POST["posttitle"];
            $formattitle = date("Y-m-d") . "_" . $t . "-" . $name;

            $category = strtoupper($_POST["category"]);
            $nations = $_POST["nations"];
            $text = $_POST["post"];

            $postcontent =
                "# $category: $title\n\n" .
                "Posted by: $name\n\n" .
                "Nations involved: $nations\n\n" .
                "$text";

            $postfile = fopen("posts/$formattitle.md", "w");
            fwrite($postfile, $postcontent);
            fclose($postfile);

            echo "'$title' has been published.";
        } else {
            echo "$name is not a registered member. Click <a href='register.php'>here</a> to register.";
        }
        
    } else {
        echo "Sorry, but we were not able to verify that you are $name. Please make sure that you are signed into NationStates with $name, and your verification code is valid.";
    }
} elseif (isset($_GET["event"])) {
    echo "Sorry. This feature is no longer supported as of 15 November 2016.";
} else {
    $panel = fopen("adminpanel.html", "r");
    echo fread($panel, filesize("adminpanel.html"));
    fclose($panel);
}
        
?>