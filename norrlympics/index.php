<?php
ini_set("user_agent", "Norrlympics Program, http://solborg.xyz/norrlympics");

function get_string_between($string, $start, $end) {
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

if (isset($_POST["nation"])) {
    $nation = str_replace(" ", "_", strtolower($_POST["nation"]));
    $vcode = $_POST["vcode"];
    
    $codeveri = file_get_contents("https://www.nationstates.net/cgi-bin/api.cgi?a=verify&nation=$nation&checksum=$vcode");
    
    if (strpos($codeveri, "1") !== false) {
        $members = file_get_contents("http://solborg.xyz/rp/members.txt");
        
        if (strpos($members, ">$nation(") !== false) {
            $datanums = array($_POST["soccer"], $_POST["rugby"], $_POST["hockey"], $_POST["skating"], $_POST["bobsled"], $_POST["ski"], $_POST["snowboard"], $_POST["biathlon"]);
            
            $total = 0;
            for ($x = 0; $x < count($datanums); $x++) $total += $datanums[$x];
            
            if ($total <= 32) {
                $rawdata = file_get_contents("https://www.nationstates.net/cgi-bin/api.cgi?nation=$nation;q=census;scale=6+39+44;mode=score");
                
                $compassion = get_string_between(get_string_between($rawdata, 'id="6">', '<SCALE id="39">'), "<SCORE>", "</SCORE>");
                $health = get_string_between(get_string_between($rawdata, 'id="39">', '<SCALE id="44">'), "<SCORE>", "</SCORE>");
                $cheer = get_string_between(get_string_between($rawdata, 'id="44">', '</CENSUS>'), "<SCORE>", "</SCORE>");
                
                $compweight = 0;
                $healthweight = 0;
                $cheerweight = 0;
                
                if ($compassion > 38) $compweight = ($compassion - 38) / 52;
                if ($health > 4) $healthweight = ($health - 4) / 30;
                if ($cheer > 50) $cheerweight = ($cheer - 50) / 70;
                
                $avgweight = 1 + (($compweight + $healthweight + $cheerweight) / 3);
                $weightnums = array();
                for ($x = 0; $x < count($datanums); $x++) array_push($weightnums, round($datanums[$x] * $avgweight));
                
                $dataformat = "<nation name='$nation'><soccer>" . $weightnums[0] . "</soccer><rugby>" . $weightnums[1] . "</rugby><hockey>" . $weightnums[2] . "</hockey><skating>" . $weightnums[3] . "</skating><bobsled>" . $weightnums[4] . "</bobsled><ski>" . $weightnums[5] . "</ski><snowboard>" . $weightnums[6] . "</snowboard><biathlon>" . $weightnums[7] . "</biathlon></nation>";
                
                $datafile = fopen("data.xml", "a+");
                fwrite($datafile, $dataformat);
                fclose($datafile);
                
                echo "Successfully added points for $nation.";
            } else {
                echo "You allocated too many points. Please fill out the form again.";
            }
        } else {
            echo "Your nation is not registered for RP. You can do so by visiting <a href='http://solborg.xyz/rp/register.php'>this site</a>.";
        }
    } else {
        echo "There was a problem with the verification. Check to make sure you spelled your nation correctly and you are currently logged in with it.";
    }
} else {
    echo file_get_contents("assign.html");
}
?>