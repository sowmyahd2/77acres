<form  method="post" id="wis_filterform" action="#"> 
     <input type="hidden" name="listingtype" value="<?php echo isset($protype)?$protype:""; ?>">
    <input type="hidden" name="categorytype" value="<?php echo isset($categorytype)?$categorytype:""; ?>">
    <div class="row no-gutters">
       <!-- Form Group -->
       <div class="form-group">
          <div class="range-slider-one clearfix">
             <label>Price Filter</label>
             <div class="price-range-slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 10%; width: 70%;"></div>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 10%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 80%;"></span>
             </div>
             <div class="input">
        <?php
        $min_price = array(''=>'Min Price','10000' => "10000" ,"20000" => "20000","30000" => "30000","40000" => "40000","50000" => "50000");
        $options =' id="min_price" data-placeholder="Choose a Option..." class="form-control item_filter required" tabindex="2"';
        echo form_dropdown('min_price',$min_price,"",$options);
        ?>
                <input type="text" class="price-amount" name="field-name" readonly=""></div>
             <div class="title">Rs.</div>
          </div>
       </div>
       <!-- Form Group -->
       <div class="form-group">
          <input class="form-control item_filter" name="pincode" placeholder="Area Pincode">
       </div>
       <!-- Form Group -->
       <div class="form-group">
          <?php
        $bhk = array(''=>'BHK','1' => "1 BHK" ,"2" => "2 BHK","3" => "3 BHK","4" => "4 BHK");
        $options =' id="bhk" data-placeholder="Choose a Option..." class="form-control item_filter required" tabindex="2"';
        echo form_dropdown('bhk',$bhk,"",$options);
        ?>
       </div>
       <!-- Form Group -->
       <div class="form-group">
          <?php
            $photos_video = array(''=>'Photos and Videos','YES' => "With Photos and Videos" ,"NO" => "Without Photos and Videos");
            $options =' id="photos_video" data-placeholder="Choose a Option..." class="form-control item_filter required" tabindex="2"';
            echo form_dropdown('photos_video',$photos_video,"",$options);
            ?> 
       </div>
       <!-- Form Group -->
       <div class="form-group">
          <?php
            $min_area = array(''=>'Min Area','500' => "500 sqft" ,"1000" => "1000 sqft","1500" => "1500 sqft","2000" => "2000 sqft"
        ,"2500" => "2500 sqft","3000" => "3000 sqft","3500" => "3500 sqft","4000" => "4000 sqft","4500" => "4500 sqft","5000" => "5000 sqft");
            $options =' id="min_area" data-placeholder="Choose a Option..." class="form-control item_filter required" tabindex="2"';
            echo form_dropdown('min_area',$min_area,"",$options);
            ?>
       </div>
       <!-- Form Group -->
       <div class="form-group">
          <?php
            $ma_area = array(''=>'Max Area','500' => "500 sqft" ,"1000" => "1000 sqft","1500" => "1500 sqft","2000" => "2000 sqft"
        ,"2500" => "2500 sqft","3000" => "3000 sqft","3500" => "3500 sqft","4000" => "4000 sqft","4500" => "4500 sqft","5000" => "5000 sqft");
            $options =' id="ma_area" data-placeholder="Choose a Option..." class="form-control item_filter required" tabindex="2"';
            echo form_dropdown('ma_area',$ma_area,"",$options);
            ?>
       </div>
       <!-- Form Group -->
       <div class="form-group">
          <?php
        $avalibility = array(''=>'Avalibility','Immediate' => "Immediate" ,"withinmonth" => "Within a month");
        $options =' id="avalibility" data-placeholder="Choose a Option..." class="form-control item_filter required" tabindex="2"';
        echo form_dropdown('avalibility',$avalibility,"",$options);
        ?>
       </div>
       <!-- Form Group -->
       <div class="form-group">
          <?php  
                $citydtl[''] = "Select City Name";
                $options = ' id="cityname" data-placeholder="Choose a City..." class="form-control item_filter required" tabindex="2"';
                echo form_dropdown('cityname', $citydtl, '',$options);?>
       </div>
       <!-- Form Group -->
       <div class="form-group">
          <?php
                $user_type = array(''=>'All','owner' => "Owner" ,"builder" => "Builder","developer" => "developer","Rb Consultant" => "Rb Consultant");
                $options =' id="user_type" data-placeholder="Choose a Option..." class="form-control item_filter required" tabindex="2"';
                echo form_dropdown('user_type',$user_type,"",$options);
                ?>
       </div>
       <!-- Form Group -->
       <div class="form-group">
          <?php
            $furnishing = array(''=>'Furnishing','Furnished' => "Furnished" ,"Semi-Furnished" => "Semi-Furnished","Unfurnished" => "Unfurnished");
            $options =' id="furnishing" data-placeholder="Choose a Option..." class="form-control item_filter required" tabindex="2"';
            echo form_dropdown('furnishing',$furnishing,"",$options);
            ?>
       </div>
       <!-- Form Group -->
       <div class="form-group">
        <?php
        $facing = array(''=>'Facing','East' => "East" ,"West" => "West",'North' => "North" ,"South" => "South");
        $options =' id="facing" data-placeholder="Choose a Option..." class="form-group item_filter required" tabindex="2"';
        echo form_dropdown('facing',$facing,"",$options);
        ?>
        
       </div>
       <!-- Form Group -->
       <div class="form-group">
          <?php
        $rerastatus = array(''=>'Rera Registered','Yes' => "Yes" ,"No" => "No");
        $options =' id="rerastatus" data-placeholder="Choose a Option..." class="form-group item_filter required" tabindex="2"';
        echo form_dropdown('rerastatus',$rerastatus,"",$options);
        ?>
       </div>
       <!-- Form Group -->
       <div class="form-group">
        <!-- <input type="reset" class="btn btn-default reset-btn" id="reset" value="Reset"> -->  <input type="button" class="theme-btn btn-style-four nav-btn item_filter_button" id="apply" onclick="closeNav()" value="Apply Filter">
          <!-- <button type="submit" class="theme-btn btn-style-four nav-btn">Apply Filter</button> -->
          
          
          
          
          
          
          
          
       </div>
    </div>
 </form>