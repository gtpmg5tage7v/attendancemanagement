

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">My Scheduler</div>
                    <div class="card-body">
                        <!--ここにカレンダーを表示します。-->

                        <input type="hidden" id="user_id" name="user_id" value="<?php echo e(Auth::id()); ?>" />

                        <div id="app">
                            <home-component></home-component>
                        </div>
                        <!--ここまで-->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\test_17\laravel8_vue_calendar\resources\views/home.blade.php ENDPATH**/ ?>