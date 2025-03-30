@extends('layouts.app')

@section('title', 'index Page')



@section('body')

    <div class="p-5 w-full min-h-[86vh] text-white mb-10">
        @if (session('exam_id'))
            <p class="bg-green-300 py-1 rounded text-green-900 font-bold px-3">Un nouvel examen a été ajouté avec succès <i
                    class="fa-solid fa-thumbs-up"></i></p>
        @endif

        @if (session('deleted'))
            <p class="bg-green-300 py-1 rounded text-green-900 font-bold px-3">L'examen a été <span class="font-bold text-red-600">supprimé</span>  avec succès <i
                    class="fa-solid fa-thumbs-up"></i></p>
        @endif

        <section class="flex justify-between items-center mb-2">
            <h2 class="text-4xl font-bold">Liste des examens</h2>
            <a href="{{ route('add') }}" title="ajouter examen"
                class="flex justify-center outline-2 outline-white items-center text-2xl font-bold text-white bg-sky-800 pb-1 hover:scale-105 duration-50 rounded-4xl w-7 h-7">+</a>
        </section>

        {{-- Search Bar --}}
        <form action="/{{ $elements }}/{{ $type }}" method="GET"
            class="flex justify-center items-center text-lg py-2">
            <input value="{{ request()->input('search') }}" name="search" placeholder="Titre du module"
                class="pl-5 bg-sky-50 rounded-l-2xl outline-0 text-black" />
            <button
                class="bg-blue-500 px-3 rounded-r-2xl text-sm py-1 hover:bg-blue-800 duration-300 cursor-pointer">Recherch</button>
        </form>

        {{-- Drop Downs --}}

        <main class="flex flex-wrap gap-5 justify-between px-2">
            <div
                class="cursor-pointer relative w-fit bg-sky-100 text-black
                p-1 rounded-xl mb-1 text-sm drop-shadow-xl">
                <p class="indent-3">{{ $elements }} résultats par page <i class="fas fa-arrow-down"></i></p>

                <section
                    class="h-6 opacity-0 group hover:block duration-300 hover:h-fit hover:opacity-100 absolute rounded-2xl top-0 indent-3 left-0 right-0 bg-sky-100">
                    <p class="indent-3 pt-1 pl-1">{{ $elements }} résultats par page <i class="fas fa-arrow-down"></i>
                    </p>
                    <a class="child hidden group-hover:block hover:bg-sky-200 hover:text-blue-600 border-black border-y-2 py-1"
                        href="/5/{{ $type }}?search={{ $search }}">5 résultats par page </a>
                    <a class="child hidden group-hover:block hover:bg-sky-200 hover:text-blue-600 border-black border-b-2 py-1"
                        href="/10/{{ $type }}?search={{ $search }}">10 résultats par page </a>
                    <a class="child hidden group-hover:block hover:bg-sky-200 hover:text-blue-600 border-black border-b-2 py-1"
                        href="/15/{{ $type }}?search={{ $search }}">15 résultats par page </a>
                    <a class="child hidden group-hover:block hover:bg-sky-200 hover:text-blue-600 border-black border-b-2 py-1"
                        href="/20/{{ $type }}?search={{ $search }}">20 résultats par page </a>
                    <a class="child hidden group-hover:block hover:bg-sky-200 hover:text-blue-600 border-black py-1 rounded-b-2xl"
                        href="/50/{{ $type }}?search={{ $search }}">50 résultats par page </a>
                </section>

            </div>



            <div
                class="cursor-pointer relative w-fit bg-sky-100 text-black
                p-1 rounded-xl mb-1 text-sm drop-shadow-xl">
                <p class="indent-3">Examen {{ $type }} <i class="fas fa-arrow-down"></i></p>

                <section
                    class="h-6 opacity-0 group hover:block duration-300 hover:h-fit hover:opacity-100 absolute rounded-2xl top-0 indent-3 left-0 right-0 bg-sky-100">
                    <p class="indent-3 pt-1 pl-1">Examen {{ $type }}<i class="fas fa-arrow-down"></i>
                    </p>
                    <a class="child hidden group-hover:block hover:bg-sky-200 hover:text-blue-600 border-black border-y-2 py-1"
                        href="/{{ $elements }}?search={{ $search }}">Toute</a>
                    <a class="child hidden group-hover:block hover:bg-sky-200 hover:text-blue-600 border-black border-b-2 py-1"
                        href="/{{ $elements }}/théorique?search={{ $search }}">Théorique</a>
                    <a class="child hidden group-hover:block hover:bg-sky-200 hover:text-blue-600 border-black border-b-2 py-1"
                        href="/{{ $elements }}/pratique?search={{ $search }}">Pratique</a>
                    <a class="child hidden group-hover:block hover:bg-sky-200 hover:text-blue-600 border-black py-1 rounded-b-2xl"
                        href="/{{ $elements }}/synthèse?search={{ $search }}">Synthèse</a>
                </section>

            </div>
        </main>

        <table class="min-w-full bg-white rounded-lg">
            <thead class="bg-cyan-800 text-white">
                <tr class="text-center">
                    <th class="py-2 px-4 text-center rounded-tl">ID</th>
                    <th class="py-2 px-4 text-center">Model</th>
                    <th class="py-2 px-4 text-center">Type</th>
                    <th class="py-2 px-4 text-center rounded-tr">
                        @php

                        @endphp
                        @if (request()->input('ord') === 'true')
                            <a href="/{{ $elements }}/{{ $type }}?ord=false&search={{ $search }}"
                                class="hover:text-amber-400 cursor-pointer flex items-center justify-center gap-2">
                                <span>Date</span>
                                <i class="fa-solid fa-sort-down text-sm"></i>
                            </a>
                        @else
                            <a href="/{{ $elements }}/{{ $type }}?ord=true&search={{ $search }}"
                                class="hover:text-amber-400 cursor-pointer flex items-center justify-center gap-2 pr-6">
                                <span>Date</span>
                                <i class="fa-solid fa-sort-up text-sm pt-2.5"></i>
                            </a>
                        @endif

                    </th>
                </tr>
            </thead>
            @if ($examens && count($examens) > 0)
                <tbody>
                    @foreach ($examens as $examen)
                        @php
                            $rbl = '';
                            $rbr = '';
                            $style = '';
                            if ($loop->iteration % 2 === 0) {
                                $style .= 'bg-gray-200 ';
                            } else {
                                $style .= 'bg-white ';
                            }
                            if ($loop->last) {
                                $rbl = 'rounded-bl-lg';
                                $rbr = 'rounded-br-lg';
                                $style .= 'rounded-br-2xl ';
                            }

                        @endphp
                        <tr class="text-black {{ $style }}">
                            <td class="{{ $rbl }} py-2 px-4 text-center underline text-blue-600">
                                <a href="/examen/{{ $examen->id }}"
                                    class="hover:bg-amber-300 py-1 px-2 duration-200 rounded-lg">{{ $examen->id }}</a>
                            </td>
                            <td class="py-2 px-4 text-start ">{{ $examen->titre_module }}</td>
                            <td class="py-2 px-4 text-center ">{{ $examen->type }}</td>
                            <td class="py-2 px-4 text-center {{ $rbr }}">{{ $examen->date_examen }}</td>
                        </tr>
                    @endforeach


                </tbody>
            @else
                <div>
                    <p class="text-red-600 absolute bottom-30 left-[35%] text-4xl">Aucan Examen Trouvé</p>
                </div>
            @endif
        </table>
        <div class="mt-5">
            {{ $examens->links('') }}
        </div>



    </div>


@endsection
