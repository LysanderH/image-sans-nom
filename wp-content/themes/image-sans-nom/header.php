<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <title><?= isn_get_title('-', true); ?></title>

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Theme Color for Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#000">

    <!-- This content *may* be used as a part of search engine results. -->
    <meta name="description" content="L’image sans nom est un lieu dédié à la photographie situé à Liège">

    <!-- Control the behavior of search engine crawling and indexing -->
    <meta name="robots" content="index,follow"><!-- All Search Engines -->
    <meta name="googlebot" content="index,follow"><!-- Google Specific -->

    <!-- Tells Google not to show the sitelinks search box -->
    <meta name="google" content="nositelinkssearchbox">

    <!-- Tells Google not to provide a translation for this document -->
    <meta name="google" content="notranslate">

    <!-- Identify the software used to build the document (i.e. - WordPress, Dreamweaver) -->
    <meta name="generator" content="WordPress">

    <!-- Short description of your document's subject -->
    <meta name="subject"
          content="L’image sans nom est un espace d’exposition et de lecture avec plus de 5000 livres sur la photographie">

    <!-- Gives a general age rating based on the document's content -->
    <meta name="rating" content="General">

    <!-- Allows control over how referrer information is passed -->
    <meta name="referrer" content="no-referrer">

    <!-- Disable automatic detection and formatting of possible phone numbers -->
    <meta name="format-detection" content="telephone=no">

    <!-- Completely opt out of DNS prefetching by setting to "off" -->
    <meta http-equiv="x-dns-prefetch-control" content="off">

    <!-- Specifies the document to appear in a specific frame -->
    <meta http-equiv="Window-Target" content="_value">

    <!-- Geo tags -->
    <meta name="ICBM" content="50.6833,5.55">
    <meta name="geo.position" content="50.6833,5.55">
    <meta name="geo.region" content="BE">
    <!-- Country code (ISO 3166-1): mandatory, state code (ISO 3166-2): optional; eg. content="US" / content="US-NY" -->
    <meta name="geo.placename" content="Liège"><!-- eg. content="New York City" -->

    <!-- Provides information about an author or another person -->
    <link rel="me" href="mailto:limagesansnom@gmail.com">
    <link rel="me" href="tel:0032485847977">

    <!--    Facebook open graph TODO: Twitter and FACEBOOK card    -->
    <meta property="og:url" content="<?= $_SERVER['HTTP_HOST']; ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= isn_get_title('-', true); ?>">
    <meta property="og:image" content="https://example.com/image.jpg">
    <meta property="og:image:alt" content="Façade de l’image sans nom">
    <meta property="og:description" content="L’image sans nom est un lieu dédié à la photographie situé à Liège">
    <meta property="og:site_name" content="<?= bloginfo('name'); ?>">
    <meta property="og:locale" content="fr_BE">
    <meta property="article:author" content="L’image sans nom">

    <!--    twitter card    -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@limagesansnom">
    <meta name="twitter:creator" content="@individual_account">
    <meta name="twitter:url" content="<?= $_SERVER['HTTP_HOST']; ?>">
    <meta name="twitter:title" content="Content Title">
    <meta name="twitter:description" content="Content description less than 200 characters">
    <meta name="twitter:image" content="https://example.com/image.jpg">
    <meta name="twitter:image:alt"
          content="Façade de l’image sans nom">

    <!--stylesheets-->
    <link rel="stylesheet" href="<?= isn_get_theme_asset('assets/css/bundle.css'); ?>">

</head>
<body>
<header class="header">
    <h1 role="heading" aria-level="1"><?= isn_get_title('-', false); ?></h1>
    <nav class="nav" role="navigation" aria-label="Principale">
        <h2 class="nav__heading" role="heading" aria-level="2">Navigation principale</h2>
        <ul class="nav__list">
            <?php foreach (isn_get_menu('main', 'nav__link') as $i => $link): ?>
                <li class="nav__item">
                    <a href="<?= $link->url; ?>"
                        <?php if ($link->target): ?> target="<?= $link->target; ?>" rel="noopener noreferrer"<?php endif; ?>
                        <?php if ($link->current): ?> aria-current="page"<?php endif; ?>
                       class="<?php if ($link->classes): ?>
                   <?= implode('', $link->classes); ?>
                   <?php endif; ?>"><?= $link->label; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>

<main>