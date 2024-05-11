<style>
.category{
    height:14px !important;
    top:15px;
    margin-left:30px !important;
}
.sidenav a {
  text-decoration: none;
  font-size: 17px;
  color: #818181;
  display: block;
  transition: 0.3s;
}
.theme-btn1{
    background: #007bff !important;
}
.panels {
  display: inline !important;
}

.panel-body {
    display: flex;
    flex-direction: column;
  }
#searchproduct {
  position: absolute;
  top: calc(100% + 255px); /* Adjust the value as needed */
  left: -10px;
  z-index: 999; /* Ensure it's above other elements */
  background-color: #fff; /* Add a background color */
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  display: none; /* Initially hide it */
}
#search-form li:hover{
  display: flex;
  -webkit-box-pack: justify;
  justify-content: space-between;
  padding: 14px 20px;
  cursor: pointer;
  border-bottom: 0px;
  font-size: 14px;
  font-weight: 400;
  line-height: 14.22px;
  color: rgb(0, 0, 0);
  background-color: rgba(94, 35, 220, 0.08);
}
.panel-body div {
  margin-bottom: 10px;
  display:flex;
}
.panel-body div label {
  margin-left: 10px;
  
}
#search-form li  {
  display: flex;
  justify-content: space-between;
  padding: 14px 20px;
  cursor: pointer;
  border-bottom: 0px;
  font-size: 14px;
  font-weight: 400;
  line-height: 14.22px;
  color: rgb(0, 0, 0);
}

  .panel-body label {
  display: inline-block;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 90%;
  vertical-align: middle;
  margin-left: 5px;
  margin-right: 5px;
}
.searchbox{
  background-color: rgb(255, 255, 255);
  padding: 0px;
  box-shadow: rgba(0, 0, 0, 0.25) 0px 0px 4px;
  border-radius: 4px;
  margin-top: 10px;
}

.panel-body input[type="checkbox"] {
  vertical-align: middle;
}

.panel-heading .panel-title a {
  color: #000000 !important;
  font-weight: bold !important;
  font-size: 16px !important;
}
.range-slider-one label{
    color: #007bff !important;
}

/* Style for checkbox container */
.checkbox-container {
display: flex; /* Use flexbox for horizontal layout */
flex-wrap: wrap; /* Allow items to wrap to the next line */
}

/* Style for each checkbox item */
.checkbox-item {
margin-right: 10px; /* Add some spacing between items */
}

/* Style for checkbox */
#search-form .category-label {
display: inline-block;
padding: 8px 15px;
background-color: #00C0FF;
border: 1px solid #ccc;
border-radius: 15px;
cursor: pointer;
color:#ffffff;
}

.category-label:hover {
background-color: #e0e0e0;
}

.category-label input[type="checkbox"] {
display: none;
}

.category-label input[type="checkbox"]:checked  {
background-color: #000;
color: #000;
}  
.checked-parent {
    background-color: #007bff !important;
    color: #fff;
    box-shadow:4px 4px grey;
}
</style>

 <form  id="search-form" method="post" class="property_filter_input" action="<?php echo base_url('property/mainxssearch1'); ?>">  
  <input type="hidden" name="listingtype" value="<?php echo isset($protype)?$protype:""; ?>">
  <input type="hidden" name="categorytype" value="<?php echo isset($categorytype)?$categorytype:""; ?>">
  <div class="row no-gutters">
       <!-- Form Group -->
    <div class="form-group">
      <label><strong style="color:black">Select Type</strong></label>
      <div class="row">
        <span style="border:1px solid #00c0ff;border-radius:18px;background-color:#00c0ff ; margin-right:5px; padding: 10px 20px" name="ptype" class="ptype">Buy</span>
        <span style="border:1px solid #00c0ff;border-radius:18px;background-color:#00c0ff ;  margin-right:5px; padding: 10px 20px" name="ptype" class="ptype">Rent</span>
        <span style="border:1px solid #00c0ff;border-radius:18px; background-color:#00c0ff ; margin-right:5px; padding: 10px 20px"  name="ptype" class="ptype">Lease</span>
        <input type="hidden" id="propertytype" name ="propertytype" value=""/>
      </div>
      </div>
      <div class="form-group searchbox">
        <ul id="searchproduct">
      </ul>
    </div>
  <div id="cat">
  <?php
  foreach ($productmenu as $smkey => $smvalue) {
  $mainmenu = explode("@", $smkey);
  $subcatcount = count($smvalue);
  ?>
  <div class="panel-group" id="accordion">
  <div class=" panel-default">
    <div class="panel-heading">
      <label class="panel-title">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?= $mainmenu[1]; ?>">
      <span class="glyphicon glyphicon-minus"></span>
      + <?= $mainmenu[1]; ?>
      </a>
      </label>
    </div>
    <div id="<?= $mainmenu[1]; ?>" class="panel-collapse collapse in">
      <div class="panel-body" >
        <div class="checkbox-container">
            <?php   if(is_array($smvalue) && count($smvalue)){
              foreach ($smvalue as $key1 => $value1) {
                $sm_subpart = explode("@", $key1);
                ?>
                <div class="checkbox-item">
                  <label for="genMale_<?php echo $mainmenu[1].$sm_subpart[1]; ?>" class="category-label">
                    <input id="genMale_<?php echo $mainmenu[1].$sm_subpart[1]; ?>" name="category[]" class="category" type="checkbox" value="<?php echo $sm_subpart[1]; ?>">
                    <span class="category-button"><?php echo $sm_subpart[1]; ?></span>
                  </label>
                </div>
              <?php } } ?>  
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?> 
 </div>   
 

  <div  class="form-group">
  <div class="panel-group" id="accordion1">
  <div class=" panel-default">
    <div class="panel-heading">
      <label class="panel-title">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#direction">
      <span class="glyphicon glyphicon-minus"></span>
      + Facing
      </a>
      </label>
    </div>
    <div id="direction" class="panel-collapse collapse in">
      <div class="panel-body" >
      <div class="checkbox-container">
          

          <div class="checkbox-item" style="margin-right:0px">
            <label for="North" class="category-label" style="padding:10px">
              <input id="North" name="facetype[]" class="category" type="checkbox" value="North">
              <span class="category-button">North</span>
            </label>
          </div>
          <div class="checkbox-item" style="margin-right:0px">
            <label for="South" class="category-label" style="padding:10px">
              <input id="South" name="facetype[]" class="category" type="checkbox" value="South">
              <span class="category-button">South</span>
            </label>
          </div>
          <div class="checkbox-item" style="margin-right:0px">
            <label for="East" class="category-label" style="padding:10px">
              <input id="East" name="facetype[]" class="category" type="checkbox" value="East">
              <span class="category-button">East</span>
            </label>
          </div>
          <div class="checkbox-item" style="margin-right:0px">
            <label for="West" class="category-label" style="padding:10px">
              <input id="West" name="facetype[]" class="category" type="checkbox" value="West">
              <span class="category-button">West</span>
            </label>
          </div>
       
      </div>
    </div>
  </div>  
              </div>     
              <!-- type -->
              
      </div>
      
  <div class="panel-group" id="accordion2">
  <div class=" panel-default">
    <div class="panel-heading">
      <label class="panel-title">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#bhktype">
      <span class="glyphicon glyphicon-minus"></span>
      + BedRoom
      </a>
      </label>
    </div>
    <div id="bhktype" class="panel-collapse collapse in">
      <div class="panel-body" >
      <div class="checkbox-container">
          

                <div class="checkbox-item" style="margin-right:0px">
                  <label for="1BHK" class="category-label" style="padding:10px">
                    <input id="1BHK" name="bhk[]" class="category" type="checkbox" value="1">
                    <span class="category-button">1BHK</span>
                  </label>
                </div>
                <div class="checkbox-item" style="margin-right:0px">
                  <label for="2BHK" class="category-label" style="padding:10px">
                    <input id="2BHK" name="bhk[]" class="category" type="checkbox" value="2">
                    <span class="category-button">2BHK</span>
                  </label>
                </div>
                <div class="checkbox-item" >
                  <label for="3BHK" class="category-label" style="padding:10px">
                    <input id="3BHK" name="bhk[]" class="category" type="checkbox" value="3">
                    <span class="category-button">3BHK</span>
                  </label>
                </div>
          
                
    </div>
  </div>  
              </div>    
<!-- Location search -->
<!-- price range-->

       <!-- Form Group -->
       <div class="form-group">
       <div class="row" style="display: flex; align-items: center;">
    <label style="margin-right: 10px;">Budget</label>
    
    <?php
    $min_price = array('0' => 'Min Price', '100000' => '100000', '200000' => '200000', '300000' => '300000', '400000' => '400000', '500000' => '500000','600000' => '600000','700000' => '700000','800000' => '800000','900000' => '900000','1000000' => '1000000');
    $options = 'id="min_price" data-placeholder="Choose a Option..." class="form-group item_filter required" tabindex="2"';
    echo form_dropdown('min_price', $min_price, '', $options);
    ?>
    
    <?php
    $max_price = array('200000000' => 'Max Price', '10000' => '10000', '20000' => '20000', '30000' => '30000', '40000' => '40000', '50000' => '50000','600000'=>'6000000','700000' => '700000','800000' => '800000','900000' => '900000','1000000' => '1000000');
    $options = 'id="max_price" data-placeholder="Choose a Option..." class="form-group item_filter required" tabindex="2"';
    echo form_dropdown('max_price', $max_price, '', $options);
    ?>
</div></div>
  <div class="form-group">
    <div class="row input-group">
      <input type="text" id="cityname" name="cityname" class="form-control" placeholder="Search by city locality pincode...">
      <img src="<?php echo base_url(IMAGES); ?>/nearme.png" id="mapsearch1"  class="mapsearch1" style="    /* margin-left: -50px !important; */
    z-index: 14;
    height: 25px;
    width: 25px;
    /* margin-top: 10px; */
    float: right;
    position: relative;
    right: 14px;
    bottom: 37px;" />
    </div>
   
  </div>
  
  <!-- END -->   
  <div class="form-group"> 
    <input type="submit" class="theme-btn1 row  form-control" id="apply" onclick="closeNav()" value="Apply Filter">
    <input type="hidden" name="siteurl_data" id="siteurl_data" value="<?php echo base_url(); ?>">  
  </div>
</div>
</form>
 
 <script>
 $(".distance").click(function() {
     if($(this).text()=="1 KM"){
         $("#range").val(1);
         $('.distance').css("background-color", "");
         $('.distance').css("color", "black");
         $(this).css("background-color", "lightblue");
         $(this).css("color", "#ffffff");
     }
     else if($(this).text()=="3 KM"){
          $("#range").val(3);
          $('.distance').css("background-color", "");
          $('.distance').css("color", "black");
          $(this).css("background-color", "lightblue");
          $(this).css("color", "#ffffff");  
     }
         else if($(this).text()=="5 KM"){
          $("#range").val(5);
          $('.distance').css("background-color", "");
          $('.distance').css("color", "black");
          $(this).css("background-color", "lightblue");
          $(this).css("color", "#ffffff");  
     }
     else{
          $("#range").val(10);
          $('.distance').css("background-color", "");
          $('.distance').css("color", "black");
          $(this).css("background-color", "lightblue");
          $(this).css("color", "#ffffff");
     }
  
});


$(".ptype").click(function() {
     if($(this).text()=="Buy"){
         ptype=1;
         $('.ptype').css("background-color", "#00c0ff");
         $('.ptype').css("color", "#ffffff");
         $(this).css("background-color", "#007bff");
         $(this).css("box-shadow", "4px 4px grey");
         $(this).css("color", "#ffffff");
     }
     else if($(this).text()=="Rent"){
         ptype=2;
          $('.ptype').css("background-color", "#00c0ff");
          $('.ptype').css("color", "#ffffff");
          $(this).css("background-color", "#007bff");
          $(this).css("box-shadow", "4px 4px grey");
          $(this).css("color", "#ffffff");  
     }
     else{
         $('.ptype').css("background-color", "#00c0ff");
         $('.ptype').css("color", "#ffffff");
         ptype=3;
          $(this).css("background-color", "#007bff");
          $(this).css("box-shadow", "4px 4px grey");
          $(this).css("color", "#ffffff");
     }

  var siteurl = $("#siteurl_data").val();
  $("#propertytype").val(ptype);
  var p_data =
  {
    number: $("#propertytype").val()
  };
    
   $.ajax({
    url:siteurl+"users/getpropertypes",
    type: "POST",
    data: p_data,
    success: function(message)
    { 
    $("#cat").html(message);
    }
    });
    return false;
  });
  

</script> 
   
<script>
$(document).on('click', '#mapsearch1', function() {
$("#searchproduct").css('display','none');
    
  if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            // Location access is granted, handle the location data
            showLocation1(position);
        }, function(error) {
            // Handle permission denial or errors here
            if (error.code === error.PERMISSION_DENIED) {
                // Location access is blocked or denied, display a message with a button to request permission
                alert('Location access for this website is blocked or denied.');
                // Show the button
                var requestPermissionButton = document.createElement('button');
                requestPermissionButton.textContent = 'Request Permission';
                requestPermissionButton.addEventListener('click', function() {
                    // Request permission again
                    navigator.geolocation.getCurrentPosition(function(position) {
                        // Location access is granted, handle the location data
                        showLocation1(position);
                    }, function(error) {
                        // Handle permission denial or errors after the second request
                        alert('Error getting location: ' + error.message);
                    });
                });
               // document.body.appendChild(requestPermissionButton);
            } else {
                // Handle other errors
                alert('Error getting location: ' + error.message);
            }
        });
    } else {
       
       // $('#location').html('Geolocation is not supported by this browser.');
    }
});


$(document).on('change',"#location_search",function(){
  let val=$("#location_search option:selected").text();
  if(val=="Pincode"){
    $(".pincode_search_type").css("display","block");
    $(".locfilter").css("display","none");
  }
  else if(val=="Location"){
    $(".locfilter").css("display","block");
    $(".pincode_search_type").css("display","none");
  }
  else{         
    $(".locfilter").css("display","none");
    $(".pincode_search_type").css("display","none");
  }
})


function showLocation1(position){     
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    var siteurl = $("#siteurl_data").val();
    var p_data =
        {
            latitude,
            longitude,
        };
        
       $.ajax({
            url:siteurl+"welcome/getlocation",
            type: "POST",
            data: p_data,
            success: function(data)
            { 
             $("#cityname").val(data);
             $("#lattitude").val(latitude);
             $("#longitude").val(longitude);
            }
        }); 
}

$(document).on('change', '#cityname1', function() {
    var city=$(this).val();
    var apiKey = "AIzaSyCPz503b8Th2oQGXGsqAVA21jrESJf4c4Q";
    var geocodingUrl = `https://maps.googleapis.com/maps/api/geocode/json?address=${city}&key=${apiKey}`;

  $.ajax({
    url: geocodingUrl,
    method: "GET",
    success: function(response) {
      if (response.status === "OK") {
        var location = response.results[0].geometry.location;
        var latitude = location.lat;
        var longitude = location.lng;
        $("#cityname").val(city);
        $("#lattitude").val(latitude);
        $("#longitude").val(longitude);
      } else {
      console.log("Geocoding failed. Status: " + response.status);
      }
    },
    error: function(xhr, status, error) {
      console.log("AJAX Request Failed. Error: " + error);
    }
  });
});


$(document).on('keyup', '#cityname', function() {
  let city=$(this).val();
  var siteurl = $("#siteurl_data").val();
  if(city.length>=3){
  var p_data =
  {
  search:city
  };
  $.ajax({
    url:siteurl+"property/getsearchdata",
    type: "POST",
    data: p_data,
    success: function(message)
    { 
      $("#searchproduct").css("display","block");
      $("#searchproduct").html(message);
    }
  }); 
} 
});


$(document).on("click","#searchproduct li", function(){
  let type=$(this).children('span').text();
  let val=$(this).children('div').text();
  var siteurl = $("#siteurl_data").val();

  var form = document.createElement("form");
  form.method = "POST";
  form.action = siteurl+"property/mainxssearch1"
   if (type === "city") {
       // Replace with your desired URL

        // Create an input field to hold the cityname value
        var input = document.createElement("input");
        input.type = "hidden";
        input.name = "cityname";
        input.value = val;

        // Add the input field to the form
        form.appendChild(input);

        // Append the form to the document body
        document.body.appendChild(form);

        // Submit the form to redirect
       
   }
  if (type === "locality") {
    // Replace with your desired URL
    let newval=val.split(',');
    // Create an input field to hold the cityname value
    var input = document.createElement("input");
    input.type = "hidden";
    input.name = "locationsearch";
    input.value = "citylocation";
    var input1 = document.createElement("input");
    input1.type = "hidden";
    input1.name = "search_type";
    input1.value = newval[0];
    // Add the input field to the form
    form.appendChild(input);
    form.appendChild(input1);
    // Append the form to the document body
    document.body.appendChild(form);

    // Submit the form to redirect

  }
    form.submit();
})

    // Checkbox change event using event delegation
    $(document).on('change', '#search-form .category-label input[type="checkbox"]', function() {
        // Check if the checkbox is checked
        if ($(this).is(':checked')) {
            // Add 'checked-parent' class to parent div
            $(this).closest('.category-label').addClass('checked-parent');
        } else {
            // Remove 'checked-parent' class from parent div
            $(this).closest('.category-label').removeClass('checked-parent');
        }
    });

 

</script>
