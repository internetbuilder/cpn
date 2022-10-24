<?php

namespace App\Http\Resources;

use App\Models\Transitions;
use App\Models\TransitionsGrants;
use Illuminate\Http\Resources\Json\JsonResource;

class TurnoversResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "transition_id"=>$this->transitions_id,
            "service"=>Transitions::where("id",$this->transitions_id)->pluck("name")->first(),
            "min"=>$this->min,
            "max"=>$this->max,
            "budget"=>TransitionsGrants::where("turnovers_id",$this->id)->where("transitions_id",$this->transitions_id)->pluck("budget")->first(),
            "budget_min"=>TransitionsGrants::where("transitions_id",$this->transitions_id)->min("budget"),
            "budget_max"=>TransitionsGrants::where("transitions_id",$this->transitions_id)->max("budget"),
        ];
    }
}
