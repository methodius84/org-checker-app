@extends('app')
@section('title', 'Dashboard')

@section('content')
    <div class="dashboard">
        <div class="actions">
            <a href="{{route('create')}}" class="button">Create organization</a>
        </div>
        <table class="organizations-table">
            <thead>
                <tr>
                    <th>Название организации</th>
                    <th>ИНН</th>
                    <th>Юр. адрес</th>
                    <th>Недостоверность сведений</th>
                    <th>Описание причины признания недостоверности сведений</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @if($organizations->count() > 0)
                @foreach($organizations as $organization)
                    <tr>
                        <td>{{$organization->name}}</td>
                        <td>{{$organization->inn}}</td>
                        <td>{{$organization->address}}</td>
                        <td>{{$organization->unreliability ? 'Сведения недостоверны' : 'Сведения достоверны'}}</td>
                        <td>{{$organization->unreliability_description}}</td>
                        <td>
                            <div class="item-actions">
                                <a class="button" href="/{{$organization->uuid}}/check">Проверить</a>
                                <a class="button" href="/{{$organization->uuid}}/edit">Изменить</a>
                                <form action="/{{$organization->uuid}}/delete" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="button" type="submit">Удалить</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">No organizations found.</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
