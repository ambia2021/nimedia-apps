<?php

namespace Webkul\Income\Repositories;

use Webkul\Core\Eloquent\Repository;
use Illuminate\Container\Container;
use Webkul\Attribute\Repositories\AttributeValueRepository;
use Webkul\Income\Contracts\Income;


class IncomeRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    protected $attributeValueRepository;
    // protected $container;

    /**
     * Create a new repository instance.
     *
     * @param  \Webkul\Attribute\Repositories\AttributeValueRepository  $attributeValueRepository
     * @param  \Illuminate\Container\Container  $container
     * @return void
     */
    public function __construct(
        AttributeValueRepository $attributeValueRepository,
        Container $container
    )
    {
        $this->attributeValueRepository = $attributeValueRepository;

        parent::__construct($container);
    }

    function model()
    {
        return 'Webkul\Income\Contracts\Income';
    }


    public function create(array $data)
    {
        $income = parent::create($data);

        $this->attributeValueRepository->save($data, $income->id);

        return $income;
    }

    public function update(array $data, $id, $attribute = "id")
    {
        $income = parent::update($data, $id);

        $this->attributeValueRepository->save($data, $id);

        return $income;
    }
    /**
     * Retrieves customers count based on date
     *
     * @return number
     */
    public function getincomeCount($startDate, $endDate)
    {
        return $this
                ->whereBetween('created_at', [$startDate, $endDate])
                ->get()
                ->count();
    }
}