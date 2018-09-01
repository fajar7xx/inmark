 </div>
    </div>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=base_url('assets/js/jquery-3.3.1.slim.min.js');?>" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/jquery-3.3.1.slim.min.js"><\/script>')</script>
    <script src="<?=base_url('assets/js/popper.min.js');?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
    <!-- Icons -->
    <script src="<?=base_url('assets/js/feather.min.js');?>"></script>
    <script>
    feather.replace()
    </script>
    <!-- DataTables -->
    <script type="text/javascript" src="<?=base_url('admin/assets/plugins/DataTables/datatables.min.js');?>"></script>
    <script>
        $(document).ready( function () {
            $('#proyek').DataTable({
                "ordering" : false,
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
            });
            $('table.dashboard').DataTable({
                "displayLength": 5,
                "ordering" : true,
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
            });
            $('#tabel').DataTable({
                "ordering" : true,
                "lengthMenu": [[ 10, 25, 50, -1], [ 10, 25, 50, "All"]]
            });
        } );
    </script>


    <!-- Graphs -->
    <!-- <script src="assets/js/Chart.min.js"></script>
    <script>
    var ctx = document.getElementById("myChart"); var myChart = new Chart(ctx, { type: 'line', data: { labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"], datasets: [{ data: [15339, 21345, 18483, 24003, 23489, 24092, 12034], lineTension: 0, backgroundColor: 'transparent', borderColor: '#007bff', borderWidth: 4, pointBackgroundColor: '#007bff' }] }, options: { scales: { yAxes: [{ ticks: { beginAtZero: false } }] }, legend: { display: false, } } });
    </script> -->
    <?php ob_end_flush(); ?>
  </body>
</html>