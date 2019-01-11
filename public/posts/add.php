<?php
require '../../core/functions.php';
require '../../core/session.php';
require '../../config/keys.php';
require '../../core/db_connect.php';

$args = [
    'title'=>FILTER_SANITIZE_STRING, //strips HMTL
    'meta_description'=>FILTER_SANITIZE_STRING,  //strips HMTL
    'meta_keywords'=>FILTER_SANITIZE_STRING,  //strips HMTL
    'body'=>FILTER_UNSAFE_RAW  //NULL Filter
];

$input = filter_input_array(INPUT_POST, $args);

if(!empty($input)){

    //Strip white space, from beginning and ending
    $input = array_map('trim', $input);

    //Allow only whitelisted HTML
    $input['body'] = cleanHTML($input['body']);

    //Create a slug
    $slug = slug($input['title']);

    //Sanitized insert
    $sql = 'INSERT INTO posts SET id=uuid(), title=?, slug=?, body=?, meta_keywords=?, meta_description=?';

    if($pdo->prepare($sql)->execute([
        $input['title'],
        $slug['slug'],
        $input['body'],
        $input['meta_keywords'],
        $input['meta_description']
    ])){
       header('LOCATION:/posts/view.php?slug=' . $slug);
    }else{
        $message = 'Something bad happened';
    }
}

$content = <<<EOT
<br><br><br><h1>Add a New Post</h1>
<form method="post">

<div class="form-group">
    <br><label for="title">Title</label>
    <input id="title" name="title" type="text" class="form-control">
</div>

<div class="form-group">
    <label for="body">Body</label>
    <textarea id="body" name="body" rows="8" class="form-control"></textarea>
</div>

<div class="row">
    <div class="form-group col-md-6">
        <label for="meta_description">Description</label>
        <textarea id="meta_description" name="meta_description" rows="2" class="form-control"></textarea>
    </div>

    <div class="form-group col-md-6">
        <label for="meta_keywords">Keywords</label>
        <textarea id="meta_keywords" name="meta_keywords" rows="2" class="form-control"></textarea>
    </div>
</div>

<div class="form-group">
    <input type="submit" value="Submit" class="btn btn-primary">
</div>
</form>

EOT;

include '../../core/layout.php';
