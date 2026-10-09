<div class="form-card">
<p class="eyebrow">User Accounts</p>
<h1><?= esc(isset($user['id']) ? 'Edit User' : 'Create User') ?></h1>
<?php $errors = $errors ?? session()->getFlashdata('errors') ?? []; ?>
<?php if ($errors): ?><div class="errors"><ul><?php foreach ((array) $errors as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
<form method="post" enctype="multipart/form-data" action="<?= site_url(isset($user['id']) ? 'users/' . $user['id'] . '/edit' : 'users/new') ?>">
    <label for="username">Username</label>
    <input id="username" name="username" type="text" value="<?= esc(old('username', $user['username'] ?? '')) ?>" required>
    <label for="full_name">Full Name</label>
    <input id="full_name" name="full_name" type="text" value="<?= esc(old('full_name', $user['full_name'] ?? '')) ?>" required>
    <label for="password">Password<?= isset($user['id']) ? ' (leave blank to keep current password)' : '' ?></label>
    <input id="password" name="password" type="password" <?= isset($user['id']) ? '' : 'required' ?> minlength="8">
    <label for="avatar">Avatar (JPG or PNG, maximum 2 MB)</label>
    <input id="avatar" name="avatar" type="file" accept="image/jpeg,image/png">
    <?php if (! empty($user['avatar'])): ?><p>Current avatar: <?= esc($user['avatar']) ?></p><?php endif; ?>
    <div class="form-actions">
        <button class="button" type="submit">Save User</button>
        <a class="button button-secondary" href="<?= site_url('users') ?>">Cancel</a>
    </div>
</form>
</div>
