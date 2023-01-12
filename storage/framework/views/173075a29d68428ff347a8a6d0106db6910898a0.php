<footer id="footer" style="background-color: #002d40">
    <?php
      $footer_menu = $menu->filter(function ($item, $key) {
                    return $item->menu_type == 'footer' && ($item->parent_id == null || $item->parent_id == 0);
                });
  ?>
    <!-- Footer Widgets
    ============================================= -->
  <div id="copyrights" class="bg-color">
    <div class="container clearfix">
      <div class="row justify-content-between align-items-center">
        <div class="col-md-6">
            <?php
                $content = '';
                foreach ($footer_menu as $main_menu){
                    $content = $main_menu->description;
                }
                echo $content;
            ?>
        </div>
        <div class="col-md-6 d-md-flex flex-md-column align-items-md-end mt-4 mt-md-0">
          <div class="copyrights-menu copyright-links clearfix">
            <div class="copyright-links">
                <?php
                $content = '';
                foreach ($footer_menu as $main_menu) {
                    foreach ($menu as $item) {
                        if ($item->parent_id == $main_menu->id) {
                            $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                            $url = $item->url_link;
                            $active = $url == url()->current() ? 'active' : '';
                            $content .= '<a href="' . $url . '">' . $title . '</a> / ';
                        }
                    }
                }
                echo trim($content,' / ');
                ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php /**PATH C:\xampp\htdocs\nonprofit\resources\views/frontend/blocks/footer/styles/default.blade.php ENDPATH**/ ?>