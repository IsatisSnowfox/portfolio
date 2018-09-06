<?php 
/*

  Template Name: Contact

*/
?>

<?php get_header(); ?>
<main class="main">
  <?php if(have_posts()) : while(have_posts()) : the_post(); $fields = get_fields(); ?>
  <section class="contact">
    <h2 class="contact__title">Contact</h2>
    <div class="contact__content">
      <section class="contact-info contact__info">
        <h3 class="contact-info__title hidden">Informations de contact</h3>
        <dl class="contact-info__list" itemscope itemtype="http://schema.org/Person">
          <div class="contact-info__item single-info hidden">
            <dt class="single-info__title">Nom et prénom</dt>
            <dd class="single-info__definition"><span itemprop="givenName">Félix</span> <span itemprop="familyName">Gason</span></dd>
          </div>
          <div class="contact-info__item single-info">
            <dt class="single-info__title hidden">Email</dt>
            <dd class="single-info__definition" itemprop="email"><a href="mailto:<?= $fields['email'] ?>" title="M'envoyer un email"><?= $fields['email'] ?></a></dd>
          </div>
          <div class="contact-info__item single-info">
            <dt class="single-info__title hidden">Téléphone</dt>
            <dd class="single-info__definition" itemprop="telephone"><?= $fields['phone'] ?></dd>
          </div>
          <div class="contact-info__item single-info" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
            <dt class="single-info__title hidden">Adresse</dt>
            <dd class="single-info__definition" itemprop="streetAddress"><?= $fields['address']['street'] . ' ' . $fields['address']['street_number']; ?></dd>
            <dd class="single-info__definition"><span itemprop="postalCode"><?= $fields['address']['postal_code']?></span> <span itemprop="addressLocality"><?= $fields['address']['city'] ?></span></dd>
          </div>
        </dl>
      </section>
      <section class="contact-form contact__form">
        <h3 class="contact-form__title hidden">Formulaire de contact</h3>
        <?= do_shortcode('[contact-form-7 id="40" title="Formulaire de contact"]') ?>
      </section>
    </div>
  <?php endwhile; endif; ?>
  </section>
</main>

<?php get_footer(); ?>