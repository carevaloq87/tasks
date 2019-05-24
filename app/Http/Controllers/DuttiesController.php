<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dutties;
use Illuminate\Http\Request;
use Exception;

class DuttiesController extends Controller
{

    /**
     * Display a listing of the dutties.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $duttiesObjects = Dutties::paginate(25);

        return view('dutties.index', compact('duttiesObjects'));
    }

    /**
     * Show the form for creating a new dutties.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('dutties.create');
    }

    /**
     * Store a new dutties in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Dutties::create($data);

            return redirect()->route('dutties.dutties.index')
                ->with('success_message', 'Dutties was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified dutties.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $dutties = Dutties::findOrFail($id);

        return view('dutties.show', compact('dutties'));
    }

    /**
     * Show the form for editing the specified dutties.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $dutties = Dutties::findOrFail($id);
        

        return view('dutties.edit', compact('dutties'));
    }

    /**
     * Update the specified dutties in the storage.
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
            
            $dutties = Dutties::findOrFail($id);
            $dutties->update($data);

            return redirect()->route('dutties.dutties.index')
                ->with('success_message', 'Dutties was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified dutties from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $dutties = Dutties::findOrFail($id);
            $dutties->delete();

            return redirect()->route('dutties.dutties.index')
                ->with('success_message', 'Dutties was successfully deleted.');
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
            'description' => 'required', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
