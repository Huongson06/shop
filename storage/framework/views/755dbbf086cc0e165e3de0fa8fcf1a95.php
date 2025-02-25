
<?php $__env->startSection('css'); ?>
    
     
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<section class="section-b-space blog-page ratio2_3">
        <div class="container">
            <!-- starrt categories -->
        <div class="row">
            <?php if(count ($blogcategories) > 0): ?>
                <div class="container" style=" margin-bottom:30px">
                    <div class="row margin-default ratio_square  ">
                        <?php $__currentLoopData = $blogcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-2 col-sm-3 col-4">
                                <a href="<?php echo e(route('front.category.view',$subcat->slug)); ?>">
                                    <div class="img-category">
                                        <div style="max-height:120px" class="img-sec">
                                            <img   src="<?php echo e($subcat->photo?$subcat->photo:asset('frontend/assets/images/fashion/category/1.jpg')); ?>" class="img-fluid bg-img" alt="">
                                        </div>
                                        <h4><?php echo e($subcat->title); ?></h4>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
            </div>
            <!-- end categories -->
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row blog-media">
                            <div class="col-xl-6">
                                <div class="blog-left">
                                    <a href="<?php echo e(route('front.page.view',$blog->slug)); ?>"><img src="<?php echo e($blog->photo?$blog->photo: asset('frontend/assets/images/blog/1.jpg')); ?>"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="blog-right">
                                    <div>
                                        <h6><?php echo e($blog->created_at); ?></h6> <a href="<?php echo e(route('front.page.view',$blog->slug)); ?>">
                                            <h4><?php echo e($blog->title); ?></h4>
                                        </a>
                                        <ul class="post-social">
                                            <?php
                                                $author = \App\Models\User::find($blog->user_id);
                                             ?>   
                                            <li>Viết bởi : <?php echo e($author?$author->full_name:''); ?></li>
                                            <li><i class="fa fa-view"></i> <?php echo e($blog->hit); ?> lần xem</li>
                                             
                                        </ul>
                                        
                                            <?php echo $blog->summary?>
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- BEGIN: Pagination -->
                        
                    <div class="product-pagination">
                        <div class="theme-paggination-block">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-12">
                                <nav  aria-label="Page navigation">
                                    <?php echo e($blogs->links('vendor.pagination.simple-new')); ?>

                                </nav>
                                    
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12">
                                    <div class="product-search-count-bottom">
                                        <h5>Bài viết từ <?php echo e(($blogs->currentPage()-1)*$blogs->perPage() + 1); ?>-<?php echo e(($blogs->currentPage())*$blogs->perPage()); ?> trong tổng số <?php echo e($blogs->total()); ?> </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left bar -->
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <div class="blog-sidebar">
                        <!-- first blog -->
                        <div class="theme-card" style="padding-left:10px !important">
                            <h4>Bài viết mới</h4>
                            <ul class="recent-blog">
                                <?php $__currentLoopData = $newblogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newblog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(route('front.page.view',$newblog->slug)); ?>">
                                        <div class="media"> <img class="img-fluid blur-up lazyload"
                                                src="<?php echo e($newblog->photo?$newblog->photo: asset('frontend/assets/images/blog/2.jpg')); ?>" alt="Generic placeholder image">
                                            <div class="media-body align-self-center">
                                                <h6><?php echo e($newblog->title); ?></h6>
                                                <p><?php echo e($newblog->hit); ?> <i class="fa fa-eye"></i></p>
                                            </div>
                                        </div>
                                    </a>
                                </li> 
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                               
                            </ul>
                        </div>
                         <!-- second blog -->
                        <div class="theme-card" style="padding-left:10px !important">
                            <h4>Bài viết nổi bật</h4>
                            <ul class="popular-blog">
                                <?php $__currentLoopData = $popblogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popblog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('front.page.view',$popblog->slug)); ?>">
                                    <li>
                                        <div class="media">
                                            <div class="blog-date"><span><?php echo e(substr($popblog->created_at, 0,4)); ?></span>
                                                <span>Tháng <?php echo e(substr($popblog->created_at, 5,2)); ?></span>
                                        </div>
                                            <div class="media-body align-self-center">
                                                <h6><?php echo e($popblog->title); ?></h6>
                                                <p><?php echo e($popblog->hit); ?> <i class="fa fa-eye"></i></p>
                                            </div>
                                        </div>
                                        
                                    </li>
                                </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\shop\resources\views/frontend/blog/categories.blade.php ENDPATH**/ ?>