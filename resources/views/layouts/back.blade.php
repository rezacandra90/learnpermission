@extends('layouts.base')

@section('body')
    <div class="container-fluid">
        <div class="py-3">
            <div class="row">
                <div class="col-md-3">
                    <x-layout.sidebar></x-layout.sidebar>
                </div>
                <div class="col-md-9">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>    
@endsection