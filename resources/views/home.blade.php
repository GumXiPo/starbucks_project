@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Sử dụng Vite để liên kết các file CSS và JavaScript trong resources -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Liên kết CSS và JavaScript từ thư mục public nếu cần -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Liên kết Swiper CSS từ CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body>
    <!-- Include header -->
    @include('layouts.header')

    <!-- Main content -->
    <main>
        <section class="carousel next">
            <div class="list">
                <article class="item other_1">
                    <div class="main-content" 
                    style="background-color: #B17457;">
                        <div class="content">
                            <h2>Caffe Latte, a new product</h2>
                            <p class="price">$ 20</p>
                            <p class="description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores labore animi voluptatibus sequi illo, earum molestias explicabo officiis iste neque? Quis quod eligendi fugit, dolore nam itaque modi exercitationem voluptatem corrupti aut aspernatur. Quos non in sed ratione tenetur harum.
                            </p>
                            <button class="addToCard">
                                Add To Card
                            </button>
                        </div>
                    </div>
                    <figure class="image">
                    <img src="{{ asset('images/1.png') }}" alt="">
                        <figcaption>Caffe Latte, a new product</figcaption>
                    </figure>
                </article>
                <article class="item active">
                    <div class="main-content" 
                    style="background-color: #f5bfaf;">
                        <div class="content">
                            <h2>Strawberry mocha, a new product</h2>
                            <p class="price">$ 20</p>
                            <p class="description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores labore animi voluptatibus sequi illo, earum molestias explicabo officiis iste neque? Quis quod eligendi fugit, dolore nam itaque modi exercitationem voluptatem corrupti aut aspernatur. Quos non in sed ratione tenetur harum.
                            </p>
                            <button class="addToCard">
                                Add To Card
                            </button>
                        </div>
                    </div>
                    <figure class="image">
                    <img src="{{ asset('images/2.png') }}" alt="">

                        <figcaption>Strawberry mocha, a new product</figcaption>
                    </figure>
                </article>
                <article class="item other_2">
                    <div class="main-content" 
                    style="background-color: #dedfe1;">
                        <div class="content">
                            <h2>Doppio espresso, a new product</h2>
                            <p class="price">$ 20</p>
                            <p class="description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores labore animi voluptatibus sequi illo, earum molestias explicabo officiis iste neque? Quis quod eligendi fugit, dolore nam itaque modi exercitationem voluptatem corrupti aut aspernatur. Quos non in sed ratione tenetur harum.
                            </p>
                            <button class="addToCard">
                                Add To Card
                            </button>
                        </div>
                    </div>
                    <figure class="image">
                    <img src="{{ asset('images/3.png') }}" alt="">
                        <figcaption>Doppio espresso, a new product</figcaption>
                    </figure>
                </article>
                <article class="item">
                    <div class="main-content" 
                    style="background-color: #7eb63d;">
                        <div class="content">
                            <h2>Matcha latte macchiato, a new product</h2>
                            <p class="price">$ 20</p>
                            <p class="description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores labore animi voluptatibus sequi illo, earum molestias explicabo officiis iste neque? Quis quod eligendi fugit, dolore nam itaque modi exercitationem voluptatem corrupti aut aspernatur. Quos non in sed ratione tenetur harum.
                            </p>
                            <button class="addToCard">
                                Add To Card
                            </button>
                        </div>
                    </div>
                    <figure class="image">
                    <img src="{{ asset('images/4.png') }}" alt="">

                        <figcaption>Matcha latte macchiato, a new product</figcaption>
                    </figure>
                </article>
            </div>
            <div class="arrows">
                <button id="prev"><</button>
                <button id="next">></button>
            </div>
        </section>
      
      <!-- About section -->
      <section class="about-section" id="about">
        <div class="section-content">
          <div class="about-image-wrapper">
            <img src="{{ asset('images/about.png') }}" alt="About" class="about-image">
          </div>
          <div class="about-details">
            <h2 class="section-title">About Us</h2>
            <p class="text">At Coffee House in Berndorf, Germany, we pride ourselves on being a go-to destination for coffee lovers and conversation seekers alike. We're dedicated to providing an exceptional coffee experience in a cozy and inviting atmosphere, where guests can relax, unwind, and enjoy their time in comfort.</p>
            <div class="social-link-list">
              <a href="#" class="social-link"><i class="fa-brands fa-facebook"></i></a>
              <a href="#" class="social-link"><i class="fa-brands fa-instagram"></i></a>
              <a href="#" class="social-link"><i class="fa-brands fa-x-twitter"></i></a>
            </div>
          </div>
        </div>
      </section>
      <!-- Menu section -->
      <section class="menu-section" id="menu">
        <h2 class="section-title">Our Menu</h2>
        <div class="section-content">
          <ul class="menu-list">
            <li class="menu-item">
              <img src="{{ asset('images/menu-1.png') }}" alt="Hot Beverages" class="menu-image" />
              <div class="menu-details">
                <h3 class="name">Hazelnut Macchiato</h3>
                <p class="text">Wide range of Steaming hot coffee to make you fresh and light.</p>
              </div>
            </li>
            <li class="menu-item">
              <img src="{{ asset('images/menu-2.png') }}" alt="Cold Beverages" class="menu-image" />
              <div class="menu-details">
                <h3 class="name">Iced Matcha Latte</h3>
                <p class="text">Creamy and frothy cold coffee to make you cool.</p>
              </div>
            </li>
            <li class="menu-item">
              <img src="{{ asset('images/menu-3.png') }}" alt="Refreshment" class="menu-image" />
              <div class="menu-details">
                <h3 class="name">Java Chip Frappuccino®</h3>
                <p class="text">Fruit and icy refreshing drink to make feel refresh.</p>
              </div>
            </li>
            <li class="menu-item">
              <img src="{{ asset('images/menu-4.png') }}" alt="Special Combos" class="menu-image" />
              <div class="menu-details">
                <h3 class="name">Blended Strawberry Lemonade</h3>
                <p class="text">Your favorite eating and drinking combations.</p>
              </div>
            </li>
            <li class="menu-item">
              <img src="{{ asset('images/menu-5.png') }}" alt="Dessert" class="menu-image" />
              <div class="menu-details">
                <h3 class="name">Chocolate Cream Cold Brew</h3>
                <p class="text">Satiate your palate and take you on a culinary treat.</p>
              </div>
            </li>
            <li class="menu-item">
              <img src="{{ asset('images/menu-6.png') }}" alt="burger & French Fries" class="menu-image" />
              <div class="menu-details">
                <h3 class="name">Chocolate Cream Cold Brew</h3>
                <p class="text">Quick bites to satisfy your small size hunger.</p>
              </div>
            </li>
          </ul>
        </div>
      </section>
      <!-- Testimonials section -->
        <section class="testimonials-section" id="testimonials">
            <h2 class="section-title">Testimonials</h2>
            <div class="section-content">
                <div class="slider-container swiper">
                    <div class="slider-wrapper">
                        <ul class="testimonials-list swiper-wrapper">
                            <li class="testimonial swiper-slide">
                                <img src="{{ asset('images/ceo-1.jpg') }}" alt="Sarah Johnson" class="user-image" />
                                <h3 class="name">Sarah Johnson</h3>
                                <i class="feedback">"Loved the French roast. Perfectly balanced and rich. Will order again!"</i>
                            </li>
                            <li class="testimonial swiper-slide">
                                <img src="{{ asset('images/ceo-2.jpg') }}" alt="James Wilson" class="user-image" />
                                <h3 class="name">James Wilson</h3>
                                <i class="feedback">"Great espresso blend! Smooth and bold flavor. Fast shipping too!"</i>
                            </li>
                            <li class="testimonial swiper-slide">
                                <img src="{{ asset('images/ceo-3.jpg') }}" alt="Michael Brown" class="user-image" />
                                <h3 class="name">Michael Brown</h3>
                                <i class="feedback">"Fantastic mocha flavor. Fresh and aromatic. Quick shipping!"</i>
                            </li>
                            <li class="testimonial swiper-slide">
                                <img src="{{ asset('images/ceo-4.jpg') }}" alt="Emily Harris" class="user-image" />
                                <h3 class="name">Emily Harris</h3>
                                <i class="feedback">"Excellent quality! Fresh beans and quick delivery. Highly recommend."</i>
                            </li>
                            <li class="testimonial swiper-slide">
                                <img src="{{ asset('images/ceo-5.jpg') }}" alt="Anthony Thompson" class="user-image" />
                                <h3 class="name">Anthony Thompson</h3>
                                <i class="feedback">"Best decaf I've tried! Smooth and flavorful. Arrived promptly."</i>
                            </li>
                        </ul>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </section>
      <!-- Gallery section -->
      <section class="gallery-section" id="gallery">
        <h2 class="section-title">Gallery</h2>
        <div class="section-content">
          <ul class="gallery-list">
            <li class="gallery-item">
              <img src="{{ asset('images/Gallery-1.jpg') }}" alt="Gallery Image" class="gallery-image" />
            </li>
            <li class="gallery-item">
              <img src="{{ asset('images/Gallery-2.jpg') }}" alt="Gallery Image" class="gallery-image" />
            </li>
            <li class="gallery-item">
              <img src="{{ asset('images/Gallery-3.jpg') }}" alt="Gallery Image" class="gallery-image" />
            </li>
            <li class="gallery-item">
              <img src="{{ asset('images/Gallery-4.jpg') }}" alt="Gallery Image" class="gallery-image" />
            </li>
            <li class="gallery-item">
              <img src="{{ asset('images/Gallery-5.jpg') }}" alt="Gallery Image" class="gallery-image" />
            </li>
            <li class="gallery-item">
              <img src="{{ asset('images/Gallery-6.jpg') }}" alt="Gallery Image" class="gallery-image" />
            </li>
          </ul>
        </div>
      </section>
      <!-- Contact section -->
      <section class="contact-section" id="contact">
        <h2 class="section-title">Contact Us</h2>
        <div class="section-content">
          <ul class="contact-info-list">
            <li class="contact-info">
              <i class="fa-solid fa-location-crosshairs"></i>
              <p>123 Campsite Avenue, Wilderness, CA 98765</p>
            </li>
            <li class="contact-info">
              <i class="fa-regular fa-envelope"></i>
              <p>info@coffeeshopwebsite.com</p>
            </li>
            <li class="contact-info">
              <i class="fa-solid fa-phone"></i>
              <p>(123) 456-78909</p>
            </li>
            <li class="contact-info">
              <i class="fa-regular fa-clock"></i>
              <p>Monday - Friday: 9:00 AM - 5:00 PM</p>
            </li>
            <li class="contact-info">
              <i class="fa-regular fa-clock"></i>
              <p>Saturday: 10:00 AM - 3:00 PM</p>
            </li>
            <li class="contact-info">
              <i class="fa-regular fa-clock"></i>
              <p>Sunday: Closed</p>
            </li>
            <li class="contact-info">
              <i class="fa-solid fa-globe"></i>
              <p>www.codingnepalweb.com</p>
            </li>
          </ul>
          <form action="#" class="contact-form">
            <input type="text" placeholder="Your name" class="form-input" required />
            <input type="email" placeholder="Your email" class="form-input" required />
            <textarea placeholder="Your message" class="form-input" required></textarea>
            <button type="submit" class="button submit-button">Submit</button>
          </form>
        </div>
      </section>
      <!-- Footer section -->
      <footer class="footer-section">
        <div class="section-content">
          <p class="copyright-text">© 2024 Coffee Shop</p>
          <div class="social-link-list">
            <a href="#" class="social-link"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" class="social-link"><i class="fa-brands fa-instagram"></i></a>
            <a href="#" class="social-link"><i class="fa-brands fa-x-twitter"></i></a>
          </div>
          <p class="policy-text">
            <a href="#" class="policy-link">Privacy policy</a>
            <span class="separator">•</span>
            <a href="#" class="policy-link">Refund policy</a>
          </p>
        </div>
      </footer>
</main>
    <!-- Linking Swiper script -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
