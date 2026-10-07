<?= $this->include('layouts/header') ?>

<section class="page-banner">
    <p class="eyebrow">Account information</p>
    <h1>User Profile</h1>
    <p>Information for the registered demo user.</p>
</section>

<?php if ($user): ?>
    <section class="profile-card">
        <div class="avatar">
            <?= esc(strtoupper(substr($user['full_name'], 0, 1))) ?>
        </div>

        <div class="profile-details">
            <p class="eyebrow">Demo user</p>
            <h2><?= esc($user['full_name']) ?></h2>

            <dl>
                <div>
                    <dt>Username</dt>
                    <dd><?= esc($user['username']) ?></dd>
                </div>

                <div>
                    <dt>Email address</dt>
                    <dd><?= esc($user['email']) ?></dd>
                </div>

                <div>
                    <dt>Member since</dt>
                    <dd><?= date('F j, Y', strtotime($user['created_at'])) ?></dd>
                </div>
            </dl>
        </div>
    </section>
<?php else: ?>
    <div class="empty-state">
        <h2>No user found</h2>
        <p>Add exactly one record to the users table.</p>
    </div>
<?php endif ?>

<?= $this->include('layouts/footer') ?>