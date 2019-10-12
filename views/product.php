<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="https://use.fontawesome.com/375cd7e549.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../styles/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/navbar.css">
  <link rel="stylesheet" href="../styles/footer.css">
  <link rel="stylesheet" href="../styles/aos.css">
  <link rel="stylesheet" href="../styles/product.css">
</head>

<body>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "StoreManager";
?>
  <div id="banner">
    <img src="../images/banner.jpg" alt="">
    <div>
      <span>CÔNG TY CỔ PHẦN TM - XD HIỆP Á</span>
      <span>Niềm tin và sự phát triển bền vững</span>
    </div>
  </div>
  <header>
    <div class="logo">
      <a href="#">
        <!-- <img src="../images/68675905_1156488254559070_6992010623911460864_n.png" alt=""> -->
      </a>
    </div>
    <nav>
      <ul>
        <?php 
          $conn = new mysqli($servername, $username, $password, $dbname);
          mysqli_set_charset($conn, 'UTF8');
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }
          
          $sql = "SELECT id, item,addresses FROM Menu WHERE parent_item_id = 0";
          $result = $conn->query($sql);
          $listParent = array();

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $listParent[] = $row;
            }
          }
          $conn->close();

          foreach($listParent as $row) {
            $conn = new mysqli($servername, $username, $password, $dbname);
            mysqli_set_charset($conn, 'UTF8');
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, item,addresses FROM Menu WHERE parent_item_id = " . $row["id"];
            $result = $conn->query($sql);        
        ?>       
            <li <?php if ($result->num_rows > 0) { echo "class='sub-menu'"; }?>>
              <a href="<?php echo $row["addresses"]; ?>.php"><?php echo $row["item"]; ?></a>
              <ul>
                <?php 
                  if ($result->num_rows > 0) { 
                    while($r = $result->fetch_assoc()) {
                ?>                 
                      <li>
                        <a href="product-category.php?categoryId=<?php echo $r["id"]; ?>">
                          <?php echo $r["item"]; ?>
                        </a>
                      </li>                  
                <?php 
                    }  
                  } 
                ?>
              </ul>
            </li>
        <?php 
            $conn->close();
          }
        ?>
      </ul>
    </nav>
    <div class="menu-toggle"><i class="fas fa-bars" aria-hidden="true"></i></div>
  </header>

  <div class="outstanding-items-section">
    <h3>
      <span class="category-title">Sản phẩm nổi bật</span>
    </h3>
    <div class="outstanding-items-container">
      <div class="slider-container">
        <span class="left-arrow"><i class="fas fa-angle-left"></i></span>
        <span class="right-arrow"><i class="fas fa-angle-right"></i></span>
        <div class="caption-holder">
          <p class="caption-text"></p>
        </div>
        <?php 
          $conn = new mysqli($servername, $username, $password, $dbname);
          mysqli_set_charset($conn, 'UTF8');
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }
          
          $sql = "SELECT id, title, imgAddress, category_id FROM products WHERE hot_item=1";
          $result = $conn->query($sql);
         
          if ($result->num_rows > 0) { 
            while($row = $result->fetch_assoc()) {
        ?>
          <div class="image-holder">
            <img src="<?php echo $row["imgAddress"]; ?>" alt="">
            <p class="caption-text"><?php echo $row["title"]; ?></p>
          </div>
        <?php 
            } 
          }
          $conn->close();      
        ?>
      </div>
      <div class="dots-container"></div>
    </div>
  </div>

  <div class="new-items-container container-fluid">
    <div class="new-items">
      <div class="item-category">
        <h3>
          <span class="category-title">
            Sản phẩm mới
          </span>
        </h3>
      </div>
      <div class="row">
        <?php 
          if (true) {
            $checkIndexAtTwoColsState = 0;
            $checkIndexAtThreeColState = 0;
            $indexAtTwoColsState = "left";
            $indexAtThreeColsState = "st";
            $i = 0;
            while($i < 6) {        
              if ($checkIndexAtTwoColsState === 0) {
                $indexAtTwoColsState = "left";
                $checkIndexAtTwoColsState = 1;
              } else {
                $indexAtTwoColsState = "right";
                $checkIndexAtTwoColsState = 0;
              }
    
              if ($checkIndexAtThreeColState === 0) {
                $indexAtThreeColsState = "st";
                $checkIndexAtThreeColState = 1;
              } else if ($checkIndexAtThreeColState === 1) {
                $indexAtThreeColsState = "nd";
                $checkIndexAtThreeColState = 2;
              } else {
                $indexAtThreeColsState = "rd";
                $checkIndexAtThreeColState = 0;
              }
        ?>
              <div class="col col-lg-4 col-md-6 col-12 <?php echo $indexAtTwoColsState;?>-col <?php echo $indexAtThreeColsState; ?>-col">
                <div class="item" data-aos="fade-up">
                  <span class="info">
                    <span class="content">Content</span>
                    <button><a href="#">Chi tiết</a></button>
                  </span>
                  <img src="../images/carousel-image-3.jpg" alt="">
                  <span class="caption">Caption text</span>
                </div>
              </div>
        <?php 
            $i++;
            }
          }
        ?>
      </div>
    </div>
    <div class="new-items">
      <div class="item-category">
        <h3>
          <span class="category-title">
            Sản phẩm bán chạy nhất
          </span>
        </h3>
      </div>
      <div class="row">
        <div class="col col-lg-4 col-md-6 col-12 col-left st-col">
          <div class="item" data-aos="fade-up">
            <span class="info">
              <span class="content">Content</span>
              <button><a href="#">Chi tiết</a></button>
            </span>
            <img src="../images/carousel-image-3.jpg" alt="">
            <span class="caption">Caption text</span>
          </div>
        </div>
        <div class="col col-lg-4 col-md-6 col-12 col-right nd-col">
          <div class="item" data-aos="fade-up">
            <span class="info">
              <span class="content">Content</span>
              <button><a href="#">Chi tiết</a></button>
            </span>
            <img src="../images/carousel-image-3.jpg" alt="">
            <span class="caption">Caption text</span>
          </div>
        </div>
        <div class="col col-lg-4 col-md-6 col-12 col-left rd-col">
          <div class="item" data-aos="fade-up">
            <span class="info">
              <span class="content">Content</span>
              <button><a href="#">Chi tiết</a></button>
            </span>
            <img src="../images/carousel-image-3.jpg" alt="">
            <span class="caption">Caption text</span>
          </div>
        </div>
        <div class="col col-lg-4 col-md-6 col-12 col-right st-col">
          <div class="item" data-aos="fade-up">
            <span class="info">
              <span class="content">Content</span>
              <button><a href="#">Chi tiết</a></button>
            </span>
            <img src="../images/carousel-image-3.jpg" alt="">
            <span class="caption">Caption text</span>
          </div>
        </div>
        <div class="col col-lg-4 col-md-6 col-12 col-left nd-col">
          <div class="item" data-aos="fade-up">
            <span class="info">
              <span class="content">Content</span>
              <button><a href="#">Chi tiết</a></button>
            </span>
            <img src="../images/carousel-image-3.jpg" alt="">
            <span class="caption">Caption text</span>
          </div>
        </div>
        <div class="col col-lg-4 col-md-6 col-12 col-right rd-col">
          <div class="item" data-aos="fade-up">
            <span class="info">
              <span class="content">Content</span>
              <button><a href="#">Chi tiết</a></button>
            </span>
            <img src="../images/carousel-image-3.jpg" alt="">
            <span class="caption">Caption text</span>
          </div>
        </div>
      </div>
    </div>
    <div class="new-items">
      <div class="item-category">
        <h3>
          <span class="category-title">
            Sản phẩm bán chạy nhất
          </span>
        </h3>
      </div>
      <div class="row">
        <div class="col col-lg-4 col-md-6 col-12 col-left st-col">
          <div class="item" data-aos="fade-up">
            <span class="info">
              <span class="content">Content</span>
              <button><a href="#">Chi tiết</a></button>
            </span>
            <img src="../images/carousel-image-3.jpg" alt="">
            <span class="caption">Caption text</span>
          </div>
        </div>
        <div class="col col-lg-4 col-md-6 col-12 col-right nd-col">
          <div class="item" data-aos="fade-up">
            <span class="info">
              <span class="content">Content</span>
              <button><a href="#">Chi tiết</a></button>
            </span>
            <img src="../images/carousel-image-3.jpg" alt="">
            <span class="caption">Caption text</span>
          </div>
        </div>
        <div class="col col-lg-4 col-md-6 col-12 col-left rd-col">
          <div class="item" data-aos="fade-up">
            <span class="info">
              <span class="content">Content</span>
              <button><a href="#">Chi tiết</a></button>
            </span>
            <img src="../images/carousel-image-3.jpg" alt="">
            <span class="caption">Caption text</span>
          </div>
        </div>
        <div class="col col-lg-4 col-md-6 col-12 col-right st-col">
          <div class="item" data-aos="fade-up">
            <span class="info">
              <span class="content">Content</span>
              <button><a href="#">Chi tiết</a></button>
            </span>
            <img src="../images/carousel-image-3.jpg" alt="">
            <span class="caption">Caption text</span>
          </div>
        </div>
        <div class="col col-lg-4 col-md-6 col-12 col-left nd-col">
          <div class="item" data-aos="fade-up">
            <span class="info">
              <span class="content">Content</span>
              <button><a href="#">Chi tiết</a></button>
            </span>
            <img src="../images/carousel-image-3.jpg" alt="">
            <span class="caption">Caption text</span>
          </div>
        </div>
        <div class="col col-lg-4 col-md-6 col-12 col-right rd-col">
          <div class="item" data-aos="fade-up">
            <span class="info">
              <span class="content">Content</span>
              <button><a href="#">Chi tiết</a></button>
            </span>
            <img src="../images/carousel-image-3.jpg" alt="">
            <span class="caption">Caption text</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer id="footer" class="container-fluid">
    <div class="row footer-interface">
      <div class="footer-left col col-lg-6 col-sm-12 col-12">
        <h3>CÔNG TY CỔ PHẦN TM - XD HIỆP Á</h3>
        <div class="info">
          <ul>
            <li>Địa chỉ: 111 Đường số 5, Phường 17, Q. Gò Vấp, TP.Hồ Chí Minh</li>
            <li>E-Mail: hiepasg2009@gmail.com</li>
            <li>ĐT: (84) 8 3984 0985 - 3984 0986</li>
            <li>Fax: (84) 8 3984 1442</li>
            <li>MST: 0309253253</li>
          </ul>
        </div>
        <div class="copy-right">
          Copyright © 2019 XDHA Inc. All rights reserved.
        </div>
      </div>

      <div class="footer-center col col-lg-2 col-sm-6 col-12">
        <div class="terms">
          <h3>HỖ TRỢ KHÁCH HÀNG</h3>
          <ul>
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="#">Sản phẩm</a></li>
            <li><a href="#">Giá sản phẩm</a></li>
            <li><a href="#">Dịch vụ</a></li>
          </ul>
        </div>
      </div>

      <div class="footer-right col col-lg-4 col-sm-6 col-12">
        <div class="links">
          <h3>Kết nối với chúng tôi</h3>
          <div class="links-container">
            <span><i class="fab fa-facebook-f"></i></span>
            <span><i class="fab fa-youtube"></i></span>
            <span><i class="fab fa-twitter"></i></span>
            <span><i class="fab fa-google-plus-g"></i></span>
          </div>
        </div>
        <div class="payment-methods">
          <h3>PHƯƠNG THỨC THANH TOÁN</h3>
          <a href="#">
            <img src="http://bizweb.dktcdn.net/100/331/067/themes/708502/assets/i_payment.png?1564801496783%22">
          </a>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/navbar.js"></script>
  <script src="../js/product.js"></script>
  <script>
    AOS.init({
      duration: 400
    })

  </script>
</body>

</html>