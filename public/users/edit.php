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
    'email'=>FILTER_SANITIZE_EMAIL,  //strips HMTL
    'id'=>FILTER_SANITIZE_STRING,  //strips HMTL
    'password'=>FILTER_UNSAFE_RAW
];


$input = filter_input_array(INPUT_POST, $args);

if(!empty($input)){

    //Strip white space, from beginning and ending
    $input = array_map('trim', $input);

    $hashSQL=false;
    if(!empty($input['password'])){
      $hash = password_hash(
        $input['password'],
        PASSWORD_BCRYPT,
        ['cost'=>14]
      );
      $hashSQL=",password='{$hash}'";
    }

    //Sanitized insert
    $sql = 'UPDATE
        users
      SET
        first_name=:first_name,
        last_name=:last_name,
        email=:email,
        {$hashSQL}
      WHERE
        id=:id';

    if($pdo->prepare($sql)->execute([
        'id'=>$input['id'],
        'first_name'=>$input['first_name'],
        'last_name'=>$input['last_name'],
        'email'=>$input['email'],

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

<input id="id" name="id" value="{$row['id']}" type="hidden">

<div class="form-group">
    <br><label for="first_name">First Name</label>
    <input id="first_name" value="{$row['first_name']}" name="first_name" type="text" class="form-control">
</div>

<div class="form-group">
    <br><label for="last_name">Last Name</label>
    <input id="last_name" value="{$row['last_name']}" name="last_name" type="text" class="form-control">
</div>

<div class="form-group">
    <br><label for="email">Email</label>
    <input id="email" value="{$row['email']}" name="email" type="email" class="form-control">
</div>

<div class="form-group">
    <br><label for="password">Passwird</label>
    <input id="password" name="password" type="passwor" class="form-control">
</div>

<div class="form-group">
    <input type="submit" value="Submit" class="btn btn-primary">
</div>

</form>

EOT;

include '../../core/layout.php';
