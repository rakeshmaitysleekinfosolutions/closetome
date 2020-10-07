    <!-- /Home Banner -->
    <section class="bgimage">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 17% 5% 13% 5%;">
                        <!-- Search -->
                        <div class="search-box">
                            <div class="col-md-12">
                                <form class="row justify-content-center" action="" method="post">
                                    <div class="form-group search-location col-md-12">
                                        <div class="row justify-content-center">
                                            <input type="text" name="searchquery" class="form-control col-md-4 border-dark" placeholder=" Restaurant, Mobiles, Cars, Smart TV ...">
                                        </div>
                                    </div>
									<?php if(!empty($searchErr)){  ?>
										<div class="form-group search-location col-md-12">
											<div class="row justify-content-center">
												<span class="text-danger" style="background-color:white;"><?php echo "*".$searchErr;?></span>
											</div>
										</div>
									<?php } ?>
                                    <br/>
                                    <div class="form-group search-info col-md-12">
                                        <div class="row justify-content-center">
                                            <input type="text" name="address" class="form-control col-md-4 border-dark" placeholder="Insert your address">
                                        </div>
                                    </div>
									<?php if(!empty($addressErr)){  ?>
										<div class="form-group search-location col-md-12">
											<div class="row justify-content-center">
												<span class="text-danger" style="background-color:white;"><?php echo "*".$addressErr;?></span>
											</div>
										</div>
									<?php } ?>
                                    <button type="submit" class="btn takfua-back text-white col-md-4" style="margin-right: .9%;" name="searchbtn"> <i class="fas fa-search"></i> Search</button>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>