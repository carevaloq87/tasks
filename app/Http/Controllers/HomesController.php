<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Homes;
use Illuminate\Http\Request;
use Exception;

class HomesController extends Controller
{

    /**
     * Display a listing of the homes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $homesObjects = Homes::paginate(25);

        return view('homes.index', compact('homesObjects'));
    }

    /**
     * Show the form for creating a new homes.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('homes.create');
    }

    /**
     * Store a new homes in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Homes::create($data);

            return redirect()->route('homes.homes.index')
                ->with('success_message', 'Homes was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified homes.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $homes = Homes::findOrFail($id);

        return view('homes.show', compact('homes'));
    }

    /**
     * Show the form for editing the specified homes.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $homes = Homes::findOrFail($id);
        

        return view('homes.edit', compact('homes'));
    }

    /**
     * Update the specified homes in the storage.
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
            
            $homes = Homes::findOrFail($id);
            $homes->update($data);

            return redirect()->route('homes.homes.index')
                ->with('success_message', 'Homes was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified homes from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $homes = Homes::findOrFail($id);
            $homes->delete();

            return redirect()->route('homes.homes.index')
                ->with('success_message', 'Homes was successfully deleted.');
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
                'name' => 'required|string|min:1|max:255',
            'address' => 'required|string|min:1|max:512', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
