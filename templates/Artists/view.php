<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artist $artist
 */
?>

<?php
$this->assign('title', __('Artist'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Artists'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($artist->nama) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Nama') ?></th>
                <td><?= h($artist->nama) ?></td>
            </tr>
            <tr>
                <th><?= __('Telp') ?></th>
                <td><?= h($artist->telp) ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($artist->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Umur') ?></th>
                <td><?= $this->Number->format($artist->umur) ?></td>
            </tr>
        </table>
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
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $artist->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Alamat') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($artist->alamat)); ?>
    </div>
</div>

<div class="related related-artwork view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Artworks') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Artwork'), ['controller' => 'Artworks', 'action' => 'add', '?' => ['artist_id' => $artist->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Artworks'), ['controller' => 'Artworks', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nama') ?></th>
                <th><?= __('Jenis') ?></th>
                <th><?= __('Foto') ?></th>
                <th><?= __('Deskripsi') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Artist Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($artist->artworks)) : ?>
                <tr>
                    <td colspan="8" class="text-muted">
                        <?= __('Artworks record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($artist->artworks as $artwork) : ?>
                    <tr>
                        <td><?= h($artwork->id) ?></td>
                        <td><?= h($artwork->nama) ?></td>
                        <td><?= h($artwork->jenis) ?></td>
                        <td><?= h($artwork->foto) ?></td>
                        <td><?= h($artwork->deskripsi) ?></td>
                        <td><?= h($artwork->created) ?></td>
                        <td><?= h($artwork->artist_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Artworks', 'action' => 'view', $artwork->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Artworks', 'action' => 'edit', $artwork->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Artworks', 'action' => 'delete', $artwork->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $artwork->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>
