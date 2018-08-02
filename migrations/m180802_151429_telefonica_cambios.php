<?php

use yii\db\Migration;

/**
 * Class m180802_151429_telefonica_cambios
 */
class m180802_151429_telefonica_cambios extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->execute(file_get_contents('migrations/colonias.sql'));
        $this->execute(file_get_contents('migrations/ctiposemergencias.sql'));

        /*
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->dropColumn('cedulas_telefonicas', 'lugar_residencia_otro_desc');

        $this->dropColumn('cedulas_telefonicas','tipoasesorias');
        $this->dropTable('ctiposasesorias');

        $this->dropColumn('cedulas_telefonicas', 'demanda');

        $this->dropColumn('cedulas_telefonicas', 'lugar_residencia_id');
        $this->dropTable('clugaresresidencias');

        $this->createTable('cmunicipios', [
            'id' => $this->primaryKey(),
            'municipio' => $this->string(70)->unique(),
        ], $tableOptions);

*/

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180802_151429_telefonica_cambios cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180802_151429_telefonica_cambios cannot be reverted.\n";

        return false;
    }
    */
}
