<?php

namespace Zotlabs\Theme;

class RedbasicConfig {

	function get_schemas() {
		$files = glob('view/theme/rikmeijer-nl/schema/*.php');

		$scheme_choices = [];

		if($files) {

			if(in_array('view/theme/rikmeijer-nl/schema/default.php', $files)) {
				$scheme_choices['---'] = t('Default');
				$scheme_choices['focus'] = t('Focus (Hubzilla default)');
			}
			else {
				$scheme_choices['---'] = t('Focus (Hubzilla default)');
			}

			foreach($files as $file) {
				$f = basename($file, ".php");
				if($f != 'default') {
					$scheme_name = $f;
					$scheme_choices[$f] = $scheme_name;
				}
			}
		}

		return $scheme_choices;
	}

	function get() {
		if(! local_channel()) { 
			return;
		}

		$arr = array();
		$arr['narrow_navbar'] = get_pconfig(local_channel(),'rikmeijer-nl', 'narrow_navbar' );
		$arr['nav_bg'] = get_pconfig(local_channel(),'rikmeijer-nl', 'nav_bg' );
		$arr['nav_icon_colour'] = get_pconfig(local_channel(),'rikmeijer-nl', 'nav_icon_colour' );
		$arr['nav_active_icon_colour'] = get_pconfig(local_channel(),'rikmeijer-nl', 'nav_active_icon_colour' );
		$arr['link_colour'] = get_pconfig(local_channel(),'rikmeijer-nl', 'link_colour' );
		$arr['banner_colour'] = get_pconfig(local_channel(),'rikmeijer-nl', 'banner_colour' );
		$arr['bgcolour'] = get_pconfig(local_channel(),'rikmeijer-nl', 'background_colour' );
		$arr['background_image'] = get_pconfig(local_channel(),'rikmeijer-nl', 'background_image' );
		$arr['item_colour'] = get_pconfig(local_channel(),'rikmeijer-nl', 'item_colour' );
		$arr['comment_item_colour'] = get_pconfig(local_channel(),'rikmeijer-nl', 'comment_item_colour' );
		$arr['font_size'] = get_pconfig(local_channel(),'rikmeijer-nl', 'font_size' );
		$arr['font_colour'] = get_pconfig(local_channel(),'rikmeijer-nl', 'font_colour' );
		$arr['radius'] = get_pconfig(local_channel(),'rikmeijer-nl', 'radius' );
		$arr['shadow'] = get_pconfig(local_channel(),'rikmeijer-nl', 'photo_shadow' );
		$arr['converse_width']=get_pconfig(local_channel(),"rikmeijer-nl","converse_width");
		$arr['top_photo']=get_pconfig(local_channel(),"rikmeijer-nl","top_photo");
		$arr['reply_photo']=get_pconfig(local_channel(),"rikmeijer-nl","reply_photo");
		$arr['advanced_theming'] = get_pconfig(local_channel(), 'rikmeijer-nl', 'advanced_theming');
		return $this->form($arr);
	}

	function post() {
		if(!local_channel()) { 
			return;
		}

		if (isset($_POST['rikmeijer-nl-settings-submit'])) {
			set_pconfig(local_channel(), 'rikmeijer-nl', 'narrow_navbar', $_POST['rikmeijer-nl_narrow_navbar']);
			set_pconfig(local_channel(), 'rikmeijer-nl', 'nav_bg', $_POST['rikmeijer-nl_nav_bg']);
			set_pconfig(local_channel(), 'rikmeijer-nl', 'nav_icon_colour', $_POST['rikmeijer-nl_nav_icon_colour']);
			set_pconfig(local_channel(), 'rikmeijer-nl', 'nav_active_icon_colour', $_POST['rikmeijer-nl_nav_active_icon_colour']);
			set_pconfig(local_channel(), 'rikmeijer-nl', 'link_colour', $_POST['rikmeijer-nl_link_colour']);
			set_pconfig(local_channel(), 'rikmeijer-nl', 'background_colour', $_POST['rikmeijer-nl_background_colour']);
			set_pconfig(local_channel(), 'rikmeijer-nl', 'banner_colour', $_POST['rikmeijer-nl_banner_colour']);
			set_pconfig(local_channel(), 'rikmeijer-nl', 'background_image', $_POST['rikmeijer-nl_background_image']);
			set_pconfig(local_channel(), 'rikmeijer-nl', 'item_colour', $_POST['rikmeijer-nl_item_colour']);
			set_pconfig(local_channel(), 'rikmeijer-nl', 'comment_item_colour', $_POST['rikmeijer-nl_comment_item_colour']);
			set_pconfig(local_channel(), 'rikmeijer-nl', 'font_size', $_POST['rikmeijer-nl_font_size']);
			set_pconfig(local_channel(), 'rikmeijer-nl', 'font_colour', $_POST['rikmeijer-nl_font_colour']);
			set_pconfig(local_channel(), 'rikmeijer-nl', 'radius', $_POST['rikmeijer-nl_radius']);
			set_pconfig(local_channel(), 'rikmeijer-nl', 'photo_shadow', $_POST['rikmeijer-nl_shadow']);
			set_pconfig(local_channel(), 'rikmeijer-nl', 'converse_width', $_POST['rikmeijer-nl_converse_width']);
			set_pconfig(local_channel(), 'rikmeijer-nl', 'top_photo', $_POST['rikmeijer-nl_top_photo']);
			set_pconfig(local_channel(), 'rikmeijer-nl', 'reply_photo', $_POST['rikmeijer-nl_reply_photo']);
			set_pconfig(local_channel(), 'rikmeijer-nl', 'advanced_theming', $_POST['rikmeijer-nl_advanced_theming']);
		}
	}

	function form($arr) {

		if(get_pconfig(local_channel(), 'rikmeijer-nl', 'advanced_theming'))
			$expert = 1;
					
	  	$o .= replace_macros(get_markup_template('theme_settings.tpl'), array(
			'$submit' => t('Submit'),
			'$baseurl' => z_root(),
			'$theme' => \App::$channel['channel_theme'],
			'$expert' => $expert,
			'$title' => t("Theme settings"),
			'$narrow_navbar' => array('rikmeijer-nl_narrow_navbar',t('Narrow navbar'),$arr['narrow_navbar'], '', array(t('No'),t('Yes'))),
			'$nav_bg' => array('rikmeijer-nl_nav_bg', t('Navigation bar background color'), $arr['nav_bg']),
			'$nav_icon_colour' => array('rikmeijer-nl_nav_icon_colour', t('Navigation bar icon color '), $arr['nav_icon_colour']),
			'$nav_active_icon_colour' => array('rikmeijer-nl_nav_active_icon_colour', t('Navigation bar active icon color '), $arr['nav_active_icon_colour']),
			'$link_colour' => array('rikmeijer-nl_link_colour', t('Link color'), $arr['link_colour'], '', $link_colours),
			'$banner_colour' => array('rikmeijer-nl_banner_colour', t('Set font-color for banner'), $arr['banner_colour']),
			'$bgcolour' => array('rikmeijer-nl_background_colour', t('Set the background color'), $arr['bgcolour']),
			'$background_image' => array('rikmeijer-nl_background_image', t('Set the background image'), $arr['background_image']),
			'$item_colour' => array('rikmeijer-nl_item_colour', t('Set the background color of items'), $arr['item_colour']),
			'$comment_item_colour' => array('rikmeijer-nl_comment_item_colour', t('Set the background color of comments'), $arr['comment_item_colour']),
			'$font_size' => array('rikmeijer-nl_font_size', t('Set font-size for the entire application'), $arr['font_size'], t('Examples: 1rem, 100%, 16px')),
			'$font_colour' => array('rikmeijer-nl_font_colour', t('Set font-color for posts and comments'), $arr['font_colour']),
			'$radius' => array('rikmeijer-nl_radius', t('Set radius of corners'), $arr['radius'], t('Example: 4px')),
			'$shadow' => array('rikmeijer-nl_shadow', t('Set shadow depth of photos'), $arr['shadow']),
			'$converse_width' => array('rikmeijer-nl_converse_width',t('Set maximum width of content region in pixel'),$arr['converse_width'], t('Leave empty for default width')),
			'$top_photo' => array('rikmeijer-nl_top_photo', t('Set size of conversation author photo'), $arr['top_photo']),
			'$reply_photo' => array('rikmeijer-nl_reply_photo', t('Set size of followup author photos'), $arr['reply_photo']),
			'$advanced_theming' => ['rikmeijer-nl_advanced_theming', t('Show advanced settings'), $arr['advanced_theming'], '', [t('No'), t('Yes')]]
			));

		return $o;
	}

}






