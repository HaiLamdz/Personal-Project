<?php require_once 'layout/header.php' ?>
    <?php require_once 'layout/nav.php' ?>
    <div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
                    <div class="row col-md-6">
                        
                        <div class=" tab-content">
                            <div ><img src="<?= BASE_URL . $sanpham['hinh_anh'] ?>" /></div>
						</div>
						<div class="d-flex flex-row mt-3">
                            <?php foreach($listAnhSanPham as $key => $anh_SP){?> 
						  <div class=" <?= $anh_SP[$key] == 0 ? 'active' : '' ?>"><img src="<?= BASE_URL . $anh_SP['link_hinh_anh'] ?>" /></div>
						 
                          <?php } ?>
						</div>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">men's shoes fashion</h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span>
						</div>
						<p class="product-description">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
						<h4 class="price">current price: <span>$180</span></h4>
						<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
						<h5 class="sizes">sizes:
							<span class="size" data-toggle="tooltip" title="small">s</span>
							<span class="size" data-toggle="tooltip" title="medium">m</span>
							<span class="size" data-toggle="tooltip" title="large">l</span>
							<span class="size" data-toggle="tooltip" title="xtra large">xl</span>
						</h5>
						<h5 class="colors">colors:
							<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
							<span class="color green"></span>
							<span class="color blue"></span>
						</h5>
						<div class="action">
							<button class="add-to-cart btn btn-default" type="button">add to cart</button>
							<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php require_once 'layout/footer.php' ?>