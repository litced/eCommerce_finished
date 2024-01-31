$(document).ready(() => {
	$('#tableuser tbody').on('click', '.removeuser', function (e) {
		e.preventDefault();
		let id = $(this).attr('href');

		swal({
			title: "Confirmation",
			text: "would you really like to Remove this user",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: 'http://localhost/eCommerce/src/controller/deleteworker.ctrl.php',
					type: "POST",
					dataType: 'json',
					data: { id: id },
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



