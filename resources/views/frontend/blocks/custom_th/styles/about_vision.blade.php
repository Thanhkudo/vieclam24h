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

    <div class="section bg-transparent">
        <div class="container clearfix">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 center">
                    <div class="heading-block border-bottom-0 mb-4">
                        <h2 class="mb-4 nott">{{ $title }}</h2>
                    </div>
                    <div class="svg-line bottommargin-sm clearfix">
                        <img src="{{ $image }}" alt="{{ $title }}" height="20" />
                    </div>
                    <p>
                        {{ $brief }}
                    </p>
                </div>
            </div>
            <div class="row justify-content-around">
                <div class="row">
                @if ($block_childs)
                    @php
                    $i = 0;
                    @endphp
                    @foreach ($block_childs as $item)
                        @php
                            $title_child = $item->json_params->title->{$locale} ?? $item->title;
                            $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                            $content_child = $item->json_params->content->{$locale} ?? $item->content;
                            $image_child = $item->image != '' ? $item->image : null;
                            $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
                            $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                            $icon = $item->icon != '' ? $item->icon : '';
                            $style = $item->json_params->style ?? '';
                            $mt5 = (($i <5 && ($i+1)%2 ==0)||($i>=5 && ($i+1-5)%2==0))?"mt-5":"";
                        @endphp
                        <div class="col-lg-2dot4 col-md-4 col-6 {{$mt5}}">
                            <div class="team overflow-hidden">
                                <div class="team-image">
                                    <img src="{{$image_child}}" alt="{{$title_child}}" />
                                </div>
                                <div class="team-desc">
                                    <h4 class="team-title pt-3 mb-0 fw-medium nott">
                                        <small>{{$brief_child}}</small> {{$title_child}}
                                    </h4>
                                </div>
                            </div>
                        </div>
                        @php
                            $i++;
                        @endphp
                        @if ($i % 5 == 0)
                        </div>
                        <div class="row mt-5">
                        @endif
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
@endif
