/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7 & Bootstrap 4.0.0-Alpha 6
Version: 3.0.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v3.0/admin/apple/
*/
var handleDataTableDefault = function() {
        "use strict";
        0 !== $("#data-table").length && $("#data-table").DataTable({
            responsive: !0
        })
    },
    Users = function() {
        "use strict";
        return {
            init: function() {
                handleDataTableDefault();
            }
        }
    }();

$(document).on('click', '#btn-del', function () {
	var tr_tag = $(this).parent().parent();
	var id = $(this).attr('data-id');
	swal({
	  title: "Konfirmasi?",
	  text: "Hapus Data User!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonClass: "btn-danger",
	  confirmButtonText: "Ya, Hapus!",
	  closeOnConfirm: false
	},
	function(){
		$.ajax({
			type: "post",
			url: base_url + 'Users/Delete',
			data: {id: id},
			dataType: "json",
			success: function (data) {
				if (data.status) {
					swal('Data berhasil dihapus');
					$(tr_tag).remove();
				} else {
					swal('Maaf, data gagal dihapus');
				}
			}
		});
	});
	
	
});