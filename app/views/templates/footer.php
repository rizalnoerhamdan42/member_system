<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-light border-0">
                    <h5 class="modal-title font-weight-bold" id="logoutModalLabel">Konfirmasi Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center py-4">
                    <div class="text-danger mb-3">
                        <i class="fas fa-exclamation-triangle fa-3x"></i>
                    </div>
                    <p class="text-secondary px-3">Apakah Anda yakin ingin keluar dari akun? Anda harus login kembali untuk mengakses konten premium.</p>
                </div>
                <div class="modal-footer border-0 bg-light justify-content-center pb-4">
                    <button type="button" class="btn btn-light px-4 font-weight-bold" data-dismiss="modal">Batal</button>
 
                    <a href="index.php?action=logout" class="btn btn-danger px-4 font-weight-bold shadow-sm">Ya, Keluar Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-5 mb-4 text-center">
        <hr class="w-25">
        <p class="text-muted small">&copy; <?= date('Y') ?> Member System Pro. Built with <i class="fas fa-heart text-danger"></i> for quality content.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
        #logoutModal .modal-content { border-radius: 20px; }
        #logoutModal .modal-header { border-top-left-radius: 20px; border-top-right-radius: 20px; }
    </style>
</body>
</html>