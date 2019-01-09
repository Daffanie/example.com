<?php
require '../core/processContactForm.php';
$meta=[];
$meta['title']='Contact Daffanie';
$meta['Description']='Contact Daffanie';

$content = <<<EOT
  {$message}
<main>
    <br><br><br><br>
    <h1>Thanks!</h1>
    <p>Thank you for contacting me, and will get back to you ASAP!</p>
</main>

EOT;

require '../core/layout.php';

