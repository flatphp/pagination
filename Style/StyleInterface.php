<?php namespace Flatphp\Pagination\Style;


use Flatphp\Pagination\Paginator;

interface StyleInterface
{
    /**
     * @param Paginator $paginator
     * @return array
     */
    public function getRange(Paginator $paginator);
}