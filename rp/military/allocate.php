<?php
function get_string_between($string, $start, $end) {
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

if (isset($_POST["name"])) {
    ini_set("user_agent", "Norrland Regional Roleplay Program solborg.xyz/rp");
    
    $name = strtolower($_POST["name"]);
    $code = $_POST["vcode"];
    $name = str_replace(" ", "_", $name);
    $data = $_POST["data"];
    $leftover = $_POST["leftover"];
    
    $coderesult = file_get_contents("http://www.nationstates.net/cgi-bin/api.cgi?a=verify&nation=$name&checksum=$code");
    
    if (strpos($coderesult, "1") !== false) {
        if ($leftover >= 0) {
            $userfile = fopen("data/$name.txt", "a");
            fwrite($userfile, "[$data" . "$leftover]");
            fclose($userfile);
            
            echo "Military funding successfully allocated for $name.";
        } else {
            echo "You spent more than your available budget.";
        }
    } else {
        echo "The verification was unsuccessful.";
    }
} else if (isset($_POST["nation"])) {
    $nation = strtolower($_POST["nation"]);
    $nation = str_replace(" ", "_", $nation);
    
    $militarylist = file_get_contents("nations.txt");
    if (strpos($militarylist, "[$nation]") !== false) {
        $budget = get_string_between(file_get_contents("data/$nation.txt"), "<budget>", "</budget>");
        
        $panelC = fopen("panelC.html", "r");
        
        echo "Nation: $nation<br>" .
            "Total Budget: <span id='totalbudget'>$budget</span> PPU<br>" .
            "<div>Remaining: <span id='budget'>$budget</span> PPU</div>" .
            "<script>var nation = '$nation';</script>" .
            fread($panelC, filesize("panelC.html"));
            
        fclose($panelC);
    } else {
        echo "That nation does not have a budget assigned.";
    }
} else {
    $panelB = fopen("panelB.html", "r");
    echo fread($panelB, filesize("panelB.html"));
    fclose($panelB);
}
?>