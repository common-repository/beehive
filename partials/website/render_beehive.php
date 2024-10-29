<?php

function render_widget($config){
    $args = array();

    if($config['render_pages']){
        $args = array(
            'post_type' => 'page',
            'post_status' => 'publish',
            'posts_per_page' => $config['items_to_display'],
            'order' => 'DESC',
            'meta_query' => array(
                array(
                    'key' => '_thumbnail_id',
                    'compare' => 'EXISTS',
                ),
            )
        );
    }else{
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $config['items_to_display'],
            'order' => 'DESC',
            'meta_query' => array(
                array(
                    'key' => '_thumbnail_id',
                    'compare' => 'EXISTS',
                ),
            )

        );
    }

    $myQuery = new WP_Query($args);
?>

<div id="beehive_container" style="font-size: 0; margin-bottom: 24px;">
<?php
if ($myQuery->have_posts()) {
    while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
        <div class="cell-wrap">
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" >
                <svg width="78px" height="78px" viewBox="0 0 250 250" xmlns="http://www.w3.org/2000/svg" version="1.1">
                    <desc><?php the_title(); ?></desc>
                    <defs>
                        <pattern id="cell_image_<?php the_ID(); ?>" width="1" height="1" viewBox="0 0 100 100">
                            <image xlink:href="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' )[0]; ?>" width="120" height="120" x="-10" y="-10"></image>
                        </pattern>
                    </defs>
                    <polygon fill="<?php echo ( !empty(wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' )[0]) ) ? 'url(#cell_image_' . get_the_ID() . ')' : '#000000'; ?>" points="125,0 250,60 250,190 125,250 0,190 0,60" />
                </svg>
            </a>
        </div>
<?php
    endwhile;
    wp_reset_query();
}
?>
</div>

<style>
    .cell-wrap {
        width: 78px;
        height: 78px;
        display: inline-block;
        vertical-align: top;
        margin: 0px 0px -19.5px 0px;
        overflow: hidden;
        z-index: 0;
    }
    <?php if($config['animate_hover']): ?>
    .cell-wrap:hover{
        -webkit-transform: scale(0.9, 0.9);
        -moz-transform: scale(0.9, 0.9);
        -ms-transform: scale(0.9, 0.9);
        -o-transform: scale(0.9, 0.9);
        transform: scale(0.9, 0.9);
        -webkit-transition-duration: 0.3s; /* Safari */
        transition-duration: 0.3s;
        z-index: 1;
    }
    <?php endif; ?>
</style>
<style id="cell_order"></style>
<script>
    jQuery(document).ready(function($){
        "use strict"

        var align = function(){
            $('#cell_order').html( '.cell-wrap:nth-child(' +
            ((Math.round( ($('#beehive_container').width() - (39)) / 78) * 2) - 1 ) + "n-" +
            (Math.round( ($('#beehive_container').width() - (39)) / 78) - 2) + '){ margin-left: 39px; } .cell-wrap:nth-child(' +
            ((Math.round( ($('#beehive_container').width() - (39)) / 78) * 2) - 1 ) + "n-" +
            ((Math.round( ($('#beehive_container').width() - (39)) / 78)  * 2) - 1) + '){ margin-right: 39px; }');
        }

        $(window).resize(function(){
            align();
        });

        align();

    });
</script>
<?php
}
?>