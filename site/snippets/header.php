<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php
    $pageUsing = $page;
    if($is_media){$pageUsing = $page -> parent(); }
    ?>
    <?php if($page->isHomePage()): ?>
    <meta property="title" content="<?= $site->title() ?>">
    <meta property="og:title" content="<?= $site->title() ?>">
    <?php else: ?>
    <meta property="title" content="<?= $pageUsing->title() ?>   &#1792;   <?= $site->title() ?>">
    <meta property="og:title" content="<?= $pageUsing->title() ?>  &#1792;  <?= $site->title() ?>">
    <?php endif ?>

    <meta name="description" content="<?= $pageUsing->metadescription() -> or($site -> metadescription()) ?>">
    <meta property="og:description" content="<?= $pageUsing->metadescription() -> or($site -> metadescription()) ?>">
    <meta property="og:url" content="<?= $site -> url() ?>">

    
    <?php if($page->isHomePage()): ?>
    <title> <?= $site->title() ?></title>
    <?php else: ?>
    <title><?= $pageUsing->title() ?>   &#1792;   <?= $site->title() ?></title>
    <?php endif ?>
    <?php if($site -> favicon() -> isNotEmpty()) :?>
    <link rel="icon" type='image/png' href="<?= $site -> files() -> template('favicon') ->first() ->url() ?>">
    <?php endif ?>

    <?= css('/assets/css/index.css?v=1.1.1') ?>
    <?= css('@auto') ?>
</head>
<body class='<?= str_replace(' ', '-', $page -> template()) ?>'>
<?php snippet('center-menu') ?>
<div id="swup" class="transition-fade">
<main class="main-container <?= str_replace(' ', '-', $page -> template()) ?>">