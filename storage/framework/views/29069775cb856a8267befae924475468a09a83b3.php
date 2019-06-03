<?php $__env->startSection('content'); ?>
    <div class="container margin_60_35">

        <br>
        <h5>Become a Courier</h5>
        <h6>Earn extra income in your spare time</h6>
        <p>Get paid weekly. Work peak days to maximize your earnings.</p>
        <br>

        <h6>Flexible schedule</h6>
        <p>Choose hours that work for you. Take time off, or work extra when it suits you.</p>
        <br>

        <h6>Know Where You're Going</h6>
        <p>See earnings, pickup and drop off locations for each order before you accept the assignment.</p>
        <br>
        <h6>Fast Support</h6>
        <p>Work with a dedicated Courier Support team, ready to chat whenever you need them.</p>

        <br>
        <br>

        <div class="row">
            <div class="profile-left-col col-md-3 ">

            </div>
            <!--End col-md -->
            <div class="profile-right-col col-md-9 white_bg">

                <div class="profile-right white_bg">
                    <h3 class="prof-tit"><?php echo app('translator')->getFromJson('home.delivery_boy.title'); ?></h3>
                    <div class="prof-content">
                        <form action="<?php echo e(url('/enquiry-delivery')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group row">
                                <label class="col-sm-2"><?php echo app('translator')->getFromJson('home.delivery_boy.name'); ?></label>
                                <div class="col-sm-5">
                                    <input type="text" name="name" class="form-control" value="">
                                    <?php if($errors->has('name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2"><?php echo app('translator')->getFromJson('home.delivery_boy.email'); ?></label>
                                <div class="col-sm-5">
                                    <input type="email" name="email" class="form-control" value="">
                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2"><?php echo app('translator')->getFromJson('home.delivery_boy.phone'); ?></label>
                                <div class="col-sm-5">
                                    <input type="text" name="phone" class="form-control" value="">
                                    <?php if($errors->has('phone')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('phone')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2"><?php echo app('translator')->getFromJson('home.delivery_boy.address'); ?></label>
                                <div class="col-sm-5">
                                    <textarea name="address" class="form-control"></textarea>
                                    <?php if($errors->has('address')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('address')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2">Profile Image:</label>
                                <div class="col-sm-5">
                                    <input type="file" accept="image/*" name="avatar" class="dropify form-control"
                                           id="avatar" aria-describedby="fileHelp">

                                    <?php if($errors->has('avatar')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('avatar')); ?></strong>
                                             </span>
                                    <?php endif; ?>

                                </div>
                            </div>

                            <h4>Upload Document to Verify:</h4>

                           <?php $__currentLoopData = \App\Document::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-group row">
                                    <?php if($document->id == 4): ?>
                                        <label class="col-sm-2">
                                            DRIVER’S LICENSE <br>
                                             <a href="#" data-toggle="tooltip" data-placement="right" title="  Clear photo/scan of valid Driver’s License (front and back)."><i style="font-size:18px" class="fa">&#xf059;</i></a> 
                                          
                                        </label>
                                    <?php elseif($document->id == 5): ?>
                                        <label class="col-sm-2">
                                            VEHICLE REGISTRATION 
                                           <a href="#" data-toggle="tooltip" data-placement="right" title="Clear photo/scan of valid Vehicle Registration."><i style="font-size:18px" class="fa">&#xf059;</i></a>   </label>
                                    <?php elseif($document->id == 6): ?>
                                        <label class="col-sm-2">
                                            PROOF OF VEHICLE INSURANCE <br>
                                             <a href="#" data-toggle="tooltip" data-placement="right" title="Clear photo/scan of valid Vehicle Insurance."><i style="font-size:18px" class="fa">&#xf059;</i></a>
                                            </label>
                                    <?php elseif($document->id == 7): ?>
                                        <label class="col-sm-2">
                                            ELIGIBILITY TO WORK IN CANADA <br>
                                             <a href="#" data-toggle="tooltip" data-placement="right" title=" Clear photo/scan of any of the following: Permanent Residence Card, Canadian Birth Certificate, Canadian
                                            Citizenship Card, Record of Landing, Valid Work Permit"><i style="font-size:18px" class="fa">&#xf059;</i></a>
                                           </label>
                                    <?php elseif($document->id == 9): ?>
                                        <label class="col-sm-2">
                                            BANKING INFORMATION <br>
                                             <a href="#" data-toggle="tooltip" data-placement="right" title="Clear photo/scan of void cheque or PAD form showing your bank account number."><i style="font-size:18px" class="fa">&#xf059;</i></a>
                                            
                                        </label>
                                    <?php else: ?>
                                        <label class="col-sm-2">Upload Documents <?php echo e($document->name); ?>:</label>
                                    <?php endif; ?>

                                    <div class="col-sm-5">
                                        <input type="file" accept="image/*" name="<?php echo e('doc_' . $document->id); ?>"
                                               class="dropify form-control"
                                               id="<?php echo e('doc_' . $document->id); ?>" aria-describedby="fileHelp">

                                        <?php if($errors->has('doc_' . $document->id)): ?>
                                            <span class="help-block">
                                            <strong><?php echo e($errors->first('doc_' . $document->id)); ?></strong>
                                             </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                             <button type="submit" class="btn btn-lg" style="background-color:#dd1c1c;color:white">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
<?php echo $__env->make('user.layouts.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>