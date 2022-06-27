<?php
namespace Main;

class _templateSystem {
    public $templatePath;
    public $variables;
    public $isWithHeader;
    public $isWithFooter;

    function __construct($templatePath, $variables = [], $isWithHeader = true, $isWithFooter = true){
        $this->templatePath = $templatePath;
        $this->variables = $variables;
        $this->isWithHeader = $isWithHeader;
        $this->isWithFooter = $isWithFooter;
        $this->loadTemplate();
    }

    public function loadTemplate(){
        if ($this->isWithHeader){
            $this->loadTemplateBlock('layout/_header.php');
        }

        $this->loadTemplateBlock($this->templatePath);

        if ($this->isWithFooter){
            $this->loadTemplateBlock('layout/_footer.php');
        }
    }

    public function loadTemplateBlock($templateBlockPath){
        extract($this->variables);
        include(TEMPLATES_FOLDER . $templateBlockPath);
    }
}
?>
