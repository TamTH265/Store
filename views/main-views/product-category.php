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
  <link rel="stylesheet" href="../../styles/product-category.css">
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
          
          $sql = "SELECT id, item, address FROM menu WHERE parent_item_id = 0";
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

            $sql = "SELECT id, item, address FROM menu WHERE parent_item_id = " . $row["id"];
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

  <div class="page-container">
    <div class="sidebar">
      <div class="menu-container">
        <h3>Loại sản phẩm</h3>
        <ul>
          <?php 
            $db = new DBConnect();
            $conn = $db->connect();
            
            $sql = "SELECT id, item, address FROM menu WHERE parent_item_id = 2";
            $result = $conn->query($sql);
           
            if ($result->num_rows > 0) { 
              while($row = $result->fetch_assoc()) {
          ?>
                <li>
                  <a href="product-category.php?categoryId=<?php echo $row["id"];?>">
                    <span class="fas fa-angle-right"></span>
                    <?php echo $row["item"]; ?>
                  </a>
                </li>  
          <?php
              }
              $conn->close();
            }        
          ?>     
        </ul>
      </div>
    </div>

    <div class="main-content container">
      <h3>
        <?php
          if (isset($_REQUEST["categoryId"])) {
            $categoryId = (int)$_REQUEST["categoryId"];
            $db = new DBConnect();
            $conn = $db->connect();

            $sql = "SELECT item FROM menu where id=" . $categoryId;
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
        ?>
        <span class="category-title"><?php echo $row['item']; ?></span>
        <?php
            }
          }
        ?>
      </h3>
      <div class="row">
      <?php       
      if (isset($_REQUEST["categoryId"])) {   
        $categoryId = (int)$_REQUEST["categoryId"];
        $db = new DBConnect();
        $conn = $db->connect();
        $numOfProductsPerPage = 6;
        
        $sql = "SELECT COUNT(id) FROM products where category_id=" . $categoryId;
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

        $pageTotal = $productsTotal/6;
        if ($pageTotal !== (int)$pageTotal) {
          $pageTotal = (int)$pageTotal + 1;
        } else {
          $pageTotal = $pageTotal;
        }

        $sql =  "SELECT id, title, imgAddress, content, category_id FROM products WHERE category_id=" . $categoryId . " LIMIT $startPage, $numOfProductsPerPage";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          $checkIndexAtTwoColsState = 0;
          $checkIndexAtThreeColState = 0;
          $indexAtTwoColsState = "left";
          $indexAtThreeColsState = "st";
          while($row = $result->fetch_assoc()) {        
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
        <div class="col col-lg-4 col-sm-6 col-12 <?php echo $indexAtTwoColsState;?>-col <?php echo $indexAtThreeColsState; ?>-col">
          <div class="item" data-aos="fade-up">
            <span class="info">
              <button><a href="product-detail.php?id=<?php echo $row["id"]; ?>&categoryId=<?php echo $row["category_id"]; ?>">Chi tiết</a></button>
            </span>
            <img src="<?php echo $row["imgAddress"]; ?>" alt="">
            <span class="caption"><?php echo $row["title"]; ?></span>
          </div>
        </div>
      <?php
            }
          } else {
      ?>
        <div style="width: 100%; color: #f00; text-align: center; font-size: 28px; font-weight: 500;">Sản phẩm tạm hết hàng!</div>
      <?php
          }
        }
      ?>
      </div>

      <nav aria-label="navigation example">
        <ul class="pagination justify-content-center">
          <?php 
          if (isset($_REQUEST["categoryId"])) {
            if ($pageTotal > 0) {
              if(isset($_GET{'page'})) {
                $pagePrevOffset = (int)$_GET{'page'};
                $pageNextOffset = (int)$_GET{'page'};
              } else {
                $pageNextOffset = 0;
                $pagePrevOffset = 1;
              }
            ?>
            <li class="page-item">
              <a class="page-link" href="product-category.php?categoryId=<?php echo $categoryId; ?>&page=1" aria-label="Previous">
                <span aria-hidden="true"><i class="fas fa-angle-double-left"></i></span>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="product-category.php?categoryId=<?php echo $categoryId; ?>&page=<?php 
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
                  <a class="page-link" href="product-category.php?categoryId=<?php echo $categoryId; ?>&page=<?php echo $countPage; ?>"><?php echo $countPage; ?></a>
                </li>
            <?php }?>
            
            <li class="page-item">
              <a class="page-link" href="product-category.php?categoryId=<?php echo $categoryId; ?>&page=<?php 
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
              <a class="page-link" href="product-category.php?categoryId=<?php echo $categoryId; ?>&page=<?php echo $pageTotal; ?>"  aria-label="Next">
                <span aria-hidden="true"><i class="fas fa-angle-double-right"></i></span>
              </a>
            </li>
          <?php }} ?>
        </ul>
      </nav>
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