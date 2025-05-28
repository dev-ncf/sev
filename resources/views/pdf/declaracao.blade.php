<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Declaração de Frequência de Notas</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Times New Roman', Times, serif, Arial;
            font-size: 12pt;
            margin: 40px;
            color: #000;
        }

        .center {
            text-align: center;
        }

        table.despacho {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        table.despacho td {
            border: 1px solid #000;
            vertical-align: top;
            padding: 1rem;
            height: 100px;
            width: 50%;
        }

        p {
            text-align: justify;
            line-height: 1.6;
        }


        .assinatura {
            margin-top: 3rem;
            text-align: center;
            width: 100%;
            margin-left: 30%;
            /* limpa os floats */
        }

        .assinatura div {
            float: left;
            width: 45%;
            margin: 0 2.5%;
            text-align: center;
        }

        .double-underline {
            position: relative;
            display: inline-block;
        }

        .double-underline::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            height: 2px;
            background: currentColor;
            bottom: 0;
            box-shadow: 0 4px currentColor;
            /* Cria a segunda linha abaixo da primeira */
        }
    </style>
</head>

<body>
    <div id="formulario">
        <div class="center">
            <img src="{{ public_path('images/logo/logour.png') }}" alt="" style="width: 80px; height: 80px;">
            <h3 style="margin:4px">UNIVERSIDADE ROVUMA</h3>
            <span style="font-size: 11pt;text-decoration: underline" class="double-underline"><span
                    style="color: white">.........</span>Avenida Josina Machel nº 256,
                Caixa Postal, Tel:
                26215738
                Nampula-Moçambique<span style="color: white">.........</span></span>
            <p><strong>Pedido de {{ $tipo->nome }}</strong></p>
            @if ($tipo->id == '1')
                <p>Exmo Senhor {{ $tipo->responsavel }} da {{ $estudante->departamento->nome }} da
                    Universidade Rovuma</p>
            @else
                <p>{{ $tipo->responsavel }}</p>
            @endif
        </div>

        <div class="section">
            <strong>DESPACHO</strong>
            <table class="despacho">
                <tr>
                    <td>
                        <strong>Autorizo</strong><br><br>
                        ____________________________________<br>
                        ____________________________________<br>
                        ____________________________________<br>
                        ____________________________________<br>
                        ____________________________________<br>
                        ____________________________________<br>
                        ____________________________________<br>
                        ____________________________________<br>
                        ____________________________________<br><br>
                        Data: ____/____/____<br>
                        Ass.: __________________
                    </td>
                    <td>
                        <strong>Não autorizo</strong><br><br>
                        ____________________________________<br>
                        ____________________________________<br>
                        ____________________________________<br>
                        ____________________________________<br>
                        ____________________________________<br>
                        ____________________________________<br>
                        ____________________________________<br>
                        ____________________________________<br>
                        ____________________________________<br>
                        ____________________________________<br>
                        Data: ____/____/____<br>
                        Ass.: __________________
                    </td>
                </tr>
            </table>
        </div>

        <div class="section">
            <p>
                Nome completo <strong>{{ $estudante->nome . ' ' . $estudante->apelido }}</strong>,
                de <strong>{{ $estudante->idade }}</strong> anos de idade, de nacionalidade
                <strong>{{ $estudante->nacionalidade }}</strong>,
                portador de BI nº <strong>{{ $estudante->identificao->numero_documento }}</strong>,
                emitido em <strong>{{ $estudante->identificao->local_emissao }}</strong>,aos
                <strong>{{ $estudante->identificao->data_emissao }}</strong>,
                estudante da Universidade Rovuma, inscrito sob nº <strong>{{ $estudante->matricula }}</strong>,
                no curso de <strong>{{ $estudante->curso->nome }}</strong>, no regime:

                <span class="checkboxes">[ ] Laboral</span>
                <span class="checkboxes">[ ] Pós-laboral</span>
                <span class="checkboxes">[ ] EAD</span>,

                no nível/ano <span class="input-text" style="width: 50px;"></span>,
                venho mui respeitosamente requerer a V. Excia se digne autorizar a emissão de uma declaração de
                frequência/notas
                (especifique o tipo de declaração) por motivo de:
                _______________________________________________________________________________<br>
                _______________________________________________________________________________<br>
                _____________________________________________________________________, pelo que,
            </p>
        </div>

        <div class="center">
            <span style="margin:0">Pede deferimento</span><br>
            <span style="font-size: 12pt">(Assinatura)_____________________________________</span> <br>
            <span style="font-size: 12pt">(Local, data)__________________,____/_____/______</span>

        </div>
        <div class="section">
            <table class="despacho">
                <tr>
                    <td>
                        <strong style="text-decoration: underline"><span
                                style="color: white">...............................................</span>Parecer
                            da Faculdade/Chefe <span
                                style="color: white">................................................</span></strong><br>
                        ________________________________________________________________________<br>
                        ________________________________________________________________________<br>
                        ________________________________________________________________________<br>
                        ________________________________________________________________________<br>
                        ________________________________________________________________________<br>
                        Data: ____/____/____<br>
                        Ass.: __________________
                    </td>

                </tr>
            </table><br><br>
            <p>Contacto do requerente:________________________________</p><br>
            <p>OBS: O requerente deve funtamentar o seu pedido e se necessário anexar os documentos comprovativos
                pertinetes que possam contribuir para a tomada de decisão.</p>
        </div>
    </div>
</body>

</html>
