document.addEventListener("DOMContentLoaded", function () {
   let addCategory = document.getElementById("addcategory");
   addCategory.addEventListener("submit", function (z) {
      z.preventDefault();
      let formData = new FormData(addCategory);
      let ajax = new XMLHttpRequest();
      // ajax.setRequestHeader('Content-Type', 'application/json');
      ajax.open(
         "POST",
         "http://localhost/eCommerce/src/controller/addCategory.ctrl.php",
         true
      );
      ajax.onload = function () {
         if (ajax.status === 200) {
            let response = JSON.parse(ajax.responseText);
            console.log(response);
            if (response.status === true) {
               addCategory.reset();
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
