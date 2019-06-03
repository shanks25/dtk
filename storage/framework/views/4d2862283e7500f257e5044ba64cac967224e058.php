 <!-- Restaurant Food List Ends -->
                            <?php if(count($Shop->categories)>0): ?>
                            <?php $__empty_1 = true; $__currentLoopData = $Shop->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Categoryy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <!-- Restaurant Food List Starts -->
                            <div class="restaurant-food-list" id="<?php echo e(str_replace(' ', '_', $Categoryy->name)); ?>">
                                <!-- Restaurant Filter Head Starts -->
                                <div class="res-filter-list-head">
                                    <h5><?php echo e($Categoryy->name); ?></h5>
                                    <p class="food-item-txt"><?php echo e(count($Categoryy->products)); ?> Items</p>
                                </div>
                                <!-- Restaurant Filter Head Ends -->
                                <div class="food-list-view">
                                    <!-- Foot List View Section Starts -->
                                    <div class="food-list-view-section">
                                        <div class="food-list-sec-head">
                                            <!-- <h5>24 Veg Main Course</h5> -->
                                        </div>
                                        <?php $__empty_2 = true; $__currentLoopData = $Categoryy->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Index => $Product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                        <!-- Food List View Box Starts -->
                                        <div class="food-list-view-box row <?php if($Product->food_type=='veg'): ?> veg <?php else: ?> nonveg <?php endif; ?>">
                                            <div class="col-sm-9">
                                                <div class="row m-0">
                                                     <?php if($Product->food_type=='veg'): ?>
                                                    <img src="<?php echo e(asset('assets/user/img/veg.jpg')); ?>" class="veg-icon">
                                                    <?php else: ?>
                                                    <img src="<?php echo e(asset('assets/user/img/non-veg.jpg')); ?>" class="veg-icon">
                                                    <?php endif; ?>
                                                    <div class="food-menu-details food-list-details">
                                                        <h6><?php echo e($Product->name); ?></h6>
                                                        <p><?php echo e(currencydecimal(@$Product->prices->price)); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="add-btn-wrap text-right">
                                                    <form  action="<?php echo e(Auth::guest()?url('mycart'):url('addcart')); ?>" method="POST">           
                                                        <?php echo e(csrf_field()); ?>

                                                        <!-- <label>Select Quantity</label> -->
                                                        <input type="hidden" value="<?php echo e($Product->shop_id); ?>" name="shop_id" >
                                                        <input type="hidden" value="<?php echo e($Product->id); ?>" name="product_id" >
                                                        <input type="hidden" value="1" name="quantity" id="quantity_<?php echo e($Product->id); ?>" class="form-control" placeholder="Enter Quantity" min="1" max="100">
                                                        <input type="hidden" value="<?php echo e($Product->name); ?>" name="name" >
                                                        <input type="hidden" value="<?php echo e(@$Product->prices->price); ?>" name="price" id="product_price_<?php echo e($Product->id); ?>" />
                                                        <?php if(Auth::user()): ?>               
                                                            <?php if(count($Product->addons)==0): ?>
                                                            <button type="submit" class=" add-btn">Add</button>
                                                            <?php else: ?>
                                                            <button type="button" class="custom-add-btn add_to_basket" data-foodtype="<?php echo e($Product->food_type); ?>" data-productid="<?php echo e($Product->id); ?>" >Add<i class="ion-android-add custom-plus"></i>
                                                            </button>
                                                            <span class="custom-txt">Customisable</span>
                                                            <?php endif; ?>
                                                        <?php else: ?>

                                                            <a href="#" class="login-item add-btn" onclick="$('#login-sidebar').asidebar('open')"><?php echo app('translator')->getFromJson('user.add_to_cart'); ?></a>
                                                           
                                                         <?php endif; ?>
                                                    </form>
                                                    <!-- <a href="javascript:void(0);" class="add-btn1">
                                                        <div class="numbers-row">
                                                            <input type="text" name="add-quantity" class="add-sec" id="add-quantity" value="1">
                                                        </div>
                                                    </a> -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Food List View Box Ends -->
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                        <?php endif; ?>
                                       
                                    </div>
                                   
                                </div>
                            </div>
                            <!-- Restaurant Food List Ends -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <?php endif; ?>
                            <?php else: ?>
                            <p>No category Found!</p>
                            <?php endif; ?>  