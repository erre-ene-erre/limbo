<?php if($page -> dateend() -> isNotEmpty()): ?>
    <?php if($page -> dateend() ->toDate('dd.MM') === $page -> datestart() ->toDate('dd.MM')): ?>
        <?= $page -> datestart() ->toDate('dd.MM') ?>
    <?php elseif($page -> dateend() ->toDate('MM') === $page -> datestart() ->toDate('MM')): ?>
        <?= $page -> datestart() ->toDate('dd') ?> - <?= $page -> dateend() ->toDate('dd.MM') ?>
    <?php else:?>
        <?= $page -> datestart() ->toDate('dd.MM') ?> - <?= $page -> dateend() ->toDate('dd.MM') ?>
    <?php endif ?>
<?php else:?>
    <?= $page -> datestart() ->toDate('dd.MM') ?>
<?php endif ?>