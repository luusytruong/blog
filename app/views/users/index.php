<div class="user">
    <div class="user-wrapper">
        <div class="user-cover-photo">
            <img src="<?= !empty($user['cover_photo']) ? $user['cover_photo'] : DOMAIN . "assets/imgs/uploads/j97_cover_photo.jpg" ?>"
                alt="cover photo">
            <button class="btn-edit-cover-photo"><i class="fa-solid fa-image"></i></i></button>
        </div>
        <div class="user-info">
            <div class="user-avatar">
                <div class="user-avatar-wrapper">
                    <img src="<?= !empty($user['avatar']) ? $user['avatar'] : DOMAIN . 'assets/imgs/user.png' ?>"
                        alt="avatar">
                    <button class="btn-edit-avatar"><i class="fa-solid fa-camera"></i></button>
                </div>
            </div>
            <div class="user-full-name"><?= $user['full_name'] ?></div>
            <div class="user-interact-info">
                <div class="interactions">
                    <b>0</b>
                    <span>theo dõi</span>
                </div>
                <div class="folowers">
                    <b>0</b>
                    <span>tương tác</span>
                </div>
            </div>
        </div>
        <div class="user-intro"><?= $user['introduce'] ?></div>
        <div class="user-interact-action">
            <button class="btn-follow">
                <i class="fa-solid fa-user-plus"></i>
                Theo dõi
            </button>
            <button class="btn-interact">
                <i class="fa-solid fa-fire"></i>
                Tương tác
            </button>
            <button class="btn-logout">
                <i class="fa-solid fa-right-from-bracket"></i>
            </button>
        </div>
    </div>
</div>
<b>Bài đăng của bạn</b>
<div class="post-area">
    <div class="avatar">
        <img src="<?= !empty($user['avatar']) ? $user['avatar'] : DOMAIN . 'assets/imgs/user.png' ?>" alt="avatar">
    </div>
    <label class="post-story">
        <input type="text" placeholder="Chia sẻ câu chuyện của bạn ?">
    </label>
    <label class="post-image-story">
        <i class="fa-solid fa-image"></i>
        <input type="file" accept="image/*">
    </label>
</div>
<div class="list-post">
    <?php foreach ($posts as $post): ?>
        <div class='post post<?= $post['id']; ?>'>
            <div class='post-head'>
                <div class='author-avt'>
                    <img src='<?= !empty($user['avatar']) ? $user['avatar'] : DOMAIN . 'assets/imgs/user.png' ?>'
                        alt='avatar'>
                </div>
                <div class='post-info'>
                    <div class='author'><?= htmlspecialchars($post['author_name']); ?></div>
                    <div class='create-at'><?= htmlspecialchars($post['create_at']); ?></div>
                </div>
                <div class="btn-area">
                    <button onclick="showDropMenu(event)"><i class="fa-solid fa-ellipsis"></i></button>
                    <ul class="post-drop-menu">
                        <li class="post-menu-item">
                            <a href="<?= DOMAIN . 'post/update/' . $post['id'] ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Sửa bài viết
                            </a>
                        </li>
                        <li class="post-menu-item">
                            <a href="<?= DOMAIN . 'post/delete/' . $post['id'] ?>">
                                <i class="fa-solid fa-trash-can"></i>
                                Xoá bài viết
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class='post-body'>
                <div class='title'>
                    <p><?= nl2br(htmlspecialchars($post['title'])); ?></p>
                </div>
                <?php if (!empty($post['image'])): ?>
                    <div class='image'>
                        <img src='<?= htmlspecialchars($post['image']); ?>' alt='image'>
                    </div>
                <?php endif; ?>
                <div class='content'>
                    <p><?= nl2br(htmlspecialchars($post['content'])); ?></p>
                </div>
            </div>
            <div class="post-foot">
                <button class="btn-view-more" onclick="viewMore(event)">Xem thêm</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>