
    <?php
      use yii\helpers\Html; 
    ?>
    <main class="page">
     <section class="contact-container">
          <article class="contact-info">
            <h3>Want To Get In Touch?</h3>
            <p>
              Four dollar toast biodiesel plaid salvia actually pickled banjo
              bespoke mlkshk intelligentsia edison bulb synth.
            </p>
            <p>Cardigan prism bicycle rights put a bird on it deep v.</p>
            <p>
              Hashtag swag health goth air plant, raclette listicle fingerstache
              cold-pressed fanny pack bicycle rights cardigan poke.
            </p>
          </article>
          <article>
          <?php if(Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success">
              <?= Yii::$app->session->getFlash('success') ?>
            </div>
          <?php endif; ?>
          <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $attribute => $messages): ?>
                        <li><strong><?= $attribute ?>:</strong> <?= implode(', ', $messages) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
          <?php endif; ?>
            <form class="form contact-form" action="message/create" method="POST">
              <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken) ?>  
              <div class="form-row">
                <label html="name" class="form-label">your name</label>
                <input type="text" name="name" id="name" class="form-input" value="<? if ($oldData) echo $oldData['name'] ?>"/>
              </div>
              <div class="form-row">
                <label html="email" class="form-label">your email</label>
                <input type="text" name="email" id="email" class="form-input" value="<?if ($oldData) echo $oldData['email']?>"/>
              </div>
              <div class="form-row">
                <label html="message" class="form-label">message</label>
                <textarea name="message" id="message" class="form-textarea" ><?if ($oldData) echo $oldData['message'] ?></textarea>
              </div>
              <button type="submit" class="btn btn-block">
                submit
              </button>
            </form>
          </article>
        </section>
     <!-- featured recipes -->
       <section class="featured-recipes">
        <h5 class="featured-title">Look At This Awesomesouce!</h5>
        <div class="recipes-list">
          <?php foreach ($recipes as $recipe): ?>
          <!-- single recipe -->
          <a href="single-recipe.html" class="recipe">
            <img
              src="/web/img/recipes/<?= $recipe->img ?>"
              class="img recipe-img"
              alt=""
            />
            <h5><?= $recipe->name ?></h5>
            <p>Prep :<?= $recipe->time ?> min | Cook : <?= $recipe->cooking?> min</p>
          </a>
          <!-- end of single recipe -->
           <?php endforeach; ?>
        </div>
      </section>
    </main>
