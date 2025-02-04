<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="google" content="notranslate">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>
    <meta name="description" content="<?= !empty($description) ? $description : '' ?>">

    <meta property="og:title" content="<?= htmlspecialchars($title) ?>">
    <meta property="og:description" content="<?= !empty($description) ? $description : '' ?>">
    <meta property="og:image" content="<?= !empty($thumbnail) ? $thumbnail : '' ?>">
    <meta property="og:url" content="<?= DOMAIN ?>">

    <link rel="shortcut icon" href="<?= DOMAIN ?>assets/imgs/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
    <link rel="stylesheet" href="<?= DOMAIN ?>assets/css/default.css">
    <link rel="stylesheet" href="<?= DOMAIN ?>assets/css/base.css">
    <?php foreach ($csss as $css): ?>
        <link rel="stylesheet" href="<?= DOMAIN . 'assets/css/' . $css ?>.css">
    <?php endforeach; ?>
    <script src="<?= DOMAIN ?>assets/js/post.js"></script>
    <script src="<?= DOMAIN ?>assets/js/update.js"></script>
</head>

<body>
    <div id="toast">
        <div class="toast-wrapper">
            <div class="toast-head">
            </div>
            <div class="toast-body">
                <div class="toast-title"></div>
                <div class="toast-content"></div>
            </div>
            <div class="toast-foot">
                <i class="fa-light fa-xmark"></i>
            </div>
        </div>
    </div>
    <div class="app">
        <?= $this->render('components/header', $data) ?>
        <div class="container">
            <div class="container-wrapper">
                <?= $this->render($content, $data) ?>
            </div>
        </div>
        <!-- <?= $this->render('components/footer') ?> -->
    </div>
    <script type="module" src="<?= DOMAIN ?>assets/js/default.js"></script>
    <?php foreach ($jss as $js): ?>
        <script type="module" src="<?= DOMAIN . 'assets/js/' . $js ?>.js"></script>
    <?php endforeach; ?>
</body>

</html>