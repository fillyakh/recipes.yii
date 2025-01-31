<!-- main -->
<main class="page">
      <!-- header -->
      <header class="hero">
        <div class="hero-container">
          <div class="hero-text">
            <h1>simply recipes</h1>
            <h4>no fluff, just recipes</h4>
          </div>
        </div>
      </header>
      <!-- end of header -->
      <section class="recipes-container">

      <?= app\components\MenuTags::widget(); ?>

        <!-- recipes list -->
        <div class="recipes-list">
          <?php foreach($recipes as $recipe): ?>
          <!-- single recipe -->
          <a href="/recipe/<?= $recipe['id']?>" class="recipe">
            <img
              src="/img/recipes/<?php echo $recipe['img']; ?>"
              class="img recipe-img"
              alt=""
            />
            <h5><?php echo $recipe['name']; ?></h5>
            <p>Prep :<?php echo $recipe['time']; ?>min | Cook : <?php echo $recipe['cooking']; ?>min</p>
          </a>
          <!-- end of single recipe -->
           <?php endforeach;?>
        </div>
        <!-- end of recipes list -->
      </section>
    </main>
    <!-- end of main -->