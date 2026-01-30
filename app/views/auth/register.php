<?php include 'app/views/templates/header.php'; ?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0" style="border-radius: 15px;">
                <div class="card-body p-5">
                    <h3 class="text-center mb-4 font-weight-bold">Daftar Membership</h3>

                    <form action="index.php?action=register_process" method="POST" id="registerForm" novalidate>

                        <div class="form-group">
                            <label class="font-weight-bold">Username</label>
                            <input type="text" name="username" id="username" class="form-control"
                                placeholder="Masukkan nama" required>
                            <div class="invalid-feedback" id="usernameError">Username minimal terdiri dari 3 karakter.
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="email@contoh.com" required>
                            <div id="emailFeedback" class="small mt-1 font-weight-bold"></div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Minimal 6 karakter" required>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-white" id="togglePassword"
                                        style="cursor: pointer;">
                                        <i class="fas fa-eye text-muted" id="eyeIcon"></i>
                                    </span>
                                </div>
                                <div class="invalid-feedback" id="passwordError">Password minimal terdiri dari 6
                                    karakter.</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Pilih Tipe Membership</label>
                            <select name="membership_id" id="membership" class="form-control" required>
                                <option value="">-- Pilih Paket --</option>
                                <option value="1">Tipe A (3 Artikel & 3 Video)</option>
                                <option value="2">Tipe B (10 Artikel & 10 Video)</option>
                                <option value="3">Tipe C (Akses Seluruh Konten)</option>
                            </select>
                            <div class="invalid-feedback">Silakan pilih salah satu paket membership.</div>
                        </div>

                        <button type="submit" id="btnSubmit" class="btn btn-success btn-block btn-lg mt-4 shadow-sm">
                            <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <span class="text-muted">Sudah punya akun?</span> <a href="index.php?page=login"
                            class="font-weight-bold text-success">Login di sini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Style validasi kustom */
.form-control.is-invalid {
    border-color: #dc3545 !important;
}

.form-control.is-valid {
    border-color: #28a745 !important;
}

.text-error {
    color: #dc3545 !important;
}

.text-success-valid {
    color: #28a745 !important;
}

.invalid-feedback {
    font-weight: 500;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registerForm');
    const emailInput = document.getElementById('email');
    const emailFeedback = document.getElementById('emailFeedback');
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');
    const eyeIcon = document.getElementById('eyeIcon');

    // 1. Fitur Hide/Unhide Password
    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        eyeIcon.classList.toggle('fa-eye-slash');
        eyeIcon.classList.toggle('fa-eye');
    });

    // 2. Validasi Email Real-time
    emailInput.addEventListener('input', function() {
        // SETIAP KETIK: Hapus pesan dan warna border
        this.classList.remove('is-invalid', 'is-valid');
        emailFeedback.innerHTML = "";

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const val = this.value.trim();

        if (val !== "") {
            if (emailRegex.test(val)) {
                // Muncul HIJAU hanya jika format SUDAH BENAR
                emailFeedback.innerHTML = "Format email sudah sesuai";
                emailFeedback.className = "small mt-1 font-weight-bold text-success-valid";
                this.classList.add('is-valid');
            } else {
                // Muncul MERAH jika format MASIH SALAH
                emailFeedback.innerHTML = "Format email salah";
                emailFeedback.className = "small mt-1 font-weight-bold text-error";
                this.classList.add('is-invalid');
            }
        }
    });

    // 3. Validasi Form saat Submit
    form.addEventListener('submit', function(event) {
        let isValid = true;
        const username = document.getElementById('username');
        const membership = document.getElementById('membership');
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Validasi Username
        if (username.value.trim().length < 3) {
            username.classList.add('is-invalid');
            isValid = false;
        }

        // Validasi Email
        if (!emailRegex.test(emailInput.value.trim())) {
            emailInput.classList.add('is-invalid');
            emailFeedback.innerHTML = "Format email salah";
            emailFeedback.className = "small mt-1 font-weight-bold text-error";
            isValid = false;
        }

        // Validasi Password
        if (passwordInput.value.length < 6) {
            passwordInput.classList.add('is-invalid');
            isValid = false;
        }

        // Validasi Membership
        if (membership.value === "") {
            membership.classList.add('is-invalid');
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    });

    // Reset is-invalid untuk field lain saat diketik
    const otherInputs = document.querySelectorAll('.form-control:not(#email)');
    otherInputs.forEach(input => {
        input.addEventListener('input', function() {
            this.classList.remove('is-invalid');
        });
    });
});
</script>

<?php include 'app/views/templates/footer.php'; ?>