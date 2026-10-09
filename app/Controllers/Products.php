<?php
namespace App\Controllers;
use App\Models\ProductModel;
class Products extends BaseController
{
    private const RULES = ['name' => 'required|max_length[150]', 'price' => 'required|decimal|greater_than_equal_to[0]', 'stock_quantity' => 'required|integer|greater_than_equal_to[0]', 'image' => 'permit_empty|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]|max_size[image,2048]'];
    public function index(): string { return view('partials/header', ['title'=>'Products']).view('products/index', ['products'=>(new ProductModel())->orderBy('archived_at','ASC')->orderBy('name')->findAll()]).view('partials/footer'); }
    public function new(): string { return $this->form('Create Product'); }
    public function create() { if (!$this->validate(self::RULES)) return $this->form('Create Product', [], $this->validator->getErrors()); $m=new ProductModel(); $m->insert($this->data()); return redirect()->to('/products')->with('message','Product created successfully.'); }
    public function edit(int $id): string { $p=(new ProductModel())->find($id); if (!$p) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(); return $this->form('Edit Product',$p); }
    public function update(int $id) { $m=new ProductModel(); $p=$m->find($id); if (!$p) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(); if (!$this->validate(self::RULES)) return $this->form('Edit Product',array_merge($p,['id'=>$id]),$this->validator->getErrors()); $m->update($id,$this->data($p)); return redirect()->to('/products')->with('message','Product updated successfully.'); }
    public function archive(int $id) { $m=new ProductModel(); if (!$m->find($id)) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(); $m->update($id,['archived_at'=>date('Y-m-d H:i:s')]); return redirect()->to('/products')->with('message','Product archived.'); }
    private function data(array $existing=[]): array { $data=['name'=>trim((string)$this->request->getPost('name')),'price'=>(float)$this->request->getPost('price'),'stock_quantity'=>(int)$this->request->getPost('stock_quantity')]; $image=$this->request->getFile('image'); if ($image && $image->isValid() && $image->getError()!==UPLOAD_ERR_NO_FILE) { $name=$image->getRandomName(); $image->move(FCPATH.'uploads',$name); $data['image']=$name; } return $data; }
    private function form(string $title,array $product=[],array $errors=[]): string { return view('partials/header',['title'=>$title]).view('products/form',['product'=>$product,'errors'=>$errors]).view('partials/footer'); }
}
