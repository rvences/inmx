<?php

use yii\db\Migration;

/**
 * Class m180727_162456_expediente
 */
class m180727_162456_expediente extends Migration
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

        $this->createTable('{{%cestadosciviles}}', [
            'id' => $this->primaryKey(),
            'estadocivil' => $this->string(40)->notNull() . " COMMENT 'Estado Civil' ",

        ], $tableOptions
        );

        $this->batchInsert('cestadosciviles',
            array('estadocivil'),
            array(
                ['Casada'],
                ['Concubina ( Unión Libre)'],
                ['Divorciada'],
                ['Soltera'],
                ['Viuda'],
                ['Amasiato'],
                ['Separada'],
                ['Se Desconoce'],
                ['Noviazgo'],

            )
        );

        $this->createTable('{{%cnacionalidades}}', [
            'id' => $this->primaryKey(),
            'nacionalidad' => $this->string(50)->notNull() . " COMMENT 'Nacionalidad' ",

        ], $tableOptions
        );

        $this->batchInsert('cnacionalidades',
            array('nacionalidad'),
            array(
                ['Mexicana / Mexicano'],
                ['Española / Español'],
                ['Estadounidense'],
                ['Argentina / Argentino'],
                ['Guatemalteca / Guatemalteco'],
                ['China / Chino'],
                ['Hondureña / Hondureño'],
                ['Colombiana / Colombiano'],
                ['Costarricense'],
                ['Cubana / Cubano'],
                ['Chilena / Chileno'],
                ['Salvadoreña / Salvadoreño'],
                ['Nicaraguense'],
                ['Puertoriqueña / Puertoriqueño'],
                ['Alemana / Aleman'],
                ['Otras Nacionalidades'],

            )
        );

        $this->createTable('{{%creligiones}}', [
            'id' => $this->primaryKey(),
            'religion' => $this->string(40)->notNull() . " COMMENT 'Religión' ",

        ], $tableOptions
        );

        $this->batchInsert('creligiones',
            array('religion'),
            array(
                ['Adventista del Séptimo Día'],
                ['Budista'],
                ['Católica'],
                ['Espiritualista'],
                ['Evangelista'],
                ['Islamica'],
                ['Judaica'],
                ['Mormona'],
                ['Nativista'],
                ['Pentecostal'],
                ['Protestante Histórica'],
                ['Testigo de Jehova'],
                ['Sin Religión'],
                ['Otra'],
                ['Cristiana'],
            )
        );



        $this->createTable('generalesusuarias', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'nombre' => $this->string(50),
            'apaterno' => $this->string(50),
            'amaterno' => $this->string(50),
            'fnac' => $this->date(),
            'lugarnac' => $this->string(30),
            'pertenece_grupo_etnico' => $this->char(1),
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
            'violencia_pareja' => $this->char(1),
            // Opciones Adicionales Menor de Edad
            'responsable_menor' => $this->string(100),
            'responsable_telefono' => $this->string(10),
            'responsable_observaciones' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->addForeignKey('FK_generalesusuarias_cedula', 'generalesusuarias', 'cedula_id', 'cedulas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesusuarias_cestadocivil', 'generalesusuarias', 'estadocivil_id', 'cestadosciviles', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesusuarias_colonias', 'generalesusuarias', 'colonia_id', 'ccolonias', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesusuarias_nacionalidad', 'generalesusuarias', 'nacionalidad_id', 'cnacionalidades', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesusuarias_religiones', 'generalesusuarias', 'religion_id', 'creligiones', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesusuarias_user', 'generalesusuarias', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesusuarias_user2', 'generalesusuarias', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180727_162456_expediente cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180727_162456_expediente cannot be reverted.\n";

        return false;
    }
    */
}
