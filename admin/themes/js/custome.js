/** @format */

$(document).ready(function () {
  $(".customer_menu").click(function () {
    $(".child_menu").slideToggle();
  });

  $(".mynavitem").click(function () {
    $("this").hide();
  });

  // START CONFIRM MESSAGE
  $(".confirm").click(function () {
    return confirm(" هل تريد حذف هذا العنصر ");
  });

  $(".btn_image").click(function () {
    $(".image_info").css("top", "0px");
  });

  $(".add_new_rental_accident").click(function () {
    $(".add_rental_accident").css("top", "100px");
    $(".overflow").css("display", "block");
  });
  $(".closebtn").click(function () {
    $(".add_rental_accident").css("top", "-900px");
    $(".overflow").css("display", "none");
  });

  $(".add_new_payment_accident").click(function () {
    $(".add_payment_accident").css("top", "100px");
    $(".overflow").css("display", "block");
  });
  $(".closebtn").click(function () {
    $(".add_payment_accident").css("top", "-900px");
    $(".overflow").css("display", "none");
  });
  ////// show payment customer
  $(".show_payment_customer").click(function () {
    $(".show_new_payment_customer").css("top", "100px");
    $(".overflow").css("display", "block");
  });
  $(".closebtn").click(function () {
    $(".show_new_payment_customer").css("top", "-900px");
    $(".overflow").css("display", "none");
  });

  ////// show infraction
  $(".show_payment_customer2").click(function () {
    $(".show_new_payment_customer2").css("top", "100px");
    $(".overflow").css("display", "block");
  });
  $(".closebtn").click(function () {
    $(".show_new_payment_customer2").css("top", "-900px");
    $(".overflow").css("display", "none");
  });

  ////// show Accident
  $(".show_payment_customer3").click(function () {
    $(".show_new_payment_customer3").css("top", "100px");
    $(".overflow").css("display", "block");
  });
  $(".closebtn").click(function () {
    $(".show_new_payment_customer3").css("top", "-900px");
    $(".overflow").css("display", "none");
  });

  $(".savebutton").click(function () {
    $(".image_info").css("top", "-600px");
  });
  $(".printbtn").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".print_content").printArea(options);
  });

  $(".printbtn2").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".print_content2").printArea(options);
  });
  $(".printbtn3").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".print_content3").printArea(options);
  });
  $(".printbtn4").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".print_content4").printArea(options);
  });
  $(".printbtn5").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".print_content5").printArea(options);
  });
  $(".printbtn6").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".print_content6").printArea(options);
  });
  $(".printbtn7").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".print_content7").printArea(options);
  });

  // PRINT IMAGE ALL IN THE SITE
  $(".cus_image1").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".image1").printArea(options);
  });

  $(".cus_image2").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".image2").printArea(options);
  });
  $(".cus_image3").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".image3").printArea(options);
  });
  // START SLAES COMPANY
  $(".sal_image").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".salimage1").printArea(options);
  });
  // START CAR
  $(".car_image1").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".car_image1_a").printArea(options);
  });
  $(".car_image2").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".car_image2_a").printArea(options);
  });
  $(".car_image3").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".car_image3_a").printArea(options);
  });
  $(".car_image4").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".car_image4_a").printArea(options);
  });
  // START EMPLOYEE
  $(".emp_image1").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".emp_image1_a").printArea(options);
  });
  $(".emp_image2").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".emp_image2_a").printArea(options);
  });
  // START ACCIDENT
  $(".acc_image11").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".acc_image1_a").printArea(options);
  });
  $(".acc_image22").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".acc_image22_a").printArea(options);
  });
  $(".acc_image33").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".acc_image3_a").printArea(options);
  });
  $(".acc_image44").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".acc_image4_a").printArea(options);
  });
  // START INSURACE COMPANY
  $(".ins_image1").click(function () {
    var mode = "iframe";
    var close = mode == "popup";
    var options = { mode: mode, popClose: close };
    $(".ins_image1_a").printArea(options);
  });
  $(".nav .nav-item").click(function () {
    $(this).addClass("active");
  });

  $("#cat_active").select2();
  $("#cat_active2").select2();
  $("#cat_active3").select2();
  $("#cat_active4").select2();
  $("#cat_active6").select2();
  $("#cat_active7").select2();
  $("#cat_active8").select2();
  $("#cat_active9").select2();
  $("#cat_active10").select2();
  $("#cat_active11").select2();
  $("#cat_active12").select2();
  $("#cat_active13").select2();
  $("#cat_active14").select2();
  // loader
  var loader = function () {
    setTimeout(function () {
      if ($("#ftco-loader").length > 0) {
        $("#ftco-loader").removeClass("show");
      }
    }, 1);
  };
  loader();

  var dev = $("#logo").dropify({});
  dev = dev.data("dropify");
  var dev2 = $("#logo2").dropify({});
  dev2 = dev2.data("dropify");
  var dev3 = $("#logo3").dropify({});
  dev3 = dev3.data("dropify");
  var dev4 = $("#logo4").dropify({});
  dev4 = dev4.data("dropify");

  var dev = $("#logo").dropify({});
  dev.on("dropify.beforeClear", function (event, element) {
    //alert($(element).attr("data-table"));
    var data_table = $("#logo").attr("data_table");
    var col_pk = $("#logo").attr("col_pk");
    var col_val = $("#logo").attr("col_val");

    var img_column = $("#logo").attr("name");
    var data_value = $("#logo").attr("data_value");

    delete_image(data_table, col_pk, col_val, img_column, data_value);
  });

  var dev2 = $("#logo2").dropify({});
  dev2.on("dropify.beforeClear", function (event, element) {
    //alert($(element).attr("data-table"));
    var data_table = $("#logo2").attr("data_table");
    var col_pk = $("#logo2").attr("col_pk");
    var col_val = $("#logo2").attr("col_val");

    var img_column = $("#logo2").attr("name");
    var data_value = $("#logo2").attr("data_value");

    delete_image(data_table, col_pk, col_val, img_column, data_value);
  });
  var dev3 = $("#logo3").dropify({});
  dev3.on("dropify.beforeClear", function (event, element) {
    //alert($(element).attr("data-table"));
    var data_table = $("#logo3").attr("data_table");
    var col_pk = $("#logo3").attr("col_pk");
    var col_val = $("#logo3").attr("col_val");

    var img_column = $("#logo3").attr("name");
    var data_value = $("#logo3").attr("data_value");

    delete_image(data_table, col_pk, col_val, img_column, data_value);
  });
  var dev4 = $("#logo4").dropify({});
  dev4.on("dropify.beforeClear", function (event, element) {
    //alert($(element).attr("data-table"));
    var data_table = $("#logo4").attr("data_table");
    var col_pk = $("#logo4").attr("col_pk");
    var col_val = $("#logo4").attr("col_val");

    var img_column = $("#logo4").attr("name");
    var data_value = $("#logo4").attr("data_value");

    delete_image(data_table, col_pk, col_val, img_column, data_value);
  });
  $("#tableone").DataTable({
    responsive: true,
    bLengthChange: false,
  });
  $("#table").DataTable();

  // START ACTIVE LINK

  if (window.location.href.indexOf("dir=articles") != -1) {
    $("#lnk-articles").addClass("active menu-is-opening menu-open");
    if (window.location.href.indexOf("add") != -1) {
      $("#lnk-add-article").addClass("active-tab");
    } else {
      $("#lnk-rep-article").addClass("active-tab");
    }
  }

  if (window.location.href.indexOf("dir=news") != -1) {
    $("#lnk-news").addClass("active menu-is-opening menu-open");
    if (window.location.href.indexOf("add") != -1) {
      $("#lnk-add-news").addClass("active-tab");
    } else {
      $("#lnk-rep-news").addClass("active-tab");
    }
  }

  if (window.location.href.indexOf("dir=revival_register") != -1) {
    $("#lnk-revival-register").addClass("active menu-is-opening menu-open");
    if (window.location.href.indexOf("add") != -1) {
      $("#lnk-add-revival-register").addClass("active-tab");
    } else {
      $("#lnk-rep-revival-register").addClass("active-tab");
    }
  }

  if (window.location.href.indexOf("dir=art_register") != -1) {
    $("#lnk-art-register").addClass("active menu-is-opening menu-open");
    if (window.location.href.indexOf("add") != -1) {
      $("#lnk-add-art-register").addClass("active-tab");
    } else {
      $("#lnk-rep-art-register").addClass("active-tab");
    }
  }

  if (window.location.href.indexOf("dir=sport_register") != -1) {
    $("#lnk-sport-register").addClass("active menu-is-opening menu-open");
    if (window.location.href.indexOf("add") != -1) {
      $("#lnk-add-sport-register").addClass("active-tab");
    } else {
      $("#lnk-rep-sport-register").addClass("active-tab");
    }
  }

  if (window.location.href.indexOf("dir=fash_register") != -1) {
    $("#lnk-fash-register").addClass("active menu-is-opening menu-open");
    if (window.location.href.indexOf("add") != -1) {
      $("#lnk-add-fash-register").addClass("active-tab");
    } else {
      $("#lnk-rep-fash-register").addClass("active-tab");
    }
  }

  if (window.location.href.indexOf("dir=rental") != -1) {
    $("#lnk-book").addClass("active menu-is-opening menu-open");
    if (window.location.href.indexOf("add") != -1) {
      $("#lnk-add-book").addClass("active-tab");
    } else {
      $("#lnk-rep-book").addClass("active-tab");
    }
  }
  if (window.location.href.indexOf("dir=banner") != -1) {
    $("#lnk-booking_website").addClass("active menu-is-opening menu-open");
    if (window.location.href.indexOf("add") != -1) {
      $("#lnk-add-booking_website").addClass("active-tab");
    } else {
      $("#lnk-rep-booking_website").addClass("active-tab");
    }
  }

  if (window.location.href.indexOf("dir=faqs") != -1) {
    $("#lnk-repair").addClass("active menu-is-opening menu-open");
    if (window.location.href.indexOf("add") != -1) {
      $("#lnk-add-repair").addClass("active-tab");
    } else {
      $("#lnk-rep-repair").addClass("active-tab");
    }
  }

  if (window.location.href.indexOf("dir=maintenance") != -1) {
    $("#lnk-maintenance").addClass("active menu-is-opening menu-open");
    if (window.location.href.indexOf("add") != -1) {
      $("#lnk-add-maintenance").addClass("active-tab");
    } else {
      $("#lnk-rep-maintenance").addClass("active-tab");
    }
  }

  if (window.location.href.indexOf("dir=insurance_company") != -1) {
    $("#lnk-insurance_company").addClass("active menu-is-opening menu-open");
    if (window.location.href.indexOf("add") != -1) {
      $("#lnk-add-insurance_company").addClass("active-tab");
    } else {
      $("#lnk-rep-insurance_company").addClass("active-tab");
    }
  }

  if (window.location.href.indexOf("dir=dashboard") != -1) {
    $("#lnk-expenses").addClass("active menu-is-opening menu-open");
    if (window.location.href.indexOf("add") != -1) {
      $("#lnk-add-expenses").addClass("active-tab");
    } else {
      $("#lnk-rep-expenses").addClass("active-tab");
    }
  }

  if (window.location.href.indexOf("dir=expenses") != -1) {
    $("#lnk-installemt").addClass("active menu-is-opening menu-open");
    if (window.location.href.indexOf("add") != -1) {
      $("#lnk-add-installemt").addClass("active-tab");
    } else {
      $("#lnk-rep-installemt").addClass("active-tab");
    }
  }

  if (window.location.href.indexOf("dir=contact") != -1) {
    $("#lnk-message").addClass("active menu-is-opening menu-open");
    if (window.location.href.indexOf("add") != -1) {
      $("#lnk-add-installemt").addClass("active-tab");
    } else {
      $("#lnk-message-watch").addClass("active-tab");
    }
  }

  $(function () {
    $(".rateyo")
      .rateYo()
      .on("rateyo.change", function (e, data) {
        var rating = data.rating;
        $(this)
          .parent()
          .find(".score")
          .text("score :" + $(this).attr("data-rateyo-score"));
        $(this)
          .parent()
          .find(".result")
          .text("rating :" + rating);
        $(this).parent().find("input[name=rating]").val(rating); //add rating value to input field
      });
  });

  // END ACTIVE LINK
});
