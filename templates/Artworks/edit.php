<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artwork $artwork
 */
?>

<?php
$this->assign('title', __('Edit Artwork'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Artworks'), 'url' => ['action' => 'index']],
    ['title' => __('View'), 'url' => ['action' => 'view', $artwork->id]],
    ['title' => __('Edit')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($artwork) ?>
    <div class="card-body">
        <?= $this->Form->control('nama') ?>
        <?= $this->Form->control('jenis') ?>
        <?= $this->Form->control('foto') ?>
        <?= $this->Form->control('deskripsi') ?>
        <?= $this->Form->control('artist_id', ['options' => $artists, 'class' => 'form-control']) ?>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $artwork->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $artwork->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'view', $artwork->id], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>