<html>
    <?php
    if (isset($_GET["mobilecode"])) {
        $thecode = $_GET["mobilecode"];
        $nation = "solborg";
        echo "<span style='display:none'>Mobile Code Found: $thecode</span>";
    } else {
        header("Location: mobilepostcode.html"); /* Redirect browser */
        exit();
    }
    ?>
    <head>
        <title>Make a Post (iOS App)</title>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="assets/css/postApp.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:700" rel="stylesheet">
    </head>
    <body>
        <h1>Create New Post</h1>
        
        <h2>Your Information</h2>
        <div class="container">
            <p>Posting as: <?php echo $nation; ?></p>
            <p>Current date: <?php echo date("d M Y"); ?></p>
        </div>
        
        <form action="mobilepost.php" method="post">
            <input type="hidden" name="nation" value="<?php echo $nation; ?>">
            <input type="hidden" name="mobilecode" value="<?php echo $thecode; ?>">
            
            <h2>Post Information</h2>
            <div class="container">
                <p>Post title:</p>
                <input type="text" name="title" class="textbox">
                <p>Category label:</p>
                <input type="text" name="category" class="textbox">
                <p>Nations involved:</p>
                <input type="text" name="category" class="textbox">
            </div>
            
            <h2>Post Content</h2>
            <div class="container">
                <textarea name="post"></textarea>
                <p>Make sure you read over your post before publishing.</p>
                <button>Publish Post</button>
            </div>
        </form>
    </body>
</html>