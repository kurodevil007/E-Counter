<div class="container-fluid">
	<?php
    if (($this->session->flashdata('msg'))) { ?>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-warning">
                <div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i
								class="fa fa-close"></i>
						</button>
					</div>
				<div class="box-body">
				<?php echo $this->session->flashdata('msg'); ?>
                </div>
			</div>
		</div>
	</div>
	<?php } ?>

	<div class="row">
		<div class="col-md-6">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Data Kartu</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i
								class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<?php echo form_open('main') ?>
					<div class="form-group">
						<label for="nomor">Nomor</label>
						<input type="text" class="form-control" name="nomor" autocomplete="off">
						<?php echo form_error('nomor'); ?>
					</div>
					<div class="form-group">
						<label for="provider">Provider</label>
						<select class="form-control select2" style="width: 100%;" name="provider">
							<option>Axis</option>
							<option>Tri</option>
							<option>Telkomsel</option>
							<option>Indosat</option>
							<option>XL</option>
						</select>
						<?php echo form_error('provider'); ?>
					</div>
					<div class="form-group">
						<label for="kuota">Kuota (GB)</label>
						<input type="text" class="form-control" name="kuota" autocomplete="off">
						<?php echo form_error('kuota'); ?>
					</div>
					<div class="form-group">
						<label for="pulsa">Pulsa</label>
						<input type="text" class="form-control" name="pulsa" autocomplete="off">
						<?php echo form_error('pulsa'); ?>
					</div>
					<div class="form-group">
						<label for="harga">Harga</label>
						<input type="text" class="form-control" name="harga" autocomplete="off">
						<?php echo form_error('harga'); ?>
					</div>

					<div class="form-group">
						<label for="masa_aktif">Masa Aktif</label>
						<input type="text" class="form-control" id="datepicker_nomor" name="masa_aktif" autocomplete="off">
						<?php echo form_error('masa_aktif'); ?>
					</div>
					<div class="form-group">
						<label for="registrasi">Registrasi Kartu</label>
						<input type="text" class="form-control" disabled value="<?php echo date('d M Y') ?>">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-flat btn-primary">Tambah</button>
					</div>
					<?php echo form_close() ?>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Isi Ulang Pulsa</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i
								class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<?php echo form_open('main/') ?>
					<div class="form-group">
						<label for="nomor">Nomor</label>
						<input type="text" class="form-control" name="nomor" autocomplete="off">
						<?php echo form_error('nomor'); ?>
					</div>
					<div class="form-group">
						<label>Provider</label>
						<select class="form-control select2" style="width: 100%;" name="provider">
							<option selected="selected">Axis</option>
							<option>Tri</option>
							<option>Telkomsel</option>
							<option>Indosat</option>
							<option>XL</option>
						</select>
						<?php echo form_error('provider'); ?>
					</div>
					<div class="form-group">
						<label>Nominal</label>
						<select class="form-control select2" style="width: 100%;" name="jml_pulsa" autocomplete="off">
							<option selected="selected">Rp. 5.000</option>
							<option>Rp. 10.000</option>
							<option>Rp. 20.000</option>
							<option>Rp. 50.000</option>
							<option>Rp. 100.000</option>
						</select>
					</div>
					<div class="form-group">
						<label for="Tanggal Isi Pulsa">Tanggal Isi Pulsa</label>
						<input type="text" class="form-control" disabled value="<?php echo date('d M Y') ?>">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-flat btn-primary">Tambah</button>
					</div>
					<?php echo form_close() ?>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</div>
