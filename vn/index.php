<?php 
  include '../utilies/memberUtilies.php';

  $memberUtilies = new MemberUtilies;
  $members = $memberUtilies->indexMember();
  
if(isset($_POST['memberName']))
{
    header('Cache-Control: no-cache');
    header('Pragma: no-cache');
    header('Content-Type: text/json');
    header('Content-type: application/json');
    $memberUtilies->storeMember($_POST['memberName'], $_POST['memberNumber'], $_POST['memberNote'], $_POST['memberStatus']);
    return;
}
if(isset($_POST['type']))
{
    header('Cache-Control: no-cache');
    header('Pragma: no-cache');
    header('Content-Type: text/json');
    header('Content-type: application/json');
    $memberUtilies->removeMember($_POST['memberNumber']);
    return;
}
?>

<!DOCTYPE html>
<html lang="vn">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ABC1- Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Squadfree - v2.0.0
  * Template URL: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html"><span>Kỷ niệm-BHH-ABC1</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#header">Trang chủ</a></li>
          <li><a href="#services">Bốc số</a></li>
          <li><a href="#about">Giới Thiệu</a></li>
          <li><a href="#portfolio">Danh mục</a></li>
          <li><a href="#testimonials">Nhận xét</a></li>
          <li><a href="#team">Thành viên</a></li>
          <li><a href="#contact">Liên hệ</a></li>
          <li class="drop-down"><a href="">Ngôn ngữ</a>
            <ul>
              <li class="active"><a href="../vn/">Tiếng Việt</a></li>
              <li><a href="../" >English</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="fade-up">
      <h1>Xin chào các bạn !!! </h1>
      <h2>Rất vui khi các bạn đến để đọc những ký ức những kỷ niệm cũng như những chia sẻ của chúng tuiii!</h2>
      <a href="#about" class="btn-get-started scrollto"><i class="bx bx-chevrons-down"></i></a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Bốc số</h2>
          <p>
            Hãy chọn một người bạn đặc biệt nhé!  
          </p>
        </div>

        <button type="button" class="btn btn-primary btn-new-member">Thêm thành viên</button>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Tên</th>
              <th>Số</th>
              <th>Ghi chú</th>
              <th>Trạng thái</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($members as $key => $val ) {?>
              <tr>
                <td><?php echo $val['name']; ?></td>
                <td><?php echo $val['number']; ?></td>
                <td><?php echo $val['note']; ?></td>
                <td>
                  <a type="button" class="btn btn-success">Sẵn sàng</a>
                </td>
                <td>
                  <button type="button" class="btn btn-info btn-edit"  onclick="editMember(<?php $val['number'] ?>)">Sửa</button>
                  <button type="button" class="btn btn-danger btn-remove"  onclick="removeMember(<?php $val['number'] ?>)">Xóa</button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Đội nhóm</a></h4>
              <p class="description">Đội nhóm - nơi mà người chia sẻ cũng như người được chia sẻ phát triển rất nhiều. 
              Bạn sẽ thực sự giỏi khi bạn tự tin chia sẻ kiến thức của bạn cho người đi sau.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Đọc sách</a></h4>
              <p class="description">Đọc sách là cách tiếp thu kiến thức, là học được những điều mà tự bản thân dạy bản thân.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Phát triển bản thân</a></h4>
              <p class="description">Nếu bạn có một niềm đam mê phát triển bản thân thì thật tuyệt. Hãy vì bản thân và liên tục học hỏi bản thân nhé, sau đó vì gia đình và tất cả mọi người nữa.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Thế giới</a></h4>
              <p class="description">Nhớ là hãy luôn yêu thương mọi người, làm những điều ý nghĩa, hoà nhập với tổ quốc và thế giới.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
          <div class="content col-xl-5 d-flex align-items-stretch" data-aos="fade-up">
            <div class="content">
              <h3 class="text-center">Chia sẻ - Gắn kết<br>Hành trình - Kỉ Niệm</h3>
              <p>
                Nhằm chia sẻ những kiến thức, kinh nghiệm như lập trình, âm nhạc, kinh doanh, ngôn ngữ, sự kiện,.. , tạo các nhóm học tập, trao đổi các lĩnh vực để phát triển bản thân cũng như cộng đồng và xã hội.
                Tạo ra những hoạt động những hành trình đồng hành và sau cùng là lưu giữ lại những kỉ niệm cùng nhau...
              </p>
              <a href="#" class="about-btn">Tham gia hay có thắc mắc ?<i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
          <div class="col-xl-7 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-receipt"></i>
                  <h4>Chia sẻ</h4>
                  <p>Chia sẻ kiến thức lập trình, tổ chức sự kiện, sách hay nên đọc, âm nhạc, chụp ảnh, ngôn ngữ,.. </p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                  <i class="bx bx-shield"></i>
                  <h4>Gắn kết</h4>
                  <p>Tạo ra các câu lạc bộ học thuật, trao đổi kiến thức, làm bài tập, thực hành, giao lưu thực tế,.. </p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Hành trình</h4>
                  <p>Bên cạnh đó hay cũng nhau tổ chức những chuyến thiện nguyện, những hoạt động có ý cho xã hội hay những chuyến đi xa.. </p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class="bx bx-images"></i>
                  <h4>Kỉ niệm</h4>
                  <p>Đây cũng có thể là nơi đăng những hoạt động, hình ảnh câu lạc bộ, những hành trình cùng nhau.. 
                  </p>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts  section-bg">
      <div class="container">

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-simple-smile"></i>
              <span data-toggle="counter-up">232</span>
              <p><strong>Số người hài lòng</strong> với hoạt động của nhóm</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-document-folder"></i>
              <span data-toggle="counter-up">521</span>
              <p><strong>Dự án</strong> đang phát triển</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-live-support"></i>
              <span data-toggle="counter-up">2897</span>
              <p><strong>Thành viên hỗ trợ</strong> cho tới tời điểm hiện tại</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-users-alt-5"></i>
              <span data-toggle="counter-up">14</span>
              <p><strong>Thành viên chủ chốt</strong> luôn đồng hành cùng mọi hoạt động.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Thảo luận ngay</h3>
          <p> Trao đổi những ý tưởng những hoạt động, những dự án, những chuyến đi ngày nào!</p>
          <a class="cta-btn" href="#">Trao đổi nhgay</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Danh mục</h2>
          <p>Danh mục gì đó của hai đứa tui nè!</p>
        </div>

        <div class="row" data-aos="fade-in">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="../assets/img/portfolio/portfolio-11.jpeg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../assets/img/portfolio/portfolio-11.jpeg" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                <a href="#" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="../assets/img/portfolio/portfolio-12.jpeg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../assets/img/portfolio/portfolio-12.jpeg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
                <a href="#" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="../assets/img/portfolio/portfolio-13.jpeg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../assets/img/portfolio/portfolio-13.jpeg" data-gall="portfolioGallery" class="venobox" title="App 2"><i class="bx bx-plus"></i></a>
                <a href="#" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="../assets/img/portfolio/portfolio-14.jpeg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../assets/img/portfolio/portfolio-14.jpeg" data-gall="portfolioGallery" class="venobox" title="Card 2"><i class="bx bx-plus"></i></a>
                <a href="#" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="../assets/img/portfolio/portfolio-15.jpeg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../assets/img/portfolio/portfolio-15.jpeg" data-gall="portfolioGallery" class="venobox" title="Web 2"><i class="bx bx-plus"></i></a>
                <a href="#" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="../assets/img/portfolio/portfolio-16.jpeg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../assets/img/portfolio/portfolio-16.jpeg" data-gall="portfolioGallery" class="venobox" title="App 3"><i class="bx bx-plus"></i></a>
                <a href="#" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="../assets/img/portfolio/portfolio-17.jpeg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../assets/img/portfolio/portfolio-17.jpeg" data-gall="portfolioGallery" class="venobox" title="Card 1"><i class="bx bx-plus"></i></a>
                <a href="#" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="../assets/img/portfolio/portfolio-18.jpeg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../assets/img/portfolio/portfolio-18.jpeg" data-gall="portfolioGallery" class="venobox" title="Card 3"><i class="bx bx-plus"></i></a>
                <a href="#" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="../assets/img/portfolio/portfolio-19.jpeg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../assets/img/portfolio/portfolio-19.jpeg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
                <a href="#" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="../assets/img/portfolio/portfolio-20.jpeg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../assets/img/portfolio/portfolio-20.jpeg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
                <a href="#" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="../assets/img/portfolio/portfolio-21.jpeg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../assets/img/portfolio/portfolio-21.jpeg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
                <a href="#" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="../assets/img/portfolio/portfolio-22.jpeg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../assets/img/portfolio/portfolio-22.jpeg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
                <a href="#" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Testimonials</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="owl-carousel testimonials-carousel">

          <div class="testimonial-item" data-aos="fade-up">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="../assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
            <h3>Saul Goodman</h3>
            <h4>Ceo &amp; Founder</h4>
          </div>

          <div class="testimonial-item" data-aos="fade-up" data-aos-delay="100">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="../assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
            <h3>Sara Wilsson</h3>
            <h4>Designer</h4>
          </div>

          <div class="testimonial-item" data-aos="fade-up" data-aos-delay="200">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="../assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
            <h3>Jena Karlis</h3>
            <h4>Store Owner</h4>
          </div>

          <div class="testimonial-item" data-aos="fade-up" data-aos-delay="300">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="../assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
            <h3>Matt Brandon</h3>
            <h4>Freelancer</h4>
          </div>

          <div class="testimonial-item" data-aos="fade-up" data-aos-delay="400">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="../assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
            <h3>John Larson</h3>
            <h4>Entrepreneur</h4>
          </div>

        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="fade-up">
              <div class="pic"><img src="../assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="150">
              <div class="pic"><img src="../assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="pic"><img src="../assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>A108 Adam Street, New York, NY 535022</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>contact@example.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+1 5589 55488 55</p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-6 ">
            <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d501707.73905572796!2d106.40345095850726!3d10.765916392492452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752eefdb25d923%3A0x4bcf54ddca2b7214!2sHo%20Chi%20Minh%20City%2C%20Vietnam!5e0!3m2!1sen!2sbg!4v1584173687019!5m2!1sen!2sbg" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>

          </div>

          <div class="col-lg-6">
            <form action="../forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
        
  
  <div id="modalNewMember" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Thành viên</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <input id="memberId" type="hidden"/>
                  <div class="row mb-3">
                      <div class="col-12">
                          <label>Tên: <span class="text-danger">*</span> </label>
                          <input id="memberName" type="text" class="form-control" placeholder="Tên thành viên"/>
                          <span class="text-danger" id="memberNameError"></span>
                      </div>
                      <div class="col-6">
                          <label>Trạng thái:</label>
                            <select id="courseTypeEdit" class="custom-select">
                                <option value="1">Sẵn sàng</option>
                                <option value="2">Đã lên</option>
                                <option value="3">Vắng mặt</option>
                                <option value="4">Trường hợp khác</option>
                            </select>
                      </div>
                      <div class="col-6">
                          <label>Số: <span class="text-danger">*</span> </label>
                          <input id="memberNumber" type="number" class="form-control" min="1" max="40"/>
                          <span class="text-danger" id="memberNumberError"></span>
                      </div>
                      <div class="col-12">
                          <label>Ghi chú:</label>
                          <textarea id="memberNote" type="text" class="form-control" placeholder="Ghi chú/ mô tả!"></textarea>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary btn-save-member">Save</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info" data-aos="fade-up" data-aos-delay="50">
              <h3>Squadfree</h3>
              <p class="pb-3"><em>Qui repudiandae et eum dolores alias sed ea. Qui suscipit veniam excepturi quod.</em></p>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="150">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="250">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter" data-aos="fade-up" data-aos-delay="350">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Squadfree</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>
<script>
  $('.btn-new-member').click(function() {
      // $('#courseIdEdit').val('');
      // $('#courseNameEdit').val('');
      // $('#courseHeldDateEdit').val('');
      // $('#courseDescriptionEdit').text('');
      $('#modalNewMember').modal({
          refresh: true
      });
  });

  function checkValidate($memberName, $memberNumber){
    $('#memberNameError').text("");
    $('#memberNumberError').text("");

    if($memberName == ""){
      $('#memberNameError').text("Vui lòng điền tên");
      return false;
    }
    if($memberNumber == "")
    {
      $('#memberNumberError').text("Vui lòng điền số");
      return false;
    }
    return true;    
  }

  $('.btn-save-member').click(function() {
    $memberName = $('#memberName').val();
    $memberStatus = $('#memberStatus').val();
    $memberNumber = $('#memberNumber').val();
    $memberNote = $('#memberNote').val();
    $isValidate = checkValidate($memberName, $memberNumber);
    if($isValidate){
      $.ajax({
          url: 'index.php',
          type: 'POST',
          data: { 
              "memberName": $memberName,
              "memberStatus": $memberStatus,
              "memberNumber": $memberNumber,
              "memberNote": $memberNote,
              },
          success: function (response) {
              console.log(response);
              if(response == 'succeed'){
                  location.reload();
              }
          }
      });
    }
  });

  function removeMember($memberNumber){
    $.ajax({
          url: 'index.php',
          type: 'POST',
          data: { 
              "memberNumber": $memberNumber,
              "type": 'remove'
              },
          success: function (response) {
              console.log(response);
              if(response == 'succeed'){
                  location.reload();
              }
          }
      });
  }
  
</script>

</html>