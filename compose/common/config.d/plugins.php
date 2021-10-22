<?php
$config_plugin = [
    'plugins' => [
        'EvaluationMethodTechnical' => ['namespace' => 'EvaluationMethodTechnical'],
        'EvaluationMethodSimple' => ['namespace' => 'EvaluationMethodSimple'],
        'EvaluationMethodDocumentary' => ['namespace' => 'EvaluationMethodDocumentary'],
        
        'MultipleLocalAuth' => [ 'namespace' => 'MultipleLocalAuth' ],
        'MapasBlame' => [
            'namespace' => 'MapasBlame',
            'config' => [                                          
                'request.logData.PATCH' => function ($data) {
                    return $data;
                },               
            ]
        ],
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
                'enabled_plugin' => true,
                'slug' => 'msculturacidada',
                'opportunity_id' => env("MSCULTURACIDADA_OPPORTUNITY_ID", 137),
                'logo_institution' => 'img/logo-site.png',
                'logo_footer' => 'img/logo-instituicao.png',
                'logo_center' => 'img/logo-mscc-140x60.png',
                'schedule_datetime' => '2021-08-30 9:00:00',
                'schedule_closing' => '2021-09-24 23:59:00',
                'consolidation_requires_validations' => ['funtrabvalidador', 'sisgedvalidador', 'conselheirosvalidador'],
                'initial_statement_enabled' => true,
                "email_hidden_copy" => "msculturacidada@gmail.com",
               
                'text_home_before_search' => [
                    // true para usar um texto acima do formulário de pesquisa da home
                    'enabled' => true,

                    //true para usar um template part ou false para usar diretamente texto da configuração
                    'use_part' => true,

                    // Nome do template part ou texto que sera usado
                    'template_part' => 'text-home',

                    // Texto que será exibido
                    'text' => \MapasCulturais\i::__("<p>O Programa “MS Cultura Cidadã”, instituído pela Lei nº 5.688, de 7 de julho de 2021 e regulamentado pelo Decreto nº 15.728, de 14 de julho de 2021, integra o pacote de apoio do governo estadual “Retomada MS”, e prevê o uso de até R$ 3.230.000,00 (três milhões, duzentos e trinta mil reais), para concessão de apoio financeiro emergencial aos trabalhadores da cultura atingidos por restrições econômicas durante a pandemia da Covid-19.</p> <p> O Programa possibilitará que cerca de 1800 trabalhadores da cultura sul-mato-grossense, dentre artistas,contadores de histórias, produtores, técnicos, curadores, oficineiros, professores de escolas de artes e capoeira, designers de moda, dentre outros profissionais da cultura estadual, tenham acesso ao apoio financeiro emergencial de R$ 1.800,00 (mil e oitocentos reais), a ser pago em 3 (três) parcelas mensais  no valor de R$ 600,00 (seiscentos reais) cada.</p>", "streamlined-opportunity"),

                     //Habilita um botão abaixo do texto
                    'enabled_button' => env("MSCULTURACIDADA_ENABLED_BUTTON_BEFORE_SEARCH", false),

                    // Link que leva a documentação do edital
                    'link_documentation' => "https://www.fundacaodecultura.ms.gov.br/ms-cultura-cidada/",

                    // Texto que contem o link da documentação do edital
                    'text_link_documentation' => \MapasCulturais\i::__("clicando aqui <br/> <h4>Inscrições abertas até 24/09/2021</h4>", "streamlined-opportunity"),

                    // Texto informativo ao lado do link
                    'text_info_link_documentation' => \MapasCulturais\i::__("Acesse os critérios para a concessão do benefício e os modelos dos <b>ANEXOS</b> do formulário", "streamlined-opportunity"),

                    //texto dentro do botão
                    'text_button' => env("MSCULTURACIDADA_TEXT_BUTTON_BEFORE_SEARCH", \MapasCulturais\i::__("Solicite seu auxilio", "streamlined-opportunity")) ,

                    //Link que o botão deve acessar
                    'link_button' => env("MSCULTURACIDADA_LINK_BUTTON_BEFORE_SEARCH",'/msculturacidada/cadastro'),

                    // Texto que será exibido no local do botão quando o mesmo esteja desabilitado
                    'text_button_disabled' => env("MSCULTURACIDADA_TEXT_DISABLED_BUTTON_BEFORE_SEARCH",'INSCRIÇÕES ENCERRADAS'),
                ],
                'img_home_before_search' => [
                    // true para usar uma imagem acima do texto que será inserido na home
                    'enabled' => true,

                    //true para usar um template part ou false para usar diretamente o caminho de uma imagem
                    'use_part' => false,

                    // Nome do template part ou caminho da imagem que sera usada
                    'patch_or_part' => "img/logo_ms_Cultura_cidada.png",

                    // Seta os styles a serem aplicados
                    'styles_class' => "streamlinedopportunity",
                ],
                /*TERMOS E CONDIÇÕES */
                "terms" => [
                    "intro" => \MapasCulturais\i::__(""),
                    "title" => \MapasCulturais\i::__("Termos e Condições", "streamlined-opportunity"),
                    "items" => [
                        \MapasCulturais\i::__("<strong>Declaro ser residente no estado do Mato Grosso do Sul</strong>, conforme Inciso I do Art. 2º da Lei Estadual nº 5.688/2021, e Artigo 9º, Inciso II do Decreto Estadual nº 15.728/2021", "streamlined-opportunity"),
                        \MapasCulturais\i::__("<strong>Declaro ter participado da cadeia produtiva dos segmentos artísticos e culturais do estado de Mato Grosso do Sul nos 24 (vinte e quatro) meses</strong>, imediatamente anteriores à 19 de março de 2020, data da edição do Decreto Estadual nº 15.396, conforme Inciso II do Art. 2º da Lei Estadual nº 5.688/2021, e Artigo 9º, Inciso III do Decreto Estadual nº 15.728/2021.", "streamlined-opportunity"),
                        \MapasCulturais\i::__("<strong>Declaro que estou ciente de que será concedido apenas 1 (um) apoio financeiro emergencial por família</strong>, conforme Art. 1º, § 3º da Lei nº 5.688/2021 e Art. 9º, Inciso IV do Decreto nº 15.728/2021.", "streamlined-opportunity"),
                        \MapasCulturais\i::__("<strong>Declaro que estou ciente de que a participação no Programa “MS Cultura Cidadã” é condicionada à renúncia ao direito de futura ação</strong> relativa a eventuais indenizações decorrentes de medidas restritivas impostas em razão da emergência em saúde pública causada pela pandemia do novo coronavírus (covid-19), bem como à desistência de ações com o mesmo teor já propostas em face do estado, com a correspondente renúncia ao direito veiculado na demanda, conforme Parágrafo Único do Art. 2º da Lei Estadual nº 5.688/2021, e Artigo 9º, Inciso V do Decreto Estadual nº 15.728/2021.", "streamlined-opportunity"),
                        \MapasCulturais\i::__("<strong>Declaro que estou ciente de que</strong>, caso a concessão do benefício do Programa “MS Cultura Cidadã” seja impeditivo ao acesso aos benefícios sociais concedidos pela união, deverei optar, expressamente, pela adesão ao Programa “MS Cultura Cidadã”, assumindo por minha conta e risco, eventual exclusão da participação em programas federais ou restrição de acesso, caso já beneficiado, conforme Art. 9º, §2º do Decreto Estadual nº 15.728/2021.", "streamlined-opportunity"),
                        \MapasCulturais\i::__("<strong>Declaro que não possuo emprego formal ativo na iniciativa privada</strong>, com contrato de trabalho formalizado nos termos da consolidação das leis do trabalho, conforme o Inciso I do Art. 3º da Lei Estadual nº 5.688/2021, e o § 3º do Art. 10 do Decreto Estadual nº 15.728/2021.", "streamlined-opportunity"),
                        \MapasCulturais\i::__("<strong>Declaro que não sou detentor de cargo, emprego ou função públicos</strong>, conforme Inciso II do Art. 3º da Lei Estadual nº 5.688/2021.", "streamlined-opportunity"),
                        \MapasCulturais\i::__("<strong>Declaro que não sou titular de benefício previdenciário</strong>, conforme Inciso III do Art. 3º da Lei Estadual nº 5.688/2021.", "streamlined-opportunity"),
                        \MapasCulturais\i::__("<strong>Declaro que não estou recebendo benefício do seguro desemprego</strong>, conforme Inciso IV do Art. 3º da Lei Estadual nº 5.688/2021.", "streamlined-opportunity"),
                        \MapasCulturais\i::__("<strong>Declaro que estou ciente de que, em caso de utilização de qualquer meio ilícito, imoral ou declaração falsa para a participação deste credenciamento</strong>, incorro na penalidade prevista no Artigo 299 do Decreto Lei nº 2.848, de 07 de dezembro de 1940 (código penal), além de ensejar a adoção das medidas cabíveis, nas esferas administrativa e judicial.", "streamlined-opportunity"),
                        \MapasCulturais\i::__("<strong>Declaro que estou ciente da concessão das informações</strong> por mim declaradas neste formulário para pesquisa e validação em outras bases de dados oficiais.", "streamlined-opportunity"),
                        \MapasCulturais\i::__("<strong>Concordo com a inclusão das informações</strong> por mim declaradas neste formulário na base de dados <strong>da plataforma Mapa Cultural de Mato Grosso do Sul.</strong>", "streamlined-opportunity")
                    ],
                    "help" => \MapasCulturais\i::__("Você precisa aceitar todos os termos para continuar com a inscrição no auxílio emergencial da cultura.", "streamlined-opportunity")
                ],
                /*TELA DE INSCRIÇÃO */
                'registration_screen' => [
                    'title' => \MapasCulturais\i::__("Para se inscrever clique no botão abaixo", "streamlined-opportunity"),
                    'description' => \MapasCulturais\i::__("Programa MS Cultura Cidadã", "streamlined-opportunity"),
                    'long_description' => \MapasCulturais\i::__("Para ser beneficiário do Programa “MS Cultura Cidadã”, o trabalhador da cultura deverá preencher, cumulativamente, os requisitos de elegibilidade a serem documentalmente comprovados no ato da inscrição, conforme previsto no Art. 2º da Lei Estadual nº 5.688, de 7 de julho de 2021 e Art. 9º do Decreto Estadual nº 15.728, de 14 de julho de 2021, e, conjuntamente, não poderá apresentar quaisquer das condições impeditivas previstas no Art. 3º da Lei Estadual.", "streamlined-opportunity"), 
                    'title_application_summary' => \MapasCulturais\i::__("Resumo da inscrição", "streamlined-opportunity"),
                ],
                /*TELA DO FORMULÁRIO */
                'form_screen' => [
                    'title' => \MapasCulturais\i::__("Formulário de inscrição", "streamlined-opportunity")
                ],

                /*EMAIL DE CONFIRMAÇÃO DE INSCRIÇÃO */
                "email_confirm_registration" => [
                    'project_name' => \MapasCulturais\i::__("no programa MS Cultura cidadã", "streamlined-opportunity"),
                    'status_title' => \MapasCulturais\i::__("Inscrição realizada com sucesso!", "streamlined-opportunity"),
                    'url_image_body' => 'img/logo_ms_Cultura_cidada.png',
                    'subject' => \MapasCulturais\i::__("Confirmação de cadastro MS Cultura cidadã", "streamlined-opportunity"),
                ],

                 /**EMAIL DURANTE TROCA DE STATUS DA INSCRIÇÃO */
                "email_alter_status" => [
                    "url_image_body" => 'img/logo_ms_Cultura_cidada.png',
                    "project_name" => \MapasCulturais\i::__("no programa MS Cultura Cidadã", "streamlined-opportunity"),
                    "subject" => \MapasCulturais\i::__("O status da sua inscrição no programa MS Cultura Cidadã mudou", "streamlined-opportunity"),
                    "send_email_status" => ['2','3','10'],                    
                    "message_appeal" => [
                        'title' => \MapasCulturais\i::__('Você pode entrar com recurso'),
                        'message' => \MapasCulturais\i::__('Conforme previsto pela Portaria FCMS nº 023/2021, Art. 3º, o interessado poderá oferecer recurso contendo suas razões, a ser encaminhando exclusivamente para o e-mail msculturacidada@gmail.com, no prazo de 05 (cinco) dias contados do envio de e-mail que informa o indeferimento.'),
                    ],
                    "message_status" => [                        
                        10 => [
                            'title' => \MapasCulturais\i::__('Sua solicitação foi aprovada'),
                            'message' => [
                                'part1' => \MapasCulturais\i::__('Sua inscrição foi analisada, homologada e a solicitação do benefício validada pela FCMS. Aguardando o pagamento do benefício.'),
                                'part2' => \MapasCulturais\i::__(''),
                                'part3' => \MapasCulturais\i::__(''),
                                'part4' => \MapasCulturais\i::__(''),
                                'part4' => \MapasCulturais\i::__(''),
                                'part5' => \MapasCulturais\i::__(''),
                                'part6' => \MapasCulturais\i::__(''),
                                'part7' => \MapasCulturais\i::__(''),
                            ],
                            'complement' => \MapasCulturais\i::__(''),
                            'has_appeal' => false,
                        ],
                        3 => [
                            'title' => \MapasCulturais\i::__('Sua solicitação não foi homologada'),
                            'message' => [
                                'part1' => \MapasCulturais\i::__('Conforme disposto no Art. 3º da Portaria FCMS Nº 023/2021, comunicamos que:'),
                                'part2' => \MapasCulturais\i::__('Sua inscrição foi analisada, mas não foi homologada por não atender aos requisitos de elegibilidade.'),
                                'part3' => \MapasCulturais\i::__('Conforme previsto pela Portaria FCMS nº 023/2021, Art. 3º, o interessado poderá oferecer recurso contendo suas razões, a ser encaminhando exclusivamente para o e-mail msculturacidada@gmail.com, no prazo de 05 (cinco) dias contados do envio de e-mail que informa o indeferimento.'),
                                'part4' => \MapasCulturais\i::__("ATENÇÃO: O recurso deverá ser encaminhado exclusivamente para o e-mail  msculturacidada@gmail.com, e deverá conter:"),
                                'part5' => \MapasCulturais\i::__('a. Identificação completa do recorrente;
                                                                  b. Identificação do número da inscrição;
                                                                  c. O pedido do recurso, com identificação do item recorrido;
                                                                  d. Documentos comprobatórios, quando cabíveis; 
                                                                  e. Razões que fundamentem o recurso.'),
                                'part6' => \MapasCulturais\i::__(''),
                                'part7' => \MapasCulturais\i::__(''),
                            ],
                            'complement' => \MapasCulturais\i::__('Conforme previsto pela Portaria FCMS nº 023/2021, Art. 3º, o interessado poderá oferecer recurso contendo suas razões, a ser encaminhando exclusivamente para o e-mail msculturacidada@gmail.com, no prazo de 05 (cinco) dias contados do envio de e-mail que informa o indeferimento.'),
                            'has_appeal' => false,
                        ],
                        2 => [
                            'title' => \MapasCulturais\i::__('Sua solicitação não foi aprovada'),
                            'message' => [
                                'part1' => \MapasCulturais\i::__('Conforme disposto no Art. 3º da Portaria FCMS Nº 023/2021, comunicamos que:'),
                                'part2' => \MapasCulturais\i::__('Sua solicitação foi analisada e homologada pela equipe da FCMS, mas invalidada após consulta em outras bases de dados oficiais.'),
                                'part3' => \MapasCulturais\i::__('Conforme previsto pela Portaria FCMS nº 023/2021, Art. 3º, o interessado poderá oferecer recurso contendo suas razões, a ser encaminhando exclusivamente para o e-mail msculturacidada@gmail.com, no prazo de 05 (cinco) dias contados do envio de e-mail que informa o indeferimento.'),
                                'part4' => \MapasCulturais\i::__('ATENÇÃO: O recurso deverá ser encaminhado exclusivamente para o e-mail  msculturacidada@gmail.com, e deverá conter:'),
                                'part5' => \MapasCulturais\i::__('a. Identificação completa do recorrente;
                                                                  b. Identificação do número da inscrição;
                                                                  c. O pedido do recurso, com identificação do item recorrido;
                                                                  d. Documentos comprobatórios, quando cabíveis; 
                                                                  e. Razões que fundamentem o recurso.
                                                                 '),
                                'part6' => \MapasCulturais\i::__(''),
                                'part7' => \MapasCulturais\i::__(''),

                            ],
                            'complement' => "Descrição da condição impeditiva verificada conforme retorno da consulta externa (Funtrab, RH, Conselho), conforme Art. 3º da Lei nº 5.688, de 2021.",
                            'has_appeal' => false,
                        ],

                    ]
                ],
                'email_payment' => [
                    10 => [
                        'title' => \MapasCulturais\i::__('Pagamento efetuado'),
                    ]
                ]
            ]
        ],
        "AbstractValidator" => [
            "namespace" => "AbstractValidator",
            "config" => []
        ],        
        'AppealValidatorMsCulturaCidada' => [
            "namespace" => "AppealValidator",
            "config" => [
                "slug" => "validador_recurso",
                'name' => "Validador de recurso",
                'required_validations' => ['homologvalidador', 'conselheirosvalidador', 'funtrabvalidador', 'sisgedvalidador'], 
                'required_validations_for_export' => ['homologvalidador', 'conselheirosvalidador', 'funtrabvalidador', 'sisgedvalidador'],
                "is_opportunity_managed_handler" => function ($opportunity) {
                    return ($opportunity->id == env("MSCULTURACIDADA_APPEAL_OPPORTUNITY_ID", 137));
                },
            
            ]
        ],
        "CONSELHEIROS" => [
            "namespace" => "GenericValidator",
            "config" => [
                "name" => "CONSELHEIROS",
                'slug' => "conselheirosvalidador",
                'required_validations' => ['funtrabvalidador', 'sisgedvalidador', 'financeiro'], 
                'required_validations_for_export' => [],
                'homologation_required' => true,
                'homologation_required_for_export' => true ,                           
                'is_opportunity_managed_handler' => function ($opportunity) {
                    return ($opportunity->id == env("MSCULTURACIDADA_GENERIC_CONSELHEIROS_OPPORTUNITY_ID", 137));
                },
            ]
        ],             
        "FUNTRAB" => [
            "namespace" => "GenericValidator",
            "config" => [
                "name" => "FUNTRAB",
                'slug' => "funtrabvalidador",
                'required_validations' => ['conselheirosvalidador', 'sisgedvalidador', 'financeiro'], 
                'required_validations_for_export' => [],
                'homologation_required' => true,
                'homologation_required_for_export' => true ,        
                'is_opportunity_managed_handler' => function ($opportunity) {
                    return ($opportunity->id == env("MSCULTURACIDADA_GENERIC_FUNTRAB_OPPORTUNITY_ID", 137));
                },
            ]
        ],
        "SISGED" => [
            "namespace" => "GenericValidator",
            "config" => [
                "name" => "SISGED",
                'slug' => "sisgedvalidador",
                'required_validations' => ['conselheirosvalidador', 'funtrabvalidador', 'financeiro'],
                'required_validations_for_export' => [],
                'homologation_required' => true,
                'homologation_required_for_export' => true ,
                'is_opportunity_managed_handler' => function ($opportunity) {
                    return ($opportunity->id == env("MSCULTURACIDADA_GENERIC_SISGED_OPPORTUNITY_ID", 137));
                },
            ]
        ], 
        "MapasNetwork" => [
            "namespace" => "MapasNetwork",
            "config" => [
                'nodes' => explode(",", env("MAPAS_NETWORK_NODES", "")),
                'filters' => [
                    'agent' => [ 'En_Estado' => 'MS' ],
                    'space' => [ 'En_Estado' => 'MS' ],
                ]
            ]
        ],
        "GenericPaymentExport" => [
            "namespace" => "GenericPaymentExport",
            "config" => [
                "slug" => "genericpaymentexport",
                "name" => "de dados para pagamento",
                "required_validations_for_export" => ['conselheirosvalidador', 'funtrabvalidador', 'sisgedvalidador'],
                'is_opportunity_managed_handler' => function ($opportunity) {
                    return ($opportunity->id == env("GENERIC_PAYMENT_OPPORTUNITY_ID", 137));
                },
                'file_name_prefix' => "op",
                'fields' => [
                    "TIPO_IDENTIFICACAO" => "default",
                    "TIPO_CREDOR" => "default",
                    'EMAIL' => [3943,3955],
                    'NATUREZA_JURIDICA' => "nulo", 
                    'CPF' => 3953,
                    'NOME_COMPLETO' => 3949,
                    'CNPJ' => null, 
                    'RAZAO_SOCIAL' => null,
                    'LOGRADOURO' => 3941,
                    'NUMERO' => 3941,
                    'COMPLEMENTO' => 3941,
                    'BAIRRO' => 3941,
                    'MUNICIPIO' => 3941,
                    'CEP' => 3941,
                    'ESTADO' => 3941,
                    'TELEFONE' => [3946,1945,3944],
                    'NUM_BANCO' => 3923,
                    'NOME_BANCO' => 3923 ,   
                    'AGENCIA_BANCO' => 3916,
                    'DIGITO_AGENCIA' => 3920,
                    'CONTA_BANCO' => 3915,
                    'DIGITO_CONTA' => 3919,
                    'SITUACAO' => "default",
                    'VALOR' => null,
                    'INSCRICAO_ID' => 'default',
                    'CONTA_OPERACAO' => 3925,
                    'TIPO_CONTA' => 3927,
                ]              
            ]
        ],
        'FinancialValidador' => [
            'namespace' => "FinancialValidador",
            'config' => [
                'slug' => 'financial_validator',
                'name' => 'Validador Financeiro',
                'fields' => [
                    'NOME_COMPLETO' => 3949,
                    'CPF' => 3953,
                ],
                'is_opportunity_managed_handler' => function ($opportunity) {
                    return ($opportunity->id == env("FINANTIAL_VALIDATOR_OPPORTUNITY_ID", 137));
                },
            ]
        ],
                      
    ]
];

if(!env("MAPAS_NETWORK_ENABLED", false)){
    unset($config_plugin['plugins']['MapasNetwork']);
}

return $config_plugin;