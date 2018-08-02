<?php

use yii\db\Migration;

/**
 * Class m180731_185408_factorriesgo
 */
class m180731_185408_factorriesgo extends Migration
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

        $this->createTable('{{%cagresionesdrogas}}', [
            'id' => $this->primaryKey(),
            'agresiondroga' => $this->string(40)->notNull() . " COMMENT 'Drogas en la Agresión' ",

        ], $tableOptions
        );

        $this->batchInsert('cagresionesdrogas',
            array('agresiondroga'),
            array(
                ['Alcohol'],
                ['Droga Ilegal'],
                ['Droga por indicación Médica'],
                ['Ninguna']
            )
        );

        $this->createTable('{{%cfrecuenciaagresiones}}', [
            'id' => $this->primaryKey(),
            'frecuenciaagresion' => $this->string(40)->notNull() . " COMMENT 'Frecuencia en la Agresión' ",

        ], $tableOptions
        );

        $this->batchInsert('cfrecuenciaagresiones',
            array('frecuenciaagresion'),
            array(
                ['Diario'],
                ['Varias veces a la semana'],
                ['Varias veces al mes'],
                ['Ocasionalmente'],
                ['Cada mes'],
                ['Única vez']
            )
        );

        $this->createTable('{{%carmasagresores}}', [
            'id' => $this->primaryKey(),
            'armasagresor' => $this->string(40)->notNull() . " COMMENT 'Armas del Agresor' ",

        ], $tableOptions
        );

        $this->batchInsert('carmasagresores',
            array('armasagresor'),
            array(
                ['Arma de fuego corta'],
                ['Arma de fuego larga'],
                ['Cuchillo'],
                ['Hacha'],
                ['Machete'],
                ['Navaja'],
                ['Picahielos'],
                ['Tijeras'],
                ['Ninguna'],
                ['Se ignora'],
                ['Otra']
            )
        );

        $this->createTable('{{%clesionesfisicas}}', [
            'id' => $this->primaryKey(),
            'lesionfisica' => $this->string(40)->notNull() . " COMMENT 'Lesión Física' ",

        ], $tableOptions
        );

        $this->batchInsert('clesionesfisicas',
            array('lesionfisica'),
            array(
                ['Contusión / Golpe'],
                ['Hematoma ( Moretón)'],
                ['Corte o Desgarre de la piel'],
                ['Fractura'],
                ['Quemadura'],
                ['Mordedura'],
                ['Raspadura'],
                ['Tentativa de Ahorcamiento']
            )
        );

        $this->createTable('{{%clesionesagentes}}', [
            'id' => $this->primaryKey(),
            'lesionagente' => $this->string(40)->notNull() . " COMMENT 'Agente' ",

        ], $tableOptions
        );

        $this->batchInsert('clesionesagentes',
            array('lesionagente'),
            array(
                ['Arma de fuego ( Bala)'],
                ['Arma Punzocortante'],
                ['Automóvil/Motocicleta'],
                ['Pie/Mano'],
            )
        );

        $this->createTable('{{%careaslesionadas}}', [
            'id' => $this->primaryKey(),
            'arealesionada' => $this->string(40)->notNull() . " COMMENT 'Area lesionada' ",

        ], $tableOptions
        );

        $this->batchInsert('careaslesionadas',
            array('arealesionada'),
            array(
                ['Cabeza'],
                ['Cara'],
                ['Cuello'],
                ['Extremidades Inferiores'],
                ['Extremidades Superiores']
            )
        );

        $this->createTable('{{%cdanospsicologicos}}', [
            'id' => $this->primaryKey(),
            'danopsicologico' => $this->string(40)->notNull() . " COMMENT 'Dano Psicologico' ",

        ], $tableOptions
        );

        $this->batchInsert('cdanospsicologicos',
            array('danopsicologico'),
            array(
                ['Angustia o Miedo'],
                ['Depresión'],
                ['Estrés Postraumático'],
                ['Insomnio'],
                ['Intento de Suicidio'],
                ['Peonso Suicidarse'],
                ['Trastornos Alimenticios'],
                ['Trastornos de Ansiedad'],
                ['Trastornos Psiquiátricos'],
                ['Tristeza o Aflicción'],
                ['Pérdida de Autonomía']
            )
        );

        $this->createTable('{{%cdanoseconomicos}}', [
            'id' => $this->primaryKey(),
            'danoeconomico' => $this->string(45)->notNull() . " COMMENT 'Dano Economico' ",

        ], $tableOptions
        );

        $this->batchInsert('cdanoseconomicos',
            array('danoeconomico'),
            array(
                ['Interrupción de Estudios'],
                ['No le da contribución económica'],
                ['La explota laboralmente'],
                ['Le quita su dinero'],
                ['Perdió propiedades'],
                ['Perdió trabajo'],
                ['No la deja trabajar']
            )
        );

        $this->createTable('{{%cindicadoresriesgos}}', [
            'id' => $this->primaryKey(),
            'indicadorriesgo' => $this->string()->notNull() . " COMMENT 'Indicador de Riesgo' ",

        ], $tableOptions
        );
        $this->batchInsert('cindicadoresriesgos',
            array('indicadorriesgo'),
            array(
                ['* Ataques previos con riesgo mortal'],
                ['* Amenazas de muerte a la victima'],
                ['* El agresor irrespeta las medidas de protección'],
                ['* El agresor es convicto o exconvicto por delitos contra las personas'],
                ['* El agresor tiene una acusación o condena previa por delitos contra la integridad fisica o sexual de las personas'],
                ['* Intento o amenaza de suicidio de parte del agresor'],
                ['* La víctima considera que el agresor es capaz de matarla'],
                ['* La víctima está aislada o retenida por el agresor contra su propia voluntad o lo ha estado previamente'],
                ['* Abuso sexual del agresor contra los hijos u otras personas menores de edad de la familia cercana, asi como tentativa de realizarlo'],
                ['El agresor pertenece a una institución policial, fuerzas armadas o procuración de justicia'],
                ['Hay abuso fisico contra los hijo/jas o la víctima y/o hijos/jas han sido amenazados o heridos con arma de fuego o blanca'],
                ['La víctima es recientemente separada, ha anunciado que piensa separarse, ha puesto una denuncia penal o han solicitado medidas de protección'],
                ['Abuso de alcohol o drogas por parte del agresor'],
                ['Aumento de la frecuencia y gravedad de la violencia'],
                ['La víctima ha recibido atención en salud como consecuencia de la agresiones o ha recibido atención psiquiátrica'],
                ['El agresor tiene antecedentes psiquiátricos'],
                ['El agresor es una persona que tiene conocimiento en el uso, acceso, trabaja o porta armas de fuego'],
                ['Resistencia violenta a la intervención policial o a la de otras figuras de autoridad'],
                ['Acoso, control o amedrentamiento sistemático de la víctima'],
                ['Que haya matado mascotas'],
            )
        );

        $this->createTable('{{%factoresriesgo}}', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'agresiondroga_id' => $this->integer(),
            'frecuenciaagresion_id' => $this->integer(),
            'armasagresor_id' => $this->integer(),
            'porta_armas_agresor' => $this->char(1),
            'lugarviolencia_id' => $this->integer(),
            'lesion_fisica' => $this->string(100),
            'lesion_agente' => $this->string(100),
            'area_lesionada' => $this->string(100),
            'dano_psicologico' => $this->string(100),
            'dano_economico' => $this->string(100),
            'indicador_riesgo' => $this->string(100),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->addForeignKey('FK_factoresriesgo_cedula', 'factoresriesgo', 'cedula_id', 'cedulas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_factoresriesgo_agresionesdrogas', 'factoresriesgo', 'agresiondroga_id', 'cagresionesdrogas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_factoresriesgo_frecuenciaagresiones', 'factoresriesgo', 'frecuenciaagresion_id', 'cfrecuenciaagresiones', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_factoresriesgo_armasagresor', 'factoresriesgo', 'armasagresor_id', 'carmasagresores', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_factoresriesgo_lugarviolencia', 'factoresriesgo', 'lugarviolencia_id', 'clugaresviolencias', 'id', 'RESTRICT', 'CASCADE');

        $this->addForeignKey('FK_factoresriesgo_user', 'factoresriesgo', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_factoresriesgo_user2', 'factoresriesgo', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180731_185408_factorriesgo cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180731_185408_factorriesgo cannot be reverted.\n";

        return false;
    }
    */
}
