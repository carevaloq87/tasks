<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dutty;
use App\Models\Life;
use App\Models\Schedules;
use Illuminate\Http\Request;
use Exception;

class SchedulesController extends Controller
{

    /**
     * Display a listing of the schedules.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $schedulesObjects = Schedules::with('life','dutty')->paginate(25);

        return view('schedules.index', compact('schedulesObjects'));
    }

    /**
     * Show the form for creating a new schedules.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Lives = Life::pluck('id','id')->all();
$Dutties = Dutty::pluck('name','id')->all();
        
        return view('schedules.create', compact('Lives','Dutties'));
    }

    /**
     * Store a new schedules in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Schedules::create($data);

            return redirect()->route('schedules.schedules.index')
                ->with('success_message', 'Schedules was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified schedules.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $schedules = Schedules::with('life','dutty')->findOrFail($id);

        return view('schedules.show', compact('schedules'));
    }

    /**
     * Show the form for editing the specified schedules.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $schedules = Schedules::findOrFail($id);
        $Lives = Life::pluck('id','id')->all();
$Dutties = Dutty::pluck('name','id')->all();

        return view('schedules.edit', compact('schedules','Lives','Dutties'));
    }

    /**
     * Update the specified schedules in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $schedules = Schedules::findOrFail($id);
            $schedules->update($data);

            return redirect()->route('schedules.schedules.index')
                ->with('success_message', 'Schedules was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified schedules from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $schedules = Schedules::findOrFail($id);
            $schedules->delete();

            return redirect()->route('schedules.schedules.index')
                ->with('success_message', 'Schedules was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'completed' => 'boolean',
            'live_id' => 'required',
            'duttie_id' => 'required', 
        ];

        
        $data = $request->validate($rules);


        $data['completed'] = $request->has('completed');


        return $data;
    }

}
