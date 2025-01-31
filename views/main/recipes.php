<?php
    use yii\bootstrap5\LinkPager;
?>
<!-- main -->
<main class="page">
    <section class="recipes-container">
        
    <?= app\components\MenuTags::widget(); ?>

        <!-- recipes list -->
        <div class="recipes-list">
            <?php foreach($recipes as $recipe):?>
            <!-- single recipe -->
            <a href="/recipe/<?=$recipe->id?>" class="recipe">
                <img
                    src="/img/recipes/<?= $recipe->img ?>"
                    class="img recipe-img"
                    alt=""
                />
                <h5><?= $recipe->name?></h5>
                <p>Prep : <?=$recipe->time?>min | Cook : <?=$recipe->cooking?>min</p>
            </a>
            <!-- end of single recipe -->
            <?php endforeach;?>
        </div>
    </section>
    <?php
        // Использование LinkPager с настройками
        echo LinkPager::widget([
        'pagination' => $pages,      
        ]);
    ?>
</main>
<!-- end of main -->
