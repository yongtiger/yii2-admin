<?php

use yongtiger\admin\components\Configs;

/**
 * Migration table of table_menu
 * 
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class m170302_111327_create_menu_table extends \yii\db\Migration
{

    /**
     * @inheritdoc
     */
    public function up()
    {
        $menuTable = Configs::instance()->menuTable;
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable($menuTable, [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull(),
            'parent' => $this->integer(),
            'route' => $this->string(),
            'order' => $this->integer(),
            'data' => $this->binary(),
            "FOREIGN KEY ([[parent]]) REFERENCES {$menuTable}([[id]]) ON DELETE SET NULL ON UPDATE CASCADE",
        ], $tableOptions);

        ///Demo data
        $this->insert($menuTable,['id'=>'1','name'=>'RBAC','parent'=>null,'route'=>null,'order'=>1,'data'=>0x7B2269636F6E223A202266612066612D6C6F636B222C202276697369626C65223A20747275657D);
        $this->insert($menuTable,['id'=>'2','name'=>'Route','parent'=>'1','route'=>'@app-backend/admin/route/index','order'=>1,'data'=>null);
        $this->insert($menuTable,['id'=>'3','name'=>'Permission','parent'=>'1','route'=>'@app-backend/admin/permission/index','order'=>2,'data'=>null);
        $this->insert($menuTable,['id'=>'4','name'=>'Role','parent'=>'1','route'=>'@app-backend/admin/role/index','order'=>3,'data'=>null);
        $this->insert($menuTable,['id'=>'5','name'=>'Assignment','parent'=>'1','route'=>'@app-backend/admin/assignment/index','order'=>4,'data'=>null);
        $this->insert($menuTable,['id'=>'6','name'=>'Menu','parent'=>'1','route'=>'@app-backend/admin/menu/index','order'=>5,'data'=>null);
        $this->insert($menuTable,['id'=>'7','name'=>'User','parent'=>null,'route'=>'@app-backend/user/user/index','order'=>2,'data'=>0x7B2269636F6E223A202266612066612D75736572222C202276697369626C65223A20747275657D);
        $this->insert($menuTable,['id'=>'8','name'=>'Site Settings','parent'=>null,'route'=>'@app-backend/setting/default/update&category=site','order'=>3,'data'=>0x7B2269636F6E223A202266612066612D636F67222C202276697369626C65223A20747275657D);
        $this->insert($menuTable,['id'=>'88','name'=>'Gii','parent'=>null,'route'=>'@app-backend/gii/default/index','order'=>88,'data'=>0x7B2269636F6E223A202266612066612D66696C652D636F64652D6F222C202276697369626C65223A20747275657D);
        $this->insert($menuTable,['id'=>'99','name'=>'Debug','parent'=>null,'route'=>'@app-backend/debug/default/index','order'=>99,'data'=>0x7B2269636F6E223A202266612066612D64617368626F617264222C202276697369626C65223A20747275657D);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable(Configs::instance()->menuTable);
    }
}
