<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    private const RULES = [
        'full_name' => 'required',
        'email' => 'required|valid_email',
    ];

    public function index(): string
    {
        $customerModel = new CustomerModel();
        $customers = $customerModel->findAll();

        return view('partials/header', ['title' => 'Customer Accounts'])
            . view('customers/index', ['customers' => $customers])
            . view('partials/footer');
    }

    public function new(): string
    {
        return $this->form('Create Customer');
    }

    public function create()
    {
        if (! $this->validate(self::RULES)) {
            return $this->form('Create Customer', [], $this->validator->getErrors());
        }

        (new CustomerModel())->insert([
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email' => trim((string) $this->request->getPost('email')),
            'phone' => trim((string) $this->request->getPost('phone')) ?: null,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/customers')->with('message', 'Customer created successfully.');
    }

    public function edit(int $id): string
    {
        $customer = (new CustomerModel())->find($id);
        if ($customer === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return $this->form('Edit Customer', $customer);
    }

    public function update(int $id)
    {
        $model = new CustomerModel();
        if ($model->find($id) === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        if (! $this->validate(self::RULES)) {
            return $this->form('Edit Customer', ['id' => $id], $this->validator->getErrors());
        }

        $model->update($id, [
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email' => trim((string) $this->request->getPost('email')),
            'phone' => trim((string) $this->request->getPost('phone')) ?: null,
        ]);

        return redirect()->to('/customers')->with('message', 'Customer updated successfully.');
    }

    public function delete(int $id)
    {
        $model = new CustomerModel();
        if ($model->find($id) === null) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        try { $model->delete($id); } catch (\Throwable $e) { return redirect()->to('/customers')->with('error', 'Customer cannot be deleted because sales reference this account.'); }
        return redirect()->to('/customers')->with('message', 'Customer deleted successfully.');
    }

    private function form(string $title, array $customer = [], array $errors = []): string
    {
        return view('partials/header', ['title' => $title])
            . view('customers/form', ['customer' => $customer, 'errors' => $errors])
            . view('partials/footer');
    }
}
