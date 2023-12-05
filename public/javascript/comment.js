function submitComment() {
    const form = document.querySelector("#product-single-comment__form");
    const btnLogin = document.querySelector(".header-nav__dangnhap");
    const product_id = form.querySelector('input[name="product_id"]').value;
    const content = form.querySelector('textarea[name="content"]').value;
    const userId = form.querySelector(".product-comment__user-id").value;
    const makh = form.querySelector('input[name="makh"]').value;
    if (userId != 0) {
        if (content) {
            $.ajax({
                url: "request.php?req=comment&act=add",
                type: "POST",
                dataType: "json",
                data: {
                    product_id,
                    content,
                    makh,
                },
                success: function (res) {
                    if (!res.error) {
                        form.reset();
                        appendComent(product_id, res.comment);
                    } else {
                        console.log("Lỗi :>> add comment ");
                    }
                },
            });
        } else {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Vui lòng không để trống",
                showConfirmButton: false,
                timer: 1500,
            });
        }
    } else {
        btnLogin.click();
    }
}
function showViewSubComment(id, user_id, product_id) {
    const test = document.querySelectorAll(
        `.product-single-comment__form-id-${id}`
    );
    if (!test.length) {
        const formSubComment = document.querySelector(
            `.form-wrapper__id-${id}`
        );
        const formSub = document.createElement("form");
        formSub.classList.add(`product-single-comment__form-id-${id}`);
        formSub.style.marginLeft = "39px";
        formSub.style.marginBottom = "10px";
        formSub.innerHTML = `
            <input type="hidden" value="${user_id}" name="makh" class="product-comment__user-id">
            <input type="hidden" value="${product_id}" name="product_id">
            <input type="hidden" value="${id}" name="parent_id">
            <div class="rw">
                <div class="column c-9">
                    <div class="form-group">
                        <textarea class="product-single-comment__textarea" 
                        name="content" id="" cols="" rows="5"
                        placeholder="Nhận xét về sản phẩm"
                        ></textarea>
                    </div>
                </div>
                <div class="column c-3">
                    <div class="product-single-comment__btn-wrapper">
                        <button type="button" class="product-single-comment__btn" onclick="subComment(${id})">Bình luận</button>
                        <button type="button" class="product-single-comment__btn btn-cancel" onclick="cancelSubForm(${id})">Cancel</button>
                    </div>
                </div>
            </div>
        `;
        formSubComment.appendChild(formSub);
    }
}
function cancelSubForm(id) {
    const formSub = document.querySelector(
        `.product-single-comment__form-id-${id}`
    );
    formSub.remove();
}
function subComment(id) {
    const form = document.querySelector(
        `.product-single-comment__form-id-${id}`
    );
    const btnLogin = document.querySelector(".header-nav__dangnhap");
    const product_id = form.querySelector('input[name="product_id"]').value;
    const parent_id = form.querySelector('input[name="parent_id"]').value;
    const content = form.querySelector('textarea[name="content"]').value;
    const userId = form.querySelector(".product-comment__user-id").value;
    const makh = form.querySelector('input[name="makh"]').value;
    if (userId != 0) {
        if (content) {
            $.ajax({
                url: "request.php?req=comment&act=addsub",
                type: "POST",
                dataType: "json",
                data: {
                    product_id,
                    content,
                    makh,
                    parent_id,
                },
                success: function (res) {
                    if (!res.error) {
                        form.reset();
                        appendFeedback(id, res.comment);
                    } else {
                        console.log("Lỗi :>> add comment ");
                    }
                },
            });
        } else {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Vui lòng không để trống",
                showConfirmButton: false,
                timer: 1500,
            });
        }
    } else {
        btnLogin.click();
    }
}
function appendComent(id, data) {
    const viewComment = document.querySelector(
        ".product-single-comment__content-wrapper"
    );
    const commentItem = document.createElement("div");
    commentItem.classList.add("product-single-comment__item");
    commentItem.innerHTML = `
            <div class="product-single-comment__item-user">
            <div class="product-single-comment__item-img">
                <img src="./public/image/icon/user-default.png" alt="">
            </div>
            <div class="product-single-comment__item-info">
                <p class="product-single-comment__item-username">${data.khachhang_name}</p>
                <p class="product-single-comment__item-content">${data.content}</p>
                <p class="product-single-comment__item-time">${data.created_at}</p>
            </div>
            </div>
            <div class="product-single-comment__item-btn-wrapper">
                <button class="product-single-comment__item-btn"
                onclick="showViewSubComment(${data.cmt_id},${data.khachhang_id},${data.product_id})"
                ><i class="fa-regular fa-comments"></i> Bình luận</button>
            </div>
            <div class="form-wrapper__id-${data.cmt_id}"></div>
            <div class="product-single-comment__feedback-${data.cmt_id}"></div>
        `;
    viewComment.prepend(commentItem);
}
function appendFeedback(id, data) {
    const viewComment = document.querySelector(
        `.product-single-comment__feedback-${id}`
    );
    const feedbacktItem = document.createElement("div");
    feedbacktItem.classList.add("product-single-comment__feedback-item");
    feedbacktItem.innerHTML = `
            <div class="product-single-comment__feedback-img">
                <img src="./public/image/icon/user-default.png" alt="">
            </div>
            <div class="product-single-comment__feedback-info">
                <p class="product-single-comment__feedback-username">${data.khachhang_name}</p>
                <p class="product-single-comment__feedback-content">${data.content}</p>
                <p class="product-single-comment__feedback-time">${data.created_at}</p>
            </div>
        `;
    viewComment.prepend(feedbacktItem);
}
