function checkOutCart() {
    const makh = document.querySelector(".cart-check__makh").value;

    if (makh) {
        location.href = "./index.php?action=checkout";
    } else {
        var btnDangnhap = document.querySelector(".header-nav__dangnhap");
        btnDangnhap.click();
    }
}
function submitCheckOut() {
    const btnSubmit = document.querySelector(
        ".checkout-shopping__btn-checkout--hidden"
    );
    btnSubmit.click();
}
Validator({
    form: "#form-checkout-1",
    formGroupSelector: ".form-group",
    errorSelector: ".form-message",
    rules: [
        Validator.isRequired("#user_name3", "Vui nhập Họ và tên"),
        Validator.isRequired("#user_phone3", "Vui nhập số điện thoại"),
        Validator.isRequired("#user_email3", "Vui lòng nhập email"),
        Validator.isRequired("#user_address3", "Vui lòng nhập địa chỉ"),
        Validator.isPhone("#user_phone3", "Vui hập định dạng số điện thoại"),
        Validator.isEmail("#user_email3", "Vui lòng đúng định dạng email"),
    ],
    onSubmit: function (data) {
        $.ajax({
            url: "request.php?req=checkout&act=bill",
            type: "POST",
            data: { data },
            dataType: "json",
            success: function (response) {
                if (!response.error) {
                    insertBillInfo(response.info, response.detail);
                } else {
                    Swal.fire({
                        title: "Lỗi!",
                        text: "Thanh toán thất bại",
                        icon: "error",
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error("Lỗi:", error);
            },
        });
    },
});

function insertBillInfo(info, detail) {
    const billName = document.querySelector(".checkout-item__bill-name");
    const billAddress = document.querySelector(".checkout-item__bill-address");
    const billPhone = document.querySelector(".checkout-item__bill-phone");
    const billEmail = document.querySelector(".checkout-item__bill-email");
    const billNgayhd = document.querySelector(".checkout-item__bill-ngayhd");
    const billTotal = document.querySelector(".checkout-item__bill-total");
    const viewTable = document.querySelector(".checkout-bill__table-body");

    billName.innerHTML = info.khachhang_name;
    billAddress.innerHTML = info.diachi;
    billPhone.innerHTML = info.phone;
    billEmail.innerHTML = info.email;
    billNgayhd.innerHTML = info.ngayhd;
    billTotal.innerHTML = formatNumber(info.tongtien);

    function formatNumber(number) {
        return number.toLocaleString("en-US");
    }
    htmls = detail.map((product) => {
        return `
            <tr>
                <td class="checkout-bill__body-col__name">
                    <div class="checkout-bill__col-name-wrapper">
                        <img
                            src="./public/image/sanpham/${product.image_url}"
                            alt=""
                            width="70px"
                        />
                        <div class="checkout-bill__col-name-sub">
                            <p class="checkout-bill__col-name">
                            ${product.tensp}  - ${product.rom_name}
                            </p>
                            <p>${product.color_name} (${product.type_name})</p>
                        </div>
                    </div>
                </td>
                <td>
                    ${formatNumber(product.price)}<sup>đ</sup>
                </td>
                <td class="center" >
                ${product.soluong}
                </td>
                <td>
                ${formatNumber(product.thanhtien)}<sup>đ</sup>
                </td>
            </tr>
        `;
    });
    viewTable.innerHTML = htmls.join("");
    modalCheckoutShow();
}
function modalCheckoutShow() {
    const modalCheckout = document.querySelector(".modal-checkout");
    modalCheckout.classList.add("open");
}
function modalCheckoutClose() {
    const modalCheckout = document.querySelector(".modal-checkout");
    modalCheckout.classList.remove("open");
    location.href = "./index.php";
}
const modalCheckoutContainer = document.querySelector(
    ".modal-checkout__container"
);
modalCheckoutContainer.addEventListener("click", function (e) {
    e.stopPropagation();
});
