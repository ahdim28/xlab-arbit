<?php

namespace App\Services;

use App\Models\Configuration;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ConfigurationService
{
    private $model;

    public function __construct(
        Configuration $model
    )
    {
        $this->model = $model;
    }

    public function getConfig($group)
    {
        $query = $this->model->query();

        $query->where('group', $group)->where('is_upload', 0);

        $result = $query->get();

        return $result;
    }

    public function getConfigIsUpload()
    {
        $query = $this->model->query();

        $query->upload();

        $result = $query->get();

        return $result;
    }

    public function getValue($name)
    {
        return $this->model->value($name);
    }

    public function updateConfig($name, $value)
    {
        $config = $this->model->where('name', $name)->first();
        $config->value = $value;
        $config->save();

        return $config;
    }

    public function uploadFile($request, $name)
    {
        if ($request->hasFile($name)) {

            $file = $request->file($name);
            $replace = str_replace(' ', '-', $file->getClientOriginalName());
            $fileName = Str::random(5).'-'.$replace;

            Storage::delete(config('custom.files.config.path').$request->input('old_'.$name));
            Storage::put(config('custom.files.config.path').$fileName, file_get_contents($file));

            $config = $this->model->where('name', $name)->first();
            $config->value = $fileName;
            $config->save();

            return $config;

        } else {

            return false;
            
        }
    }
}