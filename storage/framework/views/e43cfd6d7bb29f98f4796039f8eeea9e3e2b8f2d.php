

<?php $__env->startSection('content'); ?>
    

        <div class="container">
            <h3 class="py-5">氏名　<?php echo e($time->user_name); ?></h3>
        <form method="POST" action="<?php echo e(route('report.update',['id' =>$time->id])); ?>">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="exampleInputEmail1">出勤時間:<?php echo e($time->punchIn); ?></label>
            <input type="text" class="form-control col-4" name=punchIn value="<?php echo e($time->punchIn); ?>">
            
            
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">退勤時間:<?php echo e($time->punchOut); ?></label>
            <input type="text" class="form-control col-4" name=punchOut value="<?php echo e($time->punchOut); ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">労働時間<?php echo e($time->workTime); ?>時間</label>
            <input type="text" class="form-control col-4" name=workTime value="<?php echo e($time->workTime); ?>">
            
            
          </div>

        

           
 
        
        <input type="submit" value="更新する">
    </form>
    


<a href="<?php echo e(route('searchproduct',['id'=>$time->id])); ?>"><?php echo e(__('詳細に戻る')); ?></a>
</div>

<?php $__env->stopSection(); ?>







  

  

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\test_17\laravel8_vue_calendar\resources\views/report/edit.blade.php ENDPATH**/ ?>