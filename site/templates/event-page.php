<?php snippet('header') ?>

<section class='column left'>
    <div class='gral-info'>
        <h1 class='title'><?= $page -> title() ?></h1>
        <h2 class='artist'><?= $page -> artist() ?></h2>
        <h3 class='dates'><?php snippet('date-set') ?></h3>
        <h1 class='year'><?= $page -> datestart() -> toDate('Y') ?></h1>

    </div>
    <div class='extras'>
        <?php foreach($page->extrafiles()->toStructure() as $button): ?>
            <span class='button'><a href='<?=$button -> media()-> toFile() -> url() ?>' target="_blank"><?= $button -> text() ?></a></span>
        <?php endforeach ?>
    </div>
    <div><?= $page -> eventinfo() ?></div>
    <div class='credits'>
        <?php foreach($page -> children() as $child): ?>
        <?php if ($image = $child->image()) : ?>
            <h6 class='<?php e(!$image ->caption() ->isNotEmpty(), 'no-border')?> <?php e($child ->isFirst(), 'shown')?>'><?= $image -> caption() ?></h6>
        <?php endif ?>
        <?php endforeach ?>
    </div>
</section>
<section class='column right'>
    <?php if($page -> hasChildren()):?>
        <span class='button prev'><</span>
        <span class='button next'>></span>
    <?php foreach($page -> children() as $child): ?>
        
        <?php if ($image = $child->image()) : ?>
            <figure class='gallery-item <?php e($child ->isFirst(), 'shown')?>' data-hasnext='<?=$child->hasNext()?>' data-hasprev='<?=$child->hasPrev()?>'>
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
