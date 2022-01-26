月の検索です




<div class="container pt-5 px-5">
    <div class="row pt-5 px-5">
  
    
  <table class="table table-striped pt-5 px-5">
   <thead>
       <tr>
        <th scope="col">日時</th>
        <th scope="col">名前</th>
        <th scope="col">出勤時間</th>
        <th scope="col">退勤時間</th>
      </tr> 
    </thead>
    <?php $__currentLoopData = $time; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tbody>
      <tr>
        <th scope="row"><?php echo e($row->month); ?>月<?php echo e($row->day); ?>日</th>
        <td><?php echo e($row->user_name); ?></td>
        <td>出勤時間<?php echo e($row->punchIn); ?></td>
        <td>退勤時間<?php echo e($row->punchOut); ?></td>
        <td>勤務時間<?php echo e($row->workTime); ?></td>
        <td>
          
            <a href="<?php echo e(route('report.edit',['id'=>$row->id])); ?>"><?php echo e(__('編集')); ?></a>
          
        </td>
      </tr>
      
    </tbody>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </table>
  
  
  
    <table>
      <tr>
        
  
       
      </tr>
    </table>
  </div>
  </div><?php /**PATH C:\MAMP\htdocs\test_17\laravel8_vue_calendar\resources\views/report/search_by_month.blade.php ENDPATH**/ ?>