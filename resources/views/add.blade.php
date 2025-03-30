@extends('layouts.app')

@section('title', 'index Page')

@section('body')
    <div class="w-11/12 sm:w-6/12 rounded-lg overflow-hidden shadow-lg bg-white p-6 mx-auto mt-10">


        <!-- Card Header -->
        <div class="mb-4">
            <h2 class="text-xl font-semibold text-sky-500">Ajouter un examen</h2>
        </div>


        <!-- Card Content -->
        <form class="space-y-3 relative" action="{{ route('add.store') }}" method="POST">
            @csrf
            <button
                class="cursor-pointer absolute right-0 top-[-50px] bg-green-600 rounded font-bold text-xs p-1 shadow">Ajouter</button>

            <div class="flex justify-between">
                <span class="text-black font-medium">Code Module:</span>
                <input value="{{ old('code_module') }}" name="code_module" maxlength="4" placeholder="MXXX: e.g. M206"
                    class="inputSec w-7/12 outline-2 rounded ml-2 bg-gray-100 text-gray-800 text-start pl-2">
            </div>
            <div class="flex justify-between">
                <span class="text-black font-medium">Titre Module:</span>
                <input value="{{ old('titre_module') }}" name="titre_module"
                    class="inputSec w-7/12 outline-2 rounded ml-2 bg-gray-100 text-gray-800 text-start pl-2">
            </div>
            <div class="flex justify-between">
                <span class="text-black font-medium">Filiere:</span>
                <input value="{{ old('filiere') }}" name="filiere"
                    class="inputSec w-7/12 outline-2 rounded ml-2 bg-gray-100 text-gray-800 text-start pl-2">

            </div>
            <div class="flex justify-between">
                <span class="text-black font-medium">Type:</span>
                <select name="type" value="{{ old('type') }}"
                    class="inputSec w-7/12 outline-2 rounded ml-2 bg-gray-100 text-gray-800 text-start pl-2">
                    <option value="" @selected(true) disabled>Choisissez le type d'examen</option>
                    <option @selected(old('type') === 'théorique') value="théorique">théorique</option>
                    <option @selected(old('type') === 'pratique') value="pratique">pratique</option>
                    <option @selected(old('type') === 'synthèse') value="synthèse">synthèse</option>
                </select>
            </div>
            <div class="flex justify-between">
                <span class="text-black font-medium">Durée (minutes):</span>
                <input value="{{ old('duree') }}" name="duree"
                    class="inputSec w-7/12 outline-2 rounded ml-2 bg-gray-100 text-gray-800 text-start pl-2" type="number"
                    min="30" max="150">

            </div>
            <div class="flex justify-between">
                <span class="text-black font-medium">Date Examen:</span>
                <input value="{{ old('date_examen') }}" name="date_examen"
                    class="inputSec w-7/12 outline-2 rounded ml-2 bg-gray-100 text-gray-800 text-start pl-2" type="date"
                    min="2025-03-30">
            </div>

            @if ($errors->any())
                <ul class="mb-13 p-2 bg-red-200 rounded pl-5">
                    @foreach ($errors->all() as $error)
                        <li></li>
                        <li class="text-xs font-bold text-red-700 list-disc">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </form>

    </div>
@endsection
