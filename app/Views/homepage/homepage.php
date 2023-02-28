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
        <h1 data-aos="fade-up">Welcome to <span style="color: #d59335;">CoffeeAI</span> for detecting different types of coffee beans.</h1>
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
            <p>
              We understand the importance of knowing the exact type of coffee beans used in coffee-making, and have made it our mission to provide accurate and detailed information about each type of coffee bean. Through our website, users can learn about the origins, taste profiles, and brewing techniques for each type of coffee bean.
            </p>
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

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="box">
            <img src="home_assets/img/values-1.png" class="img-fluid" alt="">
            <h3>Classification of types of coffee beans</h3>
            <p>Can classify the types of coffee beans using photos of coffee beans</p>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
          <div class="box">
            <img src="home_assets/img/values-2.png" class="img-fluid" alt="">
            <h3>Accessible through various media</h3>
            <p>Can be accessed using a website or using an API so that it is possible to use it in other applications.</p>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
          <div class="box">
            <img src="home_assets/img/values-3.png" class="img-fluid" alt="">
            <h3>Have accurate coffee bean type classification results</h3>
            <p>Using CNN Deep Learning technology using tensorflow so that it can improve classification accuracy</p>
          </div>
        </div>

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
              <span data-purecounter-start="0" data-purecounter-end="0" data-purecounter-duration="1" class="purecounter"></span>
              <p>Happy Users</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="0" data-purecounter-duration="1" class="purecounter"></span>
              <p>Numbers of Datasets</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-gear-wide-connected" style="color: #15be56;"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="80" data-purecounter-duration="1" class="purecounter"></span>
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

        <div class="col-lg-4">
          <div class="post-box">
            <div class="post-img"><img src="home_assets/img/blog/blog-1.jpg" class="img-fluid" alt=""></div>
            <span class="post-date">Tue, September 15</span>
            <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit</h3>
            <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="post-box">
            <div class="post-img"><img src="home_assets/img/blog/blog-2.jpg" class="img-fluid" alt=""></div>
            <span class="post-date">Fri, August 28</span>
            <h3 class="post-title">Et repellendus molestiae qui est sed omnis voluptates magnam</h3>
            <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="post-box">
            <div class="post-img"><img src="home_assets/img/blog/blog-3.jpg" class="img-fluid" alt=""></div>
            <span class="post-date">Mon, July 11</span>
            <h3 class="post-title">Quia assumenda est et veritatis aut quae</h3>
            <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

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
            <li data-filter=".filter-app">Arabica</li>
            <li data-filter=".filter-card">Robusta</li>
          </ul>
        </div>
      </div>

      <div class="row gy-4 coffeetype-container" data-aos="fade-up" data-aos-delay="200">

        <div class="col-lg-4 col-md-6 coffeetype-item filter-app">
          <div class="coffeetype-wrap">
            <img src="home_assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
            <div class="coffeetype-info">
              <h4>App 1</h4>
              <p>App</p>
              <div class="coffeetype-links">
                <a href="home_assets/img/portfolio/portfolio-1.jpg" data-gallery="coffeetypeGallery" class="coffeetype-lightbox" title="App 1"><i class="bi bi-plus"></i></a>
                <a href="coffeetype-details.html" title="More Details"><i class="bi bi-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 coffeetype-item filter-web">
          <div class="coffeetype-wrap">
            <img src="home_assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
            <div class="coffeetype-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <div class="coffeetype-links">
                <a href="home_assets/img/portfolio/portfolio-2.jpg" data-gallery="coffeetypeGallery" class="coffeetype-lightbox" title="Web 3"><i class="bi bi-plus"></i></a>
                <a href="coffeetype-details.html" title="More Details"><i class="bi bi-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 coffeetype-item filter-app">
          <div class="coffeetype-wrap">
            <img src="home_assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
            <div class="coffeetype-info">
              <h4>App 2</h4>
              <p>App</p>
              <div class="coffeetype-links">
                <a href="home_assets/img/portfolio/portfolio-3.jpg" data-gallery="coffeetypeGallery" class="coffeetype-lightbox" title="App 2"><i class="bi bi-plus"></i></a>
                <a href="coffeetype-details.html" title="More Details"><i class="bi bi-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 coffeetype-item filter-card">
          <div class="coffeetype-wrap">
            <img src="home_assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
            <div class="coffeetype-info">
              <h4>Card 2</h4>
              <p>Card</p>
              <div class="coffeetype-links">
                <a href="home_assets/img/portfolio/portfolio-4.jpg" data-gallery="coffeetypeGallery" class="coffeetype-lightbox" title="Card 2"><i class="bi bi-plus"></i></a>
                <a href="coffeetype-details.html" title="More Details"><i class="bi bi-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 coffeetype-item filter-web">
          <div class="coffeetype-wrap">
            <img src="home_assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
            <div class="coffeetype-info">
              <h4>Web 2</h4>
              <p>Web</p>
              <div class="coffeetype-links">
                <a href="home_assets/img/portfolio/portfolio-5.jpg" data-gallery="coffeetypeGallery" class="coffeetype-lightbox" title="Web 2"><i class="bi bi-plus"></i></a>
                <a href="coffeetype-details.html" title="More Details"><i class="bi bi-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 coffeetype-item filter-app">
          <div class="coffeetype-wrap">
            <img src="home_assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
            <div class="coffeetype-info">
              <h4>App 3</h4>
              <p>App</p>
              <div class="coffeetype-links">
                <a href="home_assets/img/portfolio/portfolio-6.jpg" data-gallery="coffeetypeGallery" class="coffeetype-lightbox" title="App 3"><i class="bi bi-plus"></i></a>
                <a href="coffeetype-details.html" title="More Details"><i class="bi bi-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 coffeetype-item filter-card">
          <div class="coffeetype-wrap">
            <img src="home_assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
            <div class="coffeetype-info">
              <h4>Card 1</h4>
              <p>Card</p>
              <div class="coffeetype-links">
                <a href="home_assets/img/portfolio/portfolio-7.jpg" data-gallery="coffeetypeGallery" class="coffeetype-lightbox" title="Card 1"><i class="bi bi-plus"></i></a>
                <a href="coffeetype-details.html" title="More Details"><i class="bi bi-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 coffeetype-item filter-card">
          <div class="coffeetype-wrap">
            <img src="home_assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
            <div class="coffeetype-info">
              <h4>Card 3</h4>
              <p>Card</p>
              <div class="coffeetype-links">
                <a href="home_assets/img/portfolio/portfolio-8.jpg" data-gallery="coffeetypeGallery" class="coffeetype-lightbox" title="Card 3"><i class="bi bi-plus"></i></a>
                <a href="coffeetype-details.html" title="More Details"><i class="bi bi-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 coffeetype-item filter-web">
          <div class="coffeetype-wrap">
            <img src="home_assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
            <div class="coffeetype-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <div class="coffeetype-links">
                <a href="home_assets/img/portfolio/portfolio-9.jpg" data-gallery="coffeetypeGallery" class="coffeetype-lightbox" title="Web 3"><i class="bi bi-plus"></i></a>
                <a href="coffeetype-details.html" title="More Details"><i class="bi bi-link"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </section><!-- End coffeetype Section -->

  <!-- ======= Team Section ======= -->
  <section id="team" class="team">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Team</h2>
        <p>Our hard working team</p>
      </header>

      <div class="row gy-2 justify-content-center">

        <div class="col-lg-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
          <div class="member">
            <div class="member-img">
              <img src="home_assets/img/team/team-1.jpg" class="img-fluid" alt="">
              <div class="social">
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4>Kenneth Liem Hardadi</h4>
              <span>Web Developer</span>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
          <div class="member">
            <div class="member-img">
              <img src="home_assets/img/team/team-2.jpg" class="img-fluid" alt="">
              <div class="social">
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4>Geraldo Julius Halim</h4>
              <span>Deep Learning Engineer</span>
            </div>
          </div>
        </div>

      </div>

    </div>

  </section><!-- End Team Section -->

  <section id="sponsors" class="sponsors">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Our Sponsors</h2>
        <p>Some of the organizations involved in creating this project</p>
      </header>

      <div class="sponsors-slider swiper">
        <div class="swiper-wrapper align-items-center">
          <div class="swiper-slide"><img src="home_assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="home_assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="home_assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
        </div>
      </div>
    </div>

  </section>

  <!-- ======= F.A.Q Section ======= -->
  <section id="faq" class="faq">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>F.A.Q</h2>
        <p>Frequently Asked Questions</p>
      </header>

      <div class="row">
        <div class="col-lg-6">
          <!-- F.A.Q List 1-->
          <div class="accordion accordion-flush" id="faqlist1">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                  What is the purpose of this website?
                </button>
              </h2>
              <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                  The purpose of this website is to assist coffee enthusiasts in identifying different types of coffee beans. We provide accurate and detailed information about each type of coffee bean, including their origins, taste profiles, and brewing techniques.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                  How do I use the website?
                </button>
              </h2>
              <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                  Using our website is simple. Just navigate to the homepage and select the type of coffee bean you are interested in learning about. Our website will provide you with detailed information about the bean, including its taste profile and brewing techniques.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                  What types of coffee beans are included on the website?
                </button>
              </h2>
              <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                  Our website includes information on a wide variety of coffee beans, including Arabica, Robusta, and more. We are constantly updating and expanding our database of coffee beans, so be sure to check back often for new additions.
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="col-lg-6">

          <!-- F.A.Q List 2-->
          <div class="accordion accordion-flush" id="faqlist2">

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-1">
                  Is the information on the website accurate?
                </button>
              </h2>
              <div id="faq2-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                <div class="accordion-body">
                  Yes, we strive to provide accurate and up-to-date information about each type of coffee bean. Our team of content writers and researchers works diligently to ensure that the information provided on the website is as accurate as possible.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-2">
                  Is the website accessible on all devices?
                </button>
              </h2>
              <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                <div class="accordion-body">
                  Yes, our website is responsive and accessible on all devices, from desktop computers to mobile phones.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-3">
                  How can I provide feedback or suggestions?
                </button>
              </h2>
              <div id="faq2-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                <div class="accordion-body">
                  We welcome your feedback and suggestions! You can reach out to us through the "Contact Us" page on our website, or by sending us an email at [email protected] We value your input and will take your feedback into consideration as we continue to improve and develop our coffee bean detection website.
                </div>
              </div>
            </div>

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

        <div class="col-lg-6">

          <div class="row gy-4">
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-geo-alt"></i>
                <h3>Address</h3>
                <p>Gading Serpong,<br>Tangerang, Indonesia 535022</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-telephone"></i>
                <h3>Call Us</h3>
                <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p>hello@coffeeai.online<br>contact@coffeeai.online</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-clock"></i>
                <h3>Operational Hours</h3>
                <p>Monday - Friday<br>9:00AM - 05:00PM</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <form action="forms/contact.php" method="post" class="php-email-form">
            <div class="row gy-4">

              <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
              </div>

              <div class="col-md-6 ">
                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
              </div>

              <div class="col-md-12">
                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
              </div>

              <div class="col-md-12">
                <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
              </div>

              <div class="col-md-12 text-center">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>

                <button type="submit">Send Message</button>
              </div>

            </div>
          </form>

        </div>

      </div>

    </div>

  </section><!-- End Contact Section -->

  <?= $this->include('homepage/template/footer') ?>