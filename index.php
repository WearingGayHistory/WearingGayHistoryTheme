<?php echo head(array('bodyid' => 'home')); ?>

<div class="row"><!--start sliderrow-->
    <div class="col-md-12">  
        <div class="slider-pro " id="my-slider">
            <div class="sp-slides">
                <?php $items = get_random_featured_items('5', true); ?>

                <?php if ($items): ?>
                      
                <?php foreach ($items as $item): ?>
                <?php
                $title = metadata($item, array('Dublin Core', 'Title'));
                $description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));
                ?>   
                <div class="sp-slide">
                    <!-- Get the image -->
                    <?php if (metadata($item, 'has thumbnail')) {
                        echo link_to_item(
                            item_image('fullsize', array('class' => 'sp-image'), 0, $item),
                            array('class' => 'image'), 'show', $item
                        );
                    }
                    ?>
                </div> <!--close sp-slide -->
                <?php endforeach; ?>
                <div class="sp-thumbnails">
                    <?php foreach ($items as $item2): ?>  
                    <?php
                    $title2 = metadata($item2, array('Dublin Core', 'Title'));
                    $description2 = metadata($item2, array('Dublin Core', 'Description'), array('snippet' => 150));
                    ?>

                    <div class="sp-thumbnail">
                        
                        <div class="sp-thumbnail-text">
                        <div class="sp-thumbnail-title"><?php echo link_to($item2, 'show', strip_formatting($title2)); ?></div>
                        </div> <!-- sp-thumbnail-text -->
                    </div><!-- sp-thumbnail -->
                            
                       
                    <?php endforeach; ?>

                <?php else: ?>
                    <p><?php echo __('No featured items are available.'); ?></p>
                <?php endif; ?>
                 </div>
            </div> <!-- close sp-slides -->
        </div> <!-- close slider-pro -->
    </div>      
</div> <!--end slider row-->


<div class="row home-features" id="home-tagline"> <!-- start tagline -->
    <div class="col-md-12">
        <h1 id="tagline">A Digital Archive of Historical LGBT T-Shirts</h1>

    </div>
</div>


<div class="row home-features"> <!-- start about & tag cloud -->
    <div class="col-md-4 home-stories"> <!--about-->
        <?php if ((get_theme_option('Display Featured Exhibit') !== '0')
            && plugin_is_active('ExhibitBuilder')
            && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
        <!-- Featured Exhibit -->
            <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
        <?php endif; ?> 
    </div><!-- end about-->
    
    <div class="col-md-4 home-themes"> <!--tag cloud -->
    <h2 id="tagcloud"><?php echo __('Themes'); ?></h2>
        <?php echo tag_cloud(get_recent_tags(10), '/items/browse', 9); ?>
    </div>
    <div class="col-md-4 home-map">
    <h2>Map</h2>
    <img src='http://localhost:8888/wgh/themes/WearingGayHistoryTheme/images/mapimg.jpg' style="width:325px;"/>
    </div>
</div>






<?php echo foot(); ?>
