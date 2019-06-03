<?php $__env->startSection('content'); ?>
  <!-- Content Wrapper Starts -->
        <div class="content-wrapper">
            <div class="container">
                <div class="tracking p-30">
                    <!-- Tracking Top Starts -->
                    <div class="tracking-top">
                        <div class="" id="my_map" style="width: 100%; height: 400px;"></div>
                         <form  action="<?php echo e(url('restaurants')); ?>" id="my_map_form_current" >
                                <input type="hidden" id="pac-input_cur" class="form-control search-loc-form" placeholder="Search for area,street name..." name="search_loc" value="<?php echo e(old('latitude')); ?>" >
                                <input type="hidden" id="latitude" name="latitude" value="<?php echo e($Order->shop->latitude); ?>" readonly >
                                <input type="hidden" id="longitude" name="longitude" value="<?php echo e($Order->shop->longitude); ?>" readonly >
                                
                            </form>
                        <!-- Tracking Details Starts -->
                        <div class="tracking-details">
                            <!-- Tracking Box Starts -->
                            <div class="tracking-box">
                                <p class="track-txt">Order #<?php echo e($Order->id); ?></p>
                                <h6 class="track-tit"><?php echo e($Order->shop->name); ?></h6>
                                <p class="track-txt"><?php echo e(date('h:i A')); ?> | <?php echo e(count($Order->items)); ?> Items | <?php echo e(currencydecimal($Order->invoice->payable)); ?></p>
                            </div>
                            <!-- Tracking Box Ends -->
                            <!-- Tracking Box Starts -->
                             <div class="tracking-box ORDERED <?php if($Order->status == 'ORDERED'): ?> active <?php endif; ?> ">
                                <h6 class="track-tit m-0 " >Order Created</h6>
                            </div>
                            <div class="tracking-box RECEIVED <?php if($Order->status == 'RECEIVED'): ?> active <?php endif; ?> ">
                                <h6 class="track-tit m-0 " >Order Received</h6>
                            </div>
                            <!-- Tracking Box Ends -->
                            <!-- Tracking Box Starts -->
                            <div class="tracking-box PROCESSING <?php if($Order->status == 'PROCESSING'): ?> active <?php endif; ?> ">
                                <h6 class="track-tit  ">Order Confirmed</h6>
                               
                            </div>
                            <!-- Tracking Box Ends -->
                            <!-- Tracking Box Starts -->
                            <div class="tracking-box COMPLETED <?php if($Order->status == 'COMPLETED'): ?> active <?php endif; ?> ">
                                <h6 class="track-tit ">Order Delivered</h6>
                            </div>
                            <!-- Tracking Box Ends -->
                        </div>
                        <!-- Tracking Details Ends -->
                    </div>
                    <!-- Tracking Top Ends -->
                    <!-- Tracking Bottom Starts -->
                    <div class="tracking-btm">
                        <h5>Order Details</h5>
                        <div class="row">
                            <!-- Tracking Left Starts -->
                            <div class="tracking-btm-left col-md-6">
                                <!-- Invoice Location Starts -->
                                <div class="tracking-location">
                                    <!-- Tracking Box Starts -->
                                    <div class="tracking-sec-box row m-0">
                                        <div class="tracking-sec-box-left icon-left pull-left">
                                            <i class="ion-ios-location-outline"></i>
                                        </div>
                                        <div class="tracking-sec-box-right icon-right">
                                            <span>From</span>
                                            <h6 class="icon-tit"><?php echo e($Order->shop->name); ?></h6>
                                            <p class="icon-txt"><?php echo e($Order->shop->maps_address); ?></p>
                                        </div>
                                    </div>
                                    <!-- Tracking Box Ends -->
                                    <!-- Tracking Box Starts -->
                                    <div class="tracking-sec-box row m-0">
                                        <div class="tracking-sec-box-left icon-left pull-left">
                                            <i class="ion-ios-location-outline"></i>
                                        </div>
                                        <div class="tracking-sec-box-right icon-right">
                                            <span>Deliverd To</span>
                                            <h6 class="icon-tit"><?php echo e($Order->address->type); ?></h6>
                                            <p class="icon-txt"><?php echo e($Order->address->building); ?> <?php echo e($Order->address->landmark); ?><?php echo e($Order->address->map_address); ?></p>
                                        </div>
                                    </div>
                                    <!-- Tracking Box Ends -->
                                </div>
                                <!-- Tracking Location Ends -->
                            </div>
                            <!-- Tracking Left Ends -->
                            <!-- Tracking Right Starts -->
                            <div class="tracking-btm-right col-md-6">
                                <!-- Invoice Order Items Starts -->
                                <div class="tracking-order-items">
                                    <h6 class="invoice-table-tit"><?php echo e(count($Order->items)); ?> Items</h6>
                                    <table class="table table-responsive track-table">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $Order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <th scope="row">
                                                    <div class="row m-0">
                                                        <?php if($item->product->food_type=='veg'): ?>
                                                        <img src="<?php echo e(asset('assets/user/img/veg.jpg')); ?>" class="veg-icon">
                                                        <?php else: ?>
                                                        <img src="<?php echo e(asset('assets/user/img/non-veg.jpg')); ?>" class="veg-icon">
                                                        <?php endif; ?>
                                                        <div class="food-menu-details">
                                                            <h5><?php echo e($item->quantity); ?>X<?php echo e($item->product->name); ?></h5>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td class="text-right">
                                                    <p><?php echo e(currencydecimal($item->quantity*$item->product->prices->price)); ?></p>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <?php endif; ?>
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Item Total</td>
                                                <td class="text-right"><?php echo e(currencydecimal($Order->invoice->gross)); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tax(<?php echo e(Setting::get('tax')); ?>%)</td>
                                                <td class="text-right"><?php echo e(currencydecimal($Order->invoice->tax)); ?></td>
                                            </tr>
                                             <tr>
                                                <td>Discount</td>
                                                <td class="text-right"><?php echo e(currencydecimal($Order->invoice->discount)); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Delivery Charges</td>
                                                <td class="text-right"><?php echo e(currencydecimal($Order->invoice->delivery_charge)); ?></td>
                                            </tr>
                                            <tr class="final-pay">
                                                <th>To Pay</th>
                                                <th class="text-right"><?php echo e(currencydecimal($Order->invoice->total_pay)); ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Invoice Order Items Ends -->
                            </div>
                            <!-- Tracking Right Ends -->
                        </div>
                    </div>
                    <!-- Tracking Bottom Ends -->
                </div>
            </div>
        </div>
        <!-- Content Wrapper Ends -->
        <div id="container"></div>
         <input type="button" id="routebtn" value="route" style="display:none"  />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<style type="text/css">
    .active{
        background-color: Pink;: 
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<?php if($Order->status == 'CANCELLED' || $Order->status == 'COMPLETED'): ?>
        <script type="text/javascript">
            window.onload = function() {
                setTimeout(function() {
                    $('#routebtn').trigger('click');
                }, 3000);
                
             };
        </script>
    <?php else: ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.13.3/react.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.13.3/JSXTransformer.js"></script>

    <script type="text/jsx">
    var order = '';  var curstatus = '';
        var MainComponent = React.createClass({
            getInitialState: function () {
                    return {data: [], currency : "<?php echo e(Setting::get('currency')); ?>"};
                },
            componentDidMount: function(){
                $.ajax({
                  url: "<?php echo e(url('track/order/'.Request::segment(2))); ?>",
                  type: "GET"})
                  .done(function(response){

                        this.setState({
                            data:response.data
                        });

                    }.bind(this));

                    setInterval(this.checkRequest, 5000);
            },
            checkRequest : function(){
                $.ajax({
                  url: "<?php echo e(url('track/order/'.Request::segment(2))); ?>",
                  type: "GET"})
                  .done(function(response){
                  
                        this.setState({
                            data:response
                        });

                    }.bind(this));
            },
            render: function(){
                return (
                    <div>
                        <SwitchState checkState={this.state.data} currency={this.state.currency} />
                    </div>
                );
            }
        });

        

        var SwitchState = React.createClass({

            componentDidMount: function() {
                this.changeLabel;
            },

            changeLabel : function(){
                if(this.props.checkState == undefined){
                   // window.location.reload();
                }else if(this.props.checkState != ""){ 
                    order = this.props.checkState;
                    if(curstatus != this.props.checkState.status){
                     $('#routebtn').trigger('click');
                     curstatus = this.props.checkState.status;
                    }
                    $('.tracking-box').removeClass('active');
                    $("."+this.props.checkState.status).addClass("active");
                    if(this.props.checkState.status=='COMPLETED'){
                        $('#rating_review').show();
                    }else{
                        $('#rating_review').hide();
                    }
                    setTimeout(function(){
                        //$('.rating').rating();
                    },400);

                }else{
                    $("#ride_status").text('Text will appear here');
                }
            },
            render: function(){

               

                    this.changeLabel();
                   
                    return ( 
                        <p></p>
                     );
                
            }
        });
        React.render(<MainComponent/>,document.getElementById("container"));

    <?php endif; ?>
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>