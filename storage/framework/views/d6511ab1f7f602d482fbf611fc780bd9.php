
<?php $__env->startSection('scriptop'); ?>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
 
<script src="<?php echo e(asset('js/js/tom-select.complete.min.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(asset('/js/css/tom-select.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('backend.layouts.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class = 'content'>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Điều chỉnh bài viết
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-12 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form method="post" action="<?php echo e(route('blog.update',$blog->id)); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('patch'); ?>
                <div class="intro-y box p-5">
                    <div>
                        <label for="regular-form-1" class="form-label">Tiêu đề</label>
                        <input id="title" name="title" type="text" value="<?php echo e($blog->title); ?>" class="form-control" placeholder="title" required>
                    </div>
                    <div class="mt-3">
                        <label for="" class="form-label">Photo</label>
                        <div class="px-4 pb-4 mt-5 flex items-center  cursor-pointer relative">
                            <div data-single="true" id="mydropzone" class="dropzone  "    url="<?php echo e(route('upload.avatar')); ?>" >
                                <div class="fallback"> <input name="file" type="file" /> </div>
                                <div class="dz-message" data-dz-message>
                                    <div class=" font-medium">Kéo thả hoặc chọn ảnh.</div>
                                        
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-10 gap-5 pl-4 pr-5 py-5">
                                <?php
                                    $photos = explode( ',', $blog->photo);
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
                       
                        <textarea class="form-control"   name="summary" id="editor1"   ><?php echo $blog->summary; ?></textarea>
                    </div>
                   
                    <div class="mt-3">
                        
                        <label for="" class="form-label">Nội dung</label>
                       
                        <textarea class="editor" name="content" id="editor2"  >
                            <?php echo $blog->content; ?>
                        </textarea>
                    </div>
                    <div class="mt-3">
                        <div class="flex flex-col sm:flex-row items-center">
                            <label style="min-width:70px  " class="form-select-label" for="status">Danh mục</label><br/>
                            <select name="cat_id"  class="form-select mt-2 sm:mr-2"   >
                            <option value =""> - Chọn danh mục - </option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value ="<?php echo e($cat->id); ?>" <?php echo e($cat->id == $blog->cat_id?'selected':''); ?>> <?php echo e($cat->title); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="post-form-4" class="form-label">Tags</label>
                        <select id="select-junk" name="tag_ids[]" multiple placeholder="..." autocomplete="off">
                    
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
                            <label style="min-width:70px  " class="form-select-label" for="status">Tình trạng</label>
                           
                            <select name="status"  class="form-select mt-2 sm:mr-2"   >
                               
                                <option value ="active" <?php echo e($blog->status=='active'?'selected':''); ?>>Active</option>
                                <option value = "inactive" <?php echo e($blog->status=='inactive'?'selected':''); ?>>Inactive</option>
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
                        <button type="submit" class="btn btn-primary w-24">Cập nhật</button>
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
        maxItems: null,
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
    <?php if(count($tag_ids)== 0): ?>
        select.clear();
     <?php endif; ?>
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
 
<script src="<?php echo e(asset('js/js/ckeditor.js')); ?>"></script>
<script>
     
        // CKSource.Editor
        ClassicEditor.create( document.querySelector( '#editor2' ), 
        {
            ckfinder: {
                uploadUrl: '<?php echo e(route("upload.ckeditor")."?_token=".csrf_token()); ?>'
                }
                ,
                mediaEmbed: {previewsInData: true}

        })

        .then( editor => {
            console.log( editor );
        })
        .catch( error => {
            console.error( error );
        })

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shoplite\resources\views/backend/blog/edit.blade.php ENDPATH**/ ?>