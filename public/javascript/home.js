
const listBannerMobile = [{
    path: './public/image/banner-slide-2/banner-slide-mobile-1.webp'
},
{
    path: './public/image/banner-slide-2/banner-slide-mobile-2.webp'
},
{
    path: './public/image/banner-slide-2/banner-slide-mobile-3.webp'
},
{
    path: './public/image/banner-slide-2/banner-slide-mobile-4.webp'
},
{
    path: './public/image/banner-slide-2/banner-slide-mobile-5.webp'
}
]
const listBanner = [{
    path: './public/image/banner-slide-2/banner-slide-1.webp'
},
{
    path: './public/image/banner-slide-2/banner-slide-2.webp'
},
{
    path: './public/image/banner-slide-2/banner-slide-3.webp'
},
{
    path: './public/image/banner-slide-2/banner-slide-4.webp'
},
{
    path: './public/image/banner-slide-2/banner-slide-5.webp'
}
]
const slider2 = document.querySelector('.slider-2');
const slider2Image = slider2.querySelectorAll('.slider-item__img')
let lastClone2;
let firstClone2;
// show sản phẩm

// resize
function handleResize() {
    let firstCloneImg, lastCloneImg;
    // Lấy kích thước mới của cửa sổ trình duyệt
    firstCloneImg = firstClone2.querySelector('.slider-item__img')
    lastCloneImg = lastClone2.querySelector('.slider-item__img')

    let windowWidth = window.innerWidth;
    if (windowWidth < 740) {
        firstCloneImg.src = listBannerMobile[0].path
        lastCloneImg.src = listBannerMobile[listBannerMobile.length - 1].path
        slider2Image.forEach((item, index) => {
            item.src = listBannerMobile[index].path;
        })
    } else {
        firstCloneImg.src = listBanner[0].path
        lastCloneImg.src = listBanner[listBanner.length - 1].path
        slider2Image.forEach((item, index) => {
            item.src = listBanner[index].path;
        })
    }

}
setTimeout(() => {
    lastClone2 = slider2.querySelector('#last-clone');
    firstClone2 = slider2.querySelector('#first-clone');
    handleResize();
}, 100)
window.addEventListener('resize', handleResize);

// show category
const categoryItem = document.querySelector('.cartegory__container');
function showCategory() {
    let htmls = categories.map((categorie) => {
        return `
                <a href="#" class="cartegory__link">
                    <div class="cartegory__wrapper">
                        <div class="cartegory__name">
                            <img src="${categorie.imageUrl}" alt="">
                            <span>${categorie.name}</span>
                        </div>
                        
                    </div>
                </a>
            `
    }).join('')
    categoryItem.innerHTML = htmls;
}
showCategory();
mySlider(1);
mySlider(2);
// mySlider(4);