<?= $this->include('layouts/header') ?>

<section class="page-banner">
    <p class="eyebrow">Task management access</p>
    <h1>Sign In</h1>
    <p>Log in with the demo account to create, edit, or archive tasks.</p>
</section>

<section class="form-card">
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-error">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif ?>

    <?php $errors = session()->getFlashdata('errors') ?? []; ?>

    <form action="<?= site_url('login') ?>" method="post">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="username">Username</label>

            <input
                type="text"
                id="username"
                name="username"
                value="<?= esc(old('username')) ?>"
                autocomplete="username"
                required
            >

            <?php if (isset($errors['username'])): ?>
                <small class="field-error">
                    <?= esc($errors['username']) ?>
                </small>
            <?php endif ?>
        </div>

        <div class="form-group">
            <label for="password">Password</label>

            <input
                type="password"
                id="password"
                name="password"
                autocomplete="current-password"
                required
            >

            <?php if (isset($errors['password'])): ?>
                <small class="field-error">
                    <?= esc($errors['password']) ?>
                </small>
            <?php endif ?>
        </div>

        <button class="button button-primary" type="submit">
            Sign In
        </button>
    </form>
</section>

<?= $this->include('layouts/footer') ?>