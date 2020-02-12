<?php namespace Flatphp\Pagination\Style;

use Flatphp\Pagination\Paginator;

class Sliding implements StyleInterface
{
    public function getRange(Paginator $paginator)
    {
        $page_range = $paginator->getPageRange();
        $current_page = $paginator->getPage();
        $page_count = $paginator->getPageCount();
        if ($page_range > $page_count) {
            $page_range = $page_count;
        }
        $delta = ceil($page_range / 2);
        if ($current_page - $delta > $page_count - $page_range) {
            $lower_bound = $page_count - $page_range + 1;
            $upper_bound = $page_count;
        } else {
            if ($current_page - $delta < 0) {
                $delta = $current_page;
            }
            $offset = $current_page - $delta;
            $lower_bound = $offset + 1;
            $upper_bound = $offset + $page_range;
        }
        $pages = array();
        for ($i = $lower_bound; $i <= $upper_bound; $i++) {
            $pages[] = $i;
        }
        return $pages;
    }
}