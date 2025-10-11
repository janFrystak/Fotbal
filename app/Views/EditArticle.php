<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="bg-white shadow-lg editdiv">
    <div class="m-3">
        <h1 class="">Edit Book</h1>

        <form action="<?= site_url('article/edit/' . $article->id) ?>" method="post">
            <div class="mb-4 ">
                <label class="block font-medium mb-1">Title</label>
                <input type="text" name="title" value="<?= $article->title ?>" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Text</label>
                <textarea id="text" name="text"><?= $article->text ?></textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Top</label>
                <textarea id="top" name="top"><?= $article->top ?></textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Published</label>
                <input type="text" name="published" value="<?= $article->published ?>" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Photo</label>
                <input type="image" name="photo" value="<?= $article->pthoto ?>" class="w-full border rounded px-3 py-2">
            </div>

            <div class="text-right mb-4">
                <button type="submit" class="px-4 py-2 rounded savechanges">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.tiny.cloud/1/wtzrkm9ng24oerzyodd9cyi0i1s1x65v08rza9ytbeza3uhy/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
      selector: '#description'
    });
</script>

<?= $this->endSection() ?>