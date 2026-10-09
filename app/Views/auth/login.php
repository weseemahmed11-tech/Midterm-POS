<div class="login-shell"><div class="login-brand"><span class="brand-mark">P</span><div><strong>Pointline</strong><small>Complete POS System</small></div></div><div class="form-card login-card">
    <p class="eyebrow">Complete POS System</p>
    <h1>Welcome back</h1><p class="subtitle">Sign in to manage your point-of-sale workspace.</p>
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
</div><p class="login-footer">Secure staff workspace · <a href="<?= site_url('about') ?>">Learn about Pointline</a></p></div>
