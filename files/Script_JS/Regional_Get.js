$( document ).ready(function() {
    GetProvinces('#provinces');
	GetCities('#cities');
});

$(document).on("change", "#provinces", function(){
	$("#provinces_set").val(this.value);
	GetCities('#cities');
});

$(document).on("change", "#cities", function(){
	$("#cities_set").val(this.value);
});

function GetProvinces(e){
	if($(e).length){
		$.ajax({
			url: base_url + 'Regional/Get_Provinces',
			method : "POST",
			data : {
				set_id : $("#provinces_set").val()
			},
			dataType : 'html',
			success: function(data){
				$(e).html(data);
			}
		});
	}
}

function GetCities(e){
	if($(e).length){
		$.ajax({
			url: base_url + 'Regional/Get_Regency',
			method : "POST",
			data : {
				province : $("#provinces_set").val(),
				set_id : $("#cities_set").val()
			},
			dataType : 'html',
			success: function(data){
				$(e).html(data);
			}
		});
	}
}
