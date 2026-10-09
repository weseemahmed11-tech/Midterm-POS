<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index(): string
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();

        return view('partials/header', ['title' => 'User Accounts'])
            . view('users/index', ['users' => $users])
            . view('partials/footer');
    }

    public function new(): string
    {
        return $this->form('Create User');
    }

    public function create()
    {
        $model = new UserModel();
        if (! $this->validateUser($model)) {
            return $this->form('Create User', [], $this->validator->getErrors());
        }

        $model->insert([
            'username' => trim((string) $this->request->getPost('username')),
            'password' => password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT),
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'avatar' => $this->saveAvatar(),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/users')->with('message', 'User created successfully.');
    }

    public function edit(int $id): string
    {
        $user = (new UserModel())->find($id);
        if ($user === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return $this->form('Edit User', $user);
    }

    public function update(int $id)
    {
        $model = new UserModel();
        $user = $model->find($id);
        if ($user === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        if (! $this->validateUser($model, $id)) {
            return $this->form('Edit User', array_merge($user, ['id' => $id]), $this->validator->getErrors());
        }

        $data = [
            'username' => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
        ];
        $password = (string) $this->request->getPost('password');
        if ($password !== '') {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        $avatar = $this->saveAvatar();
        if ($avatar !== null) {
            $data['avatar'] = $avatar;
        }
        $model->update($id, $data);

        return redirect()->to('/users')->with('message', 'User updated successfully.');
    }

    public function delete(int $id)
    {
        $model = new UserModel();
        if ($model->find($id) === null) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        if ((int) session()->get('user.id') === $id) return redirect()->to('/users')->with('error', 'You cannot delete the account currently in use.');
        $model->delete($id);
        return redirect()->to('/users')->with('message', 'User deleted successfully.');
    }

    private function validateUser(UserModel $model, ?int $id = null): bool
    {
        $rules = [
            'username' => 'required',
            'full_name' => 'required',
            'avatar' => 'permit_empty|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]',
            'password' => $id === null ? 'required|min_length[8]' : 'permit_empty|min_length[8]',
        ];
        if (! $this->validate($rules)) {
            return false;
        }

        $existing = $model->where('username', trim((string) $this->request->getPost('username')))->first();
        if ($existing !== null && (int) $existing['id'] !== $id) {
            $this->validator->setError('username', 'The username must be unique.');
            return false;
        }

        return true;
    }

    private function saveAvatar(): ?string
    {
        $file = $this->request->getFile('avatar');
        if ($file === null || ! $file->isValid() || $file->getError() === UPLOAD_ERR_NO_FILE) {
            return null;
        }

        $filename = $file->getRandomName();
        $file->move(FCPATH . 'uploads', $filename);
        return $filename;
    }

    private function form(string $title, array $user = [], array $errors = []): string
    {
        return view('partials/header', ['title' => $title])
            . view('users/form', ['user' => $user, 'errors' => $errors])
            . view('partials/footer');
    }
}
