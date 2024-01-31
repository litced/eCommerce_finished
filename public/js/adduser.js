document.addEventListener("DOMContentLoaded",function(){
    let adduser = document.getElementById("addworker")
    adduser.addEventListener("submit",function(e){
        e.preventDefault();
        let formData = new FormData(adduser);
        let ajax = new XMLHttpRequest();
        // ajax.setRequestHeader('Content-Type', 'application/json');
      
      ajax.open("POST","http://localhost/eCommerce/src/controller/addworker.ctrl.php",true)
      ajax.onload = function(){
        if(ajax.status === 200){
          let response = JSON.parse(ajax.responseText);
          console.log(response);
          if(response.status === true){
            adduser.reset();
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
          }else{
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
      }
      ajax.send(formData)
    })
})