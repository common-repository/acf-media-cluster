<?php

    // exit if accessed directly
    if( ! defined( 'ABSPATH' ) ) exit;

    $key = "";
	if( !empty($_REQUEST['key']) ){
		$key = preg_replace("/[^a-z0-9_]/", "", $_REQUEST['key']);
	} else if( !empty($pkey) ){
		$key = preg_replace("/[^a-z0-9_]/", "", $pkey);
	}
	$group = (!empty($_REQUEST['group']))?preg_replace("/[^0-9]/", "",$_REQUEST['group']):1;
	$fname = (!empty($_REQUEST['fname']))?preg_replace("/[^a-z0-9_]/", "",$_REQUEST['fname']):preg_replace("/[^a-z0-9_]/", "",$fname);
	if( $groupIndex > 0 ){
		$group = $groupIndex;
	}
?>
<div class="acf-mc-field-group acf-mc-field-group-row acf-mc-field-group-<?php echo $group; ?>">
	<div class="acf-mc-field-column acf-mc-field-column-filename">
		<input class="acf-mc-field-filename" type="text" readonly name="filename" value="<?php echo esc_url($url); ?>"/>
		<a href="<?php echo esc_url($url); ?>" target="_blank" title="View file" class="acf-mc-field-file-viewer"><span class="dashicons dashicons-welcome-view-site"></span></a>
	</div>
	<div class="acf-mc-field-column acf-mc-field-column-title">
		<input class="acf-mc-field-title" type="text" readonly name="title" value="<?php echo sanitize_text_field($title); ?>"/>
	</div>
	<div class="acf-mc-field-column acf-mc-field-column-action">
		<?php if( preg_replace('/[^0-9]/', '', $attachment_id) > 0 ){ ?>
			<input type="hidden" name="acf-mc-fields[<?php echo preg_replace('/[^a-z0-9_]/', '', $fname); ?>][]" value="<?php echo preg_replace('/[^0-9]/', '', $attachment_id); ?>"/>
		<?php } ?>
		<a href="#" title="Choose File from Media Library" class="button button-choose-file button-primary" data-key="<?php echo preg_replace('/[^a-z0-9_]/', '', $key); ?>" data-name="<?php echo preg_replace('/[^a-z0-9_]/', '', $fname); ?>" data-group="acf-mc-field-group-<?php echo preg_replace("/[^0-9]/", "",$group); ?>">Choose File</a>
		<a href="#" title="Edit" class="button button-edit <?php echo ($showEditDel==true)?:'acf-mc-field-hide'; ?>" data-post_id="<?php echo preg_replace('/[^0-9]/', '', $_GET['post']); ?>" data-key="<?php echo preg_replace('/[^a-z0-9_]/', '', $key); ?>" data-name="<?php echo preg_replace('/[^a-z0-9_]/', '', $fname); ?>" ><span class="dashicons dashicons-edit"></span></a>
		<a href="#" title="Delete" class="button button-delete  <?php echo ($showEditDel==true)?:'acf-mc-field-hide'; ?>" data-key="<?php echo preg_replace('/[^a-z0-9_]/', '', $key); ?>" data-group="acf-mc-field-group-<?php echo $group; ?>"><span class="dashicons dashicons-trash"></span></a>
		<a href="#" title="Add More" class="button button-plus <?php echo ($showAdd==true)?:'acf-mc-field-hide'; ?>" data-key="<?php echo preg_replace('/[^a-z0-9_]/', '', $key); ?>" data-name="<?php echo preg_replace('/[^a-z0-9_]/', '', $fname); ?>" data-group="acf-mc-field-group-<?php echo preg_replace("/[^0-9]/", "",$group); ?>"><span class="dashicons dashicons-plus"></span></a>
	</div>
</div>
<?php
	if( !empty($_REQUEST['noajax']) and $_REQUEST['noajax'] == true){ 
        die();
    }