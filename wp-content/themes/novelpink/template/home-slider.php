<?php $i = 0; ?>
<div id="slides_full" class="NovelLite_slider">
    <input type="hidden" id="txt_slidespeed" value="<?php if (get_theme_mod('NovelLite_slider_speed','') != '') { echo esc_html(get_theme_mod('NovelLite_slider_speed')); } else { ?>3000<?php } ?>"/>
    <ul class="slides-container">
        <li>
            <?php if (get_theme_mod('first_slider_image','') != '') { $i++; ?>
            <a href="<?php
                if (get_theme_mod('first_slider_link','') != '') {
                echo esc_html(get_theme_mod('first_slider_link'));
                }
                ?>" >
            <img  src="<?php echo esc_url(get_theme_mod('first_slider_image')); ?>" alt="Slide Image 1"/>
            </a>
            <?php } else { ?>
            <img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/main.jpeg" alt="<?php _e('Slide Image 1','novelpink'); ?>"/>
            <?php } ?>
            <div class="slider_overlay"></div>
            <div class="container container_caption">
                <?php if (get_theme_mod('first_slider_heading','') != '') { ?>
                <h1><a href="<?php
                    if (get_theme_mod('first_slider_link','') != '') {
                    echo  esc_url(get_theme_mod('first_slider_link'));
                    }
                ?>"><?php echo esc_html(get_theme_mod('first_slider_heading')); ?></a></h1>
                <?php } else { ?>
                <h1><?php _e('Business Theme','novelpink'); ?></h1>
                <?php } ?>
                <div class="clearfix"></div>
                <?php if (get_theme_mod('first_slider_desc') != '') { ?>
                <p>
                    <?php echo esc_html(get_theme_mod('first_slider_desc')); ?>
                </p>
                <?php } else { ?>
                <p><?php _e('novelpink slider description write!.','novelpink'); ?></p>
                <?php } ?>
                <div class="clearfix"></div>
                <div class="main-slider-button">
                    <?php if (get_theme_mod('first_button_text','') != '') { ?>
                    <a href="<?php
                        if (get_theme_mod('first_button_link','') != '') {
                        echo esc_url(get_theme_mod('first_button_link'));
                        } else {
                        echo "#";
                        }
                        ?>" class="theme-slider-button">
                        <?php echo esc_html(get_theme_mod('first_button_text')); ?>
                    </a>
                    <?php } else { ?>
                    <a href="#" class="theme-slider-button"><?php _e('Buy Now!','novelpink'); ?></a>
                    <?php } ?>
                </div>
            </div>
        </li>
        <?php if (get_theme_mod('second_slider_image','') != '') {  $i++; ?>
        <li>
            <?php if (get_theme_mod('second_slider_image','') != '') { ?>
            <a href="<?php
                if (get_theme_mod('second_slider_link','') != '') {
                echo esc_url(get_theme_mod('second_slider_link'));
                }
                ?>" >
            <img  src="<?php echo get_theme_mod('second_slider_image'); ?>" alt="<?php _e('Slide Image 2','novelpink'); ?>"/></a>
            <?php } else { ?>
            <?php } ?>
            <div class="slider_overlay"></div>
            <?php if (get_theme_mod('second_slider_heading','') != '') { ?>
            <div class="container container_caption">
                <?php if (get_theme_mod('second_slider_heading','') != '') { ?>
                <h1><a href="<?php
                    if (get_theme_mod('second_slider_link','') != '') {
                    echo esc_url(get_theme_mod('second_slider_link'));
                    }
                ?>"><?php echo esc_html(get_theme_mod('second_slider_heading')); ?></a></h1>
                <div class="clearfix"></div>
                <?php } ?>
                <?php if (get_theme_mod('second_slider_desc','') != '') { ?>
                <p>
                    <?php echo esc_html(get_theme_mod('second_slider_desc')); ?>
                </p>
                <?php } ?>
                <div class="clearfix"></div>
                <div class="main-slider-button">
                    <?php if (get_theme_mod('second_button_text','') != '') { ?>
                    <a href="<?php
                        if (get_theme_mod('second_button_link','') != '') {
                        echo esc_url(get_theme_mod('second_button_link',"#"));
                        } ?>" class="theme-slider-button">
                        <?php echo esc_html(get_theme_mod('second_button_text')); ?>
                    </a>
                    <?php } else { ?>
                    <a href="#" class="theme-slider-button"><?php _e('Buy Now!','novelpink'); ?></a>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
            <div class="slider_overlay"></div>
        </li>
        <?php } ?>
    </ul>
    <nav class="slides-navigation">
        <a href="#" class="next"><?php _e('Next','novelpink'); ?></a>
        <a href="#" class="prev"><?php _e('Previous','novelpink'); ?></a>
    </nav>
</div>