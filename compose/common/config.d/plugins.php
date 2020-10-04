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
                'inciso2_default' => (array) json_decode('{"avatar":"aldirblanc-para.png","seal":2,"shortDescription":"Benef\u00edcio para auxiliar espa\u00e7os e organiza\u00e7\u00f5es culturais a manter suas atividades durante o isolamento social ocasionado pela pandemia covid-19 - orientada pela Lei Aldir Blanc (Lei n\u00ba 14.017)."}'),
                'inciso2' => (array) json_decode('[{"owner": 4156, "city": "Conceição do Araguaia"},{"owner": 4159, "city": "Igarapé-Miri"},{"owner": 4203, "city": "Abel Figueired"},{"owner": 3977, "city": "Acará"},{"owner": 2157, "city": "Augusto Correa"},{"owner": 4153, "city": "Bragança"},{"owner": 2137, "city": "Breu Branco"},{"owner": 4155, "city": "Capitação Poço"},{"owner": 2125, "city": "Castanhal"},{"owner": 3981, "city": "Ananindeua"},{"owner": 4139, "city": "Bagre"},{"owner": 4145, "city": "Baião"},{"owner": 4134, "city": "Barcarena"},{"owner": 4130, "city": "Capanema"},{"owner": 2126, "city": "Colares"},{"owner": 4158, "city": "Curuçá"},{"owner": 4171, "city": "Medicilândia"},{"owner": 4172, "city": "Melgaço"},{"owner": 4181, "city": "Nova Ipixuna"},{"owner": 2182, "city": "Ourém"},{"owner": 4183, "city": "Pacajá"},{"owner": 4185, "city": "Paragominas"},{"owner": 4191, "city": "Placas"},{"owner": 4198, "city": "Sapucaia"},{"owner": 2174, "city": "Viseu"},{"owner": 2177, "city": "Garrafão do Norte"},{"owner": 2130, "city": "Igarapé-Açu"},{"owner": 2199, "city": "Jacareacanga"},{"owner": 4160, "city": "Juriti"},{"owner": 4161, "city": "Limoeiro do Ajuru"},{"owner": 4167, "city": "Mãe do Rio"},{"owner": 4170, "city": "Magalhães Barata"},{"owner": 2122, "city": "Mojuí dos Campos"},{"owner": 4173, "city": "Monte Alegre"},{"owner": 2141, "city": "Muaná"},{"owner": 4179, "city": "Nova Esperança do Piriá"},{"owner": 4184, "city": "Palestina do Pará"},{"owner": 4186, "city": "Pau D\'Arco"},{"owner": 4187, "city": "Peixe-Boi"},{"owner": 4189, "city": "Piçarra"},{"owner": 2143, "city": "Ponta de Pedras"},{"owner": 2208, "city": "Porto de Moz"},{"owner": 4192, "city": "Rio Maria"},{"owner": 4193, "city": "Santarém"},{"owner": 4194, "city": "São Domingos do Araguaia Pará"},{"owner": 4195, "city": "São Domingos do Capim"},{"owner": 2117, "city": "São Felix do Xingu"},{"owner": 4196, "city": "São Francisco do Pará"},{"owner": 2132, "city": "São Miguel do Guamá"},{"owner": 2150, "city": "São Sebastião da Boa Vista"},{"owner": 4199, "city": "Terra Alta"},{"owner": 2197, "city": "Tomé-Açu"},{"owner": 2159, "city": "Tracuateua"},{"owner": 4201, "city": "Trairão"},{"owner": 4202, "city": "Ulianópolis"}]'),
                'inciso1_opportunity_id' => 2,
                'inciso2_opportunity_ids' => (array) json_decode(env('AB_INCISO2_OPPORTUNITIES', '{"Sp": 3}')),
                'msg_inciso2_disabled' => 'Em breve!',
                'link_suporte' => 'https://tawk.to/chat/5f47c17bcc6a6a5947af53ba/default',
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
                'link_suporte' => env('AB_LINK_SUPORTE','   '),
                'privacidade_termos_condicoes' => env('AB_PRIVACIDADE_TERMOS',null),

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

                    if($app->user->is('admin')){
                        return true;
                    }

                    $plugin = $app->plugins['AldirBlanc'];

                    // só pode acessar as demais urls quem tiver controle sobre o agente da SECULT
                    $opportunities_ids = array_values($plugin->config['inciso2_opportunity_ids']);
                    $opportunities_ids[] = $plugin->config['inciso1_opportunity_id'];

                    $opportunities = $app->repo('Opportunity')->findBy(['id' => $opportunities_ids]);
                    
                    foreach($opportunities as $opportunity) { 
                        if($opportunity->canUser('@control') || $opportunity->canUser('viewEvaluations') || $opportunity->canUser('evaluateRegistrations')) {
                            return true;
                        }
                    }
                    return false;
                }
            ]
        ],
    ]
];
