<?php
namespace app\common;

use yii\filters\AccessRule;

class Rule extends AccessRule
{
    protected function matchRole($user)
    {
        if (empty($this->roles)) {
            return true;
        }
        foreach ($this->roles as $role) {
            if ($role === '?') {
                if ($user->getIsGuest()) {
                    return true;
                }
            } else if ($role === '@') {
                if (!$user->getIsGuest()) {
                    return true;
                }
            } else if (!$user->getIsGuest() && $role === $user->identity->role) {
                return true;
            }
        }
        return false;
    }
}