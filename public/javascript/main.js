
function showProduct(options) {
    const productView = document.querySelector(options.viewProduct);
    for (let i = options.startIndex; i < options.endIndex; i++) {
        let product = options.listProduct[i];
        const productElement = document.createElement('div')
        productElement.classList.add('column', 'l-20', 'c-6')
        productElement.innerHTML = `
            <a href="/single.html" class="product__item">
                <div class="product__header">
                    <p class="product__sale-off">Giảm 25%</p>
                    <p class="product__installment">Trả góp 0%</p>
                </div>
                <div class="product__image">
                    <img src="./public/image/sanpham/${product.image_url}" alt="">
                </div>
                <h3 class="product__name">${product.tensp}</h3>
                <div class="product__price-wrapper">
                    <p class="product__sale-price">${product.sale_price} đ</p>
                    <p class="product__old-price">${product.price} đ</p>
                </div>
                <div class="product__banner-cheapest">
                    <img src="./public/image/main-banner/banner-cheapest.webp" alt="">
                </div>
            </a>
        `
        productView.appendChild(productElement);

    }
}
let endIndex = 0
function showMoreProduct(options) {
    const showMoreBtn = document.querySelector('.show-more__btn');
    const numberHave = document.querySelector('.show-more__number');
    // khởi tạo số lượng còn lại đầu tiên
    let pdLength = options.listProduct.length;
    numberHave.innerHTML = pdLength - options.startIndex;

    // xử lí render khi nhấn button xem thêm
    showMoreBtn.addEventListener('click',function() {
        endIndex = options.startIndex + 5;
        console.log('endIndex :>> ', endIndex);
        console.log('options.listProduct :>> ', options.listProduct);
        console.log('options.listProduct.length :>> ', pdLength);

        showProduct({
            listProduct: options.listProduct,
            viewProduct: '.product__wrapper',
            startIndex: options.startIndex,
            endIndex: endIndex
        });
        // tăng startIndex cho lần render tiếp theo 
        options.startIndex += 5;
        // rerender số lượng còn lại cho button
        numberHave.innerHTML = pdLength - options.startIndex;
        // Kiểm tra nếu không còn sản phẩm để hiển thị, bạn có thể ẩn nút "Xem thêm".
        if (endIndex >= options.listProduct.length) {
            showMoreBtn.style.display = 'none';
        }
    })
}
