// validate form add Mã sản phẩm
Validator({
    form: '#form-add-1',
    formGroupSelector:'.form-group',
    errorSelector: '.form-message',
    rules:[
        Validator.isRequired('#add_tensp', 'Vui lòng nhập tên sản phẩm'),
        Validator.isRequired('#add_productbrand', 'Vui lòng chọn Hãng sản xuất'),
        Validator.isRequired('#add_productmodel', 'Vui lòng chọn Model sản xuất'),
    ],
    onSubmit: function (data) {
        console.log('info send',data);
        $.ajax({
            url: 'admin.php?action=sanpham&act=add_action',
            type: 'POST',
            data: { data },
            dataType: 'json',
            success: function(response) {
                if(!response.error) {
                    document.querySelector('#form-add-1').reset();
                    const selectModel = document.getElementById('add_productmodel')
                    selectModel.innerHTML='<option value="">Chọn Model</option>'
                    Swal.fire({
                        title: "Đã Thêm SP!",
                        text: "Thêm sản phẩm thành công",
                        icon: "success"
                    });

                }
            },
            error: function(xhr, status, error) {
                console.error('Lỗi:', error);
            }
        })
    }
});
// validate form edit Mã sản phẩm
Validator({
    form: '#form-edit-1',
    formGroupSelector:'.form-group',
    errorSelector: '.form-message',
    rules:[
        Validator.isRequired('#edit_tensp', 'Vui lòng nhập tên sản phẩm'),
        Validator.isRequired('#edit_productbrand', 'Vui lòng chọn Hãng sản xuất'),
        Validator.isRequired('#edit_productmodel', 'Vui lòng chọn Model sản xuất'),
    ],
    onSubmit: function (data) {
        console.log('info send',data);
        $.ajax({
            url: 'admin.php?action=sanpham&act=edit_action',
            type: 'POST',
            data: { data },
            dataType: 'json',
            success: function(response) {
                if(!response.error) {
                    document.querySelector('#form-edit-1').reset();
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Sản phẩm đã sửa thành công",
                        showConfirmButton: false,
                        timer: 1500
                      }).then(() => {
                          location.href = './main.php?action=sanpham&act=list'

                      });
                } else {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                      })
                }
            },
            error: function(xhr, status, error) {
                console.error('Lỗi:', error);
            }
        })
    }
});
// thay đổi model trong form edit
function getModel_edit() {
    const selectBrand = document.getElementById('edit_productbrand');
    const selectModel = document.getElementById('edit_productmodel')
    const brandId = selectBrand.value;
    if(brandId) {
        $.ajax({
            url: 'admin.php?action=sanpham&act=get_model',
            type: 'POST',
            dataType: 'json',
            data: { brandId },
            success: function(response) {
                console.log('response :>> ', response);
                htmls = response.model.map(option => {
                    return `
                        <option value="${option.model_id}">${option.model_name}</option>
                    `;
                }).join('')
                selectModel.innerHTML = htmls;
            }
        })
    }
}

// thay đổi model trong form add
function getModel() {
    const selectBrand = document.getElementById('add_productbrand');
    const selectModel = document.getElementById('add_productmodel')
    const brandId = selectBrand.value;
    if(brandId) {
        $.ajax({
            url: 'admin.php?action=sanpham&act=get_model',
            type: 'POST',
            dataType: 'json',
            data: { brandId },
            success: function(response) {
                console.log('response :>> ', response);
                htmls = response.model.map(option => {
                    return `
                        <option value="${option.model_id}">${option.model_name}</option>
                    `;
                }).join('')
                selectModel.innerHTML = htmls;
            }
        })
    }
}

// delete mã sản phẩm;
function deleteMaSP(masp) {
    const itemMasp = document.querySelector(`.list-masp__item-${masp}`);
    // confirm
    Swal.fire({
        title: "Bạn muốn xóa mã sản phẩm này?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Đồng ý!"
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'admin.php?action=sanpham&act=delete_masp',
                type: 'POST',
                dataType: 'json',
                data: {masp},
                success: function(res) {
                    if(!res.error){
                        Swal.fire({
                            title: "Đã xóa!",
                            text: res.message,
                            icon: "success"
                        });
                        itemMasp.remove();
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: res.message,
                            icon: "error"
                        });
                    }
                }
            })
        }
      });
}