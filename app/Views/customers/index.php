<section class="page-heading">
    <div>
        <p class="eyebrow">Accounts</p>
        <h1>Customer Accounts</h1>
        <p class="subtitle">Manage customer contact details.</p>
    </div>
    <a class="button" href="<?= site_url('customers/new') ?>">Create Customer</a>
</section>
<?php if (session()->getFlashdata('message')): ?><p class="success"><?= esc(session()->getFlashdata('message')) ?></p><?php endif; ?>
<div class="table-card">
    <div class="table-scroll">
        <table>
            <thead>
                <tr><th scope="col">Full Name</th><th scope="col">Email</th><th scope="col">Phone</th><th scope="col">Actions</th></tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td data-label="Full Name"><?= esc($customer['full_name']) ?></td>
                        <td data-label="Email"><?= esc($customer['email']) ?></td>
                        <td data-label="Phone"><?= esc($customer['phone']) ?></td>
                        <td data-label="Actions"><a class="button button-small button-secondary" href="<?= site_url('customers/' . $customer['id'] . '/edit') ?>">Edit</a> <form class="inline-form" method="post" action="<?= site_url('customers/' . $customer['id'] . '/delete') ?>"><button class="button button-small button-danger" type="submit">Delete</button></form></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
