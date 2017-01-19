<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LightingController extends Controller
{
    /**
     * Toggle Lights with Particle API.
     *
     * @param  int  $id
     * @return Response
     */
    public function toggle( $id )
    {
      echo $id;
    }
}
