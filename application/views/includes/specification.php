<div class="row form-group">
         
              <?php 
              $attrs ='multiple="multiple" class="form-control multi-select" tabindex="2"'; 
              $attr ='tabindex="2" class="form-control"'; 
              $spcno=count($specifications);
              if(isset($specifications) && is_array($specifications) && count($specifications)): $i=0;?>
                <?php foreach ($specifications as $key => $specification) { $k = $i;
                  $mandatorycheck = ($specification['mandatory']=="1")?' required="required"':'';
                    if(count($specification['values']) && $specification['type'] =='1') { ?>
                    <label class="col-sm-2 control-label"><?php echo $specification['name'] ?></label>
                    <div class="col-sm-4"> <?=form_dropdown("specification[$key][]", $specification['values'], (isset($psv[$key])) ? $psv[$key] : '',$attrs);?></div>                
                <?php  $i++; } elseif(count($specification['values']) && $specification['type'] =='2'){ ?>
                    <label class="col-sm-2 control-label"><?php echo $specification['name']; ?></label>
                    <div class="col-sm-4"> <?=form_dropdown("specification[$key][]", $specification['values'], (isset($psv[$key])) ? $psv[$key][0] : '',$attr);?></div>                
                <?php  $i++; } else{ ?> 
                    <label class="col-sm-2 control-label"><?php echo $specification['name']; ?></label>
                    <?php if($specification['datatype'] =='1'){ 
                      $areadivvalue = ($specification['areatype']=="1")?'2':'4';
                    ?>
                    <div class="col-sm-<?php echo $areadivvalue; ?>"> <input type="number" min="0" name="specification[<?=$key?>][]" class="form-control" onkeypress="return isNumber(event)" value="<?php echo (isset($psv[$key])) ? $psv[$key][0] : ''?>"></div> 
                    <?php if($specification['areatype'] == "1"){ ?>
                      <div class="col-sm-2"> 
                      <?php  $propertyareatype [''] = 'Select Type';
                      $options =' id="specareatype" data-placeholder="Choose a type..." class="form-control required" tabindex="2"';
                      echo form_dropdown('specareatype['.$key.'][]',$propertyareatype,(isset($psvtype[$key])) ? $psvtype[$key][0] : '',$options);?>
                      </div>
                    <?php } } else { ?>
                    <div class="col-sm-4"> <input type="text" name="specification[<?=$key?>][]" class="form-control" value="<?php echo (isset($psv[$key])) ? $psv[$key][0] : ''?>"></div>
                    <?php } ?> 

                <?php $i++; } echo ($i%2==0 && $i!= $spcno && $k!=$i)? '</div><div class="form-group">':''; }?>
              <?php endif; ?>
              </div>   
              
                </div>   


<script src="<?php echo base_url(JS); ?>/bootstrap-multiselect.js"></script>
<script type="text/javascript">
 // $(document).ready(function() {  
        $('#multi-select-demo').multiselect();
  //});
</script>