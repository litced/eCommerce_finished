document.addEventListener("DOMContentLoaded", function () {
  let addworker = document.getElementById("placeOrder");
  addworker.addEventListener("submit", function (e) {
    e.preventDefault();
    let formData = new FormData(addworker);
    let ajax = new XMLHttpRequest();
    
    // ajax.setRequestHeader('Content-Type', 'application/json');
    ajax.open(
      "POST",
      "http://localhost/eCommerce/src/controller/order.ctrl.php",
      true
    );
    ajax.onload = function () {
      if (ajax.status === 200) {
        let response = JSON.parse(ajax.responseText);
        console.log(response);
        if (response.status === true) {
          addworker.reset();
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
                "http://localhost/eCommerce/view/admin/cart.php";
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
