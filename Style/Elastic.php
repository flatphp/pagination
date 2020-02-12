<?php namespace Flatphp\Pagination\Style;

use Flatphp\Pagination\Paginator;

class Elastic extends Sliding
{

    public function getRange(Paginator $paginator)
    {
        $page_range  = $paginator->getPageRange();
        $current_page = $paginator->getPage();
        $page_count = $paginator->getPageCount();
        $org_page_range = $page_range;
        $page_range         = $page_range * 2 - 1;
        if ($org_page_range + $current_page - 1 < $page_range) {
            $page_range = $org_page_range + $current_page - 1;
        } elseif ($org_page_range + $current_page - 1 > $page_count) {
            $page_range = $org_page_range + $page_count - $current_page;
        }
        $paginator->setPageRange($page_range);
        return parent::getRange($paginator);
    }
}