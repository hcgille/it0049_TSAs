<?= $this->include('layouts/header') ?>

<section class="page-banner">
    <p class="eyebrow">Task management</p>
    <h1>Edit Task</h1>
    <p>Update this task’s details and current status.</p>
</section>

<section class="form-card">
    <?php $errors = session()->getFlashdata('errors') ?? []; ?>

    <?php
        $selectedStatus = old('status', $task['status']);
    ?>

    <form
        action="<?= site_url('tasks/' . $task['id']) ?>"
        method="post"
    >
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="title">Task title</label>

            <input
                type="text"
                id="title"
                name="title"
                maxlength="150"
                value="<?= esc(old('title', $task['title'])) ?>"
                required
            >

            <?php if (isset($errors['title'])): ?>
                <small class="field-error">
                    <?= esc($errors['title']) ?>
                </small>
            <?php endif ?>
        </div>

        <div class="form-group">
            <label for="task_date">Task date</label>

            <input
                type="date"
                id="task_date"
                name="task_date"
                value="<?= esc(old('task_date', $task['task_date'])) ?>"
                required
            >

            <?php if (isset($errors['task_date'])): ?>
                <small class="field-error">
                    <?= esc($errors['task_date']) ?>
                </small>
            <?php endif ?>
        </div>

        <div class="form-group">
            <label for="status">Status</label>

            <select id="status" name="status" required>
                <option
                    value="pending"
                    <?= $selectedStatus === 'pending' ? 'selected' : '' ?>
                >
                    Pending
                </option>

                <option
                    value="in progress"
                    <?= $selectedStatus === 'in progress' ? 'selected' : '' ?>
                >
                    In Progress
                </option>

                <option
                    value="completed"
                    <?= $selectedStatus === 'completed' ? 'selected' : '' ?>
                >
                    Completed
                </option>
            </select>

            <?php if (isset($errors['status'])): ?>
                <small class="field-error">
                    <?= esc($errors['status']) ?>
                </small>
            <?php endif ?>
        </div>

        <div class="form-actions">
            <button class="button button-primary" type="submit">
                Save Changes
            </button>

            <a class="button button-secondary" href="<?= site_url('tasks') ?>">
                Cancel
            </a>
        </div>
    </form>
</section>

<?= $this->include('layouts/footer') ?>