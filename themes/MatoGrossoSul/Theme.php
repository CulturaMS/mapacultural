<?php
namespace MatoGrossoSul;

use MapasCulturais\App;

// class Theme extends \Subsite\Theme {
class Theme extends \MapasCulturais\Themes\BaseV1\Theme {

    protected static function _getTexts()
    {
        return array(

            'site: name' => 'Mapa Cultural de Mato Grosso do Sul',
            'site: in the region' => 'no Estado do Mato Grosso do Sul',
            'site: of the region' => 'do Estado do Mato Grosso do Sul',
            'site: owner' => 'Fundação da Cultura de Mato Grosso do Sul',
            'site: by the site owner' => 'pela FCMS',
            'site: description' => 'Plataforma livre, gratuita, colaborativa e interativa de mapeamento cultural desenvolvida para ser um instrumento transparente e colaborativo de gestão pública, permitindo aos gestores, agentes culturais e a todos os cidadãos conhecer, compartilhar e participar da produção e ações que integram a política cultural do Estado.
O Mapa Cultural é uma ferramenta de comunicação  que busca visibilizar os eventos do calendário cultural, os projetos desenvolvidos e os espaços promovidos pelos agentes e instituições culturais de Mato Grosso do Sul e, passa a ser também,  a plataforma de acesso e execução dos editais realizados pela Fundação de Cultura de MS.
Além de conferir a agenda de eventos, você também pode colaborar na gestão da cultura do estado: basta criar seu perfil de agente cultural. A partir do cadastro, fica mais fácil participar dos editais e programas da FCMS e também divulgar seus eventos, espaços ou projetos. Navegue, se informe, contribua e interaja com a gente!',
            'home: welcome' => "Plataforma livre, gratuita, colaborativa e interativa de mapeamento cultural desenvolvida para ser um instrumento transparente e colaborativo de gestão pública, permitindo aos gestores, agentes culturais e a todos os cidadãos conhecer, compartilhar e participar da produção e ações que integram a política cultural do Estado.
O Mapa Cultural é uma ferramenta de comunicação  que busca visibilizar os eventos do calendário cultural, os projetos desenvolvidos e os espaços promovidos pelos agentes e instituições culturais de Mato Grosso do Sul e, passa a ser também,  a plataforma de acesso e execução dos editais realizados pela Fundação de Cultura de MS.
Além de conferir a agenda de eventos, você também pode colaborar na gestão da cultura do estado: basta criar seu perfil de agente cultural. A partir do cadastro, fica mais fácil participar dos editais e programas da FCMS e também divulgar seus eventos, espaços ou projetos. Navegue, se informe, contribua e interaja com a gente!<br><br>",
            'home: events' => "Você pode pesquisar eventos culturais nos campos de busca combinada. Como usuário cadastrado, você pode incluir seus eventos na plataforma e divulgá-los gratuitamente.",
            'home: agents' => "Você pode colaborar na gestão da cultura com suas próprias informações, preenchendo seu perfil de agente cultural. Neste espaço, estão registrados artistas, gestores e produtores; uma rede de atores envolvidos na cena cultural do Estado. Você pode cadastrar um ou mais agentes (grupos, coletivos, bandas instituições, empresas, etc.), além de associar ao seu perfil eventos e espaços culturais com divulgação gratuita.",
            'home: spaces' => "Procure por espaços culturais incluídos na plataforma, acessando os campos de busca combinada que ajudam na precisão de sua pesquisa. Cadastre também os espaços onde desenvolve suas atividades artísticas e culturais.",
            'home: projects' => "Reúne projetos culturais ou agrupa eventos de todos os tipos. Neste espaço, você encontra leis de fomento, mostras, convocatórias e editais criados, além de diversas iniciativas cadastradas pelos usuários da plataforma. Cadastre-se e divulgue seus projetos.",
            'home: opportunities' => "Faça a sua inscrição ou acesse o resultado de diversas convocatórias como editais, oficinas, prêmios e concursos. Você também pode criar o seu próprio formulário e divulgar uma oportunidade para outros agentes culturais.",
            'home: colabore' => "Colabore com o Mapas Culturais",

            'home: abbreviation' => "FCMS",
            'home: home_devs' => 'A prática de compartilhar cultura se dá inclusive na abertura do código-fonte do projeto. Você pode ter acesso e colaborar de diversas maneiras. <a href="https://github.com/hacklabr/mapasculturais/blob/master/documentation/docs/mc_config_api.md" target="_blank">A primeira é através da nossa API</a>. Com ela você pode acessar os dados públicos no nosso banco de dados e utilizá-los para desenvolver aplicações externas. Além disso, o Mapa Cultural de Mato Grosso do Sul é construído a partir do sofware livre <a href="http://institutotim.org.br/project/mapas-culturais/" target="_blank">Mapas Culturais</a>, e você pode contribuir para o seu desenvolvimento através do <a href="https://github.com/hacklabr/mapasculturais/" target="_blank">GitHub</a>.',

            'search: verified results' => 'Resultados da FCMS',
            'search: verified' => "FCMS"
        );
    }
 
    static function getThemeFolder() {
        return __DIR__;
    }

    function _init() {
        parent::_init();
        $app = App::i();
        
        $app->hook('view.render(<<*>>):before', function() use($app) {
            $this->_publishAssets();
        });
    }

    protected function _publishAssets() {

        // $this->jsObject['assets']['logo-instituicao'] = $this->asset('img/logo-instituicao.png', false);

        // $this->enqueueScript('app', 'hide-fields', 'js/hide-fields.js');
    }

}