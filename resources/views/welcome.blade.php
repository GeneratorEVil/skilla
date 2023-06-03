<html>
<head>

    <meta content="{{ config('app.api_token') }}" name="api-token" />
    @vite(['resources/js/app.js'])

    <style>
        table,
        td,
        th {
            border-collapse: collapse;
            border: 1px solid;
            border-style:
        }

    </style>
</head>


<body>
    <h3>Фильтры</h3>
    <form name="filters">
        Дата создания
        <input type="datetime-local" name="startDate" id="startDate">
        <input type="datetime-local" name="endDate" id="endDate">
        <select name="className" id="className">
            <option value="">Выберите класс</option>
        </select>
    </form>

    <h2>Расписание</h2>
    <table id="table-result" cellspacing="5px" cellpadding="5px">
        <thead>
            <tr>
                <th>Класс</th>
                <th>День недели</th>
                <th>Начало</th>
                <th>Окончание</th>
                <th>Дата создания</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

</body>
</html>
