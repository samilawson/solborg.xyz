<!DOCTYPE html>
<html>
    <head>
        <title>SRK Nyheter Admin Panel</title>
    </head>
    <body>
        <?php
        $pw = $_POST["password"];
        $status = $_COOKIE["srk456"];
        
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
                setcookie("srk456", "true");
                echo "
                    <h1>Make New Post</h1>
                    <form action='' method='post'>
                        <p>File name:</p>
                        <input type='text' name='filename'>.md
                        <p>Markdown code:</p>
                        <textarea name='content'></textarea>
                        <p>Read it over before posting!</p>
                        <button>Publish Post</button>
                    </form>
                ";
            } else if ($status == "true") {
                $filename = "posts/" . $_POST["filename"] . ".md";
                $content = $_POST["content"];
                
                $postfile = fopen($filename, "w");
                fwrite($postfile, $content);
                fclose($postfile);
                
                setcookie("srk456", "false");
            } else {
                echo "Incorrect password.";
            }
        }
        ?>
    </body>
</html>