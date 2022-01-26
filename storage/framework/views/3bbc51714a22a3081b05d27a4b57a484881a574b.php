<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


<?php $__env->startSection('content'); ?>
レポートインデックスです



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
</div>


<div class="col-lg-4">

  <div class="card pd-20 pd-sm-40"> 
   <div class="table-wrapper"> 
<form method="post" action="<?php echo e(route('search.by.month')); ?>" >
 <?php echo csrf_field(); ?>
  <div class="modal-body pd-20"> 
 <div class="form-group">
   <label for="exampleInputEmail1">月次検索</label>
   
   <select class="form-control" name="month">
    <option value="1">1月</option>
    <option value="2">2月</option> 
    <option value="3">3月</option> 
    <option value="4">4月</option> 
    <option value="5">5月</option> 
    <option value="6">6月</option> 
    <option value="7">7月</option> 
    <option value="8">8月</option> 
    <option value="9">9月</option> 
    <option value="10">10月</option>  
    <option value="11">11月</option> 
    <option value="12">12月</option> 
    
   </select>
   
 </div> 
       </div><!-- modal-body -->
       <div class="modal-footer">
         <button type="submit" class="btn btn-info pd-x-20">決定</button>
          
       </div>
         </form> 
   </div><!-- table-wrapper -->
 </div><!-- card -->


</div>
<?php $__env->stopSection(); ?>

 




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\test_17\laravel8_vue_calendar\resources\views/report/index.blade.php ENDPATH**/ ?>