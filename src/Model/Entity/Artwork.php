<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Artwork Entity
 *
 * @property int $id
 * @property string $nama
 * @property string $jenis
 * @property string $foto
 * @property string|null $deskripsi
 * @property \Cake\I18n\DateTime $created
 * @property int $artist_id
 *
 * @property \App\Model\Entity\Artist $artist
 */
class Artwork extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'nama' => true,
        'jenis' => true,
        'foto' => true,
        'deskripsi' => true,
        'created' => true,
        'artist_id' => true,
        'artist' => true,
    ];
}
