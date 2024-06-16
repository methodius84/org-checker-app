@extends('app')
@section('title', 'Edit Organization')
@section('content')
    <div>
        <a href="/" class="button">Back</a>
    </div>
    <form method="POST" action="{{route('update')}}">
        @method('PATCH')
        @csrf
        <input type="hidden" name="uuid" value="{{ $organization->uuid }}">
        <div>
            <label for="name">Название:</label>
            <input type="text" id="name" name="name" value="{{ $organization->name ?? '' }}">
            @error('name')
            <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div>
            <label for="inn">ИНН: </label>
            <input type="text" id="inn" name="inn" value="{{ $organization->inn ?? '' }}">
            @error('inn')
            <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div>
            <label for="address">Адрес: </label>
            <input type="text" id="address" name="address" value="{{ $organization->address ?? '' }}">
            @error('address')
            <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="button">Изменить</button>
    </form>
@endsection
