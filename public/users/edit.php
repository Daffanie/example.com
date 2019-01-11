<?php

require '../../core/functions.php';
require '../../core/session.php';
require '../../config/keys.php';
require '../../core/db_connect.php';

//Get the user

$get = filter_input_array(INPUT_GET);
$id = $get['id'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE id=:id");
$stmt->execute(['id'=>$id]);

$row = $stmt->fetch();

//If the id cannot be found kill the request
if(empty($row)){
  http_response_code(404);
  die('Page Not Found <a href="/">Home</a>');
}

$meta=[];
$meta['title']="Edit: {$row['first_name']} {$row['last_name']}";

//Update the user
$message = null;

$args = [
    'first_name'=>FILTER_SANITIZE_STRING, //strips HMTL
    'last_name'=>FILTER_SANITIZE_STRING, //strips HMTL
    'email'=>FILTER_SANITIZE_Email,  //strips HMTL
    'id'=>FILTER_SANITIZE_STRING,  //strips HMTL
];


$input = filter_input_array(INPUT_POST, $args);

if(!empty($input)){

    //Strip white space, from beginning and ending
    $input = array_map('trim', $input);

    //Sanitized insert
    $sql = 'UPDATE
        users
      SET
        first_name=:first_name,
        last_name=:last_name,
        email=:email,
      WHERE
        id=:id';

    if($pdo->prepare($sql)->execute([
        'first_name'=>$input['first_name'],
        'last_name'=>$input['last_name'],
        'email'=>$input['email'],
        'id'=>$input['id']
    ])){
       header('LOCATION:/users/view.php?id=' . $row['id']);
    }else{
        $message = 'Something bad happened';
    }
}

$content = <<<EOT
<br><br><br><h1>Edit: {$row['first_name']} {$row['last_name']}</h1>
{$message}
<form method="post">

<input name="id" value="{$row['id']}" type="hidden">

<div class="form-group">
    <br><label for="first_name">First Name</label>
    <input id="first_name" name="first_name" type="text" class="form-control">
</div>

<div class="form-group">
    <br><label for="last_name">First Name</label>
    <input id="last_name" name="last_name" type="text" class="form-control">
</div>

<div class="form-group">
    <br><label for="email">Email</label>
    <input id="email" name="email" type="email" class="form-control">
</div>

<div class="form-group">
    <input type="submit" value="Submit" class="btn btn-primary">
</div>

</form>

EOT;

include '../../core/layout.php';
