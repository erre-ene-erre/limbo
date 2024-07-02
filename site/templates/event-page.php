<?php snippet('header') ?>

<section class='column left'>
    <div class='gral-info'>
        <h1 class='title'><?= $page -> title() ?></h1>
        <h2 class='artist'><?= $page -> artist() ?></h2>
        <h3 class='dates'><?php snippet('date-set') ?></h3>
        <h1 class='year'><?= $page -> datestart() -> toDate('Y') ?></h1>
        <h2 class='event-type'><?= $page -> eventtype() ?></h2>
        <h2 class='place'><?= $page -> location() ?></h2>
    </div>
    <div class='extras'>
        <?php foreach($page->extrafiles()->toStructure() as $button): ?>
            <span class='button'><a href='<?=$button -> media()-> toFile() -> url() ?>' target="_blank"><?= $button -> text() ?></a></span>
        <?php endforeach ?>
        <?php if($page -> children() -> count() > 1): ?>
            <span class='button prev'>← Image</span>
            <span class='button next'>Image →</span>
        <?php endif ?>
    </div>
    <div><?= $page -> eventinfo() ?></div>
</section>
<section class='column right'>
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
                <?php if($image -> orientation() == 'landscape'): ?>
                   <img loading="lazy" class='duplicate <?= $image -> orientation() ?>' alt="<?= $image -> alt() ?>"
                <?php if($image ->mime() === 'image/gif'): ?>
                    src= "<?= $image -> url() ?>"
                <?php else: ?>
                    data-src="<?= $image -> resize(400) -> quality(72) -> url() ?>"
                    data-srcset="<?= $image -> srcset() ?>"
                    data-sizes="auto"
                <?php endif ?>
                > 
                <?php endif ?>
            </a>
            </figure>
        <?php endif ?>
        
    <?php endforeach ?>
    <?php endif ?>
</section>
<?php snippet('footer') ?>
