<?php require base_path(path: "view/partials/head.php") ?>

<?php require base_path(path: "view/partials/nav.php") ?>

<?php require base_path(path: "view/partials/banner.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <ul class="mb-6">
            <?php foreach ($notes as $note): ?>
                <li>
                    <a href="/note?id=<?= $note["id"] ?>"
                        class=" text-blue-500 hover:underline"><?= htmlspecialchars(string: $note["body"]) ?>...</a>
                </li>
            <?php endforeach ?>
        </ul>
        <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
    </div>
</main>

<?php require base_path("view/partials/footer.php") ?>