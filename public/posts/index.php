<?php
require '../../core/functions.php';
require '../../core/session.php';
require '../../config/keys.php';
require '../../core/db_connect.php';


$meta=[];
$meta['title']="Bob's Blog";

$content="<br><br><br><h1>Blog Posts</h1>";
$stmt = $pdo->query('SELECT * FROM posts');

while($row = $stmt ->fetch()){
  $content .= "<div><a href=\posts/view.php?slug={$row['slug']}\">{$row['title']}</a></div>";
}

$content .= "<br><br><br><hr><div><a href=\"posts/add.php\">New Post</a></div>";
require '../../core/layout.php';
