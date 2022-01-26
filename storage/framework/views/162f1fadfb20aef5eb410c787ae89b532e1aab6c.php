
<?php $__env->startSection('content'); ?>

<div class="container bg-light">
  <h1>編集</h1>
  <div class="row">
    <form action="/communication/edit" method="post">
      <?php echo csrf_field(); ?>
      <input class="edit_input" type="hidden" name="id" value="<?php echo e($form->id); ?>">
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">タイトル</label>
      <input  class="form-control" type="text" name="title" value="<?php echo e($form->title); ?>">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">メッセージ</label>
      <textarea  class="form-control" type="text" name="message" rows="3" ><?php echo e($form->message); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-lg">書き込む</button>
    <button type="button" class="btn btn-outline-secondary btn-lg"><a href="/communication">戻る</a></button>
  </form>
  </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\test_17\laravel8_vue_calendar\resources\views/communication/edit.blade.php ENDPATH**/ ?>