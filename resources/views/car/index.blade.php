<!DOCTYPE html>
<html lang="en">
<style>
    #table {
        border-collapse: collapse;
        width: 100%;
    }
    #table td,
    #table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        color: black;
    }

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>

<body>
    @if (isset($id))
        {{ "$id X $id" }}<br>
        @for ($i = 1; $i <= $id; $i++)
            @for ($j = 1; $j <= $id; $j++)
                {{ "$i x $j = $i*$j" }}
            @endfor
            <br>
        @endfor
    @elseif(isset($error))
        <h3>{{ $error }}</h3>
    @elseif(isset($arr))
        <h2>多維陣列</h2>
        <table id="table">
            <tr>
                <th>id</th>
                <th>name</th>
            </tr>
            @foreach ($arr as $key=>$val)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $val }}</td>
                </tr>
            @endforeach
        </table>
    @endif
</body>

</html>
