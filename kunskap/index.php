<!DOCTYPE html>
<html>
    <head>
        <title>Kunskap</title>
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="favicon.png">
    </head>
    <body>
        <?php
        $en = array("Images", "Files", "Maps", "News", "Games", "Kunskap Search", "Privacy Policy", "Language");
        $se = array("Bilder", "Filer", "Kartor", "Nyheter", "Spel", "Kunskap S&ouml;k", "Integritetspolicy", "Spr&aring;k");
        $no = array("Bilder", "Filer", "Kartene", "Nyheter", "Spill", "Kunskap S&oslash;k", "Privacy Policy", "Spr&aring;k");
        $cn = array("&#22270;&#29255;", "&#25991;&#20214;", "&#22320;&#22270;", "&#26032;&#38395;", "&#28216;&#25103;", "Kunskap &#25628;&#32034;", "&#38544;&#31169;&#25919;&#31574;", "&#35821;&#35328;");
        $ge = array("Imiges", "Failes", "Maps", "Neuws", "Gaims", "Kunskap Seurch", "Privice Polecey", "Lengwege");
        $fi = array("Kuvat", "Asiakirjat", "Kartat", "Uutiset", "Pelit", "Kunskap Haku", "Tietosuojak&auml;ytänt&ouml;", "Kieli");
        $jp = array("&#12452;&#12513;&#12540;&#12472;", "&#12501;&#12449;&#12452;&#12523;", "&#22320;&#22259;", "&#12491;&#12517;&#12540;&#12473;", "&#12466;&#12540;&#12512;", "Kunskap &#26908;&#32034", "&#20491;&#20154;&#24773;&#22577;&#20445;&#35703;&#26041;&#37341;", "&#35328;&#35486;");
        $kr = array("&#51060;&#48120;&#51648;&#46308;", "&#54028;&#51068;&#46308;", "&#51648;&#46020;&#46308;", "&#45684;&#49828;", "&#44228;&#47029;", "Kunskap &#44160;&#49353;", "&#44060;&#51064; &#51221;&#48372; &#51221;&#52293;", "&#50616;&#50612;");
        $fr = array("Images", "Fichiers", "Cartes", "Nouvelles", "Jeux", "Recherche Kunskap", "Politique de confidentialit&#233;", "La langue");
        $gu = array("&#5123;&#5291;&#5421;&#5381;", "&#5167;&#5333;&#5381;", "&#5291;&#5193;&#5381;", "&#5317;&#5381;", "&#5257;&#5307;&#5381;", "Kunskap &#5360;&#5456;&#5251;", "&#5176;&#5443;&#5465;&#5359; &#5177;&#5333;&#5359;", "&#5331;&#5328;&#5261;&#5461;&#5438;");
        
        if (isset($_GET["lang"])) {
            $lang = $_GET["lang"];
        } else {
            $lang = "en";
        }
        
        if ($lang == "se") {
            $words = $se;
        } else if ($lang == "no") {
            $words = $no;
        } else if ($lang == "cn") {
            $words = $cn;
        } else if ($lang == "ge") {
            $words = $ge;
        } else if ($lang == "fi") {
            $words = $fi;
        } else if ($lang == "jp") {
            $words = $jp;
        } else if ($lang == "kr") {
            $words = $kr;
        } else if ($lang == "fr") {
            $words = $fr;
        } else if ($lang == "gu") {
            $words = $gu;
        } else {
            $words = $en;
        }
        
        ?>
        
        <div id="rightcolumn">
            <form method="get" action="http://google.com/search">
                <input type="text" name="q" id="textbox">
                <button><?php echo $words[5] ?></button>
            </form>
        </div>
        
        <ul id="navbar">
            <li><a href="http://google.com/images"><?php echo $words[0] ?></a></li>
            <li><a href="http://google.com/drive"><?php echo $words[1] ?></a></li>
            <li><a href="http://google.com/maps"><?php echo $words[2] ?></a></li>
            <li><a href="http://google.com/news"><?php echo $words[3] ?></a></li>
            <li><a href="http://steampowered.com"><?php echo $words[4] ?></a></li>
        </ul>
        
        <ul id="footer">
            <li><?php echo $words[6] ?></li>
            <li onclick="document.getElementById('langmenu').style.display = 'block'"><?php echo $words[7] ?></li>
        </ul>
        
        <div id="leftcolumn">
            <img src="white_logo.png" id="logo">
        </div>
        
        <div id="langmenu">
            <div id="langclose" onclick="document.getElementById('langmenu').style.display = 'none'"></div>
            <p><?php echo $words[7] ?></p>
            <ul>
                <li><a href="?lang=en" <?php if ($lang == "en") echo "class='selected'" ?>>English Intl.</a></li>
                <li><a href="?lang=ge" <?php if ($lang == "ge") echo "class='selected'" ?>>English Georgekenia</a></li>
                <li><a href="?lang=se" <?php if ($lang == "se") echo "class='selected'" ?>>svenska (Swedish)</a></li>
                <li><a href="?lang=no" <?php if ($lang == "no") echo "class='selected'" ?>>norsk (Norwegian)</a></li>
                <li><a href="?lang=fi" <?php if ($lang == "fi") echo "class='selected'" ?>>suomi (Finnish)</a></li>
                <li><a href="?lang=fr" <?php if ($lang == "fr") echo "class='selected'" ?>>français (French)</a></li>
                <li><a href="?lang=gu" <?php if ($lang == "gu") echo "class='selected'" ?>>&#5265;&#5339;&#5314;&#5130;&#5328; (Gullandian)</a></li>
                <li><a href="?lang=kr" <?php if ($lang == "kr") echo "class='selected'" ?>>&#54620;&#44397;&#50612; (Korean)</a></li>
                <li><a href="?lang=jp" <?php if ($lang == "jp") echo "class='selected'" ?>>&#26085;&#26412;&#35486; (Japanese)</a></li>
                <li><a href="?lang=cn" <?php if ($lang == "cn") echo "class='selected'" ?>>&#31616;&#20307;&#20013;&#25991; (Simplified Chinese)</a></li>
            </ul>
        </div>
    </body>
</html>