<script src="./public/js/Cart.js"></script>
<section class="cart">
  <div class="overlay"></div>
  <div class="container">
    <?php if(!empty($_GET['order'])){?> <script>alert("Đơn hàng đã được gởi")</script> <?php } ?>
    <h4>
      <ion-icon name="cart-outline"></ion-icon>
      <span>Your Cart (<span name="dish-in-cart"><?= empty($_SESSION["Cart"])?0:count($_SESSION["Cart"])?></span>) </span>
    </h4>
    <?php if(!empty($_SESSION["Cart"])){  ?>

    <div class="list">
      <?php foreach($_SESSION["Cart"] as $x => $val) { ?>
      <div class="item" id="<?= $val['IDDISH']."DISH"?>">
      <img src="./public/img/dish/<?= $val['PICTURE']?>" alt="">
      <div class="info">
        <h5><?= $val['DISHNAME']?></h5>
        <button class="icon" id="giam" name="<?= $val['IDDISH']?>" onclick="update(name,value)" value="-">-</button>
        <input type="text" value="<?= $val['Quantity']?>" id="<?= $val['IDDISH']?>" disabled>
        <button class="icon" id="giam" name="<?= $val['IDDISH']?>" onclick="update(name,value)" value="+">+</button>
      </div>
      <span class="price"> <span id="<?= $val['IDDISH']."Price"?>"><?= $val['Quantity']*$val['PRICE'];?></span> VNĐ</span>
      <button class="btn" style="width:80px;height:50px;" name="<?= $val['IDDISH']?>" onclick="deletedish(name)">Xóa</button>
      </div>
    <?php } ?>
    </div>
    <form action="index.php?controller=Cart&action=addCartDB" method="POST">
    <?php if(empty($_SESSION['iduser']) && empty($_SESSION["idemp"]) && empty($_SESSION["idmanager"])){
      ?>
      <div style="margin:10px;">
        <label class="form-label">Họ và tên</label>
        <input type="text" name="fullname" class="form-control" placeholder="Nhập họ và tên">
      </div>
      <div>
        <label style="margin:5px;">Số điện thoại</label>
        <input type="text" style="margin:5px;" name="phone" placeholder="Nhập số điện thoại">
      </div>  <?php }
      if(empty($_SESSION["idemp"]) && empty($_SESSION["idmanager"])){ ?>
        <button type="submit" class="btn">Order</btn>
        <?php }
      } else { ?> <h4 class="item">Không có sản phẩm nào trong giỏ</h4>  <?php }  ?>
    </form>
  </div>
</section>
