<!DOCTYPE html>
<html>
<div class="content">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="intro-y text-lg font-medium mt-10">

            <head>
                <title>About Us</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="<?= site_url('asset') ?>/admin/dist/css/style.css" />
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


            </head>

            <body>
                <header id="full">
                    <div class="abs-back"></div>
                    <div class="wel">
                        <div class="wel-info">

                            <h1>Selamat Datang Di Toko Online Halal Mart Cikarang </h1>
                            <span class="brk"></span>
                            <p>Produk Halal Berkualitas, dan terjamin keasliannya Kini Hanya di Toko Online Kami!</p>

                        </div>
                    </div>
                </header>
                <marquee bgcolor="#87CEFA" behavior="scroll">Dapatkan produk yang terjamin halal, murah, dan terbaik dari kami</marquee>
                <br><br>

                <div class="wrapper">
                    <h2>
                        <center><b>IT'S OUR TEAM</b></center>
                    </h2>
                    <i id="left" class="fa-solid fa-angle-left"></i>
                    <ul class="carousel">
                        <li class="card">
                            <div class="img"><img src="<?= site_url('asset') ?>/admin/src/images/heru.jpg"></div>
                            <h2>Mochamad Heru</h2>
                            <span>Frontend Developer</span>
                        </li>
                        <li class="card">
                            <div class="img"><img src="<?= site_url('asset') ?>/admin/src/images/jenal.jpg" alt="img" draggable="false"></div>
                            <h2>Zaenal Mustofa</h2>
                            <span>Backend Developer</span>
                        </li>
                        <li class="card">
                            <div class="img"><img src="<?= site_url('asset') ?>/admin/src/images/eksa.jpg" alt="img" draggable="false"></div>
                            <h2>Eksa Rama Distyra</h2>
                            <span>UI/UX Designer</span>
                        </li>
                        <li class="card">
                            <div class="img"><img src="<?= site_url('asset') ?>/admin/src/images/arya.jpg" alt="img" draggable="false"></div>
                            <h2>Aryawiratanu</h2>
                            <span>Database Administrator</span>
                        </li>
                    </ul>
                    <i id="right" class="fa-solid fa-angle-right"></i>
                </div>
                <br>
                <div class="about-us-container">
                    <div class="contact-company">

                        <h2>Contact Company</h2>

                        <ul type="circle">
                            <li>Alamat : Villa Mutiara Cikarang 2 Blok E1 No 3, Ds. Sukasejati, Kec. Cikarang Selatan, Kab. Bekasi</li>
                            <li>Email : bc.cikarang3@gmail.com</li>
                            <li>No. Telp : 0812-9701-1721</li>
                        </ul>
                    </div>
                    <div class="maps">
                        <!-- Embed your maps code or API here -->
                        <!-- Example: <iframe src="https://maps.example.com/your_map_embed_code"></iframe> -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126899.4742451833!2d107.07186024294954!3d-6.315039521705676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699b4902bfedb1%3A0xe0c663371078ab22!2sJababeka%20Golf%20%26%20Country%20Club!5e0!3m2!1sid!2sid!4v1687058909483!5m2!1sid!2sid" width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <script>
                    const wrapper = document.querySelector(".wrapper");
                    const carousel = document.querySelector(".carousel");
                    const firstCardWidth = carousel.querySelector(".card").offsetWidth;
                    const arrowBtns = document.querySelectorAll(".wrapper i");
                    const carouselChildrens = [...carousel.children];

                    let isDragging = false,
                        isAutoPlay = true,
                        startX, startScrollLeft, timeoutId;

                    // Get the number of cards that can fit in the carousel at once
                    let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

                    // Insert copies of the last few cards to beginning of carousel for infinite scrolling
                    carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
                        carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
                    });

                    // Insert copies of the first few cards to end of carousel for infinite scrolling
                    carouselChildrens.slice(0, cardPerView).forEach(card => {
                        carousel.insertAdjacentHTML("beforeend", card.outerHTML);
                    });

                    // Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
                    carousel.classList.add("no-transition");
                    carousel.scrollLeft = carousel.offsetWidth;
                    carousel.classList.remove("no-transition");

                    // Add event listeners for the arrow buttons to scroll the carousel left and right
                    arrowBtns.forEach(btn => {
                        btn.addEventListener("click", () => {
                            carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
                        });
                    });

                    const dragStart = (e) => {
                        isDragging = true;
                        carousel.classList.add("dragging");
                        // Records the initial cursor and scroll position of the carousel
                        startX = e.pageX;
                        startScrollLeft = carousel.scrollLeft;
                    }

                    const dragging = (e) => {
                        if (!isDragging) return; // if isDragging is false return from here
                        // Updates the scroll position of the carousel based on the cursor movement
                        carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
                    }

                    const dragStop = () => {
                        isDragging = false;
                        carousel.classList.remove("dragging");
                    }

                    const infiniteScroll = () => {
                        // If the carousel is at the beginning, scroll to the end
                        if (carousel.scrollLeft === 0) {
                            carousel.classList.add("no-transition");
                            carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
                            carousel.classList.remove("no-transition");
                        }
                        // If the carousel is at the end, scroll to the beginning
                        else if (Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth) {
                            carousel.classList.add("no-transition");
                            carousel.scrollLeft = carousel.offsetWidth;
                            carousel.classList.remove("no-transition");
                        }

                        // Clear existing timeout & start autoplay if mouse is not hovering over carousel
                        clearTimeout(timeoutId);
                        if (!wrapper.matches(":hover")) autoPlay();
                    }

                    const autoPlay = () => {
                        if (window.innerWidth < 800 || !isAutoPlay) return; // Return if window is smaller than 800 or isAutoPlay is false // Autoplay the carousel after every 2500 ms timeoutId=setTimeout(()=> carousel.scrollLeft += firstCardWidth, 2500);
                    }
                    autoPlay();
                    wrapper.addEventListener("mouseleave", autoPlay);
                    carousel.addEventListener("mousedown", dragStart);
                    carousel.addEventListener("mousemove", dragging);
                    document.addEventListener("mouseup", dragStop);
                    carousel.addEventListener("scroll", infiniteScroll);
                    wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
                </script>
            </body>

</html>