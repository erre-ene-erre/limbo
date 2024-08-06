<?php 

$type = $kirby -> collection('all-events') -> pluck('eventtype', ',', true);
$place = $kirby -> collection('all-events') -> pluck('location', ',', true);
?>

<div class='top submenu'>
<?php if($page -> isHomePage()): ?>
    <?php $hasFilter = param('type') || param('at'); ?>
    <span class='button fill <?php e(! $hasFilter, 'active')?>'>
        <a href='<?= url('home') ?>'>All</a>
    </span>
    <?php foreach($type as $tag): ?>
        <span class='button fill <?php e(param('type') == $tag, 'active')?>'>
            <a href="<?= url('home', ['params' => ['type' => $tag]]) ?>"><?= html($tag) ?></a>
        </span>
    <?php endforeach ?>
    <?php foreach($place as $tag): ?>
        <span class='button fill <?php e(param('at') == $tag, 'active')?>'>
            <a href="<?= url('home', ['params' => ['at' => $tag]]) ?>"><?= html($tag) ?></a>
        </span>
    <?php endforeach ?>
<?php elseif($is_event): ?>
    <span class='button lightbox active'>
        <a href="<?= url('home', ['params' => ['type' => $page -> eventtype()]]) ?>"><?= $page -> eventtype() ?></a>
    </span>
    <span class='button lightbox active'>
        <a href="<?= url('home', ['params' => ['at' => $page -> location()]]) ?>"><?= $page -> location() ?></a>
    </span>
<?php elseif($is_event or $is_media or $is_pdf): ?>
    <span class='button lightbox active'>
        <a href='<?= $page ->parent() -> url() ?>'><?= $page -> parent() -> title() ?></a>
    </span>
<?php endif ?>
<?php if($is_media or $is_event): ?>
<?php else: ?>
<span class='close-menu button fill'><?php echo t('close') ?></span>
<?php endif?>
</div>