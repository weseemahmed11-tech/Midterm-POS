<div class="form-card">
    <p class="eyebrow">TFA4 POS</p>
    <h1>Log in</h1>
    <?php if ($error = session()->getFlashdata('error')): ?><div class="errors"><p><?= esc($error) ?></p></div><?php endif; ?>
    <form method="post" action="<?= site_url('login') ?>">
        <label for="username">Username</label>
        <input id="username" name="username" type="text" value="<?= esc(old('username')) ?>" required autofocus>
        <label for="password">Password</label>
        <input id="password" name="password" type="password" required>
        <div class="form-actions">
            <button class="button" type="submit">Log in</button>
        </div>
    </form>
</div>
