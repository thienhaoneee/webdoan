
function mySlider(numberSection){
    const $ = document.querySelector.bind(document);
    
    const slider = $(`.slider-${numberSection}`)
    const mainSlider = slider.querySelector(`.slider-main`);
    const btnNext = slider.querySelector(`.slider-button-next`);
    const btnPrev = slider.querySelector(`.slider-button-prev`);
    const sliderDots = slider.querySelectorAll(`.slider-dots-item`);

    let sliderItems = slider.querySelectorAll(`.slider-item`);
    let idSlider ;
    let indexSlider = 1;
    let sliderWidth = sliderItems[indexSlider].offsetWidth;
    const interval = 5000;

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

    btnNext.addEventListener('click', function (){
        handleChangeSlider('next');

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

    // hàm xử lí thay đổi dot
    const changeDot = (dotIndex) => {
        
        sliderDots.forEach((item) => {
            item.classList.remove('active');
        });
        if(dotIndex == sliderItems.length){
            dotIndex = 0
        }
        if(dotIndex < 0){
            dotIndex = sliderItems.length
        }
        
        sliderDots[dotIndex].classList.add('active');
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
            case 'dot':
                    sliderItems = getSlides();
                    indexSlider = index+1;
                break
            }
            mainSlider.style.transform = `translateX(${-sliderWidth * indexSlider}px)`
            mainSlider.style.transition = `.7s`
            // Thay đổi Dot
            changeDot(indexSlider-1)
    }

    // Auto next
    const startSlider = () => {
        idSlider = setInterval(() => { handleChangeSlider('next') },interval)
    }

    // khi đến cuối hoặc đầu vòng lập thì thay đổi về vị trí ban đầu
    mainSlider.addEventListener('transitionend', () => {
        let sliderItems = getSlides();
        if(sliderItems[indexSlider].id === 'first-clone') {
            indexSlider = 1;
            mainSlider.style.transition = 'none';
            mainSlider.style.transform = `translateX(${-sliderWidth * indexSlider}px)`
            // Thay đổi Dot
            changeDot(indexSlider - 1)
        }   
        // indexSlider( 1clone + 5Real + 1Clone) - 2
        if(sliderItems[indexSlider].id === 'last-clone') {
            indexSlider = sliderItems.length - 2;
            mainSlider.style.transition = 'none';
            mainSlider.style.transform = `translateX(${-sliderWidth * indexSlider}px)`
            // Thay đổi Dot
            changeDot(indexSlider - 1)

        }   
    })
    function handleResize() {
        // Lấy kích thước mới của cửa sổ trình duyệt
        let windowWidth = window.innerWidth;
        if(windowWidth < 1239) {
            sliderWidth = sliderItems[1].offsetWidth;
            mainSlider.style.transform = `translateX(${-sliderWidth * indexSlider}px)`;
        } else {
            sliderWidth = sliderItems[1].offsetWidth;
            mainSlider.style.transform = `translateX(${-sliderWidth * indexSlider}px)`;
        }
        
    }
    window.addEventListener('resize', handleResize);
    // Dừng slide khi di chuột vào
    slider.addEventListener('mouseover', () => {
        clearInterval(idSlider);
    })
    // tiếp tục khi di chuột ra ngoài
    slider.addEventListener('mouseleave', startSlider)

    // hàm khởi chạy mặc định
    startSlider()


}
// mySlider(1)
// mySlider(2)
