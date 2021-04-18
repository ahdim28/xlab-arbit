<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfigurationUploadRequest;
use App\Services\ConfigurationService;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    private $service;

    public function __construct(
        ConfigurationService $service
    )
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $data['upload'] = $this->service->getConfigIsUpload();
        $data['application'] = $this->service->getConfig(2);
        $data['market'] = $this->service->getConfig(3);

        return view('configuration', compact('data'), [
            'title' => 'Configuration',
            'breadcrumbs' => [
                'Configuration' => '',
            ],
        ]);
    }

    public function update(Request $request)
    {
        foreach ($request->name as $key => $value) {
            $this->service->updateConfig($key, $value);
        }

        return back()->with('success', 'Update config successfully');
    }

    public function upload(ConfigurationUploadRequest $request, $name)
    {
        $this->service->uploadFile($request, $name);

        return back()->with('success', 'Upload successfully');
    }
}
