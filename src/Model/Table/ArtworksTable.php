<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Artworks Model
 *
 * @property \App\Model\Table\ArtistsTable&\Cake\ORM\Association\BelongsTo $Artists
 *
 * @method \App\Model\Entity\Artwork newEmptyEntity()
 * @method \App\Model\Entity\Artwork newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Artwork> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Artwork get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Artwork findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Artwork patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Artwork> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Artwork|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Artwork saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Artwork>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Artwork>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Artwork>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Artwork> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Artwork>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Artwork>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Artwork>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Artwork> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ArtworksTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('artworks');
        $this->setDisplayField('nama');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Artists', [
            'foreignKey' => 'artist_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('nama')
            ->maxLength('nama', 255)
            ->requirePresence('nama', 'create')
            ->notEmptyString('nama');

        $validator
            ->scalar('jenis')
            ->requirePresence('jenis', 'create')
            ->notEmptyString('jenis');

        $validator
            ->scalar('foto')
            ->maxLength('foto', 255)
            ->requirePresence('foto', 'create')
            ->notEmptyString('foto');

        $validator
            ->scalar('deskripsi')
            ->allowEmptyString('deskripsi');

        $validator
            ->integer('artist_id')
            ->notEmptyString('artist_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['artist_id'], 'Artists'), ['errorField' => 'artist_id']);

        return $rules;
    }
}
