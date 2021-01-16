{{include file="field_checkbox.tpl" field=$narrow_navbar}}
{{include file="field_input.tpl" field=$converse_width}}
{{include file="field_input.tpl" field=$font_size}}
{{include file="field_checkbox.tpl" field=$advanced_theming}}
{{if $expert}}
	{{include file="field_colorinput.tpl" field=$nav_bg}}
	{{include file="field_colorinput.tpl" field=$nav_icon_colour}}
	{{include file="field_colorinput.tpl" field=$nav_active_icon_colour}}
	{{include file="field_colorinput.tpl" field=$banner_colour}}
	{{include file="field_colorinput.tpl" field=$bgcolour}}
	{{include file="field_colorinput.tpl" field=$background_image}}
	{{include file="field_colorinput.tpl" field=$item_colour}}
	{{include file="field_colorinput.tpl" field=$comment_item_colour}}
	{{*include file="field_colorinput.tpl" field=$comment_border_colour*}}
	{{*include file="field_input.tpl" field=$comment_indent*}}
	{{include file="field_colorinput.tpl" field=$font_colour}}
	{{include file="field_colorinput.tpl" field=$link_colour}}
	{{include file="field_input.tpl" field=$radius}}
	{{include file="field_input.tpl" field=$shadow}}
	{{include file="field_input.tpl" field=$top_photo}}
	{{include file="field_input.tpl" field=$reply_photo}}

<script>
	$(function(){
		$('#id_rikmeijer-nl_nav_bg, #id_rikmeijer-nl_nav_icon_colour, #id_rikmeijer-nl_nav_active_icon_colour, #id_rikmeijer-nl_banner_colour').colorpicker({format: 'rgba'});
		$('#id_rikmeijer-nl_link_colour,#id_rikmeijer-nl_background_colour').colorpicker();
		$('#id_rikmeijer-nl_toolicon_colour,#id_rikmeijer-nl_toolicon_activecolour,#id_rikmeijer-nl_font_colour').colorpicker();
		$('#id_rikmeijer-nl_item_colour,#id_rikmeijer-nl_comment_item_colour,#id_rikmeijer-nl_comment_border_colour').colorpicker({format: 'rgba'});
	});
</script>
{{/if}}
<div class="settings-submit-wrapper" >
	<button type="submit" name="rikmeijer-nl-settings-submit" class="btn btn-primary">{{$submit}}</button>
</div>
