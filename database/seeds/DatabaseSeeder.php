<?php

use Illuminate\Database\Seeder;
use App\Model\Department;
use App\Model\Project;
use App\Model\ProjectCategory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Department::class, 10)->create();
        factory(ProjectCategory::class, 10)->create();
        factory(Project::class, 10)->create();
    }
}
