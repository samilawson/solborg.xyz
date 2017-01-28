<!DOCTYPE html>
<html>
    <head>
        <title>SRK Klassisk Admin Panel</title>
    </head>
    <body>
        <?php
        $pw = $_POST["password"];
        $status = $_COOKIE["srk123"];
        
        if ($pw == null and $status != "true") {
            echo "
                <h1>Authenticate</h1>
                <form action='' method='post'>
                    <p>Enter the password in the box below:</p>
                    <input type='password' name='password'>
                    <button>Submit</button>
                </form>
            ";
        } else {
            if ($pw == "jMitch3141") {
                setcookie("srk123", "true");
                echo "
                    <h1>Make New Post</h1>
                    <form action='' method='post'>
                        <p>Name of composer:</p>
                        <input type='text' name='composer'>
                        <p>Title of piece:</p>
                        <input type='text' name='title'>
                        <p>Played by:</p>
                        <input type='text' name='artist'>
                        <p>YouTube video ID:</p>
                        <input type='text' name='id'>
                        <p>Make sure it works!</p>
                        <button>Add Piece</button>
                    </form>
                ";
            } else if ($status == "true") {
                $composer = $_POST["composer"];
                $title = $_POST["title"];
                $artist = $_POST["artist"];
                $id = $_POST["id"];
                
                $newdata = 'music.push(["' . $composer . '", "' . $title '", "' . $artist '", "' . $id . '"]);\n';
                
                $datafile = fopen("data.js", "a");
                fwrite($datafile, $newdata);
                fclose($datafile);
                
                setcookie("srk123", "false");
            } else {
                echo "Incorrect password.";
            }
        }
        ?>
    </body>
</html>