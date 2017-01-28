<?php
function get_string_between($string, $start, $end) {
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

if (isset($_GET["nation"])) {
    $name = str_replace(" ", "_", strtolower($_GET["nation"]));
    $nationslist = file_get_contents("nations.txt");
    
    echo "Nation: $name";
    
    if (strpos($nationslist, $name) !== false) {
        $nationdata = file_get_contents("data/$name.txt");
        $budget     = get_string_between($nationdata, "<budget>", "</budget>");
        $numbers    = explode(",", get_string_between($nationdata, "[", "]"));
        
        $assets = array("Battle tanks", "AFVs", "Interceptors", "Attack planes", "Transport planes", "Trainer planes", "Transport helicopters", "Attack helicopters", "Aircraft carriers", "Frigates", "Destroyers", "Corvettes", "Submarines", "Coastal defense craft", "Frontline soldiers", "Reserve soldiers", "Long-range missile systems", "Medium range missile systems", "Short range missile systems", "Research PPU");
        
        for ($i = 0; $i < count($numbers); $i++) {
            echo "<br>" . $assets[$i] . ": " . $numbers[$i];
        }
    } else {
        echo "That nation does not have a budget assigned.";
    }
} else {
    echo "<p>Enter nation name:</p>" .
        "<form action='' method='get'>" .
        "<input type='text' name='nation'>" .
        "<button>View</button>" .
        "</form>";
}
?>