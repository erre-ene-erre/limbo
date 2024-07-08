<div class='bottom submenu'>
<?php if($page -> isHomePage() or $is_info): ?>
    <?php foreach($site -> children() -> template('info-page') as $item): ?>
        <span class='button fill <?php e($page->title() == $item->title(), 'active')?>'>
            <a href='<?= $item -> url() ?>'> <?= $item -> title() ?> </a>
        </span> 
    <?php endforeach ?>
    <span class='button fill <?php e($page->isHomePage(), 'active')?>'>
        <a href='<?= $site -> homePage() -> url() ?>'><?php echo t('events') ?></a>
    </span>
    <?php foreach($kirby->languages() as $language): ?>
        <span class='button fill <?php e($kirby->language() == $language, 'active')?>'>
            <a href='<?= $page->url($language->code()) ?>' hreflang="<?php echo $language->code() ?>"> <?= html($language->name()) ?> </a>
        </span> 
    <?php endforeach ?>
<?php elseif($is_event): ?>
    <?php if($page -> children() -> count() > 1): ?>
        <span class='button prev'>← Image</span>
        <span class='button next'>Image →</span>
    <?php endif ?>
<?php elseif($is_media): ?>
    <?php if(!$page ->hasPrevListed()):?><span class='button hide'>← Image</span><?php endif ?>
    <?php if($page ->hasPrevListed()):?>
    <span class='button'>
        <a href='<?= $page -> prevListed() -> url() ?>'>← Image</a>
    </span>
    <?php endif ?>
    <?php if($page ->hasNextListed()):?>
    <span class='button'>
        <a href='<?= $page -> nextListed() -> url() ?>'>Image →</a>
    </span>
    <?php endif ?>
    <?php if(!$page ->hasNextListed()):?><span class='button hide'>Image →</span><?php endif ?>
<?php endif ?>
</div>
