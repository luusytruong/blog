<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="google" content="notranslate">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="<?= DOMAIN ?>/assets/css/admin.css">
</head>

<body>
    <div class="wrapper">
        <div class="table-wrapper">
            <div class="table-scroll">
                <?= $this->render("products/index", $data) ?>
            </div>
        </div>
        <div class="form-area">
            <form action="">
                <label>
                    <span>ID</span>
                    <input id="id" readonly type="number">
                </label>
                <label>
                    <span>Ten san pham</span>
                    <input id="name" type="text">
                </label>
                <label>
                    <span>Don gia</span>
                    <input id="price" type="number">
                </label>
                <label>
                    <span>So luong</span>
                    <input id="stock" type="number">
                </label>
                <span class="warning"></span>
            </form>
            <div class="btn-area">
                <button id="btn-create">Them moi</button>
                <button id="btn-read">Tai lai</button>
                <button id="btn-update">Cap nhat</button>
                <button id="btn-delete">Xoa</button>
            </div>
        </div>
    </div>
    <script src="<?= DOMAIN ?>/assets/js/admin.js"></script>
</body>

</html>