<?php namespace Flatphp\Pagination\Style;

use Flatphp\Pagination\Paginator;

class Jumping implements StyleInterface
{

    public function getRange(Paginator $paginator)
    {
        $page_range  = $paginator->getPageRange();
        $current_page = $paginator->getPage();
        $page_count = $paginator->getPageCount();
        $delta = $current_page % $page_range;
        if ($delta == 0) {
            $delta = $page_range;
        }
        $offset     = $current_page - $delta;
        $lower_bound = $offset + 1;
        $upper_bound = $offset + $page_range;
        if ($upper_bound > $page_count) {
            $upper_bound = $page_count;
        }
        $pages = [];
        for ($i = $lower_bound; $i <= $upper_bound; $i++) {
            $pages[] = $i;
        }
        return $pages;
    }
}