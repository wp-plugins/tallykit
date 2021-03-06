<?php 
$style_count = 1;
if(is_array($slider_items)): 
?>
    <style type="text/css">
		<?php foreach($slider_items as $slider_style_item): ?>
			#tallykit_slideshow_item_<?php echo $id; ?>_<?php echo $style_count; ?>{
				height:<?php echo get_post_meta($id, 'tallykit_slideshow_h', true ); ?>;
				<?php if(is_array($slider_style_item['bg'])): ?>
					<?php if(isset($slider_style_item['bg']['background-attachment'])): ?>background-attachment:<?php echo $slider_style_item['bg']['background-attachment'] ?>;<?php endif; ?>
					<?php if(isset($slider_style_item['bg']['background-color'])): ?>background-color:<?php echo $slider_style_item['bg']['background-color'] ?>;<?php endif; ?>
					<?php if(isset($slider_style_item['bg']['background-image'])): ?>background-image:url(<?php echo $slider_style_item['bg']['background-image'] ?>);<?php endif; ?>
					<?php if(isset($slider_style_item['bg']['background-position'])): ?>background-position:<?php echo $slider_style_item['bg']['background-position'] ?>;<?php endif; ?>
					<?php if(isset($slider_style_item['bg']['background-repeat'])): ?>background-repeat:<?php echo $slider_style_item['bg']['background-repeat'] ?>;<?php endif; ?>
					<?php if(isset($slider_style_item['bg']['background-size'])): ?>background-size:<?php echo $slider_style_item['bg']['background-size'] ?>;<?php endif; ?>
				<?php endif; ?>
			}			
			<?php if($slider_style_item['active_padding'] == 'on'): ?>
				#tallykit_slideshow_item_<?php echo $id; ?>_<?php echo $style_count; ?> .tallykit_slideshow_item_inner{
					<?php if($slider_style_item['padding_top'] != ''): ?> padding-top: <?php echo $slider_style_item['padding_top']; ?>px; <?php endif; ?>
					<?php if($slider_style_item['padding_bottom'] != ''): ?> padding-bottom: <?php echo $slider_style_item['padding_bottom']; ?>px; <?php endif; ?>
				}
			<?php endif; ?>
			
			#tallykit_slideshow_item_<?php echo $id; ?>_<?php echo $style_count; ?> .tallykit_slideshow_item_inner{ max-width:<?php echo $slider_style_item['content_width']; ?>; }
		<?php 
			$style_count++; 
			endforeach; 
		?>
	</style>
<?php endif; ?>