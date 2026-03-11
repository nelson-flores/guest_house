<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FICHA DE INSCRIÇÃO - FENA</title>
    <link rel="icon" href="{{ filetobase64(public_path('landing/media/logo-300.png')) }}" />
    <style>
        @page {
            /* Ordem: topo, direita, baixo, esquerda */
            margin: 6cm 2cm 2cm 2cm;
        }

        body {
            /* Remova as margens do body para não somar com as da página */
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Configuração do Rodapé */
        footer {
            position: fixed;
            bottom: -2cm;
            /* Ajusta a posição dentro da margem inferior */
            left: 0;
            right: 0;
            height: 2cm;
            text-align: center;
            font-size: 9pt;
            border-top: 1px solid #000;
            padding-top: 5px;
        }

        /* Configuração do cabeçalho (opcional, se quiser fixo também) */
        header {
            position: fixed;
            top: -4cm;
            left: 0;
            right: 0;
            height: 2cm;
            text-align: center;
        }
    </style>
</head>

<body>
    <footer style="font-weight: bold">
        Direcção Provincial da Indústria e Comércio de Nampula, AV. 25 de Setembro n° 651 <br>
        Telefone: 26213913 | Email: info@fena.gov.mz <br>
        <span style="color: #4e4e4e;text-transform: uppercase;margin-top:4px">Gerado por Computador</span>
    </footer>

    <header>




        <table cellspacing="0" border="0" width="100%">
            <tr>
                <td style="width: 50%">
                    <center>
                        <img src="{{ filetobase64(public_path('landing/media/emblema-300.png')) }}"
                            style="width:1.13cm;margin:0 auto;margin-bottom:3px">
                    </center>
                    <div align="left">
                        REPÚBLICA DE MOÇAMBIQUE<br />
                        PROVÍNCIA DE NAMPULA<br />
                        <h5 style="margin:0;padding:0">DIRECÇÃO PROVINCIAL DA INDÚSTRIA E COMÉRCIO</h5>
                    </div>
                </td>
                <td style="text-align:right;width: 50%">
                    <img style="width:5.27cm;float: right;"
                        src="{{ filetobase64(public_path('landing/media/logo-300.png')) }}" alt="">
                </td>
            </tr>
        </table>




    </header>








    <table cellspacing="0" border="0" width="100%">
        <tr>
            <td colspan="3">
                <center>
                    <h2 style="text-decoration:underline">FICHA DE INSCRIÇÃO - FENA 2026</h2>
                </center>
            </td>=
        </tr>
        <tr>
            <td style="width: 33.33%">
            </td>
            <td style="width: 33.33%">
            </td>
            <td style="width: 33.33%">
                Local: Campo de Mavuco, <br>
                Cidade de Nampula, <br>
                Dias 24/06 a 05/07/2026
            </td>
        </tr>
    </table>





    <style>
        .tabela-formulario {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .tabela-formulario td.label-cell {
            white-space: nowrap;
            /* Impede que o texto quebre linha */
            width: 1%;
            /* Força a célula a ter apenas o tamanho do texto */
            padding-right: 5px;
            font-weight: normal;
        }

        .tabela-formulario td.linha-cell {
            border-bottom: 1px solid #000;
        }

        .tabela-formulario td.filled {
            border-bottom: none !important;
            font-weight: bold;
        }
    </style>

    <h3>1. Dados de Expositor</h3>
    <table class="tabela-formulario">
        <tr>
            <td class="label-cell">Nome da Entidade/Empresa:</td>
            <td class="linha-cell {{ empty($registration->company_name)?"":"filled" }}">{{ $registration->company_name }}</td>
        </tr>

        <tr>
            <td class="label-cell">Nome do Responsável:</td>
            <td class="linha-cell {{ empty($registration->full_name)?"":"filled" }}">{{ $registration->full_name }}</td>
        </tr>

        <tr>
            <td class="label-cell">Ramo de Actividade:</td>
            <td class="linha-cell {{ empty($registration->company_activity)?"":"filled" }}">{{ $registration->company_activity }}</td>
        </tr>

        <tr>
            <td class="label-cell">Endereço:</td>
            <td class="linha-cell {{ empty($registration->address)?"":"filled" }}">{{ $registration->address }}</td>
        </tr>

        <tr>
            <td class="label-cell">Telefone/WhatsApp:</td>
            <td class="linha-cell {{ empty($registration->phone)?"":"filled" }}">{{ $registration->phone }}</td>
        </tr>

        <tr>
            <td class="label-cell">Email:</td>
            <td class="linha-cell {{ empty($registration->email)?"":"filled" }}">{{ $registration->email }}</td>
        </tr>
    </table>


    <h3 style="font-weight: normal"><b>2. Tipo de empresa:</b></h3>

    <table width="100%">
        <tr>
            <td><input type="checkbox" name="" {{ $registration->company_sizetype=="micro"?"checked":"" }} id=""> Micro</td>
        </tr>
        <tr>
            <td><input type="checkbox" name="" {{ $registration->company_sizetype=="small"?"checked":"" }} id=""> Pequeno</td>
        </tr>
        <tr>
            <td><input type="checkbox" name="" {{ $registration->company_sizetype=="medium"?"checked":"" }} id=""> Médio</td>
        </tr>
        <tr>
            <td><input type="checkbox" name="" {{ $registration->company_sizetype=="large"?"checked":"" }} id=""> Grande</td>
        </tr>
    </table>


    <h3 style="font-weight: normal"><b>3. Taxa de inscrição: </b></h3>

    <table width="100%">
        @foreach ($plans as $item)
            
        <tr>
            <td><input type="checkbox" name="" {{ $registration->event_payment_plan_id==$item->id?"checked":"" }} id="">
                {{ $item->name }} - {{ money($item->price) }} {{$item->currency}}</td>
        </tr>
        
        @endforeach

    </table>

    <br /> 
    <br /> 
    <h3>4. Necessidades Especiais (se houver):</h3>
    <br>
    @if (!empty($registration->special_needs))
        <p style="font-style: italic;">{{ $registration->special_needs }}</p>
    @else
        <p style="font-style: italic;">Nenhuma necessidade especial declarada.</p>
    @endif
    <br>


    <h3>5. Observações Adicionais:</h3>
        @if (!empty($registration->additional_observations))
            <p style="font-style: italic;">{{ $registration->additional_observations }}</p>
        @else
            <p style="font-style: italic;">Nenhuma observação adicional declarada.</p>
        @endif
    <br>
    <br>
    <br>










    <span style="margin-top: 5px;padding: 8px;display: inline-block;background-color: #ebac37;">

        Declaro que as informações prestadas acima são verdadeiras e comprometo-me a cumprir com as normas da
        organização do evento.
    </span>
    <br /> 
    <br /> 
    <br /> 
    <br /> 
    <br /> 
    <span style="margin-top: 5px;font-style: italic;">Nampula, {{ date('d/m/Y') }}</span>

    <br /> 
    <br /> 
    <!--span style="margin-top: 5px"></span>
    Assinatura do Responsável: _____________________________
    </span-->








</body>

</html>