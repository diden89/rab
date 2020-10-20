
var uploadImage = function(image) {
    var data = new FormData();

    data.append("image", image);
    data.append('action', 'store_image');
    $.ajax({
        url: siteUrl+'settings/menu/store_image',
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: 'post',
        dataType: 'json',
        success: function (url) {
            if (url.success) {
                var image = $('<img>').attr('src', url.url);
            
                $('.textarea').summernote("insertNode", image[0]);
            } else {
                alert('The image you are attempting to upload exceedes the maximum height or width');
            }
        }
    });
};

function show_modal(data,title,mode){
    $.popup({
        title: title + ' Menu',
        id: mode + 'MenuPopup',
        size: 'medium',
        proxy: {
            url: siteUrl+'settings/menu/popup_modal',
            params: {
                action: 'popup_modal',
                mode: mode,
                id: data
            }
        },
        buttons: [{
            btnId: 'saveData',
            btnText:'Save',
            btnClass: 'info',
            btnIcon: 'fa fa-check-circle',
            onclick: function(popup) {
                var form  = popup.find('form');
                if ($.validation(form)) {
                    var formData = new FormData(form[0]);
                    $.ajax({
                        url: siteUrl+'settings/menu/store_data',
                        type: 'POST',
                        dataType: 'JSON',
                        data: formData,
                        processData: false,
                        contentType: false,
                        cache: false,
                        enctype: 'multipart/form-data',
                        success: function(result) {
                            if (result.success) {
                                // toastr.success(msgSaveOk);
                            } else if (typeof(result.msg) !== 'undefined') {
                                // toastr.error(result.msg);
                            } else {
                                // toastr.error(msgErr);
                            }

                            $.ajax({
                                url: siteUrl+'settings/menu/load_data_menu',
                                type: 'POST',
                                dataType: 'JSON',
                                data: {
                                    action: 'load_data_menu'
                                },
                                success: function (result) {
                                    if (result.success) {
                                        _generate_menu(result.data);
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
            btnText:'Close',
            btnClass: 'secondary',
            btnIcon: 'fa fa-times',
            onclick: function(popup) {
                popup.close();
            }
        }]
    });
}

const _generate_menu = (data) => {
    let treeMenu = _generate_tree_menu(data, null, 0);

    $('.collaptable').find('tbody').html(treeMenu);
     $('.collaptable').aCollapTable({
        startCollapsed: true,
        addColumn: false,
        plusButton: '<span class="fa fa-plus"></span>',
        minusButton: '<span class="fa fa-minus"></span>'
    }); 
};

const _generate_tree_menu = (datas, parentId, idx) => {
    let strMenu = '';

    if (parentId == null || parentId == '' || parentId == ' ' || parentId == 0) {
        parentId = null;
    }

    idx++;

    $.each(datas, (k, v) => {
        if (v.m_parent_id == parentId) {
            // console.log(parentId);
            let children = _generate_tree_menu(datas, v.m_id, idx);

            if (children != '') {
                strMenu += '<tr data-id="' + v.m_id + '" data-parent="' + v.m_parent_id + '">';
                    strMenu += '<td></td>';
                    strMenu += '<td id="captionMenu"><b>' + v.m_caption + '</b></td>';
                    strMenu += '<td>' + v.m_url + '</td>';
                    strMenu += '<td>' + v.m_icon + '</td>';
                    strMenu += '<td>' + v.m_description + '</td>';
                    strMenu += '<td style="text-align:center;">';
                        strMenu += '<div class="btn-group" role="group">'; 
                            strMenu += '<button id="btnEdit" class="btn btn-success btn-sm" onClick=show_modal(' + v.m_id +',"Edit","edit")><i class="fa fa-edit"></i> Edit</button>';
                            strMenu += '<button id="btnDelete" class="btn btn-danger btn-sm " onClick=delete_data(' + v.m_id +') ><i class="fa fa-trash-alt"></i> Delete</button >';
                        strMenu += '</div>';
                        strMenu += '</td >';
                strMenu += '</tr>';

                if (idx > 0) {
                    strMenu += children;
                }
            } else {
                if (parentId != null && parentId != '') {
                    strMenu += '<tr data-id="' + v.m_id + '" data-parent="' + v.m_parent_id + '">';
                        strMenu += '<td><i class="fa fa-angle-double-right"></i></td>';
                        strMenu += '<td id="captionMenu">' + v.m_caption + '</td>';
                        strMenu += '<td>' + v.m_url + '</td>';
                        strMenu += '<td>' + v.m_icon + '</td>';
                        strMenu += '<td>' + v.m_description +'</td>';
                        strMenu += '<td style="text-align:center;">';
                        strMenu += '<div class="btn-group" role="group">'; 
                            strMenu += '<button id="btnEdit" class="btn btn-success btn-sm" onClick=show_modal(' + v.m_id +',"Edit","edit")><i class="fa fa-edit"></i> Edit</button>';
                            strMenu += '<button id="btnDelete" class="btn btn-danger btn-sm" onClick=delete_data(' + v.m_id +') ><i class="fa fa-trash-alt"></i> Delete</button >';
                        strMenu += '</div>';
                        strMenu += '</td >';
                    strMenu += '</tr >';
                } else {
                    strMenu += '<tr data-id="' + v.m_id + '" data-parent="">';
                        strMenu += '<td><i class="fa fa-angle-double-right"></i></td>';
                        strMenu += '<td id="captionMenu"><b>' + v.m_caption + '</b></td>';
                        strMenu += '<td>' + v.m_url + '</td>';
                        strMenu += '<td>' + v.m_icon + '</td>';
                        strMenu += '<td>' + v.m_description + '</td>';
                        strMenu += '<td style="text-align:center;">';
                        strMenu += '<div class="btn-group" role="group">'; 
                            strMenu += '<button id="btnEdit" class="btn btn-success btn-sm" onClick=show_modal(' + v.m_id +',"Edit","edit")><i class="fa fa-edit"></i> Edit</button>';
                            strMenu += '<button id="btnDelete" class="btn btn-danger btn-sm" onClick=delete_data(' + v.m_id +') ><i class="fa fa-trash-alt"></i> Delete</button >';
                        strMenu += '</div>';
                        strMenu += '</td >';
                    strMenu += '</tr >';
                }
            }
        }
    });

    return strMenu;
};

$(document).ready(function() {

    $.ajax({
        url: siteUrl+'settings/menu/load_data_menu',
        type: 'POST',
        dataType: 'JSON',
        data: {
            action: 'load_data_menu'
        },
        success: function (result) {
            if (result.success) {
                _generate_menu(result.data);
                // alert("Hello! I am an alert box!");
            }
        },
        error: function (error) {
        }
    });

    $('.textarea').summernote({
        callbacks: {
            onImageUpload: function (image) {
                uploadImage(image[0]);
            }
        }
    });

    $('#formInputMenu').submit(function(e){
        $('.menu.box').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
            e.preventDefault(); 
         $.ajax({
             url: siteUrl+'settings/menu/input_action',
             type:"post",
             data :new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
             dataType :'json',
             success: function(response){
                if(response.status)
                {
                    $('div.overlay').remove();
                  alert("Input Data Berhasil.");
                  window.location.replace(response.url);
                }
                else
                {
                    $('div.overlay').remove();
                    alert("Input Data Gagal.");
                }

           }
         });
    });

});