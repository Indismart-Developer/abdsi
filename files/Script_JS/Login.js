var handleLoginPageChangeBackground = function() {
        $('[data-click="change-bg"]').live("click", function(a) {
            a.preventDefault();
            var b = '[data-id="login-cover-image"]',
                c = $(this).find("img").attr("src"),
                d = '<img src="' + c + '" data-id="login-cover-image" />';
            $(".login-cover-image").prepend(d), $(b).not('[src="' + c + '"]').fadeOut("slow", function() {
                $(this).remove()
            }), $('[data-click="change-bg"]').closest("li").removeClass("active"), $(this).closest("li").addClass("active")
        })
    },
    LoginV2 = function() {
        "use strict";
        return {
            init: function() {
                handleLoginPageChangeBackground()
            }
        }
    }();

$( "#login_form" ).submit(function( event ) {
		$.ajax({
			type: "POST",
			url:  $("#login_form").attr('action'),
			dataType: 'json',
			data: $("#login_form").serialize(),
			beforeSend: function(){
				$( "#button_login" ).prop( "disabled", true );
			},
			success: function(data){
				if(data.status == 'error'){
					swal("Oooops!", data.msg, "error");
				}else{
					swal({
					  title: "Information",
					  text: data.msg,
					  type: "success",
					  closeOnConfirm: false
					},
					function(){
						window.location.href = base_url + "Dashboard";
					});

				}
			},
			complete: function() {
				$( "#button_login" ).prop( "disabled", false );
			}	        
		});
	  event.preventDefault();
	});