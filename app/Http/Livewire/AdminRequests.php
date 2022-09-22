<?php

namespace App\Http\Livewire;

use App\Models\Request;
use Livewire\Component;
use Illuminate\Support\Collection;

class AdminRequests extends Component
{
    public function render()
    {
        $requests = Request::where('status', 'Pedido Recebido')
                           ->orWhere('status', 'Em Producao')
                           ->get();

        foreach ($requests as $request) {
            //dd($request->content);
            $pieces = explode("{", $request->content);
            dd($pieces);
        }

        return view('livewire.admin-requests', compact('requests'));
    }

    public function toProduction($id)
    {
        Request::where('id', $id)->update(['status' => 'Em Producao']);
    }

    public function toDispatch($id)
    {
        Request::where('id', $id)->update(['status' => 'Pedido Enviado']);
    }

}
