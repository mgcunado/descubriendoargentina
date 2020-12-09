<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @Feedback/feedbackPopup.twig */
class __TwigTemplate_776f4c70208e3e4796a219c112ae0c67803feff1f88d0bec4b47c8f72c45f9a7 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div piwik-feedback-popup prompt-for-feedback=\"";
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["promptForFeedback"]) || array_key_exists("promptForFeedback", $context) ? $context["promptForFeedback"] : (function () { throw new RuntimeError('Variable "promptForFeedback" does not exist.', 1, $this->source); })()), "html", null, true);
        echo "\"></div>
";
    }

    public function getTemplateName()
    {
        return "@Feedback/feedbackPopup.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div piwik-feedback-popup prompt-for-feedback=\"{{ promptForFeedback }}\"></div>
", "@Feedback/feedbackPopup.twig", "/home/admin/web/descubriendoargentina.com/public_html/public/matomo/plugins/Feedback/templates/feedbackPopup.twig");
    }
}
