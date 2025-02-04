<div class="form-wrapper">
    <form action="<?= DOMAIN ?>user/login" method="POST">
        <h1 class="title">Đăng nhập</h1>
        <label>
            <span>Số điện thoại</span>
            <input value="<?= $phone_number ?>" name="phone_number" type="number" placeholder="+84">
            <i class="fa-solid fa-phone"></i>
        </label>
        <label>
            <span>Mật khẩu</span>
            <input value="<?= $password ?>" name="password" type="text" placeholder="••••••••">
            <i class="fa-solid fa-lock"></i>
        </label>
        <div class="btn-area">
            <button disabled type="submit">Đăng nhập</button>
        </div>
        <p>
            Chưa có tài khoản?
            <a href="<?= DOMAIN ?>user/register">Đăng ký</a>
        </p>
    </form>
</div>
<script type='module'>
    import { toast } from '<?= DOMAIN ?>assets/js/default.js';
    toast(<?= json_encode($msg) ?>)
    <?php if (!empty($msg) && $msg['status'] === 'success'): ?>
        setTimeout(() => {
            window.location.href = "<?= DOMAIN ?>user"
        }, 3000)
    <?php endif; ?>
</script>