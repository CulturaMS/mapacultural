<?php
return [
    'plugins' => [
        'EvaluationMethodTechnical' => ['namespace' => 'EvaluationMethodTechnical'],
        'EvaluationMethodSimple' => ['namespace' => 'EvaluationMethodSimple'],
        'EvaluationMethodDocumentary' => ['namespace' => 'EvaluationMethodDocumentary'],
        
        'MultipleLocalAuth' => [ 'namespace' => 'MultipleLocalAuth' ],
        'AldirBlanc' => [
            'namespace' => 'AldirBlanc',
            'config' => [
                'project_id' => 1,
                'inciso1_enabled' => true,
                'inciso2_enabled' => true,
                'inciso1_opportunity_id' => env('AB_INCISO1_OPPORTUNITY_ID', 1),
                'inciso2_opportunity_ids' => (array) json_decode(env('AB_INCISO2_OPPORTUNITY_IDS', '[]')),
                'msg_inciso2_disabled' => 'A solicitação deste benefício será lançada em breve. Acompanhe a divulgação pelas instituições responsáveis pela gestão da cultura em seu município!',
                'logotipo_instituicao' => '/assets/aldirblanc/img/governo-cultura.png',
                'logotipo_central' => '/assets/aldirblanc/img/logo-aldir-blanc.png',
                'inciso1_enabled' => env('AB_INCISO1_ENABLE',true),
                'inciso2_enabled' => env('AB_INCISO2_ENABLE',false),
                'inciso3_enabled' => env('AB_INCISO3_ENABLE',false),
                'texto_home'=> env('AB_TEXTO_HOME','A Lei Aldir Blanc é fruto de forte mobilização social do campo artístico e cultural brasileiro, resultado de construção coletiva, a partir de webconferências nacionais e estaduais como plataformas políticas na formulação, articulação, tramitação e sanção presidencial.<br/><br/> Ela prevê o uso de 3 bilhões de reais para o auxílio de agentes da cultura atingidos pela pandemia da COVID-19. Investimentos para assegurar a preservação de toda a estrutura profissional e dinâmica de produção, criação, participação, preservação, formação e circulação dos bens e serviços culturais.<br/><br/> Clique no link abaixo para solicitar a renda emergencial como trabalhadora e trabalhador da cultura ou o subsídio para a manutenção de espaços artísticos e organizações culturais que tiveram as suas atividades interrompidas por força das medidas de isolamento social.'),
                'botao_home'=> env('AB_BOTAO_HOME','Solicite seu auxilio'),
                'titulo_home'=> env('AB_TITULO_HOME','Lei Aldir Blanc'),
                'inciso1' => (array) json_decode(env('AB_INCISO1', '[]')),
                'link_suporte' => env('AB_LINK_SUPORTE','suporte.mapacultural@fcms.ms.gov.br'),
                'privacidade_termos_condicoes' => env('AB_PRIVACIDADE_TERMOS','https://www.mapacultural.ms.gov.br/files/opportunity/1/termo_de_uso_-_mapa_cultural_de_ms.pdf'),
                'prefix_project' =>  'Lei Aldir Blanc | ' ,
                'inciso2_default' => [
                    "avatar"=>"avatar-aldirblanc.jpg",
                    "seal"=>1,
                    "shortDescription"=>"Benefício para auxiliar espaços e organizações culturais a manter suas atividades durante o isolamento social ocasionado pela pandemia covid-19 - orientada pela Lei Aldir Blanc (Lei nº 14.017)."
                ],
                'inciso2' =>[
                    (object) ["owner" =>722, "city" => "Amambai"],
                    (object) ["owner" =>724, "city" => "Aparecida do Taboado-MS"],
                    (object) ["owner" =>726, "city" => "Aral moreira"],
                    (object) ["owner" =>727, "city" => "Bandeirantes"],
                    (object) ["owner" =>728, "city" => "Bataguassu"],
                    (object) ["owner" =>730, "city" => "Bela Vista"],
                    (object) ["owner" =>731, "city" => "Bodoquena"],
                    (object) ["owner" =>732, "city" => "Bonito"],
                    (object) ["owner" =>733, "city" => "Caarapó"],
                    (object) ["owner" =>735, "city" => "Cassilândia"],
                    (object) ["owner" =>736, "city" => "Chapadão do Sul"],
                    (object) ["owner" =>737, "city" => "Corguinho"],
                    (object) ["owner" =>739, "city" => "Corumbá"],
                    (object) ["owner" =>740, "city" => "Costa Rica"],
                    (object) ["owner" =>745, "city" => "Coxim"],
                    (object) ["owner" =>747, "city" => "Eldorado"],
                    (object) ["owner" =>748, "city" => "Fatima do Sul"],
                    (object) ["owner" =>754, "city" => "Jaraguari"],
                    (object) ["owner" =>756, "city" => "Ladário"],
                    (object) ["owner" =>760, "city" => "Nova Alvorada do Sul"],
                    (object) ["owner" =>761, "city" => "Nova Andradina"],
                    (object) ["owner" =>762, "city" => "Paranaíba"],
                    (object) ["owner" =>763, "city" => "Paranhos"],
                    (object) ["owner" =>764, "city" => "Ponta Porã"],
                    (object) ["owner" =>769, "city" => "Rio Verde de Mato Grosso"],
                    (object) ["owner" =>770, "city" => "São Gabriel do Oeste"],
                    (object) ["owner" =>771, "city" => "Sidrolandia"],
                    (object) ["owner" =>773, "city" => "Sonora"],
                    (object) ["owner" =>774, "city" => "Tacuru"],
                    (object) ["owner" =>775, "city" => "Terenos"],
                    (object) ["owner" =>776, "city" => "Três Lagoas"],
                ]

            ],
        ],
        'AldirBlancRedirects' => [
            'namespace' => 'AldirBlancRedirects',
            'config' => [
                'condition' => function() {
                    $app = MapasCulturais\App::i();

                    if($app->user->is('guest')){
                        return false;
                    }

                    $plugin = $app->plugins['AldirBlanc'];

                    // só pode acessar as demais urls quem tiver controle sobre o agente da SECULT
                    $opportunities_ids = array_values($plugin->config['inciso2_opportunity_ids']);
                    $opportunities_ids[] = $plugin->config['inciso1_opportunity_id'];

                    $opportunities = $app->repo('Opportunity')->findBy(['id' => $opportunities_ids]);
                    
                    $evaluation_method_configurations = [];

                    foreach($opportunities as $opportunity) {
                        $evaluation_method_configurations[] = $opportunity->evaluationMethodConfiguration;
                        
                        if($opportunity->canUser('@control') || $opportunity->canUser('viewEvaluations') || $opportunity->canUser('evaluateRegistrations')) {
                            return true;
                        }
                    }

                    foreach ($evaluation_method_configurations as $emc) {
                        $param = [
                            'originType' => 'MapasCulturais\Entities\EvaluationMethodConfiguration',
                            'originId' => $emc->id, 
                            'destinationType' => 'MapasCulturais\Entities\Agent',
                            'destinationId' => $app->user->profile->id,
                        ];

                        if($request = $app->repo('RequestAgentRelation')->findOneBy($param)) {
                            return true;
                        }
                    }
                    return false;
                }
            ]
        ],

        'AldirBlancDataprev' => [
            'namespace' => 'AldirBlancDataprev',
        ],
    ]
];
