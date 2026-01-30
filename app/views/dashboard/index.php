<?php
// memastikan session user ada, jika tidak ke login
if (!isset($_SESSION['user'])) {
    header("Location: index.php?page=login");
    exit;
}

include 'app/views/templates/header.php';

$u = $_SESSION['user'];

/**
 * Convert Youtube URL to Embed URL
 */
function youtubeEmbed($url)
{
    if (!$url) return '';

    $parts = parse_url($url);
    $videoId = '';

    // youtube.com/watch?v=
    if (!empty($parts['query'])) {
        parse_str($parts['query'], $query);
        if (!empty($query['v'])) {
            $videoId = $query['v'];
        }
    }

    // youtu.be/ID
    if (($parts['host'] ?? '') === 'youtu.be') {
        $videoId = trim($parts['path'], '/');
    }

    // already embed link
    if (strpos($parts['path'] ?? '', '/embed/') !== false) {
        $videoId = basename($parts['path']);
    }

    if (!$videoId) return '';

    return "https://www.youtube.com/embed/" . $videoId;
}
?>

<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0 bg-white p-4">
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <div class="mb-2">
                        <h4 class="mb-1 font-weight-bold">
                            Selamat Datang,
                            <span class="text-primary"><?= htmlspecialchars($u['username']) ?></span>!
                        </h4>
                        <p class="text-muted mb-0">
                            Status Keanggotaan:
                            <span class="badge badge-pill badge-primary px-3 py-2">
                                <i class="fas fa-crown mr-1"></i>
                                <?= htmlspecialchars($u['type_name']) ?>
                            </span>
                        </p>
                    </div>

                    <div class="text-md-right mb-2">
                        <small class="text-muted d-block font-italic">
                            ID Member: #<?= str_pad($u['id'], 5, '0', STR_PAD_LEFT) ?>
                        </small>

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

        <!-- ARTIKEL -->
        <div class="col-lg-6 mb-4">
            <div class="d-flex align-items-center mb-3">
                <div class="icon-box bg-info text-white mr-3 rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                    style="width:45px;height:45px;">
                    <i class="fas fa-file-alt"></i>
                </div>

                <h5 class="mb-0 font-weight-bold">
                    Daftar Artikel
                    <span class="badge badge-light border ml-2">
                        <?= $u['article_limit'] ?> Akses
                    </span>
                </h5>
            </div>

            <div class="accordion shadow-sm rounded overflow-hidden" id="accordionArtikel">

                <?php if(empty($articles)): ?>
                <div class="alert alert-light border text-center">
                    Belum ada artikel untuk tipe membership Anda.
                </div>
                <?php else: ?>

                <?php foreach($articles as $index => $a): ?>
                <div class="card border-0 border-bottom">

                    <div class="card-header bg-white p-0">
                        <button
                            class="btn btn-link btn-block text-left text-dark font-weight-bold d-flex justify-content-between align-items-center py-3 px-4 collapsed"
                            type="button" data-toggle="collapse" data-target="#collapseArt<?= $index ?>">
                            <span>
                                <i class="far fa-file-alt text-info mr-3"></i>
                                <?= htmlspecialchars($a['title']) ?>
                            </span>
                            <i class="fas fa-chevron-down fa-xs text-muted"></i>
                        </button>
                    </div>

                    <div id="collapseArt<?= $index ?>" class="collapse" data-parent="#accordionArtikel">
                        <div class="card-body bg-light text-secondary py-4 px-4">
                            <?= nl2br(htmlspecialchars($a['body'])) ?>
                        </div>
                    </div>

                </div>
                <?php endforeach; ?>

                <?php endif; ?>
            </div>
        </div>

        <!-- VIDEO -->
        <div class="col-lg-6 mb-4">
            <div class="d-flex align-items-center mb-3">
                <div class="icon-box bg-danger text-white mr-3 rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                    style="width:45px;height:45px;">
                    <i class="fas fa-play"></i>
                </div>

                <h5 class="mb-0 font-weight-bold">
                    Koleksi Video
                    <span class="badge badge-light border ml-2">
                        <?= $u['video_limit'] ?> Akses
                    </span>
                </h5>
            </div>

            <div class="accordion shadow-sm rounded overflow-hidden" id="accordionVideo">

                <?php if(empty($videos)): ?>
                <div class="alert alert-light border text-center">
                    Belum ada video untuk tipe membership Anda.
                </div>
                <?php else: ?>

                <?php foreach($videos as $index => $v): ?>
                <?php $embedUrl = youtubeEmbed($v['body']); ?>

                <div class="card border-0 border-bottom">

                    <div class="card-header bg-white p-0">
                        <button
                            class="btn btn-link btn-block text-left text-dark font-weight-bold d-flex justify-content-between align-items-center py-3 px-4 collapsed"
                            type="button" data-toggle="collapse" data-target="#collapseVid<?= $index ?>">
                            <span>
                                <i class="fas fa-video text-danger mr-3"></i>
                                <?= htmlspecialchars($v['title']) ?>
                            </span>
                            <i class="fas fa-chevron-down fa-xs text-muted"></i>
                        </button>
                    </div>

                    <div id="collapseVid<?= $index ?>" class="collapse" data-parent="#accordionVideo">
                        <div class="card-body bg-light py-4 px-4">

                            <?php if ($embedUrl): ?>
                            <div class="embed-responsive embed-responsive-16by9 rounded shadow-sm mb-3">
                                <iframe class="embed-responsive-item" src="<?= htmlspecialchars($embedUrl) ?>"
                                    allowfullscreen></iframe>
                            </div>
                            <?php else: ?>
                            <div class="alert alert-warning text-center">
                                Video tidak dapat ditampilkan.
                            </div>
                            <?php endif; ?>

                            <p class="text-muted small mb-0 font-italic">
                                * Konten eksklusif untuk Member <?= $u['type_name'] ?>
                            </p>

                        </div>
                    </div>

                </div>
                <?php endforeach; ?>

                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<?php include 'app/views/templates/footer.php'; ?>