// -------RESPONSIVE------


// -------------------NO SLIDING VERSION-------------------

// document.addEventListener("DOMContentLoaded",function(){
//     let button = document.getElementById("menubutton");
//     let navbar = document.getElementById("navbar")
//     responsive();
//     window.addEventListener("resize",responsive);
//     function responsive(){
//         if(window.innerWidth < 650){
//             navbar.style.display = "none"
//             button.style.display = "flex"
//             button.addEventListener("click",toggle)
//         }else{
//             navbar.style.display ="flex" 
//             button.style.display ="none" 
//             button.removeEventListener("click",toggle)
//         }
//         function toggle(){
//             if (navbar.style.display === "none") {
//               navbar.style.display = "flex";
//             } else {
//               navbar
//               .style.display = "none";
//             }

//         }
//     }
// })

// -------------------------------SLIDING VERSION-----------------------


$(document).ready(function () {
  let $button = $("#menubutton");
  let $menu = $("#navbar");
  let $menubar = $("#menubutton"); 

  responsive();
  $(window).on("resize", responsive);

  function responsive() {
    if ($(window).width() < 653) {
      $menu.hide();
      $button.show();
      $button.on("click", function () {
        $menu.slideToggle();
        $menubar.toggleClass("rotate");
        updateIcon();
      });
    } else {
      $menu.show();
      $button.hide();
      $button.off("click");
      $menubar.removeClass("rotate");
      updateIcon();
    }
  }

  function updateIcon() {
    if ($menubar.hasClass("rotate")) {
      $menubar.html('<i class="fa-solid fa-arrows-up-to-line"></i>');
    } else {
      $menubar.html('<i class="fa-solid fa-bars"></i>');
    }
  }
});


// --------------NAVBAR ANIMATION SELECT---------------

$(document).ready(function () {
  let $shop = $("#shop");
  let $home = $("#home");

  $shop.on("click", function (e) {
    e.preventDefault();
    $home.removeClass("active");
    $shop.addClass("active");

     window.location.href = "shop.php";
     if(window.location.href="shop.php"){
      
     }
  });
});

// ----------------------SOLO SHOPPING IMAGE---------------------------



