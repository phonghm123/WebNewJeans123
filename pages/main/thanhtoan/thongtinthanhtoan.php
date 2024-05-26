<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .vien {
            border: 2px solid black;
        }
        #bank-transfer-image {
            margin-left: 30px;
            align-items: center;
            margin-bottom: 30px;
        }
        #bank-transfer-text {
            display: none;
            margin-top: 10px;
        }
        .col-md-4.hinhthucthanhtoan .form-check {
            margin: 8px;
            align-items: center;
        }
    </style>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- PayPal SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=AZyeHP8tvAYAzh3VWUYbyfqMY1jkCv3Z4E_3ZoDjG0avoGM2ybY8NNTFyj-pMJGVnT8p-TYIjPdrknLx"></script>
</head>
<body>
<div class="container">
    <?php
    if(isset($_SESSION['id_khachhang'])){
    ?>
    <div class="arrow-steps clearfix">
        <div class="step"> <span> <a href="../../../index.php?quanly=giohang">Giỏ hàng</a></span> </div>
        <div class="step"> <span><a href="index.php?quanly=vanchuyen">Kiểm tra</a></span> </div>
        <div class="step current"> <span><a href="index.php?quanly=thongtinthanhtoan">Thanh toán</a><span> </div>
    </div>
    <?php
    }
    ?>
    <form action="thanhtoan.php" method="POST">
        <div class="row">
            <h5>Giỏ hàng của bạn</h5>
            <table class="table table-striped" style="width:100%; border: 2px solid black;text-align: center;">
                <div>
                    <tr>
                        <th class="vien">ID</th>
                        <th class="vien">Mã :</th>
                        <th class="vien">Tên</th>
                        <th class="vien">Hình</th>
                        <th class="vien">Số lượng</th>
                        <th class="vien">Size</th>
                        <th class="vien">Giá :</th>
                        <th class="vien">Thành tiền</th>
                    </tr>
                    <?php
                    if(isset($_SESSION['cart'])){
                        $i=0;
                        $tongtien=0;
                        foreach($_SESSION['cart'] as $cart_item){
                            $thanhtien = $cart_item['soluong'] * $cart_item['giasanpham'];
                            $tongtien+=$thanhtien;
                            $i++;
                            ?>
                            <tr>
                                <td class="vien"><?php echo $i ?></td>
                                <td class="vien"><?php echo $cart_item['masp']?></td>
                                <td class="vien"><?php echo $cart_item['tensanpham'] ?></td>
                                <td class="vien"><img src="../../../admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>" width="150px"></td>
                                <td class="vien"><?php echo $cart_item['soluong'] ?></td>
                                <td class="vien"><?php echo $cart_item['size'] ?></td>
                                <td class="vien"><?php echo number_format($cart_item['giasanpham'],0,',','.') . ' VNĐ'?></td>
                                <td class="vien"><?php echo number_format($thanhtien,0,',','.') . ' VNĐ' ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <td colspan="8">
                                <p style="float: left text-align: center;" class="btn btn-success"> Tổng tiền : <?php echo number_format($tongtien,0,',','.') . ' VNĐ'  ?></p>
                                <div style="clear:both;"> </div>
                            </td>
                        </tr>
                        <?php
                    }else{
                        ?>
                        <tr>
                            <td colspan="8"><p>Hiện tại giỏ hàng trống</p></td>
                        </tr>
                        <?php
                    }
                    ?>
                </div>
            </table>
        </div>
        <li style="display: flex;">
            <div class="col-md-4 hinhthucthanhtoan">
                <h4>Phương thức thanh toán</h4>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="Tiền Mặt" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Tiền mặt
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="Chuyển Khoản">
                    <label class="form-check-label" for="exampleRadios2">
                        Chuyển khoản
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="exampleRadios3" value="Paypal">
                    <label class="form-check-label" for="exampleRadios3">
                        Thanh toán paypal
                    </label>
                </div>
                <input type="submit" value="Đặt hàng ngay" name="redirect" class="btn btn-danger">
            </div>
            <div id="bank-transfer-text">
                <p>Chuyển khoản nội dung: Tên khách hang _ Mã đơn hàng<span id="customer-name"></span><span id="order-id"></span></p>
                <p>Ví dụ: Nguyễn văn A_1234</p>
            </div>
            <img id="bank-transfer-image" src="stk.jpg" alt="Bank transfer image" width="400px" style="display: none;">
            <div id="paypal-button-container" style="display: none;"></div>
        </li>
    </form>
    <?php
    $tongtien = 0;
    foreach($_SESSION['cart'] as $key => $value){
        $thanhtien = $value['soluong']*$value['giasanpham'];
        $tongtien+=$thanhtien;
    }
    $tongtien_vnd = $tongtien;
    $tongtien_usd = round($tongtien/22667);
    ?>
    <input type="hidden" name="" value="<?php echo $tongtien_usd ?>" id="tongtien">

    <script>
    const bankTransferRadio = document.getElementById("exampleRadios2");
    const cashRadio = document.getElementById("exampleRadios1");
    const paypalRadio = document.getElementById("exampleRadios3");
    const bankTransferImage = document.getElementById("bank-transfer-image");
    const bankTransferText = document.getElementById("bank-transfer-text");
    const paypalButtonContainer = document.getElementById("paypal-button-container");
    const submitButton = document.querySelector('input[name="redirect"]');
    const customerName = document.getElementById("customer-name");
    const orderId = document.getElementById("order-id");
    const amount = document.getElementById("tongtien").value;
    let paypalButtonRendered = false;

    bankTransferRadio.addEventListener("change", function() {
        if (bankTransferRadio.checked) {
            bankTransferImage.src = "stk.jpg";
            bankTransferImage.style.display = "inline-block";
            bankTransferText.style.display = "block";
            paypalButtonContainer.style.display = "none";
            submitButton.style.display = "inline-block"; // Hiển thị nút "Đặt hàng ngay"
        }
    });

    cashRadio.addEventListener("change", function() {
        bankTransferImage.style.display = "none";
        bankTransferText.style.display = "none";
        paypalButtonContainer.style.display = "none";
        submitButton.style.display = "inline-block"; // Hiển thị nút "Đặt hàng ngay"
    });

    paypalRadio.addEventListener("change", function() {
        if (paypalRadio.checked) {
            bankTransferImage.style.display = "none";
            bankTransferText.style.display = "none";
            paypalButtonContainer.style.display = "block";
            if (!paypalButtonRendered) {
                renderPaypalButton(amount);
                paypalButtonRendered = true;
            }
            submitButton.style.display = "none"; // Ẩn nút "Đặt hàng ngay"
        }
    });

    function renderPaypalButton(amount) {
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: amount
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert("Transaction completed by " + details.payer.name.given_name);
                    submitButton.style.display = "inline-block";
                    return fetch("/paypal-transaction-complete", {
                        method: "post",
                        body: JSON.stringify({
                            orderID: data.orderID
                        })
                    });
                });
            }
        }).render('#paypal-button-container');
    }
</script>



</div>
</body>
</html>
