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

/* @SitesManager/_trackingCodeEmail.twig */
class __TwigTemplate_3393d8e79b40e1d7668a3f6c4740a36d837a18d25369a1d38645e4b4a22c50be extends Template
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
        if ((isset($context["showMatomoLinks"]) || array_key_exists("showMatomoLinks", $context) ? $context["showMatomoLinks"] : (function () { throw new RuntimeError('Variable "showMatomoLinks" does not exist.', 1, $this->source); })())) {
            echo "** ";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["General_JsTrackingTag"]), "html", null, true);
        }
        // line 2
        echo "
";
        // line 3
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreAdminHome_JSTracking_CodeNoteBeforeClosingHeadEmail", "'head'"]), "html", null, true);
        echo "

";
        // line 5
        echo (isset($context["jsTag"]) || array_key_exists("jsTag", $context) ? $context["jsTag"] : (function () { throw new RuntimeError('Variable "jsTag" does not exist.', 5, $this->source); })());
        echo "

";
        // line 7
        if ((isset($context["showMatomoLinks"]) || array_key_exists("showMatomoLinks", $context) ? $context["showMatomoLinks"] : (function () { throw new RuntimeError('Variable "showMatomoLinks" does not exist.', 7, $this->source); })())) {
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_EmailInstructionsDocsPlainText", "https://developer.matomo.org/guides/tracking-javascript-guide"]);
        }
        // line 8
        echo "
";
        // line 9
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_EmailInstructionsGenerateTrackingCode", ((isset($context["piwikUrl"]) || array_key_exists("piwikUrl", $context) ? $context["piwikUrl"] : (function () { throw new RuntimeError('Variable "piwikUrl" does not exist.', 9, $this->source); })()) . call_user_func_array($this->env->getFunction('linkTo')->getCallable(), [["module" => "CoreAdminHome", "action" => "trackingCodeGenerator"]]))]);
        echo "

";
        // line 11
        if ((isset($context["showMatomoLinks"]) || array_key_exists("showMatomoLinks", $context) ? $context["showMatomoLinks"] : (function () { throw new RuntimeError('Variable "showMatomoLinks" does not exist.', 11, $this->source); })())) {
            // line 12
            echo "** ";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_InstallationGuides"]), "html", null, true);
            echo "
WordPress: https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-wordpress/
Squarespace: https://matomo.org/faq/new-to-piwik/how-do-i-integrate-matomo-with-squarespace-website/
Wix: https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-analytics-tracking-code-on-wix/
SharePoint: https://matomo.org/faq/how-to-install/faq_19424/
Joomla: https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-analytics-tracking-code-on-joomla/
Shopify: https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-shopify-store/

** ";
            // line 20
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_Integrations"]), "html", null, true);
            echo "
";
            // line 21
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreAdminHome_JSTrackingIntro3a", "", ""]), "html", null, true);
            echo "
https://matomo.org/integrate/

** ";
            // line 24
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_LogAnalytics"]), "html", null, true);
            echo "
";
            // line 25
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_LogAnalyticsDescription", "", ""]), "html", null, true);
            echo "
https://matomo.org/log-analytics/

** ";
            // line 28
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_MobileAppsAndSDKs"]), "html", null, true);
            echo "
";
            // line 29
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_MobileAppsAndSDKsDescription", "", ""]), "html", null, true);
            echo "
https://matomo.org/integrate/#programming-language-platforms-and-frameworks

** ";
            // line 32
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreAdminHome_HttpTrackingApi"]), "html", null, true);
            echo "
";
            // line 33
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreAdminHome_HttpTrackingApiDescription", "", ""]), "html", null, true);
            echo "
https://developer.matomo.org/api-reference/tracking-api
    
** ";
            // line 36
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_EmailInstructionsSiteDetailsHeading"]), "html", null, true);
            echo "
";
            // line 37
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_EmailInstructionsSiteDetails"]), "html", null, true);
            echo "
* ";
            // line 38
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_EmailInstructionsYourSiteId", (isset($context["idSite"]) || array_key_exists("idSite", $context) ? $context["idSite"] : (function () { throw new RuntimeError('Variable "idSite" does not exist.', 38, $this->source); })())]), "html", null, true);
            echo "
* ";
            // line 39
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_EmailInstructionsYourTrackingUrl", (isset($context["trackingUrl"]) || array_key_exists("trackingUrl", $context) ? $context["trackingUrl"] : (function () { throw new RuntimeError('Variable "trackingUrl" does not exist.', 39, $this->source); })())]), "html", null, true);
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "@SitesManager/_trackingCodeEmail.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 39,  129 => 38,  125 => 37,  121 => 36,  115 => 33,  111 => 32,  105 => 29,  101 => 28,  95 => 25,  91 => 24,  85 => 21,  81 => 20,  69 => 12,  67 => 11,  62 => 9,  59 => 8,  55 => 7,  50 => 5,  45 => 3,  42 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if showMatomoLinks %}** {{ 'General_JsTrackingTag'|translate }}{% endif %}

{{ 'CoreAdminHome_JSTracking_CodeNoteBeforeClosingHeadEmail'|translate(\"'head'\") }}

{{ jsTag|raw }}

{% if showMatomoLinks %}{{ 'SitesManager_EmailInstructionsDocsPlainText'|translate('https://developer.matomo.org/guides/tracking-javascript-guide')|raw }}{% endif %}

{{ 'SitesManager_EmailInstructionsGenerateTrackingCode'|translate(piwikUrl ~ linkTo({'module': 'CoreAdminHome', 'action': 'trackingCodeGenerator'}))|raw }}

{% if showMatomoLinks %}
** {{ 'SitesManager_InstallationGuides'|translate }}
WordPress: https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-wordpress/
Squarespace: https://matomo.org/faq/new-to-piwik/how-do-i-integrate-matomo-with-squarespace-website/
Wix: https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-analytics-tracking-code-on-wix/
SharePoint: https://matomo.org/faq/how-to-install/faq_19424/
Joomla: https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-analytics-tracking-code-on-joomla/
Shopify: https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-shopify-store/

** {{ 'SitesManager_Integrations'|translate }}
{{ 'CoreAdminHome_JSTrackingIntro3a'|translate('', '') }}
https://matomo.org/integrate/

** {{ 'SitesManager_LogAnalytics'|translate }}
{{ 'SitesManager_LogAnalyticsDescription'|translate('', '') }}
https://matomo.org/log-analytics/

** {{ 'SitesManager_MobileAppsAndSDKs'|translate }}
{{ 'SitesManager_MobileAppsAndSDKsDescription'|translate('', '') }}
https://matomo.org/integrate/#programming-language-platforms-and-frameworks

** {{ 'CoreAdminHome_HttpTrackingApi'|translate }}
{{ 'CoreAdminHome_HttpTrackingApiDescription'|translate('', '') }}
https://developer.matomo.org/api-reference/tracking-api
    
** {{ 'SitesManager_EmailInstructionsSiteDetailsHeading'|translate }}
{{ 'SitesManager_EmailInstructionsSiteDetails'|translate }}
* {{ 'SitesManager_EmailInstructionsYourSiteId'|translate(idSite) }}
* {{ 'SitesManager_EmailInstructionsYourTrackingUrl'|translate(trackingUrl) }}
{% endif %}", "@SitesManager/_trackingCodeEmail.twig", "/home/admin/web/descubriendoargentina.com/public_html/public/matomo/plugins/SitesManager/templates/_trackingCodeEmail.twig");
    }
}
