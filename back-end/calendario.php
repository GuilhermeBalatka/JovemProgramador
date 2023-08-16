<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calendário</title>

    <style>
        table {
            border: solid;
            border-radius: 5px;
            margin-left: 50px;
        }

        td {
            padding: 10px;
            border: solid;
            border-radius: 5px;
        }

        .dom {
            color: red;
        }

        .dia-atual {
            font-weight: bold;
        }

        .mes {
            background-color: gray;
            display: flex;
            justify-content: center;
            font-weight: bold;
            margin-left: 50px;
            margin-right: 1110px;
        }

        .anterior {
            margin-left: 5px;
        }

        .proxima {
            margin-top: 10px;
            margin-left: 200px;
        }

        h1 {
            margin-left: 100px;

        }
    </style>
</head>
<body>
<?php
date_default_timezone_set('America/Sao_Paulo');

function linha($semana, $diaAtual, $mesAtual, $mes){
    $linha = '<tr>';

    for ($i = 0; $i <= 6; $i++) {
        if (array_key_exists($i, $semana)) {
            $class = ($i == 6) ? ' class="dom"' : '';
            if($mes == $mesAtual && $semana[$i] == $diaAtual){
                $class .= ' class="dia-atual"';
            }
            
            $linha .= "<td$class>{$semana[$i]}</td>";
        } else {
            $linha .= "<td></td>";
        }
    }
    $linha .= '<tr>';
    return $linha;
}

function calendarioMes($mes, $ano, $mesAtual, $diaAtual){
    $calendario = '';
    $dia = 1;
    $semana = [];
    $primeiroDia = date("N", mktime(0, 0, 0, $mes, 1, $ano));
    $semana = array_pad($semana, $primeiroDia - 1, '');


    while ($dia <= cal_days_in_month(CAL_GREGORIAN, $mes, $ano)) {
        array_push($semana, $dia);

        if (count($semana) == 7) {
            $calendario .= linha($semana, $diaAtual, $mesAtual, $mes);
            $semana = [];
        }

        $dia++;
    }

        if(count($semana) >= 1){
            $calendario .= linha($semana, $diaAtual, $mesAtual, $mes);        
        }
    
    return $calendario;
}

$nomesMeses = [
    'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
    'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
];

$mesAtual = date('n');
$diaAtual = date('j');

?>

<h1>Calendário 2023</h1>
<?php
for ($mes = 1; $mes <= 12; $mes++) {
    $nomeMes = $nomesMeses[$mes - 1];
    ?>
    <h2 class="mes"><?php echo $nomeMes; ?></h2>
    <table>
        <tr>
            <th>Seg</th>
            <th>Ter</th>
            <th>Qua</th>
            <th>Qui</th>
            <th>Sex</th>
            <th>Sáb</th>
            <th class="dom">Dom</th>
        </tr>

        <?php echo calendarioMes($mes, 2023, $mesAtual, $diaAtual); ?>

    </table>
<?php } ?>

<input type="submit" name="anterior" value="◀" class="anterior">
<input type="submit" name="proxima" value="▶" class="proxima">
</body>
</html>
