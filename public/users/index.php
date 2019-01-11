<?php
require '../../core/functions.php';
require '../../core/session.php';
require '../../config/keys.php';
require '../../core/db_connect.php';


$meta=[];
$meta['title']="Daffanie's Blog";

$content="<br><br><br><h1> User Blog Users</h1>";
$stmt = $pdo->query('SELECT * FROM users');

while($row = $stmt ->fetch()){
  $content .= "<div><a href=\users/users/view.php?>slug={$row['slug']}\">{$row['title']}</a></div>";
}

$content .= "<br><br><br><hr><div><a href=\"users/add.php\">New User</a></div>";
require '../../core/layout.php';
