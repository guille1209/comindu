<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <head>
        <style>
            .page-break {
                page-break-after: always;
            }

           
            .table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 20px;
                
            }
            .table > thead > tr > th ,
            .table > tbody > tr > th ,
            .table > tfoot > tr > th ,
            .table > thead > tr > td ,
            .table > tbody > tr > td , 
            .table > tfoot > tr > td {
                padding: 8px;
                line-height: 1.42857143;
                vertical-align: top;                
                border-top: 1px solid #dddddd;
               
                
                
            }
            .table > thead > tr > th {
                vertical-align: bottom;
               
            }
            .table > caption + thead > tr:first-child > th,
            .table > colgroup + thead > tr:first-child > th,
            .table > thead:first-child > tr:first-child > th,
            .table > caption + thead > tr:first-child > td,
            .table > colgroup + thead > tr:first-child > td,
            .table > thead:first-child > tr:first-child > td {
                border-top: 0;
            }
            .table > tbody + tbody {
                border-top: 2px solid #dddddd;
            }
            .table .table {
                background-color: #ffffff;
            }
        </style>

        <title>Menu Semanal</title>
    </head>
    <body>
        <h2 align="center">MENU SEMANAL</h2>   
        <h5 align="center">Desde {{$data->inicio}} hasta {{$data->fin}}</h5>
    <div>
        <table class="table" >
            <thead>
            <tr align="center">
                <th>{{ "LUNES" }}</th>
                <th>{{ "MARTES" }}</th>
                <th>{{ "MIERCOLES" }}</th>
                <th>{{ "JUEVES" }}</th>
                <th>{{ "VIERNES" }}</th>
                <th>{{ "SABADO" }}</th>
                <th>{{ "DOMINGO" }}</th>               
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="7" align="center"><b>PLATOS FRIOS</b></td>
            </tr>
            <tr class="gradeX">
            @for ($i=1; $i <=7; $i++)                
                    <td>
                     @foreach ($data['platoFrio'.$i] as $row)
                        <li>{{ $row }}</li>
                     @endforeach 
                    </td>
            @endfor    
            </tr>
            <tr>
                <td colspan="7" align="center"><b>DESAYUNOS</b></td>
            </tr>
            <tr class="gradeX">
            @for ($i=1; $i <=7; $i++)                
                    <td>

                     @foreach ($data['desayuno'.$i] as $row)
                       <li>{{ $row }}</li>
                     @endforeach 
                    </td>
            @endfor    
            </tr>
            <tr>
                <td colspan="7" align="center"><b>ALMUERZOS</b></td>
            </tr>
            <tr class="gradeX">
            @for ($i=1; $i <=7; $i++)                
                    <td>
                     @foreach ($data['almuerzo'.$i] as $row)
                        <li>{{$row}}</li>
                     @endforeach 
                    </td>
            @endfor    
            </tr>
            <tr>
                <td colspan="7" align="center"><b>CENAS</b></td>
            </tr>
            <tr class="gradeX">
            @for ($i=1; $i <=7; $i++)                
                    <td>
                     @foreach ($data['cena'.$i] as $row)
                       <li> {{ $row }}</li>
                     @endforeach 
                    </td>
            @endfor    
            </tr>                          
            </tbody>
        </table>
    </div>
    </body>
</html>