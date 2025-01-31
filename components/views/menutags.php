<!-- tag container -->
<div class="tags-container">
    <h4>recipes</h4>
    <div class="tags-list">
        <?php foreach ($tags as $tag): ?>
            <?php if($tag->countRecipes): ?>
                <a href="/tag/<?= $tag->id?>"><?= $tag->name ?> (<?= $tag->countRecipes ?>) </a>
            <?php endif; ?>
        <?php endforeach ?>
    </div>
</div>
<!-- end of tag container -->