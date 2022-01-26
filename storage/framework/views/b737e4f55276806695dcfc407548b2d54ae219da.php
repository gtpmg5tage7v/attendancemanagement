

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<div class="container bg-light">
  <h1>連絡掲示板</h1>
  <div class="row">
    <form action="/communication" method="post">
      <?php echo csrf_field(); ?>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">タイトル</label>
      <input  class="form-control" type="text" name="title">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">名前</label>
      <input  class="form-control" type="text" name="name" value="<?php echo e(Auth::user()->name); ?>">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">メッセージ</label>
      <textarea  class="form-control" type="text" name="message" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-lg">書き込む</button>
    <a href="#" class="btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">戻る</a>
    
  </form>
  </div>
</div>


  <hr>
  <div class="container">
    <div class="row">
  <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
      <div class="col-6">

    
  <div class="card border-dark mb-3">
    <div class="card-header"><?php echo e($item->title); ?></div>
    <div class="card-body text-dark">
      <h5 class="card-title"><?php echo e($item->name); ?></h5>
      <p class="card-text"><?php echo nl2br(e($item->message)); ?></p>
    </div>
    <div class="card-footer bg-transparent border-dark">
      
      
      <a class="edit" href="/communication/edit?id=<?php echo e($item->id); ?>"><i class="far fa-edit"></i></a>
      <a class="dust" href="/communication/del?id=<?php echo e($item->id); ?>"><i class="far fa-trash-alt"></i></a>
      
      

      
      <like-component :post_id="<?php echo e($item->id); ?>"></like-component>
      <p class="date"><?php echo e($item->updated_at); ?></p>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
  


  

  <?php echo e($items->links()); ?>


  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\test_17\laravel8_vue_calendar\resources\views/communication/index.blade.php ENDPATH**/ ?>