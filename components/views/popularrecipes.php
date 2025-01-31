<section class="featured-recipes">
    <h5 class="featured-title">Look At This Awesomesouce!</h5>
    <div class="recipes-list">
        <?php foreach($recipes as $recipe): ?>
        <!-- single recipe -->
        <a href="single-recipe.html" class="recipe">
            <img
                src="/img/recipes/<?= $recipe->img ?>"
                class="img recipe-img"
                alt=""
            />
            <h5><?= $recipe->name ?></h5>
            <p>Prep : <?= $recipe->time ?> min | Cook : <?= $recipe->cooking ?> min</p>
        </a>
        <!-- end of single recipe -->
        <?php endforeach ?>
    </div>
</section>