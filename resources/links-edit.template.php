<?php require __DIR__ . '/partials/header.php'; ?>

<div class="border-b border-gray-200 pb-8 mb-8">
    <h2 class="text-4xl font-semibold text-gray-900 sm:text-5xl text-center">Editar proyecto</h2>
</div>

<div class="w-full max-w-xl mx-auto">
    <form method="POST" action="/links/update?id=<?= $project['id'] ?>" class="mb-8">
        <input type="hidden" name="_method" value="PUT">
        <div class="mb-4">
            <label class="text-sm font-semibold text-gray-900">Título</label>
            <div class="mt-2">
                <input 
                    type="text" 
                    name="title" 
                    class="w-full outline-1 outline-gray-300 rounded-md px-3 py-2 text-gray-900" 
                    value="<?= $_POST['title'] ?? $project['title'] ?? '' ?>"
                />
            </div>
        </div>

        <div class="mb-4">
            <label class="text-sm font-semibold text-gray-900">Url</label>
            <div class="mt-2">
                <input 
                    type="text" 
                    name="url" 
                    class="w-full outline-1 outline-gray-300 rounded-md px-3 py-2 text-gray-900" 
                    value="<?= $_POST['url'] ?? $project['url'] ?? '' ?>">
            </div>
        </div>

        <div class="mb-4">
            <label class="text-sm font-semibold text-gray-900">Descripción</label>
            <div class="mt-2">
                <textarea 
                    name="description" 
                    rows="2" 
                    class="w-full outline-1 outline-gray-300 rounded-md px-4 py-2 text-gray-900"><?= $_POST['description'] ?? $project['description'] ?? '' ?></textarea>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="w-full rounded-md bg-indigo-600 hover:bg-indigo-500 text-white px-3 py-2 text-center text-sm font-semibold">
                Actualizar &rarr;
            </button>
        </div>
    </form>

    <!-- if errors -->
    <?php if (!empty($errors)): ?>
    <ul class="mt-4 text-red-500">
        <!-- foreach -->
        <?php foreach ($errors as $error): ?>
            <li class="text-xs"><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
        <!-- endforeach -->
    </ul>
    <?php endif; ?>
    <!-- endif -->
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
