# pagination
light pagination component

# Install
```
composer require flatphp/pagination
```

# Usage
```php
$page = 16;
$p = new \Flatphp\Pagination\Paginator(1506, $page);
$p->getNext();
$p->getPageRange();
// ...

// or specify page_size or specify page style, default sliding，others: all, elastic, jumping
$p = new Flatphp\Pagination\Paginator(1506, $page, ['page_size' => 30, 'style' => 'jumping']);
$a = $p->toArray();
print_r($a);
```

#### result
```
Array
(
    [page] => 16
    [page_size] => 20
    [total] => 1506
    [page_count] => 76
    [page_range] => 10
    [has_prev] => 1
    [has_next] => 1
    [prev] => 15
    [next] => 17
    [range] => Array
        (
            [0] => 11
            [1] => 12
            [2] => 13
            [3] => 14
            [4] => 15
            [5] => 16
            [6] => 17
            [7] => 18
            [8] => 19
            [9] => 20
        )

)
```