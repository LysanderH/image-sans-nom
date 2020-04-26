<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--  wp head not really beautiful  -->
    <?php wp_head(); ?>
    <title><?php wp_title('-', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <title><?= bp_get_title('-', true); ?></title>
    <link rel="stylesheet" href="<?= bp_get_theme_asset('assets/css/bundle.css'); ?>">
</head>
<body>
<header class="header">
    <h1><?= bp_get_title('-', false); ?></h1>
    <nav class="nav">
        <h2 class="nav__heading">Navigation principale</h2>
        <div class="nav__container">
            <?php foreach (bp_get_menu('main', 'nav__link') as $i => $link): ?>
                <a href="<?= $link->url; ?>"
                    <?php if ($link->target): ?> target="<?= $link->target; ?>" rel="noopener noreferrer"<?php endif; ?>
                    <?php if ($link->current): ?> aria-current="page"<?php endif; ?>

                   class="<?php if ($link->classes): ?>
                   <?= implode('', $link->classes); ?>
                   <?php endif; ?>"><?= $link->label; ?></a>
            <?php endforeach; ?>
        </div>
    </nav>
    <aside class="nav__socials">
        <h3 class="nav__subheading"></h3>
        <div class="nav__medias">
            <?php foreach (bp_get_menu('socials', 'nav__social') as $i => $link): ?>
                <a href="<?= $link->url; ?>"
                    <?php if ($link->target): ?> target="<?= $link->target; ?>" rel="noopener noreferrer"<?php endif; ?>
                   class="<?php if ($link->classes): ?>
                   <?= implode('', $link->classes); ?>
                   <?php endif; ?>"><?= $link->label; ?></a>
            <?php endforeach; ?>
        </div>
    </aside>
</header>
<main>