<div class="list-post">
    <?= empty($posts) ? "<a href='" . DOMAIN . "post/myPost'>Tạo bài đăng</a>" : '' ?>
    <?php foreach ($posts as $post): ?>
        <div class='post'>
            <div class='post-head'>
                <div class='author-avt'>
                    <img src='<?= !empty($post['avatar']) ? $post['avatar'] : DOMAIN . '/assets/imgs/user.png'; ?>'
                        alt='avt'>
                </div>
                <div class='post-info'>
                    <div class='author'><?= htmlspecialchars($post['author_name']); ?></div>
                    <div class='create-at'><?= htmlspecialchars($post['create_at']); ?></div>
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
            <form method="POST" action="<?= DOMAIN . 'post/read/' . $post['id'] ?>" class="post-foot">
                <button type="submit" class="btn-view-more">Xem thêm</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>