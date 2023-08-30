<?php
namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Curriculum; // Replace with your actual model

class SidebarComposer
{
    public function compose(View $view)
    {
        // Retrieve the data you want to pass to the sidebar
        $curriculums = Curriculum::all(); // Replace with your data retrieval logic

        // Share the data with the view
        $view->with('curriculums', $curriculums);
    }
}
