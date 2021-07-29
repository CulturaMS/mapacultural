<section id="home-intro" class="js-page-menu-item home-entity clearfix">
    <?php $this->applyTemplateHook('home-search','begin'); ?>
    <div class="box">
        <h1><?php echo $app->view->renderMarkdown($this->dict('home: title',false)); ?></h1>
        <p><?php echo $app->view->renderMarkdown($this->dict('home: welcome',false)); ?></p>
        <?php $this->applyTemplateHook('home-search-form','begin'); ?>
        
        <?php $this->applyTemplateHook('home-search-form','after'); ?>
        <a class="btn btn-accent btn-large" href="<?php echo $app->createUrl('panel') ?>"><?php $this->dict('home: colabore') ?></a>
    </div>
    <div class="view-more"><a class="hltip icon icon-select-arrow" href="#home-events" title="<?php \MapasCulturais\i::esc_attr_e("Saiba mais");?>"></a></div>
    <?php $this->applyTemplateHook('home-search','end'); ?>
</section>

