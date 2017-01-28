<?php
function get_string_between($string, $start, $end) {
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

if (isset($_POST["nation"])) {
    ini_set("user_agent", "Norrland Regional Roleplay Program solborg.xyz/rp");
    
    $name = strtolower($_POST["nation"]);
    //$code = $_POST["vcode"];
    $name = str_replace(" ", "_", $name);
    
    //$coderesult = file_get_contents("http://www.nationstates.net/cgi-bin/api.cgi?a=verify&nation=$name&checksum=$code");
    $coderesult = 1;
    
    if (strpos($coderesult, "1") !== false) {
        $memberdata = file_get_contents("http://solborg.xyz/rp/members.txt");
        
        if (strpos($memberdata, "<$name>") !== false) {
            $rpdata = get_string_between($memberdata, "<$name>", "</$name>");
            $pop = get_string_between($rpdata, "(", ")");
            
            if (!ctype_digit($pop)) {
                echo "There was a problem with the number you entered for your RP Population. Telegram Solborg.";
            } else {
                $militarylist = file_get_contents("nations.txt");
                if (strpos($militarylist, "[$name]") !== false) {
                    echo "Your budget has already been saved. You may now allocate funds to different assets <a href='allocate.php'>here</a>.";
                } else {
                    $rawdata = file_get_contents("https://www.nationstates.net/cgi-bin/api.cgi?nation=$name;q=census;scale=52+46+1;mode=score");
            
                    $economy = get_string_between(get_string_between($rawdata, 'id="1">', '<SCALE id="46">'), "<SCORE>", "</SCORE>");
                    $defense = get_string_between(get_string_between($rawdata, 'id="46">', '<SCALE id="52">'), "<SCORE>", "</SCORE>");
                    $integrity = get_string_between(get_string_between($rawdata, 'id="52">', '</CENSUS>'), "<SCORE>", "</SCORE>");
                    
                    $numA = sqrt(($defense * 2) * ($economy / 100) * $pop);
                    $numB = ($integrity + 20) / 120;
                    $numC = 30 * $numB * $numA;
                    $numD = round($numC);
                    
                    echo ucfirst($name) . "'s military budget : $numD PPU<br>";
                    
                    $listfile = fopen("nations.txt", "a");
                    fwrite($listfile, "[$name]\n");
                    fclose($listfile);
                    
                    $userfile = fopen("data/$name.txt", "w");
                    fwrite($userfile, "<budget>$numD</budget>\n");
                    fclose($userfile);
                    
                    echo "Your budget has been saved. You may now allocate funds to different assets <a href='allocate.php'>here</a>.";
                }
            }
            
        } else {
            echo "That nation is not registered.";
        }
        
    } else {
        echo "You could not be verified.";
    }
} else {
    $panelA = fopen("panelA.html", "r");
    echo fread($panelA, filesize("panelA.html"));
    fclose($panelA);
}
?>