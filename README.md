# pagination
light pagination component   
简单分页组件

# Install
```
composer require flatphp/pagination
```

# Usage
```php
use Flatphp\Pagination\Paginator;

$page = 16;
$p = new Paginator(1506, $page);
$p->getNext();
// ...


// or specify page_size or specify page style, default sliding，others: all, elastic, jumping
// 配置每页数量，以及分页样式
$p = new Paginator(1506, $page, ['page_size' => 30, 'style' => 'jumping']);
$a = $p->toArray();
print_r($a);
```

# Style
| style | note |
| --- | --- |
| sliding | 平滑，当前页在中间 |
| all | 全部宽度 |
| elastic | 弹性，当前页在中间，双倍宽度 |
| jumping | 跳跃，整个宽度到下一批宽度 |

# Methods
| method | note |
| --- | --- |
| setPageRange($page_range) | 设置分页范围宽度 |
| setStyle($style) | 设置类型 |
| toArray() | 数组 |
| getRange() | 获取宽度大小 |
| getTotal() | 获取总数量 |
| getPageCount() | 获取总页数 |
| getPageSize() | 获取每页数量 |
| getPage() | 获取当前页 |
| getPrev() | 获取上一页 |
| getNext() | 获取下一页 |
| getPageRange() | 获取当前宽度范围 |
| hasPrev() | 是否有上一页 |
| hasNext() | 是否有下一页 |


#### toArray
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
