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

    <form method="POST"> 
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
            
        <button type="submit" class="btn" name="submit">Post message!</button>
    </form>

    <?php require ("view/footer.php") ?>
</body>
</html>