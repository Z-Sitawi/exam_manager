@extends('layouts.app')

@section('title', 'show Page')


@section('body')
    @if ($examen)
        <div class="p-5 w-full min-h-[86vh] text-white">
            @if (session('confirm'))
                <div class="p-2 bg-red-300 rounded mb-2">
                    <p class="p-2 text-xl text-center">Êtes-vous sûr de vouloir supprimer cet examen ?</p>

                    <div class="flex justify-between">
                        <form method="POST" action="{{ route('delete.confirmed', $examen->id) }}">
                            @csrf
                            <button
                                class="dduration-100 cursor-pointer hover:scale-103 bg-gray-500 rounded text-sm px-1">No</button>
                        </form>

                        <form method="POST" action="{{ route('delete.confirmed', $examen->id) }}">
                            <input type="hidden" name="confirmed" value="yes" />
                            @csrf
                            <button
                                class="duration-100 cursor-pointer hover:scale-103 bg-red-500 rounded text-sm px-2">Oui</button>
                        </form>
                    </div>
                </div>
            @endif
            <div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white p-6 mx-auto">


                <!-- Card Header -->
                <div class="mb-4">
                    <h2 class="text-xl font-semibold text-sky-500">Détails de l'examen</h2>
                </div>
                @if ($errors->any())
                    <h6 class="text-red-600 text-center font-bold">Erreur lors de la modification de l'examen</h6>
                    <ul class="mb-13 p-2 bg-red-200 rounded pl-5">
                        @foreach ($errors->all() as $error)
                            <li></li>
                            <li class="text-xs font-bold text-red-700 list-disc">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                @if (session('modifier'))
                    <ul class="mb-13 p-2 bg-green-200 rounded pl-5">
                        <h6 class="text-black">Examen modifié avec succès</h6>
                    </ul>
                @endif

                <!-- Card Content -->
                <form class="space-y-3 relative" action="{{ route('update', $examen->id) }}" method="POST">
                    @csrf
                    <button
                        class="cursor-pointer absolute right-0 top-[-50px] bg-green-600 rounded font-bold text-xs p-1 shadow hidden"
                        id="save">Sauvegarder</button>
                    <div class="flex justify-between">
                        <span class="text-black font-medium">Code Module:</span>
                        <input name="code_module" maxlength="4" disabled
                            class="inputSec text-sky-600 text-end focus:outline-0" value="{{ $examen->code_module }}" />
                    </div>
                    <div class="flex justify-between">
                        <span class="text-black font-medium">Titre Module:</span>
                        <input name="titre_module" disabled class="inputSec text-sky-600 text-end focus:outline-0"
                            value="{{ $examen->titre_module }}" />
                    </div>
                    <div class="flex justify-between">
                        <span class="text-black font-medium">Filiere:</span>
                        <input name="filiere" disabled class="inputSec text-sky-600 text-end focus:outline-0"
                            value="{{ $examen->filiere }}" />

                    </div>
                    <div class="flex justify-between">
                        <span class="text-black font-medium">Type:</span>
                        <select name="type" class="hidden inputSec text-sky-600 text-end focus:outline-0">
                            <option value="théorique" @selected($examen->type === 'théorique')>théorique</option>
                            <option value="pratique" @selected($examen->type === 'pratique')>pratique</option>
                            <option value="synthèse" @selected($examen->type === 'synthèse')>synthèse</option>
                        </select>

                        <input name="type_inp" disabled class="inputSec text-sky-600 text-end focus:outline-0"
                            value="{{ $examen->type }}" />
                    </div>
                    <div class="flex justify-between">
                        <span class="text-black font-medium">Durée (minutes):</span>
                        <input name="duree" disabled class="inputSec text-sky-600 text-end focus:outline-0"
                            value="{{ $examen->duree }} min" />

                    </div>
                    <div class="flex justify-between">
                        <span class="text-black font-medium">Date Examen:</span>
                        <input name="date_examen" disabled class="inputSec text-sky-600 text-end focus:outline-0"
                            value="{{ $examen->date_examen }}" />

                    </div>
                </form>
                <div id="btnContainer" class="p-3 flex flex-wrap justify-between items-center">

                    <button id="modifie"
                        class="drop-shadow-md hover:drop-shadow-none duration-100 cursor-pointer hover:scale-103 bg-amber-300 rounded-2xl px-2 py-1">Modifie</button>


                    <form method="POST" action="{{ route('delete') }}">
                        <input type="hidden" value="{{ $examen->id }}" name="id" />
                        @csrf
                        <button
                            class="drop-shadow-md hover:drop-shadow-none duration-100 cursor-pointer hover:scale-103 bg-red-500 rounded-2xl px-2 py-1">Supprimer</button>
                    </form>
                </div>

            </div>
        </div>
    @else
        <p class="mt text-red-600 pt-40 text-4xl">Examen n'existe plus</p>
    @endif
@endsection
