<?php


namespace CPSIT\Persons\Domain\Model\Dto;

class EmConfiguration
{

    /**
     * Id of system category for statuses
     *
     * @var int
     */
    protected $statusRootCategoryId = 0;
    /**
     * Id of system category id for departments
     *
     * @var int
     */
    protected $departmentRootCategoryId = 0;

    /**
     * Constructor
     * @param array $configuration
     */
    public function __construct(array $configuration)
    {
        foreach ($configuration as $key => $value) {
            if (property_exists(get_class($this), $key)) {
                $this->$key = $value;
            }
        }
    }

    /**
     * @return int
     */
    public function getStatusRootCategoryId(): int
    {
        return $this->statusRootCategoryId;
    }

    /**
     * @param int $statusRootCategoryId
     */
    public function setStatusRootCategoryId(int $statusRootCategoryId)
    {
        $this->statusRootCategoryId = $statusRootCategoryId;
    }

    /**
     * @return int
     */
    public function getDepartmentRootCategoryId(): int
    {
        return $this->departmentRootCategoryId;
    }

    /**
     * @param int $departmentRootCategoryId
     */
    public function setDepartmentRootCategoryId(int $departmentRootCategoryId)
    {
        $this->departmentRootCategoryId = $departmentRootCategoryId;
    }
}
