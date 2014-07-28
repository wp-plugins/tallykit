<?php
/************************** Template Path ***************************
 *
 * Setup Template Folder path
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_template_file_loader  
**/
if(!function_exists('tallykit_portfolio_template_path')):
function tallykit_portfolio_template_path($type='url', $extra = ''){
	$settings = array(
		'child_url'  => TALLYKIT_CHILD_TPL_URL.'portfolio/',
		'theme_url'  => TALLYKIT_THEME_TPL_URL.'portfolio/',
		'plugin_url' => TALLYKIT_COMPONENTS_URL.'portfolio/templates/',
		
		'child_dri'  => TALLYKIT_CHILD_TPL_DRI.'portfolio/',
		'theme_dri'  => TALLYKIT_THEME_TPL_DRI.'portfolio/',
		'plugin_dri' => TALLYKIT_COMPONENTS_DRI.'portfolio/templates/',
	);
	$template = new acoc_template_file_loader($settings);
	
	if($type == 'url'){
		return $template->url($extra);
	}else{
		return $template->dri($extra);
	}
}
endif;






/*************************** Theme Compat *****************************
 *
 * Making the Component compatible with any theme
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_theme_compat
**/