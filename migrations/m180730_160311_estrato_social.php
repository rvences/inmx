<?php

use yii\db\Migration;

/**
 * Class m180730_160311_estrato_social
 */
class m180730_160311_estrato_social extends Migration
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

        $this->createTable('cocupaciones', [
            'id' => $this->primaryKey(),
            'ocupacion' => $this->string(100)
        ], $tableOptions);

        $this->batchInsert('cocupaciones',
            array('ocupacion'),
            array(
                ['Agricultura'],
                ['Explotación Forestal'],
                ['Ganadería'],
                ['Pesca'],
                ['Construcción'],
                ['Electricidad, Gas y Agua'],
                ['Industria Manufacturera'],
                ['Mineria'],
                ['Comercio'],
                ['Comunicaciones'],
                ['Servicios'],
                ['Transporte'],
                ['Comercio Informal'],
                ['Realiza quehaceres del hogar'],
                ['Estudia'],
                ['Jubiliada y Pensionada'],
                ['Remunerado'],
                ['No Remunerado']
            ));

        $this->createTable('cfuenteingresos', [
            'id' => $this->primaryKey(),
            'fuente_ingresos' => $this->string(100)
        ], $tableOptions);

        $this->batchInsert('cfuenteingresos',
            array('fuente_ingresos'),
            array(
                ['Autoconsumo'],
                ['Pago en especie'],
                ['Trabajo independiente'],
                ['Pensión'],
                ['Regalos'],
                ['Remesas'],
                ['Asalariada/o'],
                ['Renta de la Propiedad'],
                ['Pensión Alimenticia'],
                ['Becas'],
                ['Programas de Ayuda Social'],
                ['Otros Ingresos Monetarios']
            ));

        $this->createTable('ctipoviviendas', [
            'id' => $this->primaryKey(),
            'tipo_vivienda' => $this->string(100)
        ], $tableOptions);

        $this->batchInsert('ctipoviviendas',
            array('tipo_vivienda'),
            array(
                ['Prestada'],
                ['Rentada'],
                ['Propia'],
                ['De mi pareja'],
                ['De un familiar'],
                ['No tengo']

            ));

        $this->createTable('cserviciosbasicos', [
            'id' => $this->primaryKey(),
            'servicio_basico' => $this->string(100)
        ], $tableOptions);

        $this->batchInsert('cserviciosbasicos',
            array('servicio_basico'),
            array(
                ['Agua potable'],
                ['Drenaje'],
                ['Recolección de basura'],
                ['Alumbrado público'],
                ['Energía eléctrica'],
            ));

        $this->createTable('cprogramassociales', [
            'id' => $this->primaryKey(),
            'programa_social' => $this->string(100)
        ], $tableOptions);

        $this->batchInsert('cprogramassociales',
            array('programa_social'),
            array(
                ['Prospera ( Programa de Inclusión Social )'],
                ['Seguro de Vida para Jefas de Familia'],
                ['Programa de Apoyo Alimentario ( PAL )'],
                ['Pensión para Adultos Mayores'],
                ['Estancias Infantiles'],
                ['Programa de Abasto Rural ( DICONSA )'],
                ['Abasto Social de Leche ( LICONSA )'],
                ['Personas Adultas Mayores'],
                ['Programa de Empleo Temporal'],
                ['Programa de Atención a Jornaleros Agrícolas'],
                ['3x1 Para migrantes'],
                ['Fomento de las Artesanías'],
                ['Desarrollo de Zonas Prioritarias'],
                ['Opciones Productivas'],
                ['Programa de Conversión Social'],
                ['Seguro Popular'],
                ['Educación para Adultos']
            ));

        $this->createTable('cserviciosmedicos', [
            'id' => $this->primaryKey(),
            'servicio_medico' => $this->string(100)
        ], $tableOptions);

        $this->batchInsert('cserviciosmedicos',
            array('servicio_medico'),
            array(
                ['IMSS'],
                ['IMSS Oportunidades'],
                ['ISSSTE'],
                ['PEMEX'],
                ['Secretaria de Salud'],
                ['SEDENA'],
                ['Seguro Popular'],
                ['Seguro Privado'],
                ['SEMAR'],
                ['Medicina Tradicional'],
                ['Casa de Salud']
            ));

        $this->createTable('cnivelesestudios', [
            'id' => $this->primaryKey(),
            'nivel_estudio' => $this->string(100)
        ], $tableOptions);

        $this->batchInsert('cnivelesestudios',
            array('nivel_estudio'),
            array(
                ['Primaria'],
                ['Preparatoria / Bachillerato'],
                ['Preescolar o Kinder'],
                ['Carrera Técnica o Comercial'],
                ['Licenciatura'],
                ['Posgrado'],
                ['Maestria'],
                ['Doctorado'],
                ['Analfabeta'],
                ['Sabe leer - escribir']
            ));

        $this->createTable('cstatusestudios', [
            'id' => $this->primaryKey(),
            'status_estudio' => $this->string(100)
        ], $tableOptions);

        $this->batchInsert('cstatusestudios',
            array('status_estudio'),
            array(
                ['Terminado'],
                ['Inconcluso']
            ));


        $this->createTable('cdiscapacidades', [
            'id' => $this->primaryKey(),
            'discapacidad' => $this->string(100)
        ], $tableOptions);

        $this->batchInsert('cdiscapacidades',
            array('discapacidad'),
            array(
                ['Auditiva'],
                ['Cognitiva'],
                ['Lenguaje'],
                ['Motriz'],
                ['Visual'],
            ));

        $this->createTable('cenfermedades', [
            'id' => $this->primaryKey(),
            'enfermedad' => $this->string(100)
        ], $tableOptions);

        $this->batchInsert('cenfermedades',
            array('enfermedad'),
            array(
                ['Artritis'],
                ['Cancer'],
                ['Asma'],
                ['Diabetes'],
                ['Enfermedades Cardiovasculares'],
                ['Enfermedades Renales'],
                ['Epilepsia'],
                ['Gastritis'],
                ['Gota'],
                ['Hepatitis'],
                ['Hipertensión'],
                ['ITS'],
                ['SIDA'],
                ['Trastorno Psiquiátrico'],
                ['Desnutrición'],
                ['Cancer de Mama'],
                ['Cancer Cervicouterino'],
                ['Lucemia']
            ));



        $this->createTable('estratosocial', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'ocupacion' => $this->string(100),
            'fuente_ingresos' => $this->string(100),
            'tipo_vivienda_id' => $this->integer(),
            'servicios_basicos' => $this->string(100),
            'programas_sociales' => $this->string(100),
            'servicio_medico' => $this->string(100),
            'ingreso_mensual' => $this->double(),
            'servidor_publico' => $this->char(1),
            'cargo' => $this->string(100),
            'institucion' => $this->string(100),
            'nivel_estudios_id' => $this->integer(),
            'status_estudio_id' => $this->integer(),
            'idioma' => $this->string(100),
            'discapacidad' => $this->string(100),
            'enfermedad' => $this->string(100),
            'embarazada' => $this->char(1),
            'embarazo_observaciones' => $this->text(),
            'meses_embarazo' => $this->integer(),
            'violencia_obstetrica' => $this->char(1),
            'violencia_meses' => $this->integer(),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('FK_cedula_estratosocial', 'estratosocial', 'cedula_id', 'cedulas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_estratosocial_user', 'estratosocial', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_estratosocial_user2', 'estratosocial', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');

        $this->addForeignKey('FK_tipovivienda_estratosocial', 'estratosocial', 'tipo_vivienda_id', 'ctipoviviendas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_nivelestudio_estratosocial', 'estratosocial', 'nivel_estudios_id', 'cnivelesestudios', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_statusestudio_estratosocial', 'estratosocial', 'status_estudio_id', 'cstatusestudios', 'id', 'RESTRICT', 'CASCADE');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180730_160311_estrato_social cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180730_160311_estrato_social cannot be reverted.\n";

        return false;
    }
    */
}
