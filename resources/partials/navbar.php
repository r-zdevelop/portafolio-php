<?php

$navLinks = [
    [
        'title' => 'Inicio',
        'url'   => '/',
    ],
    [
        'title' => 'Proyectos',
        'url'   => '/links',
    ],
    [
        'title' => 'Acerca de',
        'url'   => '/about',
    ],
];

?>

<nav class="bg-gray-800 mb-8">
    <div class="mx-auto max-w-7xl flex h-16 items-center justify-center">
        <div class="flex gap-4">
            <?php foreach ($navLinks as $link): ?>
                <a href="<?= $link['url'] ?>" class="
                    <?=
                    is_current_route($link['url'])
                        ? 'bg-gray-900 text-white rounded-md px-3 py-2 text-sm'
                        : 'text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium'
                    ?>
                ">
                    <?= $link['title'] ?>
                </a>
            <?php endforeach; ?>
            <?php if (is_authenticated()): ?>
                <form action="/logout" method="POST">
                    <button type="submit" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium cursor-pointer">
                        Cerrar sesión
                    </button>
                </form>
            <?php else: ?>
                <a href="/login" class="
                    <?=
                    is_current_route('/login')
                        ? 'bg-gray-900 text-white rounded-md px-3 py-2 text-sm'
                        : 'text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium'
                    ?>
                ">
                    Login
                </a>
            <?php endif; ?>
        </div>
    </div>
</nav>