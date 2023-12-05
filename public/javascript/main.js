function showProduct(data) {
    function formatNumber(number) {
        return number.toLocaleString("en-US");
    }
    function percentSaled(price, newprice) {
        if (price > 0 && newprice > 0) {
            giamGia = price - newprice;
            percent = (giamGia / price) * 100;
            return Math.ceil(percent);
        } else {
            return 0;
        }
    }
    const productView = document.querySelector(".product__wrapper");
    for (let i = 0; i < data.length; i++) {
        let product = data[i];
        let price = "";
        let sale = "";
        const productElement = document.createElement("div");
        productElement.classList.add("column", "l-20", "c-6");
        if (product.sale_price) {
            price = `
                <p class="product__sale-price">${formatNumber(
                    product.sale_price
                )}đ</p>
                <p class="product__old-price">${formatNumber(
                    product.price
                )} đ</p>
            
            `;
        } else {
            price = `
                <p class="product__sale-price">${formatNumber(
                    product.price
                )}đ</p>
            `;
        }
        if (product.sale_price) {
            let percent = percentSaled(product.price, product.sale_price);
            sale = `<p class="product__sale-off">Giảm ${percent}%</p>`;
        }
        productElement.innerHTML = `
            <a href="index.php?action=detail&id=${product.product_id}" class="product__item">
                <div class="product__header">
                    ${sale}
                    <p class="product__installment">Trả góp 0%</p>
                </div>
                <div class="product__image">
                    <img src="./public/image/sanpham/${product.image_url}" alt="">
                </div>
                <h3 class="product__name">${product.tensp} ${product.rom_name} ${product.type_name}</h3>
                <div class="product__price-wrapper">
                    ${price}
                </div>
                <div class="product__banner-cheapest">
                    <img src="./public/image/main-banner/banner-cheapest.webp" alt="">
                </div>
            </a>
        `;
        productView.appendChild(productElement);
    }
}
let start = 0;
let limit = 5;
let currentpage = 1;
try {
    const showMoreBtn = document.querySelector(".show-more__btn");
    const numberHave = document.querySelector(".show-more__number");
    const maxLenth = document.querySelector('input[name="countProduct"]').value;
    let continueNum = maxLenth ? Number(maxLenth) - currentpage * limit : 0;
    if (continueNum <= 0) {
        showMoreBtn.remove();
    }
    numberHave.innerHTML = continueNum;
} catch (error) {
    console.log("Lỗi phân trang :>> ");
}

function showMoreProduct(brand, model) {
    const numberHave = document.querySelector(".show-more__number");
    const showMoreBtn = document.querySelector(".show-more__btn");
    const maxLenth = document.querySelector('input[name="countProduct"]').value;
    const maxPage =
        Number(maxLenth) % limit == 0
            ? Number(maxLenth) / limit
            : Math.ceil(Number(maxLenth) / limit);
    if (currentpage < maxPage) {
        currentpage += 1;
        start = (currentpage - 1) * limit;
        $.ajax({
            type: "POST",
            url: "./request.php?req=pagination",
            dataType: "json",
            data: { brand, model, start },
            success: function (res) {
                if (!res.error) {
                    showProduct(res.products);
                    if (currentpage == maxPage) {
                        showMoreBtn.remove();
                    } else {
                        continueNum = maxLenth - currentpage * limit;
                        numberHave.innerHTML = continueNum;
                    }
                } else {
                    console.log("failed");
                }
            },
        });
    }
}
