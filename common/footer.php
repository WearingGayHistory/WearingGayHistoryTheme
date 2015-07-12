        </div><!-- end content -->
        <div class="row">
        <footer class="col-md-12">
            <div id="custom-footer-text">
                <?php if ( $footerText = get_theme_option('Footer Text') ): ?>
                <p><?php echo $footerText; ?></p>
                <?php endif; ?>
                <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                    <p><?php echo $copyright; ?></p>
                <?php endif; ?>
            </div>
            <div class="omeka-props-footer pull-right">
                <p><?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?></p>
            </div>
            <div>
                <?php fire_plugin_hook('public_footer'); ?>
            </div>
        </footer>
        </div>
</div><!--end wrap-->
    <script src="themes/WearingGayHistoryTheme/javascripts/jquery.sliderPro.min.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function () {
        Omeka.showAdvancedForm();
        Omeka.dropDown();
    });

    jQuery( document ).ready(function( $ ) {
        $( '#my-slider' ).sliderPro({
        width: 950,
            height: 500,
            orientation: 'vertical',
            loop: false,
            arrows: true,
            buttons: false,
            thumbnailsPosition: 'right',
            thumbnailPointer: true,
            thumbnailWidth: 300,
            breakpoints: {
                800: {
                    thumbnailsPosition: 'bottom',
                    thumbnailWidth: 270,
                    thumbnailHeight: 100
                },
                500: {
                    thumbnailsPosition: 'bottom',
                    thumbnailWidth: 120,
                    thumbnailHeight: 50
                }
            }
        });
    });
    </script>
    
    <?php
    // Omeka 2 and Bootstrap 3.1.1 use the same jQuery (1.10).
    $config = Zend_Registry::get('bootstrap')->getResource('Config');
    $useInternalAssets = isset($config->theme->useInternalAssets)
       ? (bool) $config->theme->useInternalAssets
       : false;
    if ($useInternalAssets) : ?>
    <script src="<?php echo src('vendor/jquery', 'javascripts', 'js'); ?>"></script>
    <?php else: ?>
    <script src="//code.jquery.com/jquery.js"></script>
    <?php endif; ?>
    <?php if (get_theme_option('Use Internal Bootstrap') == '1') :?>
    <script src="<?php echo src('bootstrap.min', 'javascripts', 'js'); ?>"></script>
    <?php else: ?>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <?php endif; ?>
</body>
</html>
