<div class="list-post">
    <div class='post post<?= $post['id']; ?>'>
        <div class='post-head'>
            <div class='author-avt'>
                <img src='<?= !empty($post['avatar']) ? $post['avatar'] : DOMAIN . '/assets/imgs/user.png'; ?>'
                    alt='avt'>
            </div>
            <div class='post-info'>
                <div class='author'><?= htmlspecialchars($post['full_name']); ?></div>
                <div class='create-at'><?= htmlspecialchars($post['create_at']); ?></div>
            </div>
            <div class="back">
                <button class="btn-back" onclick="goBack()">
                    <i class="fa-solid fa-left-from-bracket"></i>
                    Quay lại
                </button>
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
    </div>
</div>