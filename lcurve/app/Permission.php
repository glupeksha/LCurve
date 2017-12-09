<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
  public function permissible()
  {
    return $this->morphTo();
  }

}
