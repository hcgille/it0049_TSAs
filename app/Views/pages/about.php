<?= $this->include('layouts/header') ?>

<section class="page-banner">
    <p class="eyebrow">About the project</p>
    <h1>Built for Better Focus</h1>
    <p>
        Tamaraw Tasks is a simple task management system created using
        CodeIgniter 4 and the MVC architecture.
    </p>
</section>

<section class="about-grid">
    <article class="information-card">
        <span class="card-icon">01</span>
        <h2>The System</h2>
        <p>
            This website organizes daily responsibilities and lets users
            view either today's schedule or their complete task list.
        </p>
    </article>

    <article class="information-card">
        <span class="card-icon">02</span>
        <h2>The Developer</h2>
        <p>
            This system was designed and developed by
            <strong><?= esc($developerName) ?></strong>,
            a <?= esc($program) ?> student.
        </p>
    </article>

    <article class="information-card">
        <span class="card-icon">03</span>
        <h2>The Technology</h2>
        <p>
            The project uses PHP, CodeIgniter 4, MySQL, HTML, CSS,
            and the Model-View-Controller design pattern.
        </p>
    </article>
</section>

<?= $this->include('layouts/footer') ?>