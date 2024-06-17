@extends('app')
@section('title', 'Create Organization')
@section('content')
    <div class="button-container">
        <a href="{{route('dashboard')}}" class="button">&#8592; Back</a>
    </div>
    <form class="create-form" method="POST" action="{{route('store')}}">
        @csrf
        <div>
            <label for="name">Название:</label>
            <input type="text" id="name" name="name" value="{{ old('name') ?? '' }}">
            @error('name')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div>
            <label for="inn">ИНН: </label>
            <input type="text" id="inn" name="inn" value="{{ old('inn') ?? '' }}">
            @error('inn')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div>
            <label for="address">Адрес: </label>
            <input type="text" id="address" name="address" value="{{ old('address') ?? '' }}">
            @error('address')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div class="button-container">
            <button type="submit" class="button">Создать</button>
        </div>
    </form>
@endsection
