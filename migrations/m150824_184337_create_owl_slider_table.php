<?php

use yii\db\Schema;
use yii\db\Migration;

class m150824_184337_create_owl_slider_table extends Migration
{
    public function safeUp()
    {
		$this->createTable('{{%eg_owl_slides_category}}',[
			'id' => $this->primaryKey(),
			'name' => $this->string(32)->notNull(),
			'update_time' => $this->timestamp(),
			'creation_time' => $this->timestamp(),
			'status' => $this->smallInteger()->notNull()->defaultValue(0)
		]);
		$this->createTable('{{%eg_owl_slides}}',[
			'id' => $this->primaryKey(),
			'category_id' => $this->integer(11),
			'background_image' => $this->string(32)->notNull()->defaultValue('default.png'),
			'language' => $this->string(5)->notNull(),
			'title' => $this->string(32),
			'text1' => $this->string(256),
			'text1_image' => $this->string(32),
			'text1_color' => $this->smallInteger()->notNull()->defaultValue(0),
			'text1_bgcolor' => $this->smallInteger()->notNull()->defaultValue(0),
			'text1_motion' => $this->smallInteger()->notNull()->defaultValue(0),
			'text1_align_css' => $this->smallInteger()->notNull()->defaultValue(0),
			'text2' => $this->string(256),
			'text2_image' => $this->string(32),
			'text2_color' => $this->smallInteger()->notNull()->defaultValue(0),
			'text2_bgcolor' => $this->smallInteger()->notNull()->defaultValue(0),
			'text2_motion' => $this->smallInteger()->notNull()->defaultValue(0),
			'text2_align_css' => $this->smallInteger()->notNull()->defaultValue(0),
			'text3' => $this->string(256),
			'text3_image' => $this->string(32),
			'text3_color' => $this->smallInteger()->notNull()->defaultValue(0),
			'text3_bgcolor' => $this->smallInteger()->notNull()->defaultValue(0),
			'text3_motion' => $this->smallInteger()->notNull()->defaultValue(0),
			'text3_align_css' => $this->smallInteger()->notNull()->defaultValue(0),
			'link' => $this->string(64),
			'update_time' => $this->timestamp(),
			'creation_time' => $this->timestamp(),
			'sort_order' => $this->smallInteger()->notNull()->defaultValue(0),
			'status' => $this->smallInteger()->notNull()->defaultValue(0),
		]);
		$this->addForeignKey('fk_eg_owl_slides_category', '{{%eg_owl_slides}}', 'category_id', '{{%eg_owl_slides_category}}', 'id', 'SET NULL', 'CASCADE');
    }
    
    public function safeDown()
    {
		$this->dropForeignKey('fk_eg_owl_slides_category', '{{%eg_owl_slides}}');
		$this->dropTable('{{%eg_owl_slides}}');
		$this->dropTable('{{%eg_owl_slides_category}}');
    }
}
