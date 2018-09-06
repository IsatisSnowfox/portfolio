<?php get_header(); ?>
<main class="main">
  <section class="project">
    <?php if(have_posts()) : while(have_posts()) : the_post(); $fields = get_fields(); ?>
    <h2 class="project__title"><?= the_title() ?></h2>
    <div class="project__infos">
      <img class="project__image" src="<?= $fields['thumbnail']['sizes']['medium_large'] ?>" alt="">
      <div class="project__description">
        <?= $fields['description'] ?>
        <a href="<?= $fields['url'] ?>" class="project__link">Voir le site<span class="hidden"> de <?php the_title() ?></span></a>
      </div>
    </div>
    <section class="project__gallery gallery">
      <h3 class="gallery hidden">Galerie</h3>
      <ul class="gallery__list">
        <?php foreach($fields['gallery'] as $field): ?>
        <li class="gallery__item">
          <a href="<?= $field['url']; ?>" data-lightbox="project"><img src="<?= $field['sizes']['large'] ?>" alt="" class="gallery__image"></a>
        </li>
        <?php endforeach; ?>
      </ul>
    </section>
    <?php endwhile; endif; ?>
  </section>
</main>
<script src="<?= get_template_directory_uri(); ?>/assets/js/lightbox-plus-jquery.min.js"></script>
<?php get_footer(); ?>
