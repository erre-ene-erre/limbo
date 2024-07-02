<?php snippet('header') ?>
<section class='row top'>
    <div><?= $page -> info() ?></div>
    <div class='extras'>
        <?php foreach($page->links()->toStructure() as $button): ?>
            <span class='button'><a href='<?=$button -> link()-> toUrl()?>' target="_blank"><?= $button -> text() ?></a></span>
        <?php endforeach ?>
        <?php foreach($page->extrafiles()->toStructure() as $button): ?>
            <span class='button'><a href='<?=$button -> media()-> toFile() -> url() ?>' target="_blank"><?= $button -> text() ?></a></span>
        <?php endforeach ?>
        <?php if($page -> children() -> count() > 1): ?>
            <span class='button prev'>← Image</span>
            <span class='button next'>Image →</span>
        <?php endif ?>
    </div>
</section>
<section class='row bottom'>
    <?php if($page -> hasChildren()):?>
    <?php foreach($page -> children() ->sortBy('num', 'asc') as $child): ?>
        
        <?php if ($image = $child->image()) : ?>
            <figure class='gallery-item <?php e($child->num() == '1', 'active')?>' data-position='<?=$child->num()?>'>
            <a href="<?= $child->url() ?>">
                <img loading="lazy" class='<?= $image -> orientation() ?>' alt="<?= $image -> alt() ?>"
                <?php if($image ->mime() === 'image/gif'): ?>
                    src= "<?= $image -> url() ?>"
                <?php else: ?>
                    data-src="<?= $image -> resize(400) -> quality(72) -> url() ?>"
                    data-srcset="<?= $image -> srcset() ?>"
                    data-sizes="auto"
                <?php endif ?>
                >
            </a>
            </figure>
        <?php endif ?>
        
    <?php endforeach ?>
    <?php endif ?>
</section>
<?php snippet('footer') ?>