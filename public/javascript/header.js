try {
    


const modal = document.querySelector('.modal');
const modalContainer = document.querySelector('.modal-container');
const btnDangky = document.querySelector('.header-nav__dangky');
const btnDangnhap = document.querySelector('.header-nav__dangnhap');
const btnChangetoRegister = document.querySelector('#btnChangetoRegister');
const btnChangetoLogin = document.querySelector('#btnChangetoLogin');

const modalLogin = document.querySelector('.modal-login');
const modalRegister = document.querySelector('.modal-register');



// show
function showModal(type) {
    switch(type){
        case 'login':
            console.log('Running :>>  login');

            modalRegister.style.display = 'none';
            modalLogin.style.display = 'block';
            break;
        case 'register':
            console.log('Running :>>  register');
            
            modalLogin.style.display = 'none'
            modalRegister.style.display = 'block';
            break;
    }
}

// Xử lí btn đăng kí - đăng nhập
btnDangky.addEventListener('click', function(){
    showModal('register');
    modal.classList.add('open');
})
btnDangnhap.addEventListener('click', function(){
    showModal('login');
    modal.classList.add('open');
})

// Xử lí btn thay đổi tùy chọn login || register form
btnChangetoRegister.addEventListener('click', function(){
    showModal('register')
})
btnChangetoLogin.addEventListener('click', function(){
    showModal('login')
})
// handle close modal
function closeModal() {
    modal.classList.remove('open');
}
modal.addEventListener('click', closeModal);
modalContainer.addEventListener('click', function (event) {
    event.stopPropagation();
})
} catch (error) {
    console.log('đã đăng nhập :>> ', error);
}







