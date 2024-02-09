document.addEventListener("DOMContentLoaded", function () {
  let registerForm = document.getElementById("");
  registerForm.addEventListener("submit", function (z) {
    z.preventDefault();
    let formData = new FormData(registerForm);
    let ajax = new XMLHttpRequest();
    // ajax.setRequestHeader('Content-Type', 'application/json');
    ajax.open(
      "POST",
      "http://localhost/eCommerce/src/controller/moncashPay/exec.php",
      true
    );
    ajax.onload = function () {
      if (ajax.status === 200) {
        let response = JSON.parse(ajax.responseText);
        console.log(response);
        if (response.status === true) {
          registerForm.reset();
          Toastify({
            text: response.message,
            duration: 3000,
            close: false,
            gravity: "middle",
            position: "right",
            stopOnFocus: false,
            style: {
              background: "lightgreen",
              fontFamily: "Verdana, sans-serif",
              color: "black",
              textAlign: "center",
              width: "15%",
              fontSize: "15px",
              boxShadow: "0px 0px 2px 2px lightgreen",
              padding: "24px",
              borderRadius: "20px",
            },

            callback: function () {
              window.location.href =
                "http://localhost/eCommerce/backend/adminBoards.php";
            },
          }).showToast();
        } else {
          Toastify({
            text: response.message,
            duration: 3000,
            close: false,
            gravity: "middle",
            position: "right",
            stopOnFocus: false,
            style: {
              background: "rgb(231, 110, 110)",
              fontFamily: "Verdana, sans-serif",
              color: "black",
              textAlign: "center",
              width: "15%",
              fontSize: "15px",
              boxShadow: "0px 0px 2px 2px rgb(231, 110, 110)",
              padding: "24px",
              borderRadius: "20px",
            },
          }).showToast();
        }
      }
    };
    ajax.send(formData);
  });
});
