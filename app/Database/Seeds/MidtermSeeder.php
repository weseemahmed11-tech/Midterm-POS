<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class MidtermSeeder extends Seeder
{
    public function run()
    {
        $now=date('Y-m-d H:i:s'); $this->db->table('users')->insert(['username'=>'jdelacruz','full_name'=>'Juan Dela Cruz','password'=>password_hash('Password123',PASSWORD_DEFAULT),'created_at'=>$now]);
        $this->db->table('customers')->insertBatch([['full_name'=>'Maria Santos','email'=>'maria@example.com','phone'=>'09171234567','created_at'=>$now],['full_name'=>'Pedro Reyes','email'=>'pedro@example.com','phone'=>'09179876543','created_at'=>$now]]);
        $this->db->table('products')->insertBatch([['name'=>'Classic Burger','price'=>125.00,'stock_quantity'=>25,'created_at'=>$now],['name'=>'French Fries','price'=>75.00,'stock_quantity'=>40,'created_at'=>$now],['name'=>'Iced Tea','price'=>55.00,'stock_quantity'=>50,'created_at'=>$now],['name'=>'Chicken Sandwich','price'=>145.00,'stock_quantity'=>20,'created_at'=>$now]]);
    }
}
