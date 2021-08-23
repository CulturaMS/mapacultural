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
                'inciso1_opportunity_id' => env('AB_INCISO1_OPPORTUNITY_ID', 1),
                'inciso2_opportunity_ids' => (array) json_decode(env('AB_INCISO2_OPPORTUNITY_IDS', '[]')),
                'msg_inciso2_disabled' => 'A solicitação deste benefício será lançada em breve. Acompanhe a divulgação pelas instituições responsáveis pela gestão da cultura em seu município!',
                'logotipo_instituicao' => '/assets/aldirblanc/img/governo-cultura.png',
                'logotipo_central' => '/assets/aldirblanc/img/logo-aldir-blanc.png',
                'inciso1_enabled' => env('AB_INCISO1_ENABLE',true),
                'inciso2_enabled' => env('AB_INCISO2_ENABLE',true),
                'inciso3_enabled' => env('AB_INCISO3_ENABLE',false),
                'texto_home'=> env('AB_TEXTO_HOME','A Lei Aldir Blanc é fruto de forte mobilização social do campo artístico e cultural brasileiro, resultado de construção coletiva, a partir de webconferências nacionais e estaduais como plataformas políticas na formulação, articulação, tramitação e sanção presidencial.<br/><br/> Ela prevê o uso de 3 bilhões de reais para o auxílio de agentes da cultura atingidos pela pandemia da COVID-19. Investimentos para assegurar a preservação de toda a estrutura profissional e dinâmica de produção, criação, participação, preservação, formação e circulação dos bens e serviços culturais. <br><br> <div style="text-align: center;"><h4><strong>RENDA EMERGENCIAL – INSCRIÇÕES ENCERRADAS</strong></h4></div> <br> As inscrições para acesso a renda emergencial para a trabalhadora e trabalhador da cultura que tiveram as suas atividades interrompidas por força das medidas de isolamento social foram encerradas em 31/10/2020.'),
                'botao_home'=> env('AB_BOTAO_HOME','Solicite seu auxilio'),
                'titulo_home'=> env('AB_TITULO_HOME','Lei Aldir Blanc'),
                'inciso1' => (array) json_decode(env('AB_INCISO1', '[]')),
                'link_suporte' => env('AB_LINK_SUPORTE', 'suporte.mapacultural.ms@gmail.com'),
                'privacidade_termos_condicoes' => env('AB_PRIVACIDADE_TERMOS','https://www.mapacultural.ms.gov.br/files/opportunity/1/termo_de_uso_-_mapa_cultural_de_ms.pdf'),
                'prefix_project' =>  'Lei Aldir Blanc | ' ,
                'inciso2_default' => [
                    "registrationFrom" => '2020-12-01',
                    "registrationTo" => '2020-12-01',
                    "avatar"=>"avatar-aldirblanc.jpg",
                    "seal"=>1,
                    "shortDescription"=>"Benefício para auxiliar espaços e organizações culturais a manter suas atividades durante o isolamento social ocasionado pela pandemia covid-19 - orientada pela Lei Aldir Blanc (Lei nº 14.017)."
                ],
                'zammad_src_form' => env('AB_ZAMMAD_SRC_FORM', 'https://suporte.ms.mapasculturais.com.br/assets/form/form.js'),
                'zammad_src_chat' => env('AB_ZAMMAD_SRC_CHAT', 'https://suporte.ms.mapasculturais.com.br/assets/chat/chat.min.js'),
                'zammad_enable' => env('AB_ZAMMAD_ENABLE', true),
                'zammad_background_color' => env('AB_ZAMMAD_SRC_CHAT', '#202047'),

                // 'mediados_owner' => 1,
                // 'oportunidade_mediadores' => [
                //     'med@inc1.com.br'=> [37],
                // ],
                // 'lista_mediadores' =>  (array) json_decode(env('AB_LISTA_MEDIADORES', '["med@inc1.com.br"]')),
                'mediadores_prolongar_tempo' => false,

                // define os ids para dataprev e avaliadores genericos
                'avaliadores_dataprev_user_id' => (array) json_decode(env('AB_AVALIADORES_DATAPREV_USER_ID', '["835"]')),
                'avaliadores_genericos_user_id' => (array) json_decode(env('AB_AVALIADORES_GENERICOS_USER_ID', '[]')),

                // define a exibição do resultado das avaliações para cada status (1, 2, 3, 8, 10)
                'exibir_resultado_padrao' => (array) json_decode(env('AB_EXIBIR_RESULTADO_PADRAO', '["1", "2", "3", "10"]')),
                'exibir_resultado_dataprev' => (array) json_decode(env('AB_EXIBIR_RESULTADO_DATAPREV', '["2"]')),
                'exibir_resultado_generico' => (array) json_decode(env('AB_EXIBIR_RESULTADO_GENERICO', '[]')),
                'exibir_resultado_avaliadores' => (array) json_decode(env('AB_EXIBIR_RESULTADO_AVALIADORES', '["3", "10"]')),

                // mensagens de status padrao
                'msg_status_sent' => env('AB_STATUS_SENT_MESSAGE', 'Consulte novamente em outro momento.'), // STATUS_SENT = 1
                'msg_status_invalid' => env('AB_STATUS_INVALID_MESSAGE', 'Seu cadastro cultural foi analisado e homologado pelo órgão gestor de cultura responsável, mas a solicitação do benefício foi invalidada.'), // STATUS_INVALID = 2
                'msg_status_approved' => env('AB_STATUS_APPROVED_MESSAGE', 'Seu cadastro cultural foi analisado e homologado pelo órgão gestor de cultura responsável, e a solicitação do benefício validada. Aguardando o pagamento do benefício.'), // STATUS_APPROVED = 10
                'msg_status_notapproved' => env('AB_STATUS_NOTAPPROVED_MESSAGE', 'Seu cadastro cultural foi analisado, mas não foi homologado.'), // STATUS_NOTAPPROVED = 3
                'msg_status_waitlist' => env('AB_STATUS_WAITLIST_MESSAGE', 'Os recursos disponibilizados já foram destinados. Para sua solicitação ser aprovada será necessário aguardar possível liberação de recursos. Em caso de aprovação, você também será notificado por e-mail. Consulte novamente em outro momento.'), //STATUS_WAITLIST = 8

                // mensagem para reprocessamento do Dataprev, para ignorar a mensagem retornada pelo Dataprev e exibir a mensagem abaixo
                'msg_reprocessamento_dataprev' => env('AB_MENSAGEM_REPROCESSAMENTO_DATAPREV', 'No preenchimento do Formulário de Inscrição, o requerente não atendeu ao Inciso VII do Art. 6º da Lei nº 14.017/2020, e ao Inciso VII do Art. 4º do Decreto 10.464/2020. No preenchimento do Formulário de Inscrição, o requerente não atendeu ao Inciso III do Art. 6º da Lei nº 14.017/2020, e ao Inciso III do Art. 4º do Decreto 10.464/2020.'),

                'inciso2' =>[
                    (object) ["owner" =>722, "city" => "Amambai"],
                    (object) ["owner" =>724, "city" => "Aparecida do Taboado-MS"],
                    (object) ["owner" =>726, "city" => "Aral moreira"],
                    (object) ["owner" =>727, "city" => "Bandeirantes"],
                    (object) ["owner" =>728, "city" => "Bataguassu"],
                    (object) ["owner" =>729, "city" => "Bataypora"],
                    (object) ["owner" =>730, "city" => "Bela Vista"],
                    (object) ["owner" =>731, "city" => "Bodoquena"],
                    (object) ["owner" =>732, "city" => "Bonito"],
                    (object) ["owner" =>733, "city" => "Caarapó"],
                    (object) ["owner" =>734, "city" => "Camapuã"],
                    (object) ["owner" =>735, "city" => "Cassilândia"],
                    (object) ["owner" =>736, "city" => "Chapadão do Sul"],
                    (object) ["owner" =>737, "city" => "Corguinho"],
                    (object) ["owner" =>739, "city" => "Corumbá"],
                    (object) ["owner" =>740, "city" => "Costa Rica"],
                    (object) ["owner" =>745, "city" => "Coxim"],
                    (object) ["owner" =>747, "city" => "Eldorado"],
                    (object) ["owner" =>748, "city" => "Fatima do Sul"],
                    (object) ["owner" =>753, "city" => "Japorã"],
                    (object) ["owner" =>754, "city" => "Jaraguari"],
                    (object) ["owner" =>755, "city" => "Jatei"],
                    (object) ["owner" =>756, "city" => "Ladário"],
                    (object) ["owner" =>757, "city" => "Miranda"],
                    (object) ["owner" =>760, "city" => "Nova Alvorada do Sul"],
                    (object) ["owner" =>761, "city" => "Nova Andradina"],
                    (object) ["owner" =>762, "city" => "Paranaíba"],
                    (object) ["owner" =>763, "city" => "Paranhos"],
                    (object) ["owner" =>764, "city" => "Ponta Porã"],
                    (object) ["owner" =>764, "city" => "Rio Negro"],
                    (object) ["owner" =>769, "city" => "Rio Verde de Mato Grosso"],
                    (object) ["owner" =>770, "city" => "São Gabriel do Oeste"],
                    (object) ["owner" =>771, "city" => "Sidrolandia"],
                    (object) ["owner" =>773, "city" => "Sonora"],
                    (object) ["owner" =>774, "city" => "Tacuru"],
                    (object) ["owner" =>775, "city" => "Terenos"],
                    (object) ["owner" =>776, "city" => "Três Lagoas"],
                    (object) ["owner" =>725, "city" => "Aquidauana"],
                    (object) ["owner" =>1174, "city" => "Nioaque"],
                ]

            ],
        ],
        'AldirBlancDataprev' => [
            'namespace' => 'AldirBlancDataprev',
            'config' => [
                'consolidacao_requer_validacoes' => ['financeiro']
            ],
        ],
        
        'Recursos' => ['namespace' => 'AldirBlancValidadorRecurso'],
        
        'Financeiro' => [
            'namespace' => 'AldirBlancValidadorFinanceiro',
            'config' => [
                'exportador_requer_validacao' => ['dataprev'],
                'consolidacao_requer_homologacao' => false,
                'consolidacao_requer_validacoes' => []
            ],
        ],

        'RegistrationPayments' => [ 'namespace' => 'RegistrationPayments' ],

        'PreDataprev' => [
            'namespace' => 'AldirBlancValidador',
            'config' => [
                // slug utilizado como id do controller e identificador do validador
                'slug' => 'pre_dataprev',

                // nome apresentado na interface
                'name' => 'Pré-processamento Dataprev',

                'forcar_resultado' => true,

                'consolidacao_requer_homologacao' => false,

                // invalidada a exportação pq não faz sentido
                'exportador_requer_validacao' => ['nao-exportar'],

                'consolidacao_requer_validacoes' => [],

                'inciso1' => [],
            ]
        ],

        'FCMS' => [
            'namespace' => 'AldirBlancValidador',
            'config' => [
                // slug utilizado como id do controller e identificador do validador
                'slug' => 'fcms',

                // nome apresentado na interface
                'name' => 'FCMS',

                'forcar_resultado' => true,

                'consolidacao_requer_homologacao' => false,

                // indica que só deve exportar as inscrições já homologadas
                'exportador_requer_homologacao' => true,

                // indica que a exportação não requer nenhuma validação
                'exportador_requer_validacao' => [],

                // indica que só deve consolidar o resultado se a inscrição
                // já tiver sido processada pelo Dataprev
                'consolidacao_requer_validacoes' => [],

                'inciso1' => [
                    'AVALIACAO' => function ($registration, $key) {
                        return $registration->consolidatedResult;
                    }
                ],
            ]
        ],
        'MS_CULTURA_CIDADA' => [
            'namespace' => 'StreamlinedOpportunity',
            'config' => [
                'slug' => 'msculturacidada',
                'opportunity_id' => 54,
                'logo_institution' => 'img/logo-site.png',
                'logo_footer' => 'img/logo-instituicao.png',
                'logo_center' => 'img/logo-mscc-140x60.png',
                 // true habilita o plugin false desabilita
                'enabled_plugin' => env("ENABLED_STREAM_LINED_OPPORTUNITY", true),

                'text_home_before_searsh' => [
                    // true para usar um texto acima do formulário de pesquisa da home
                    'enabled' => env("ENABLED_TEXT_HOME", true),

                    //true para usar um template part ou false para usar diretamente texto da configuração
                    'use_part' => env("USE_PART", true),

                    // Nome do template part ou texto que sera usado
                    'text_or_part' => 'text-home',

                     //Habilita um botão abaixo do texto
                    'enabled_button' => true,

                    //texto dentro do botão
                    'text_buton' => 'Solicite seu auxilio',

                    //Link que o botão deve acessar
                    'link_buton' => 'msculturacidada/cadastro',
                ],
                'img_home_before_searsh' => [
                    // true para usar uma imagem acima do texto que será inserido na home
                    'enabled' => env("ENABLED_IMG_HOME", true),

                    //true para usar um template part ou false para usar diretamente o caminho de uma imagem
                    'use_part' => env("USE_PART_IMG", false),

                    // Nome do template part ou caminho da imagem que sera usada
                    'patch_or_part' => env("PATCH_OR_PART", "img/logo_ms_Cultura_cidada.png"),

                    // Seta os styles a serem aplicados
                    'styles_class' => env("STYLES_CLASS", "streamlinedopportunity"),
                ],
                /*TERMOS E CONDIÇÕES */
                "terms" => [
                    "intro" => \MapasCulturais\i::__(""),
                    "title" => \MapasCulturais\i::__("Termos e Condições", "streamlined-opportunity"),
                    "items" => [
                        \MapasCulturais\i::__("DECLARO SER RESIDENTE NO ESTADO DE MATO GROSSO DO SUL, CONFORME INCISO I DO ART. 2º DA LEI ESTADUAL Nº 5.688/2021, E ARTIGO 9º, INCISO II DO DECRETO ESTADUAL Nº 15.728/2021.", "streamlined-opportunity"),
                        \MapasCulturais\i::__("DECLARO TER PARTICIPADO DA CADEIA PRODUTIVA DOS SEGMENTOS ARTÍSTICOS E CULTURAIS DO ESTADO DE MATO GROSSO DO SUL NOS 24 (VINTE E QUATRO) MESES IMEDIATAMENTE ANTERIORES À 19 DE MARÇO DE 2020, DATA DA EDIÇÃO DO DECRETO ESTDUAL Nº 15.396, CONFORME INCISO II DO ART. 2º DA LEI ESTADUAL Nº 5.688/2021, E ARTIGO 9º, INCISO III DO DECRETO ESTADUAL Nº 15.728/2021.", "streamlined-opportunity"),
                        \MapasCulturais\i::__("DECLARO QUE ESTOU CIENTE DE QUE, SERÁ CONCEDIDO APENAS 1 (UM) APOIO FINANCEIRO EMERGENCIAL POR FAMÍLIA, CONFORME ART. 1º, § 3º DA LEI Nº 5.688/2021 E ART. 9º, INCISO IV DO DECRETO Nº 15.728/2021.", "streamlined-opportunity"),
                        \MapasCulturais\i::__("DECLARO QUE ESTOU CIENTE DE QUE, A PARTICIPAÇÃO NO PROGRAMA “MS CULTURA CIDADÃ” É CONDICIONADA À RENÚNCIA AO DIREITO DE FUTURA AÇÃO RELATIVA A EVENTUAIS INDENIZAÇÕES DECORRENTES DE MEDIDAS RESTRITIVAS IMPOSTAS EM RAZÃO DA EMERGÊNCIA EM SAÚDE PÚBLICA CAUSADA PELA PANDEMIA DO NOVO CORONAVÍRUS (COVID-19), BEM COMO À DESISTÊNCIA DE AÇÕES COM O MESMO TEOR JÁ PROPOSTAS EM FACE DO ESTADO, COM A CORRESPONDENTE RENÚNCIA AO DIREITO VEICULADO NA DEMANDA, CONFORME PARAGRAFO ÚNICO DO ART. 2º DA LEI ESTADUAL Nº 5.688/2021, E ARTIGO 9º, INCISO V DO DECRETO ESTADUAL Nº 15.728/2021.", "streamlined-opportunity"),
                        \MapasCulturais\i::__("DECLARO QUE ESTOU CIENTE DE QUE, CASO A CONCESSÃO DO BENEFÍCIO DO PROGRAMA “MS CULTURA CIDADÃ” SEJA IMPEDITIVO AO ACESSO AOS BENEFÍCIOS SOCIAIS CONCEDIDOS PELA UNIÃO, DEVEREI OPTAR, EXPRESSAMENTE, PELA ADESÃO AO PROGRAMA “MS CULTURA CIDADÃ”, ASSUMINDO POR MINHA CONTA E RISCO, EVENTUAL EXCLUSÃO DA PARTICIPAÇÃO EM PROGRAMAS FEDERAIS OU RESTRIÇÃO DE ACESSO, CASO JÁ BENEFICIADO, CONFORME ART. 9º, §2º DO DECRETO ESTADUAL Nº 15.728/2021.", "streamlined-opportunity"),
                        \MapasCulturais\i::__("DECLARO QUE NÃO POSSUO EMPREGO FORMAL ATIVO NA INICIATIVA PRIVADA, COM CONTRATO DE TRABALHO FORMALIZADO NOS TERMOS DA CONSOLIDAÇÃO DAS LEIS DO TRABALHO, CONFORME O INCISO I DO ART. 3º DA LEI ESTADUAL Nº 5.688/2021, E O § 3º DO ART. 10 DO DECRETO ESTADUAL Nº 15.728/2021.", "streamlined-opportunity"),
                        \MapasCulturais\i::__("DECLARO QUE NÃO SOU DETENTOR DE CARGO, EMPREGO OU FUNÇÃO PÚBLICOS, CONFORME INCISO II DO ART. 3º DA LEI ESTADUAL Nº 5.688/2021.", "streamlined-opportunity"),
                        \MapasCulturais\i::__("DECLARO QUE NÃO SOU TITULAR DE BENEFÍCIO PREVIDENCIÁRIO, CONFORME INCISO III DO ART. 3º  DA LEI ESTADUAL Nº 5.688/2021.", "streamlined-opportunity"),
                        \MapasCulturais\i::__("DECLARO QUE NÃO ESTOU RECEBENDO BENEFÍCIO DO SEGURO DESEMPREGO, CONFORME INCISO IV DO ART. 3º  DA LEI ESTADUAL Nº 5.688/2021.", "streamlined-opportunity"),
                        \MapasCulturais\i::__("DECLARO QUE ESTOU CIENTE DE QUE, EM CASO DE UTILIZAÇÃO DE QUALQUER MEIO ILÍCITO, IMORAL OU DECLARAÇÃO FALSA PARA A PARTICIPAÇÃO DESTE CREDENCIAMENTO, INCORRO NA PENALIDADE PREVISTA NO ARTIGO 299 DO DECRETO LEI Nº 2.848, DE 07 DE DEZEMBRO DE 1940 (CÓDIGO PENAL), ALÉM DE ENSEJAR A ADOÇÃO DAS MEDIDAS CABÍVEIS, NAS ESFERAS ADMINISTRATIVA E JUDICIAL.", "streamlined-opportunity"),
                        \MapasCulturais\i::__("DECLARO QUE ESTOU CIENTE DA CONCESSÃO DAS INFORMAÇÕES POR MIM DECLARADAS NESTE FORMULÁRIO PARA PESQUISA E VALIDAÇÃO EM OUTRAS BASES DE DADOS OFICIAIS.", "streamlined-opportunity")
                    ],
                    "help" => \MapasCulturais\i::__("Você precisa aceitar todos os termos para continuar com a inscrição no auxílio emergencial da cultura.", "streamlined-opportunity")
                ],
                /*TELA DE INSCRIÇÃO */
                'registration_screen' => [
                    'title' => "Para se inscrever clique no botão abaixo",
                    'description' =>"Programa MS Cultura Cidadã",
                    'long_description' => "Para ser beneficiário do Programa “MS Cultura Cidadã”, o trabalhador da cultura deverá preencher, cumulativamente, os requisitos de elegibilidade a serem documentalmente comprovados no ato da inscrição, conforme previsto no Art. 2º da Lei Estadual nº 5.688, de 7 de julho de 2021 e Art. 9º do Decreto Estadual nº 15.728, de 14 de julho de 2021, e, conjuntamente, não poderá apresentar quaisquer das condições impeditivas previstas no Art. 3º da Lei Estadual.", "streamlined-opportunity",
                ],
                /*TELA DO FORMULÁRIO */
                'form_screen' => [
                    'title' => "Programa MS Cultura Cidadã formulário de inscrição"
                ],
                'msg_disabled' => "Inscrição já efetuada",

                /*EMAIL DE CONFIRMAÇÃO DE INSCRIÇÃO */
                "email_confirm_registration" => [
                    'project_name' => "no programa MS Cultura cidadã",
                    'status_title' => "Inscrição realizada com sucesso!",
                    'url_image_body' => 'img/logo_ms_Cultura_cidada.png',
                    'subject' => "Confirmação de cadastro MS Cultura cidadã"
                ]
            ]
        ],
    ]
];