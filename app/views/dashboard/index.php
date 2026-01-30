<?php 
include 'app/views/templates/header.php'; 
// memastikan session user ada, jika tidak ke login
if (!isset($_SESSION['user'])) {
    header("Location: index.php?page=login");
    exit;
}
$u = $_SESSION['user'];
?>

<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0 bg-white p-4">
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <div class="mb-2">
                        <h4 class="mb-1 font-weight-bold">Selamat Datang, <span
                                class="text-primary"><?= htmlspecialchars($u['username']) ?></span>!</h4>
                        <p class="text-muted mb-0">Status Keanggotaan:
                            <span class="badge badge-pill badge-primary px-3 py-2">
                                <i class="fas fa-crown mr-1"></i> <?= htmlspecialchars($u['type_name']) ?>
                            </span>
                        </p>
                    </div>
                    <div class="text-md-right mb-2">
                        <small class="text-muted d-block font-italic">ID Member:
                            #<?= str_pad($u['id'], 5, '0', STR_PAD_LEFT) ?></small>
                        <button type="button" class="btn btn-sm btn-outline-danger mt-2 font-weight-bold"
                            data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt mr-1"></i> Logout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="d-flex align-items-center mb-3">
                <div class="icon-box bg-info text-white mr-3 rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                    style="width: 45px; height: 45px;">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h5 class="mb-0 font-weight-bold">Daftar Artikel <span
                        class="badge badge-light border ml-2"><?= $u['article_limit'] ?> Akses</span></h5>
            </div>

            <div class="accordion shadow-sm rounded overflow-hidden" id="accordionArtikel">
                <?php if(empty($articles)): ?>
                <div class="alert alert-light border text-center">Belum ada artikel untuk tipe membership Anda.</div>
                <?php else: ?>
                <?php foreach($articles as $index => $a): ?>
                <div class="card border-0 border-bottom">
                    <div class="card-header bg-white p-0" id="headingArt<?= $index ?>">
                        <button
                            class="btn btn-link btn-block text-left text-dark font-weight-bold d-flex justify-content-between align-items-center py-3 px-4 collapsed"
                            type="button" data-toggle="collapse" data-target="#collapseArt<?= $index ?>"
                            aria-expanded="false">
                            <span><i class="far fa-file-alt text-info mr-3"></i>
                                <?= htmlspecialchars($a['title']) ?></span>
                            <i class="fas fa-chevron-down fa-xs text-muted"></i>
                        </button>
                    </div>
                    <div id="collapseArt<?= $index ?>" class="collapse" data-parent="#accordionArtikel">
                        <div class="card-body bg-light text-secondary py-4 px-4" style="line-height: 1.8;">
                            <?= nl2br(htmlspecialchars($a['body'])) ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="d-flex align-items-center mb-3">
                <div class="icon-box bg-danger text-white mr-3 rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                    style="width: 45px; height: 45px;">
                    <i class="fas fa-play"></i>
                </div>
                <h5 class="mb-0 font-weight-bold">Koleksi Video <span
                        class="badge badge-light border ml-2"><?= $u['video_limit'] ?> Akses</span></h5>
            </div>

            <div class="accordion shadow-sm rounded overflow-hidden" id="accordionVideo">
                <?php if(empty($videos)): ?>
                <div class="alert alert-light border text-center">Belum ada video untuk tipe membership Anda.</div>
                <?php else: ?>
                <?php foreach($videos as $index => $v): ?>
                <div class="card border-0 border-bottom">
                    <div class="card-header bg-white p-0" id="headingVid<?= $index ?>">
                        <button
                            class="btn btn-link btn-block text-left text-dark font-weight-bold d-flex justify-content-between align-items-center py-3 px-4 collapsed"
                            type="button" data-toggle="collapse" data-target="#collapseVid<?= $index ?>"
                            aria-expanded="false">
                            <span><i class="fas fa-video text-danger mr-3"></i>
                                <?= htmlspecialchars($v['title']) ?></span>
                            <i class="fas fa-chevron-down fa-xs text-muted"></i>
                        </button>
                    </div>
                    <div id="collapseVid<?= $index ?>" class="collapse" data-parent="#accordionVideo">
                        <div class="card-body bg-light py-4 px-4">
                            <div
                                class="embed-responsive embed-responsive-16by9 rounded shadow-sm mb-3 bg-dark d-flex align-items-center justify-content-center">
                                <div class="text-white-50 text-center">
                                    <i class="fas fa-play-circle fa-3x mb-2"></i><br>
                                    <small>Video Source: <?= htmlspecialchars($v['body']) ?></small>
                                </div>
                            </div>
                            <p class="text-muted small mb-0 font-italic">* Konten eksklusif untuk Member
                                <?= $u['type_name'] ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
body {
    background-color: #f4f7f6;
}

.btn-link {
    text-decoration: none !important;
    transition: all 0.2s;
}

.btn-link:hover {
    background-color: #f8f9fa;
}

.badge-primary {
    background: linear-gradient(45deg, #4e73df, #224abe);
    border: none;
}

.accordion .card:last-child {
    border-bottom: 0 !important;
}

.icon-box {
    transition: transform 0.3s;
}

.icon-box:hover {
    transform: scale(1.1);
}
</style>

<?php include 'app/views/templates/footer.php'; ?>