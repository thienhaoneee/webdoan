function addtoCart(productId) {
    $.ajax({
        url: "request.php?req=cart&act=addtocart",
        type: "POST",
        data: { id: productId },
        dataType: "json",
        success: function (response) {
            if (!response.error) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Thêm thành công",
                    showConfirmButton: false,
                    timer: 1500,
                }).then(() => {
                    location.href = "./index.php?action=cart";
                });
            }
        },
    });
}

function deleteItemCart(id) {
    Swal.fire({
        title: "Bạn muốn xóa sản phẩm này?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Đồng ý!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "request.php?req=cart&act=delete",
                type: "POST",
                data: { id },
                dataType: "json",
                success: function (response) {
                    if (!response.error) {
                        const product = document.querySelector(
                            `.cart-product-${id}`
                        );
                        const totalAllElement = document.querySelector(
                            ".cart-total__money-price"
                        );
                        let totalAll = formatNumber(response.total);
                        totalAllElement.innerHTML = `${totalAll}đ`;
                        product.remove();
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Xóa thành công",
                            showConfirmButton: false,
                            timer: 1500,
                        }).then(() => {
                            if (!response.total) location.reload();
                        });
                    }
                },
            });
        }
    });
}
function deCreaseQuantity(id) {
    product = document.querySelector(`.cart-product-${id}`);
    productInput = product.querySelector(".cart-shopping__col-quantity-input");
    let quantity;
    if (productInput.value > 1) {
        quantity = Number(productInput.value) - 1;
        sendUpdate(id, quantity);
    } else if (productInput.value <= 1) {
        deleteItemCart(id);
    }
}
function inCreaseQuantity(id) {
    product = document.querySelector(`.cart-product-${id}`);
    productInput = product.querySelector(".cart-shopping__col-quantity-input");
    let quantity = Number(productInput.value) + 1;
    sendUpdate(id, quantity);
}
function formatNumber(number) {
    return number.toLocaleString("en-US");
}
function sendUpdate(id, quantity) {
    $.ajax({
        url: "request.php?req=cart&act=update",
        type: "POST",
        data: { id, quantity },
        dataType: "json",
        success: function (response) {
            if (response.error) {
                console.log("Lỗi cập nhật:>> ");
            } else {
                const totalAllElement = document.querySelector(
                    ".cart-total__money-price"
                );

                const product = document.querySelector(`.cart-product-${id}`);
                const productInput = product.querySelector(
                    ".cart-shopping__col-quantity-input"
                );
                const totalElement = product.querySelector(
                    ".cart-shopping__col-total"
                );

                let thanhtien =
                    response.product.price * response.product.quantity;

                let totalAll = formatNumber(response.total);
                let total = formatNumber(thanhtien);
                totalAllElement.innerHTML = `${totalAll}đ`;
                totalElement.innerHTML = `${total}đ`;
                productInput.value = response.product.quantity;
                console.log("Cập nhật thành công :>> ");
            }
        },
    });
}
