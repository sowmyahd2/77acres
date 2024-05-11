$("#postproperties_form").validate();
$("#postprojects_form").validate();
$(".datepicker").datepicker();

$("#forgotemail-form").validate();
$("#resetemail-form").validate();
$("#contact-form").validate();
$("#appoinmentform").validate();
$("#subscribe").validate();

$("#available_from").datepicker({
  dateFormat: "dd-M-yy",
  minDate: 0,
});

$("#userdob").datepicker({
  changeMonth: true,
  changeYear: true,
  dateFormat: "dd/mm/yy",
  yearRange: "1900:+0",
  onSelect: function (dateString, txtDate) {
    ValidateDOB(dateString);
  },
});

/*$("#userdob").datepicker({
    dateFormat: 'mm-dd-yy',
    changeMonth: true,
    changeYear: true,
    yearRange: '-115:-1',
    minDate: '-115y',
    maxDate: '-10y',
    beforeShow: function () {
        setTimeout(function () {
            $('.ui-datepicker').css('z-index', 99999999999999);
        }, 0);
    }
});*/
//--------------------

$("#userregistration_form").validate({
  rules: {
    fname: "required",
    //lname: "required",
    emailid: {
      //  required: true,
      email: true,
    },
    password: {
      // required: true,
      minlength: 8,
    },
    phonenumber: {
      required: true,
      digits: true,
      minlength: 10,
    },
    // dob: {
    //  required: true
    // },
    // gender: { required: true },
    usertype: { required: true },
    // statename: { required: true }
  },
  messages: {
    fname: "Please enter your username",
    // lname: "Please enter your lastname",
    password: {
      //  required: "Please provide a password",
      minlength: "Your password must be at least 8 characters",
    },
    //   emailid: "Please enter a valid email address",
    phonenumber: "Please enter a valid phone number",
  },
});
//--------------------------------------------------------
//the hide and show will starts here

$("#fixed_error .close").click(function () {
  $(this).closest(".flash-error").fadeOut();
});
$("#fixed_error_red .close").click(function () {
  $(this).closest(".flash-error-red").fadeOut();
});

/*var dismiss = $('.close').attr('data-dismiss');
$('.close').on('click', function(){
    $(this).closest('.'+ dismiss).fadeOut();
});*/

//----------------------
$(document).on("click", ".prowishlist", function () {
  var proid = $(this).attr("data-id");
  var userloginstatus = $("#userloginstatus").val();
  var did = $(this).data("did");
  var userid = $(this).data("userid");

  if (did == userid) {
    alert("This property is uploaded by you");
    $("#heart" + proid).addClass("la la-heart-o");
  } else {
    if (userloginstatus == "NO") {
      $("#loginModal").modal("toggle");
      $("#heart" + proid).removeClass("la la-heart");
      $("#heart" + proid).addClass("la la-heart-o");
    } else {
      var siteurl = $("#siteurl_data").val();
      var p_data = {
        productid: $(this).attr("data-id"),
      };
      $.ajax({
        url: siteurl + "property/userwishlist",
        type: "POST",
        data: p_data,
        success: function (data) {
          alert(data);
          $("#vpdisplay_message_error").html(data);
          $("#fixed_error_red").parent().delay("1200").fadeIn("slow");
          setTimeout(function () {
            $("#fixed_error_red").parent().fadeOut("slow");
            //location.reload();
          }, 5000);
        },
      });
    }
  }
  return false;
});

$(document).on("click", ".removewishlist", function () {
  var proid = $(this).attr("data-id");
  var userloginstatus = $("#userloginstatus").val();
  var wishid = $(this).data("wishid");
  var userid = $(this).data("userid");
  var siteurl = $("#siteurl_data").val();
  var p_data = {
    wishid: $(this).attr("data-wishid"),
  };
  $.ajax({
    url: siteurl + "property/deletemywishlist",
    type: "POST",
    data: p_data,
    success: function (data) {
      location.reload();
    },
  });
  return false;
});

function wishListDelete(pId) {
  // Display a confirmation dialog
  let isConfirmed = confirm("Are you sure you want to delete the data?");
  let siteurl = $("#siteurl_data").val();
  // If the user confirms
  if (isConfirmed) {
    // Make an Ajax request to delete the data
    $.ajax({
      url: siteurl + "property/deletemywishlist",
      type: "POST",
      data: { wishid: pId },
      success: function (data) {
        location.reload();
      },
    });
  }
}

//----------------------
$(document).on("click", ".generateotpbutton", function () {
  var pnum = $(this).attr("data-idvalue");
  var phonenumber = $("#" + pnum).val();
  if (phonenumber === "" && phonenumber === null) {
    $("#phoneerror").html("Enter your phone number");
    $("#fixed_error_red").parent().delay("1200").fadeIn("slow");
    setTimeout(function () {
      $("#fixed_error_red").parent().fadeOut("slow");
      //location.reload();
    }, 5000);
    return false;
  } else if (phonenumber.length < 7 || phonenumber.length > 10) {
    $("#vpdisplay_message_error").html("Your number must be between 7 and 10");
    $("#fixed_error_red").parent().delay("1200").fadeIn("slow");
    setTimeout(function () {
      $("#fixed_error_red").parent().fadeOut("slow");
      //location.reload();
    }, 5000);
    return false;
  }

  var siteurl = $("#siteurl_data").val();
  var p_data = {
    phonenumber: phonenumber,
  };
  $.ajax({
    url: siteurl + "users/setGenerateOTP/CallusDetails",
    type: "POST",
    data: p_data,
    success: function (data) {
      //$("#proenqownerdetails").html(data);
      $("#userloginphoneotp").focus();
    },
  });
});
//----------------------
$(document).on("click", ".generatedetailsotp", function () {
  var pnum = $(this).attr("data-idvalue");
  var phonenumber = $("#" + pnum).val();
  if (phonenumber === "") {
    $("#vpdisplay_message_error").html("Enter your phone number");
    $("#fixed_error_red").parent().delay("1200").fadeIn("slow");
    setTimeout(function () {
      $("#fixed_error_red").parent().fadeOut("slow");
      //location.reload();
    }, 5000);
    return false;
  } else if (phonenumber.length < 7 || phonenumber.length > 10) {
    $("#vpdisplay_message_error").html("Your number must be between 7 and 10");
    $("#fixed_error_red").parent().delay("1200").fadeIn("slow");
    setTimeout(function () {
      $("#fixed_error_red").parent().fadeOut("slow");
      //location.reload();
    }, 5000);
    return false;
  }

  var siteurl = $("#siteurl_data").val();
  var p_data = {
    phonenumber: phonenumber,
  };
  $.ajax({
    url: siteurl + "users/setGenerateOTP/PropertyEnquiry",
    type: "POST",
    data: p_data,
    success: function (data) {
      //$("#proenqownerdetails").html(data);
    },
  });
});
//--------------------------
$(document).on("click",'#newuser', function(){
  
  $("#signupModal").modal("toggle");
  $("#newloginmodal").hide();
});
$(document).on("click", ".propertyenqbutton", function () {
  var proid = $(this).attr("data-id");
  var userloginstatus = $("#userloginstatus").val();
  if (userloginstatus == "YES") {
    var siteurl = $("#siteurl_data").val();
    var p_data = {
      productid: $(this).attr("data-id"),
    };
    $.ajax({
      url: siteurl + "property/propertyowner",
      type: "POST",
      data: p_data,
      success: function (data) {
        $("#proenqownerdetails").html(data);
      },
    });
    $("#ownerdetails").modal("toggle");
    //$('body').removeClass('modal-open');
    // $('.modal-backdrop').remove();
  } else {
    $("#appoinmentpropertyid").val(proid);
    $("#propertyAppoinmentModel").modal("toggle");
  }
  //$('.modal-backdrop').remove();
});
//--------------------------

$(document).on("click", "#proenquerysubmit", function () {
  var validator = $("#appoinmentform").valid();
  if (validator === false) {
    return false;
  }

  var siteurl = $("#siteurl_data").val();
  var url = siteurl + "property/appoinment";
  $.ajax({
    type: "POST",
    url: url,
    data: $("#appoinmentform").serialize(), // serializes the form's elements.
    success: function (data) {
      if (data == "error") {
        $("#vpdisplay_message_error").html(
          "Something went wrong!. Please try again"
        );
        $("#fixed_error_red").parent().delay("1200").fadeIn("slow");
        setTimeout(function () {
          $("#fixed_error_red").parent().fadeOut("slow");
          //location.reload();
        }, 5000);
      } else {
        $("#propertyAppoinmentModel").modal("hide");
        //--------- Owner details starts here ----
        var p_data = {
          productid: data,
        };
        $.ajax({
          url: siteurl + "property/propertyowner",
          type: "POST",
          data: p_data,
          success: function (data) {
            $("#proenqownerdetails").html(data);
          },
        });
        $("#ownerdetails").modal("toggle");
        //--------- Owner details ends here ----
      }
    },
  });
  return false;
});
//---------------------------
$(document).on("keyup", "#price", function () {
  var propertytype = $('input[name="propertytype"]:checked').val();

  var pp = $("#price").val();

  var ba = $("#plotarea").val();
  if (pp == "" || pp == "0") {
    $("#pricecalerror").html("Please enter price per area");
    $("#price").focus();
    return false;
  }
  if (ba == "" || ba == "0") {
    $("#pricecalerror").html("Please enter Total area");
    $("#plotarea").focus();
    return false;
  }
  $("#pricecalerror").html("");
  var priceper = parseInt(pp);
  var plotarea = parseInt(ba);
  var totalprice = priceper / plotarea;
  $("#priceper").val(parseInt(totalprice));
  $("#pricepervalue").val(parseInt(totalprice));
});
$(document).on("keyup", "#pincode", function () {
  if ((value = $(this).val().length == 6)) {
    var siteurl = $("#siteurl_data").val();

    var siteurl = $("#siteurl_data").val();
    var value = $(this).val();
    $.ajax({
      type: "POST",
      dataType: "json",
      url: siteurl + "property/getcitystate/" + value,
      success: function (data) {
        $("#statename1").val(data.state);
        $("#cityname1").val(data.city);
        $("#localityname1").html(data.area);

        //---------------------
      },
    });
    return false;
  }
});
//---------------------------
$(document).on("change", "#builduparea", function () {
  var propertytype = $('input[name="propertytype"]:checked').val();

  if (propertytype < "2") {
    var pp = $("#price").val();
    var ba = $("#builduparea").val();
    if (pp == "" || pp == "0") {
      $("#pricecalerror").html("Please enter price per area");
      $("#price").focus();
      return false;
    }
    if (ba == "" || ba == "0") {
      $("#pricecalerror").html("Please enter build up area");
      $("#builduparea").focus();
      return false;
    }
    $("#pricecalerror").html("");
    var priceper = parseInt(pp);
    var builduparea = parseInt(ba);
    var totalprice = builduparea / priceper;
    $("#priceper").val(parseInt(totalprice));
  } else {
    $("#priceper").removeAttr("readonly");
  }
});
//-----------------------------
//..................
$(document).on("change", "#plotarea", function () {
  var propertytype = $('input[name="propertytype"]:checked').val();

  if (propertytype < "2") {
    var pp = $("#price").val();
    var ba = $("#plotarea").val();
    if (pp == "" || pp == "0") {
      $("#pricecalerror").html("Please enter price per area");
      $("#price").focus();
      return false;
    }
    if (ba == "" || ba == "0") {
      $("#pricecalerror").html("Please enter Total area");
      $("#plotarea").focus();
      return false;
    }
    $("#pricecalerror").html("");
    var priceper = parseInt(pp);
    var plotarea = parseInt(ba);
    var totalprice = priceper / plotarea;
    $("#priceper").val(parseInt(totalprice));
    $("#pricepervalue").val(parseInt(totalprice));
  } else {
    $("#priceper").removeAttr("readonly");
  }
});
$(document).on("blur", "#registernumber", function () {
  var siteurl = $("#siteurl_data").val();
  var url = siteurl + "users/numberduplicatecheck";

  $.ajax({
    type: "POST",
    url: url,
    data: $("#registernumber").serialize(), // serializes the form's elements.
    success: function (data) {
      if (data == "1") {
        $("#vpdisplay_message_error3").html(
          "This number already registered with us"
        );

        //$('#emailid_error').html('This email id already registered with us');
        // $('#registernumber').val('');
        return false;
      } else {
        $("#vpdisplay_message_error3").html("");
      }
    },
  });
  return false;
});

$(document).on("change", "#useremailid", function () {
  var siteurl = $("#siteurl_data").val();
  var url = siteurl + "users/emailduplicatecheck";
  $.ajax({
    type: "POST",
    url: url,
    data: $("#useremailid").serialize(), // serializes the form's elements.
    success: function (data) {
      if (data == "1") {
        $("#vpdisplay_message_error").html(
          "This email id already registered with us"
        );
        $("#fixed_error_red").parent().delay("1200").fadeIn("slow");
        setTimeout(function () {
          $("#fixed_error_red").parent().fadeOut("slow");
          //location.reload();
        }, 5000);
        //$('#emailid_error').html('This email id already registered with us');
        $("#useremailid").val("");
        return false;
      }
    },
  });
  return false;
});
//-------------------------------
$(document).on("click", ".majorcity-session", function () {
  var siteurl = $("#siteurl_data").val();
  var city = $(this).attr("data-id");
  var p_data = {
    cityname: $(this).attr("data-id"),
  };
  $.ajax({
    url: siteurl + "users/citysession",
    type: "POST",
    data: p_data,
    success: function (data) {
      $("#majorlocblock").html(city);
      if (data == "error") {
        location.reload();
      } else {
        $("#cityModal").modal("toggle");
      }
    },
  });
});
//---------------------------------------------------

$(document).on("click", "#userloginsubmit", function () {
  var email = $("#userloginemail").val();
  if (email == null || email == "") {
    $("#emailerror").html("Please enter emailid");
    $("#userloginemail").focus();
    return false;
  }
  if (!validateEmail(email)) {
    $("#emailerror").html("Please enter a valid emailid");
    $("#userloginemail").focus();
    return false;
  }
  $("#emailerror").html("");
  var password = $("#userreg_password").val();
  if (password == null || password == "") {
    $("#passworderror").html("Please enter your password");
    $("#password").focus();
    return false;
  }
  $("#passworderror").html("");
  var siteurl = $("#siteurl_data").val();
  var url = siteurl + "users/userlogin";
  $.ajax({
    type: "POST",
    url: url,
    data: $("#rbgroup_loginform").serialize(), // serializes the form's elements.
    success: function (data) {
      if (data != 1) {
        $("#passworderror").html(data);
      } else {
        $("#vpdisplay_message_error").html(data);
        $("#fixed_error_red").parent().delay("1200").fadeIn("slow");
        setTimeout(function () {
          $("#fixed_error_red").parent().fadeOut("slow");
          location.reload();
        }, 5000);
      }
    },
  });

  return false;
});
//---------------------------------------------------

$(document).on("click", "#userphoneloginsubmit", function () {
  var phone = $("#userloginphonenumber").val();
  if (phone == null || phone == "") {
    $("#phoneerror").html("Please enter phone number");
    $("#userloginphonenumber").focus();
    return false;
  }
  $("#phoneerror").html("");
  var phoneotp = $("#userloginphoneotp").val();
  if (phoneotp == null || phoneotp == "") {
    $("#otperror").html("Please enter otp");
    $("#phoneotp").focus();
    return false;
  }
  $("#otperror").html("");
  var siteurl = $("#siteurl_data").val();

  var url = siteurl + "users/userloginphone";
  $.ajax({
    type: "POST",
    url: url,
    data: $("#rbgroup_phoneloginform").serialize(), // serializes the form's elements.
    success: function (data) {
      if (data == false) {
        $("#otperror").html("invalid Otp");
      } else {
        location.reload();
      }
    },
  });

  return false;
});
//-----------------------------------------------
$(document).on("click", ".mainprocontactus", function () {
  var propertyid = $(this).attr("data-id");

  $("#appoinmentpropertyid").val(propertyid);
  $("#contactmodal").modal("show");
});
//-----------------------------------------------
$(document).on("click", ".maindealercontactus", function () {
  var dealerid = $(this).attr("data-id");

  $("#appoinmentdealerid").val(dealerid);
  $("#dealercontactmodal").modal("show");
});
//---------------------------------
$(document).on("change", "#main_id", function () {
  var siteurl = $("#siteurl_data").val();
  var value = $(this).val();
  $.ajax({
    type: "POST",
    url: siteurl + "property/subcategory/" + value,
    success: function (data) {
      if (data) $("#sub_categoty").html(data);
      //--------------------
      $.ajax({
        type: "POST",
        url: siteurl + "property/prospecification/" + value,
        success: function (specdata) {
          if (data) $("#product_specification").html(specdata);
        },
      });
      //---------------------
    },
  });
  return false;
});
$(document).on("change", "#sub_categoty", function () {
  var siteurl = $("#siteurl_data").val();
  var value = $(this).val();
  var mainid = $("#main_id").val();

  //--------------------
  $.ajax({
    type: "POST",
    url: siteurl + "property/prosubspecification/" + value + "/" + mainid,
    success: function (specdata) {
      if (specdata) $("#product_specification").html(specdata);
    },
  });
  //---------------------

  return false;
});
//---------------------------------
$(document).on("change", "#state_id", function () {
  var siteurl = $("#siteurl_data").val();
  var value = $(this).val();
  $("#statevalue").val(value);

  $.ajax({
    type: "POST",
    url: siteurl + "property/cityselect/" + value,
    success: function (data) {
      if (data) $("#city_id").html(data);
    },
  });
  return false;
});
$(document).on("change", "#state_idxs", function () {
  var siteurl = $("#siteurl_data").val();
  var value = $(this).val();
  $("#statevalue").val(value);
  $.ajax({
    type: "POST",
    url: siteurl + "property/cityselectxs/" + value,
    success: function (data) {
      if (data) $("#city_idxs").html(data);
    },
  });
  return false;
});
$(document).on("change", "#city_idxs", function () {
  var siteurl = $("#siteurl_data").val();

  var value = $(this).val();
  $("#cityvalue").val(value);
  $.ajax({
    type: "POST",
    url: siteurl + "property/areaselectxs/" + value,
    success: function (data) {
      if (data) $("#locality_idxs").html(data);
    },
  });
  return false;
});
//---------------------------------
$(document).on("change", "#city_id", function () {
  var siteurl = $("#siteurl_data").val();
  var value = $(this).val();
  $("#cityvalue").val(value);
  $.ajax({
    type: "POST",
    url: siteurl + "property/areaselect/" + value,
    success: function (data) {
      if (data) $("#locality_id").html(data);
    },
  });
  return false;
});

//---------------------------------
/*$(document).on('change','#sub_categoty',function(){
    var val = $(this).val(); 
    if(val == 5){
        $("#basic_status").hide();
        $("#basic_propertyage").hide();
    } else {
        $("#basic_status").show();
        $("#basic_propertyage").show();
    }
});*/
//---------------------------------
$(document).on("click", "#rerastatus", function () {
  var val = $(this).val();
  if (val == "yes") {
    $("#basic_reraid").show();
    $("#basic_reraurl").show();
  } else {
    $("#basic_reraid").hide();
    $("#basic_reraurl").hide();
  }
});
//------------------
$(".property_typecheck").change(function () {
  var siteurl = $("#siteurl_data").val();

  if ($(this).is(":checked")) {
    var val = $(this).val();
    if (val == "1") {
      $("#basic_resale").show();
      $("#rera_status").show();
    } else {
      $("#basic_resale").hide();
      $("#rera_status").hide();
    }
    $("#main_id").select("destroy");
    var p_data = {
      val: val,
    };
    $.ajax({
      url: siteurl + "users/getgroupcategory",
      type: "POST",
      data: p_data,
      success: function (message) {
        $("#main_id").html(message);
      },
    });

    return false;
  }
});
/*document.getElementById('rents').onclick = function() {
  $('.basic_resale').fadeOut();
     $('.category').fadeOut();
      $('.base_price').fadeOut();
    }
    //select sale -sale type is enabled
  document.getElementById('sells').onclick = function() { 
    $('.basic_resale').show();
       $('.category').show(); 
    }*/
//----------------------------------
$(".item_filter").change(function () {
  var siteurl = $("#siteurl_data").val();
  var url = siteurl + "property/filtersearch";
  $.ajax({
    type: "POST",
    url: url,
    data: $("#wis_filterform").serialize(), // serializes the form's elements.
    success: function (data) {
      $("#filtercontent").html(data);
    },
  });
});
//------------- item_filter_button
$(document).on("click", ".item_filter_button", function () {
  var siteurl = $("#siteurl_data").val();
  var url = siteurl + "property/filtersearch";
  $.ajax({
    type: "POST",
    url: url,
    data: $("#wis_filterform").serialize(), // serializes the form's elements.
    success: function (data) {
      $("#filtercontent").html(data);
    },
  });
});

//----------------
function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test($email);
}

function validatePhone(txtPhone) {
  var a = txtPhone;
  var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
  if (filter.test(a)) {
    return true;
  } else {
    return false;
  }
}

function isNumber(evt) {
  evt = evt ? evt : window.event;
  var charCode = evt.which ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
  return true;
}

function alphaOnly(event) {
  if (event.charCode != 0) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var key = String.fromCharCode(
      !event.charCode ? event.which : event.charCode
    );
    if (!regex.test(key)) {
      event.preventDefault();
      return false;
    }
  }
}

function passwordvalidate(evt) {
  evt = evt ? evt : window.event;
  if (evt.match(/[A-z]/)) {
    return false;
  } else if (evt.match(/[A-Z]/)) {
    return false;
  } else if (evt.match(/\d/)) {
    return false;
  }
  return true;
}

function validatePassword() {
  var p = document.getElementById("userpassword").value,
    errors = [];
  if (p.length < 8) {
    errors.push("Your password must be at least 8 characters");
  }
  if (p.search(/[a-z]/i) < 0) {
    errors.push("Your password must contain at least one letter.");
  }
  if (p.search(/[0-9]/) < 0) {
    errors.push("Your password must contain at least one digit.");
  }
  if (errors.length > 0) {
    $("#userpassword").val("");
    $("#vpdisplay_message_error").html(errors.join("\n"));
    $("#fixed_error_red").parent().delay("1200").fadeIn("slow");
    setTimeout(function () {
      $("#fixed_error_red").parent().fadeOut("slow");
      //location.reload();
    }, 5000);

    return false;
  }
  return true;
}

function validateResetPassword() {
  var p = document.getElementById("password").value,
    errors = [];
  if (p.length < 8) {
    errors.push("Your password must be at least 8 characters");
  }
  if (p.search(/[a-z]/i) < 0) {
    errors.push("Your password must contain at least one letter.");
  }
  if (p.search(/[0-9]/) < 0) {
    errors.push("Your password must contain at least one digit.");
  }
  if (errors.length > 0) {
    $("#password").val("");
    $("#vpdisplay_message_error").html(errors.join("\n"));
    $("#fixed_error_red").parent().delay("1200").fadeIn("slow");
    setTimeout(function () {
      $("#fixed_error_red").parent().fadeOut("slow");
      //location.reload();
    }, 5000);

    return false;
  }
  return true;
}

function ValidateDOB(dateString) {
  var lblError = $("#DOBlblError");
  var parts = dateString.split("/");
  var dtDOB = new Date(parts[1] + "/" + parts[0] + "/" + parts[2]);
  var dtCurrent = new Date();
  lblError.html("Eligibility 18 years ONLY.");
  if (dtCurrent.getFullYear() - dtDOB.getFullYear() < 18) {
    $("#userdob").val("");
    $("#vpdisplay_message_error").html("Please enter the valid date");
    $("#fixed_error_red").parent().delay("1200").fadeIn("slow");
    setTimeout(function () {
      $("#fixed_error_red").parent().fadeOut("slow");
      //location.reload();
    }, 5000);
    return false;
  }

  if (dtCurrent.getFullYear() - dtDOB.getFullYear() == 18) {
    //CD: 11/06/2018 and DB: 15/07/2000. Will turned 18 on 15/07/2018.
    if (dtCurrent.getMonth() < dtDOB.getMonth()) {
      return false;
    }
    if (dtCurrent.getMonth() == dtDOB.getMonth()) {
      //CD: 11/06/2018 and DB: 15/06/2000. Will turned 18 on 15/06/2018.
      if (dtCurrent.getDate() < dtDOB.getDate()) {
        return false;
      }
    }
  }
  lblError.html("");
  return true;
}

function validatePasswordTest() {
  var newPassword = document.getElementById("userpassword").value;
  var minNumberofChars = 6;
  var maxNumberofChars = 16;
  var regularExpression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;

  if (
    newPassword.length < minNumberofChars ||
    newPassword.length > maxNumberofChars
  ) {
    return false;
  }
  if (!regularExpression.test(newPassword)) {
    $("#vpdisplay_message_error").html(
      "password should contain atleast one number and one special character"
    );
    $("#fixed_error_red").parent().delay("1200").fadeIn("slow");
    setTimeout(function () {
      $("#fixed_error_red").parent().fadeOut("slow");
      //location.reload();
    }, 5000);
    return false;
  }
}

function test_str() {
  var res;
  var str = document.getElementById("userpassword").value;
  if (
    str.match(/[a-z]/g) &&
    str.match(/[A-Z]/g) &&
    str.match(/[0-9]/g) &&
    str.match(/[^a-zA-Z\d]/g) &&
    str.length >= 8
  )
    res = "TRUE";
  else res = "FALSE";
  //document.getElementById("t2").value = res;
}

function validateImage() {
  var imagesizedisplay = $("#maxsizedisplay").val();
  var imagesize = $("#maxsizefileupload").val();
  var formData = new FormData();

  var file = document.getElementById("user_image").files[0];

  formData.append("Filedata", file);
  var t = file.type.split("/").pop().toLowerCase();
  if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
    $("#vpdisplay_message_error").html("Please select a valid image file");
    $("#fixed_error_red").parent().delay("1200").fadeIn("slow");
    setTimeout(function () {
      $("#fixed_error_red").parent().fadeOut("slow");
      //location.reload();
    }, 5000);
    document.getElementById("user_image").value = "";
    return false;
  }
  if (file.size > 1024000 * parseInt(imagesize)) {
    $("#vpdisplay_message_error").html(
      "Max Upload size is " + imagesizedisplay + " only"
    );
    $("#fixed_error_red").parent().delay("1200").fadeIn("slow");
    setTimeout(function () {
      $("#fixed_error_red").parent().fadeOut("slow");
      //location.reload();
    }, 5000);
    document.getElementById("user_image").value = "";
    return false;
  }
  return true;
}

function validateProImage(name) {
  var imagesizedisplay = $("#maxsizedisplay").val();
  var imagesize = $("#maxsizefileupload").val();
  var formData = new FormData();

  var file = document.getElementById(name).files[0];

  formData.append("Filedata", file);
  var t = file.type.split("/").pop().toLowerCase();
  if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
    $("#vpdisplay_message_error").html("Please select a valid image file");
    $("#fixed_error_red").parent().delay("1200").fadeIn("slow");
    setTimeout(function () {
      $("#fixed_error_red").parent().fadeOut("slow");
      //location.reload();
    }, 5000);
    document.getElementById(name).value = "";
    return false;
  }
  if (file.size > 1024000 * parseInt(imagesize)) {
    $("#vpdisplay_message_error").html(
      "Max Upload size is " + imagesizedisplay + " only"
    );
    $("#fixed_error_red").parent().delay("1200").fadeIn("slow");
    setTimeout(function () {
      $("#fixed_error_red").parent().fadeOut("slow");
      //location.reload();
    }, 5000);
    document.getElementById(name).value = "";
    return false;
  }
  return true;
}

//---------------validateBrochure
function validateBrochure(name) {
  var formData = new FormData();

  var file = document.getElementById(name).files[0];

  formData.append("Filedata", file);
  var t = file.type.split("/").pop().toLowerCase();
  if (t != "pdf") {
    $("#vpdisplay_message_error").html("Please select a valid Brochure file");
    $("#fixed_error_red").parent().delay("1200").fadeIn("slow");
    setTimeout(function () {
      $("#fixed_error_red").parent().fadeOut("slow");
      //location.reload();
    }, 5000);
    document.getElementById(name).value = "";
    return false;
  }
  if (file.size > 2048000) {
    $("#vpdisplay_message_error").html("Max Upload size is 2MB only");
    $("#fixed_error_red").parent().delay("1200").fadeIn("slow");
    setTimeout(function () {
      $("#fixed_error_red").parent().fadeOut("slow");
      //location.reload();
    }, 5000);

    document.getElementById(name).value = "";
    return false;
  }
  return true;
}
