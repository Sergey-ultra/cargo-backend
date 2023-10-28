<?php

namespace App\Repository\DataProvider;


use App\Repository\DTO\ParamsDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder;

class DataProvider
{
    public function __construct(protected EloquentBuilder|Builder $query)
    {}

    public function getResult(ParamsDTO $params, bool $isJoin = false): LengthAwarePaginator
    {
        if ($params->filter) {
            $this->filterModel($isJoin, $params->filter);
        }

        if (is_string($params->sort) && $params->sort !== '') {
            $this->sortModel($params->sort);
        }

        return $this->paginate($params->perPage);
    }

    public function filterModel(bool $isJoin, array $filter): void
    {
        $isQueryBuilder = $isJoin && $this->query instanceof Builder;

        if ($isQueryBuilder) {
            $columns = [];
            foreach ($this->query->columns as $column) {

                $parts = explode(' ', $column);
                if (count($parts) > 1) {
                    $columns[$parts[count($parts) - 1]] = $parts[0];
                } else  {
                    $parts = explode('.', $column,2);
                    $columns[$parts[1]] = $column;
                }
            }
        }


        foreach ($filter as $filterKey => $param) {
            $col = $isQueryBuilder ? $columns[$filterKey] : $filterKey;
            $this->addCondition($col, $param);
        }
    }

    public function sortModel(string $sort): void
    {
        if ($sort[0] === '-') {
            $sort = substr($sort, 1);
            $this->query->orderByDesc($sort);
        } else {
            $this->query->orderBy($sort);
        }
    }

    protected function addCondition(string $column, string|array $param): void
    {

        if (is_string($param)) {
            $this->query->where($column, $param);
        } else if (is_array($param)) {
            $this->query->where(function ($query) use ($column, $param) {
                foreach ($param as $key => $value) {
                    if (is_string($value)) {
                        if ($key === 'like') {
                            $query->orWhere($column, 'like', "%$value%");
                        } else {
                            $query->orWhere($column, $value);
                        }
                    }
                }
            });
        }
    }

    public function paginate(int $perPage): LengthAwarePaginator
    {
        return $this->query->paginate($perPage);
    }
}
