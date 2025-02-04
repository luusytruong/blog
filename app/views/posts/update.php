<form method="POST" action="<?= DOMAIN . "post/update/" . $post['id'] ?>" class='post post<?= $post['id']; ?>'>
    <div class='post-head'>
        <div class='author-avt'>
            <img src='<?= !empty($post['avatar']) ? $post['avatar'] : DOMAIN . 'assets/imgs/user.png' ?>' alt='avatar'>
        </div>
        <div class='post-info'>
            <div class='author'><?= htmlspecialchars($post['full_name']); ?></div>
            <div class='create-at'><?= htmlspecialchars($post['create_at']); ?></div>
        </div>
        <div class="btn-area">
            <button class="btn-cancel-update" onclick="go('<?= DOMAIN ?>')" type="reset">
                Huỷ
            </button>
            <button type="submit">
                <i class="fa-solid fa-bookmark"></i>
                Lưu
            </button>
        </div>
    </div>
    <div class='post-body'>
        <textarea name="title" oninput="adjustHeight(this)" class='title'><?= $post['title'] ?></textarea>
        <?php if (!empty($post['image'])): ?>
            <div class='image'>
                <img src='<?= htmlspecialchars($post['image']); ?>' alt='image'>
                <label>
                    <i class="fa-solid fa-pen"></i>
                    <input name="image" type="file" accept="image/*">
                </label>
                <button type="reset">
                    <i class="fa-solid fa-xmark-large"></i>
                </button>
            </div>
        <?php endif; ?>
        <textarea name="content" oninput="autoScroll(this)" class='content'><?= $post['content'] ?></textarea>
    </div>
</form>