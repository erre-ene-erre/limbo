<?php snippet('header') ?>
    <!-- Current / upcoming events -->
<?php if(param('type') || param('at')): ?>
<?php else: ?>
    <?php if(collection('current-upcoming-events') -> isNotEmpty()): ?>
        <div class='year-container'>
            <h1 class='year'><?php echo t('curr-up') ?></h1>
        </div>
        <?php foreach(collection('current-upcoming-events') as $event): ?>
        <article class='event current'>
        <a href='<?=$event -> url() ?>'>
            <div class="information">
                <h1 class='title' title="<?= $event -> title() ?>">
                        <?= $event -> title() ?>
                </h1>
                <div class="left-info">
                    <?php $date = param('date') ? date('Ymd',strtotime(param('date'))) : date('Ymd'); ?>
                    <h2 class='artist'><?=$event -> artist() ?></h2>
                    <h3 class='dates'><?php  snippet('date-set', ['page' => $event]) ?></h3>
                    <h2 class='event-type'><?= $event -> eventtype() ?></h2>, 
                    <h2 class='place'><?= $event -> location() ?></h2>
                </div>
                <div class="right-info">
                </div>
            </div>
            <?php if($event -> hasImages()):?>
            <?php $icon = $event -> files() -> template('media-file') -> sortBy('sort', 'asc') -> first()?> 
            <figure class="image-icon">
                <img loading="lazy" alt="<?= $icon -> alt() ?>"
                <?php if($icon ->mime() === 'image/gif'): ?>
                    src= "<?= $icon -> url() ?>"
                <?php else: ?>
                    data-src="<?= $icon -> resize(400) -> quality(72) -> url() ?>"
                    data-srcset="<?= $icon -> srcset() ?>"
                    data-sizes="auto"
                <?php endif ?>
                >
            </figure>
            <?php endif ?>
        </a>
        </article>
        <?php endforeach ?>
    <?php endif ?>
<?php endif ?>
    
    <!-- Previous events and filters -->
    <?php 
        $events = $kirby -> collection('past-events');
        if($tag = param('type')){
            $events = $kirby -> collection('all-events') ->filterBy('eventtype', param('type'), ',');
        }else if($tag = param('at')){
            $events = $kirby -> collection('all-events') ->filterBy('location', param('at'), ',');
        }
    ?>
    <?php foreach($events as $event): ?>
        <?php $year = $event -> datestart() -> toDate("Y") ?>
        <?php if($event -> hasPrev(collection('past-events'))): ?> 
            <?php $prevYear = $event -> prev(collection('past-events')) -> datestart() -> toDate("Y") ?>
            <?php if($year != $prevYear): ?>
            <div class='year-container'>
                <h1 class='year'><?= $year ?></h1>
            </div>
            <?php endif ?>
        <?php else: ?>
            <div class='year-container'>
                <h1 class='year'><?= $year ?></h1>
            </div>
        <?php endif ?>

        <article class='event past'>
        <a href='<?=$event -> url() ?>'>
            <div class="information">
                <h1 class='title' title="<?= $event -> title() ?>">
                    <?= $event -> title() ?>
                </h1>
                <div class="left-info">
                    <?php $date = param('date') ? date('Ymd',strtotime(param('date'))) : date('Ymd'); ?>
                    <h2 class='artist'><?=$event -> artist() ?></h2>
                    <h3 class='dates'><?php  snippet('date-set', ['page' => $event]) ?></h3>
                    <h2 class='event-type'><?= $event -> eventtype() ?></h2>, 
                    <h2 class='place'><?= $event -> location() ?></h2>
                </div>
                <div class="right-info">
                    
                </div>
            </div>
            <?php if($event -> hasImages()):?>
            <?php $icon = $event -> files() -> template('media-file') -> sortBy('sort', 'asc') -> first()?>
            <figure class="image-icon">
                <img loading="lazy" alt="<?= $icon -> alt() ?>"
                <?php if($icon ->mime() === 'image/gif'): ?>
                    src= "<?= $icon -> url() ?>"
                <?php else: ?>
                    data-src="<?= $icon -> resize(400) -> quality(72) -> url() ?>"
                    data-srcset="<?= $icon -> srcset() ?>"
                    data-sizes="auto"
                <?php endif ?>
                >
            </figure>
            <?php endif ?>
        </a>
        </article>
    <?php endforeach ?>

<?php snippet('footer') ?>