
<?php $__env->startSection('css'); ?>
    
     
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 
     <!--section start-->
     <section class="contact-page section-b-space">
        <div class="container">
           
            <div class="row">
                <div class="col-sm-12">
                    <form class="theme-form" method="POST" action="<?php echo e(route('front.contact.save')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-row row">
                            <div class="col-md-6">
                                <label for="name">Tên đầy đủ</label>
                                <input type="text" class="form-control" id="name"  
                                    required="">
                            </div>
                            
                            <div class="col-md-6">
                                <label for="review">Số điện thoại</label>
                                <input type="text" class="form-control" id="review" placeholder=" "
                                    required="">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder=" " required="">
                            </div>
                            <div class="col-md-12">
                                <label for="review">Nội dung</label>
                                <textarea class="form-control" placeholder="Write Your Message"
                                    id="exampleFormControlTextarea1" rows="6"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-solid" type="submit">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\shop\resources\views/frontend/profile/contact.blade.php ENDPATH**/ ?>