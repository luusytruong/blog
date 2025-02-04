<div class="list-post">
    <?php foreach ($posts as $post): ?>
        <div class='post post<?= $post['id']; ?>'>
            <div class='post-head'>
                <div class='author-avt'>
                    <img src='<?= DOMAIN; ?>/assets/imgs/user.png' alt='avt'>
                </div>
                <div class='post-info'>
                    <div class='author'><?= htmlspecialchars($post['author_name']); ?></div>
                    <div class='create-at'><?= htmlspecialchars($post['create_at']); ?></div>
                </div>
                <div class="btn-area">
                    <button><i class="fa-solid fa-ellipsis"></i></button>
                </div>
            </div>
            <div class='post-body'>
                <div class='title'>
                    <p><?= htmlspecialchars($post['title']); ?></p>
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
    <?php endforeach; ?>
</div>
<button class="btn-add-new-post" title="Tạo bài viết mới">
    <i class="fa-light fa-plus"></i>
    Tạo bài viết
</button>