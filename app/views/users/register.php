<div class="form-wrapper">
    <form method="POST" action="<?= DOMAIN ?>user/register">
        <h1 class="title">Đăng ký tài khoản</h1>
        <label>
            <span>Họ và tên</span>
            <input value="<?= $full_name ?>" name="full_name" type="text" placeholder="Nguyen Van A">
            <i class="fa-solid fa-user"></i>
        </label>
        <label>
            <span>Số điện thoại</span>
            <input value="<?= $phone_number ?>" name="phone_number" type="number" placeholder="+84">
            <i class="fa-solid fa-phone"></i>
        </label>
        <label class="register">
            <span>Mật khẩu</span>
            <div>
                <input value="<?= $password ?>" name="password" type="text" placeholder="••••••••">
                <i class="fa-solid fa-lock"></i>
            </div>
            <div>
                <input value="<?= $password ?>" name="repeat_password" type="text" placeholder="••••••••">
                <i class="fa-solid fa-lock"></i>
            </div>
        </label>
        <div class="note">
            <div class="has-upper-case">
                <i class="fa-light fa-circle-check"></i>
                <span>Chứa chữ cái in hoa</span>
            </div>
            <div class="has-special-char">
                <i class="fa-light fa-circle-check"></i>
                <span>Chứa ký tự @#$%..</span>
            </div>
            <div class="has-number">
                <i class="fa-light fa-circle-check"></i>
                <span>Chứa số 0-9</span>
            </div>
            <div class="has-eight-char">
                <i class="fa-light fa-circle-check"></i>
                <span>Độ dài trên 8 ký tự</span>
            </div>
        </div>
        <div class="btn-area">
            <button disabled type="submit">Đăng ký</button>
        </div>
        <p>
            Đã có tài khoản?
            <a href="<?= DOMAIN ?>user/">Đăng nhập</a>
        </p>
    </form>
</div>
<script type='module'>
    import { toast } from '<?= DOMAIN ?>assets/js/default.js';
    toast(<?= json_encode($msg) ?>)
    <?php if (!empty($msg) && $msg['status'] === 'success'): ?>
        setTimeout(() => {
            window.location.href = "<?= DOMAIN ?>user/login"
        }, 3000)
    <?php endif; ?>
</script>