<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configuration = [
            0 => [
                'group' => 1,
                'name' => 'logo',
                'label' => 'Logo',
                'value' => null,
                'is_upload' => true,
            ],
            1 => [
                'group' => 1,
                'name' => 'logo_small',
                'label' => 'Logo Small',
                'value' => null,
                'is_upload' => true,
            ],
            2 => [
                'group' => 3,
                'name' => 'notification',
                'label' => 'Notification',
                'value' => null,
                'is_upload' => true,
            ],
            3 => [
                'group' => 2,
                'name' => 'app_name',
                'label' => 'App Name',
                'value' => 'X-LAb ARBIT',
                'is_upload' => false,
            ],
            4 => [
                'group' => 2,
                'name' => 'app_name_short',
                'label' => 'App Name Short',
                'value' => 'X-LAB',
                'is_upload' => false,
            ],
            5 => [
                'group' => 2,
                'name' => 'app_description',
                'label' => 'App Description',
                'value' => null,
                'is_upload' => false,
            ],
            6 => [
                'group' => 3,
                'name' => 'interval',
                'label' => 'Interval',
                'value' => 1000,
                'is_upload' => false,
            ],
            7 => [
                'group' => 3,
                'name' => 'fee',
                'label' => 'Fee Market',
                'value' => 35,
                'is_upload' => false,
            ],
        ];

        foreach ($configuration as $val) {
            Configuration::create([
                'group' => $val['group'],
                'name' => $val['name'],
                'label' => $val['label'],
                'value' => $val['value'],
                'is_upload' => $val['is_upload'],
            ]);
        }
    }
}
