$(document).ready(function(){
  // Add smooth scrolling to all links
  $(".button-1").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});

$('.img-carousel1').on('click', function(){
  $('.img-carousel1').addClass('active');
  $('.img-carousel2').removeClass('active');
  $('.img-carousel3').removeClass('active');
})

$('.img-carousel2').on('click', function(){
  $('.img-carousel1').removeClass('active');
  $('.img-carousel2').addClass('active');
  $('.img-carousel3').removeClass('active');
})

$('.img-carousel3').on('click', function(){
  $('.img-carousel1').removeClass('active');
  $('.img-carousel2').removeClass('active');
  $('.img-carousel3').addClass('active');
})


$(".btn-group #btn-ind").on('click', function(){
  $('#btn-ind').addClass("active");
  $('#btn-jpn').removeClass("active");
  $('#btn-kr').removeClass("active");
  $('#btn-ch').removeClass("active");
  $('#btn-thai').removeClass("active");
  $('.Indonesia').fadeIn(1000);
  $('.japan').hide();
  $('.korea').hide();
  $('.china').hide();
  $('.thailand').hide();
  $('.Indonesia').css('animation', 'sliding 1s 1');
});

$(".btn-group #btn-jpn").on('click', function(){
  $('#btn-ind').removeClass("active");
  $('#btn-jpn').addClass("active");
  $('#btn-kr').removeClass("active");
  $('#btn-ch').removeClass("active");
  $('#btn-thai').removeClass("active");
  $('.Indonesia').hide();
  $('.japan').fadeIn(1000);
  $('.korea').hide();
  $('.china').hide();
  $('.thailand').hide();
  $('.japan').css('animation', 'sliding 1s 1');
});

$(".btn-group #btn-kr").on('click', function(){
  $('#btn-ind').removeClass("active");
  $('#btn-jpn').removeClass("active");
  $('#btn-kr').addClass("active");
  $('#btn-ch').removeClass("active");
  $('#btn-thai').removeClass("active");
  $('.Indonesia').hide();
  $('.japan').hide();
  $('.korea').fadeIn(1000);
  $('.china').hide();
  $('.thailand').hide();
  $('.korea').css('animation', 'sliding 1s 1');
});

$(".btn-group #btn-ch").on('click', function(){
  $('#btn-ind').removeClass("active");
  $('#btn-jpn').removeClass("active");
  $('#btn-kr').removeClass("active");
  $('#btn-ch').addClass("active");
  $('#btn-thai').removeClass("active");
  $('.Indonesia').hide();
  $('.japan').hide();
  $('.korea').hide();
  $('.china').fadeIn(1000);
  $('.thailand').hide();
  $('.china').css('animation', 'sliding 1s 1');
});

$(".btn-group #btn-thai").on('click', function(){
  $('#btn-ind').removeClass("active");
  $('#btn-jpn').removeClass("active");
  $('#btn-kr').removeClass("active");
  $('#btn-ch').removeClass("active");
  $('#btn-thai').addClass("active");
  $('.Indonesia').hide();
  $('.japan').hide();
  $('.korea').hide();
  $('.china').hide();
  $('.thailand').fadeIn(1000);
  $('.thailand').css('animation', 'sliding 1s 1');
});

ScrollReveal({ reset: true });
ScrollReveal().reveal('.cover-text', { duration: 1000}, { delay:1000 });
ScrollReveal().reveal('.top-destination');
ScrollReveal().reveal('.top-hotel', { duration: 1000});
ScrollReveal().reveal('.accommodations');
ScrollReveal().reveal('.room', { duration: 1000});
ScrollReveal().reveal('.network', { duration: 1000});
ScrollReveal().reveal('.client', { duration: 1000});
ScrollReveal().reveal('.footer-item', { interval: 200});
ScrollReveal().reveal('.table-detail', { duration: 1000});
ScrollReveal().reveal('.popular .card', { interval: 200});

$(".return-1").on('click', function(){
  $('.return-1').addClass("active");
  $('.return-2').removeClass("active");
  $('.return-3').removeClass("active");
  $('.return-4').removeClass("active");
  $('.return-5').removeClass("active");
  $('#return-1').fadeIn(1000);
  $('#return-2').hide();
  $('#return-3').hide();
  $('#return-4').hide();
  $('#return-5').hide();
});

$(".return-2").on('click', function(){
  $('.return-2').addClass("active");
  $('.return-1').removeClass("active");
  $('.return-3').removeClass("active");
  $('.return-4').removeClass("active");
  $('.return-5').removeClass("active");
  $('#return-2').fadeIn(1000);
  $('#return-1').hide();
  $('#return-3').hide();
  $('#return-4').hide();
  $('#return-5').hide();
});

$(".return-3").on('click', function(){
  $('.return-3').addClass("active");
  $('.return-2').removeClass("active");
  $('.return-1').removeClass("active");
  $('.return-4').removeClass("active");
  $('.return-5').removeClass("active");
  $('#return-3').fadeIn(1000);
  $('#return-2').hide();
  $('#return-1').hide();
  $('#return-4').hide();
  $('#return-5').hide();
});

$(".return-4").on('click', function(){
  $('.return-4').addClass("active");
  $('.return-3').removeClass("active");
  $('.return-2').removeClass("active");
  $('.return-1').removeClass("active");
  $('.return-5').removeClass("active");
  $('#return-4').fadeIn(1000);
  $('#return-3').hide();
  $('#return-2').hide();
  $('#return-1').hide();
  $('#return-5').hide();
});

$(".return-5").on('click', function(){
  $('.return-5').addClass("active");
  $('.return-4').removeClass("active");
  $('.return-3').removeClass("active");
  $('.return-2').removeClass("active");
  $('.return-1').removeClass("active");
  $('#return-5').fadeIn(1000);
  $('#return-4').hide();
  $('#return-3').hide();
  $('#return-2').hide();
  $('#return-1').hide();
});

$("#next, #prev").on('click', function(){
  $('#client-item1, #client-item2, #client-item3, #client-item4').toggleClass('active');
  $("#client-item1, #client-item2, #client-item3, #client-item4").fadeToggle(500);
  $('#client-item1, #client-item2, #client-item3, #client-item4').css('animation', 'sliding 1s 1');
});

// When the user clicks on div, open the popup
function myProfil() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}

// When the user clicks on div, open the popup
function myProfil2() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}

// When the user clicks on div, open the popup
function myProfil3() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}

// Pas diClick keluar banyak?, apanya itunya :v
$(document).ready(function(){
      var readMoreHTML = $(".read-more").html();
      var lessText = readMoreHTML.substr(0, 300);
 
      if(readMoreHTML.length > 300){
        $(".read-more").html(lessText).append("<a href='' class='read-more-link text-primary'>Selengkapnya</a>");
      } else {
        $("read-more").html(readMoreHTML);
      }
 
      $("body").on("click", ".read-more-link", function(event){
        event.preventDefault();
        $(this).parent(".read-more").html(readMoreHTML).append("<a href='' class='show-less-link text-primary'>Tutup</a>");
      });
 
      $("body").on("click", ".show-less-link", function(){
        event.preventDefault();
        $(this).parent(".read-more").html(readMoreHTML.substr(0, 300)).append("<a href='' class='read-more-link text-primary'>Selengkapnya</a>");
      });
    });

 $(document).ready(function()
 {
   
     $("#dtBox").DateTimePicker();
   
 });

 $(".rating-clean").ready(function(){
   $(".rating-clean .1-star").on("click", function(){
      $(".rating-clean .1-star").addClass("cheked-star");
      $(".rating-clean .1-star").nextAll().removeClass("cheked-star");
    });

    $(".rating-clean .2-star").on("click", function(){
      $(".rating-clean .3-star").prevAll().addClass("cheked-star");
      $(".rating-clean .2-star").nextAll().removeClass("cheked-star");
    });

    $(".rating-clean .3-star").on("click", function(){
      $(".rating-clean .4-star").prevAll().addClass("cheked-star");
      $(".rating-clean .3-star").nextAll().removeClass("cheked-star");
    });

    $(".rating-clean .4-star").on("click", function(){
      $(".rating-clean .5-star").prevAll().addClass("cheked-star");
      $(".rating-clean .4-star").nextAll().removeClass("cheked-star");
    });

    $(".rating-clean .5-star").on("click", function(){
      $(".rating-clean .6-star").prevAll().addClass("cheked-star");
      $(".rating-clean .5-star").nextAll().removeClass("cheked-star");
    });
 });

 $(".rating-comfort").ready(function(){
   $(".rating-comfort .1-star").on("click", function(){
      $(".rating-comfort .1-star").addClass("cheked-star");
      $(".rating-comfort .1-star").nextAll().removeClass("cheked-star");
    });

    $(".rating-comfort .2-star").on("click", function(){
      $(".rating-comfort .3-star").prevAll().addClass("cheked-star");
      $(".rating-comfort .2-star").nextAll().removeClass("cheked-star");
    });

    $(".rating-comfort .3-star").on("click", function(){
      $(".rating-comfort .4-star").prevAll().addClass("cheked-star");
      $(".rating-comfort .3-star").nextAll().removeClass("cheked-star");
    });

    $(".rating-comfort .4-star").on("click", function(){
      $(".rating-comfort .5-star").prevAll().addClass("cheked-star");
      $(".rating-comfort .4-star").nextAll().removeClass("cheked-star");
    });

    $(".rating-comfort .5-star").on("click", function(){
      $(".rating-comfort .6-star").prevAll().addClass("cheked-star");
      $(".rating-comfort .5-star").nextAll().removeClass("cheked-star");
    });
 });

 $(".rating-service").ready(function(){
   $(".rating-service .1-star").on("click", function(){
      $(".rating-service .1-star").addClass("cheked-star");
      $(".rating-service .1-star").nextAll().removeClass("cheked-star");
    });

    $(".rating-service .2-star").on("click", function(){
      $(".rating-service .3-star").prevAll().addClass("cheked-star");
      $(".rating-service .2-star").nextAll().removeClass("cheked-star");
    });

    $(".rating-service .3-star").on("click", function(){
      $(".rating-service .4-star").prevAll().addClass("cheked-star");
      $(".rating-service .3-star").nextAll().removeClass("cheked-star");
    });

    $(".rating-service .4-star").on("click", function(){
      $(".rating-service .5-star").prevAll().addClass("cheked-star");
      $(".rating-service .4-star").nextAll().removeClass("cheked-star");
    });

    $(".rating-service .5-star").on("click", function(){
      $(".rating-service .6-star").prevAll().addClass("cheked-star");
      $(".rating-service .5-star").nextAll().removeClass("cheked-star");
    });
 });

 $(".rating-location").ready(function(){
   $(".rating-location .1-star").on("click", function(){
      $(".rating-location .1-star").addClass("cheked-star");
      $(".rating-location .1-star").nextAll().removeClass("cheked-star");
    });

    $(".rating-location .2-star").on("click", function(){
      $(".rating-location .3-star").prevAll().addClass("cheked-star");
      $(".rating-location .2-star").nextAll().removeClass("cheked-star");
    });

    $(".rating-location.3-star").on("click", function(){
      $(".rating-location .4-star").prevAll().addClass("cheked-star");
      $(".rating-location .3-star").nextAll().removeClass("cheked-star");
    });

    $(".rating-location .4-star").on("click", function(){
      $(".rating-location .5-star").prevAll().addClass("cheked-star");
      $(".rating-location .4-star").nextAll().removeClass("cheked-star");
    });

    $(".rating-location .5-star").on("click", function(){
      $(".rating-location .6-star").prevAll().addClass("cheked-star");
      $(".rating-location .5-star").nextAll().removeClass("cheked-star");
    });
 });

 $(".rating-price").ready(function(){
   $(".rating-price .1-star").on("click", function(){
      $(".rating-price .1-star").addClass("cheked-star");
      $(".rating-price .1-star").nextAll().removeClass("cheked-star");
    });

    $(".rating-price .2-star").on("click", function(){
      $(".rating-price .3-star").prevAll().addClass("cheked-star");
      $(".rating-price .2-star").nextAll().removeClass("cheked-star");
    });

    $(".rating-price .3-star").on("click", function(){
      $(".rating-price .4-star").prevAll().addClass("cheked-star");
      $(".rating-price .3-star").nextAll().removeClass("cheked-star");
    });

    $(".rating-price .4-star").on("click", function(){
      $(".rating-price .5-star").prevAll().addClass("cheked-star");
      $(".rating-price .4-star").nextAll().removeClass("cheked-star");
    });

    $(".rating-price .5-star").on("click", function(){
      $(".rating-price .6-star").prevAll().addClass("cheked-star");
      $(".rating-price .5-star").nextAll().removeClass("cheked-star");
    });
 });

window.onscroll = function() {myFunction()};

function myFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    $(".fixed-top").fadeOut(500);
  } else {
    $(".fixed-top").fadeIn(500);
  }
}

function myFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    $(".bg-tranparent").fadeOut(500);
  } else {
    $(".bg-tranparent").fadeIn(500);
  }
}
