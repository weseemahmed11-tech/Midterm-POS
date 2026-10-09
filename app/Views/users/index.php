<section class="page-heading">
    <div>
        <p class="eyebrow">Accounts</p>
        <h1>User Accounts</h1>
        <p class="subtitle">Manage POS user profiles and avatars.</p>
    </div>
    <a class="button" href="<?= site_url('users/new') ?>">Create User</a>
</section>
<?php if (session()->getFlashdata('message')): ?><p class="success"><?= esc(session()->getFlashdata('message')) ?></p><?php endif; ?>
<div class="table-card">
    <div class="table-scroll">
        <table>
            <thead>
                <tr><th scope="col">Avatar</th><th scope="col">Username</th><th scope="col">Full Name</th><th scope="col">Actions</th></tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td data-label="Avatar"><?php if (! empty($user['avatar'])): ?><img class="avatar" src="<?= base_url('uploads/' . rawurlencode($user['avatar'])) ?>" alt="Avatar for <?= esc($user['full_name']) ?>"><?php else: ?><span class="avatar-placeholder">No avatar</span><?php endif; ?></td>
                        <td data-label="Username"><?= esc($user['username']) ?></td>
                        <td data-label="Full Name"><?= esc($user['full_name']) ?></td>
                        <td data-label="Actions"><a class="button button-small button-secondary" href="<?= site_url('users/' . $user['id'] . '/edit') ?>">Edit</a> <form class="inline-form" method="post" action="<?= site_url('users/' . $user['id'] . '/delete') ?>"><button class="button button-small button-danger" type="submit">Delete</button></form></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
