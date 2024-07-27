<style>
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .full-height {
        height: 100vh;
        display: flex;
        justify-content: center;
        /* align-items: center; */
    }

    .card {
        border-radius: 10px
    }

    fieldset:disabled input[type="text"],
    fieldset:disabled input[type="email"],
    fieldset:disabled input[type="phone"],
    fieldset:disabled input[type="address"] {
        background-color: #ffffff;
    }
</style>

<div class="full-height">
    <div class="container my-5">

        <!-- <?php $this->load->view('layouts/_alerts'); ?> -->

        <div class="row">
            <div class="col-md-3 col-sm-12">
                <?php $this->load->view('layouts/user/_sidebar') ?>
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="card">
                    <div class="card-header py-3">
                        <strong class="h5 font-weight-bold">Profil</strong>
                    </div>
                    <div class="card-body">
                        <!-- <?php $this->load->view('layouts/_alerts') ?> -->
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <img src="<?= $content->image ? base_url("/images/profile/$content->image") : base_url("/images/profile/avatar.png") ?>" alt="" width="200" class="img-responsive">
                            </div>
                            <div class="col-md-8 col-sm-12">
                                <fieldset class="m-0 p-0" disabled>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-4 col-sm-12 d-flex align-items-center">
                                            <label for="no_surat" class="form-label">Nama</label>
                                        </div>
                                        <div class="col-lg-10 col-md-8 col-sm-12">
                                            <input type="text" name="no_surat" class="form-control" id="disabledTextInput" value="<?= $content->name ?>" />
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-lg-2 col-md-4 col-sm-12 d-flex align-items-center">
                                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                                        </div>
                                        <div class="col-lg-10 col-md-8 col-sm-12">
                                            <input type="email" name="lampiran" class="form-control" id="exampleFormControlInput1" value="<?= $content->email ?>" />
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-lg-2 col-md-4 col-sm-12 d-flex align-items-center">
                                            <label for="exampleFormControlInput1" class="form-label">Phone</label>
                                        </div>
                                        <div class="col-lg-10 col-md-8 col-sm-12">
                                            <input type="phone" name="lampiran" class="form-control" id="exampleFormControlInput1" value="<?= $content->phone ?>" />
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-lg-2 col-md-4 col-sm-12 d-flex align-items-center">
                                            <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                                        </div>
                                        <div class="col-lg-10 col-md-8 col-sm-12">
                                            <input type="address" name="lampiran" class="form-control" id="exampleFormControlInput1" value="<?= $content->address ?>" />
                                        </div>
                                    </div>
                                </fieldset>
                                <!-- <p>Tanggal Bergabung : <?= date('d-m-Y h:i:s', strtotime($content->date_register)) ?>
                                </p> -->
                                <div class="mt-4">
                                    <a href="<?= base_url("/profile/update/$content->id") ?>" class="btn btn-dark btn-info px-3">Edit Profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>