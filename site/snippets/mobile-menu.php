<div class="mobile-menu">
<?php if($page -> isHomePage()): ?>
    <?php 
        $type = $kirby -> collection('all-events') -> pluck('eventtype', ',', true);
        $place = $kirby -> collection('all-events') -> pluck('location', ',', true);
    ?>
    <div class='filters-container'>
        <span class='button openSub' data-text='Filters'>Filters</span>
        <div class='filters-mobile'>
        <?php $hasFilter = param('type') || param('at'); ?>
            <span class='button <?php e(! $hasFilter, 'active')?>'>
                <a href='<?= url('home') ?>'>All</a>
            </span>
        <?php foreach($type as $tag): ?>
            <span class='button <?php e(param('type') == $tag, 'active')?>'>
                <a href="<?= url('home', ['params' => ['type' => $tag]]) ?>"><?= html($tag) ?></a>
            </span>
        <?php endforeach ?>
        <?php foreach($place as $tag): ?>
            <span class='button <?php e(param('at') == $tag, 'active')?>'>
                <a href="<?= url('home', ['params' => ['at' => $tag]]) ?>"><?= html($tag) ?></a>
            </span>
        <?php endforeach ?>
        </div>
    </div>
<?php endif ?>
<?php if($page -> isHomePage() or $is_info or $is_event): ?>
    <div class='nav-container'>
        <span class='button openSub' data-text='Menu'>Menu</span>
        <div class="nav-mobile">
             <?php foreach($site -> children() -> template('info-page') as $item): ?>
            <span class='button <?php e($page->title() == $item->title(), 'active')?>'>
                <a href='<?= $item -> url() ?>'> <?= $item -> title() ?> </a>
            </span> 
        <?php endforeach ?>
        <span class='button <?php e($page->isHomePage(), 'active')?>'>
            <a href='<?= $site -> homePage() -> url() ?>'><?php echo t('events') ?></a>
        </span>
        <div class='languages'>
        <?php foreach($kirby->languages() as $language): ?>
            <span class='button <?php e($kirby->language() == $language, 'active')?>'>
                <a href='<?= $page->url($language->code()) ?>' hreflang="<?php echo $language->code() ?>"> <?= html($language->name()) ?> </a>
            </span> 
        <?php endforeach ?>
        </div>
        </div>
    </div>
<?php endif ?>
</div>