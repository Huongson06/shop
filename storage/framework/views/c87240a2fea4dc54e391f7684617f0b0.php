
<?php $__env->startSection('scriptop'); ?>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
 
<style>
     #thumbnail{
                                pointer-events: none;
                            }
                            #holder img{
                                border-radius: 0.375rem;
                                margin:0.2rem;
                            }
</style>

<script src="<?php echo e(asset('js/js/tom-select.complete.min.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(asset('/js/css/tom-select.min.css')); ?>">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class = 'content'>
<?php echo $__env->make('backend.layouts.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Điều chỉnh product
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-12 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form method="post" action="<?php echo e(route('product.update',$product->id)); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('patch'); ?>
                <div class="intro-y box p-5">
                    <div>
                        <label for="regular-form-1" class="form-label">Tiêu đề</label>
                        <input id="title" name="title" value="<?php echo e($product->title); ?>" type="text" class="form-control" placeholder="title">
                    </div>
                    <div class="mt-3">
                        <label for="regular-form-1" class="form-label">Photo</label>
                        <div class="   ">
                            <div class="px-4 pb-4 mt-5 flex items-center  cursor-pointer relative">
                                <div   class="dropzone grid grid-cols-10 gap-5 pl-4 pr-5 py-5  "    url="<?php echo e(route('upload.product')); ?>" >
                                    <div class="fallback"> <input name="file" type="file" /> </div>
                                    <div class="dz-message" data-dz-message>
                                        <div class=" font-medium">Kéo thả hoặc chọn nhiều ảnh.</div>
                                            
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="grid grid-cols-10 gap-5 pl-4 pr-5 py-5">
                                <?php
                                    $photos = explode( ',', $product->photo);
                                ?>
                                <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div data-photo="<?php echo e($photo); ?>" class="product_photo col-span-5 md:col-span-2 h-28 relative image-fit cursor-pointer zoom-in">
                                    <img class="rounded-md "   src="<?php echo e($photo); ?>">
                                    <div title="Xóa hình này?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="btn_remove w-4 h-4"></i> </div>  
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                               
                                <input type="hidden" id="photo_old" name="photo_old"/>
                                 
                        </div>
                        <input type="hidden" id="photo" name="photo"/>
                         
                    </div>
                     
                    <div class="mt-3">
                        
                        <label for="" class="form-label">Mô tả ngắn</label>
                       
                        <textarea class="form-control" id="editor1" name="summary" ><?php echo $product->summary; ?></textarea>
                    </div>
                   
                    <div class="mt-3">
                        
                        <label for="" class="form-label">Mô tả</label>
                       
                        <textarea class="editor" name="description" id="editor2"  >
                            <?php echo $product->description; ?>
                        </textarea>
                    </div>
                    <div class="mt-3">
                        <label for="regular-form-1" class="form-label">Giá bán</label>
                        <input id="price_out" name="price" type="number" class="form-control" value="<?php echo e($product->price); ?>">
                    </div>
                   
                    <div class="mt-3">
                        <div class="flex flex-col sm:flex-row items-center">
                            <label style="min-width:70px  " class="form-select-label" for="status">Danh mục</label><br/>
                            <select name="cat_id"  class="form-select mt-2 sm:mr-2"   >
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value ="<?php echo e($cat->id); ?>" <?php echo e($cat->id == $product->cat_id?'selected':''); ?>> <?php echo e($cat->title); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="flex flex-col sm:flex-row items-center">
                            <label style="min-width:100px  " class="form-select-label" for="status">Nhà sản xuất</label><br/>
                            <select name="brand_id"  class="form-select mt-2 sm:mr-2"   >
                                <option value =""> --chọn nhà sản xuất-- </option>
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value ="<?php echo e($brand->id); ?>" <?php echo e($brand->id == $product->brand_id?'selected':''); ?>> <?php echo e($brand->title); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="regular-form-1" class="form-label">Kích thước</label>
                        <input id="size" name="size" value="<?php echo e($product->size); ?>" type="text" class="form-control"  >
                    </div>
                    <div class="mt-3">
                        <label for="regular-form-1" class="form-label">Cân nặng</label>
                        <input id="weight" name="weight" value="<?php echo e($product->weight); ?>" type="text" class="form-control"  >
                    </div>
                    <div class="mt-3">
                        <label for="regular-form-1" class="form-label">Bảo hành</label>
                        <input id="expired" name="expired" value="<?php echo e($product->expired); ?>"
                            type="number" class="form-control" placeholder=" ">
                        <div class="form-help mt-3">
                            * Tính theo tháng
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="flex flex-col sm:flex-row items-center">
                            <label style="min-width:70px  " class="form-select-label"  for="status">Loại</label>
                           
                            <select name="type" class="form-select mt-2 sm:mr-2"   >
                                <option value ="normal" <?php echo e($product->type=='normal'?'selected':''); ?>>Normal</option>
                                <option value = "service" <?php echo e($product->type=='service'?'selected':''); ?>>Service</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="post-form-4" class="form-label">Tags</label>
                    
                        <select id="select-junk" name="tag_ids[]" multiple placeholder=" ..." autocomplete="off">
                    
                        <!-- <select name="tag_ids[]" data-placeholder="tag .."   class="tom-select w-full" id="post-form-4" multiple> -->
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tag->id); ?>" 
                                    <?php 
                                        foreach($tag_ids as $item)
                                        {
                                                if($item->tag_id == $tag->id)
                                                    echo 'selected';
                                        } 
                                    ?>
                                ><?php echo e($tag->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>     
                    <div class="mt-3">
                        <div class="flex flex-col sm:flex-row items-center">
                            <label style="min-width:70px  " class="form-select-label"  for="status">Tình trạng</label>
                           
                            <select name="status" class="form-select mt-2 sm:mr-2"   >
                                <option value ="active" <?php echo e($product->status=='active'?'selected':''); ?>>Active</option>
                                <option value = "inactive" <?php echo e($product->status =='inactive'?'selected':''); ?>>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="flex flex-col sm:flex-row items-center">
                            <label style="min-width:70px  " class="form-select-label"  for="status">Hiện trang chủ</label>
                           
                            <select name="is_sold" class="form-select mt-2 sm:mr-2"   >
                                <option value ="1" <?php echo e($product->is_sold==1?'selected':''); ?>>Có</option>
                                <option value = "0" <?php echo e($product->status ==0?'selected':''); ?>>Không</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>    <?php echo e($error); ?> </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary w-24">Lưu</button>
                    </div>
                </div>
            </form>
             
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    var select = new TomSelect('#select-junk',{
        maxItems: 100,
        allowEmptyOption: true,
        plugins: ['remove_button'],
        sortField: {
            field: "text",
            direction: "asc"
        },
        onItemAdd:function(){
                this.setTextboxValue('');
                this.refreshOptions();
            },
        create: true
        
    });
 
</script>
<script src="<?php echo e(asset('js/js/ckeditor.js')); ?>"></script>
<script>
     
        // CKSource.Editor
        ClassicEditor.create( document.querySelector( '#editor2' ), 
        {
            ckfinder: {
                uploadUrl: '<?php echo e(route("upload.ckeditor")."?_token=".csrf_token()); ?>'
                },
                mediaEmbed: {previewsInData: true}
            

        })

        .then( editor => {
            console.log( editor );
        })
        .catch( error => {
            console.error( error );
        })

</script>
 
<script>
    $(".btn_remove").click(function(){
        $(this).parent().parent().remove();   
        var link_photo = "";
        $('.product_photo').each(function() {
            if (link_photo != '')
            {
            link_photo+= ',';
            }   
            link_photo += $(this).data("photo");
        });
        $('#photo_old').val(link_photo);
    });

 
                // previewsContainer: ".dropzone-previews",
    Dropzone.instances[0].options.multiple = true;
    Dropzone.instances[0].options.autoQueue= true;
    Dropzone.instances[0].options.maxFilesize =  1; // MB
    Dropzone.instances[0].options.maxFiles =5;
    Dropzone.instances[0].options.acceptedFiles= "image/jpeg,image/png,image/gif";
    Dropzone.instances[0].options.previewTemplate =  '<div class="col-span-5 md:col-span-2 h-28 relative image-fit cursor-pointer zoom-in">'
                                               +' <img    data-dz-thumbnail >'
                                               +' <div title="Xóa hình này?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="octagon"   data-dz-remove> x </i> </div>'
                                           +' </div>';
    // Dropzone.instances[0].options.previewTemplate =  '<li><figure><img data-dz-thumbnail /><i title="Remove Image" class="icon-trash" data-dz-remove ></i></figure></li>';      
    Dropzone.instances[0].options.addRemoveLinks =  true;
    Dropzone.instances[0].options.headers= {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};
 
    Dropzone.instances[0].on("addedfile", function (file ) {
        // Example: Handle success event
        console.log('File addedfile successfully!' );
    });
    Dropzone.instances[0].on("success", function (file, response) {
        // Example: Handle success event
        // file.previewElement.innerHTML = "";
        if(response.status == "true")
        {
            var value_link = $('#photo').val();
            if(value_link != "")
            {
                value_link += ",";
            }
            value_link += response.link;
            $('#photo').val(value_link);
        }
           
        // console.log('File success successfully!' +$('#photo').val());
    });
    Dropzone.instances[0].on("removedfile", function (file ) {
            $('#photo').val('');
        console.log('File removed successfully!'  );
    });
    Dropzone.instances[0].on("error", function (file, message) {
        // Example: Handle success event
        file.previewElement.innerHTML = "";
        console.log(file);
       
        console.log('error !' +message);
    });
     console.log(Dropzone.instances[0].options   );
 
    // console.log(Dropzone.optionsForElement);



</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp1\htdocs\shoplite\resources\views/backend/products/edit.blade.php ENDPATH**/ ?>