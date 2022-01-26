<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <style>
    
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
    <div class="card-header">
      編集画面
    </div>
  
    <div class="card-body">
      <?php if($errors->any()): ?>
        <div class="alert alert-danger">
          <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div><br />
      <?php endif; ?>
      <form method="POST" action="<?php echo e(route('account.update',['id' =>$users->id])); ?>">
            <div class="form-group">
                <?php echo csrf_field(); ?>
                <label for="name">名前</label>
                <input type="text" class="form-control" name="name" value="<?php echo e($users->name); ?>"/>
            </div>
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" class="form-control" name="email" value="<?php echo e($users->email); ?>"/>
            </div>
            
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" name="password" value="<?php echo e($users->password); ?>"/>
            </div>
            <button type="submit" class="btn btn-block btn-danger">更新する</button>
            <a href="<?php echo e(route('account.index')); ?>" class="btn btn-primary">戻る</a>
        </form>
    </div>
  </div>
  <?php /**PATH C:\MAMP\htdocs\test_17\laravel8_vue_calendar\resources\views/account/edit.blade.php ENDPATH**/ ?>