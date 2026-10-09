<div class="form-card">
<p class="eyebrow">Customer Accounts</p>
<h1><?= esc(isset($customer['id']) ? 'Edit Customer' : 'Create Customer') ?></h1>
<?php $errors = $errors ?? session()->getFlashdata('errors') ?? []; ?>
<?php if ($errors): ?><div class="errors"><ul><?php foreach ((array) $errors as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
<form method="post" action="<?= site_url(isset($customer['id']) ? 'customers/' . $customer['id'] . '/edit' : 'customers/new') ?>">
    <label for="full_name">Full Name</label>
    <input id="full_name" name="full_name" type="text" value="<?= esc(old('full_name', $customer['full_name'] ?? '')) ?>" required>
    <label for="email">Email</label>
    <input id="email" name="email" type="email" value="<?= esc(old('email', $customer['email'] ?? '')) ?>" required>
    <label for="phone">Phone</label>
    <input id="phone" name="phone" type="text" value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>">
    <div class="form-actions">
        <button class="button" type="submit">Save Customer</button>
        <a class="button button-secondary" href="<?= site_url('customers') ?>">Cancel</a>
    </div>
</form>
</div>
