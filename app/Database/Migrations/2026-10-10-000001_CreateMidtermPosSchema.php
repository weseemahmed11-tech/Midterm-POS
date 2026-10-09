<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateMidtermPosSchema extends Migration
{
    public function up()
    {
        $this->forge->addField(['id'=>['type'=>'INT','unsigned'=>true,'auto_increment'=>true],'name'=>['type'=>'VARCHAR','constraint'=>150],'price'=>['type'=>'DECIMAL','constraint'=>'10,2'],'stock_quantity'=>['type'=>'INT','unsigned'=>true],'image'=>['type'=>'VARCHAR','constraint'=>255,'null'=>true],'archived_at'=>['type'=>'DATETIME','null'=>true],'created_at'=>['type'=>'DATETIME']]); $this->forge->addKey('id',true); $this->forge->createTable('products',true);
        $this->forge->addField(['id'=>['type'=>'INT','unsigned'=>true,'auto_increment'=>true],'full_name'=>['type'=>'VARCHAR','constraint'=>150],'email'=>['type'=>'VARCHAR','constraint'=>150],'phone'=>['type'=>'VARCHAR','constraint'=>50,'null'=>true],'created_at'=>['type'=>'DATETIME']]); $this->forge->addKey('id',true); $this->forge->createTable('customers',true);
        $this->forge->addField(['id'=>['type'=>'INT','unsigned'=>true,'auto_increment'=>true],'username'=>['type'=>'VARCHAR','constraint'=>80],'full_name'=>['type'=>'VARCHAR','constraint'=>150],'password'=>['type'=>'VARCHAR','constraint'=>255],'avatar'=>['type'=>'VARCHAR','constraint'=>255,'null'=>true],'created_at'=>['type'=>'DATETIME']]); $this->forge->addKey('id',true); $this->forge->addUniqueKey('username'); $this->forge->createTable('users',true);
        $this->forge->addField(['id'=>['type'=>'INT','unsigned'=>true,'auto_increment'=>true],'product_id'=>['type'=>'INT','unsigned'=>true],'customer_id'=>['type'=>'INT','unsigned'=>true,'null'=>true],'sold_by'=>['type'=>'INT','unsigned'=>true],'quantity'=>['type'=>'INT','unsigned'=>true],'total_price'=>['type'=>'DECIMAL','constraint'=>'10,2'],'created_at'=>['type'=>'DATETIME']]); $this->forge->addKey('id',true); $this->forge->addForeignKey('product_id','products','id','RESTRICT','CASCADE'); $this->forge->addForeignKey('customer_id','customers','id','SET NULL','CASCADE'); $this->forge->addForeignKey('sold_by','users','id','RESTRICT','CASCADE'); $this->forge->createTable('sales',true);
    }
    public function down() { $this->forge->dropTable('sales',true); $this->forge->dropTable('users',true); $this->forge->dropTable('customers',true); $this->forge->dropTable('products',true); }
}
