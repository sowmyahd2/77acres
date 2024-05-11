<div class="price-range-slider">
  
  <p class="range-value">
    <input type="text" id="amount" readonly>
  </p>
  <div id="slider-range" class="range-bar"></div>
  
</div>
<style>
    body {
  background:#ecf9fa;
}

.price-range-slider {
	width:100%;
  float:left;
  padding:10px 20px;
	.range-value {
		margin:0;
		input {
			width:100%;
			background:none;
			color: #000;
			font-size: 16px;
			font-weight: initial;
			box-shadow: none;
			border: none;
			margin: 20px 0 20px 0;
		}
	}
	
	.range-bar {
		border: none;
		background: #000;
		height: 3px;	
		width: 96%;
		margin-left: 8px;
		
		.ui-slider-range {
			background:#06b9c0;
		}
		
		.ui-slider-handle {
			border:none;
			border-radius:25px;
			background:#fff;
			border:2px solid #06b9c0;
			height:17px;
			width:17px;
			top: -0.52em;
			cursor:pointer;
		}
		.ui-slider-handle + span {
			background:#06b9c0;
		}
	}
}
/*--- /.price-range-slider ---  category_specification_values product_specification*/
    </style>
    <script>
        $(function() {
	$( "#slider-range" ).slider({
	  range: true,
	  min: 130,
	  max: 500,
	  values: [ 130, 250 ],
	  slide: function( event, ui ) {
		$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
	  }
	});
	$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
	  " - $" + $( "#slider-range" ).slider( "values", 1 ) );
});
        </script>