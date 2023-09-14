<?php
ob_start();
ob_end_flush();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome To Thread Solutions Coding Forums</title>
    <link rel="stylesheet" href="index.css">
    
</head>

<body>
    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>

    <!-- slider starts here-->

    <main class="main">
        <div class="carousel">
            <button type="button" class="carousel_btn jsPrev" aria-label="Previous slide">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" />
                </svg>
            </button>

            <div class="carousel_track-container">
                <ul class="carousel_track">
                    <li class="carousel_slide is-selected">
                        <div class="carousel_image">
                            <img src="slider1.jpg" alt="" role="presentation">
                        </div>

                    </li>
                    <li class="carousel_slide">
                        <div class="carousel_image">
                            <img src="slider2.jpg" alt="" role="presentation">
                        </div>

                    </li>
                    <li class="carousel_slide">
                        <div class="carousel_image">
                            <img src="slider3.jpg" alt="" role="presentation">
                        </div>

                    </li>
                    <li class="carousel_slide">
                        <div class="carousel_image">
                            <img src="slider4.jpg" alt="" role="presentation">
                        </div>

                    </li>
                    <li class="carousel_slide">
                        <div class="carousel_image">
                            <img src="slider5.jpg" alt="" role="presentation">
                        </div>

                    </li>

                </ul>
            </div>

            <button type="button" class="carousel_btn jsNext" aria-label="Next slide">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" />
                </svg>
            </button>
        </div>
    </main>
    <!-- partial -->
    <script src="./script.js"></script>
    <script>
        const carousel = document.querySelector('.carousel')
        const slider = carousel.querySelector('.carousel_track')
        let slides = [...slider.children]

        // Initial slides position, so user can go from first to last slide (click to the left first)
        slider.prepend(slides[slides.length - 1])

        // Creating dot for each slide
        const createDots = (carousel, initSlides) => {
            const dotsContainer = document.createElement('div')
            dotsContainer.classList.add('carousel_nav')

            initSlides.forEach((slide, index) => {
                const dot = document.createElement('button')
                dot.type = 'button'
                dot.classList.add('carousel_dot')
                dot.setAttribute('aria-label', `Slide number ${index + 1}`)
                slide.dataset.position = index
                slide.classList.contains('is-selected') && dot.classList.add('is-selected')
                dotsContainer.appendChild(dot)
            })

            carousel.appendChild(dotsContainer)

            return dotsContainer
        }

        // Updating relevant dot
        const updateDot = slide => {
            const currDot = dotNav.querySelector('.is-selected')
            const targetDot = slide.dataset.position

            currDot.classList.remove('is-selected')
            dots[targetDot].classList.add('is-selected')
        }

        // Handling arrow buttons
        const handleArrowClick = arrow => {
            arrow.addEventListener('click', () => {
                slides = [...slider.children]
                const currSlide = slider.querySelector('.is-selected')
                currSlide.classList.remove('is-selected')
                let targetSlide

                if (arrow.classList.contains('jsPrev')) {
                    targetSlide = currSlide.previousElementSibling
                    slider.prepend(slides[slides.length - 1])
                }

                if (arrow.classList.contains('jsNext')) {
                    targetSlide = currSlide.nextElementSibling
                    slider.append(slides[0])
                }

                targetSlide.classList.add('is-selected')
                updateDot(targetSlide)
            })
        }

        const buttons = carousel.querySelectorAll('.carousel_btn')
        buttons.forEach(handleArrowClick)

        // Handling dot buttons
        const handleDotClick = dot => {
            const dotIndex = dots.indexOf(dot)
            const currSlidePos = slider.querySelector('.is-selected').dataset.position
            const targetSlidePos = slider.querySelector(`[data-position='${dotIndex}']`).dataset.position

            if (currSlidePos < targetSlidePos) {
                const count = targetSlidePos - currSlidePos
                for (let i = count; i > 0; i--) nextBtn.click()
            }

            if (currSlidePos > targetSlidePos) {
                const count = currSlidePos - targetSlidePos
                for (let i = count; i > 0; i--) prevBtn.click()
            }
        }

        const dotNav = createDots(carousel, slides)
        const dots = [...dotNav.children]
        const prevBtn = buttons[0]
        const nextBtn = buttons[1]

        dotNav.addEventListener('click', e => {
            const dot = e.target.closest('button')
            if (!dot) return
            handleDotClick(dot)
        })

        // Auto sliding
        const slideTiming = 3000
        let interval
        const slideInterval = () => interval = setInterval(() => nextBtn.click(), slideTiming)

        carousel.addEventListener('mouseover', () => clearInterval(interval))
        carousel.addEventListener('mouseleave', slideInterval)
        slideInterval()
    </script>


    <!-- script endes here -->

    <!-- categories -->

    <div class="conatiner my-3 " style="width:85%;">
        <h2 class="text-center"><u>CATEGORIES </u></h2>
        <div class="row text-center">
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['category_id'];
                $cat = $row['category_name'];
                $desc = $row['category_description'];
                echo ' <div class="col-md-4 my-5 text-center">
                             <div class="card">
                                <img src="img/card' . $id . '.jpg" class="card-img-top" height="280px"  alt="loading error">
                                    <div class="card-body">
                                       <h5 class="card-title"> <a href="threadlist.php?catid=' . $id . ' ">' . $cat . '</a> </h5>
                                         <p class="card-text"> ' . substr($desc, 0, 90) . '... </p>
                                         <a href="threadlist.php?catid=' . $id . ' " class="btn btn-primary">View Threads </a>
                                    </div>
                            </div>
                        </div>';
            }
            ?>
        </div>
    </div>
    <?php include 'partials/_footer.php'; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
        </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

</body>

</html>