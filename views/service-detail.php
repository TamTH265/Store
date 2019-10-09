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
  <link rel="stylesheet" href="../styles/service-detail.css">
</head>

<body>
  <!-- -------------Navbar------------- -->
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
  <!-- ------------detail--------------- -->
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="title">
          <h5>Thi công vách ngăn nhà vệ sinh</h5>
        </div>
        <div class="content">
          <h5>Hiện nay, chúng tôi cung cấp và thi công các loại vách ngăn vệ sinh:</h5>
          <p>+ Vách ngăn chống ẩm cao cấp chất liệu gỗ MFC : Cốt xanh có tác dụng hút ẩm ,bề mặt phủ Melamine, chống
            nước , chống va đập, chống xước, chịu ăn mòn hóa chất cao, chống nầm mốc và không bị vi khuẩn bám tạo bề mặt
            luôn tươi mới.Độ dày của vách là 18mm được bọc bởi hệ thống khung nhôm định hình nhập khẩu và phụ kiện Inox
            không rỉ đảm bảo tuổi thọ sản phẩm trong điều kiện môi trường khắc nghiệt nhất, có nhiều màu sắc tùy chọn.
          </p>
          <p>+ Vách ngăn bằng nhựa cứng Compact HCL: Thành phần gồm nhựa tổng hợp và bột đá có tác dụng chịu nước tuyệt
            đối bể mặt phủ lớp nhựa có tác dụng chống va đập,cong vênh ,chầy xướt cao, có các loại độ dày 12, 15, 18mm,
            tấm và phụ kiện được nhập khẩu đồng bộ tại Trung Quốc.</p>
          <ul>
            <li>
              <span><i class="fas fa-angle-double-right"></i></span>
              <p>Tấm Compact HPL là tấm dạng cứng lõi đặc được tạo thành từ nhiều lớp phenolic ép nén dưới
                nhiệt độ cao
                1430 psi 150 C. Sản phẩm được nghiên cứu và sản xuất trên dây truyền công nghệ theo tiêu chuẩn của Mỹ
              </p>
            </li>
            <li>
              <span><i class="fas fa-angle-double-right"></i></span>
              <p>Các lớp phenolic duy nhất được nén bởi nhiệt và sức ép cao, kết hợp với hỗn hợp nhựa tổng
                hợp, bề mặt phủ
                một lớp Melamine nên chống trầy xước và bám bẩn. Có nhiều màu để lựa chọn : kem, ghi, xanh, hồng, vân
                gỗ….
              </p>
            </li>
            <li>
              <span><i class="fas fa-angle-double-right"></i></span>
              <p>
                Đặc tính nổi bật của loại chất liện này là độ cứng, độ bền trong môi trường oxy hóa cao và
                ẩm ướt chịu
                nước 100%, chống các nấm mốc và vi khuẩn ăn bám nên an toàn cho sức khỏe, dễ lau chùi vệ sinh bằng các
                chất
                làm sạch trong nhà vệ sinh. Độ dầy 12mm, kích thước khổ tấm (mm): 1220×1830; 1530×1830; 1830×2440;
                1830×3660. Sản phẩm này vượt trội so với các sản phẩm khác về độ bền và tính thẩm mỹ
              </p>
            </li>
          </ul>
          <h5>Phụ kiện đồng bộ :</h5>
          <ul>
            <li>
              <span><i class="fas fa-award"></i></span>
              <p>– Khóa, tay nắm, bản lề, ốc vít…</p>
            </li>
            <li>
              <span><i class="fas fa-award"></i></span>
              <p>– Hệ thống khung nhôm định hình, phụ kiện inox 304, 202, 201.</p>
            </li>
            <li>
              <span><i class="fas fa-award"></i></span>
              <p>– Chân cao: 100mm hoặc 150mm</p>
            </li>
          </ul>



          <h5> Ưu điểm :</h5>
          <ul>
            <li>
              <span><i class="fas fa-check"></i></span>
              <p>Có thể chịu ẩm ướt, chống va đập.</p>
            </li>
            <li>
              <span><i class="fas fa-check"></i></span>
              <p>Chống mối mọt.</p>
            </li>
            <li>
              <span><i class="fas fa-check"></i></span>
              <p>Chống cháy.</p>
            </li>
            <li>
              <span><i class="fas fa-check"></i></span>
              <p>Chống trầy xước và sự tác động của hóa chất.</p>
            </li>
            <li>
              <span><i class="fas fa-check"></i></span>
              <p>Độ bền và có tính thẩm mỹ cao.</p>
            </li>
            <li>
              <span><i class="fas fa-check"></i></span>
              <p>Lắp ráp và tháo gỡ nhanh với các dụng cụ thông thường.</p>
            </li>
            <li>
              <span><i class="fas fa-check"></i></span>
              <p>Tiết kiệm: thi công nhanh, khô ráo và nhẹ nên có thể giảm giá thành kết cấu chịu lực của công trình.
              </p>
            </li>
          </ul>

        </div>
      </div>

    </div>
  </div>
  <!-- ------------footer--------------- -->
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
</body>

</html>