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
  <div class="section bg-transparent mt-0 mb-4">
    <div class="container clearfix">
      <div class="row justify-content-center" style="margin-top: 100px">
        <div class="col-md-7 center">
          <div class="heading-block border-bottom-0 mb-4">
            <h2 class="mb-4 nott">{{$title}}</h2>
          </div>
          <div class="svg-line bottommargin-sm clearfix">
            <img
              src="{{$image}}"
              alt="svg divider"
              height="20"
            />
          </div>
          <p>
            {{$brief}}
          </p>
        </div>
      </div>
    </div>

    <div
      class="owl-carousel owl-carousel-full image-carousel carousel-widget topmargin-sm charity-card"
      data-stage-padding="20"
      data-margin="10"
      data-center="true"
      data-loop="true"
      data-nav="true"
      data-autoplay="500000"
      data-speed="400"
      data-pagi="true"
      data-items-xs="1"
      data-items-sm="2"
      data-items-md="2"
      data-items-lg="3"
      data-items-xl="4"
    >
    @if ($block_childs)
            @foreach ($block_childs as $item)
            @php
                $title_child = $item->json_params->title->{$locale} ?? $item->title;
                $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                $content_child = $item->json_params->content->{$locale} ?? $item->content;
                $image_child = $item->image != '' ? $item->image : null;
                $image_background_child = $item->image_background != '' ? $item->image_background : '';
                $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
                $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                $icon = $item->icon != '' ? $item->icon : '';
                $style = $item->json_params->style ?? '';
            @endphp
            <div class="oc-item text-start">
                <img
                  src="{{$image_background_child}}"
                  alt="Image 1"
                  class="rounded"
                />
                <div
                  class="oc-desc d-flex flex-column justify-content-center shadow-lg"
                >
                  <small class="text-uppercase fw-normal ls1 color mb-2 d-block"
                    >{{$brief_child}}</small
                  >
                  <h3 class="mb-3">
                    <a href="demo-nonprofit-causes-single.html"
                      >{{$title_child}}</a
                    >
                  </h3>
                  <ul class="skills mb-3">
                    <li data-percent="57">
                      <div class="progress">
                        <div class="progress-percent">
                          <div class="counter counter-inherit">
                            $<span
                              data-from="0"
                              data-to="{{$url_link}}"
                              data-refresh-interval="10"
                              data-speed="1100"
                              data-comma="true"
                            ></span>
                            {{$url_link_title}}
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <p class="mb-4 text-black-50">
                    {{$content_child}}
                  </p>
                  <a
                    href="demo-nonprofit-causes-single.html"
                    class="button button-rounded button-border nott ls0 fw-medium m-0 d-flex align-self-start"
                    >Quyên góp</a
                  >
                </div>
              </div>
            @endforeach
        @endif
    </div>
  </div>
@endif
