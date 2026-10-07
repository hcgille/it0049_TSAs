<?= $this->include('layouts/header') ?>

<section class="page-banner">
    <p class="eyebrow">Complete schedule</p>
    <h1>All Tasks</h1>
    <p>Review every task in chronological order.</p>
</section>

<?php
    $successMessage = session()->getFlashdata('success');
    $errorMessage = session()->getFlashdata('error');
    $isLoggedIn = session()->get('isLoggedIn');
?>

<?php if ($successMessage): ?>
    <div class="alert alert-success">
        <?= esc($successMessage) ?>
    </div>
<?php endif ?>

<?php if ($errorMessage): ?>
    <div class="alert alert-error">
        <?= esc($errorMessage) ?>
    </div>
<?php endif ?>

<?php if ($isLoggedIn): ?>
    <div class="page-actions">
        <a class="button button-primary" href="<?= site_url('tasks/new') ?>">
            New Task
        </a>
    </div>
<?php endif ?>

<?php if (! empty($tasks)): ?>
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Task Date</th>
                    <th>Created</th>

                    <?php if ($isLoggedIn): ?>
                        <th>Actions</th>
                    <?php endif ?>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <?php
                        $statusClass = match ($task['status']) {
                            'completed'   => 'completed',
                            'in progress' => 'in-progress',
                            default       => 'pending',
                        };
                    ?>

                    <tr>
                        <td>
                            <strong><?= esc($task['title']) ?></strong>
                        </td>

                        <td>
                            <span class="status <?= $statusClass ?>">
                                <?= esc(ucwords($task['status'])) ?>
                            </span>
                        </td>

                        <td>
                            <?= date(
                                'F j, Y',
                                strtotime($task['task_date'])
                            ) ?>
                        </td>

                        <td>
                            <?= date(
                                'M j, Y g:i A',
                                strtotime($task['created_at'])
                            ) ?>
                        </td>

                        <?php if ($isLoggedIn): ?>
                            <td>
                                <div class="table-actions">
                                    <a
                                        class="button button-small button-secondary"
                                        href="<?= site_url(
                                            'tasks/' .
                                            $task['id'] .
                                            '/edit'
                                        ) ?>"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="<?= site_url(
                                            'tasks/' .
                                            $task['id'] .
                                            '/delete'
                                        ) ?>"
                                        method="post"
                                        onsubmit="return confirm(
                                            'Archive this task?'
                                        );"
                                    >
                                        <?= csrf_field() ?>

                                        <button
                                            class="button button-small button-danger"
                                            type="submit"
                                        >
                                            Archive
                                        </button>
                                    </form>
                                </div>
                            </td>
                        <?php endif ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="empty-state">
        <h2>No active tasks found</h2>
        <p>
            There are currently no active tasks to display.
        </p>

        <?php if ($isLoggedIn): ?>
            <a
                class="button button-primary"
                href="<?= site_url('tasks/new') ?>"
            >
                Create the First Task
            </a>
        <?php endif ?>
    </div>
<?php endif ?>

<?= $this->include('layouts/footer') ?>