<?php

use yii\db\Migration;

/**
 * Class m180801_152457_seguimiento
 */
class m180801_152457_seguimiento extends Migration
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

        $this->createTable('{{%cbanesvim}}', [
            'id' => $this->primaryKey(),
            'banesvim' => $this->string(100)->notNull() . " COMMENT 'BANESVIM' ",

        ], $tableOptions
        );

        $this->batchInsert('cbanesvim',
            array('banesvim'),
            array(
                ['SS - Secretaria de Salud'],
                ['Sistema DIF Estatal - Desarrollo integral de la familia'],
                ['IVM - Instituto Veracruzano de las Mujeres'],
                ['FGE - Fiscalía General del Estado'],
                ['SSP - Secretaría de Seguridad Pública'],
                ['SEGOB - Secretaría de Gobierno'],
                ['DIF Municipal - Desarrollo Integral de la familia'],
                ['Delegación SEDESOL - Secretaría de Desarrollo Social'],
                ['ONG - Organismos NO Gubernamentales'],
                ['CEAPP - Comisión Estatal para la atención y protección de los periodistas'],
                ['CEDH - Comisión Estatal de los Derechos Humanos'],
                ['IMM - Instituto Municipal de las Mujeres'],
                ['SEV - Secretaría de Educación de Veracruz'],
                ['STPSyP - Secretaría del Trabajo y Previsión Social y Productividad'],
                ['Otra Dependencia']
            ));

        $this->createTable('{{%cpaimef}}', [
            'id' => $this->primaryKey(),
            'paimef' => $this->string(100)->notNull() . " COMMENT 'PAIMEF' ",

        ], $tableOptions
        );

        $this->batchInsert('cpaimef',
            array('paimef'),
            array(
                ['CAPACITS - Centro de Atención a Personas de Transmisión Sexual'],
                ['DIF Asistencia Médica'],
                ['DIF Asistencia Social'],
                ['DIF Procuraduría de la Defensa del Menor y el Indígena'],
                ['HAYUNT Autoridades Municipales Síndico'],
                ['HAYUNT Presidente(a) municipal o estatal'],
                ['HOSPSIC Hospital Psiquiátrico'],
                ['IMSS Instituto Mexicano del Seguro Social'],
                ['INSTJV Instituto de la Juventud Veracruzana'],
                ['INSTPUB Instituto Público de Asistencia Psicológica'],
                ['ISSSTE Instituto de Seguro Social de Trabajadores del Estado'],
                ['IVM - Instituto Veracruzano de las Mujeres'],
                ['IMM Instituto Municipal de la Mujer'],
                ['PGJ Agencias del Ministerio Público Especialidaza en Delitos Sexuales'],
                ['PGJ Agencias del Ministerio Público Investigador'],
                ['PGJ Centro de Atención a Víctimas del Delito'],
                ['PGJ Dirección General de Servicios Peliciales'],
                ['PGJ Subproduraduría de Asuntos Indígenas'],
                ['PGJ Subproc. Espec. en Inv. de delitos de violencia contra las mujeres'],
                ['Pjudicial Centro de medicación y conciliación'],
                ['PJudicial Juzgados de primera instancia'],
                ['S.S.A. Centro de reeducación para mujeres a una vida libre de violencia'],
                ['S.S.A. Hospital Civil'],
                ['SEDARPA Secretaría de Desarrollo Agropecuario y pesca'],
                ['SEDESOL Programa de Estancias Infantiles'],
                ['SEDESOL Programa de Oportunidades'],
                ['SEFIPLAN Secretaría de Finanzas y planeación'],
                ['SEP Secretaría de Educación Pública'],
                ['STPS Secretaría de Trabajo, Previsión Social y Productividad'],
                ['UV Universidad Veracruzana'],
                ['CEMCO'],
                ['FEVINTRA Fiscalia Esp. de Tráfico y trata'],
                ['Refugios pertenecientes al estado estatal o federal'],
                ['Refugios de OSC'],
                ['SRELEXT Secretaría de Relaciones Exteriores'],
                ['Instituto Veracruzano de la Defensoría Pública']
            ));

        $this->createTable('{{%ctiposseguimientos}}', [
            'id' => $this->primaryKey(),
            'tiposeguimiento' => $this->string(20)->notNull() . " COMMENT 'Tipos de Seguimiento' ",

        ], $tableOptions
        );

        $this->batchInsert('ctiposseguimientos',
            array('tiposeguimiento'),
            array(
                ['Psicologico'],
                ['Jurídico'],
                ['Telefónico'],
                ['Presencial'],
            ));

        $this->createTable('{{%ctiposcanalizaciones}}', [
            'id' => $this->primaryKey(),
            'tipocanalizacion' => $this->string(20)->notNull() . " COMMENT 'Tipos de Canalizaciones' ",

        ], $tableOptions
        );

        $this->batchInsert('ctiposcanalizaciones',
            array('tipocanalizacion'),
            array(
                ['Psicologica'],
                ['Jurídica'],
            ));

        $this->createTable('seguimiento', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'victima_canalizada' => $this->char(1),
            'tipocanalizacion_id' => $this->integer(),
            'banesvim' => $this->string(100),
            'paimef' => $this->string(100),
            'tipo_seguimiento' => $this->string(100),
            'requiere_proteccion' => $this->char(1),
            'solicita_proteccion' => $this->char(1),
            'fuero_federal' => $this->char(1),
            'solicita_informacion' => $this->char(1),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->addForeignKey('FK_seguimiento_cedula', 'seguimiento', 'cedula_id', 'cedulas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_seguimiento_tipocanalizacion', 'seguimiento', 'tipocanalizacion_id', 'ctiposcanalizaciones', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_seguimiento_user', 'seguimiento', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_seguimiento_user2', 'seguimiento', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180801_152457_seguimiento cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180801_152457_seguimiento cannot be reverted.\n";

        return false;
    }
    */
}
