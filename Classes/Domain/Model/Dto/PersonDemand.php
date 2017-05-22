<?php


namespace CPSIT\Persons\Domain\Model\Dto;


class PersonDemand extends AbstractDemand
{
    use CategoryAwareDemandTrait, OrderAwareDemandTrait,
        SearchAwareDemandTrait, StatusAwareDemandTrait;

}
