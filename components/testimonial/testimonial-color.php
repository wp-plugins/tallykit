<?php
add_action('tallykit_dynamic_css', 'tallykit_testimonial_colors');
function tallykit_testimonial_colors(){
?>
/*grid*/
.color_mood_light .tk_testimonial_item .tk_testimonial_item_content{  background:<?php tallykitkit_color('color_inner_bg_light'); ?>;  }
.color_mood_light .tk_testimonial_item .tk_testimonial_item_content{  border-color:<?php tallykitkit_color('color_border_light'); ?>;  }
.color_mood_light .tk_testimonial_item .tk_testimonial_arrow_wrap .tk_testimonial_arrow{background: <?php tallykitkit_color('color_inner_bg_light'); ?>;}

.color_mood_dark .tk_testimonial_item .tk_testimonial_item_content{  background:<?php tallykitkit_color('color_inner_bg_dark'); ?>;  }
.color_mood_dark .tk_testimonial_item .tk_testimonial_item_content{  border-color:<?php tallykitkit_color('color_border_dark'); ?>;  }
.color_mood_dark .tk_testimonial_item .tk_testimonial_arrow_wrap .tk_testimonial_arrow{background: <?php tallykitkit_color('color_inner_bg_dark'); ?>;}

/*slideshow*/
.color_mood_light .tk_testimonial_slider_item .tk_testimonial_author_name{ color:<?php tallykitkit_color('color_headings_light'); ?>; }
.color_mood_light .tk_testimonial_slider_item .tk_testimonial_author_position{ color:<?php tallykitkit_color('color_text_light'); ?> }

.color_mood_dark .tk_testimonial_slider_item .tk_testimonial_author_name{ color:<?php tallykitkit_color('color_headings_dark'); ?>; }
.color_mood_dark .tk_testimonial_slider_item .tk_testimonial_author_position{ color:<?php tallykitkit_color('color_text_dark'); ?> }
<?php	
}