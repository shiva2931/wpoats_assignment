// Product
$(document).on("click", "#btn_sub_save", function (e) {
	e.preventDefault();
	$("#frm_sub").validate({
		rules: {
			sub_name: {
				required: true,
			},
			tagline: {
				required: true,
			},
            descrption: {
				required: true,
			}, 
            sub_image: {
				required: true,
			},
            icon_image: {
				required: true,
			},
		},

		messages: {
			sub_name: {
				required: "Please enter Subject.",
			},
			tagline: {
				required: "Please enter Tagline",
			},
            descrption: {
				required: "Please enter Description",
			},
            sub_image: {
				required: "Please Select Image",
			},
            icon_image: {
				required: "Please Select Icon",
			},
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass("is-invalid");
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
			$(element).addClass("is-valid");
		},
	});

	if ($("#frm_sub").valid()) {
		document.getElementById("btn_sub_save").setAttribute("disabled", "");
		$("#btn_sub_save").html(
			'<i class="la la-refresh spinner"></i>saving...'
		);
		var postData = new FormData($("#frm_sub")[0]);
		$.ajax({
			url: "config/operations.php?action=insert",
			type: "POST",
			data: postData,
			cache: false,
			contentType: false,
			processData: false,
			success: function (data, textStatus, jqXHR) {
				 console.log(data);
				$("#btn_sub_save").removeAttr("disabled");
				$("#btn_sub_save").html(
					'<i class="la la-check-square-o"></i> Save'
				);
				var response = JSON.parse(data);
                console.log(response);
				if (response.data == "success") {
					Toast.fire({
						icon: response.data,
						title: response.msg,
					});
				} else if (response.data === "error") {
					Toast.fire({
						icon: response.data,
						title: response.msg,
					});
				}
                setTimeout("window.location.reload();", 1500);
			},
		});
	}
});

$(document).on("click", ".edit_sub", function () {
	var sub_id = $(this).val();
    $.ajax({
		url: "config/operations.php?action=get",
		type: "POST",
		data: { sub_id: sub_id },
		success: function (data, textStatus, jqXHR) {
			var response = JSON.parse(data);
            //console.log(response);
			document.getElementById("btn_sub_update").setAttribute("disabled", "");
			$("#btn_sub_save").hide();
			$("#btn_sub_update").removeAttr("disabled");
			$("#btn_sub_update").show();
			$("#sub_id").val(response.id);
			$("#sub_name").val(response.sub_name);
			$("#tagline").val(response.tagline);
			$("#descrption").val(response.descrption);
			if (response.image) {
				$("#prev_image").html(
					'<img height="60px" style="border-radius:50%" src="images/' +
						response.image +
						'">'
				);
			} else {
				$("#prev_image").html(
					'<img height="60px" style="border-radius:50%" src="images/no-image.jpg">'
				);
			}

			$("#sub_name").focus();
		},
	});
});

$(document).on("click", "#btn_sub_update", function (e) {
	e.preventDefault();
	$("#frm_sub").validate({
		rules: {
			sub_name: {
				required: true,
			},
			tagline: {
				required: true,
			},
            descrption: {
				required: true,
			},
		},

		messages: {
			sub_name: {
				required: "Please enter Subject.",
			},
			tagline: {
				required: "Please enter Tagline",
			},
            descrption: {
				required: "Please enter Description",
			},
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass("is-invalid");
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
			$(element).addClass("is-valid");
		},
	});

	if ($("#frm_sub").valid()) {
		document.getElementById("btn_sub_update").setAttribute("disabled", "");
		$("#btn_sub_update").html(
			'<i class="la la-refresh spinner"></i>updating...'
		);
		var postData = new FormData($("#frm_sub")[0]);
		$.ajax({
			url: "config/operations.php?action=update",
			type: "POST",
			data: postData,
			cache: false,
			contentType: false,
			processData: false,
			success: function (data, textStatus, jqXHR) {
				$("#btn_sub_update").removeAttr("disabled");
				$("#btn_sub_update").html(
					'<i class="la la-check-square-o"></i> Update'
				);
				var response = JSON.parse(data);
				if (response.data == "success") {
					Toast.fire({
						icon: response.data,
						title: response.msg,
					});
				} else if (response.data === "error") {
					Toast.fire({
						icon: response.data,
						title: response.msg,
					});
				}
              setTimeout("window.location.reload();", 1500);
			},
		});
	}
});







$(document).on("click", ".delete_sub", function () {
	$("#sub_delete_id").val($(this).val());
});

$(document).on("click", "#btn_sub_delete", function (e) {
	document.getElementById("btn_sub_save").setAttribute("disabled", "");
	$("#btn_sub_delete").html(
		'<i class="la la-refresh spinner"></i>deleting...'
	);
	var postData = new FormData($("#form_delete_sub")[0]);
	$.ajax({
		url: "config/operations.php?action=delete",
		type: "POST",
		data: postData,
		cache: false,
		contentType: false,
		processData: false,
		success: function (data, textStatus, jqXHR) {
			$("#btn_sub_delete").removeAttr("disabled");
			$("#btn_sub_delete").html(
				'<i class="la la-check-square-o"></i> Delete'
			);
			var response = JSON.parse(data);
			if (response.data == "success") {
				Toast.fire({
					icon: response.data,
					title: response.msg,
				});
				setTimeout("window.location.reload();", 1500);
			} else if (response.data === "error") {
				Toast.fire({
					icon: response.data,
					title: response.msg,
				});
			}
            console.log(data);
		},
	});
});