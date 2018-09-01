		<footer id="main-footer" class="mt-4">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<h4 class="text-light">Tentang InMARK</h4>
							<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							&copy; 2018 startup logo is no a real thing. if it is, this site was not meant to be a mocker of it. <br>
							Trademark<a href="#" title="">Mikroskil Team</a>
						</div>
						<div class="col-md-2">
							<h6 class="text-primary">Panduan</h6>
							<ul class="list-unstyled">
								<li>Untuk Perusahaan</li>
								<li>Untuk Influencer</li>
								<li>Syarat Ketentuan</li>
								<li>Kebijakan Privasi</li>
							</ul>
						</div>
						<div class="col-md-2">
							<h6 class="text-primary">Tentang Kami</h6>
							<ul class="list-unstyled">
								<li>Perusahaan</li>
								<li>Layanan</li>
								<li>Karir</li>
								<li>sitemap</li>
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
		<!-- datatables -->
		<script type="text/javascript">
			$(document).ready( function () {
				$('#tableBeranda').DataTable({
					"ordering" : false,
                	"lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
				});
				$('table.beranda').DataTable({
					"displayLength": 5,
					"ordering" : false,
					"lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
				});
			} );
		</script>

		<!-- ckeditor -->
		<script src="<?=base_url('assets/plugins/ckeditor5/ckeditor.js');?>"></script>
		<!-- editprofile page -->
		<script>
			ClassicEditor
		    .create( document.querySelector( '#editor' ), {
		        toolbar: [ 'heading', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ]
		    } )
		    .catch( error => {
		        console.log( error );
		    } );
		</script>
		<script>
			ClassicEditor
		    .create( document.querySelector( '#editor2' ), {
		        toolbar: [ 'heading', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ]
		    } )
		    .catch( error => {
		        console.log( error );
		    } );
		</script>

		<!-- ajukan proposal page -->
		<script>
			ClassicEditor
		    .create( document.querySelector( '#proposal' ), {
		        toolbar: [ 'heading', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ]
		    } )
		    .catch( error => {
		        console.log( error );
		    } );
		</script>
		<!-- ajukan laporan proyek page -->
		<script>
			ClassicEditor
		    .create( document.querySelector( '#deskripsi' ), {
		        toolbar: [ 'heading', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ]
		    } )
		    .catch( error => {
		        console.log( error );
		    } );
		</script>
	</body>
</html>