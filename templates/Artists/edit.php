<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artist $artist
 */
?>

<?php
$this->assign('title', __('Edit Artist'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Artists'), 'url' => ['action' => 'index']],
    ['title' => __('View'), 'url' => ['action' => 'view', $artist->id]],
    ['title' => __('Edit')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($artist) ?>
    <div class="card-body">
        <?= $this->Form->control('nama') ?>
        <?= $this->Form->control('alamat') ?>
        <?= $this->Form->control('umur') ?>
        <?= $this->Form->control('telp') ?>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $artist->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $artist->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'view', $artist->id], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>