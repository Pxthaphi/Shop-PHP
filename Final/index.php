<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

    <link
      rel="shortcut icon"
      href="assets/compiled/svg/favicon.svg"
      type="image/x-icon"
    />
    <link
      rel="shortcut icon"
      href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC"
      type="image/png"
    />

    <link rel="stylesheet" href="assets/compiled/css/app.css" />
    <!-- <link rel="stylesheet" href="assets/compiled/css/app-dark.css" /> -->
    <link rel="stylesheet" href="assets/compiled/css/iconly.css" />
    <!-- owl -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
  </head>

  <body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="app">
      <div id="main" class="layout-horizontal">
        <header class="mb-5">
          <div class="header-top">
            <div class="container">
              <div class="logo">
                <a href="index.php"
                  ><img src="assets/compiled/svg/logo.svg" alt="Logo"
                /></a>
              </div>
              <div class="header-top-right">
                <div class="dropdown">
                  <a href="login.php" class="btn btn-primary">เข้าสู่ระบบ</a>
                </div>

                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                  <i class="bi bi-justify fs-3"></i>
                </a>
              </div>
            </div>
          </div>
          <nav class="main-navbar">
            <div class="container">
              <ul>
                <li class="menu-item">
                  <a href="index.php" class="menu-link">
                    <span><i class="bi bi-grid-fill"></i> หน้าแรก</span>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <span><i class="bi bi-life-preserver"></i> Contact</span>
                  </a>
                </li>
              </ul>
            </div>
          </nav>
        </header>

        <div class="content-wrapper container">
        <section>
            <div class="container mx-auto">
                <div class="owl-carousel owl-theme owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                    <div class="owl-stage" style="width: 5446px; transform: translate3d(-2334px, 0px, 0px); transition: all 0.25s ease 0s;">
                    <div class="owl-item cloned" style="width: 768px; margin-right: 10px;">
                        <a href="https://sciweek.sci.tsu.ac.th/" target="_blank">
                            <img src="https://sci.tsu.ac.th/private/korakot.p/Banner Ver3.jpg" alt="งานสัปดาห์วิทยาศาสตร์แห่งชาติ ส่วนภูมิภาค ประจำปี 2566">
                        </a>
                    </div>
                    <div class="owl-item cloned" style="width: 768px; margin-right: 10px;">
                        <a href="https://stdb.mhesi.go.th/" target="_blank">
                            <img src="https://sci.tsu.ac.th/files/krisda/SSIP TSU-Banner STDB-66.jpg" alt="อุทยานวิทยาศาตร์และนวัตกรรมสังคม">
                        </a>
                    </div>
                    <div class="owl-item" style="width: 768px; margin-right: 10px;">
                        <a href="https://www.facebook.com/sci.tsu" target="_blank">
                            <img src="https://sci.tsu.ac.th/private/korakot.p/Banner Web Sci47.jpg" alt="คณะวิทยาศาสตร์ มหาวิทยาลัยทักษิณ  ยินดีต้อนรับทานตะวันช่อที่ 47">
                        </a>
                    </div>                                    
                    <div class="owl-item active" style="width: 768px; margin-right: 10px;">
                        <a href="https://sciweek.sci.tsu.ac.th/" target="_blank">
                            <img src="https://sci.tsu.ac.th/private/korakot.p/Banner Ver3.jpg" alt="งานสัปดาห์วิทยาศาสตร์แห่งชาติ ส่วนภูมิภาค ประจำปี 2566">
                        </a>
                    </div>                              
                    <div class="owl-item" style="width: 768px; margin-right: 10px;">
                        <a href="https://stdb.mhesi.go.th/" target="_blank">
                            <img src="https://sci.tsu.ac.th/files/krisda/SSIP TSU-Banner STDB-66.jpg" alt="อุทยานวิทยาศาตร์และนวัตกรรมสังคม">
                        </a>
                    </div>                                
                    <div class="owl-item cloned" style="width: 768px; margin-right: 10px;">
                        <a href="https://www.facebook.com/sci.tsu" target="_blank">
                            <img src="https://sci.tsu.ac.th/private/korakot.p/Banner Web Sci47.jpg" alt="คณะวิทยาศาสตร์ มหาวิทยาลัยทักษิณ  ยินดีต้อนรับทานตะวันช่อที่ 47">
                        </a>
                    </div>
                    <div class="owl-item cloned" style="width: 768px; margin-right: 10px;">
                        <a href="https://sciweek.sci.tsu.ac.th/" target="_blank">
                            <img src="https://sci.tsu.ac.th/private/korakot.p/Banner Ver3.jpg" alt="งานสัปดาห์วิทยาศาสตร์แห่งชาติ ส่วนภูมิภาค ประจำปี 2566">
                        </a>
                    </div>
                </div>
                <div class="owl-nav disabled">
                    <button type="button" role="presentation" class="owl-prev">
                        <span aria-label="Previous">‹</span>
                    </button>
                    <button type="button" role="presentation" class="owl-next">
                        <span aria-label="Next">›</span>
                    </button>
                </div>
            </div>
            </div>
        </section>
        </div>

        <footer>
          <div class="container">
            <div class="footer clearfix mb-0 text-muted">
              <div class="float-start">
                <p>2023 &copy; Mazer</p>
              </div>
              <div class="float-end">
                <p>
                  Crafted with
                  <span class="text-danger"><i class="bi bi-heart"></i></span>
                  by <a href="https://saugi.me">Saugi</a>
                </p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- Include jQuery -->
    <script src="assets/js/jquery-3.6.0.js"></script>

    <!-- Owl Carousel script -->
    <script src="assets/js/owl.carousel.min.js"></script>

    
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                items: 1,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 3000,
            })
        });
    </script>
    <script src="assets/static/js/components/dark.js"></script>
    <script src="assets/static/js/pages/horizontal-layout.js"></script>
    <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="assets/compiled/js/app.js"></script>

    <script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="assets/static/js/pages/dashboard.js"></script>
  </body>
</html>
