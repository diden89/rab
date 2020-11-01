/*!
 * @package RAB
 * @copyright Noobscript
 * @author diden89
 * @version 1.0
 * @access Public
 * @link /rab_frontend/scripts/projects/material_consumption.js
 */

function addCommas(nStr) //format number
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

const _generate_sub_data = (data) => {
	let strSubData = '';

	$.each(data, (k, v) => {
		
		strSubData += '<tr>';
			strSubData += '<td><b>' + v.p_name + '</b></td>'
			strSubData += '<td><b>' + v.bt_building_type + '</b></td>'
			strSubData += '<td><b>' + v.ps_name + '</b></td>'
			strSubData += '<td style="text-align:center;">';
				strSubData += '<div class="btn-group btn-group-sm" role="group" aria-label="Action Button">';
					strSubData += '<button type="button" class="btn btn-success" data-id="' + v.ps_id + '" data-nama="' + v.ps_name + '" onclick="popup_projects_sub(\'edit\', \'Edit\',' + v.ps_id + ');"><i class="fas fa-edit"></i></button>';
					strSubData += '<button type="button" class="btn btn-danger" data-id="' + v.ps_id + '" data-nama="' + v.ps_name + '" onclick="delete_data(' + v.p_id + ',' + v.ps_id + ',\'projects_sub\');"><i class="fas fa-trash-alt"></i></button>';
				strSubData += '</div>';
			strSubData += '</td>';
			// strSubData += '<input type="hidden" value="'+ bt_id +'" name="bt_id[]">';
		strSubData += '</tr>';
	});

	$('.projects-sub').find('tbody').append(strSubData);
};

function popup_projects(mode = 'add', title = 'Add', data = false)
{
	$.popup({
		title: title + ' Projects',
		id: mode + 'ProjectsPopup',
		size: 'default',
		proxy: {
			url: siteUrl('projects/material_consumption/popup_projects'),
			params: {
				action: 'popup_modal',
				mode: mode,
				data: data
			}
		},
		buttons: [{
			btnId: 'saveData',
			btnText:'Save',
			btnClass: 'info',
			btnIcon: 'fas fa-check-circle',
			onclick: function(popup) {
				var form  = popup.find('form');
				if ($.validation(form)) {
					var formData = new FormData(form[0]);
					$.ajax({
						url: siteUrl('projects/material_consumption/store_data_projects'),
						type: 'POST',
						dataType: 'JSON',
						data: formData,
						processData: false,
						contentType: false,
         				cache: false,
         				enctype: 'multipart/form-data',
						success: function(result) {
							if (result.success) {
								toastr.success(msgSaveOk);
							} else if (typeof(result.msg) !== 'undefined') {
								toastr.error(result.msg);
							} else {
								toastr.error(msgErr);
							}

							get_data();
							loadProjectsSub(data);

							popup.close();

						},
						error: function(error) {
							toastr.error(msgErr);
						}
					});
				}
			}
		}, {
			btnId: 'closePopup',
			btnText:'Tutup',
			btnClass: 'secondary',
			btnIcon: 'fas fa-times',
			onclick: function(popup) {
				popup.close();
			}
		}],
	});
}

function popup_material_consumption(mode = 'add', title = 'Add', data = false)
{
	var p_id = $('#p-id').val();
	var ps_id = $('#ps-id').val();

	$.popup({
		title: title + ' Material Consumption',
		id: mode + 'MaterialConsPopup',
		size: 'medium',
		proxy: {
			url: siteUrl('projects/material_consumption/popup_material'),
			params: {
				action: 'popup_modal',
				mode: mode,
				id: data,
				p_id : p_id,
				ps_id : ps_id
			}
		},
		buttons: [{
			btnId: 'saveData',
			btnText:'Save',
			btnClass: 'info',
			btnIcon: 'fas fa-check-circle',
			onclick: function(popup) {
				var form  = popup.find('form');
				if ($.validation(form)) {
					var formData = new FormData(form[0]);
					$.ajax({
						url: siteUrl('projects/material_consumption/store_data_projects_sub'),
						type: 'POST',
						dataType: 'JSON',
						data: formData,
						processData: false,
						contentType: false,
         				cache: false,
         				enctype: 'multipart/form-data',
						success: function(result) {
							if (result.success) {
								toastr.success(msgSaveOk);
							} else if (typeof(result.msg) !== 'undefined') {
								toastr.error(result.msg);
							} else {
								toastr.error(msgErr);
							}

							loadProjectsSub(result.p_id);

							popup.close();

						},
						error: function(error) {
							toastr.error(msgErr);
						}
					});
				}
			}
		}, {
			btnId: 'closePopup',
			btnText:'Tutup',
			btnClass: 'secondary',
			btnIcon: 'fas fa-times',
			onclick: function(popup) {
				popup.close();
			}
		}],
		listeners : {
			onshow : function(popup){
				
				$('#userBirthday').inputmask('dd-mm-yyyy', { 'placeholder': 'DD-MM-YYYY' });
				$('#userBirthday').noobsdaterangepicker({
					parentEl: "#" + popup[0].id + " .modal-body",
					showDropdowns: true,
					singleDatePicker: true,
					locale: {
						format: 'DD-MM-YYYY'
					}
				});

				$('input.number').keyup(function(event) {
				  // skip for arrow keys
				  if(event.which >= 37 && event.which <= 40) return;

				  // format number
				  $(this).val(function(index, value) {
				    return value
				    .replace(/\D/g, "")
				    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
				    ;
				  });
				});
			}
		}
	});
}

function loadDataMaterial(data) 
{
	$('.material-consumption').find('tbody').html('');

	var listGroup = '';
	
	$.each(data, (k, v) => {
		listGroup += '<tr>';
		listGroup += '<td>'+ v.num+'</td>';
		listGroup += '<td>'+ v.p_name+'</td>';
		listGroup += '<td>'+ v.ps_name+'</td>';
		listGroup += '<td>'+ v.mc_date_order+'</td>';
		listGroup += '<td>'+ v.il_item_name+'</td>';
		listGroup += '<td>'+ v.mc_price+'</td>';
		listGroup += '<td>'+ v.mc_quantity+'</td>';
		listGroup += '<td>'+ v.un_name+'</td>';
		listGroup += '<td>'+ v.mc_total+'</td>';
		listGroup += '<td>';
				listGroup += '<div class="btn-group btn-group-sm" role="group" aria-label="Action Button">';
					listGroup += '<button type="button" class="btn btn-success" data-id="' + v.p_id + '" data-item="' + v.p_name + '" onclick="popup_projects(\'edit\', \'Edit\',' + v.p_id + ');"><i class="fas fa-edit"></i></button>';
					listGroup += '<button type="button" class="btn btn-danger" data-id="' + v.p_id + '" data-item="' + v.p_name + '" onclick="delete_data(' + v.p_id + ',\'\',\'projects\');"><i class="fas fa-trash-alt"></i></button>';
				listGroup += '</div>';
			listGroup += '</td>';
		listGroup += '</tr>';
	});
	
	$('.material-consumption').find('tbody').append(listGroup);

}

function load_projects_sub(data)
{
	$('.ps-id').html('');
	// $('.ps_id').find('option').append('');
	var listGroup = '<option value="">-Select-</option>';
	
	$.each(data, (k, v) => {
		listGroup += '<option value="'+v.ps_id+'">'+ v.ps_name+'</option>';
	});
	
	$('.ps-id').append(listGroup);
}

function delete_data(p_id = "",ps_id = "", mode = "")
{		
// console.log(mode)					
	Swal.fire({
		title: 'Are you sure?',
		text: "Data that has been deleted cannot be restored!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#17a2b8',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete this data!'
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: siteUrl('projects/material_consumption/delete_data'),
				type: 'POST',
				dataType: 'JSON',
				data: {
					action: 'delete_data',
					txt_p_id: p_id,
					txt_ps_id: ps_id,
					mode : mode

				},
				success: function(result) {
					if (result.success) {
						toastr.success("Data succesfully deleted.");
						if(mode == 'projects')
						{
							get_data();
						}
						else
						{
							loadProjectsSub(p_id);
						}
					} else if (typeof(result.msg) !== 'undefined') {
						toastr.error(result.msg);
					} else {
						toastr.error(msgErr);
					}
					
				},
				error: function(error) {
					toastr.error(msgErr);
				}
			});
		}
	});
							
}

$(document).ready(function() {


	$('#p-id').on('change',function(){
		var p_id = $('#p-id').val();

		$.ajax({
			url: siteUrl('projects/material_consumption/get_projects_sub'),
			type: 'POST',
			dataType: 'JSON',
			data: {
				action: 'get_sub_data',
				p_id : p_id
			},
			success: function (result) {
				if (result.success) {
					load_projects_sub(result.data);	
				} else if (typeof (result.msg) !== 'undefined') {
					toastr.error(result.msg);
				} else {
					toastr.error(msgErr);
				}
			},
			error: function (error) {
				toastr.error(msgErr);
			}
		});
	});

	$('#showMaterial').submit(function(e){
		e.preventDefault(); 

		$.ajax({
			url: siteUrl('projects/material_consumption/show_material'),
			type: 'POST',
			dataType: 'JSON',
			data: new FormData(this),
			processData: false,
			contentType: false,
				cache: false,
				enctype: 'multipart/form-data',
			success: function(result) {
				if (result.success) {
					toastr.success(msgSaveOk);
					loadDataMaterial(result.data);
					$('.btn-sub').css('display','block');

				} else if (typeof(result.msg) !== 'undefined') {
					toastr.error(result.msg);
				} else {
					toastr.error(msgErr);
				}

			},
			error: function(error) {
				toastr.error(msgErr);
			}
		});
	});
});