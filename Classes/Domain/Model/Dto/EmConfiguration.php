<?php


namespace CPSIT\Persons\Domain\Model\Dto;

class EmConfiguration
{
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
}
