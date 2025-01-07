    <main class="page">
      <div class="recipe-page">
        <section class="recipe-hero">
          <img
            src="/img/recipes/<?= $recipe->img ?>"
            class="img recipe-hero-img"
          />
          <article class="recipe-info">
            <h2><?= $recipe->name ?></h2>
            <p><?= $recipe->description ?></p>
            <div class="recipe-icons">
              <article>
                <i class="fas fa-clock"></i>
                <h5>prep time</h5>
                <p><?= $recipe->time?> min.</p>
              </article>
              <article>
                <i class="far fa-clock"></i>
                <h5>cook time</h5>
                <p><?=$recipe->cooking?> min.</p>
              </article>
              <article>
                <i class="fas fa-user-friends"></i>
                <h5>serving</h5>
                <p>6 servings</p>
              </article>
            </div>
            
            <p class="recipe-tags">
              Tags : 
              <?php foreach($recipe->tags as $tag):?>
              <a href="tag-template.html"><?= $tag->name ?></a>
              <? endforeach?>
            </p>
            
          </article>
        </section>
        <!-- content -->
        <section class="recipe-content">
          <article>
            <h4>instructions</h4>
            <?php foreach($recipe->instructions as $instruction):?>
            <!-- single instruction -->
            <div class="single-instruction">
              <header>
                <p>step <?= $instruction->step ?></p>
                <div></div>
              </header>
              <p><?= $instruction->name?></p>
            </div>
            <!-- end of single instruction -->
             <?php endforeach; ?>
          </article>
          <article class="second-column">
            <div>
              <h4>ingredients</h4>
              <?php foreach($recipe->ingredients as $ingredient): ?>
                <p class="single-ingredient"><?= $ingredient->name?></p>
              <?php endforeach;?>
            </div>
            <div>
              <h4>tools</h4>
              <?php foreach($recipe->tools as $tool): ?>
              <p class="single-tool"><?= $tool->name?></p>
              <?php endforeach ?>
            </div>
          </article>
        </section>
      </div>
    </main>
