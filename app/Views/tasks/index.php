<?= $this->include('layouts/header') ?>

<section class="page-banner">
    <p class="eyebrow">Complete schedule</p>
    <h1>All Tasks</h1>
    <p>Review every task in chronological order.</p>
</section>

<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th>Status</th>
                <th>Task Date</th>
                <th>Created</th>
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
                        <?= date('F j, Y', strtotime($task['task_date'])) ?>
                    </td>

                    <td>
                        <?= date('M j, Y g:i A', strtotime($task['created_at'])) ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->include('layouts/footer') ?>