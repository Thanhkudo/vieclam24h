<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';

    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>
  <div
  class="section section-details mb-0 bg-white"
  style="padding: 80px 0 160px;min-height: 734px;"

>
  <div
    class="w-100 h-100 d-none d-md-block"
    style="
      position: absolute;
      top: 0;

      left: 0;
      background: #fff url('<?php echo e($image_background); ?>')
        no-repeat bottom right / cover;
    "
  ></div>
  <div class="container clearfix">
    <div class="row">
        <?php if($block_childs): ?>
            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $title_child = $item->json_params->title->{$locale} ?? $item->title;
                    $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                    $content_child = $item->json_params->content->{$locale} ?? $item->content;
                    $image_child = $item->image != '' ? $item->image : null;
                    $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
                    $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                    $icon = $item->icon != '' ? $item->icon : '';
                    $style = $item->json_params->style ?? '';
                ?>
                <div class="col-md-4 px-4 mb-5">
                    <h4 class="fw-medium mb-4"><?php echo e($title_child); ?></h4>
                    <p class="mb-3">
                        <?php echo e($brief_child); ?>

                    </p>
                  </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

    </div>
  </div>
</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nonprofit\resources\views/frontend/blocks/custom_th/styles/about_development.blade.php ENDPATH**/ ?>