<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req, $elements = 5, $type = '')
    {


        $search = $req->input('search');

        if ($req->input('ord') === 'true') {
            $ord = "DESC";
        } else {
            $ord = "ASC";
        }

        // Start with a Query Builder
        $query = Examen::query();

        // Apply search filter if provided
        if ($search) {
            $query->where('titre_module', 'LIKE', "%$search%");
        }

        // Apply type filter if valid
        if ($type && in_array($type, ['théorique', 'pratique', 'synthèse'])) {
            $query->where('type', $type);
        }

        // Paginate results
        $examens = $query->orderBy('date_examen', $ord)->paginate($elements);
        return view('index', compact('examens', 'elements', 'type', 'search'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'code_module' => ['required', 'max:4', 'regex:/^M[0-9]{3}$/'],
            'titre_module' => ['required'],
            'filiere' => ['required'],
            'type' => ['required', 'in:théorique,pratique,synthèse'],
            'duree' => ['required', 'integer', 'between:30,150'],
            'date_examen' => ['required', 'date', 'after:today']

        ]);

        $exam = Examen::create($fields);

        return redirect()->route('home')->with('exam_id', $exam->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $examen = DB::table('examens')->find($id);

        return view('show', compact('examen'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $fields = $request->validate([
            'code_module' => ['required', 'max:4', 'regex:/^M[0-9]{3}$/'],
            'titre_module' => ['required'],
            'filiere' => ['required'],
            'type' => ['required', 'in:théorique,pratique,synthèse'],
            'duree' => ['required', 'integer', 'between:30,150'],
            'date_examen' => ['required', 'date', 'after:today']

        ]);
        DB::table('examens')->where('id', "=", $id)->update($fields);
        return redirect()->route('show', ["id" => $id])->with('modifier', true);
    }


    public function del(Request $req)
    {
        $id = $req->input('id');

        return redirect()->route('show', ["id" => $id])->with("confirm", true);
    }

    public function destroy(Request $req, $id)
    {
        if ($req->confirmed) {
            DB::table('examens')->delete($id);
            return redirect()->route('home')->with('deleted', true);
        }
        return redirect()->route('show', ["id" => $id])->with("confirm", false);
    }
}
