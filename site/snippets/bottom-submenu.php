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
        <span class='button fill <?php e($kirby->language() == $language, 'hidden')?>'>
            <a href='<?= $page->url($language->code()) ?>' hreflang="<?php echo $language->code() ?>"> <?= html($language->name()) ?> </a>
        </span> 
    <?php endforeach ?>
<?php elseif($is_media): ?>
    <span class='button lightbox active'><?= $page -> parent() -> title() ?></span>
<?php endif ?>
</div>
