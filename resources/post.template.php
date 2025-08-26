<?php require __DIR__ . '/partials/header.php'; ?>

<div class="border-b border-gray-200 pb-8 mb-8">
    <h2 class="text-4xl font-semibold text-gray-900 sm:text-5xl">
        <?= htmlspecialchars($post['title'] ?? 'Journal Entry') ?>
    </h2>

    <p class="text-lg text-gray-600 w-full max-w-4xl">
        <?= htmlspecialchars($post['excerpt'] ?? 'No excerpt available.') ?>
    </p>    
</div>

<div>
    <p class="text-sm text-gray-600">
        <?= htmlspecialchars($post['content'] ?? 'No content available for this journal entry.') ?>
    </p>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>