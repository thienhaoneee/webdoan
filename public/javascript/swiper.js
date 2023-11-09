
function usingSwiper(numberSection){
    const $ = document.querySelector.bind(document);
    
    const slider = $(`.slider-${numberSection}`)
    const mainSlider = slider.querySelector(`.slider-main`);
    const btnNext = slider.querySelector(`.slider-button-next`);
    const btnPrev = slider.querySelector(`.slider-button-prev`);
    const sliderDots = slider.querySelectorAll(`.slider-dots-item`);
    // const swiper = document.querySelector('.single-product__swiper')
    const swiperWrapper = document.querySelector('.single-product__swiper-wrapper');
    const swiperItems = document.querySelectorAll('.single-product__swiper-item');
    
    let sliderItems = slider.querySelectorAll(`.slider-item`);
    let idSlider ;
    let indexSlider = 1;
    let sliderWidth = sliderItems[indexSlider].offsetWidth;
    const interval = 5000;

    let isDragStart = false;
    let scrollLeft = 0;


    // Clone phần tử đầu tiên và cuối cùng
    const fisrtClone = sliderItems[0].cloneNode(true)
    const lastClone = sliderItems[sliderItems.length-1].cloneNode(true)
    // đặt id cho thẻ vừa clone
    fisrtClone.id = 'first-clone'
    lastClone.id = 'last-clone'

    // Thêm vào cuối mảng
    mainSlider.append(fisrtClone)
    // Thêm vào đầu mảng
    mainSlider.prepend(lastClone)
    mainSlider.style.transform = `translateX(${-sliderWidth * indexSlider}px)`
    console.log('mainSlider.style.transform :>> ', -sliderWidth * indexSlider);

    

    
    // hàm xử lí thay đổi dot
    swiperWrapper.scrollLeft = 0;
    let stepSwiper = 0;
    function changeSwiper (swiperIndex) {
        swiperItems.forEach(item => {
            item.classList.remove('single-product__swiper-item--active');
        }) 
        if(swiperIndex >= swiperItems.length){
            swiperIndex = 0;
        }
        if(swiperIndex < 0){
            swiperIndex = swiperItems.length -1
        }
        // dịch chuyển khu ảnh phía dưới:
        if(swiperIndex == swiperItems.length -1) {
            swiperWrapper.scrollLeft = 291
        } else if(swiperIndex > 4 ){
            swiperWrapper.scrollLeft += 100;
            stepSwiper++;
        } else if(swiperIndex == 0) {
            swiperWrapper.scrollLeft = 0
        } else if(swiperIndex <=3 && stepSwiper > 0){
            swiperWrapper.scrollLeft -= 100;
            stepSwiper--;
        } else;
        swiperItems[swiperIndex].classList.add('single-product__swiper-item--active');
    }

    // chọn swiper -> thay đổi main Image
    swiperItems.forEach((item, index) => {
        item.addEventListener('click', function() {
            handleChangeSlider('swiper', index)
        })
    }) 

    let startX = 0;
    // Hàm xử lí kéo thả các Swiper
    function dragStart(e) {
        isDragStart = true;
        startX = e.clientX - swiperWrapper.offsetLeft;
        scrollLeft = swiperWrapper.scrollLeft;
    }
    function dragEnd() {
        isDragStart = false;
    }
    function dragging(e) {
        if (!isDragStart) return;
        e.preventDefault();
        const x = e.clientX - swiperWrapper.offsetLeft;
        const walk = (x - startX); 
        swiperWrapper.scrollLeft = scrollLeft - walk;
    }

    // hàm xử lí các Slider
    const handleChangeSlider = (directive, index) => {
        let sliderItems = getSlides();
        switch(directive){
            case 'next':
                    if(indexSlider >= sliderItems.length-1) return
                    indexSlider++;
                break
            case 'prev':
                    if(indexSlider <= 0) return
                    indexSlider--;
                break
            case 'swiper':
                    sliderItems = getSlides();
                    indexSlider = index+1;
                break
            }
            mainSlider.style.transform = `translateX(${-sliderWidth * indexSlider}px)`
            mainSlider.style.transition = `.7s`
            // Thay đổi Dot
            changeSwiper(indexSlider-1)
    }

    // Auto next
    const startSlider = () => {
        idSlider = setInterval(() => { 
            handleChangeSlider ('next');
        },interval)
    }

    // khi đến cuối hoặc đầu vòng lập thì thay đổi về vị trí ban đầu
    mainSlider.addEventListener('transitionend', () => {
        let sliderItems = getSlides();
        if(sliderItems[indexSlider].id === 'first-clone') {
            indexSlider = 1;
            mainSlider.style.transition = 'none';
            mainSlider.style.transform = `translateX(${-sliderWidth * indexSlider}px)`
            // Thay đổi Swiper
            changeSwiper(indexSlider - 1)
        }   
        // indexSlider( 1clone + 5Real + 1Clone) - 2
        if(sliderItems[indexSlider].id === 'last-clone') {
            indexSlider = sliderItems.length - 2;
            mainSlider.style.transition = 'none';
            mainSlider.style.transform = `translateX(${-sliderWidth * indexSlider}px)`
            // Thay đổi Swiper
            changeSwiper(indexSlider - 1)

        }   
    })
    // Dừng slide khi di chuột vào --
    // slider.addEventListener('mouseover', () => {
    //     clearInterval(idSlider);
    // })
    // tiếp tục khi di chuột ra ngoài --
    // slider.addEventListener('mouseout', startSlider)

    btnNext.addEventListener('click', function (){
        handleChangeSlider('next')
    })
    btnPrev.addEventListener('click', function (){
        handleChangeSlider('prev')
    })
    // hàm Lấy Slider sau khi clone
    const getSlides = () => { return slider.querySelectorAll('.slider-item')};

    sliderDots.forEach((dot,index) => {
        dot.addEventListener('click', function() {
            handleChangeSlider('dot',index)
        })
    });
    // resize
    function handleResize() {
        // Lấy kích thước mới của cửa sổ trình duyệt
        let windowWidth = window.innerWidth;
        console.log('windowWidth :>> ', windowWidth);
        if(windowWidth < 1239) {
            sliderWidth = sliderItems[indexSlider].offsetWidth;
            mainSlider.style.transform = `translateX(${-sliderWidth * indexSlider}px)`;
        } else {
            sliderWidth = sliderItems[indexSlider].offsetWidth;
            mainSlider.style.transform = `translateX(${-sliderWidth * indexSlider}px)`;
        }
        
    }
    window.addEventListener('resize', handleResize);
    // handle EventListener
    swiperWrapper.addEventListener("mousedown", dragStart);
    swiperWrapper.addEventListener("mousemove", dragging);
    swiperWrapper.addEventListener("mouseup", dragEnd);

    // Dừng slide khi di chuột vào
    // swiperWrapper.addEventListener('mouseover', () => {
    //     clearInterval(idSlider);
    // })
    // swiperWrapper.addEventListener('mouseout', () => {
    //     startSlider();
    // })

    // hàm khởi chạy mặc định
    // startSlider()


}
// mySlider(1)
// mySlider(2)
