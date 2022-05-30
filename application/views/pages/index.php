<?php $this->load->view("_partials/header")?>
    <div class="wrapper">
        <div class="sticky-top">
            <?php $this->load->view("_partials/navbar-header")?>
            <?php $this->load->view("_partials/navbar")?>
        </div>
        <div class="page-wrapper">
            <div class="page-body">
                <div class="container-xl">
                    <div class="card">
                        <div class="card-body">
                            <div class="row row-cards">
                                <div class="col-sm-12 col-lg-4">
                                    <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-blue text-white avatar">
                                                <?= tablerIcon("users", "icon");?>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                            <?= $peserta?> Peserta 
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-4">
                                    <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-green text-white avatar">
                                                <?= tablerIcon("award", "icon");?>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                            <?= $sertifikat?> Sertifikat
                                            </div>
                                            <!-- <div class="text-muted">
                                            32 shipped
                                            </div> -->
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-4">
                                    <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-twitter text-white avatar">
                                                <?= tablerIcon("files", "icon");?>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                            <?= $tes?> Tes
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
        
                                
                                
                            </div>

                            <div class="card mt-3">
                                <div class="card-body">
                                    
                                    <div style="height:50vh;">
                                        <canvas id="myChart"></canvas>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view("_partials/footer-bar")?>
        </div>
    </div>
    
    <!-- load modal -->
    <?php 
        if(isset($modal)) :
            foreach ($modal as $i => $modal) {
                $this->load->view("_partials/modal/".$modal);
            }
        endif;
    ?>

    <!-- load javascript -->
    <?php  
        if(isset($js)) :
            foreach ($js as $i => $js) :?>
                <script src="<?= base_url()?>assets/myjs/<?= $js?>"></script>
                <?php 
            endforeach;
        endif;    
    ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.js"></script>

    <script>
        $("#Dashboard").addClass("active")
        
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= $label?>,
                datasets: [{
                    label: 'Peserta',
                    data: <?= $data?>,
                    backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                    'rgba(75, 192, 192, 1)',
                    ],
                borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                },
                // responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
<?php $this->load->view("_partials/footer")?>