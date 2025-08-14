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
                        $_SERVER['REQUEST_URI'] === $link['url']
                        ? 'bg-gray-900 text-white rounded-md px-3 py-2 text-sm'
                        : 'text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium'
                    ?>
                ">
                    <?= $link['title'] ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</nav>