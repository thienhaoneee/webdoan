try {
    var modal = document.querySelector(".modal");
    var modalContainer = document.querySelector(".modal-container");
    var btnDangky = document.querySelector(".header-nav__dangky");
    var btnDangnhap = document.querySelector(".header-nav__dangnhap");
    var btnChangetoRegister = document.querySelector("#btnChangetoRegister");
    var btnChangetoLogin = document.querySelector("#btnChangetoLogin");

    var modalLogin = document.querySelector(".modal-login");
    var modalRegister = document.querySelector(".modal-register");

    // show
    function showModal(type) {
        switch (type) {
            case "login":
                modalRegister.style.display = "none";
                modalLogin.style.display = "block";
                break;
            case "register":
                modalLogin.style.display = "none";
                modalRegister.style.display = "block";
                break;
        }
    }

    // Xử lí btn đăng kí - đăng nhập
    btnDangky.addEventListener("click", function () {
        showModal("register");
        modal.classList.add("open");
    });
    btnDangnhap.addEventListener("click", function () {
        showModal("login");
        modal.classList.add("open");
    });

    // Xử lí btn thay đổi tùy chọn login || register form
    btnChangetoRegister.addEventListener("click", function () {
        showModal("register");
    });
    btnChangetoLogin.addEventListener("click", function () {
        showModal("login");
    });
    // handle close modal
    function closeModal() {
        modal.classList.remove("open");
    }
    modal.addEventListener("click", closeModal);
    modalContainer.addEventListener("click", function (event) {
        event.stopPropagation();
    });
} catch (error) {
    console.log("Lỗi form action login/register :>> ", error);
}
