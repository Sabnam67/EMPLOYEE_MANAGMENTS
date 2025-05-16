<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use CodeIgniter\Controller;

class Employee extends Controller
{
    protected $employeeModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->employeeModel = new EmployeeModel();
    }

    private function isLoggedIn()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->send();
        }
    }

    public function index()
    {
        $this->isLoggedIn();

        $data['employees'] = $this->employeeModel->findAll();
        return view('employee/index', $data);
    }

    public function create()
    {
        $this->isLoggedIn();
        return view('employee/create');
    }

    public function store()
    {
        $this->isLoggedIn();

        $file = $this->request->getFile('picture');
        $newName = null;

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/', $newName);
        }

        $this->employeeModel->save([
            'name' => $this->request->getPost('name'),
            'address' => $this->request->getPost('address'),
            'designation' => $this->request->getPost('designation'),
            'salary' => $this->request->getPost('salary'),
            'picture' => $newName,
        ]);

        return redirect()->to('/employee');
    }

    public function edit($id)
    {
        $this->isLoggedIn();

        $data['employee'] = $this->employeeModel->find($id);
        return view('employee/edit', $data);
    }

    public function update($id)
    {
        $this->isLoggedIn();

        $employee = $this->employeeModel->find($id);
        $file = $this->request->getFile('picture');
        $newName = $employee['picture'];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/', $newName);
        }

        $this->employeeModel->update($id, [
            'name' => $this->request->getPost('name'),
            'address' => $this->request->getPost('address'),
            'designation' => $this->request->getPost('designation'),
            'salary' => $this->request->getPost('salary'),
            'picture' => $newName,
        ]);

        return redirect()->to('/employee');
    }

    public function delete($id)
    {
        $this->isLoggedIn();

        $this->employeeModel->delete($id);
        return redirect()->to('/employee');
    }
}
