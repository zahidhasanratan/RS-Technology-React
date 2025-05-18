<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Menu; // Adjust according to your namespace
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $mainMenus = Menu::where('root_id', null)
            ->where('display', 1)
            ->orderBy('sequence', 'ASC')
            ->get();

        foreach ($mainMenus as $mainMenu) {
            // Fetch second-level submenus
            $submenus = Menu::where('root_id', $mainMenu->id)
                ->whereNull('sroot_id')
                ->orderBy('sequence', 'ASC')
                ->get();

            foreach ($submenus as $submenu) {
                // Fetch third-level submenus
                $thirdMenus = Menu::where('sroot_id', $submenu->id)
                    ->whereNull('troot_id')
                    ->orderBy('sequence', 'ASC')
                    ->get();

                foreach ($thirdMenus as $thirdMenu) {
                    // Fetch fourth-level submenus
                    $fourthMenus = Menu::where('troot_id', $thirdMenu->id)
                        ->orderBy('sequence', 'ASC')
                        ->get();

                    $thirdMenu->submenus = $fourthMenus; // Assign fourth-level submenus
                }

                $submenu->submenus = $thirdMenus; // Assign third-level submenus
            }

            $mainMenu->submenus = $submenus; // Assign second-level submenus
        }

        return response()->json($mainMenus);
    }

    public function menus1()
    {
        try {
            $mainMenus = Menu::where('footer1',1)->orderBy('sequence', 'ASC')
                ->get(); // Select only required columns

            return response()->json($mainMenus, 200); // Return JSON with HTTP status code 200
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong!'], 500);
        }
    }


}
