<?php

require '../../core/functions.php';
require '../../core/session.php';
require '../../config/keys.php';
require '../../core/db_connect.php';

//Get the user

$get = filter_input_array(INPUT_GET);
$id = $get['id'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE id=:email");
$stmt->execute(['email'=>$id]);

$row = $stmt->fetch();

//If the id cannot be found kill the request
if(empty($row)){
  http_response_code(404);
  die('Page Not Found <a href="/">Home</a>');
}

$meta=[];
$meta['title']="Edit: {$row['title']}";

//Update the user
$message = null;

$args = [
    'first_name'=>FILTER_SANITIZE_STRING, //strips HMTL
    'last_name'=>FILTER_SANITIZE_STRING, //strips HMTL
    'email'=>FILTER_SANITIZE_Email,  //strips HMTL
    'id'=>FILTER_SANITIZE_STRING,  //strips HMTL
];


$input = filter_input_array(INPUT_User, $args);

if(!empty($input)){

    //Strip white space, from beginning and ending
    $input = array_map('trim', $input);

    //Allow only whitelisted HTML
    $input['body'] = cleanHTML($input['body']);


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
<br><br><br><h1>Edit: {$row['title']}</h1>
{$message}
<form method="post">

<input name="id" value="{$row['id']}" type="hidden">

<div class="form-group">
    <br><label for="title">Title</label>
    <input id="title" value="{$row['title']}" name="title" type="text" class="form-control">
</div>

<div class="form-group">
    <label for="body">Body</label>
    <textarea id="body" name="body" rows="8" class="form-control">
    {$row['body']}
    </textarea>
</div>

<div class="row">
    <div class="form-group col-md-6">
        <label for="meta_description">Description</label>
        <textarea id="meta_description" name="meta_description" rows="2" class="form-control">
        {$row['meta_description']}
        </textarea>
    </div>

    <div class="form-group col-md-6">
        <label for="meta_keywords">Keywords</label>
        <textarea id="meta_keywords" name="meta_keywords" rows="2" class="form-control">
        {$row['meta_keywords']}
        </textarea>
    </div>
</div>

<div class="form-group">
    <input type="submit" value="Submit" class="btn btn-primary">
</div>
</form>

EOT;

include '../../core/layout.php';
