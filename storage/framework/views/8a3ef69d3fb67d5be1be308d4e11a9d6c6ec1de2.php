<?php if($block): ?>
    <?php

        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>
    <div class="position-relative" id="employers-banner-version2">
        <section id="slider" class="mt-5 slider-element swiper_wrapper" data-autoplay="6000" data-speed="800"
            data-loop="true" data-grab="true" data-effect="fade" data-arrow="false" style="height: 320px">
            <div class="swiper-container swiper-parent">
                <div class="swiper-wrapper">
                    <?php if($block_childs): ?>
                        <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $title = $item->json_params->title->{$locale} ?? $item->title;
                                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                                $content = $item->json_params->content->{$locale} ?? $item->content;
                                $image = $item->image != '' ? $item->image : null;
                                $image_background = $item->image_background != '' ? $item->image_background : null;
                                $video = $item->json_params->video ?? null;
                                $video_background = $item->json_params->video_background ?? null;
                                $url_link = $item->url_link != '' ? $item->url_link : '';
                                $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                                $icon = $item->icon != '' ? $item->icon : '';
                                $style = isset($item->json_params->style) && $item->json_params->style == 'slider-caption-right' ? 'd-none' : '';
                                $image_for_screen = null;
                                if ($agent->isDesktop() && $image_background != null) {
                                    $image_for_screen = $image_background;
                                } else {
                                    $image_for_screen = $image;
                                }
                            ?>
                            <div class="swiper-slide dark">
                                <div class="swiper-slide-bg" style="background-image: url('<?php echo e($image); ?>') ;background-position:center 20%"></div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
        <div id="search-box-version2" class="pt-2 absolute md:left-[30px] lg:left-[80px]" style="z-index: 1">
            <form class="p-1 p-lg-3" autocomplete="off">
                <div class="w-full grid grid-cols-1 gap-2 h-12 text-sm relative">
                    <div class="col-span-4 bg-white rounded-sm text-grey-50 relative rounded-[8px]">
                        <div class="w-full h-full flex items-center justify-center relative pl-1">
                            <i class="icon icon-search3 ml-2 mr-2"></i>
                            <input type="text"
                                name="kye" class="w-full tracking-tight focus:outline-none focus:text-black pr-44"
                                placeholder="Tìm kiếm cơ hội việc làm" />
                        </div>
                        <div
                            class="bg-pri-100 cursor-pointer absolute top-0 right-[2px] flex my-[2px] rounded-[6px] btn-box">
                            <button type="submit"
                                class="text-white justify-center font-semibold px-[30px] xl:px-[50px]" id="search-job">
                                Tìm kiếm
                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-full grid grid-cols-2 gap-2 mt-[8px]">
                    <div class="bg-white text-black rounded-[4px]">
                        <div class="w-full h-full flex items-center justify-center relative">
                            <i class="icon icon-line-briefcase ml-1 mr-md-2"></i>
                            <select class="selectpicker" id="category"  data-live-search="true" data-placeholder="Tất cả nghề nghiệp" data-size="6" style="width:100%;">
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($val['id']); ?>"><?php echo e($val['title']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="bg-white text-black rounded-[4px]">
                        <div class="w-full h-full flex items-center justify-center relative">
                            <i class="icon-line-map-pin ml-1 mr-md-2"></i>
                            <select class="selectpicker" id="city" data-live-search="true" data-placeholder="Tất cả tỉnh thành" data-size="6" style="width:100%;">
                                <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($val['id']); ?>"><?php echo e($val['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\vieclam\resources\views/frontend/blocks/banner/styles/slide.blade.php ENDPATH**/ ?>