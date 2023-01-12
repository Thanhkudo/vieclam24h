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
  <div class="container-fluid my-5 clearfix">
    <div
      class="d-flex flex-column align-items-center justify-content-center center counter-section position-relative py-5"
      style="
        background: url('<?php echo e($image_background); ?>')
          no-repeat center center/ contain;
      "
    >
      <div class="mx-auto center" style="max-width: 1000px">
        <h3>
            <?php echo e($title); ?>

        </h3>
      </div>

      <div class="row align-items-stretch m-0 w-100 clearfix">
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
            <div class="col-lg-3 col-sm-6 center mt-5">
                <img
                  src="<?php echo e($image_child); ?>"
                  alt="Counter Icon"
                  width="70"
                  class="mb-4"
                />
                <div class="counter font-secondary">
                  <span
                    data-from="100"
                    data-to="<?php echo e($title_child); ?>"
                    data-refresh-interval="50"
                    data-speed="2100"
                    data-comma="true"
                  ></span
                  >+
                </div>
                <h5 class="nott ls0 mt-0"><u><?php echo e($url_link_title); ?></u></h5>
              </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\vieclam\resources\views/frontend/blocks/custom/styles/about_client.blade.php ENDPATH**/ ?>