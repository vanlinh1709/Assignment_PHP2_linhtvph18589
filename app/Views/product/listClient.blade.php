@extends('layout.mainClient')
@section('content')
<div class="layout_padding gallery_section">
    	<div class="container">
    		<div class="row">
          <?php foreach($products as $p):?>
    			<div class="col-sm-4">
    				<div class="best_shoes">
    					<p class="best_text">{{$p->name}}</p>
    					<div class="shoes_icon"><a href="detailProduct?id={{ $p->id }}"><img src="{{ BASE_URL . $p->main_image}}" width = "300px" height = "300px"</a>></div>
    					<div class="star_text">
    						<div class="left_part">
    							<ul>
    	    						<li><a href="#"><img src="images/star-icon.png"></a></li>
    	    						<li><a href="#"><img src="images/star-icon.png"></a></li>
    	    						<li><a href="#"><img src="images/star-icon.png"></a></li>
    	    						<li><a href="#"><img src="images/star-icon.png"></a></li>
    	    						<li><a href="#"><img src="images/star-icon.png"></a></li>
    	    					</ul>
    						</div>
    						<div class="right_part">
    							<div class="shoes_price">$ <span style="color: #ff4e5b;">{{$p->price}}</span></div>
    						</div>
    					</div>
    				</div>
    			</div>		
          <!-- End col -->
          <?php endforeach?>
    		</div>
        <!-- End row -->

    		
    	</div>
    </div>
@endsection