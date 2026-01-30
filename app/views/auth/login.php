<?php include 'app/views/templates/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0" style="border-radius: 15px;">
                <div class="card-body p-5">
                    <h4 class="text-center font-weight-bold mb-4">Member Login</h4>

                    <form action="index.php?action=login_process" method="POST" id="loginForm" novalidate>

                        <div class="form-group mb-3">
                            <label class="small font-weight-bold">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Masukkan Email" required>
                            <div class="invalid-feedback" id="emailError">Format email tidak valid atau kosong.</div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="small font-weight-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Masukkan Password" required>
                            <div class="invalid-feedback">Password minimal harus diisi.</div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-sm">Login</button>
                    </form>

                    <div class="text-center my-3">
                        <small class="text-muted text-uppercase font-weight-bold">Atau masuk dengan</small>
                    </div>

                    <div class="row no-gutters mb-4">
                        <div class="col-6 pr-1">
                            <a href="oauth_callback.php?provider=Google" class="btn btn-outline-danger btn-block">
                                <i class="fab fa-google mr-2"></i>Google
                            </a>
                        </div>
                        <div class="col-6 pl-1">
                            <a href="oauth_callback.php?provider=Facebook" class="btn btn-outline-primary btn-block">
                                <i class="fab fa-facebook-f mr-2"></i>Facebook
                            </a>
                        </div>
                    </div>

                    <p class="text-center mt-3 mb-0">
                        Belum punya akun? <a href="index.php?page=register"
                            class="text-primary font-weight-bold">Daftar</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(isset($_SESSION['show_modal_error'])): ?>
<div class="modal fade" id="dbErrorModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-body text-center p-5">
                <i class="fas fa-exclamation-circle text-danger fa-4x mb-3"></i>
                <h5 class="font-weight-bold">Akses Ditolak</h5>
                <p class="text-secondary"><?= $_SESSION['error_msg']; ?></p>
                <button type="button" class="btn btn-danger px-5 rounded-pill" data-dismiss="modal">Coba Lagi</button>
            </div>
        </div>
    </div>
</div>
<?php 
    unset($_SESSION['show_modal_error']); 
    unset($_SESSION['error_msg']);
endif; 
?>

<style>
/* Styling Error */
.form-control.is-invalid {
    border-color: #dc3545 !important;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
}

.invalid-feedback {
    color: #dc3545 !important;
    font-weight: 500;
    font-size: 0.85rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('loginForm');

    // Munculkan modal otomatis jika ada error dari database
    if ($('#dbErrorModal').length) {
        $('#dbErrorModal').modal('show');
    }

    form.addEventListener('submit', function(event) {
        let isValid = true;
        const email = document.getElementById('email');
        const password = document.getElementById('password');

        // 1. Validasi Email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email.value)) {
            email.classList.add('is-invalid');
            isValid = false;
        } else {
            email.classList.remove('is-invalid');
        }

        // 2. Validasi Panjang Karakter (Username/Email di kolom email)
        if (email.value.length > 0 && email.value.length < 3) {
            email.classList.add('is-invalid');
            document.getElementById('emailError').innerText =
                "Username/Email minimal terdiri dari 3 huruf.";
            isValid = false;
        }

        // 3. Validasi Kosong Password
        if (password.value === "") {
            password.classList.add('is-invalid');
            isValid = false;
        } else {
            password.classList.remove('is-invalid');
        }

        if (!isValid) {
            event.preventDefault();
            event.stopPropagation();
        }
    });


    document.querySelectorAll('.form-control').forEach(input => {
        input.addEventListener('input', function() {
            this.classList.remove('is-invalid');
        });
    });
});
</script>

<?php include 'app/views/templates/footer.php'; ?>