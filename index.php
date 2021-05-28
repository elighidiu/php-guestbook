<!--  
- Separate HTML & PHP code
- Write your footer and header HTML code and require() them in your template files in separate files to avoid repeating HTML code 
- A user is displayed a form, which he or she must fill out.
- A confirmation message is displayed to the user when the comment is saved in the database.
- A user can browse through all the comments posted till now on the website. 
- Validation FORM 
- Store the message 
- Posts must have the following attributes:
        - Title
        - Date
        - Content
        - Author name

-->
<?php

require "include/formvalidator.php";

if(isset($_POST["submit"])){
    $test = new userValidator($_POST["title"], $_POST["date"], $_POST["content"], $_POST["author"]);

   
    $test->validateAll();
    var_dump($test->getErrors());
    var_dump($test->getTitle());
    var_dump($test->getDate());
    var_dump($test->getContent());
    var_dump($test->getAuthor());

    if(file_exists("messages.json")){
        var_dump($test);
        $inp = file_get_contents("messages.json");
        $tempArray = json_decode($inp);
        array_push($tempArray, $test);
        var_dump($tempArray);
        $jsonData = json_encode($tempArray);
        file_put_contents("messages.json", $jsonData);
    }

}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require ("view/header.php") ?>

    <!-- 
        The $_SERVER["PHP_SELF"] sends the submitted form data to the page itself, instead of jumping to a different page. This way, the user will get error messages on the same page as the form.
        The htmlspecialchars() function converts special characters to HTML entities. This means that it will replace HTML characters like < and > with &lt; and &gt;. This prevents attackers from exploiting the code by injecting HTML or Javascript code (Cross-site Scripting attacks) in forms.
     -->
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
        <div class="form-row">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" class="form-control" value=""/>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="title" name="date" class="form-control" value=""/>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="content">Content:</label>
                <input type="text" id="title" name="content" class="post-control" value=""/>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" id="title" name="author" class="form-control" value=""/>
            </div>
        </div>
            
        <button type="submit" class="btn" name="submit" value="append">Post message!</button>
    </form>

    <?php 
    // I have changed the code below into OOP 
       /*  $inp = file_get_contents("messages.json");
         $tempArray = json_decode($inp);

         foreach($tempArray as $message){
             echo "</br>" .$message->title;
             echo "</br>" .$message->date;            
             echo "</br>" .$message->content;            
             echo "</br>" .$message->author;
             echo "<hr>";
         }
         */ 

        $guestbook = new Guestbook;
        $guestbook->showMessages();
        
    ?>

    <?php require ("view/footer.php") ?>
</body>
</html>