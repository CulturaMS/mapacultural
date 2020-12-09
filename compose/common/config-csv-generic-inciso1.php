<?php
/**
 * Implementa o exportador genérico no inciso 1
 * 
 * Para a configuração do exportador genérico no inciso 1, deve ser usado o field_id do do campo para capturar os dados da base de dados.
 * 
 * Exemplos
 * 
 * 'fields' => [
 *        'CPF' => 'field_1098',
 * ];
 * 
 * Alguns casos podemos passar mais de um campo, fazemos isso passando dentro de um Array
* 'fields' => [
 *        'CNPJ' => ['field_1094', 'field_1120'],
 * ];
 * 
 * BOSERVAÇÕES
 * 1) Observe que no inciso 3, teremos um array para cada oportunidade. Todos os arrays irão conter os mesmos dados, diferenciando apenas os fields ids
 * 2) Observe tambem que a chave principal do array, contem o número da oportunidade.  
 */
return [
    'header' =>[ 
        'TIPO_IDENTIFICACAO',
        'TIPO_CREDOR',
        'EMAIL',
        'NATUREZA_JURIDICA',   
        'CPF',
        'NOME_SOCIAL', 
        'CNPJ',
        'RAZAO_SOCIAL',             
        'LOGRADOURO',
        'NUMERO',
        'COMPLEMENTO',
        'BAIRRO',
        'MUNICIPIO',
        'CEP',
        'ESTADO',
        'TELEFONE',
        'NUM_BANCO',
        'AGENCIA_BANCO',
        'CONTA_BANCO',
        'SITUACAO', 
        'VALOR',
        'INSCRICAO_ID',
        'INCISO',
    ],
    '1' => [ // <= CHAVE PRINCIPAL, inserir aqui o número da oportunidade
        'TIPO_PROPONENTE' => null,
        'TIPO_IDENTIFICACAO' => ['field_36'],
        'TIPO_CREDOR',
        'EMAIL', 
        'NATUREZA_JURIDICA',             
        'CPF' => 'field_36',
        'NOME_SOCIAL' => ['field_37','field_42'],    
        'CNPJ' => null,
        'RAZAO_SOCIAL' => null,                
        'LOGRADOURO' => 'field_51',
        'NUMERO' => 'field_51',
        'COMPLEMENTO' => 'field_51',
        'BAIRRO' => 'field_51',
        'MUNICIPIO' => 'field_51',
        'CEP' => 'field_51',
        'ESTADO' => 'field_51',
        'TELEFONE' => 'field_47',
        'NUM_BANCO' => 'field_63' ,
        'TIPO_CONTA_BANCO' => 'field_44',        
        'AGENCIA_BANCO' => 'field_61',
        'CONTA_BANCO'  => 'field_62',
        'SITUACAO', 
        'OPERACAO_BANCO'  => null,
        'VALOR' => '',        
        'INCISO' => '1',
        'fromToAdress' => false, // <= Caso precise fazer alguma correção de endereço, inserir os dados no CSV que esta no plugin AldirBlanc dentro da pasta CSV, caso contrario deixar como false
        'fromToAccounts' => '/CSV/fromToAccounts.csv' // <= Caso precise fazer alguma correção de dados bancários, inserir os dados bancários no CSV que esta no plugin AldirBlanc dentro da pasta CSV
    ],
    'parameters_default' => [       
        'searchType' => 'field_id', // <= Valor default = field_id, Caso queira fazer a busca pelo nome do campo, colocar false nesse campo. Porem, caso feito isso nos arrays acima, deve ser informado o nome do campo ao invés do field id
        'proponentTypes' => [ // <= Informe aqui, os tipos de requerentes que existem no seu formulário. pessoa física, pessoa jurídica, Coletivo etc...
            'fisica' => 'Pessoa Física',
            'juridica' => 'Pessoa Jurídica',
            'coletivo' => 'Coletivo',
            'juridica-mei' => 'Pessoa Jurídica - MEI'
        ]
    ],
    
        

];