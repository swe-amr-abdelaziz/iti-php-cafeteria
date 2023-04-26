<?php

class UserController
{
    public function index()
    {
        var_dump(User::getAll());
    }

    public function store()
    {
        $count = Database::insert('users', [
            'name' => 'Amr Basiony',
            'email' => 'amrbasiony97@gmail.com',
            'password' => 'password123',
            'room_no' => '101',
            'ext' => 123,
            'image' => 'image1.jpg'
        ]);

        if ($count) {
            echo 'User created successfully';
        }
        else {
            echo 'Error creating user';
        }
    }

    public function delete($id = '')
    {
        $count = Database::delete('users', $id);

        if ($count) {
            echo 'User deleted successfully';
        }
        else {
            echo 'User not found';
        }
    }

    public function update($id)
    {
        $count = Database::update('users', $id, [
            'name' => 'Mohamed Ali',
            'email' => 'amrbasiony97@gmail.com',
            'password' => 'password',
            'room_no' => '123',
            'ext' => 456,
            'image' => 'image20.jpg'
        ]);

        if ($count) {
            echo 'User updated successfully';
        }
        else {
            echo 'User not updated';
        }
    }
}