<?php 
/*

  Template Name: Accueil

*/

?>
<?php get_header(); ?>
<?php $posts = new WP_query(['post_type' => 'project']); ?>
<main class="main">
    <section class="projects">
    <h2 class="projects__title">Projets</h2>
    <ul class="projects__list">
    <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); $fields = get_fields(); ?>
        <li class="projects__item single-project">
            <a class="single-project__link" href="<?= get_post_permalink() ?>">
            <figure class="single-project__figure">
                <img class="single-project__img" width="500" height="auto" src="<?= $fields['thumbnail']['sizes']['medium_large'] ?>" alt="">
                <figcaption class="single-project__title"><?php the_title() ?></figcaption>
            </figure>
            </a>
        </li>
    <?php endwhile; endif; ?>
    </ul>
    </section>
</main>

<?php get_footer(); ?>