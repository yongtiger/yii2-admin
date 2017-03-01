<?php ///[yii2-admin]

/**
 * Yii2 admin
 *
 * @link        http://www.brainbook.cc
 * @see         https://github.com/yongtiger/yii2-admin
 * @author      Tiger Yong <tigeryang.brainbook@outlook.com>
 * @copyright   Copyright (c) 2017 BrainBook.CC
 * @license     http://opensource.org/licenses/MIT
 */

namespace yongtiger\admin\components;

use yii\rbac\Rule;

/**
 * Class GuestRule
 *
 * @package yongtiger\admin\components
 */
class GuestRule extends Rule
{
    /**
     * @inheritdoc
     */
    public $name = 'guest_rule';

    /**
     * @inheritdoc
     */
    public function execute($user, $item, $params)
    {
        return $user->getIsGuest();
    }
}
