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
  <link rel="stylesheet" href="../styles/news.css">
  <link rel="stylesheet" href="../styles/footer.css">
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

            $sql = "SELECT item,addresses FROM Menu WHERE parent_item_id = " . $row["id"];
            $result = $conn->query($sql);        
        ?>       
            <li <?php if ($result->num_rows > 0) { echo "class='sub-menu'"; }?>>
              <a href="<?php echo  $row["addresses"];?>.php"><?php echo $row["item"]; ?></a>
              <ul>
                <?php 
                  if ($result->num_rows > 0) { 
                    while($r = $result->fetch_assoc()) {
                ?>                 
                      <li>
                        <a href="<?php echo  $r["addresses"];?>.php">
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
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <div class="panel panel-default">
          <div class="panel-heading-down">TIN TỨC MỚI</div>
          <div class="panel-body panel-body-left">

            <div class="media media-bottom">
              <div class="media-img">
                <a href="news-detail.html"><img src="../images/carousel-image-4.jpg" class="align-self-start mr-3"
                    alt="..."></a>
              </div>
              <div class="media-body">
                <a href="news-detail.html" class="media-body-link">
                  <h5 class="mt-0">PHÂN BIỆT TẤM COMPACT HPL VỚI GỖ MFC</h5>
                </a>
                <p class="news-date">Ngày đăng 18/8/2019 12:30</p>
                <p class="news-content">Tấm Compact HPL và gỗ MFC đều là những vật liệu tốt trong thiết kế và chế tạo
                  các sản phẩm nội thất. Đặc biệt 2 vật liệu này có nhiều điểm tương đồng với nhau, bài viết sẽ giúp các
                  bạn phân biệt giữa tấm Compact và gỗ MFC.
                </p>
              </div>
            </div>
            <div class="media media-bottom">
              <div class="media-img">
                <a href="news-detail.html"><img src="../images/carousel-image-4.jpg" class="align-self-start mr-3"
                    alt="..."></a>
              </div>
              <div class="media-body">
                <a href="news-detail.html" class="media-body-link">
                  <h5 class="mt-0">PHÂN BIỆT TẤM COMPACT HPL VỚI GỖ MFC</h5>
                </a>
                <p class="news-date">Ngày đăng 18/8/2019 12:30</p>
                <p class="news-content">Tấm Compact HPL và gỗ MFC đều là những vật liệu tốt trong thiết kế và chế tạo
                  các sản phẩm nội thất. Đặc biệt 2 vật liệu này có nhiều điểm tương đồng với nhau, bài viết sẽ giúp các
                  bạn phân biệt giữa tấm Compact và gỗ MFC.
                </p>
              </div>
            </div>
            <div class="media media-bottom">
              <div class="media-img">
                <a href="news-detail.html"><img src="../images/carousel-image-4.jpg" class="align-self-start mr-3"
                    alt="..."></a>
              </div>
              <div class="media-body">
                <a href="news-detail.html" class="media-body-link">
                  <h5 class="mt-0">PHÂN BIỆT TẤM COMPACT HPL VỚI GỖ MFC</h5>
                </a>
                <p class="news-date">Ngày đăng 18/8/2019 12:30</p>
                <p class="news-content">Tấm Compact HPL và gỗ MFC đều là những vật liệu tốt trong thiết kế và chế tạo
                  các sản phẩm nội thất. Đặc biệt 2 vật liệu này có nhiều điểm tương đồng với nhau, bài viết sẽ giúp các
                  bạn phân biệt giữa tấm Compact và gỗ MFC.
                </p>
              </div>
            </div>
            <div class="media">
              <div class="media-img">
                <a href="news-detail.html"><img src="../images/carousel-image-4.jpg" class="align-self-start mr-3"
                    alt="..."></a>
              </div>
              <div class="media-body">
                <a href="news-detail.html" class="media-body-link">
                  <h5 class="mt-0">PHÂN BIỆT TẤM COMPACT HPL VỚI GỖ MFC</h5>
                </a>
                <p class="news-date">Ngày đăng 18/8/2019 12:30</p>
                <p class="news-content">Tấm Compact HPL và gỗ MFC đều là những vật liệu tốt trong thiết kế và chế tạo
                  các sản phẩm nội thất. Đặc biệt 2 vật liệu này có nhiều điểm tương đồng với nhau, bài viết sẽ giúp các
                  bạn phân biệt giữa tấm Compact và gỗ MFC.
                </p>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6 navigation">
            <nav id="bottom-news">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="panel panel-right-top">
          <div class="panel-heading">CHỦ ĐỀ</div>
          <div class="panel-body panel-link-div">
            <span><i class="fas fa-angle-right"></i></span>
            <a href="#" class="panel-link">Phần nội dung </a>
          </div>
          <div class="panel-body panel-link-div">
            <span><i class="fas fa-angle-right"></i></span>
            <a href="#" class="panel-link">Phần nội dung </a>
          </div>
          <div class="panel-body panel-link-div">
            <span><i class="fas fa-angle-right"></i></span>
            <a href="#" class="panel-link">Phần nội dung </a>
          </div>
        </div>

        <div class="panel panel-right-down">
          <div class="panel-shock">TIN NỔI BẬT</div>

          <div class="shock-news shock-news-bottom">
            <div class="media-img">
              <a href="news-detail.html"><img src="../images/carousel-image-4.jpg" class="align-self-start mr-3"
                  alt="..."></a>
            </div>
            <a href="news-detail.html" class="shock-news-title">PHÂN BIỆT TẤM COMPACT HPL VỚI GỖ MFC</a>
          </div>

          <div class="shock-news shock-news-bottom">
            <div class="media-img">
              <a href="news-detail.html"><img src="../images/carousel-image-4.jpg" class="align-self-start mr-3"
                  alt="..."></a>
            </div>
            <a href="news-detail.html" class="shock-news-title">PHÂN BIỆT TẤM COMPACT HPL VỚI GỖ MFC</a>
          </div>

          <div class="shock-news">
            <div class="media-img">
              <a href="news-detail.html"><img src="../images/carousel-image-4.jpg" class="align-self-start mr-3"
                  alt="..."></a>
            </div>
            <a href="news-detail.html" class="shock-news-title">PHÂN BIỆT TẤM COMPACT HPL VỚI GỖ MFC</a>
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
  <script src="../js/navbar.js"></script>
</body>

</html>