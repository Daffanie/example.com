<?php
require '../core/processContactForm.php';
$meta=[];
$meta['title']='Contact Daffanie';
$meta['Description']='Contact Daffanie';

$content = <<<EOT
  {$message}

      <div class="jumbotron">
          <h1 class="display-6"><br>Hi, I am Daffanie Hurley</h1>
          <p img class="avatar" style="border-radius: 50%; float: left; margin-right: 1em;" src="https://www.gravatar.com/avatar/4678a33bf44c38e54a58745033b4d5c6?d=mm&s=64/nav"
          alt="D.Hurley">
          Hello, my name is Daffanie and I am a vegan.</p>
          <hr class="my-4">
          <p>I stopped eat meat two years ago after looking at documentaries "Forks Over Knifes" and "The China Study". My
              experience going meatless has been positive with very little cravings. I have to admit
              that I do eat meat on special occassions for instance holidays (Thansgiving, Christmas,
              and Memorial Day). </p>
          <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
      </div>

    <br>
    <br>
  <div class="container">
    <div class="row" >
        <div class="col-sm-3">
            <div class="card">
              <span class="border border-primary">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body text-primary">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </span>
              </div>
            </div>
          </div>

      <div class="col-sm-3">
          <div class="card">
            <span class="border border-primary">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body text-primary">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </span>
            </div>
          </div>
        </div>

      <div class="col-sm-3">
        <div class="card" >
          <span class="border border-primary">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body text-primary">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </span>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card">
          <span class="border border-primary">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body text-primary">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </span>
          </div>
        </div>
      </div>
    </div>
  </div>

EOT;

require '../core/layout.php';




