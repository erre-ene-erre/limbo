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
    <div><?= $page -> eventinfo() ?></div>
</section>
<section class='column right'>
    <?php if($page -> hasImages()):?>
    <?php foreach($page -> children() as $image): ?>
    <a href="<?= $image->url() ?>">
    <figure class='gallery-item <?php e($image->sort() == '1', 'active')?>'>
        <img loading="lazy" alt="<?= $image -> alt() ?>"
        <?php if($image ->mime() === 'image/gif'): ?>
            src= "<?= $image -> url() ?>"
        <?php else: ?>
            data-src="<?= $image -> resize(400) -> quality(72) -> url() ?>"
            data-srcset="<?= $image -> srcset() ?>"
            data-sizes="auto"
        <?php endif ?>
        >
    </figure>
    </a>
    <?php endforeach ?>
    <?php endif ?>
</section>
<?php snippet('footer') ?>
