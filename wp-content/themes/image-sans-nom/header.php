<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <title><?= wp_title(); ?></title>
    <!--Yoast SEO here-->
    <?php do_action('wpseo_head'); ?>
    <!--Yoast SEO end here-->
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57"
          href="<?= isn_get_theme_asset('assets/img/favicon/apple-icon-57x57.png'); ?>">
    <link rel="apple-touch-icon" sizes="60x60"
          href="<?= isn_get_theme_asset('assets/img/favicon/apple-icon-60x60.png'); ?>">
    <link rel="apple-touch-icon" sizes="72x72"
          href="<?= isn_get_theme_asset('assets/img/favicon/apple-icon-72x72.png'); ?>">
    <link rel="apple-touch-icon" sizes="76x76"
          href="<?= isn_get_theme_asset('assets/img/favicon/apple-icon-76x76.png'); ?>">
    <link rel="apple-touch-icon" sizes="114x114"
          href="<?= isn_get_theme_asset('assets/img/favicon/apple-icon-114x114.png'); ?>">
    <link rel="apple-touch-icon" sizes="120x120"
          href="<?= isn_get_theme_asset('assets/img/favicon/apple-icon-120x120.png'); ?>">
    <link rel="apple-touch-icon" sizes="144x144"
          href="<?= isn_get_theme_asset('assets/img/favicon/apple-icon-144x144.png'); ?>">
    <link rel="apple-touch-icon" sizes="152x152"
          href="<?= isn_get_theme_asset('assets/img/favicon/apple-icon-152x152.png'); ?>">
    <link rel="apple-touch-icon" sizes="180x180"
          href="<?= isn_get_theme_asset('assets/img/favicon/apple-icon-180x180.png'); ?>">
    <link rel="icon" type="image/png" sizes="192x192"
          href="<?= isn_get_theme_asset('assets/img/favicon/android-icon-192x192.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32"
          href="<?= isn_get_theme_asset('assets/img/favicon/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="96x96"
          href="<?= isn_get_theme_asset('assets/img/favicon/favicon-96x96.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16"
          href="<?= isn_get_theme_asset('assets/img/favicon/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?= isn_get_theme_asset('assets/img/favicon/manifest.json'); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage"
          content="<?= isn_get_theme_asset('assets/img/favicon/ms-icon-144x144.png'); ?>">
    <meta name="theme-color" content="#ffffff">

    <!-- This content *may* be used as a part of search engine results. -->
<!--    <meta name="description" content="L’image sans nom est un lieu dédié à la photographie situé à Liège">-->

    <!-- Identify the software used to build the document (i.e. - WordPress, Dreamweaver) -->
    <meta name="generator" content="WordPress">

    <!-- Short description of your document's subject -->
    <meta name="subject"
          content="L’image sans nom est un espace d’exposition et de lecture avec plus de 5000 livres sur la photographie">

    <!-- Gives a general age rating based on the document's content -->
    <meta name="rating" content="General">

    <!-- Disable automatic detection and formatting of possible phone numbers -->
    <meta name="format-detection" content="telephone=no">


    <!-- Geo tags -->
    <meta name="ICBM" content="50.6833,5.55">
    <meta name="geo.position" content="50.6833,5.55">
    <meta name="geo.region" content="BE">
    <!-- Country code (ISO 3166-1): mandatory, state code (ISO 3166-2): optional; eg. content="US" / content="US-NY" -->
    <meta name="geo.placename" content="Liège">

    <!-- Provides information about an author or another person -->
    <link rel="me" href="mailto:limagesansnom@gmail.com">
    <link rel="me" href="tel:0032485847977">

    <!--stylesheets-->
    <link rel="stylesheet" href="<?= isn_get_theme_asset('assets/css/bundle.css'); ?>">

</head>
<body>
<!-- Share button for facebook -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v7.0&appId=2728232140733180"></script>
<header class="header">
    <a class="skip-main" href="#main">Allez au contenu principal</a>
    <h1 role="heading" aria-level="1" class="header__heading"><?= the_title(); ?></h1>
    <label for="header-input-nav" class="header__label header__label--open">Ouvrir le menu</label>
    <input type="checkbox" class="header__input" id="header-input-nav">
    <nav class="nav global" role="navigation" aria-label="Principale" aria-expanded="false">
        <h2 class="nav__heading global__heading sro" role="heading" aria-level="2">Navigation principale</h2>
        <label for="header-input-nav" class="header__label header__label--close global__label global__label--close">Fermer le menu</label>
        <ul class="nav__list global__list" role=menu>
            <?php foreach (isn_get_menu('main', 'nav__link') as $i => $link): ?>
                <li class="nav__item global__item">
                    <a href="<?= $link->url; ?>"<?php if ($link->target): ?> target="<?= $link->target; ?>" rel="noopener noreferrer"<?php endif; ?><?php if ($link->current): ?> aria-current="page"<?php endif; ?>
                       class="global__link <?php if ($link->classes): ?><?= implode('', $link->classes); ?><?php endif; ?>" role="menuitem"><?= $link->label; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <?php
        $image1 = get_field('isn_heading_img_1');
        $image2 = get_field('isn_heading_img_2');
        if (!empty($image1) || !empty($image2)): ?>
            <img src="<?= esc_url($image1['sizes']['header']); ?>" srcset="<?= esc_url($image1['sizes']['header-mobile']); ?> 375w,<?= esc_url($image1['sizes']['header-tablet']); ?> 768w, <?= esc_url($image1['sizes']['header']); ?> 1024w, <?= esc_url($image1['sizes']['header-big-screens']); ?> 1280w"
                 sizes="(max-width: 375px) 375px, (max-width: 768px) 768px, (max-width: 1024px) 1024px, (max-width: 1280px) 1280px" alt="Image de garde"
                 class="header__img header__img--left">
            <img src="<?= esc_url($image2['sizes']['header']); ?>" srcset="<?= esc_url($image2['sizes']['header-mobile']); ?> 375w,<?= esc_url($image2['sizes']['header-tablet']); ?> 768w, <?= esc_url($image2['sizes']['header']); ?> 1024w, <?= esc_url($image2['sizes']['header-big-screens']); ?> 1280w"
                 sizes="(max-width: 375px) 375px, (max-width: 768px) 768px, (max-width: 1024px) 1024px, (max-width: 1280px) 1280px" alt="Image de garde"
                 class="header__img header__img--right">
        <?php endif; ?>
    <?php endwhile; endif; ?>

    <a href="#main" class="header__scroll-link"><?= __('scroller vers le bas', 'isn'); ?></a>
</header>
<main id="main" class="main">