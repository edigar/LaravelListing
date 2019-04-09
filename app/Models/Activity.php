<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['title', 'module_id'];

    public function saveActivity($data)
    {
        $this->title = $data['title'];
        $this->module_id = $data['module_id'];
        $this->description = $data['description'];
        $this->status = $data['status'];
        $this->save();
        return 1;
    }

    public function updateActivity($data)
    {
        $module = $this->find($data['id']);
        $module->title = $data['title'];
        $this->module_id = $data['module_id'];
        $module->description = $data['description'];
        $module->status = $data['status'];;
        $module->save();
        return 1;
    }
}
