$('.btnNext1').click(function() {
  var firsttab = $("#postproperties_form").valid();
  if(firsttab === false){
    return false;
  } else {
    var loginstatus = $("#userloginstatus").val();
    if(loginstatus === "NO"){
       var siteurl = $("#siteurl_data").val();
       var url  = siteurl+'property/postpropertiesappoinment';
       $.ajax({
          type: "POST",
          url: url,
          data: $("#postproperties_form1").serialize(), // serializes the form's elements.
          success: function(data)
          { 
             $('#login-form').modal('show');  
          }
       });
       return false;
    } else {
       $('#2t').find('a').trigger('click');
       $('#1t').removeClass('active');
    }
  }

         /*var name = $("#name").val();
         if(name == null || name == ""){
           $('#vpdisplay_message_error').html("Please enter you name.");
            $('#fixed_error_red').parent().delay('200').fadeIn('slow');
            setTimeout(function(){
              $('#fixed_error_red').parent().fadeOut('slow');
            }, 5000);
           $("#name").focus();
           return false;
         }
         var email = $("#pemailid").val();
         if(email == null || email == ""){
           $('#vpdisplay_message_error').html("Please enter emailid.");
            $('#fixed_error_red').parent().delay('200').fadeIn('slow');
            setTimeout(function(){
              $('#fixed_error_red').parent().fadeOut('slow');
            }, 5000);
           $("#pemailid").focus();
           return false;
         }
         var contact = $("#contact").val();
         if(contact == null || contact == ""){
            $('#vpdisplay_message_error').html("Please enter contact number.");
            $('#fixed_error_red').parent().delay('200').fadeIn('slow');
            setTimeout(function(){
              $('#fixed_error_red').parent().fadeOut('slow');
            }, 5000);
            $("#contact").focus();
            return false;
         }
         var main_id = $("#main_id").val();
         if(main_id == null || main_id == ""){
            $('#vpdisplay_message_error').html("Please select category.");
            $('#fixed_error_red').parent().delay('200').fadeIn('slow');
            setTimeout(function(){
              $('#fixed_error_red').parent().fadeOut('slow');
            }, 5000);
            $("#main_id").focus();
            return false;
         }
         var sub_categoty = $("#sub_categoty").val();
         if(sub_categoty == null || sub_categoty == ""){
            $('#vpdisplay_message_error').html("Please select category.");
            $('#fixed_error_red').parent().delay('200').fadeIn('slow');
            setTimeout(function(){
              $('#fixed_error_red').parent().fadeOut('slow');
            }, 5000);
            $("#sub_categoty").focus();
            return false;
         }*/
   });

   $('.btnNext2').click(function() {
    var propertytype = $('input[name="propertytype"]:checked').val();
    if(propertytype >= '2'){
      $("#price").removeAttr("readonly");
    }
    var firsttab = $("#postproperties_form").valid();
    if(firsttab === false){
      return false;
    } else {
      $('#3t').find('a').trigger('click');
      $('#2t').removeClass('active');
    }
      //----------- Validation starts here --------------
               /*var projectname = $("#projectname").val();
               if(projectname == null || projectname == ""){
                  $('#vpdisplay_message_error').html("Please enter project/property name.");
                  $('#fixed_error_red').parent().delay('200').fadeIn('slow');
                  setTimeout(function(){
                    $('#fixed_error_red').parent().fadeOut('slow');
                  }, 5000);
                  $("#projectname").focus();
                  return false;
               }
               var house = $("#house").val();
               if(house == null || house == ""){
                  $('#vpdisplay_message_error').html("Please enter house number.");
                  $('#fixed_error_red').parent().delay('200').fadeIn('slow');
                  setTimeout(function(){
                    $('#fixed_error_red').parent().fadeOut('slow');
                  }, 5000);
                  $("#house").focus();
                  return false;
               }
               var street = $("#street").val();
               if(street == null || street == ""){
                  $('#vpdisplay_message_error').html("Please enter street name.");
                  $('#fixed_error_red').parent().delay('200').fadeIn('slow');
                  setTimeout(function(){
                    $('#fixed_error_red').parent().fadeOut('slow');
                  }, 5000);
                  $("#street").focus();
                  return false;
               }
               var landmark = $("#landmark").val();
               if(landmark == null || landmark == ""){
                  $('#vpdisplay_message_error').html("Please enter landmark.");
                  $('#fixed_error_red').parent().delay('200').fadeIn('slow');
                  setTimeout(function(){
                    $('#fixed_error_red').parent().fadeOut('slow');
                  }, 5000);
                  $("#landmark").focus();
                  return false;
               }
               var state_id = $("#state_id").val();
               if(state_id == null || state_id == ""){
                  $('#vpdisplay_message_error').html("Please select state name");
                  $('#fixed_error_red').parent().delay('200').fadeIn('slow');
                  setTimeout(function(){
                    $('#fixed_error_red').parent().fadeOut('slow');
                  }, 5000);
                  $("#state_id").focus();
                  return false;
               }
               var city_id = $("#city_id").val();
               if(city_id == null || city_id == ""){
                  $('#vpdisplay_message_error').html("Please select city name.");
                  $('#fixed_error_red').parent().delay('200').fadeIn('slow');
                  setTimeout(function(){
                    $('#fixed_error_red').parent().fadeOut('slow');
                  }, 5000);
                  $("#city_id").focus();
                  return false;
               }
               var locality_id = $("#locality_id").val();
               if(locality_id == null || locality_id == ""){
                  $('#vpdisplay_message_error').html("Please select locality.");
                  $('#fixed_error_red').parent().delay('200').fadeIn('slow');
                  setTimeout(function(){
                    $('#fixed_error_red').parent().fadeOut('slow');
                  }, 5000);
                  $("#locality_id").focus();
                  return false;
               }*/
               //----------- Validation ends here ------------------
     
   });
   $('.btnNext3').click(function() {
      var firsttab = $("#postproperties_form").valid();
      if(firsttab === false){
        return false;
      } else {
        $('#4t').find('a').trigger('click');
         $('#3t').removeClass('active');
      }
         /*var pricetype = $("#pricetype").val();
         if(pricetype == null || pricetype == ""){
            $('#vpdisplay_message_error').html("Please select price type.");
            $('#fixed_error_red').parent().delay('200').fadeIn('slow');
            setTimeout(function(){
              $('#fixed_error_red').parent().fadeOut('slow');
            }, 5000);
            $("#pricetype").focus();
            return false;
         }
         var priceper = $("#priceper").val();
         if(priceper == null || priceper == ""){
            $('#vpdisplay_message_error').html("Please Enter price.");
            $('#fixed_error_red').parent().delay('200').fadeIn('slow');
            setTimeout(function(){
              $('#fixed_error_red').parent().fadeOut('slow');
            }, 5000);
            $("#priceper").focus();
            return false;
         }
         var available_from = $("#available_from").val();
         if(available_from == null || available_from == ""){
            $('#vpdisplay_message_error').html("Please select date.");
            $('#fixed_error_red').parent().delay('200').fadeIn('slow');
            setTimeout(function(){
              $('#fixed_error_red').parent().fadeOut('slow');
            }, 5000);
            $("#available_from").focus();
            return false;
         }
         var negotiable = $("#negotiable").val();
         if(negotiable == null || negotiable == ""){
            $('#vpdisplay_message_error').html("Please select option.");
            $('#fixed_error_red').parent().delay('200').fadeIn('slow');
            setTimeout(function(){
              $('#fixed_error_red').parent().fadeOut('slow');
            }, 5000);
            $("#negotiable").focus();
            return false;
         }
         var price = $("#price").val();
         if(price == null || price == ""){
            $('#vpdisplay_message_error').html("Please check price is not calculated.");
            $('#fixed_error_red').parent().delay('200').fadeIn('slow');
            setTimeout(function(){
              $('#fixed_error_red').parent().fadeOut('slow');
            }, 5000);
            $("#price").focus();
            return false;
         }*/
          
         
   });
   $('.btnPrevious1').click(function() {
     $('#1t').find('a').trigger('click');
     $('#2t').removeClass('active');
   });
   $('.btnPrevious2').click(function() {
     $('#2t').find('a').trigger('click');
     $('#3t').removeClass('active');
   });
   $('.btnPrevious3').click(function() {
     $('#3t').find('a').trigger('click');
     $('#4t').removeClass('active');
   });