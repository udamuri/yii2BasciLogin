<?php

use yii\db\Migration;

/**
 * Class m191122_013421_init
 */
class m191122_013421_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%user}}', [
            'id' => $this->bigPrimaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'firstname' => $this->string(100)->notNull(),
            'lastname' => $this->string(100),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->insert('user', [
                'username'=> 'manajemen',
                'firstname'=> 'Manajemen',
                'lastname'=> '',
                'auth_key'=> \Yii::$app->security->generateRandomString(),
                'password_hash'=> \Yii::$app->getSecurity()->generatePasswordHash('123456'),
                'password_reset_token'=> NULL,
                'created_at' => strtotime(date('Y-m-d H:i:s')),
                'updated_at' => strtotime(date('Y-m-d H:i:s')),
                'email'=> 'manajemen@tes.mkom',
                'status'=> 10,
            ]
        );
        
        $this->insert('user', [
                'username'=> 'administrator',
                'firstname'=> 'Administrator',
                'lastname'=> '',
                'auth_key'=> \Yii::$app->security->generateRandomString(),
                'password_hash'=> \Yii::$app->getSecurity()->generatePasswordHash('123456'),
                'password_reset_token'=> NULL,
                'created_at' => strtotime(date('Y-m-d H:i:s')),
                'updated_at' => strtotime(date('Y-m-d H:i:s')),
                'email'=> 'admin@tes.mkom',
                'status'=> 20,
            ]
        );
        
        $this->insert('user', [
                'username'=> 'peminjam',
                'firstname'=> 'Peminjam',
                'lastname'=> '',
                'auth_key'=> \Yii::$app->security->generateRandomString(),
                'password_hash'=> \Yii::$app->getSecurity()->generatePasswordHash('123456'),
                'password_reset_token'=> NULL,
                'created_at' => strtotime(date('Y-m-d H:i:s')),
                'updated_at' => strtotime(date('Y-m-d H:i:s')),
                'email'=> 'peminjam@tes.mkom',
                'status'=> 30,
            ]
        );
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
