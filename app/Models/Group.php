<?php

namespace App\Models;

class Group extends Model
{
    const FAMILIES_GROUP_ID = 1;
    const FRIENDS_GROUP_ID = 2;
    const DEFAULT_GROUP_ID_ARRAY = [
      self::FAMILIES_GROUP_ID,
      self::FRIENDS_GROUP_ID,
    ];
}
