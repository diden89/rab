<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*!
 * @package Merek Dagang HKI
 * @copyright Noobscript
 * @author Sikelopes
 * @edit Diden89
 * @version 1.0
 * @access Public
 * @path /ahp_merekdagang_frontend/apps/module_frontend/trademark/views/similar_letters_form_letter_view.php
 */
?>

<form role="form" id="addUnit" autocomplete="off">
	<input type="hidden" name="action" value="store_data_item_unit">

	<?php if (isset($txt_unit)): ?>
		<input type="hidden" name="mode" value="edit">
		<input type="hidden" name="txt_id" value="<?php echo $txt_id; ?>">
	<?php endif; ?>
	
	<div class="form-group row">
		<label for="caption" class="col-3 col-form-label">Unit Name</label>
		<div class="col-9">
			<input type="text" id="txtUnit" name="txt_unit" class="form-control" required="required" value="<?php echo isset($txt_unit) ? $txt_unit : ''; ?>">
		</div>
	</div>
</form>