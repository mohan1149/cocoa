<?php $__env->startSection('title', __('lang_v1.make_product_for_pos')); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1><?php echo app('translator')->getFromJson('lang_v1.make_product_for_pos'); ?></h1>
    </section>
    <section class="content">
        <?php echo Form::open([
            'url' => '/make-product-for-pos',
            'method' => 'POST',
            'id' => 'make_product_for_pos',
            'class' => 'make_product_for_pos',
            'files' => true,
        ]); ?>


        <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <?php echo Form::label('branch', __('lang_v1.branch') . ':*'); ?>

                        <?php echo Form::select('branch', $branches, null, ['class' => 'form-control branch']); ?>

                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <?php echo Form::label('name', __('product.product_name') . ':*'); ?>

                        <?php echo Form::select('products[]', [], null, ['class' => 'form-control products', 'multiple' => 'multiple']); ?>

                    </div>
                </div>
                <div class="col-12">
                    <table class="line_products table table-responsive table-stripped">

                    </table>
                </div>
                <div class="col-12">
                    <input type="submit" class="btn btn-primary" value="<?php echo e(__('lang_v1.make_available_for_pos'), false); ?>">
                </div>
            </div>
        <?php echo $__env->renderComponent(); ?>
        <?php echo Form::close(); ?>

    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            let list = [];
            $('.branch').change((e) => {
                $.ajax({
                    url: '/branch-products/' + e.target.value,
                    success: function(result) {
                        list = result;
                        $('.products').empty();
                        let options = "<option>Choose</option>";
                        for (let index = 0; index < result.length; index++) {
                            options += "<option value='" + result[index].prd.id + "'>" + result[
                                index].prd.pname + "</option>";
                        }
                        $('.products').append(options);

                    },
                });
            });
            $('.products').select2();
            $('.products').change(e => {
                let prds = $('.products').val();
                $('.line_products').empty();
                for (let index = 0; index < prds.length; index++) {
                    let formgrp = "<tr>";
                    formgrp += "<td><h5>" + e.target.selectedOptions[index].innerText + "</h5>";
                    formgrp += "<ul>";
                    let combos = list.filter((item) => item.prd.id == prds[index]);
                    
                    for (let index = 0; index < combos[0].combos.length; index++) {
                        formgrp+="<li>"+combos[0].combos[index].name+" - "+combos[0].combos[index].qty_available+"</li>";  
                    }
                    formgrp += "</ul>";
                    formgrp += "</td>"
                    formgrp += "<td><input name='product_line_item_" + prds[index] +
                        "' class='form-control' type='text' placeholder='Quantity'></td>";
                    formgrp += "</tr>";
                    $('.line_products').append(formgrp);
                }
            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mohan/projects/mohan/laravel/cocoa/resources/views/product/makeForPos.blade.php ENDPATH**/ ?>