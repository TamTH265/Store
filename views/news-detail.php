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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/news-detail.css">
  <link rel="stylesheet" href="../styles/navbar.css">
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

  <!-- ----------------------content---------------------- -->

  <div class="container">
    <div class="row">
      <div class="row-top col-lg-9">
        <div class="title">
          <h5>PHÂN BIỆT TẤM COMPACT HPL VỚI GỖ MFC</h5>

        </div>
        <div class="content">
          <p>
            Tấm Compact HPL và gỗ MFC đều có nguồn gốc từ bột gỗ nên có rất nhiều điểm tương đồng mà chỉ nhìn vào thì
            khó
            phân biệt được đâu là tấm Compact HPL đâu là gỗ MFC. Phải nói rằng, đây đều là các vật liệu tốt cho các sản
            phẩm
            nội thất nhưng tấm Compact HPL vẫn có những điểm nổi trội hơn hẳn so với gỗ MFC. Sau đây là một số điểm giúp
            phân biệt tấm Compact HPL và gỗ MFC
          </p>
          <h6>1. Gỗ MFC</h6>
          <p>Gỗ MFC là ván gỗ phủ nhựa Melamine, có 2 loại: gỗ MFC thường và gỗ MFC chống ẩm. </p>
          <p>Gỗ MFC chống ẩm có lõi gỗ chứa hạt xanh chống ẩm, thường gọi là gỗ MFC lõi xanh chống ẩm.</p>
          <p>Gỗ MFC đa dạng về chất liệu gỗ: Oak, Ash, Maple, Acacia, Teak, Walnut,… với rất nhiều màu sắc phong phú.
          </p>
          <p>Gỗ MFC có khả năng chống ẩm không có khả năng chống nước hoàn toàn chính vì thế sản phẩm thường phù hợp với
            những nơi khô ráo, không thể sử dụng sản phẩm cạnh nhà vệ sinh chẳng hạn.</p>
          <p>Gỗ MFC lõi xanh chống ẩm có thể sử dụng cho các sản phẩm khu vực ẩm ướt như bếp, toilet, khu vệ sinh,…MFC
            sử
            dụng đều là các loại có xuất xứ từ Malaysia (hãng MIECO) và Đức (hãng EGGER), một số của Việt Nam hay Trung
            Quốc.</p>
          <p>Các loại ván MFC có đặc điểm là Cứng, nặng, màu sắc họa tiết sắc nét tươi tắn, chịu ẩm tốt, chống trầy,
            chống
            cháy.</p>
          <h6>2. Tấm Compact</h6>
          <p>Tấm Compact là loại sản phẩm lõi đặc, lõi được tạo thành từ nhiều lớp giấy cao cấp kraft kết hợp với hợp
            chất
            phenolie không thấm nước , bề mặt tấm là lớp giấy trang trí được xử lí qua hợp chất hữu cơ Melamine (chống
            trầy
            xước ) và được tạo thành bởi lực ép nhiệt độ áp suất 70kg/cm2 và 1430psi(150C) .</p>
          <p>Tấm Compact đa dạng về màu sắc, vân gỗ, hoa văn…</p>
          <p>Tấm Compact có độ cứng, độ bền trong môi trường oxy hoá cao và ẩm ướt. Chịu nước hoàn toàn 100% ngâm trong
            nước
            không có hiện tượng nở hoặc bị thấm nước, có thể dùng cho nhà vệ sinh kết hợp phòng tắm.
            Không cháy ở nhiệt độ 80 độ C. Chống các nấm mốc và vi khuẩn ăn bám nên an toàn cho sức khỏe giúp bề mặt
            luôn
            sáng đẹp giữ được màu sắc.</p>
          <p>Dễ lau chùi và vệ sinh bằng các chất liệu làm sạch trong nhà vệ sinh, mà không sợ ảnh hưởng đến sản phẩm
            theo
            thời gian. Tạo không gian vệ sinh hiện đại, thẩm mỹ cao.</p>
          <p>Độ bền của tấm Vách vệ sinh Compact có độ bền cao gấp 10 lần so với sản phẩm MFC lõi xanh chịu ẩm có nguồn
            gốc
            Malaysia.</p>
        </div>
      </div>
      <div class="row-down col-lg-3">
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
          <div class="panel-heading-down">TIN NỔI BẬT</div>

          <div class="shock-news shock-news-bottom">
            <div class="media-img">
              <a href="#"><img src="../images/vach-ngan-go-03-1416997933_140x95.jpg" class="align-self-start mr-3" alt="..."></a>
            </div>
            <a href="#" class="shock-news-title">PHÂN BIỆT TẤM COMPACT HPL VỚI GỖ MFC</a>
          </div>

          <div class="shock-news shock-news-bottom">
            <div class="media-img">
              <a href="#"><img src="../images/vach-ngan-go-03-1416997933_140x95.jpg" class="align-self-start mr-3" alt="..."></a>
            </div>
            <a href="#" class="shock-news-title">PHÂN BIỆT TẤM COMPACT HPL VỚI GỖ MFC</a>
          </div>

          <div class="shock-news">
            <div class="media-img">
              <a href="#"><img src="../images/vach-ngan-go-03-1416997933_140x95.jpg" class="align-self-start mr-3" alt="..."></a>
            </div>
            <a href="#" class="shock-news-title">PHÂN BIỆT TẤM COMPACT HPL VỚI GỖ MFC</a>
          </div>

        </div>
      </div>
    </div>

  </div>
  <!-- --------------------------END------------------ -->
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




  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="../js/navbar.js"></script>
</body>

</html>
