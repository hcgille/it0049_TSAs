<?= $this->include('layouts/header') ?>

<section class="hero">
    <div>
        <p class="eyebrow">Welcome back</p>
        <h1>Tasks for Today</h1>
        <p class="hero-text">
            Stay focused and complete what matters today.
        </p>
    </div>

    <div class="date-card">
        <span>Today</span>
        <strong><?= date('F j, Y') ?></strong>
    </div>
</section>

<section class="section-heading">
    <div>
        <p class="eyebrow">Daily overview</p>
        <h2>Your schedule</h2>
    </div>

    <span class="task-count">
        <?= count($tasks) ?> <?= count($tasks) === 1 ? 'task' : 'tasks' ?>
    </span>
</section>

<?php if (! empty($tasks)): ?>
    <div class="task-grid">
        <?php foreach ($tasks as $task): ?>
            <?php
                $statusClass = match ($task['status']) {
                    'completed'   => 'completed',
                    'in progress' => 'in-progress',
                    default       => 'pending',
                };
            ?>

            <article class="task-card">
                <div class="task-card-top">
                    <span class="status <?= $statusClass ?>">
                        <?= esc(ucwords($task['status'])) ?>
                    </span>

                    <span class="task-number">
                        #<?= esc($task['id']) ?>
                    </span>
                </div>

                <h3><?= esc($task['title']) ?></h3>

                <p class="task-date">
                    Due <?= date('F j, Y', strtotime($task['task_date'])) ?>
                </p>
            </article>
        <?php endforeach ?>
    </div>
<?php else: ?>
    <div class="empty-state">
        <h2>No tasks scheduled today</h2>
        <p>You have completed everything or no tasks have been assigned yet.</p>
    </div>
<?php endif ?>

<?= $this->include('layouts/footer') ?>