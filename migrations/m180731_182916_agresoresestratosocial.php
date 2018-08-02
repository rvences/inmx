<?php

use yii\db\Migration;

/**
 * Class m180731_182916_agresoresestratosocial
 */
class m180731_182916_agresoresestratosocial extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('estratosocialagresores', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'ocupacion' => $this->string(100),
            'fuente_ingresos' => $this->string(100),
            'tipo_vivienda_id' => $this->integer(),
            'servicios_basicos' => $this->string(100),
            'programas_sociales' => $this->string(100),
            'servicio_medico' => $this->string(100),
            'discapacidad' => $this->string(100),
            'ingreso_mensual' => $this->double(),
            'servidor_publico' => $this->char(1),
            'cargo' => $this->string(100),
            'institucion' => $this->string(100),
            'nivel_estudios_id' => $this->integer(),
            'estatus_estudios' => $this->integer(),
            'idioma' => $this->string(100),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('FK_cedula_estratosocialagresores', 'estratosocialagresores', 'cedula_id', 'cedulas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_estratosocialagresores_user', 'estratosocialagresores', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_estratosocialagresores_user2', 'estratosocialagresores', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');

        $this->addForeignKey('FK_tipovivienda_estratosocialagresores', 'estratosocialagresores', 'tipo_vivienda_id', 'ctipoviviendas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_nivelestudio_estratosocialagresores', 'estratosocialagresores', 'nivel_estudios_id', 'cnivelesestudios', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180731_182916_agresoresestratosocial cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180731_182916_agresoresestratosocial cannot be reverted.\n";

        return false;
    }
    */
}
