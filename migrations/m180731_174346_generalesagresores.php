<?php

use yii\db\Migration;

/**
 * Class m180731_174346_generalesagresores
 */
class m180731_174346_generalesagresores extends Migration
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

        $this->createTable('{{%crelacionagresores}}', [
            'id' => $this->primaryKey(),
            'relacionagresores' => $this->string(40)->notNull() . " COMMENT 'Relación con Agresores' ",

        ], $tableOptions
        );

        $this->batchInsert('crelacionagresores',
            array('relacionagresores'),
            array(
                ['Amiga / Amigo'],
                ['Compañera / Compañero'],
                ['Amasio'],
                ['Hermana / Hermano'],
                ['Hija / Hijo'],
                ['Jefa / Jefe'],
                ['Novio'],
                ['Madrastra / Padrastro'],
                ['Madre'],
                ['Padre'],
                ['Profesora / Profesor'],
                ['Suegra / Suegro'],
                ['Tia / Tio'],
                ['Vecina / Vecino'],
                ['Ex Pareja'],
                ['Concubinario'],
                ['Esposo'],
                [' Se desconoce'],
                ['Ninguna']

            )
        );

        $this->createTable('{{%csexos}}', [
            'id' => $this->primaryKey(),
            'sexo' => $this->string(40)->notNull() . " COMMENT 'Sexo' ",

        ], $tableOptions
        );

        $this->batchInsert('csexos',
            array('sexo'),
            array(
                ['Mujer'],
                ['Hombre']
            )
        );

        $this->createTable('generalesagresores', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'nombre' => $this->string(50),
            'apaterno' => $this->string(50),
            'amaterno' => $this->string(50),
            'sexo_id' => $this->integer(),
            'alias' => $this->string(),
            'fnac' => $this->date(),
            'lugarnac' => $this->string(30),
            'relacionagresor_id' => $this->integer(),
            'estadocivil_id' => $this->integer(),
            'vive_en_xalapa' => $this->char(1),
            'donde_xalapa' => $this->string(10), // Urbano o Rural
            'domicilio' => $this->string(100),
            'colonia_id' => $this->integer(),
            'colonia_otra' => $this->string(100),

            'telefono_local' => $this->string(10),
            'telefono_celular' => $this->string(10),
            'localidad' => $this->string(50),
            'municipio' => $this->string(100),
            'estado' => $this->string(100),
            'nacionalidad_id' => $this->integer(),
            'religion_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->addForeignKey('FK_generalesagresores_cedula', 'generalesagresores', 'cedula_id', 'cedulas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesagresores_csexo', 'generalesagresores', 'sexo_id', 'csexos', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesagresores_crelacionagresor', 'generalesagresores', 'relacionagresor_id', 'crelacionagresores', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesagresores_cestadocivil', 'generalesagresores', 'estadocivil_id', 'cestadosciviles', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesagresores_colonias', 'generalesagresores', 'colonia_id', 'ccolonias', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesagresores_nacionalidad', 'generalesagresores', 'nacionalidad_id', 'cnacionalidades', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesagresores_religiones', 'generalesagresores', 'religion_id', 'creligiones', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesagresores_user', 'generalesagresores', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesagresores_user2', 'generalesagresores', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180731_174346_generalesagresores cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180731_174346_generalesagresores cannot be reverted.\n";

        return false;
    }
    */
}
