

<?php $__env->startSection('content'); ?>

  


  <div class="container px-5 py-5">
      <div class="row">
        
        
        <div class="card push-top">
          <div class="card-header">
            アカウント追加
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
              <form method="post" action="<?php echo e(route('user.store')); ?>">
                  <div class="form-group">
                      <?php echo csrf_field(); ?>
                      <label for="name">名前</label>
                      <input type="text" class="form-control" name="name"/>
                  </div>
                  <div class="form-group">
                      <label for="email">メールアドレス</label>
                      <input type="email" class="form-control" name="email"/>
                  </div>
                  
                  <div class="form-group">
                      <label for="password">パスワード</label>
                      <input type="password" class="form-control" name="password"/>
                  </div>
                  <button type="submit" class="btn btn-block btn-primary mt-5">作成する</button>                  
              </form>
              <a href="<?php echo e(route('account.index')); ?>" class="btn btn-secondary mt-2" tabindex="-1" role="button" aria-disabled="true">戻る</a>
          </div>
        </div>
      </div>
  </div>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\test_17\laravel8_vue_calendar\resources\views/account/create.blade.php ENDPATH**/ ?>