<meta charset="UTF-8">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <h2 class="thongke_title">Thống Kê</h2>
    <nav>
        <h5>Filter:</h5>
        <select class="thongke_select form-select w-25" name="year" id="" onchange="showFilter()">
            <option selected disabled value="">Time group</option>
            <option value="year">Năm</option>
            <option value="month">Tháng</option>
            <option value="day">Ngày</option>
        </select>
    </nav>

    <section class="thongke-filter__year-wrapper">
        <div class="thongke-filter__year ">
            <h5 class="mb-0 me-3">Thống kê theo năm</h5>
            <span>Năm:</span>
            <input type="number" class="form-control ms-2 thongke-filter__year-input" name="year" min="2018" value="2023">
            <span class="ms-2">>>></span>
            <input type="number" class="current-year ms-2 form-control" value="" name="year-end" min="2018" max="2023">
            <button class="btn btn-primary ms-2" onclick="submitThongKeFilter('year')">Filter</button>
        </div>
    </section>

    <section class="thongke-filter__month-wrapper">
        <div class="thongke-filter__month ">
            <h5 class="mb-0 me-3" style="width:250px">Thống kê theo tháng</h5>
            <span>Năm:</span>
            <input type="number" class="form-control ms-2 thongke-filter__month-input" 
            name="year" value="2023" require min="2018" max="2023"
            style="width:100px;">
            <span class="ms-2">>>></span>
            <select class="form-select w-25 ms-2" name="month">
                <option value="">Chọn tháng</option>
                    <?php foreach( range(1,12) as $rw ): ?>
                    <option value="<?php echo $rw?>"><?php echo $rw?></option>
                    <?php endforeach?>
                </select>

            <button class="btn btn-primary ms-2" onclick="submitThongKeFilter('month')">Filter</button>
        </div>
    </section>

    <section class="thongke-filter__day-wrapper">
        <div class="thongke-filter__day ">
            <h5 class="mb-0 me-3" style="width:200px">Thống kê theo ngày</h5>
            <span>Từ:</span>
            <input type="date" class="form-control ms-2 thongke-filter__day-input" 
            name="date" require value="2023-11-01" min="2018-01-01" max="2023-12-31"
            style="width:138px;">
            <span class="ms-2">>>></span>
            <input type="date" class="form-control ms-2 thongke-filter__day-input current-date" 
            name="dateEnd" require value="2023-01-01" min="2018-01-01" max="2023-12-31"
            style="width:138px;">

            <button class="btn btn-primary ms-2" onclick="submitThongKeFilter('day')">Filter</button>
        </div>
    </section>

    <!-- Div để chứa biểu đồ -->
    <div class="chart-wrapper">
        <div class="row">
            <div class="col-8 chart-col__wrapper">
                <div id="chart_div" style="width: 750px; height: 500px;"></div>
            </div>
            <div class="col-4">
                <div class="table-chart">
                    <table class="table ">
                        <h5 class="text-center mb-3">Thông tin</h5>
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody class="table-chart__body">
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
<script>
// Load thư viện Google Charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

const d = new Date();
let year = d.getFullYear();
let day = d.getDate();
let month = d.getMonth() + 1;
document.querySelector('.current-year').value = year;
document.querySelector('.current-date').value = `${year}-${month}-${day}`;
// Hàm vẽ biểu đồ
function drawChart() {
    // Sử dụng jQuery để gửi yêu cầu AJAX đến trang PHP và lấy dữ liệu
    $.ajax({
        url: './admin.php?action=thongke&act=get_thongke',
        dataType: 'json',
        success: function(res) {
            //Chuyển đổi dữ liệu JSON thành mảng dữ liệu Google Charts
            drawThongke(res.data);
        }
    });
}
function drawThongke(data) {
    var chartData = [];
            chartData.push(['Tensp', 'Soluong']);
            for (var i = 0; i < data.length; i++) {
                chartData.push([data[i].tensp, data[i].soluong]);
            }

            // Tạo bảng dữ liệu Google Charts
            var dataTable = google.visualization.arrayToDataTable(chartData);

            // Cấu hình và vẽ biểu đồ
            var options = {
                title: 'Biếu Đồ Thống Kê',
                // ... other options
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(dataTable, options);
            // chèn bảng:
            const tbodyView = document.querySelector('.table-chart__body')
            let htmls = data.map(item => {
                return `
                    <tr>
                        <td>${item.tensp}</td>
                        <td>${item.soluong}</td>
                    </tr>
                `
            }).join('');
            tbodyView.innerHTML = htmls;
}
function showFilter() {
    const curr = document.querySelector('.thongke__open')
    const thongKe = document.querySelector('.thongke_select').value
    const irtemFilter = document.querySelector(`.thongke-filter__${thongKe}-wrapper`)

    if(curr) {
        curr.classList.remove('thongke__open')
    }
    irtemFilter.classList.add('thongke__open')
}
function submitThongKeFilter(type) {
    const formInput = document.querySelector(`.thongke-filter__${type}`)
    switch(type){
        case 'year':
            const inputItem = formInput.querySelector(`input[name="${type}"]`).value
            const inputItemEnd = formInput.querySelector(`input[name="${type}-end"]`).value
            console.log('inputItem :>> ', inputItem);
            if(inputItem && inputItemEnd) {
                $.ajax({
                    type: 'POST',
                    url: './admin.php?action=thongke&act=thongke_filter',
                    dataType: 'json',
                    data: { type, year:inputItem, yearEnd: inputItemEnd },
                    success: function(res) {
                        if(!res.error) {
                            drawThongke(res.data);

                        } else {
                            alert('Không có dữ liệu')
                        }
                    }
                })
            } else {
                console.log('Không để trống :>> ');
            }
        break;
        case 'month':
            const inputYear = formInput.querySelector(`input[name="year"]`).value
            const inputMonth = formInput.querySelector(`select[name="${type}"]`).value
            if(inputYear && inputMonth) {
                $.ajax({
                    type: 'POST',
                    url: './admin.php?action=thongke&act=thongke_filter',
                    dataType: 'json',
                    data: { type, year:inputYear, month: inputMonth },
                    success: function(res) {
                        if(!res.error) {
                            drawThongke(res.data);
                        } else {
                            alert('Không có dữ liệu')
                        }
                    //Chuyển đổi dữ liệu JSON thành mảng dữ liệu Google Charts
                    }
                })
            } else {
                console.log('Không để trống :>> ');
            }

        break;
        case 'day':
            const day = formInput.querySelector(`input[name="date"]`).value
            const dayEnd = formInput.querySelector(`input[name="dateEnd"]`).value
            if(day && dayEnd) {
                $.ajax({
                    type: 'POST',
                    url: './admin.php?action=thongke&act=thongke_filter',
                    dataType: 'json',
                    data: { type, day, dayEnd },
                    success: function(res) {
                        if(!res.error) {
                            drawThongke(res.data);
                        } else {
                            alert('Không có dữ liệu')
                        }
                    //Chuyển đổi dữ liệu JSON thành mảng dữ liệu Google Charts
                    }
                })
            } else {
                console.log('Không để trống :>> ');
            }
        break;
        default:
            console.log('invalid :>> ');
    }
    
}
</script>   