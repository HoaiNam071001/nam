<?php
class CartController extends Controller{

    # hiển thị trang cart 
    function show(){
        $this->callview("Home",["page"=>"Cart"]);
    }
    # lưu thông tin đặt món vào CartDB
    function addCartDB(){
        $dish = $this->callmodel("CartDB");

        if(empty($_SESSION['iduser'])){
            $dish = $dish->addDB($_POST['fullname'],$_POST['phone']);
        }
        else {
            $user = $this->callmodel("UserDB");
            $user = $user->loginuser($_SESSION['iduser']);
            $result=[];
            while($s = mysqli_fetch_array($user, MYSQLI_ASSOC)){
                $result = $s;
            }
            $dish->addDB($result['FULLNAME'],$result['SDT']);
        }
        unset($_SESSION['Cart']);
        header('Location: index.php?controller=Cart&order=1');
    }

    # tang so luong cua mon an
    function ReduceQuantity(){
        if(isset($_POST['dish'])){
            $_SESSION['Cart'][$_POST['dish']]['Quantity']--;
            print_r(json_encode([$_SESSION['Cart'][$_POST['dish']]['Quantity'],$_SESSION['Cart'][$_POST['dish']]['PRICE']]));
        }
    }
    # giam so luong cua mon an
    function IncreaseQuantity(){
        if(isset($_POST['dish'])){
            $_SESSION['Cart'][$_POST['dish']]['Quantity']++;
            print_r(json_encode([$_SESSION['Cart'][$_POST['dish']]['Quantity'],$_SESSION['Cart'][$_POST['dish']]['PRICE']]));
        }
    }
    # xoa mon an khoi gio
    function RemoveItem(){
        unset($_SESSION['Cart'][$_POST['dish']]);
    }
}
?>
