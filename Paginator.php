<?php namespace Flatphp\Pagination;


use Flatphp\Pagination\Style\Sliding;
use Flatphp\Pagination\Style\StyleInterface;

class Paginator
{
    protected $total = 0;
    protected $page = 1;
    protected $page_size = 20;
    protected $page_count = 1;
    protected $page_range = 10;
    /**
     * @var StyleInterface
     */
    protected $style = null;


    /**
     * @param int $total
     * @param int $page
     * @param array $options page_size default 20, page_range default 10, style default 'sliding'
     * @throws \Exception
     */
    public function __construct($total, $page = 1, $options = null)
    {
        $this->total = (int)$total;

        if (!empty($options['page_size'])) {
            $this->page_size = (int)$options['page_size'];
        }

        $this->page_count = ceil($this->total / $this->page_size);

        $page = (int)$page;
        if ($page < 1) {
            $page = 1;
        } elseif ($page > $this->page_count) {
            $page = $this->page_count;
        }
        $this->page = $page;

        if (!empty($options['page_range'])) {
            $this->setPageRange($options['page_range']);
        }

        if (!empty($options['style'])) {
            $this->setStyle($options['style']);
        } else {
            $this->style = new Sliding();
        }
    }

    /**
     * Set page range
     * @param int $page_range
     * @return $this
     */
    public function setPageRange($page_range)
    {
        $this->page_range = (int)$page_range;
        return $this;
    }


    /**
     * Set page style
     * @param StyleInterface | string $style
     * @return $this
     * @throws \Exception
     */
    public function setStyle($style)
    {
        if (is_string($style)) {
            $style = '\\Flatphp\\Pagination\\Style\\'. ucfirst(strtolower($style));
            $style = new $style();
        } elseif (!$style instanceof StyleInterface) {
            throw new \Exception('Page style must implement StyleInterface');
        }
        $this->style = $style;
        return $this;
    }


    /**
     * To array
     * @return array
     */
    public function toArray()
    {
        return array(
            'page' => $this->page,
            'page_size' => $this->page_size,
            'total' => $this->total,
            'page_count' => $this->page_count,
            'page_range' => $this->page_range,
            'has_prev' => $this->hasPrev(),
            'has_next' => $this->hasNext(),
            'prev' => $this->getPrev(),
            'next' => $this->getNext(),
            'range' => $this->getRange()
        );
    }


    /**
     * Get the styled range
     * @return array
     */
    public function getRange()
    {
        return $this->style->getRange($this);
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return int
     */
    public function getPageCount()
    {
        return $this->page_count;
    }

    /**
     * @return int
     */
    public function getPageSize()
    {
        return $this->page_size;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @return int
     */
    public function getPrev()
    {
        return $this->page > 1 ? ($this->page - 1) : 1;
    }

    /**
     * @return int
     */
    public function getNext()
    {
        return $this->page < $this->page_count ? ($this->page + 1) : $this->page_count;
    }

    /**
     * @return int
     */
    public function getPageRange()
    {
        return $this->page_range;
    }

    /**
     * @return bool
     */
    public function hasPrev()
    {
        return $this->page > 1;
    }

    /**
     * @return bool
     */
    public function hasNext()
    {
        return $this->page < $this->page_count;
    }

}