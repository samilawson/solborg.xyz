<?php
if (isset($_POST["nation"])) {
    ini_set("user_agent", "Norrland Regional Roleplay Program");
    
    $name = strtolower($_POST["nation"]);
    $code = $_POST["vcode"];
    $master = strtolower($_POST["master"]);
    $pop = preg_replace('/\D/', '', $_POST["population"]);
    
    $name = str_replace(" ", "_", $name);
    $master = str_replace(" ", "_", $master);
    
    $coderesult = file_get_contents("http://www.nationstates.net/cgi-bin/api.cgi?a=verify&nation=$name&checksum=$code");
    
    if (strpos($coderesult, "1") !== false) {
        $memberdata = file_get_contents("members.txt");
        $nationdata = file_get_contents("https://www.nationstates.net/cgi-bin/api.cgi?nation=$name&q=region");
        
        if (strpos($memberdata, "<$name>") !== false) {
            echo "$name has already been registered.";
        }
        elseif (strpos($nationdata, "<REGION>Norrland</REGION>") !== false) {
            $masterdata = file_get_contents("https://www.nationstates.net/cgi-bin/api.cgi?nation=$master&q=wa");
            
            if (strpos($masterdata, "<UNSTATUS>WA") !== false) {
                $memberfile = fopen("members.txt", "a+");
                fwrite($memberfile, "<$name>$master($pop)</$name>\n");
                fclose($memberfile);
                
                echo "$name has successfully been registered under $master.";
            } else {
                echo "Your main nation, $master, is not a WA Member.";
            }
        } else {
            echo "The nation you are trying to register, $name, does not reside within Norrland.";
        }
    } else {
        echo "Sorry, but we were not able to verify that you are $name. Please make sure that you are signed into NationStates with $name, and your verification code is valid.";
    }
} else {
    $form = fopen("registration_form.html", "r");
    echo fread($form, filesize("registration_form.html"));
    fclose($form);
}
?>