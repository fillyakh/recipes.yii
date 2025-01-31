<main class="page">
  <div class="featured-recipes">
    <h4><?= $tag->name ?></h4>
      <!-- recipes list -->
    <div class="recipes-list">
      <!-- single recipe -->
      <?php foreach($tag->recipes as $recipe): ?>
      <a href="/recipe/<?= $recipe->id ?>" class="recipe">
        <img
          src="/img/recipes/<?= $recipe->img ?>"  
          class="img recipe-img"
          alt=""
        />
        <h5><?= $recipe->name ?></h5>
        <p>Prep : <?= $recipe->time ?> min | Cook : <?= $recipe->cooking ?> min</p>
      </a>
      <!-- end of single recipe -->
      <?php endforeach; ?>
  </div>
</main>