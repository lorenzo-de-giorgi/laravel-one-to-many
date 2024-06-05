<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// model
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = config('db.projects');
        foreach($projects as $project){
            $newProject = new Project();
            $newProject->title = $project['title'];
            $newProject->slug = Project::generateSlug($newProject->title);
            $newProject->description = $project['description'];
            $newProject->image = $project['image'];
            $newProject->save();
        }
    }
}
