<br><br><br><br>
<?php
$data = $_POST;

foreach($data as $key => $value){
  echo "{$key} = {$value}<br>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Daffanie Hurley</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./dist/css/main.css">
    <script src="main.js"></script>
</head>

<body>
    <header>
        <span class="logo">Daffanie Hurley Website</span>
        <a id="toggleMenu">Menu</a>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="resume.php">Resume</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
    </header>

<main>

    <form action="contact.php" method="POST">
        <h1>Contact Form</h1>
        <div>
            <label for="name">Name</label>
            <input id="name" type="text" name="name">
        </div>

        <div>
            <label for="email">Email</label>
            <input id="email" type="text" name="replyto">
        </div>

        <div>
            <label for="message">Message</label>
            <textarea id="message" name="message"></textarea>
        </div>

        <div>
            <input type="hidden" name="subject" value="New submission!">
        </div>

        <div>
            <input type="submit" value="Send">
        </div>
     </form>
     <script>
            var toggleMenu = document.getElementById('toggleMenu');
          var nav = document.querySelector('nav');
          toggleMenu.addEventListener(
            'click',
            function(){
              if(nav.style.display=='block'){
                nav.style.display='none';
              }else{
                nav.style.display='block';
              }
            }
          );

    </script>
</main>
</body>
</html>
