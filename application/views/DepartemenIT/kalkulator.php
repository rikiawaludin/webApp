<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h1 class="text-white pb-2 fw-bold">
                            Kalkulator
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--6">
            <div class="row">
                <div class="col-lg-8">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
        </div>

        <div class="page-inner mt--5">
            <div>
                <div class="card mb-3 col-lg-6">
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="card-body">
                                <label class="mb-4"><b>Kalkulator</b></label>
                                <form action="<?= base_url('departemenIT/hasilHitung') ?>" method="post">
                                    <div>
                                        <div class="form-group form-group-default">
                                            <label>Angka 1</label>
                                            <input id="angka1" name="angka1" type="text" class="form-control"
                                                placeholder="Masukkan Angka">
                                        </div>
                                    </div>
                                    <div class="form-group form-group-default">
                                        <label for="defaultSelect">Operasi Hitung</label>
                                        <select name="pilihOperasi" class="form-control form-control"
                                            id="defaultSelect">
                                            <option value="+">+</option>
                                            <option value="-">-</option>
                                            <option value="*">*</option>
                                            <option value="/">/</option>
                                        </select>
                                    </div>
                                    <div>
                                        <div class="form-group form-group-default">
                                            <label>Angka 2</label>
                                            <input id="angka2" name="angka2" type="text" class="form-control"
                                                placeholder="Masukkan Angka">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Hitung</button>
                                    <br>
                                </form>
                                <?php if (isset($hasil)): ?>
                                    <br>
                                    <div>
                                        <div class="form-group form-group-default">
                                            <label>Hasil</label>
                                            <input id="angka2" name="angka2" type="text" class="form-control"
                                                placeholder="Masukkan Angka" value="<?= $angka1 . ' ' . $pilihOperasi . ' ' . $angka2 . ' = ' . $hasil; ?>">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>