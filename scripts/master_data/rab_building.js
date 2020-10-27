/*!
 * @package RAB
 * @copyright Noobscript
 * @author diden89
 * @version 1.0
 * @access Public
 * @link /ahp_merekdagang_frontend/scripts/master_data/rab_building.js
 */


const _generate_rab_data = (data) => {
	let strRabData = '';


	$.each(data, (k, v) => {
		strRabData += '<tr data-id="' + v.rm_id + '" data-parent="' + v.rm_parent_id + '">';
			strRabData += '<td><b>' + v.work + '</b></td>'
			strRabData += '<td><b>' + v.unit_rab + '</b></td>'
			strRabData += '<td><b>' + v.material + '</b></td>'
			strRabData += '<td><b>' + v.volume + '</b></td>'
			strRabData += '<td><b>' + v.unit_item + '</b></td>'
			strRabData += '<td><input type="text" width="50px" class="form-control" value="'+ v.rb_measure +'" name="measure"></td>';
			strRabData += '<td><input type="text" width="50px" class="form-control" value="'+ v.rb_measure +'" name="summary"></td>';
		strRabData += '</tr>';
	});

	$('.rab-table').find('tbody').append(strRabData);
};

function loadDataRab(bt_id) 
{
	$.ajax({
		url: siteUrl('master_data/rab_building/get_rab_data'),
		type: 'POST',
		dataType: 'JSON',
		data: {
			action: 'get_rab_data',
			bt_id: bt_id,
		},
		success: function (result) {
			if (result.success) {
				$('.rab-table').find('tbody').html('');
				$('.rab-table').find('tbody').append('<input type="hidden" value="'+bt_id+'" name="bt_id">');
				_generate_rab_data(result.data);
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
}

function loadData(data,callback) 
{
	var listGroup = $('#listGroup');

	listGroup.html('');

	for (var x in data) {
		var newData = data[x];

		listGroup.append('<a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#" aria-controls="profile" data-id="' + newData.bt_id + '">' + newData.bt_building_type + '</a>');
	}
	callback();
}


$(document).ready(function() {
	$.ajax({
		url: siteUrl('master_data/rab_building/get_data'),
		type: 'POST',
		dataType: 'JSON',
		data: {
			action: 'get_data'
		},
		success: function (result) {
			if (result.success) {
				loadData(result.data, function() {
					$('#listGroup a').on('click', function (e) {
						e.preventDefault();
						$('#btnSave').attr('disabled', false);
						bt_id = $(this).attr('data-id');
						loadDataRab(bt_id);
					});
				});

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

	$('#addAccessGroup').submit(function(e){
		e.preventDefault(); 

		$.ajax({
			url: siteUrl('master_data/rab_building/store_data'),
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
					loadTreeMenuData(result.ug_id);

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