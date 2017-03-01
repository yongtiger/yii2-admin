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

use Yii;
use yii\rbac\Rule;

/**
 * RouteRule Rule for check route with extra params.
 *
 * @package yongtiger\admin\components
 */
class RouteRule extends Rule
{
    const RULE_NAME = 'route_rule';

    /**
     * @inheritdoc
     */
    public $name = self::RULE_NAME;

    /**
     * @inheritdoc
     */
    public function execute($user, $item, $params)
    {
        $routeParams = isset($item->data['params']) ? $item->data['params'] : [];
        foreach ($routeParams as $key => $value) {
            if (!array_key_exists($key, $params) || $params[$key] != $value) {
                return false;
            }
        }
        return true;
    }
}
