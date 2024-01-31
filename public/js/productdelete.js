$(document).ready(() => {
	$('#tableproduct tbody').on('click', '.removeproduct', function (e) {
		e.preventDefault();
		let idp = $(this).attr('href');

		swal({
			title: "Confirmation",
			text: "would you really like to Remove this product",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: 'http://localhost/eCommerce/src/controller/deleteproduct.ctrl.php',
					type: "POST",
					dataType: 'script',
					data: { idp: idp },
					success: function (data) {
						console.log(data);
						swal("Remove User", "User Removed successfully", "success");
						setTimeout(function () {
							window.location.reload();
						}, 3000);

					}
				});
			} else {
				swal("Process aborted !");
			}
		});
	});
});



