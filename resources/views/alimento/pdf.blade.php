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
        <title>Alimentos</title>
    </head>
    <body>
        <h2 align="center">ALIMENTOS</h2>   
        
    <div>
        <table class="table" >
            <thead>

            </thead>
            <tbody>
               @foreach ($data as $row) 
                <tr> 
                    <td>
                          <h3> {{ $row->name }} </h3>
                    @foreach ($row->alimento as $f) 
                            <li> {{ $f->name }}
                     @endforeach
                   </td>
                </tr>
             @endforeach
             
            </tbody>
        </table>
    </div>
    </body>
</html>