<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

trait Pagination
{
    public function pagination($items, $length, $path = null)
    {
        if ($items instanceof Collection) {
            $items = $items->all();
        }

        $page = Paginator::resolveCurrentPage("page");
        $offset = ($page - 1) * $length;
        $paginator = new LengthAwarePaginator(
            array_slice($items, $offset, $length),
            count($items),
            $length
        );

        if ($path) {
            $paginator->setPath($path);
        } else {
            $paginator->setPath(Paginator::resolveCurrentPath());
        }

        return $paginator;
    }
}
