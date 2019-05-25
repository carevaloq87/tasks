<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dutties;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Exception;

class TasksController extends Controller
{

    /**
     * Display a listing of the tasks.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $tasksObjects = Tasks::paginate(25);

        return view('tasks.index', compact('tasksObjects'));
    }

    /**
     * Show the form for creating a new tasks.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Dutties = Dutties::pluck('name','id')->all();
        
        return view('tasks.create', compact('Dutties'));
    }

    /**
     * Store a new tasks in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Tasks::create($data);

            return redirect()->route('tasks.tasks.index')
                ->with('success_message', 'Tasks was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified tasks.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $tasks = Tasks::with('dutties')->findOrFail($id);

        return view('tasks.show', compact('tasks'));
    }

    /**
     * Show the form for editing the specified tasks.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $tasks = Tasks::findOrFail($id);
        $Dutties = Dutties::pluck('id','id')->all();

        return view('tasks.edit', compact('tasks','Dutties'));
    }

    /**
     * Update the specified tasks in the storage.
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
            
            $tasks = Tasks::findOrFail($id);
            $tasks->update($data);

            return redirect()->route('tasks.tasks.index')
                ->with('success_message', 'Tasks was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified tasks from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $tasks = Tasks::findOrFail($id);
            $tasks->delete();

            return redirect()->route('tasks.tasks.index')
                ->with('success_message', 'Tasks was successfully deleted.');
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
                'name' => 'required|string|min:1|max:512',
            'duttie_id' => 'required', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
