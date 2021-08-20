<?php

use MapasCulturais\App;

$app = App::i();
?>

<p>O Programa “MS Cultura Cidadã”, instituído pela Lei nº 5.688, de 7 de julho de 2021 e regulamentado pelo Decreto nº 15.728,
de 14 de julho de 2021, integra o pacote de apoio do governo estadual “Retomada MS”, e prevê o uso de até R$ 3.230.000,00 
(três milhões, duzentos e trinta mil reais), para concessão de apoio financeiro emergencial aos trabalhadores da cultura atingidos por 
restrições econômicas durante a pandemia da Covid-19.
</p>

<p>
O Programa possibilitará que cerca de 1800 trabalhadores da cultura sul-mato-grossense, dentre artistas, 
contadores de histórias, produtores, técnicos, curadores, oficineiros, professores de escolas de artes e capoeira, 
designers de moda, dentre outros profissionais da cultura estadual, tenham acesso ao apoio financeiro emergencial de R$ 1.800,00 
(mil e oitocentos reais), a ser pago em 3 (três) parcelas mensais  no valor de R$ 600,00 (seiscentos reais) cada.
</p>

<div style="text-align: center;">
    <p>Acesse os critérios para a concessão do benefício <strong><a style="color:#fff" target="_blank" href="https://www.fundacaodecultura.ms.gov.br/ms-cultura-cidada/">clicando aqui</a></strong>.</p>
    <?php if($enabled_button){ ?>
    <a class="btn btn-accent btn-large" href="<?=$link_buton?>"><?=$text_buton?></a>
    <?php }else{ ?>
        <h3>Inscrições em breve !</h3>
    <?php } ?>
    <br><br>
</div>