@extends('layouts.app')

@section('titulo')
    Inicia sesión en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen Registro">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ session('mensaje') }}
                    </p>
                @endif
                
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppdercase text-gray-500 font-bold">Email</label>
                    <input id="email" type="email" name="email" placeholder="Correo electrónico" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppdercase text-gray-500 font-bold">Password</label>
                    <input id="password" type="password" name="password" placeholder="Contraseña" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input id="remember" type="checkbox" name="remember"> <label class="text-gray-500 text-sm" for="remember">Mantener mi sesión abierta</label>
                </div>

                <input type="submit" value="Iniciar Sesión" class="bg-sky-600 hover:bb-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg text-center">
            </form>
        </div>
    </div>
@endsection