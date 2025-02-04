<?php
if (empty($navs)) {
    $navs = [
        [
            'link' => DOMAIN,
            'title' => 'Trang chủ',
            'icon' => '<i class="' . (!empty($state) && $state === 1 ? 'fa-solid' : 'fa-light') . ' fa-house"></i>',
            'state' => (!empty($state) && $state === 1) ? 1 : 0,
        ],
        [
            'link' => DOMAIN . 'myPost',
            'title' => 'Bai dang cua ban',
            'icon' => '<i class="' . (!empty($state) && $state === 2 ? 'fa-solid' : 'fa-light') . ' fa-newspaper"></i>',
            'state' => (!empty($state) && $state === 2) ? 1 : 0,
        ],
        [
            'link' => DOMAIN . 'about',
            'title' => 'Kham pha',
            'icon' => '<i class="' . (!empty($state) && $state === 3 ? 'fa-solid' : 'fa-light') . ' fa-compass"></i>',
            'state' => (!empty($state) && $state === 3) ? 1 : 0,
        ]
    ];
}
?>
<header>
    <div class="header-wrapper">
        <div class="logo">
            <a href="<?= DOMAIN ?>"><img src="<?= DOMAIN ?>/assets/imgs/isea.png" alt="logo"></a>
        </div>
        <ul>
            <?php foreach ($navs as $nav): ?>
                <li class="<?= !empty($nav['state']) ? 'nav state' : 'nav' ?>">
                    <?= "<a href=\"{$nav['link']}\" title= \"{$nav['title']}\">{$nav['icon']}</a>" ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="user <?= (!empty($state) && $state === 4) ? 'state' : '' ?>">
            <a href="<?= DOMAIN ?>user/">
                <img src="<?= DOMAIN ?>/assets/imgs/user.png" alt="logo">
                <i class="<?= (!empty($state) && $state === 4) ? 'fa-solid' : 'fa-light' ?> fa-user"></i>
            </a>
        </div>
    </div>
</header>