<?php
namespace CPSIT\Persons\Domain\Model\Dto;

/**
 * Interface OrderAwareDemandInterface
 * Describes methods for order aware demands
 */
interface OrderAwareDemandInterface
{
    /**
     * @return string
     */
    public function getOrder();

    /**
     * @param string $order A comma separated list of orderings: <sortField>|<sortDirection>,<otherSortField>|<sortDirection>
     */
    public function setOrder($order);
}
