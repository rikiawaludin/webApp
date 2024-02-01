<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h1 class="text-white pb-2 fw-bold">
                            <?= $title; ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Pengguna berdasarkan Departemen</div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="bar"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Pengguna terlibat dalam project</div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="line"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- chartriki -->

    <!-- chart Departemen -->
    <script>

        const baseUrl = "<?= base_url(); ?>"
        const myChart = (chartType) => {
            $.ajax({
                url: baseUrl + 'Admin/chart_departemen',
                dataType: 'json',
                method: 'GET',
                success: data => {
                    let chartX = []
                    let chartY = []
                    data.map(data => {
                        chartX.push(data.nama_departemen);
                        chartY.push(data.jumlah_pengguna);
                    });
                    const chartData = {
                        labels: chartX,
                        datasets: [{
                            label: 'user',
                            data: chartY,
                            backgroundColor: [],
                            borderColor: [],
                            borderWidth: 1
                        }]
                    }
                    const ctx = document.getElementById(chartType).getContext('2d')
                    const config = {
                        type: chartType,
                        data: chartData
                    }

                    switch (chartType) {
                        case 'bar':
                            const barColor = ['skyblue', 'skyblue', 'skyblue']
                            chartData.datasets[0].backgroundColor = barColor
                            chartData.datasets[0].borderColor = barColor
                            break;
                        default:
                            config.options = {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                    }

                    const chart = new Chart(ctx, config)
                }
            })
        }

        myChart('bar')

    </script>

    <!-- chart Project -->
    <script>

        const base_url = "<?= base_url(); ?>"
        const chartProject = (chartType2) => {
            $.ajax({
                url: baseUrl + 'Admin/chart_project',
                dataType: 'json',
                method: 'GET',
                success: data => {
                    let chartX = []
                    let chartY = []
                    data.map(data => {
                        chartX.push(data.nama_project);
                        chartY.push(data.jumlah_userproject);
                    });
                    const chartData2 = {
                        labels: chartX,
                        datasets: [{
                            label: 'User',
                            data: chartY,

                            borderColor: ['brown'],
                            borderWidth: 1
                        }]
                    }
                    const ctx = document.getElementById(chartType2).getContext('2d')
                    const config = {
                        type: chartType2,
                        data: chartData2
                    }

                    // switch (chartType) {
                    //     case 'bar':
                    //         const barColor = ['skyblue', 'skyblue']
                    //         chartData.datasets[0].backgroundColor = barColor
                    //         chartData.datasets[0].borderColor = barColor
                    //         break;
                    //     default:
                    //         config.options = {
                    //             scales: {
                    //                 y: {
                    //                     beginAtZero: true
                    //                 }
                    //             }
                    //         }
                    // }

                    const chart = new Chart(ctx, config)
                }
            })
        }

        chartProject('line')

    </script>