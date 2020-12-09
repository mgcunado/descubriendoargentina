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

/* @CoreHome/_siteSelectHeader.twig */
class __TwigTemplate_c20183fc3fbacd3960b2e0586d812915a1f8cf34d773974089efb0fb077fbb56 extends Template
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
        echo "<div class=\"top_bar_sites_selector piwikTopControl\">
    <div piwik-siteselector show-selected-site=\"true\" show-all-sites-item=\"";
        // line 2
        echo (((isset($context["isMultiSitesEnabled"]) || array_key_exists("isMultiSitesEnabled", $context) ? $context["isMultiSitesEnabled"] : (function () { throw new RuntimeError('Variable "isMultiSitesEnabled" does not exist.', 2, $this->source); })())) ? ("true") : ("false"));
        echo "\" class=\"sites_autocomplete\"></div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_siteSelectHeader.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"top_bar_sites_selector piwikTopControl\">
    <div piwik-siteselector show-selected-site=\"true\" show-all-sites-item=\"{{ isMultiSitesEnabled ? 'true' : 'false' }}\" class=\"sites_autocomplete\"></div>
</div>
", "@CoreHome/_siteSelectHeader.twig", "/home/admin/web/descubriendoargentina.com/public_html/public/matomo/plugins/CoreHome/templates/_siteSelectHeader.twig");
    }
}
