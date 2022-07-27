<?php

namespace Webkul\Expenses\Repositories;


use Illuminate\Container\Container;
use Webkul\Core\Eloquent\Repository;
use Webkul\Attribute\Repositories\AttributeValueRepository;
use Webkul\Expenses\Contracts\Expenses;


class ExpensesRepository extends Repository
{
    /**
     * AttributeValueRepository object
     *
     * @var \Webkul\Attribute\Repositories\AttributeValueRepository
     */
    protected $attributeValueRepository;

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

    /**
     * Specify Model class name
     *
     * @return mixed
     */

    function model()
    {
        return 'Webkul\Expenses\Contracts\ExpenseModel';
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $expenses = parent::create($data);

        $this->attributeValueRepository->save($data, $expenses->id);

        return $expenses;
    }

    public function update(array $data, $id, $attribute = "id")
    {
        $expenses = parent::update($data, $id);

        $this->attributeValueRepository->save($data, $id);

        return $expenses;
    }
    /**
     * Retrieves customers count based on date
     *
     * @return number
     */
    public function getExpensesCount($startDate, $endDate)
    {
        return $this
                ->whereBetween('created_at', [$startDate, $endDate])
                ->get()
                ->count();
    }
}