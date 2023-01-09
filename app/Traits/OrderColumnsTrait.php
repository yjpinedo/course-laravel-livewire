<?php

namespace App\Traits;

trait OrderColumnsTrait
{
    public $sortColumn = 'id';
    public $sortMethod = 'asc';

    /* Sort */
    public function sort($column)
    {
       $this->sortColumn = $column;
       $this->sortMethod = $this->sortMethod == 'asc' ? 'desc' : 'asc';
    }
}
