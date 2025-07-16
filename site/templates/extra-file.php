<?php snippet('header') ?>
    <?php if($page -> image() -> mime() == 'application/pdf'): ?>
    <iframe
    src="<?= $page -> image()?>#toolbar=0&navpanes=0&scrollbar=0&view=FitH"
    frameBorder="0"
    scrolling="auto"
    width="100%"
    ></iframe>
    <?php else: ?>
    <figure class='extra-file <?=$page -> image() -> orientation()?>'>
        <a href='<?= $page ->parent() -> url() ?>'>
            <img loading="lazy" alt="<?= $page -> image() -> alt() ?>"
            <?php if($page -> image() ->mime() === 'image/gif'): ?>
                src= "<?= $page -> image() -> url() ?>"
            <?php else: ?>
                data-src="<?= $page -> image() -> resize(400) -> quality(72) -> url() ?>"
                data-srcset="<?= $page -> image() -> srcset() ?>"
                data-sizes="auto"
            <?php endif ?>
            >
            <?php if($page -> image() -> caption() -> isNotEmpty()): ?>
            <figcaption><?= $page -> image() -> caption() ?></figcaption>
            <?php endif ?>
        </a>
    </figure>
    <?php endif ?>


<?php snippet('footer') ?>
