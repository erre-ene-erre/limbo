<?php snippet('header') ?>

<?php if ($image = $page->image()) : ?>
<figure class='lightbox <?=$image -> orientation()?>'>
<a href='javascript:history.back();'>
    <img loading="lazy" alt="<?= $image -> alt() ?>"
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

</figure>

<?php snippet('footer') ?>
