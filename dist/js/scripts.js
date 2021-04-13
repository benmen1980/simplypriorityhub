
jQuery(document).ready(function($) {
    console.log('elicheva');
    $(".item-wrapper").click(function() {
      var elem = $(this).find("#toggle_content").text();
      if (elem == "Read More") {
        $(".item-wrapper #toggle_content").text("Read More");
        $(".item-wrapper #logs_content").slideUp();
        //Stuff to do when btn is in the read more state
        $(this).find("#toggle_content").text("Read Less");
        $(this).find("#logs_content").slideDown();
      } else {
        //Stuff to do when btn is in the read less state
        $(this).find("#toggle_content").text("Read More");
        $(this).find("#logs_content").slideUp();
      }
    });
  });