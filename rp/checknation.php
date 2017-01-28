<?php
function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

if (isset($_GET["nation"])) {
    ini_set("user_agent", "Norrland Regional Roleplay Program");
    
    $name = strtolower($_GET["nation"]);
    $name = str_replace(" ", "_", $name);
    $memberdata = file_get_contents("members.txt");
    
    if (strpos($memberdata, "<$name>") !== false) {
        $rpdata = get_string_between($memberdata, "<$name>", "</$name>");
        $pop    = get_string_between($rpdata, "(", ")");
        $master = substr($rpdata, 0, strpos($rpdata, "("));
        
        echo "<p>Nation: $name</p>
            <p>Population: $pop</p>
            <p>Main Nation: $master</p>";
    } else {
        echo "That nation is not registered.";
    }
} else {
    echo "<p>Nation</p>
        <form action='' method='get'>
        <input type='text' name='nation'>
        <button>Get Info</button>
        </form>";
}
?>