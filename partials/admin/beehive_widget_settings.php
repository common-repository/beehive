<?php
function widget_settings_gui($this_object, $config){ ?>
    <p>
        <label for="<?php echo $this_object->get_field_id('title'); ?>"><?php _e('Title:', 'beehive_widget_domain'); ?></label>
        <input type="text" class="widefat" id="<?php echo $this_object->get_field_id('title'); ?>"
               name="<?php echo $this_object->get_field_name('title'); ?>"
               value="<?php echo esc_attr($config['title']); ?>"/>
    </p>
    <p>
        <input class="checkbox" type="checkbox" <?php checked($config['render_pages'], 'on'); ?> id="<?php echo $this_object->get_field_id('render_pages'); ?>" name="<?php echo $this_object->get_field_name('render_pages'); ?>" />
        <label for="<?php echo $this_object->get_field_id('render_pages'); ?>"><?php _e('Show pages instead of posts', 'beehive_widget_domain'); ?></label>
    </p>
    <p>
        <input class="checkbox" type="checkbox" <?php checked($config['animate_hover'], 'on'); ?> id="<?php echo $this_object->get_field_id('animate_hover'); ?>" name="<?php echo $this_object->get_field_name('animate_hover'); ?>" />
        <label for="<?php echo $this_object->get_field_id('animate_hover'); ?>"><?php _e('Animate hover', 'beehive_widget_domain'); ?></label>
    </p>
    <p>
        <label for="<?php echo $this_object->get_field_id('items_to_display'); ?>"><?php _e('Number of items to display:', 'beehive_widget_domain'); ?></label>
        <input type="text" class="widefat" id="<?php echo $this_object->get_field_id('items_to_display'); ?>"
               name="<?php echo $this_object->get_field_name('items_to_display'); ?>"
               value="<?php echo esc_attr($config['items_to_display']); ?>" placeholder="<?php _e('Default: 5', 'beehive_widget_domain'); ?>"/>
    </p>
    <script>
        jQuery(document).ready(function($){
            $('.pro-upgrade').each(function(){
               $(this).parents('.widget-inside').css({
                   'background-image': 'url(<?php echo plugins_url('beehive/images/176883.png'); ?>)',
                   'background-repeat': 'no-repeat',
                   'background-size': 'cover',
                   'background-position': 'center'
               })
            });
        });
    </script>
    <style>
        .pro-upgrade{
            padding: 10px;
            position: relative;
        }
        .pro-upgrade .cover{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255,255,255,0.3);
            text-align: center;
            padding: 20px 0;
            box-sizing: border-box;
            line-height: 2;
        }
        .pro-upgrade a{
            text-decoration: none;
            outline: none;
            font-size: 2em;
            margin: 0.67em 0px;
            display: block;
            font-weight: 600;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: none;
        }
        .pro-upgrade a:active,
        .pro-upgrade a:focus{
            box-shadow: none;
        }
    </style>
    <div class="pro-upgrade">
        <div class="cover"><a href="http://www.zendtheme.com/wp-beehive-pro-plugin" target="_blank">Go pro to unlock all features and even more!</a></div>
        <p>
            <label><?php _e('Beehive post type:', 'beehive_widget_domain'); ?></label>
            <select class="widefat">
                <option value="post">post</option>
            </select>
        </p>
        <p>
            <label><?php _e('Post status:', 'beehive_widget_domain'); ?></label>
            <select class="widefat">
                <option value="publish" selected="selected">publish - Viewable by everyone (default)</option>
            </select>
        </p>
        <p>
            <label><?php _e('Order by:', 'beehive_widget_domain'); ?></label>
            <select class="widefat">
                <option value="post_date" selected="selected">post_date (Default)</option>
            </select>
        </p>
        <p>
            <label><?php _e('Result order:', 'beehive_widget_domain'); ?></label>
            <select class="widefat">
                <option value="DESC" selected="selected">Descending</option>
            </select>
        </p>
        <p>
            <input class="checkbox" type="checkbox" />
            <label><?php _e('Exclude sticky posts', 'beehive_widget_domain'); ?></label>
        </p>
        <p>
            <label><?php _e('Beehive pagination type:', 'beehive_widget_domain'); ?></label>
            <select class="widefat">
                <option value="no">No pagination</option>
            </select>
        </p>
        <p>
            <input class="checkbox" type="checkbox" />
            <label><?php _e('Beehive cells offset (hit save to see more options)', 'beehive_widget_domain'); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" />
            <label><?php _e('Beehive cells offset hide right edges', 'beehive_widget_domain'); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" />
            <label><?php _e('Beehive cells offset hide bottom edges', 'beehive_widget_domain'); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" />
            <label><?php _e('Animate beehive cell hover (hit save to see more options)', 'beehive_widget_domain'); ?></label>
        </p>
        <p>
            <label><?php _e('Animation hover scale', 'beehive_widget_domain'); ?></label>
            <input type="number" class="widefat" min="0.5" max="2" step="0.1" placeholder="<?php _e('Default: 0.9 - will scale into inner of cell', 'beehive_widget_domain'); ?>"/>
        </p>
        <p>
            <label><?php _e('Animation hover duration in seconds', 'beehive_widget_domain'); ?></label>
            <input type="number" class="widefat" min="0" max="100" step="0.1" placeholder="<?php _e('Default: 0.3 - time in seconds to scale the cell', 'beehive_widget_domain'); ?>"/>
        </p>
        <p>
            <label><?php _e('Align animation duration in seconds', 'beehive_widget_domain'); ?></label>
            <input type="number" class="widefat" min="0" max="100" step="0.1" placeholder="<?php _e('Default: 0 - time in seconds to order cells', 'beehive_widget_domain'); ?>"/>
        </p>
        <p>
            <label><?php _e('Size of each beehive cell in pixels:', 'beehive_widget_domain'); ?></label>
            <input type="number" class="widefat" placeholder="<?php _e('Default: 70x70 pixels', 'beehive_widget_domain'); ?>"/>
        </p>
        <p>
            <label><?php _e('Size of the beehive cell thumbnail:', 'beehive_widget_domain'); ?></label>
            <select class="widefat">
                <option value="thumbnail" selected="selected">thumbnail</option>
            </select>
        </p>
        <p>
            <label><?php _e('Beehive cell border color:', 'beehive_widget_domain'); ?></label><br>
            <input type="text" class="widefat" />
        </p>
        <p>
            <input class="checkbox" type="checkbox" />
            <label><?php _e('Include posts with no featured image', 'beehive_widget_domain'); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" />
            <label><?php _e('Randomize background colors (for no featured image posts)', 'beehive_widget_domain'); ?></label>
        </p>
        <p>
            <label><?php _e('Beehive cell background color if there is no featured image available:', 'beehive_widget_domain'); ?></label><br>
            <input type="text" class="widefat" />
        </p>
        <p>
            <label><?php _e('Beehive cell stroke width:', 'beehive_widget_domain'); ?></label>
            <input type="number" class="widefat" min="0" step="1" placeholder="<?php _e('Default: 0 pixels', 'beehive_widget_domain'); ?>"/>
        </p>
        <p>
            <label><?php _e('Number of beehive cells to display by default:', 'beehive_widget_domain'); ?></label>
            <input type="number" class="widefat" min="1" step="1" placeholder="<?php _e('Default: 10', 'beehive_widget_domain'); ?>"/>
        </p>
        <p>
            <label><?php _e('Number of beehive cells to insert each new load:', 'beehive_widget_domain'); ?></label>
            <input type="number" class="widefat" min="1" step="1" placeholder="<?php _e('Default: 10', 'beehive_widget_domain'); ?>"/>
        </p>
        <p>
            <input class="checkbox" type="checkbox" />
            <label><?php _e('Loop loaded cells (loads same cells again on the end)', 'beehive_widget_domain'); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" />
            <label><?php _e('Limit loaded cells', 'beehive_widget_domain'); ?></label>
        </p>
        <p>
            <label><?php _e('Maximum number of beehive cells to keep (clears browser dom):', 'beehive_widget_domain'); ?></label>
            <input type="number" class="widefat" min="1" step="1" placeholder="<?php _e('Default: 100', 'beehive_widget_domain'); ?>"/>
        </p>
        <p>
            <input type="checkbox" class="checkbox" />
            <label><?php _e('Cells will load on last x pixels of the display when scrolled', 'beehive_widget_domain'); ?></label>
        </p>
        <p>
            <label><?php _e('Size in pixels from the bottom to trigger the load:', 'beehive_widget_domain'); ?></label>
            <input type="number" class="widefat" min="1" step="1" placeholder="<?php _e('Default: 100', 'beehive_widget_domain'); ?>"/>
        </p>
        <p>
            <label><?php _e('Beehive without navigation for post or page<br>(shortcode is separated and can work without widget)', 'beehive_widget_domain'); ?></label><br>
            <code>[beehive post_type="post" post_status="publish" order_by="post_date" order="DESC" animate_align_duration="0" dimension="70" image_size="thumbnail" beehive_cell_border_color="" beehive_cell_color="#000000" stroke_width="0" posts_per_page="10"]</code>
        </p>
        <p>
            <input class="checkbox" type="checkbox" />
            <label><?php _e('Use this widget as shortcode <br>(when enabled the widget becomes usable only as shortcode)<br> Note: Hit save after widget changes to update the shortcode!', 'beehive_widget_domain'); ?></label>
        </p>
        <p>
            <label><?php _e('Beehive with navigation for post or page:', 'beehive_widget_domain'); ?></label><br>
            <code>[beehive id="1"]</code>
        </p>
    </div>
<?php
}
?>

