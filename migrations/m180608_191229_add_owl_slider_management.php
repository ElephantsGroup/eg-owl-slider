<?php

use yii\db\Migration;
use yii\db\Query;

/**
 * Class m180608_191229_add_owl_slider_management
 */
class m180608_191229_add_owl_slider_management extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$db = \Yii::$app->db;
		$query = new Query();
        if ($db->schema->getTableSchema("{{%auth_item}}", true) !== null)
		{
			if (!$query->from('{{%auth_item}}')->where(['name' => '/owl-slider/admin/*'])->exists())
				$this->insert('{{%auth_item}}', [
					'name'			=> '/owl-slider/admin/*',
					'type'			=> 2,
					'created_at'	=> time(),
					'updated_at'	=> time()
				]);
			if (!$query->from('{{%auth_item}}')->where(['name' => '/owl-slider/category-admin/*'])->exists())
				$this->insert('{{%auth_item}}', [
					'name'			=> '/owl-slider/category-admin/*',
					'type'			=> 2,
					'created_at'	=> time(),
					'updated_at'	=> time()
				]);
			if (!$query->from('{{%auth_item}}')->where(['name' => 'owl_slider_management'])->exists())
				$this->insert('{{%auth_item}}', [
					'name'			=> 'owl_slider_management',
					'type'			=> 2,
					'created_at'	=> time(),
					'updated_at'	=> time()
				]);
			if (!$query->from('{{%auth_item}}')->where(['name' => 'owl_slider_manager'])->exists())
				$this->insert('{{%auth_item}}', [
					'name'			=> 'owl_slider_manager',
					'type'			=> 1,
					'created_at'	=> time(),
					'updated_at'	=> time()
				]);
			if (!$query->from('{{%auth_item}}')->where(['name' => 'administrator'])->exists())
				$this->insert('{{%auth_item}}', [
					'name'			=> 'administrator',
					'type'			=> 1,
					'created_at'	=> time(),
					'updated_at'	=> time()
				]);
		}
        if ($db->schema->getTableSchema("{{%auth_item_child}}", true) !== null)
		{
			if (!$query->from('{{%auth_item_child}}')->where(['parent' => 'owl_slider_management', 'child' => '/owl-slider/admin/*'])->exists())
				$this->insert('{{%auth_item_child}}', [
					'parent'	=> 'owl_slider_management',
					'child'		=> '/owl-slider/admin/*'
				]);
			if (!$query->from('{{%auth_item_child}}')->where(['parent' => 'owl_slider_management', 'child' => '/owl-slider/category-admin/*'])->exists())
				$this->insert('{{%auth_item_child}}', [
					'parent'	=> 'owl_slider_management',
					'child'		=> '/owl-slider/category-admin/*'
				]);
			if (!$query->from('{{%auth_item_child}}')->where(['parent' => 'owl_slider_manager', 'child' => 'owl_slider_management'])->exists())
				$this->insert('{{%auth_item_child}}', [
					'parent'	=> 'owl_slider_manager',
					'child'		=> 'owl_slider_management'
				]);
			if (!$query->from('{{%auth_item_child}}')->where(['parent' => 'administrator', 'child' => 'owl_slider_manager'])->exists())
				$this->insert('{{%auth_item_child}}', [
					'parent'	=> 'administrator',
					'child'		=> 'owl_slider_manager'
				]);
		}
        if ($db->schema->getTableSchema("{{%auth_assignment}}", true) !== null)
		{
			if (!$query->from('{{%auth_assignment}}')->where(['item_name' => 'administrator', 'user_id' => 1])->exists())
				$this->insert('{{%auth_assignment}}', [
					'item_name'	=> 'administrator',
					'user_id'	=> 1,
					'created_at' => time()
				]);
		}
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
		// it's not safe to remove auth data in migration down
    }
}
