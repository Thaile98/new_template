<?php

namespace App\Http\Controllers;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class TicketController extends Controller
{
	public function index()
    {
        $tickets = Ticket::where('user_id', auth()->user()->id)->get();
        
        return view('user.index',compact('tickets'));
    }

    public function create()
	{
	   return view('user.create');
	}

	public function store(Request $request)
    {
        $this->validate($request, [
            'description'=>'required',
            'title'=> 'required'
        ]);
        $data = [
        	'description'=> $request->description,
            'title'=> $request->title,
        ];
        $ticket = new Ticket();
        $ticket->saveTicket($data);
        return redirect('/home')->with('success', 'New support ticket has been created! Wait sometime to get resolved');
    }

    public function edit($id)
    {
        $ticket = Ticket::where('user_id', auth()->user()->id)
                        ->where('id', $id)
                        ->first();

        return view('user.edit', compact('ticket', 'id'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'description'=>'required',
            'title'=> 'required'
        ]);
        $data = [
        	'description'=> $request->description,
            'title'=> $request->title,
        ];
        $data['id'] = $id;
        $ticket = new Ticket();
        $ticket->updateTicket($data);

        return redirect('/home')->with('success', 'New support ticket has been updated!!');
    }

    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();

        return redirect('/home')->with('success', 'Ticket has been deleted!!');
    }
}
