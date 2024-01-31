document.addEventListener("DOMContentLoaded", function () {
  let addProduct = document.getElementById("addproduct");
  addProduct.addEventListener("submit", function (z) {
    z.preventDefault();
    let formData = new FormData(addProduct);
    let ajax = new XMLHttpRequest();
    // ajax.setRequestHeader('Content-Type', 'application/json');
    ajax.open(
      "POST",
      "http://localhost/eCommerce/src/controller/addproduct.ctrl.php",
      true
    );
    ajax.onload = function () {
      if (ajax.status === 200) {
        let response = JSON.parse(ajax.responseText);
        console.log(response);
        if (response.status === true) {
          addProduct.reset();
          Toastify({
            text: response.message,
            duration: 3000,
            close: false,
            gravity: "middle",
            position: "right",
            stopOnFocus: false,
            style: {
              background: "lightgreen",
              color: "black",
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
              background: "lightred",
              color: "white",
            },
          }).showToast();
        }
      }
    };
    ajax.send(formData);
  });
  
});
