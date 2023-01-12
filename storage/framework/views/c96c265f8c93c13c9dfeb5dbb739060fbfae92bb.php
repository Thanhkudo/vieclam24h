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

        $items = [];
        $i = 0;
        foreach ($block_childs as $item) {
            $items[$i] = $item;
            $i++;
        }

    ?>
    <div class="wp-container-fluid mb-5 pb-3">
        <img src="<?php echo e($image); ?>" height="108"
            class="rounded-t-md cursor-pointer w-full h-[108] md:h-[128px]" alt="banner-pc">
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\vieclam\resources\views/frontend/blocks/banner/styles/volunteers.blade.php ENDPATH**/ ?>