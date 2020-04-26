<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= isn_get_title('-', true); ?></title>
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