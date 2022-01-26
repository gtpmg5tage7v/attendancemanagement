

<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="mx-auto">
      <br>
      <h2 class="text-center">勤務検索画面</h2>
      <br>
      <!--検索フォーム-->
      <div class="row">
        <div class="col-sm">
          <form method="GET" action="<?php echo e(route('searchproduct')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">日時</label>
              <!--入力-->
              <div class="col-sm-5">
                <input type="month" class="form-control" name="searchWord" value="<?php echo e($searchWord); ?>">
              </div>
              <div class="col-sm-auto">
                <button type="submit" class="btn btn-primary ">検索</button>
              </div>
            </div>     
            <!--プルダウンカテゴリ選択-->
            <div class="form-group row">
              <label class="col-sm-2">スタッフ名</label>
              <div class="col-sm-3">
                <select name="userId" class="form-control" value="<?php echo e($userId); ?>">
                  <option value="">未選択</option>

                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($id); ?>">
                    <?php echo e($name); ?>

                  </option>  
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    <!--検索結果テーブル 検索された時のみ表示する-->
    <?php if(!empty($products)): ?>
    <div class="productTable">
      <p>全<?php echo e($products->count()); ?>件</p>
      <table class="table table-hover">
        <thead style="background-color: #ffd900">
          <tr>
            <th style="width:50%">勤務時間</th>
            <th>スタッフ名</th>
            <th>勤務時間</th>
            <th>年　月　日</th>
            <th></th>
          </tr>
        </thead>
        
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <tr>
          <td><?php echo e($product->punchIn); ?>～<?php echo e($product->punchOut); ?></td>
          <td><?php echo e($product->user->name); ?></td>
          
          <td><?php echo e($product->workTime); ?>時間</td>
          
          <td><?php echo e($product->year); ?>年<?php echo e($product->month); ?>月<?php echo e($product->day); ?>日</td>
          <td><a href="<?php echo e(route('report.edit',['id'=>$product->id])); ?>" class="btn btn-primary btn-sm">詳細</a></td>
          
        </tr>
       
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <div class="alert alert-success" role="alert">
          累計時間：<?php echo e($total); ?>時間
        </div>
        
      </table>
    </div>
    <!--テーブルここまで-->
    <!--ページネーション-->
    <div class="d-flex justify-content-center">
      
      <?php echo e($products->appends(request()->input())->links()); ?>

    </div>
    <!--ページネーションここまで-->
    <?php endif; ?>
  </div>
</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\test_17\laravel8_vue_calendar\resources\views/searchproduct.blade.php ENDPATH**/ ?>