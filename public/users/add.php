<?php
require '../../core/functions.php';
//require '../../core/session.php';
require '../../config/keys.php';
require '../../core/db_connect.php';

$message = null;

$args = [
    'first_name'=>FILTER_SANITIZE_STRING, //strips HMTL
    'last_name'=>FILTER_SANITIZE_STRING,  //strips HMTL
    'email'=>FILTER_SANITIZE_EMAIL,  //strips HMTL\
    'password'=>FILTER_UNSAFE_RAW

];

$input = filter_input_array(INPUT_POST, $args);

if(!empty($input)){

    //Strip white space, from beginning and ending
    $input = array_map('trim', $input);

    $hash = password_hash(
      $input['password'],
      PASSWORD_BCRYPT,
      ['cost'=>14]
    );

    //Sanitized insert
    $sql = 'INSERT INTO
        users
      SET
      id=uuid(),
      first_name=?,
      last_name=?,
      email=?,
      password=?';

    if($pdo->prepare($sql)->execute([
        $input['first_name'],
        $input['last_name'],
        $input['email'],
        $hash
    ])){
       header('LOCATION:/users/view.php?email=' . $input['email']);
    }else{
        $message = 'Something bad happened';
    }
}

$content = <<<EOT
<br><br><br><h1>Add a New User</h1>

{$message}
<form method="post">

<div class="form-group">
    <br><label for="first_name">First Name</label>
    <input id="first_name" name="first_name" type="text" class="form-control">
</div>

<div class="form-group">
    <br><label for="last_name">Last Name</label>
    <input id="last_name" name="last_name" type="text" class="form-control">
</div>

<div class="form-group">
    <br><label for="email">Email</label>
    <input id="email" name="email" type="email" class="form-control">
</div>

<div class="form-group">
    <br><label for="password">Password</label>
    <input id="password" name="password" type="password" class="form-control">
</div>

<div class="form-group">
    <input type="submit" value="Submit" class="btn btn-primary">
</div>
</form>

EOT;

include '../../core/layout.php';
