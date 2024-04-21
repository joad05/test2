<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artwork $artwork
 */
?>

<?php
$this->assign('title', __('Add Artwork'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Artworks'), 'url' => ['action' => 'index']],
    ['title' => __('Add')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($artwork, ['enctype' => 'multipart/form-data']) ?>
    <div class="card-body">
        <?= $this->Form->control('nama') ?>
        <?= $this->Form->control('jenis') ?>
        <?= $this->Form->control('foto', ['type' => 'file']) ?>
        <?= $this->Form->control('deskripsi') ?>
        <?= $this->Form->control('artist_id', ['options' => $artists]) ?>
    </div>
    <div class="card-footer d-flex">
        <div class="ml-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>