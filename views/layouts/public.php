<?php
/** @var yii\web\View $this */
/** @var string $content */

  use app\assets\PublicAsset;
  use app\components\MyWidget;

  PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php $this->head() ?>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simply Recipes || Final</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" />    
  </head>
  <body>
  <?php $this->beginBody() ?>
    <!-- nav  -->
    <nav class="navbar">
      <div class="nav-center">
        <div class="nav-header">
          <a href="/" class="nav-logo">
            <img src="/img/logo.svg" alt="simply recipes" />
          </a>
          <button class="nav-btn btn">
            <i class="fas fa-align-justify"></i>
          </button>
        </div>
        <div class="nav-links">
          <a href="/" class="nav-link"> home </a>
          <a href="/about" class="nav-link"> about </a>
          <a href="/tags" class="nav-link"> tags </a>
          <a href="/recipes" class="nav-link"> recipes </a>
          <a href="/admin" class="nav-link">admin</a>

          <div class="nav-link contact-link">
            <a href="/contact" class="btn"> contact </a>
          </div>
        </div>
      </div>
    </nav>
    <!-- end of nav -->

   

    <?= $content ?>

    <!-- footer -->
    <footer class="page-footer">
      <p>
        &copy; <span id="date"></span>
        <span class="footer-logo">SimplyRecipes</span> Built by
        <a href="https://www.johnsmilga.com/">Coding Addict</a>
      </p>
    </footer>
    <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage() ?>