$(function() {
  var result = true;

  $("#errorName").hide();
  $("#errorEmail").hide();
  $("#errorAssnto").hide();
  $("#errorMsg").hide();
  $("#success").hide();
  
  $("#contactForm").submit(function( event ) {
    $("#errorName").hide();
    $("#errorEmail").hide();
    $("#errorAssnto").hide();
    $("#errorMsg").hide();

    if ($("input#name").val() == "") {
      $("#errorName").show();
      result = false;
      // event.preventDefault();
    }
    if ($("input#email").val() == "") {
      $("#errorEmail").show();
      result = false;
      // event.preventDefault();
    }
    if ($("input#assunto").val() == "") {
      $("#errorAssnto").show();
      result = false;
      // event.preventDefault();
    }
    if ($("#message").val() == "") {
      $("#errorMsg").show();
      result = false;
      // event.preventDefault();
    }

    if (result == true) {
      $("#contactForm").submit();
      event.preventDefault();
    } else {
      event.preventDefault();
    }
  });
});