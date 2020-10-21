<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*!
 * @package Merek Dagang HKI
 * @copyright Noobscript
 * @author Sikelopes
 * @version 1.0
 * @access Public
 * @path /ahp_merekdagang_frontend/apps/module_frontend/trademark/views/similar_letters_form_view.php
 */
?>

<form role="form" id="formAddSimilarLetter" autocomplete="off">
	<input type="hidden" name="action" value="store_data">
	<input type="hidden" name="txt_letter" id="txtLetter" value="<?php echo $txt_letter; ?>">
	<div class="form-group row">
		<label for="caption" class="col-5 col-form-label">Similar Letter</label>
		<div class="col-7">
			<input type="text" id="txtSimilarLetter" name="txt_similar_letter" class="form-control" required="required">
		</div>
	</div>
</form>