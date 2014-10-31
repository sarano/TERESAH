<?php namespace Services;

use Repositories\ToolRepositoryInterface as ToolRepository;
use Services\ToolServiceInterface;

class ToolService extends AbstractRepositoryService implements ToolServiceInterface
{
    protected $errors;
    protected $toolRepository;

    public function __construct(ToolRepository $toolRepository)
    {
        $this->toolRepository = $this->setRepository($toolRepository);
    }

    public function attachDataSource($id, $dataSourceId)
    {
        # TODO: Check for the existing relationship
        return $this->toolRepository->attachDataSource($id, $dataSourceId);
    }

    public function detachDataSource($id, $dataSourceId)
    {
        return $this->toolRepository->detachDataSource($id, $dataSourceId);
    }

    public function findWithAssociatedData($id)
    {
        $with = array("user", "dataSources.data" => function($query) use($id) {
            $query->where("data.tool_id", "=", $id);
        }, "dataSources.data.user", "dataSources.data.dataType");

        return $this->toolRepository->find($id, $with);
    }
}