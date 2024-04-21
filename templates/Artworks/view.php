<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artwork $artwork
 */
?>

<?php
$this->assign('title', __('Artwork'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Artworks'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($artwork->nama) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Nama') ?></th>
                <td><?= h($artwork->nama) ?></td>
            </tr>
            <tr>
                <th><?= __('Jenis') ?></th>
                <td><?= h($artwork->jenis) ?></td>
            </tr>
            <tr>
                <th><?= __('Foto') ?></th>
                <td><?= h($artwork->foto) ?></td>
            </tr>
            <tr>
                <th><?= __('Artist') ?></th>
                <td><?= $artwork->has('artist') ? $this->Html->link($artwork->artist->nama, ['controller' => 'Artists', 'action' => 'view', $artwork->artist->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($artwork->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td><?= h($artwork->created) ?></td>
            </tr>
        </table>
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
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $artwork->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Deskripsi') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($artwork->deskripsi)); ?>
    </div>
</div>
