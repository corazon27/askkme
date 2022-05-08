<div class="container">
    <!-- Outer Row -->
    <?= $this->session->flashdata('pesan'); ?>
    <?php unset($_SESSION['pesan']); ?>
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900">Change your password for</h1>
                                    <h5 class="mb-4"><?= $this->session->userdata('reset_email'); ?></h5>
                                </div>

                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" method="post" action="<?= base_url('auth/changepassword'); ?>">
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Enter new password..." onkeyup="return passwordChanged();">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <span id="strength"><small><i>Harus terdiri dari : Simbol, Huruf kecil-besar, dan Angka</i></small></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat password..." onkeyup="return passwordChanged2();">
                                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <span id="strength2"><small><i>Harus terdiri dari : Simbol, Huruf kecil-besar, dan Angka</i></small></span>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Change Password
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script language="javascript">
    function passwordChanged() {
        var strength = document.getElementById('strength');
        var strongRegex = new RegExp("^(?=.{12,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{10,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{7,}).*", "g");
        var pwd = document.getElementById("password1");
        if (pwd.value.length == 0) {
            strength.innerHTML = 'Type Password';
        } else if (false == enoughRegex.test(pwd.value)) {
            strength.innerHTML = '<span style="color:red">8 Karakter, Huruf Besar, Angka & Simbol</span>';
        } else if (strongRegex.test(pwd.value)) {
            strength.innerHTML = '<span style="color:green">Kuat..!</span>';
        } else if (mediumRegex.test(pwd.value)) {
            strength.innerHTML = '<span style="color:orange">Cukup..!</span>';
        } else {
            strength.innerHTML = '<span style="color:red">Lemah..!</span>';
        }
    }

    function passwordChanged2() {
        var strength2 = document.getElementById('strength2');
        var strongRegex = new RegExp("^(?=.{12,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{10,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{7,}).*", "g");
        var pwd = document.getElementById("password2");
        if (pwd.value.length == 0) {
            strength2.innerHTML = 'Type Password';
        } else if (false == enoughRegex.test(pwd.value)) {
            strength2.innerHTML = '<span style="color:red">8 Karakter, Huruf Besar, Angka & Simbol</span>';
        } else if (strongRegex.test(pwd.value)) {
            strength2.innerHTML = '<span style="color:green">Kuat..!</span>';
        } else if (mediumRegex.test(pwd.value)) {
            strength2.innerHTML = '<span style="color:orange">Cukup..!</span>';
        } else {
            strength2.innerHTML = '<span style="color:red">Lemah..!</span>';
        }
    }
</script>