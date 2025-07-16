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
            <?php foreach($page -> children() -> template('extra-file') as $child): ?>
                <?php if($child -> slug()  == $button -> media() -> toFile() -> name()): ?>
                <span class='button'><a href='<?=$child -> url() ?>'><?= $button -> text() ?></a></span>
                <?php endif ?>
            <?php endforeach ?>
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
        <span class='button prev'>
            <svg class="icon-mobile prev" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 61.86 76.25">
                <path class="cls-1" d="M60.86,24.45l-32.16,13.59,32.16,13.76v22.88L1,46.29v-16.68L60.86,1.57v22.88Z"/>
            </svg>
        </span>
        <span class='button next'>
            <svg class="icon-mobile next" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 61.86 76.25">
                <path class="cls-1" d="M1,51.8l32.16-13.59L1,24.46V1.58l59.86,28.38v16.68L1,74.68v-22.88Z"/>
            </svg>
        </span>
    <?php foreach($page -> children() -> template('media-file') as $child): ?>
        
        <?php if ($image = $child->image()) : ?>
            <figure class='gallery-item <?php e($child ->isFirst(), 'shown')?>' 
                data-hasnext='<?=$child->hasNext() and $child -> next() -> template() =='media-file'?>' 
                data-hasprev='<?=$child->hasPrev() and $child -> prev() -> template() =='media-file'?>'>
                <img loading="lazy" class='<?= $image -> orientation() ?>' alt="<?= $image -> alt() ?>"
                <?php if($image ->mime() === 'image/gif'): ?>
                    src= "<?= $image -> url() ?>"
                <?php else: ?>
                    data-src="<?= $image -> resize(400) -> quality(72) -> url() ?>"
                    data-srcset="<?= $image -> srcset() ?>"
                    data-sizes="auto"
                <?php endif ?>
                >                
            </figure>
        <?php endif ?>
        
    <?php endforeach ?>
    <?php endif ?>
</section>
<?php snippet('footer') ?>
