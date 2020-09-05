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



$(".btn-group #btn-ind").on('click', function(){
  $('.Indonesia').show();
  $('.japan').hide();
  $('.korea').hide();
  $('.china').hide();
  $('.thailand').hide();
  $('#btn-ind').addClass("active");
  $('#btn-jpn').removeClass("active");
  $('#btn-kr').removeClass("active");
  $('#btn-ch').removeClass("active");
  $('#btn-thai').removeClass("active");
});

$(".btn-group #btn-jpn").on('click', function(){
  $('.japan').show();
  $('.Indonesia').hide();
  $('.korea').hide();
  $('.china').hide();
  $('.thailand').hide();
  $('#btn-ind').removeClass("active");
  $('#btn-jpn').addClass("active");
  $('#btn-kr').removeClass("active");
  $('#btn-ch').removeClass("active");
  $('#btn-thai').removeClass("active");
});

$(".btn-group #btn-kr").on('click', function(){
  $('.japan').hide();
  $('.Indonesia').hide();
  $('.korea').show();
  $('.china').hide();
  $('.thailand').hide();
  $('#btn-ind').removeClass("active");
  $('#btn-jpn').removeClass("active");
  $('#btn-kr').addClass("active");
  $('#btn-ch').removeClass("active");
  $('#btn-thai').removeClass("active");
});

$(".btn-group #btn-ch").on('click', function(){
  $('.japan').hide();
  $('.Indonesia').hide();
  $('.korea').hide();
  $('.china').show();
  $('.thailand').hide();
  $('#btn-ind').removeClass("active");
  $('#btn-jpn').removeClass("active");
  $('#btn-kr').removeClass("active");
  $('#btn-ch').addClass("active");
  $('#btn-thai').removeClass("active");
});

$(".btn-group #btn-thai").on('click', function(){
  $('.japan').hide();
  $('.Indonesia').hide();
  $('.korea').hide();
  $('.china').hide();
  $('.thailand').show();
  $('#btn-ind').removeClass("active");
  $('#btn-jpn').removeClass("active");
  $('#btn-kr').removeClass("active");
  $('#btn-ch').removeClass("active");
  $('#btn-thai').addClass("active");
});

