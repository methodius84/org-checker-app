<div id="report">
    <h3>Еженедельный отчет об организациях:</h3>
    <br>
    <table>
        <thead>
            <tr>
                <th>ИНН</th>
                <th>Сокращенное наименование</th>
                <th>Юридический адрес</th>
                <th>Признак недостоверности сведений</th>
                <th>Описание причины признания сведений недостоверными</th>
            </tr>
        </thead>
        <tbody>
            @if($organizations->count() === 0)
            <tr>
                <td colspan="5">Нет организаций с недостоверными данными</td>
            </tr>
            @else
            @foreach($organizations as $organization)
            <tr>
                <td>{{$organization->inn}}</td>
                <td>{{$organization->name}}</td>
                <td>{{$organization->address}}</td>
                <td>{{!$organization->unreliability ? 'Данные верны' : 'Данные недостоверны'}}</td>
                <td>{{$organization->unreliability_description ?? ''}}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
