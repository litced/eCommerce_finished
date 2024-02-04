document.addEventListener("DOMContentLoaded", function () {
  let registerForm = document.getElementById("loginform");
  registerForm.addEventListener("submit", function (z) {
    z.preventDefault();
    let formData = new FormData(registerForm);
    let ajax = new XMLHttpRequest();
    ajax.open(
      "POST",
      "http://localhost/eCommerce/src/controller/login.ctrl.php",
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
              fontFamily: "verdana",
              color: "black",
              textAlign: "center",
              width: "15%",
              fontSize: "15px",
              boxShadow: "0px 0px 2px 2px lightgreen",
              padding: "15px",
              borderRadius: "20px",
            },

            callback: function () {
              window.location.href =
                "http://localhost/eCommerce/index.php";
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
              fontFamily: "verdana",
              color: "black",
              textAlign: "center",
              width: "15%",
              fontSize: "15px",
              boxShadow: "0px 0px 2px 2px rgb(231, 110, 110)",
              padding: "15px",
              borderRadius: "20px",
            },
          }).showToast();
        }
      }
    };
    ajax.send(formData);
  });
  // debugger this code debog the code for you
});




