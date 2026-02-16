<?php require base_path(path: "view/partials/head.php") ?>

<?php require base_path(path: "view/partials/nav.php") ?>

<?php require base_path(path: "view/partials/banner.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-6"><a href="/notes" class="text-blue-500 hover:underline">go back...</a></p>
        <p class="text-white"><?= htmlspecialchars(string: $note["body"]) ?></p>

        <div class="mt-6 flex items-center justify-start gap-x-6">
            <a href="/note/edit?id=<?= $note["id"] ?>?>" class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-500">Edit</a>
            <form action="/note" method="POST">
                <input type="hidden" name="_method" id="_method" value="DELETE" />
                <input type="hidden" name="id" id="id" value="<?= $note["id"] ?>" />
                <button type="submit" class="text-red-500">Delete</button>
            </form>
        </div>
    </div>
</main>

<?php require base_path("view/partials/footer.php") ?>