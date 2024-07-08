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
    </span>
    <?php foreach($kirby->languages() as $language): ?>
        <span class='button fill <?php e($kirby->language() == $language, 'active')?>'>
            <a href='<?= $page->url($language->code()) ?>' hreflang="<?php echo $language->code() ?>"> <?= html($language->name()) ?> </a>
        </span> 
    <?php endforeach ?>
<?php elseif($is_media): ?>
    <span class='button lightbox active'>
        <a href='<?= $page ->parent() -> url() ?>'><?= $page -> parent() -> title() ?></a>
    </span>
<?php endif ?>
</div>