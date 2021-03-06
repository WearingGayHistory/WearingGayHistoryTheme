<?php
$title = __('Browse Collections');
echo head(array(
    'title' => $title,
    'bodyclass' => 'collections browse',
)); ?>
<div id="primary">
    <div class="page-header">
         <h1><?php echo $title; ?></h1>
    </div>
    <?php if ($pagination_links = pagination_links()): ?>
    <div class="row">
        <div class="pagination pagination-centered"><?php echo $pagination_links; ?></div>
    </div>
    <?php endif ?>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="row">
            <?php foreach(loop('collections') as $collection): ?>
                <div class="col-sm-6 col-md-6">
                    <div class="row">
                        <div class="col-sm-6 col-md-6"><h2><?php echo link_to_collection(); ?></h2></div>
                        <div class="col-sm-4 col-md-4">
                            <div class="element">
                                <div class="collection-description">
                                    <?php echo text_to_paragraphs(metadata('collection', array('Dublin Core', 'Description'), array('snippet' => 150))); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2">
                            <?php if (metadata('collection',array('Dublin Core', 'Contributor'))): ?>
                            <div class="element well well-sm">
                                <p><i class="icon-user"></i> <strong><?php echo __('Collector(s)'); ?></strong></p>
                                <div class="element-text">
                                    <p><?php echo metadata('collection',array('Dublin Core', 'Contributor')); ?></p>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <?php fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <p class="view-items-link-browse"><?php echo link_to_items_in_collection($text = 'View the items in this collection'); ?></p>
                        </div>
                    </div>
                </div>
            <!-- end class="collection" -->
            <?php endforeach; ?>
        </div>
        <div class="row">
            <?php fire_plugin_hook('public_collections_browse', array('collections' => $collections, 'view' => $this)); ?>
        </div>
    </div>
</div><!-- end primary -->
<?php echo foot(); ?>
