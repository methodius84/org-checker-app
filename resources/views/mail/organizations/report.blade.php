<style>
    .report-table {
        border-collapse: collapse;
        border: 1px solid black;
        table-layout: auto;
    }
    th, td {
        border: 1px solid black;
        border-radius: 4px;
        text-align: center;
        vertical-align: middle;
    }
    th:nth-child(1), td:nth-child(1) {
        width: 15%;
    }
    th:nth-child(2), td:nth-child(2) {
        width: 15%;
    }
    th:nth-child(3), td:nth-child(3) {
        width: 25%;
    }
    th:nth-child(4), td:nth-child(4) {
        width: 15%;
    }
    th:nth-child(5), td:nth-child(5) {
        width: 30%;
    }
</style>
<div id="report">
    <h3>Еженедельный отчет об организациях:</h3>
    <br>
    <table class="report-table">
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
                <td colspan="5" style="">
                    Нет организаций с недостоверными данными
                </td>
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
