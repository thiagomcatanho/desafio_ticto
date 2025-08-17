<?php

namespace App\Support\Repositories;

use App\Support\Repositories\Exceptions\RepositoryException;
use BadMethodCallException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Traits\ForwardsCalls;

abstract class BaseRepository
{
    use ForwardsCalls;

    /**
     * The model instance managed by the repository.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected Model $entity;

    /**
     * BaseRepository constructor.
     *
     * Initializes the model instance.
     *
     * @throws \App\Support\Repositories\Exceptions\RepositoryException
     */
    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }

    /**
     * Returns the class name of the model managed by the repository.
     *
     * @return string
     */
    abstract public function modelClass(): string;

    /**
     * Creates a new instance of the model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     *
     * @throws \App\Support\Repositories\Exceptions\RepositoryException
     */
    protected function resolveEntity(): Model
    {
        $entity = app($this->modelClass());

        if (! $entity instanceof Model) {
            throw new RepositoryException(
                "Class {$this->modelClass()} must be an instance of Illuminate\\Database\\Eloquent\\Model"
            );
        }

        return $entity;
    }

    /**
     * Returns all records of the model, ordered by most recent.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(): Collection
    {
        return $this->entity->latest()->get();
    }

    /**
     * Finds a record by ID or throws an exception if not found.
     *
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOrFail(int $id): Model
    {
        return $this->entity->newQuery()->findOrFail($id);
    }

    /**
     * Creates a new record in the database.
     *
     * @param array $attributes
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(array $attributes): Model
    {
        $model = $this->newInstance()->fill($attributes);
        $model->save();

        return $model;
    }

    /**
     * Updates a record by ID.
     *
     * @param int $id
     * @param array $attributes
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(int $id, array $attributes): Model
    {
        $model = $this->newInstance()->lockForUpdate()->findOrFail($id);
        $model->fill($attributes)->save();

        return $model;
    }

    /**
     * Deletes a record by ID.
     *
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id): bool
    {
        $model = $this->newInstance()->lockForUpdate()->findOrFail($id);

        return $model->delete();
    }

    /**
     * Creates a new instance of the model for isolated operations.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function newInstance(): Model
    {
        return clone $this->entity;
    }

    /**
     * Allows calling model methods directly through the repository.
     *
     * Example:
     *   $userRepository->where('email', $email)->first();
     *
     * @param string $method
     * @param array $arguments
     *
     * @return mixed
     *
     * @throws \BadMethodCallException
     */
    public function __call(string $method, array $arguments)
    {
        if (method_exists($this->entity, $method)) {
            return $this->forwardCallTo($this->entity, $method, $arguments);
        }

        throw new BadMethodCallException(
            "Method {$method} does not exist on " . get_class($this->entity)
        );
    }
}
