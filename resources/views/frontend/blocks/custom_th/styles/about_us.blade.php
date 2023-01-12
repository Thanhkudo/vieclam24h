@if ($block)
    @php

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
    @endphp
    <div class="section"
        style="
              background: url('{{ $image_background }}')
                no-repeat center center / cover;
              padding: 80px 0;
            ">
        <div class="container clearfix">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="mb-2">{!! $title !!}</h3>
                    <div class="svg-line mb-2 clearfix">
                        <img src="{{ $image }}" alt="svg divider" height="10" />
                    </div>
                    <p class="mb-5">
                        {!! $brief !!}
                    </p>
                    <div class="row mission-goals gutter-30 mb-0">
                        @if ($block_childs)
                            @foreach ($block_childs as $item)
                                @php
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

                                @endphp
                                <div class="col-md-6">
                                    <div class="feature-box fbox-plain bg-white mx-0">
                                        <div class="fbox-media position-relative col-auto p-0 me-4">
                                            <img src="{{ $image }}" alt="{{ $title }}" width="50" />
                                        </div>
                                        <div class="fbox-content">
                                            <h3 class="nott ls0">
                                                <a href="#" class="text-dark">{{ $title }}</a>
                                            </h3>
                                            <p>
                                                {{ $brief }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif
