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
  <?php require('./DBConnect.php'); ?>
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
          $db = new DBConnect();
          $conn = $db->connect();
          
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
            $db = new DBConnect();
            $conn = $db->connect();

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
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <div class="panel panel-default">
          <div class="panel-heading-down">TIN TỨC MỚI</div>
          <div class="panel-body panel-body-left">
               
          <?php 
            $db = new DBConnect();
            $conn = $db->connect();
            
            $numOfProductsPerPage = 4;

            $sql = "SELECT COUNT(id) FROM news";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $productsTotal = (int)$row["COUNT(id)"];
            }

            if(isset($_GET{'page'})) {
              $startPage = ($_GET{'page'} - 1) * $numOfProductsPerPage;
              $endPage = $_GET{'page'} * $numOfProductsPerPage;
            } else {
              $startPage = 0;
            }

            $sql =  "SELECT id, title, publicDate, imgAddress, content FROM news LIMIT $startPage, $numOfProductsPerPage";
            $result = $conn->query($sql);
              
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {        
          ?>   
                <div class="media media-bottom">
                  <div class="media-img">
                    <a href="news-detail.php?id=<?php echo $row['id']; ?>"><img src="<?php echo $row['imgAddress']; ?>" class="align-self-start"
                          alt=""></a>
                  </div>
                  <div class="media-body">
                    <a href="news-detail.php?id=<?php echo $row['id']; ?>" class="media-body-link">
                      <h5 class="mt-0"><?php echo $row['title']; ?></h5>
                    </a>
                    <div class="news-date">Ngày đăng <?php echo $row['publicDate']; ?></div>
                    <div class="news-content">
                      <?php echo $row['content']; ?>
                    </div>
                  </div>
                </div>
          <?php 
              }
            }
            $conn->close();
          ?>   
          </div>

          <nav aria-label="navigation example">
            <ul class="pagination justify-content-center">
              <?php 
                $pageTotal = $productsTotal/4;
                if ($pageTotal !== (int)$pageTotal) {
                  $pageTotal = (int)$pageTotal + 1;
                } else {
                  $pageTotal = $pageTotal;
                }

                if(isset($_GET{'page'})) {
                  $pagePrevOffset = (int)$_GET{'page'};
                  $pageNextOffset = (int)$_GET{'page'};
                } else {
                  $pageNextOffset = 0;
                  $pagePrevOffset = 1;
                }
              ?>
              <li class="page-item">
                <a class="page-link" href="news.php?page=1" aria-label="Previous">
                  <span aria-hidden="true"><i class="fas fa-angle-double-left"></i></span>
                </a>
              </li>
              <li class="page-item">
                <a class="page-link" href="news.php?page=<?php 
                if (!isset($_GET{'page'})) {
                  echo $pagePrevOffset;
                } else {
                  if($pagePrevOffset > 1) {
                    echo --$pagePrevOffset;
                  } else if ($pagePrevOffset === 1){
                    echo $pagePrevOffset;
                  }
                }
                ?>" aria-label="Previous">
                  <span aria-hidden="true"><i class="fas fa-angle-left"></i></span>
                </a>
              </li>
              <?php 
                $countPage = 0;
                while($countPage < $pageTotal) {
                  $countPage++;
              ?>
                  <li class="page-item">
                    <a class="page-link" href="news.php?page=<?php echo $countPage; ?>"><?php echo $countPage; ?></a>
                  </li>
              <?php } ?>
                
              <li class="page-item">
                <a class="page-link" href="news.php?page=<?php 
                    if (!isset($_GET{'page'})) {
                      echo $pageNextOffset += 2;
                    } else {   
                      if($pageNextOffset < $pageTotal) {
                        echo ++$pageNextOffset;
                      } else if ($pageNextOffset === $pageTotal) {
                        echo $pageNextOffset;
                      }
                    }
                ?>" aria-label="Next">
                  <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                </a>
              </li>
              <li class="page-item">
                <a class="page-link" href="news.php?page=<?php echo $pageTotal; ?>"  aria-label="Next">
                  <span aria-hidden="true"><i class="fas fa-angle-double-right"></i></span>
                </a>
              </li>
            </ul>
          </nav>
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

          <div class="shock-news shock-news-bottom">
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