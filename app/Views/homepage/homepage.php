<?= $this->include('homepage/template/header'); ?>

<style>
  .hero {
    width: 100%;
    height: 100vh;
    background: url(<?= base_url('home_assets/img/hero-bg.png'); ?>) top center no-repeat;
    background-size: cover;
  }
</style>

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center">
        <h1 data-aos="fade-up">Welcome to <span style="color: #d59335;"><?= $information[0]['app_name']; ?></span> for detecting different types of coffee beans.</h1>
        <h2 data-aos="fade-up" data-aos-delay="400">Our mission is to provide accurate and detailed information to enhance your coffee experience and appreciation.</h2>
        <div data-aos="fade-up" data-aos-delay="600">
          <div class="text-center text-lg-start">
            <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
              <span>Get Started</span>
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
        <img src="<?= base_url('home_assets/img/logo/logo-txt.png'); ?>" class="img-fluid" alt="">
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">
  <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <div class="container" data-aos="fade-up">
      <div class="row gx-0">

        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="content">
            <h3>Who We Are</h3>
            <h2>Our coffee bean detection website is a platform designed to assist coffee enthusiasts in identifying different types of coffee beans. Our team has worked tirelessly to create a website that is both informative and user-friendly.</h2>
            <p><?= $information[0]['app_description']; ?></p>
            <div class="text-center text-lg-start">
              <a href="#features" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center scrollto">
                <span>Read More</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
          <img src="home_assets/img/about.jpg" class="img-fluid" alt="">
        </div>

      </div>
    </div>

  </section><!-- End About Section -->


  <section id="features" class="features">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Our Features</h2>
        <p>Features that can be used in this website</p>
      </header>

      <div class="row">

        <?php foreach ($features as $feature) : ?>
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              <img src="<?= base_url('assets/images/features/') . $feature['icon_url']; ?>" class="img-fluid" alt="<?= $feature['icon_alternate']; ?>">
              <h3><?= $feature['feature_name']; ?></h3>
              <p><?= $feature['feature_description']; ?></p>
            </div>
          </div>
        <?php endforeach; ?>

      </div>

    </div>

  </section>

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4">

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-emoji-smile"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="<?= $information[0]['count_happy_users']; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Happy Users</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="<?= $information[0]['count_total_datasets']; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Numbers of Datasets</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-gear-wide-connected" style="color: #15be56;"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="<?= $information[0]['last_model_accuracy']; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Model Accuracy</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-people" style="color: #bb0852;"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="2" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hard Workers</p>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>

  <section id="articles" class="articles">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Articles</h2>
        <p>Recent articles about coffee</p>
      </header>

      <div class="row">

        <?php foreach ($contents as $content) : ?>
          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="<?= base_url('assets/images/contents/') . $content['thumbnail_url']; ?>" width="100%" height="350px" alt="<?= $content['thumbnail_alternate']; ?>"></div>
              <span class="post-date"><?= $content['created_at']; ?></span>
              <h3 class="post-title"><?= $content['title']; ?></h3>
              <p><?= $content['description']; ?></p>
              <a href="<?= $content['content_url']; ?>" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        <?php endforeach; ?>

      </div>

    </div>

  </section>

  <section id="coffeetype" class="coffeetype">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>coffee type</h2>
        <p>Check some types of coffee beans</p>
      </header>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="coffeetype-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-Arabica">Arabica</li>
            <li data-filter=".filter-Robusta">Robusta</li>
          </ul>
        </div>
      </div>

      <div class="row gy-4 coffeetype-container" data-aos="fade-up" data-aos-delay="200">

        <?php foreach ($beans as $bean) : ?>
          <div class="col-lg-4 col-md-6 coffeetype-item filter-<?= $bean['type']; ?>">
            <div class="coffeetype-wrap">
              <img src="<?= base_url('assets/images/beans/') . $bean['photo_url']; ?>" class="img-fluid" alt="<?= $bean['photo_alternate']; ?>">
              <div class="coffeetype-info">
                <h4><?= $bean['name']; ?></h4>
                <p><?= $bean['description']; ?></p>
                <div class="coffeetype-links">
                  <a href="<?= base_url('assets/images/beans/') . $bean['photo_url']; ?>" data-gallery="coffeetypeGallery" class="coffeetype-lightbox" title="<?= $bean['name']; ?>"><i class="bi bi-plus"></i></a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>

    </div>

  </section><!-- End coffeetype Section -->


  <!-- ======= Team Section ======= -->
  <?php if ($sponsors != null) : ?>
    <section id="team" class="team">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Team</h2>
          <p>Our hard working team</p>
        </header>

        <div class="row gy-2 justify-content-center">

          <?php foreach ($teams as $person) : ?>
            <div class="col-lg-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
              <div class="member">
                <div class="member-img">
                  <img src="<?= base_url('assets/images/teams/') . $person['photo_url']; ?>" class="img-fluid" alt="<?= $person['photo_alternate']; ?>">
                  <div class="social">
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4><?= $person['fullname']; ?></h4>
                  <span><?= $person['position']; ?></span>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section><!-- End Team Section -->
  <?php endif; ?>

  <?php if ($sponsors != null) : ?>
    <section id="sponsors" class="sponsors">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Our Sponsors</h2>
          <p>Some of the organizations involved in creating this project</p>
        </header>

        <div class="sponsors-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <?php foreach ($sponsors as $sponsor) : ?>
              <div class="swiper-slide"><img src="<?= base_url('assets/images/sponsors/') . $sponsor['photo_url']; ?>" class="img-fluid" alt="<?= $sponsor['photo_alternate']; ?>"></div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

    </section>
  <?php endif; ?>

  <!-- ======= F.A.Q Section ======= -->
  <section id="faq" class="faq">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>F.A.Q</h2>
        <p>Frequently Asked Questions</p>
      </header>

      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="accordion accordion-flush" id="faqlist1">
            <?php
            $i = 0;
            foreach ($faqs as $faq) : ?>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-<?= $i; ?>">
                    <?= $faq['question']; ?>
                  </button>
                </h2>
                <div id="faq-content-<?= $i; ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                    <?= $faq['answer']; ?>
                  </div>
                </div>
              </div>
            <?php
              $i++;
            endforeach; ?>
          </div>
        </div>
      </div>
    </div>

  </section><!-- End F.A.Q Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </header>

      <div class="row gy-4">

        <div class="col-lg-12">

          <div class="row gy-4">
            <div class="col-md-3">
              <div class="info-box">
                <i class="bi bi-geo-alt"></i>
                <h3>Address</h3>
                <p><?= $information[0]['app_address']; ?></p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="info-box">
                <i class="bi bi-telephone"></i>
                <h3>Call Us</h3>
                <p><?= $information[0]['app_phone_number']; ?></p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="info-box">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p><?= $information[0]['app_email']; ?></p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="info-box">
                <i class="bi bi-clock"></i>
                <h3>Operational Hours</h3>
                <p><?= $information[0]['app_operational_hours']; ?></p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </section><!-- End Contact Section -->

  <?= $this->include('homepage/template/footer') ?>