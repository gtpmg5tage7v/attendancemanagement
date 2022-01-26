

<?php $__env->startSection('content'); ?>

<div class="container px-5 py-5">
  
  <div class="row px-5 py-5">
    <table class="table table-striped">
      <thead>
        <tr class="table-primary">
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          
          
          <td class="text-center"></td>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($user->id); ?></td>
            <td><?php echo e($user->name); ?></td>
            <td><?php echo e($user->email); ?></td>
            
            
            <td class="text-center">
                <a href="<?php echo e(route('account.create')); ?>" class="btn btn-primary btn-sm">アカウント作成</a>
                <a href="<?php echo e(route('account.edit', $user->id)); ?>" class="btn btn-primary btn-sm">編集</a>
                
                <form method="POST" action="<?php echo e(route('account.destroy',['id'=>$user->id])); ?>" style="display: inline-block">
                
                    <?php echo csrf_field(); ?>
                    <a href="#" data-id="<?php echo e($user->id); ?>" onClick="return Check()">
                    <button class="btn btn-danger btn-sm" type="submit">削除する</button>
                  </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    </table>
  </div>
</div>
    <script>
        function Check() {
            var checked = confirm("本当に削除しますか？");
            if (checked == true) {
                return true;
            } else {
                return false;
            }
        }
     </script> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\test_17\laravel8_vue_calendar\resources\views/account/index.blade.php ENDPATH**/ ?>