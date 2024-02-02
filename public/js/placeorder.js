var stripe = Stripe(
  "pk_test_51Of4HBLOvbIi11myDG0YDg3q0Dk4nOWWyOtdYtWPEAJRHoxVXDH5LuAdIlc4ykxTerieiEsgla12psKdBmchMYu700YfwSYXbV"
);
var elements = stripe.elements();
var cardElement = elements.create("card");

cardElement.mount("#card-element");

var form = document.getElementById("");

form.addEventListener("submit", function (event) {
  event.preventDefault();
  let formData = new FormData(addworker);
      let ajax = new XMLHttpRequest();

      ajax.open(
        "POST",
        "http://localhost/eCommerce/src/controller/checkout.php",
        true
      );

  stripe
    .confirmCardPayment(
      "pk_test_51Of4HBLOvbIi11myDG0YDg3q0Dk4nOWWyOtdYtWPEAJRHoxVXDH5LuAdIlc4ykxTerieiEsgla12psKdBmchMYu700YfwSYXbV",
      {
        payment_method: {
          card: cardElement,
        },
      }
    )
    .then(function (result) {
      if (result.error) {
        Toastify({
          text: result.error.message,
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
      } else {
        Toastify({
          text: "Payment successful!",
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
        }).showToast();
      }
    });
});

// document.addEventListener("DOMContentLoaded", function () {
//   let addworker = document.getElementById("placeOrder");
//   addworker.addEventListener("submit", function (e) {
//     e.preventDefault();
//     let formData = new FormData(addworker);
//     let ajax = new XMLHttpRequest();

//     ajax.open(
//       "POST",
//       "http://localhost/eCommerce/src/controller/checkout.php",
//       true
//     );
//     ajax.onload = function () {
//       if (ajax.status === 200) {
//         let response = JSON.parse(ajax.responseText);
//         console.log(response);
//         if (response.status === true) {
//           addworker.reset();
//           Toastify({
//             text: response.message,
//             duration: 3000,
//             close: false,
//             gravity: "middle",
//             position: "right",
//             stopOnFocus: false,
//             style: {
//               background: "lightgreen",
//               fontFamily: "verdana",
//               color: "black",
//               textAlign: "center",
//               width: "15%",
//               fontSize: "15px",
//               boxShadow: "0px 0px 2px 2px lightgreen",
//               padding: "15px",
//               borderRadius: "20px",
//             },

//             callback: function () {
//               window.location.href =
//                 "http://localhost/eCommerce/view/admin/cart.php";
//             },
//           }).showToast();
//         } else {
//           Toastify({
//             text: response.message,
//             duration: 3000,
//             close: false,
//             gravity: "middle",
//             position: "right",
//             stopOnFocus: false,
//             style: {
//               background: "lightred",
//               color: "white",
//             },
//           }).showToast();
//         }
//       }
//     };
//     ajax.send(formData);
//   });
// });
