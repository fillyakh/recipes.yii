<main class="page">
    <section class="tags-wrapper">
        <?php foreach($tags as $tag): ?>
        <?php if ($tag->countRecipes): ?>
        <!-- single tag -->
        <a href="/tag/<?= $tag['id'] ?>" class="tag">
            <h5><?= $tag['name'] ?></h5>
            <p><?= $tag->countRecipes ?> recipe</p>
        </a>
        <!-- end of single tag -->
         <?php endif; ?>
        <?php endforeach; ?>
    </section>
</main>