<style>
	body {
		width: 100%;
		height: 100%;
		margin: 0;
		padding: 0;
		background-color: #FAFAFA;

	}

	* {
		box-sizing: border-box;
		-moz-box-sizing: border-box;
	}

	.page {
		width: 210mm;
		min-height: 297mm;
		padding: 20mm;
		margin: 10mm auto;
		border-radius: 5px;
		background: white;
		box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
	}

	.center {
		display: block;
		margin-left: auto;
		margin-right: auto;

	}

	.subpage {
		padding: 1cm;
		height: 257mm;
	}

	@page {
		size: A4;
		margin: 0;
	}

	@media print {

		html,
		body {
			width: 210mm;
			height: 297mm;
		}

		.page {
			margin: 0;
			border: initial;
			border-radius: initial;
			width: initial;
			min-height: initial;
			box-shadow: initial;
			background: initial;
			page-break-after: always;
		}
	}
</style>

<div class="book">
	<div class="page">
		<div class="subpage">
			<img src="<?php echo base_url() . 'assets/images/edii.png' ?>" style="width:250px;" class="center"><br>
			<h1 style="text-align:center;">DATA PRIBADI PELAMAR</h1>
			<form>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Posisi yang dilamar</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="posisi" placeholder="Posisi yang dilamar">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Nama</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">No KTP</label>
					<div class="col-sm-9">
						<input type="number" class="form-control" name="no_ktp" placeholder="NO KTP">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Tempat Tanggal Lahir</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="ttl" placeholder="Tempat Tanggal Lahir">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Jenis Kelamin</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="jk" placeholder="Jenis Kelamin">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Agama</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="agama" placeholder="Agama">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Golongan Darah</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="golongan" placeholder="Golongan Darah">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Status</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="status" placeholder="Status">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Alamat KTP</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="alamat1" placeholder="Alamat KTP">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Alamat Tinggal</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="alamat2" placeholder="Alamat Tinggal">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Email</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="email" placeholder="Email">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">No Telpon</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="notelp" placeholder="No Telpon">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Orang terdekat yang dapat dihubungi</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="terdekat" placeholder="Orang terdekat yang dapat dihubungi">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>