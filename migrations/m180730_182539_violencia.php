<?php

use yii\db\Migration;

/**
 * Class m180730_182539_violencia
 */
class m180730_182539_violencia extends Migration
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

        $this->createTable('{{%ctiposviolencias}}', [
            'id' => $this->primaryKey(),
            'tipoviolencia' => $this->string(20)->notNull() . " COMMENT 'Tipos de Violencia' ",

        ], $tableOptions
        );

        $this->batchInsert('ctiposviolencias',
            array('tipoviolencia'),
            array(
                ['Psicologica'],
                ['Física'],
                ['Económica'],
                ['Sexual'],
                ['Patrimonial'],
                ['Obstétrica']
            ));

        $this->createTable('{{%cmodalidadesviolencias}}', [
            'id' => $this->primaryKey(),
            'modalidadviolencia' => $this->string(30)->notNull() . " COMMENT 'Modalidad Violenta' ",

        ], $tableOptions);

        $this->batchInsert('cmodalidadesviolencias',
            array('modalidadviolencia'),
            array(
                ['Familiar'],
                ['Familiar Equiparada'],
                ['Laboral'],
                ['Institucional'],
                ['Comunitaria'],
                ['Escolar'],
                ['Feminicida'],
                ['De Género'],
                ['Política'],
            ));

        $this->createTable('{{%clugaresviolencias}}', [
            'id' => $this->primaryKey(),
            'lugarviolencia' => $this->string(45)->notNull() . " COMMENT 'Lugar de Violencia' ",

        ], $tableOptions);

        $this->batchInsert('clugaresviolencias',
            array('lugarviolencia'),
            array(
                ['Espacio particular'],
                ['Espacio público'],
                ['Transporte privado'],
                ['Transporte urbano'],
                ['Centro de Trabajo'],
                ['Institución Pública'],
                ['Institución Privada'],
                ['Instituciones Gubernamentales'],
                ['Bares y Antros'],
                ['Centro Comercial'],
                ['Centro Deportivo'],
                ['Centro Cultural'],
                ['Escuela o Colegio'],
                ['Hospital'],
                ['Templo / Iglesia'],
                ['Parque'],
                ['Mercado'],
                ['Aeropuerto'],
                ['Central de Autobuses'],
                ['Estacionamiento'],
                ['Empresa'],
                ['Negocio'],
                ['Institución'],
                ['Organismo Gubernamental'],
                ['Calle'],
                ['Salón Social / Ejidal'],
                ['Camino Vecinal'],
                ['Terreno Baldío'],
                ['Sembradío'],
                ['Playa'],
                ['Rio'],
                ['Autobus'],
                ['Taxi'],
                ['Microbus'],
                ['Combis'],
                ['Lancha'],
                ['Barco'],
                ['Avión'],
                ['Ferrocarril'],
                ['Camión'],
                ['Camión de Carga/Trailer'],
                ['Camioneta'],
                ['Ninguno'],
            ));

        $this->createTable('{{%csintomatologiasemocionales}}', [
            'id' => $this->primaryKey(),
            'sintomatologiaemocional' => $this->string(40)->notNull() . " COMMENT 'Sintomatología Emocional' ",

        ], $tableOptions
        );

        $this->batchInsert('csintomatologiasemocionales',
            array('sintomatologiaemocional'),
            array(
                ['Baja Autoestima'],
                ['Ansiedad'],
                ['Estrés'],
                ['Depresión'],
                ['Trastorno del Sueño'],
                ['Dependencia Emocional'],
                ['Afectación Emocional'],
                ['Miedo'],
                ['Trastorno de Alimentación'],
                ['Sentimientos de Indefinición'],
                ['Persecución'],
                ['Sumisión'],
                ['Falta de Habilidades Sociales'],
                ['Somatizaciones'],
                ['Perplejidad'],
                ['Bloqueo Cognitivo'],
                ['Descontrol'],
                ['Verguenza'],
                ['Agotamiento Psíquico'],
                ['Sentimiento de Culpa'],
            )
        );

        $this->createTable('{{%csintomatologiasfisicas}}', [
            'id' => $this->primaryKey(),
            'sintomatologiafisica' => $this->string(40)->notNull() . " COMMENT 'Sintomatología Física' ",

        ], $tableOptions
        );

        $this->batchInsert('csintomatologiasfisicas',
            array('sintomatologiafisica'),
            array(
                ['Cefalea'],
                ['Dolor Crónico en General'],
                ['Cervicalgia'],
                ['Mareo'],
                ['Molestias Gastrointestinales'],
                ['Molestias Pélvicas'],
            )
        );

        $this->createTable('{{%ccreencias}}', [
            'id' => $this->primaryKey(),
            'creencia' => $this->string(50)->notNull() . " COMMENT 'Creencia' ",

        ], $tableOptions
        );

        $this->batchInsert('ccreencias',
            array('creencia'),
            array(
                ['Justificación de agresiones'],
                ['Creencia real de lo que dice el otro'],
                ['Creencias tradicionales roles de género'],
                ['Resignación'],
                ['Fatalismo'],
                ['Voluntad poco firme de superación'],
            )
        );

        $this->createTable('{{%cfactorespsicosociales}}', [
            'id' => $this->primaryKey(),
            'factorpsicosocial' => $this->string(40)->notNull() . " COMMENT 'Factor Psicosocial' ",

        ], $tableOptions
        );

        $this->batchInsert('cfactorespsicosociales',
            array('factorpsicosocial'),
            array(
                ['Hijos'],
                ['Su propia familia no la apoya'],
                ['No trabaja'],
                ['No tiene un lugar dode vivir'],
                ['Revictimización'],
                ['Tratamiento psiquiátrico'],
                ['Otro'],
            )
        );

        $this->createTable('{{%crelacionesparejas}}', [
            'id' => $this->primaryKey(),
            'relacionpareja' => $this->string(50)->notNull() . " COMMENT 'Relación de Pareja' ",

        ], $tableOptions
        );

        $this->batchInsert('crelacionesparejas',
            array('relacionpareja'),
            array(
                ['Roles de pareja desiguales'],
                ['Ambivalencia afectiva en el agresor'],
                ['Falta de libertad'],
                ['Autonomía'],
                ['Ciclo de la violencia'],
                ['Tiempo de convivencia'],
                ['Agresiones previas a la denuncia'],
                ['Adaptación psicológica'],

            )
        );

        $this->createTable('{{%crelatos}}', [
            'id' => $this->primaryKey(),
            'relato' => $this->string(50)->notNull() . " COMMENT 'Relato' ",

        ], $tableOptions
        );

        $this->batchInsert('crelatos',
            array('relato'),
            array(
                ['Credibilidad del relato'],
                ['Coherente'],
                ['Con afectación emocional'],
                ['Con lagunas'],
                ['Discurso sobre la relación de pareja'],
                ['Resistencia a evocar recuerdos negativos'],
                ['Riqueza de detalles'],
            )
        );

        $this->createTable('{{%crelacionessociales}}', [
            'id' => $this->primaryKey(),
            'relacionsocial' => $this->string(30)->notNull() . " COMMENT 'Relación Social' ",

        ], $tableOptions
        );

        $this->batchInsert('crelacionessociales',
            array('relacionsocial'),
            array(
                ['Aislamiento'],
                ['Desadaptación Social'],
                ['Desadaptación Laboral'],
                ['Círculo relacional'],
            )
        );

        $this->createTable('{{%ctratamientos}}', [
            'id' => $this->primaryKey(),
            'tratamiento' => $this->string(40)->notNull() . " COMMENT 'Tratamiento' ",

        ], $tableOptions
        );

        $this->batchInsert('ctratamientos',
            array('tratamiento'),
            array(
                ['Tratamiento / Ayuda Emocional'],
            )
        );

        $this->createTable('{{%ctiposdemandas}}', [
            'id' => $this->primaryKey(),
            'tipodemanda' => $this->string(20)->notNull() . " COMMENT 'Tipo Demanda' ",

        ], $tableOptions
        );

        $this->batchInsert('ctiposdemandas',
            array('tipodemanda'),
            array(
                ['Penal'],
                ['Civil'],
                ['Laboral'],
                ['Mercantil'],
                ['Otra']
            )
        );

        $this->createTable('violencia', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'tipo_violencia' => $this->string(100),
            'modalidad_violencia' => $this->string(100),
            'lugar_violencia' => $this->string(100),
            'domicilio_victima' => $this->char(1),
            'domicilio' => $this->string(100),
            'colonia_id' => $this->integer(),
            'fecha_incidente' => $this->date(),
            'localidad' => $this->string(50),
            'municipio' => $this->string(100),
            'estado' => $this->string(100),
            'consume_alcohol' => $this->char(1),
            'penso_suicidarse'  => $this->char(1),
            'intento_suicidarse'  => $this->char(1),
            'hospitalizada_anteriormente' => $this->char(1),
            'requiere_hospitalizacion' => $this->char(1),
            'vigilancia_agresor' => $this->char(1),
            'llamadas_libremente' => $this->char(1),
            'visitas_libremente' => $this->char(1),
            'recibio_amenazas' => $this->char(1),
            'vive_agresor' => $this->char(1),
            'vive_familia_agresor' => $this->char(1),
            'vive_cerca_agresor' => $this->char(1),
            'abandono_casa' => $this->char(1),
            'lugar_vivir' => $this->char(1),
            'sintomatologia_emocional' => $this->string(100),
            'sintomatologia_fisica' => $this->string(100),
            'creencias' => $this->string(100),
            'factores_psicosociales' => $this->string(100),
            'factor_psicosocial_otro' => $this->string(100),
            'relacion_pareja' => $this->string(100),
            'relato' => $this->string(100),
            'relaciones_sociales' => $this->string(100),
            'tratamiento' => $this->string(100),
            'tipo_demanda' => $this->string(100),
            'tipo_demanda_otra' => $this->string(100),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->addForeignKey('FK_violencia_cedula', 'violencia', 'cedula_id', 'cedulas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_violencia_user', 'violencia', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_violencia_user2', 'violencia', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');

        $this->createTable('violencia_textos', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'evaluacion_psicologica' => $this->text(),
            'relato_juridico' => $this->text(),
            'situacion_legal' => $this->text(),
            'procedimiento_legal' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->addForeignKey('FK_violenciatexto_cedula', 'violencia_textos', 'cedula_id', 'cedulas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_violenciatexto_user', 'violencia_textos', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_violenciatexto_user2', 'violencia_textos', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');



    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180730_182539_violencia cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180730_182539_violencia cannot be reverted.\n";

        return false;
    }
    */
}
