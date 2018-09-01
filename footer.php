		<footer id="main-footer" class="mt-1">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<h4 class="text-light">Tentang InMARK</h4>
							<p class="text-justify">InMark atau Influecer Marketplace yang berada di Indonesia. Memiliki Sekitar 1000 user Influencer. sehingga anda dapat mmeilih influencer sesuai dengan kebutuhan digital marketing anda</p> 
							&copy; 2018 startup Mirkorsil for Final Research<br>
							Trademark <a href="#" title="">Mikroskil Team</a>
						</div>
						<div class="col-md-2">
							<h6 class="text-primary">Panduan</h6>
							<ul class="list-unstyled">
								<li>
									<a href="#" class="text-light">Untuk Perusahaan</a>
								</li>
								<li>
									<a href="#" class="text-light">Untuk Influencer</a>
								</li>
								<li>
									<a href="#" class="text-light">Syarat Ketentuan</a>
								</li>
								<li>
									<a href="kebijakanprivasi.php" class="text-light">Kebijakan Privasi</a>
								</li>
							</ul>
						</div>
						<div class="col-md-2">
							<h6 class="text-primary">Tentang Kami</h6>
							<ul class="list-unstyled">
								<li><a href="about.php" class="text-light">Perusahaan</a></li>
								<li><a href="#" class="text-light">Layanan</a></li>
								<li><a href="#" class="text-light">Karir</a></li>
								<li><a href="#" class="text-light">sitemap</a></li>
							</ul>
						</div>
						<div class="col-md-2">
							<h6 class="text-primary">Ikuti Kami</h6>
							<ul class="list-unstyled">
								<li> <i class="fab fa-instagram"></i> Instagram</li>
								<li><i class="fab fa-twitter-square"></i> Twwitter</li>
								<li><i class="fab fa-facebook-square"></i> Facebook</li>
								<li><i class="fab fa-linkedin"></i> Linkedin</li>
								<li><i class="fab fa-google-plus-square"></i> Plus Google</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

		<!-- javascript file -->
		<script src="<?=base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
		<script src="<?=base_url('assets/js/popper.min.js');?>"></script>
		<script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
		<script defer src="<?=base_url('assets/js/fontawesome-all.min.js');?>"></script>
		<script src="<?=base_url('assets/js/ajax.js');?>"></script>
		<script src="<?=base_url('assets/js/datatables.min.js');?>"></script>
		<script type="text/javascript">
			$(document).ready( function () {
				$('#tableBeranda').DataTable({
					"ordering" : false,
                	"lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
				});
			} );
		</script>

	</body>
</html>