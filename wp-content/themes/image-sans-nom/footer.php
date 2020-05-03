</main>
<footer class="footer">
    <ul class="nav__list">
        <?php foreach (isn_get_menu('footer', 'footer-nav__link') as $i => $link): ?>
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
</footer>
<?php wp_footer(); ?>
<script src="<?= bp_get_theme_asset('/assets/js/bundle.js'); ?>"></script>
</body>
</html>
