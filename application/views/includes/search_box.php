 <div class="tab active-tab" id="buy">
               <div class="property-search-form">
                  <form method="post" action="<?php echo base_url('property/mainsearch'); ?>">
                     <div class="row apply-side float-right">
                        <span class="advance-btn" onclick="openNav()">+ Apply Filter</span>
                     </div>
                     <div class="row filter-side">
                        <!-- Form Group -->
                        <div class="property_search_form m-b30 p-4 m-t30 bg_white wid100">
                  <form action="<?php echo base_url('property/searchproperty'); ?>" method="post" class="property_filter_input">
                  <div class="row">
                  <div class="col-lg-2 col-sm-6 p-tb8">
                  <?php  
                    $ptype = isset($ptype)?$ptype:"";
                    
                    $options = ' id="ptypes" data-placeholder="Choose a Property Type..." class="form-control" ';
                    echo form_dropdown('propertytype', $propertytype, $ptype,$options);?>
                  </div>
                  <div class="col-lg-2 col-sm-6 p-tb8">
                  <span id="pro_none" class="">
                  <select id="option-droup-demo" id="category" name="category[]" multiple="multiple">
                    <?php
                    foreach ($productmenu as $smkey => $smvalue) {
                    $mainmenu = explode("@", $smkey);
                    $subcatcount = count($smvalue);
                    ?>
                    <optgroup label="<?php echo $mainmenu[1]; ?>">
                    <?php
                    if(is_array($smvalue) && count($smvalue)){
                      foreach ($smvalue as $key1 => $value1) {
                        $sm_subpart = explode("@", $key1);
                        ?>
                        <option value="<?php echo $sm_subpart[1]; ?>"><?php echo $sm_subpart[1]; ?></option>
                       
                        <?php
                      }
                    }
                    ?></optgroup>
                    <?php } ?>
                    </select>
                  </span>
                  </div>
                  <div class="col-lg-2 col-sm-6 p-tb8">
                  <?php  
                    $ownershiptype[''] = "Posted By";
                    $options = ' id="ownershiptype" data-placeholder="Choose a Property Type..." class="form-control" tabindex="2"';
                    echo form_dropdown('ownershiptype', $ownershiptype, '',$options);?>
                  </div>
                  <div class="col-lg-4 col-sm-8 p-tb8">
                  <input class="form-control" id="cityname" name="cityname" value="<?php echo isset($cityname)?$cityname:""; ?>" type="text" placeholder="Enter address e.g. street, city and state or zip">
                  </div>
                  <div class="col-lg-2 col-sm-4 se_topsa">
                     <input type="submit" name="search" value="Search" class="theme-btn btn-style-four w-100 text-center">
                  </div>
                  </div>
                  </form>
                  </div>
                  </div>
                  </form>
               </div>
            </div>
            <script>function openNav() {
			document.getElementById("mySidenav").style.width = "300px";
		}

		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
		}
            </script>