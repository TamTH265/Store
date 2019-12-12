<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CÔNG TY CỔ PHẦN TM - XD HIỆP Á</title>
  <script src="https://use.fontawesome.com/375cd7e549.js"></script>
  <link rel=icon href="../../images/brand-icon.png">
  <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../styles/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../../styles/navbar.css">
  <link rel="stylesheet" href="../../styles/footer.css">
  <link rel="stylesheet" href="../../styles/index.css">
</head>
<body>
<?php require('DBConnect.php'); ?>
  <div id="banner">
    <img src="../../images/banner.jpg" alt="">
    <div>
      <span>CÔNG TY CỔ PHẦN TM - XD HIỆP Á</span>
      <span>Niềm tin và sự phát triển bền vững</span>
    </div>
  </div>
  <header>
    <div class="logo">
      <a href="index.php">
        <img src="../../images/brand-icon.png" alt="">
      </a>
    </div>
    <nav>
      <ul>
        <?php  
          $db = new DBConnect();
          $conn = $db->connect();
          
          $sql = "SELECT id, item, address FROM menu WHERE parent_item_id=0";
          $result = $conn->query($sql);
          $listParent = array();

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $listParent[] = $row;
            }
          }
          $conn->close();

          foreach($listParent as $row) {
            $db = new DBConnect();
            $conn = $db->connect();

            $sql = "SELECT id, item, address FROM menu WHERE parent_item_id=" . $row["id"];
            $result = $conn->query($sql);        
        ?>       
            <li <?php if ($result->num_rows > 0) { echo "class='sub-menu'"; }?>>
              <a href="<?php echo $row["address"]; ?>.php"><?php echo $row["item"]; ?></a>
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

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://ironwood-mfg.com/wp-content/uploads/laminate-door-lite-transom-2.jpg">
      </div>
      <div class="carousel-item">
        <img src="http://flushmetal.com/wp-content/uploads/2017/04/slide2-1.jpg" alt="">
      </div>
      <div class="carousel-item">
        <img src="https://toiletcubicleindia.com/images/projects/Nylon-toilet-cubicle/nylon-changeroom-partitions-4.jpg">
      </div>
      <div class="carousel-item">
        <img src="http://fysik.co/wp-content/uploads/2019/07/pony-wall-bathroom-shower-glass-how-to-build-a-half-traditional-with-door-flat-front-cabinets-partition-toilet-no-b.jpg">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="main-content container-fluid">
    <div class="general-introduce">
      <div class="left-section">
        <div class="left-section-inner">
          <div class="interface-left-section">
            <div class="info">
              <h3>Quan niệm</h3>
              <p> Với tôn chỉ " Xây dựng niềm tin dựa trên uy tín và chất lượng công trình", chúng tôi luôn sát cánh với
                khách hàng để
                mang tới chất lượng tốt hơn cho mỗi công trình và xây dựng mối quan hệ tốt đẹp bền vững với khách hàng.
              </p>
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="right-section">
        <div class="interface-right-section">
          <div class="info">
            <h3>Đội ngũ nhân viên</h3>
            <p> Chúng tôi xây dựng một công ty chuyên nghiệp với đội ngũ cán bộ công nhân viên giàu kinh nghiệm luôn nỗ
              lực học hỏi
              đề hoàn thiện và phát huy hết khả năng của bản thân nhằm mang lại chất lượng tốt nhất cho mỗi công trình.
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="bottom-section">
      <div class="bottom-left-icons bottom-icons">
        <span><img src="../../images/investors/investor1.jpg" alt=""></span>
        <span><img src="../../images/investors/investor2.png" alt=""></span>
        <span><img src="../../images/investors/investor3.jpg" alt=""></span>
        <span><img src="../../images/investors/investor4.jpg" alt=""></span>
        <span><img src="../../images/investors/investor5.png" alt=""></span>
      </div>
      <div class="bottom-info">
        <h1>Nhà thầu tiêu biểu</h1>
        <p> Trong những năm qua, Hiệp Á đã cung cấp và chuyển giao rất nhiều sản phẩm chất lượng cao cho những đối tác trong
            nước và ngoài nước tại Việt Nam. Với nổ lực phát trển không ngừng cùng nhiều kinh nghiệm trong lĩnh vực cung cấp 
            thi công vách ngăn vệ sinh, sàn nâng kỹ thuật, Hiệp Á đã nhận được rất nhiều sự tin tưởng của các nhà đầu tư, các 
            đơn vị tư vấn thiết kế và các nhà thầu xây dựng trong và ngoài nước như : <strong>Coteccons, Hòa Bình, Phú Hưng Gia,
            Thuận Việt, Toàn Phát Thịnh, Gia Thy, ACSC,...</strong> </p>
      </div>
      <div class="bottom-right-icons bottom-icons">
        <span><img src="../../images/investors/investor6.png" alt=""></span>
        <span><img src="../../images/investors/investor7.png" alt=""></span>
        <span><img src="../../images/investors/investor8.png" alt=""></span>
        <span><img src="../../images/investors/investor9.jpg" alt=""></span>
        <span><img src="../../images/investors/investor10.jpg" alt=""></span>
      </div>
    </div>
  </div>

  <div class="main-product-information">
    <div class="sub-product-information">
      <div class="title-product-information">
        <h1>THÔNG TIN SẢN PHẨM</h1>
      </div>
      <div class="border-product-inf">
        <div class="border-product-detail"></div>
      </div>
      <div class="detail-product-information">
      Đây là những sản phẩm điển hình để xem thêm những sản phẩm khác xin hãy bấm vào phần sản phẩm ở đầu trang
      </div>
      <div class="content-product">
        <div class="content-product-detail">
          <div class="img-product">
            <a href="http://vachnganvesinhhiepa.com/views/main-views/product-category.php?categoryId=8">
              <div class="img-pro-detail">
                <img src="http://vachnganvesinhgiare.vn/upload/product/560x420x2/471744100434.jpg" alt="">
              </div>
              <div class="img-title">
                <h3>COMPACT HPL</h3>
              </div>
            </a>
            <div class="img-content">Compact HPL còn được biết đến dưới cái tên Solid Phenolic, là tấm dạng cứng, lõi
              đặc, .
              Được phát triển dựa trên kỹ thuật làm tấm HPL truyền thống, về cơ bản Compact HPL là tấm Laminate
              (High-pressure laminate) dày với rất nhiều lớp giấy kraft Phenolic ép chồng lên nhau khiến cho Compact
              HPL
              cứng và bền hơn Laminate rất nhiều.</div>
          </div>
        </div>
        <div class="content-product-detail">
          <div class="img-product">
            <a href="http://vachnganvesinhhiepa.com/views/main-views/product-category.php?categoryId=11">
              <div class="img-pro-detail">
                <img src="http://anbinhgia.com.vn/upload/image/formica-laminate_1.jpg" alt="">
              </div>
              <div class="img-title">
                <h3>FORMAICA</h3>
              </div>
            </a>
            <div class="img-content">Tấm Laminate hay còn gọi là tấm Formica tên khoa học là High-Pressure Laminate (
              HPL) , là vật liệu bề mặt có khả năng chịu nước, chịu lửa, đa dạng về màu sắc vân hoa với nhiều tính
              năng
              ưu Việt, thường được sử dụng để trang trí bề mặt thay thế gỗ tự nhiên trong lĩnh vực thiết kế nội thất
            </div>
          </div>
        </div>
        <div class="content-product-detail">
          <div class="img-product">
            <a href="http://vachnganvesinhhiepa.com/views/main-views/product-category.php?categoryId=9">
              <div class="img-pro-detail"><img
                  src="http://anbinhgia.com.vn/upload/image/go-cong-nghiep-mfc-phu-melamine.jpg" alt=""></div>
              <div class="img-title">
                <h3>MFC</h3>
              </div>
            </a>
            <div class="img-content">MFC là từ viết tắt của Melamine Faced Chipboard. MFC là loại Ván gỗ dăm phủ nhựa
              Melamine,ề mặt hoàn thiện có thể sử dụng nhựa PVC tráng lên hoặc giấy in vân gỗ tạo vẻ đẹp sau đó tráng
              bề
              mặt hoàn thiện bảo vệ để chống ẩm và trầy xước.</div>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>

  <div class="four-picture">
    <div class="four-pic-detail">
      <div class="sub-four-pic">
        <img src="../../images/index-image-4.jpeg" alt="">
      </div>
      <div class="sub-four-pic">
          <img src="../../images/index-image-3.png" alt="">
      </div>
      <div class="sub-four-pic">
          <img src="../../images/index-image-6.jpg" alt="">
        </div>
        <div class="sub-four-pic">
          <img src="../../images/index-image-5.jpg" alt="">
      </div>
    </div>
  </div>
  <div class="main-step-by-step">
    <div class="sub-step-by-step">
      <div class="super-sub">
        <div class="element-step-by-step step-first">
          <span class="top-element"><i class="fas fa-search icon"></i></span>
          <div class="number-way">Bước 1</div>
          <div class="title-way title-1">Khảo sát</div>
          <div class="content-way">Khảo sát là bước quan trọng nhất , vì khảo sát chính xác sẽ quyết định đến giá thành
            chính xác, thi công nhanh và đẹp</div>
        </div>

        <div class="element-step-by-step step-second">
          <span class="top-element"><i class="fas fa-dollar-sign icon icon-dollar"></i></span>
          <div class="number-way">Bước 2</div>
          <div class="title-way title-2">Báo giá</div>
          <div class="content-way">Giá cả sẽ dựa vào khảo sát tai công trình và giá cả vật tư, chúng tôi sẽ gửi file
            báo giá từng hang mục cho quý khách</div>
        </div>
        <div class="element-step-by-step step-third">
          <span class="top-element"><i class="fas fa-book icon"></i></span>
          <div class="number-way">Bước 3</div>
          <div class="title-way title-3">Hợp đồng</div>
          <div class="content-way">Công ty sẽ soạn hợp đông và gửi cho khách hàng và bước này sẽ quyết định đến hình
            thức thanh toán giữa hai bên</div>
        </div>
        <div class="element-step-by-step step-fourth">
          <span class="top-element"><i class="fas fa-wrench icon"></i></span>
          <div class="number-way">Bước 4</div>
          <div class="title-way title-4">Thi công và hoàn thiện</div>
          <div class="content-way ">Với đội ngũ chuyên nghiêp có hơn 10 năm kinh nghiệm trong nghề chúng tôi cam kết
            thực hiện tốt công việc đã ký kết và đảm bảo quý khách sẽ hài lòng</div>
        </div>
        <div class="element-step-by-step step-fifth">
          <span class="top-element"><i class="far fa-thumbs-up icon"></i></span>
          <div class="number-way">Bước 5</div>
          <div class="title-way title-5">Nghiệm thu</div>
          <div class="content-way">Sau khi hoàn thành công việc tại công trình, chúng tôi sẽ cùng khách hàng khảo sát
            lại và kiểm tra tất cả hạng mục để đảm bảo chất lương tốt nhất</div>
        </div>
      </div>
    </div>
    <div class="certificate">
      <div class="certificate-detail">
        <div class="each-certificate">
          <span><i class="fas fa-search-plus icon"></i></span>
          <div class="number-certificate">1000+</div>
          <div class="content-certificate">DỰ ÁN</div>
        </div>
        <div class="each-certificate">
          <span><i class="fas fa-user icon"></i></span>
          <div class="number-certificate">1500+</div>
          <div class="content-certificate">KHÁCH HÀNG</div>
        </div>
        <div class="each-certificate">
          <span><i class="fas fa-info-circle icon"></i></span>
          <div class="number-certificate">150+</div>
          <div class="content-certificate">SẢN PHẨM</div>
        </div>
        <div class="each-certificate">
          <span><i class="fas fa-star icon"></i></span>
          <div class="number-certificate">5</div>
          <div class="content-certificate">CHẤT LƯỢNG</div>
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
  <script src="../../js/navbar.js"></script>
</body>
</body>

</html>