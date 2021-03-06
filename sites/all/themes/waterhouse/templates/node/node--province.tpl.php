<div class="main-image">
  <?php print render($content['field_image']); ?>
</div>
  <div class="caption_slide">
    <div class="caption_write">
      <h1><?php echo $content['body']['#object']->title;?></h1>
    </div>
  </div>

<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php if ((!$page && !empty($title)) || !empty($title_prefix) || !empty($title_suffix) || $display_submitted): ?>
  <header>
    <?php print render($title_prefix); ?>
    <?php if (!$page && !empty($title)): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
  </header>
  <?php endif; ?>

  <?php
    // Hide comments, tags, and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_tags']);
    hide($content['field_uploads']);
    hide($content['field_image']);
    hide($content['field_province']);
    hide($content['body']);
    print render($content);
  ?>

  <div class="body">
    <div class="field-label province-labels">معرفی استان:</div>
    <?php print render($content['body']); ?>
  </div>

  <?php if(isset($content['field_province']['#items'][0]['tid'])):?>
  <div class="relative-films">
    <div class="field-label province-labels">فرصت های سرمایه گذاری:</div>
    <div class="carousel">
      <?php print views_embed_view('province_films', 'block', $content['field_province']['#items'][0]['tid']); ?>
    </div>
  </div>
  <?php endif;?>

  <div class="relative-files">
    <div class="field-label province-labels">فایل های مرتبط:</div>
    <div class="carousel">
      <?php print render($content['field_uploads']); ?>
    </div>
  </div>

  <?php if(isset($content['field_province']['#items'][0]['tid'])):?>
    <div class="relative-spots">
      <div class="field-label province-labels">جاذبه های گردشگری استان:</div>
      <div class="carousel">
        <?php print views_embed_view('province_films', 'block_1', $content['field_province']['#items'][0]['tid']); ?>
      </div>
    </div>
  <?php endif;?>

  <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
  <footer>
    <?php print render($content['field_tags']); ?>
    <?php print render($content['links']); ?>
  </footer>
  <?php endif; ?>
</article>
<script>
  if($('.carousel').length){
    $.getScript('/sites/all/themes/waterhouse/js/lib/owl.carousel.min.js', function(){
      $('.carousel .field-name-field-uploads > .field-items, .view-province-films.view-display-id-block .view-content').addClass('owl-carousel')
      $('.owl-carousel').owlCarousel({
        rtl:true,
        loop:false,
        margin:15,
        responsiveClass:true,
        nav:true,
        responsive:{
          0:{items:1},
          600:{items:3},
          1000:{items:4}
        }
      });
      $('.owl-prev').text('بعدی')
      $('.owl-next').text('قبلی')
    })
  }
</script>
