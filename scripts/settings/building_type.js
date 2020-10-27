/*!
 * @package RAB
 * @copyright Noobscript
 * @author Andy1t
 * @version 1.0
 * @access Public
 * @link /rab_frontend/scripts/settings/brand.js
 */

$(document).ready(function() {
	var BUILDING = {
		gridBuildingType : $('#gridBuilding').grid({
			serverSide: true,
			striped: true,
			autoWidth : true,
			proxy: {
				url: siteUrl('settings/building_type/load_data_building_type'),
				method: 'post',
				data: {
					action: 'load_data_building_type'
				},
			},
			columns: [
				{
					title: 'No', 
					data: 'no',
					searchable: false,
					orderable: false,
					width : 50,
					css: {
						'text-align': 'center'
					}
				},
				{
					title: 'Building Type',
					data: 'bt_building_type'
				},
				{
					title: 'Action',
					size: 'medium',
					type: 'buttons',
					group: true,
					css: {
						'text-align' : 'center',
						'width' : '200px'
					},
					content: [
						{
							text: 'Edit',
							class: 'btn-success',
							id: 'btnEdit',
							icon: 'far fa-edit',
							click: function(row, rowData) {
								BUILDING.popup('edit', 'Edit', rowData);
							}
						},
						{
							text: 'Delete',
							class: 'btn-danger',
							id: 'btnDelete',
							icon: 'far fa-trash-alt',
							click: function(row, rowData) {
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
											url: siteUrl('settings/building_type/delete_data'),
											type: 'POST',
											dataType: 'JSON',
											data: {
												action: 'delete_data',
												txt_id: rowData.ir_id
											},
											success: function(result) {
												if (result.success) {
													toastr.success("Data succesfully deleted.");
												} else if (typeof(result.msg) !== 'undefined') {
													toastr.error(result.msg);
												} else {
													toastr.error(msgErr);
												}
												
												BUILDING.gridBuildingType.reloadData({});
											},
											error: function(error) {
												toastr.error(msgErr);
											}
										});
									}
								});
							}
						}
					]
				}
			],
			listeners: {
				ondblclick: function(row, rowData, idx) {
					BUILDING.popup('edit', 'Edit', rowData);
				}
			}
		}),
		popup: function(mode = 'add', title = 'Add', data = false) {
			$.popup({
				title: title + ' Building Type',
				id: mode + 'BuildingPopup',
				size: 'small',
				proxy: {
					url: siteUrl('settings/building_type/popup_modal'),
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
								url: siteUrl('settings/building_type/store_data'),
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

									BUILDING.gridBuildingType.reloadData({});

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
				}]
			});
		},
		viewPopupItemDetail: function(data) {
			$.popup({
				title: 'Data Detail',
				id: 'dataDetailPopup',
				size: 'large',
				proxy: {
					url: siteUrl('settings/building_type/popup_item_detail'),
					params: {
						action: 'popup_item_detail',
						mode: 'view',
						data: data
					}
				},
				buttons: [{
					btnId: 'closePopup',
					btnText:'Tutup',
					btnClass: 'secondary',
					btnIcon: 'fas fa-times',
					onclick: function(popup) {
						popup.close();
					}
				}]
			});
		}
	};

	$('#btnAdd').click(function(e) {
		e.preventDefault();

		BUILDING.popup();
	});

	$('#btnSearchType').click(function(e) {
		e.preventDefault();

		BUILDING.gridBuildingType.reloadData({});
	});

	$('#txtList').keydown(function(e) {
    	var keyCode = (e.keyCode ? e.keyCode : e.which);
	    if (keyCode == 13) {
	        $('#btnSearchType').trigger('click');
	    }
	});

});