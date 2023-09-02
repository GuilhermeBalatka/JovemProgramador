
<?php 
    //funcao traduz prioridade
    function traduz_prioridade($codigo){
        $prioridade = '';

        switch($codigo){
            case 1:
                $prioridade = 'Baixa';
                break;
            case 2:
                $prioridade = 'Média';
                break;
            case 3:
                $prioridade = 'Alta';
                break;
        }
        return $prioridade;
    }

    
    function traduz_concluida($status){
        $concluida = '';
    
        if($status == 0){
            $concluida = 'Não Concluída';
        } elseif($status == 1){
            $concluida = 'Concluída';
        }
    
        return $concluida;
    }
    
    


    //funcao para tratamendo da data
    function traduz_data_para_banco($data){
        if($data == ""){
            return "";
        }

        $dados = explode("/", $data);
        $data_banco = "{$dados[2]}-{$dados[1]}-{$dados[0]}";
        return $data_banco;
    }


    function traduz_data_para_tela($data){
        if($data == "" OR $data == "0000-00-00"){
            return "";
        }

        //Pode ser formatada desta maneira
        /*$dados = explode("-", $data);
        $data_tela = "{$dados[2]}/{$dados[1]}/{$dados[0]}";
        return $data_tela;
        */

        //ou desta maneira
        $objeto_data = DateTime::createFromFormat('Y-m-d', $data);
        return $objeto_data->format('d/m/Y');
    }

 

 
?>