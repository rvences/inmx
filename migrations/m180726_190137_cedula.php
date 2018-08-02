<?php

use yii\db\Migration;

/**
 * Class m180726_190137_cedula
 */
class m180726_190137_cedula extends Migration
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

        $this->createTable('{{%ctiposatencion}}', [
            'id' => $this->primaryKey(),
            'tipoatencion' => $this->string(20)->notNull() . " COMMENT 'Tipo de Atención' ",

        ], $tableOptions
        );

        $this->batchInsert('ctiposatencion',
            array('tipoatencion'),
            array(
                ['Presencial'],
                ['Telefónica'],
            )
        );

        $this->createTable('status_cedulas', [
            'id' => $this->primaryKey(),
            'status_cedula' => $this->string(50),
        ], $tableOptions);

        $this->batchInsert('status_cedulas',
            array('status_cedula'),
            array(
                ['Creada sin utilizar'],
                ['Con información básica de Atención'],
            )
        );

        $this->createTable('cedulas', [
            'id' => $this->primaryKey(),
            'status_id' => $this->integer()->notNull(),
            'tipoatencion_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(), // CT o CP
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(), // CT o CP
            'updated_by' => $this->integer()->notNull(),

        ], $tableOptions);
        $this->addForeignKey('KF_cedula_status', 'cedulas', 'status_id', 'status_cedulas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedula_tipoatencion', 'cedulas', 'tipoatencion_id', 'ctiposatencion', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedula_user', 'cedulas', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedula_user2', 'cedulas', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');


        $this->createTable('{{%ctiposllamadas}}', [
            'id' => $this->primaryKey(),
            'tipo_llamada' => $this->string(20)->notNull()
        ], $tableOptions);
        $this->batchInsert('ctiposllamadas', array('tipo_llamada'),
            array(
                ['Activa'],
                ['Información'],
                ['Broma'],
                ['Colgaron'],
                ['Obscena']
            )
        );

        $this->createTable('{{%clugaresresidencias}}', [
            'id' => $this->primaryKey(),
            'lugar_residencia' => $this->string(70)->notNull()
        ], $tableOptions);
        $this->batchInsert('clugaresresidencias', array('lugar_residencia'),
            array(
                ['Otro Municipio del Estado'],
                ['Otro Lugar de la Rep. Mexicana'],
                ['Otro País'],
                ['Andres Montes'],
                ['El Castillo'],
                ['El Sumidero'],
                ['El Tronconal Congregación'],
                ['Chavarrillo'],
                ['Chiltoyac Congregación'],
                ['Julio Castro, Congregación ( Las Trancas)'],
                ['Paso del Toro'],
                ['Valle encantado, Fracc Campestre ( Xolostla)'],
                ['Seis (6) de Enero Col.'],
            )
        );

        $this->createTable('{{%ctipificaciones}}', [
            'id' => $this->primaryKey(),
            'tipificacion' => $this->string(40)->notNull()
        ], $tableOptions);
        $this->batchInsert('ctipificaciones', array('tipificacion'),
            array(
                ['Tipificacion 1'],
                ['Tipificacion 2'],
            )
        );

        $this->createTable('{{%ctiposemergencias}}', [
            'id' => $this->primaryKey(),
            'tipo_emergencia' => $this->string(40)->notNull()
        ], $tableOptions);
        $this->batchInsert('ctiposemergencias', array('tipo_emergencia'),
            array(
                ['Emergencia 1'],
                ['Emergencia 2'],
            )
        );

        $this->createTable('{{%ccoorporaciones}}', [
            'id' => $this->primaryKey(),
            'coorporacion' => $this->string(40)->notNull()
        ], $tableOptions);
        $this->batchInsert('ccoorporaciones', array('coorporacion'),
            array(
                ['Coorporacion 1'],
                ['Coorporacion 2'],
            )
        );

        $this->createTable('{{%ctiposasesorias}}', [
            'id' => $this->primaryKey(),
            'tipoasesoria' => $this->string(20)->notNull() . " COMMENT 'Tipo de Asesoría' ",

        ], $tableOptions
        );

        $this->batchInsert('ctiposasesorias',
            array('tipoasesoria'),
            array(
                ['Psicológica'],
                ['Jurídica'],
                ['Trabajo Social'],
                ['Promotora'],
            )
        );

        $this->createTable('ccolonias', [
            'id' => $this->primaryKey(),
            'colonia' => $this->string(70)->unique(),
            'cp' => $this->char(5)
        ], $tableOptions);

        // select FROM_UNIXTIME(created_at) from cedula;
        $this->createTable('cedulas_telefonicas', [
            'id' => $this->primaryKey(), // Folio de Atención  CT o CP
            'cedula_id' => $this->integer(),
            'tel_llamada' => $this->string(10), // CT
            'tipo_llamada_id' => $this->integer(), // CT
            'lugar_residencia_id' => $this->integer(), // CT
            'lugar_residencia_otro_desc' => $this->string(50), // CT
            'tipificacion_id' => $this->integer(), // CT
            'tipo_emergencia_id' => $this->integer(), // CT
            'coorporacion_id' => $this->integer(), // CT
            'institucion_canaliza' => $this->string(100), // CT

            'fecha_incidente' => $this->date(), // Fecha último incidente // CT o CP
            'demanda' => $this->text(), // Demanda o situación desencadenante // CT o CP
            'emergencia_nombre' => $this->string(100),  // CT
            'emergencia_telefono_domicilio' => $this->string(10), // CT
            'emergencia_telefono_celular' => $this->string(10), // CT
            'tipoasesorias' => $this->string(100),
            'direccion' => $this->string(250),
            'referencia' => $this->string(200),
            'colonia_id' => $this->integer(),
            'nombre_temporal' => $this->string(100),
            'narracion_hechos' => $this->text(),
            'hora_inicio' => $this->time(), // CP
            'hora_termino' => $this->time(), // CP
            'created_at' => $this->integer()->notNull(), // CT o CP
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(), // CT o CP
            'updated_by' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('KF_cedula_cedulatelefonica', 'cedulas_telefonicas', 'cedula_id', 'cedulas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulatelefonica_user', 'cedulas_telefonicas', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulatelefonica_user2', 'cedulas_telefonicas', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulatelefonica_ctipollamada', 'cedulas_telefonicas', 'tipo_llamada_id', 'ctiposllamadas', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulatelefonica_ctipificacion', 'cedulas_telefonicas', 'tipificacion_id', 'ctipificaciones', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulatelefonica_ctiposemergencias', 'cedulas_telefonicas', 'tipo_emergencia_id', 'ctiposemergencias', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulatelefonica_ccoorporaciones', 'cedulas_telefonicas', 'coorporacion_id', 'ccoorporaciones', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedula_colonias', 'cedulas_telefonicas', 'colonia_id', 'ccolonias', 'id', 'RESTRICT', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180726_190137_cedula cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180726_190137_cedula cannot be reverted.\n";

        return false;
    }
    */
}
