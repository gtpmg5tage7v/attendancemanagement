<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<ul class="nav justify-content-center bg-light">
  <li class="nav-item">
    <a class="nav-link active link-dark" aria-current="page" href="<?php echo e(route('home')); ?>">ホーム</a>
  </li>
  <li class="nav-item">
    <a class="nav-link link-dark" href="/time">タイムボーイ</a>
  </li>
  <li class="nav-item">
    <a class="nav-link link-dark" href="/communication">連絡掲示板</a>
  </li>
  </ul>



  <h1 class="text-center px-5 py-5">勤怠実績(日)</h1>
  <div class="container px-5 py-5">
    <div class="row">
      <div class="col-4">
        <form action="/time/daily" method="post">
          <?php echo csrf_field(); ?>
          <select class="form-select" name="year" class="year">
            <?php for($i=2022; $i <= 2030; $i++): ?>
            <option><?php echo e($i); ?>年</option>
            <?php endfor; ?>
          </select>
      </div>
      <div class="col-4">
        <select class="form-select" name="month" class="month">
          <?php for($i=1; $i <= 12; $i++): ?>
          <option><?php echo e($i); ?>月</option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="col-4">
        <select class="form-select" name="day" class="day">
          <?php for($i=1; $i <= 31; $i++): ?>
          <option><?php echo e($i); ?>日</option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="d-grid gap-2 col-6 mx-auto px-5 py-5">
        <button  type="submit" class="btn btn-primary">検索</button>
        <a href="/time" class="btn btn-outline-dark" tabindex="-1" role="button" aria-disabled="true">戻る</a>
      </div>
    </form>
  </div>
  </div>




<hr>


 <div class="container px-5 py-5">
   <div class="row">
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-6 px-5 py-5">
      <div class="card text-center">
        <div class="card-header fw-bold">
          <?php echo e($item->user_name); ?>

        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">出勤：<?php echo e($item->punchIn); ?></li>
          <li class="list-group-item">退勤：<?php echo e($item->punchOut); ?></li>
          <li class="list-group-item"><?php echo e($item->workTime); ?>時間</li>
          <?php if(Auth::user()->admin == 0): ?>
          <li class="list-group-item"><a href="<?php echo e(route('report.edit',['id'=>$item->id])); ?>"><?php echo e(__('編集')); ?></a></li>
          <?php endif; ?>          
        </ul>
      </div>
  </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </div>
 </div>
 <?php /**PATH C:\MAMP\htdocs\test_17\laravel8_vue_calendar\resources\views/time/daily.blade.php ENDPATH**/ ?>