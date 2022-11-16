var r_height = $( ".right_col" ).outerHeight(true);

$(".left_col").css("min-height", r_height);

$(".p_add_btn, .p_update_btn").on("click", function() {
    if ($(".product_add_wrapper").hasClass("on")) { 
        $(".product_add_wrapper").removeClass("on");
    }
    else {
        $(".product_add_wrapper").addClass("on");
    }
    
});

$(".p_update_btn").click(function () {
    var p_code = $("input[type=radio][name=update_radio]").filter(":checked")[0];
    location.replace("?p_code="+p_code.value+'#update');
    
});

$(".p_delete_btn").click(function () {
    var p_code = $("input[type=radio][name=update_radio]").filter(":checked")[0];
    location.replace("delete.php?p_code="+p_code.value);
    
});



      

$(document).ready(function () {
    if (window.location.hash == '#update') {
      onReload();
    }
  });
  
  function onReload () {
    if ($(".product_add_wrapper").hasClass("on")) { 
        $(".product_add_wrapper").removeClass("on");
    }
    else {
        $(".product_add_wrapper").addClass("on");
    }
  }
 

