<?php

/** @var \App\Core\LinkGenerator $link */
/** @var Array $data */

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 d-flex gap-4  flex-column">
            <h1 id="gah">Add new brand</h1>

            <?php if (!is_null(@$data['errors'])): ?>
                <?php foreach ($data['errors'] as $error): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <form method="post" action="<?= $link->url('brand.save') ?>" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= @$data['brand']?->getId() ?>">

                <label for="inputGroupFile02" class="form-label">Image file</label>
                <?php if (@$data['brand']?->getPicture() != ""): ?>
                    <div>Pôvodný súbor: <?= substr($data['brand']->getPicture(), strpos($data['brand']->getPicture(), '-') + 1)  ?></div>
                <?php endif; ?>
                <div class="input-group mb-3 has-validation">
                    <input type="file" class="form-control " name="picture" id="inputGroupFile02">
                </div>
                <label for="brand-text" class="form-label">Text príspevku</label>
                <div class="input-group has-validation mb-3 ">
                    <textarea class="form-control" aria-label="With textarea" name="name" id="brand-text"><?= @$data['brand']?->getName() ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>

        </div>
    </div>
</div>