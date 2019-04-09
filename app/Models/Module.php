<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['title', 'description'];

    public function saveModule($data)
    {
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->status = $data['status'];
        $this->save();
        return 1;
    }

    public function updateModule($data)
    {
        $module = $this->find($data['id']);
        $module->title = $data['title'];
        $module->description = $data['description'];
        $module->status = $data['status'];;
        $module->save();
        return 1;
    }
}
