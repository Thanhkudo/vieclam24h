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
  <div class="container">
    <div class="w-100 position-relative">
      <div
        class="donor-img d-flex align-items-center rounded parallax mx-auto shadow-sm w-100"
        data-bottom-top="background-position:0px 0px;"
        data-top-bottom="background-position:0px -50px;"
        style="
          height: 500px;
          background: url('<?php echo e($image_background); ?>')
            no-repeat center center / cover;
        "
      ></div>
      <div
        class="card bg-white border-0 center py-sm-4 px-sm-5 p-2 shadow-sm"
        style="
          position: absolute;
          top: 50%;
          right: 80px;
          transform: translateY(-50%);
        "
      >
        <div class="card-body">
          <div class="color h1 mb-3"><i class="icon-heart"></i></div>
          <small
            class="text-uppercase fw-normal ls2 text-muted mb-3 d-block"
            ><?php echo e($title); ?></small
          >
          <h3 class="display-3 fw-bold mb-3 font-secondary"><?php echo e($brief); ?></h3>
          <a href="<?php echo e($url_link); ?>" class="button-svg"
            ><?php echo e($url_link_title); ?></a
          >
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nonprofit\resources\views/frontend/blocks/custom/styles/donate.blade.php ENDPATH**/ ?>