<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;

    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::POST_TYPE['post'];

    $rows = App\Http\Services\ContentService::getCmsPost($params)
        ->limit(3)
        ->get();
  ?>
  <div class="section bg-transparent mb-0 mt-0">
    <div class="wp-container-fluid">
      <p class="titular-sub-title text-primary fw-bold center">
        <?php echo e($brief); ?>

      </p>
      <h1
        class="titular-title fw-normal center fst-normal mb-2"
      >
        <?php echo e($title); ?>

      </h1>

      <div class="clear mb-5"></div>
      <div class="row posts-md col-mb-30">
        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            // $date = date('H:i d/m/Y', strtotime($item->created_at));
            $date = date('d', strtotime($item->created_at));
            $month = date('M', strtotime($item->created_at));
            $year = date('Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
          ?>
          <div class="col-lg-4 col-md-6 p-4">
            <div class="entry">
              <div class="entry-image">
                <a href="<?php echo e($alias); ?>"
                  ><img style="height: 378px;"
                    src="<?php echo e($image); ?>"
                    alt="<?php echo e($title); ?>"
                /></a>
              </div>
              <div class="entry-title title-xs nott">
                <h3>
                  <a class="elipsis1" href="<?php echo e($alias); ?>"><?php echo e($title); ?></a>
                </h3>
              </div>

              <div class="entry-content">
                <p class="elipsis2">
                  <?php echo e($brief); ?>

                </p>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\vieclam\resources\views/frontend/blocks/cms_post/styles/default.blade.php ENDPATH**/ ?>