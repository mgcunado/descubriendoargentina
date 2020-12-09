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

/* @SitesManager/siteWithoutData.twig */
class __TwigTemplate_9c3e6e226f68508d2431293886ffc7b9e7181de4379d7599157809610b152a41 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'notification' => [$this, 'block_notification'],
            'topcontrols' => [$this, 'block_topcontrols'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "dashboard.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("dashboard.twig", "@SitesManager/siteWithoutData.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_notification($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 5
    public function block_topcontrols($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    ";
        $this->loadTemplate("@CoreHome/_siteSelectHeader.twig", "@SitesManager/siteWithoutData.twig", 6)->display($context);
    }

    // line 9
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "
    <script type=\"text/javascript\" charset=\"utf-8\">
        \$(document).ready(function () {
            \$('<div />').insertAfter('.site-without-data').liveWidget({
                interval: 1000,
                onUpdate: function () {
                    // reload page as soon as a visit was detected
                    broadcast.propagateNewPage('date=today');
                },
                dataUrlParams: {
                    module: 'Live',
                    action: 'getLastVisitsStart'
                }
            });
        });
    </script>

    <div class=\"site-without-data\">
        <div piwik-content-block content-title=\"";
        // line 28
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_SiteWithoutDataTitle"]), "html_attr");
        echo "\">

        <p>
            ";
        // line 31
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_SiteWithoutDataDescription"]), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["Installation_JSTracking_Intro"]), "html", null, true);
        echo "
            ";
        // line 32
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_SiteWithoutDataSetupTracking", (("<a href=\"" . call_user_func_array($this->env->getFunction('linkTo')->getCallable(), [["module" => "CoreAdminHome", "action" => "trackingCodeGenerator"]])) . "\">"), "</a>"]);
        // line 35
        echo "
            <br />
            <br />
            ";
        // line 38
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_SiteWithoutDataMessageDisappears"]), "html", null, true);
        echo "

        </p>

            <div class='trackingHelp'>
                ";
        // line 43
        if ((isset($context["showMatomoLinks"]) || array_key_exists("showMatomoLinks", $context) ? $context["showMatomoLinks"] : (function () { throw new RuntimeError('Variable "showMatomoLinks" does not exist.', 43, $this->source); })())) {
            // line 44
            echo "                <h3>";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_InstallationGuides"]), "html", null, true);
            echo "</h3>
                <p>";
            // line 45
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_InstallationGuidesIntro"]), "html", null, true);
            echo "

                <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-wordpress/'>WordPress</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-integrate-matomo-with-squarespace-website/'>Squarespace</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-analytics-tracking-code-on-wix/'>Wix</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/how-to-install/faq_19424/'>SharePoint</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-analytics-tracking-code-on-joomla/'>Joomla</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-shopify-store/'>Shopify</a>
                    <br >
                    <br >
                    ";
            // line 55
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_ExtraInformationNeeded"]), "html", null, true);
            echo "
                    <br >
                    Matomo URL: <code piwik-select-on-focus>";
            // line 57
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["piwikUrl"]) || array_key_exists("piwikUrl", $context) ? $context["piwikUrl"] : (function () { throw new RuntimeError('Variable "piwikUrl" does not exist.', 57, $this->source); })()), "html", null, true);
            echo "</code>
                    <br >
                    ";
            // line 59
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_EmailInstructionsYourSiteId", (("<code piwik-select-on-focus>" . (isset($context["idSite"]) || array_key_exists("idSite", $context) ? $context["idSite"] : (function () { throw new RuntimeError('Variable "idSite" does not exist.', 59, $this->source); })())) . "</code>")]);
            echo "
                    <br >
                </p>
                ";
        }
        // line 63
        echo "
                <h3>";
        // line 64
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_Integrations"]), "html", null, true);
        echo "</h3>

                <p>";
        // line 66
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreAdminHome_JSTrackingIntro3a", "<a href=\"https://matomo.org/integrate/\" rel=\"noreferrer noopener\" target=\"_blank\">", "</a>"]);
        echo " ";
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreAdminHome_JSTrackingIntro3b"]);
        echo "</p>

                <div class=\"valign-wrapper trackingHelpHeader\">
                    <div>

                        <h3>";
        // line 71
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["General_JsTrackingTag"]), "html", null, true);
        echo "</h3>

                        <p>";
        // line 73
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreAdminHome_JSTracking_CodeNoteBeforeClosingHead", "&lt;/head&gt;"]);
        echo "</p>
                    </div>
                    <a class=\"btn\" id=\"emailTrackingCodeBtn\"
                       href=\"mailto:?subject=";
        // line 76
        echo \Piwik\piwik_escape_filter($this->env, twig_urlencode_filter(call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_EmailInstructionsSubject"])), "html_attr");
        echo "&body=";
        echo \Piwik\piwik_escape_filter($this->env, twig_urlencode_filter((isset($context["emailBody"]) || array_key_exists("emailBody", $context) ? $context["emailBody"] : (function () { throw new RuntimeError('Variable "emailBody" does not exist.', 76, $this->source); })())), "html_attr");
        echo "\">
                        ";
        // line 77
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_EmailInstructionsButton"]), "html", null, true);
        echo "
                    </a>
                </div>

                <pre piwik-select-on-focus>";
        // line 81
        echo (isset($context["jsTag"]) || array_key_exists("jsTag", $context) ? $context["jsTag"] : (function () { throw new RuntimeError('Variable "jsTag" does not exist.', 81, $this->source); })());
        echo "</pre>

                <p>";
        // line 83
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreAdminHome_JSTrackingIntro5", "<a rel=\"noreferrer noopener\" target=\"_blank\" href=\"https://developer.matomo.org/guides/tracking-javascript-guide\">", "</a>"]);
        echo "</p>

                <p><br />";
        // line 85
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreAdminHome_JSTracking_EndNote", (("<a href=\"" . call_user_func_array($this->env->getFunction('linkTo')->getCallable(), [["module" => "CoreAdminHome", "action" => "trackingCodeGenerator"]])) . "\">"), "</a>"]);
        echo "
                <br />
                <br />
                    <a href=\"";
        // line 88
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), [["module" => "CoreAdminHome", "action" => "trackingCodeGenerator"]]), "html", null, true);
        echo "\"class=\"btn\"><span class=\"icon-configure\"></span> ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_CustomizeJavaScriptTracker"]), "html", null, true);
        echo "</a></p>

                <h3>";
        // line 90
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_LogAnalytics"]), "html", null, true);
        echo "</h3>

                <p>";
        // line 92
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_LogAnalyticsDescription", "<a href=\"https://matomo.org/log-analytics/\" rel=\"noreferrer noopener\" target=\"_blank\">", "</a>"]);
        echo "</p>

                <h3>";
        // line 94
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_MobileAppsAndSDKs"]), "html", null, true);
        echo "</h3>

                <p>";
        // line 96
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_MobileAppsAndSDKsDescription", "<a href=\"https://matomo.org/integrate/#programming-language-platforms-and-frameworks\" rel=\"noreferrer noopener\" target=\"_blank\">", "</a>"]);
        echo "</p>

                <h3>";
        // line 98
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreAdminHome_HttpTrackingApi"]), "html", null, true);
        echo "</h3>
                <p>";
        // line 99
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreAdminHome_HttpTrackingApiDescription", "<a href=\"https://developer.matomo.org/api-reference/tracking-api\" rel=\"noreferrer noopener\" target=\"_blank\">", "</a>"]);
        echo "</p>

                ";
        // line 101
        if (array_key_exists("googleAnalyticsImporterMessage", $context)) {
            // line 102
            echo "                ";
            echo (isset($context["googleAnalyticsImporterMessage"]) || array_key_exists("googleAnalyticsImporterMessage", $context) ? $context["googleAnalyticsImporterMessage"] : (function () { throw new RuntimeError('Variable "googleAnalyticsImporterMessage" does not exist.', 102, $this->source); })());
            echo "
                ";
        }
        // line 104
        echo "
                ";
        // line 105
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), ["Template.endTrackingHelpPage"]);
        echo "

            </div>

            ";
        // line 109
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), ["Template.siteWithoutData.afterIntro"]);
        echo "
            <br />
            <br />
            <a href=\"";
        // line 112
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), [["module" => "SitesManager", "action" => "ignoreNoDataMessage"]]), "html", null, true);
        echo "\"
               class=\"btn ignoreSitesWithoutData\">";
        // line 113
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["SitesManager_SiteWithoutDataIgnoreMessage"]), "html", null, true);
        echo "</a>

        </div>

        ";
        // line 117
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), ["Template.siteWithoutData.afterTrackingHelp"]);
        echo "
    </div>

";
    }

    public function getTemplateName()
    {
        return "@SitesManager/siteWithoutData.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  280 => 117,  273 => 113,  269 => 112,  263 => 109,  256 => 105,  253 => 104,  247 => 102,  245 => 101,  240 => 99,  236 => 98,  231 => 96,  226 => 94,  221 => 92,  216 => 90,  209 => 88,  203 => 85,  198 => 83,  193 => 81,  186 => 77,  180 => 76,  174 => 73,  169 => 71,  159 => 66,  154 => 64,  151 => 63,  144 => 59,  139 => 57,  134 => 55,  121 => 45,  116 => 44,  114 => 43,  106 => 38,  101 => 35,  99 => 32,  93 => 31,  87 => 28,  67 => 10,  63 => 9,  58 => 6,  54 => 5,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"dashboard.twig\" %}

{% block notification %}{% endblock %}

{% block topcontrols %}
    {% include \"@CoreHome/_siteSelectHeader.twig\" %}
{% endblock %}

{% block content %}

    <script type=\"text/javascript\" charset=\"utf-8\">
        \$(document).ready(function () {
            \$('<div />').insertAfter('.site-without-data').liveWidget({
                interval: 1000,
                onUpdate: function () {
                    // reload page as soon as a visit was detected
                    broadcast.propagateNewPage('date=today');
                },
                dataUrlParams: {
                    module: 'Live',
                    action: 'getLastVisitsStart'
                }
            });
        });
    </script>

    <div class=\"site-without-data\">
        <div piwik-content-block content-title=\"{{ 'SitesManager_SiteWithoutDataTitle'|translate|e('html_attr') }}\">

        <p>
            {{ 'SitesManager_SiteWithoutDataDescription'|translate }} {{ 'Installation_JSTracking_Intro'|translate }}
            {{ 'SitesManager_SiteWithoutDataSetupTracking'|translate('<a href=\"' ~ linkTo({
                'module': 'CoreAdminHome',
                'action': 'trackingCodeGenerator',
            }) ~ '\">', \"</a>\")|raw }}
            <br />
            <br />
            {{ 'SitesManager_SiteWithoutDataMessageDisappears'|translate }}

        </p>

            <div class='trackingHelp'>
                {% if showMatomoLinks %}
                <h3>{{ 'SitesManager_InstallationGuides'|translate }}</h3>
                <p>{{ 'SitesManager_InstallationGuidesIntro'|translate }}

                <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-wordpress/'>WordPress</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-integrate-matomo-with-squarespace-website/'>Squarespace</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-analytics-tracking-code-on-wix/'>Wix</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/how-to-install/faq_19424/'>SharePoint</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-analytics-tracking-code-on-joomla/'>Joomla</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-shopify-store/'>Shopify</a>
                    <br >
                    <br >
                    {{ 'SitesManager_ExtraInformationNeeded'|translate }}
                    <br >
                    Matomo URL: <code piwik-select-on-focus>{{ piwikUrl }}</code>
                    <br >
                    {{ 'SitesManager_EmailInstructionsYourSiteId'|translate('<code piwik-select-on-focus>' ~ idSite ~ '</code>')|raw }}
                    <br >
                </p>
                {% endif %}

                <h3>{{ 'SitesManager_Integrations'|translate }}</h3>

                <p>{{ 'CoreAdminHome_JSTrackingIntro3a'|translate('<a href=\"https://matomo.org/integrate/\" rel=\"noreferrer noopener\" target=\"_blank\">','</a>')|raw }} {{ 'CoreAdminHome_JSTrackingIntro3b'|translate|raw }}</p>

                <div class=\"valign-wrapper trackingHelpHeader\">
                    <div>

                        <h3>{{ 'General_JsTrackingTag'|translate }}</h3>

                        <p>{{ 'CoreAdminHome_JSTracking_CodeNoteBeforeClosingHead'|translate(\"&lt;/head&gt;\")|raw }}</p>
                    </div>
                    <a class=\"btn\" id=\"emailTrackingCodeBtn\"
                       href=\"mailto:?subject={{ 'SitesManager_EmailInstructionsSubject'|translate|url_encode|e('html_attr') }}&body={{ emailBody|url_encode|e('html_attr') }}\">
                        {{ 'SitesManager_EmailInstructionsButton'|translate }}
                    </a>
                </div>

                <pre piwik-select-on-focus>{{ jsTag|raw }}</pre>

                <p>{{ 'CoreAdminHome_JSTrackingIntro5'|translate('<a rel=\"noreferrer noopener\" target=\"_blank\" href=\"https://developer.matomo.org/guides/tracking-javascript-guide\">','</a>')|raw }}</p>

                <p><br />{{ 'CoreAdminHome_JSTracking_EndNote'|translate('<a href=\"' ~ linkTo({'module': 'CoreAdminHome', 'action': 'trackingCodeGenerator'}) ~'\">','</a>')|raw }}
                <br />
                <br />
                    <a href=\"{{ linkTo({module: 'CoreAdminHome', action: 'trackingCodeGenerator'}) }}\"class=\"btn\"><span class=\"icon-configure\"></span> {{ 'SitesManager_CustomizeJavaScriptTracker'|translate }}</a></p>

                <h3>{{ 'SitesManager_LogAnalytics'|translate }}</h3>

                <p>{{ 'SitesManager_LogAnalyticsDescription'|translate('<a href=\"https://matomo.org/log-analytics/\" rel=\"noreferrer noopener\" target=\"_blank\">', '</a>')|raw }}</p>

                <h3>{{ 'SitesManager_MobileAppsAndSDKs'|translate }}</h3>

                <p>{{ 'SitesManager_MobileAppsAndSDKsDescription'|translate('<a href=\"https://matomo.org/integrate/#programming-language-platforms-and-frameworks\" rel=\"noreferrer noopener\" target=\"_blank\">','</a>')|raw }}</p>

                <h3>{{ 'CoreAdminHome_HttpTrackingApi'|translate }}</h3>
                <p>{{ 'CoreAdminHome_HttpTrackingApiDescription'|translate('<a href=\"https://developer.matomo.org/api-reference/tracking-api\" rel=\"noreferrer noopener\" target=\"_blank\">','</a>')|raw }}</p>

                {% if googleAnalyticsImporterMessage is defined %}
                {{ googleAnalyticsImporterMessage|raw }}
                {% endif %}

                {{ postEvent('Template.endTrackingHelpPage') }}

            </div>

            {{ postEvent('Template.siteWithoutData.afterIntro') }}
            <br />
            <br />
            <a href=\"{{ linkTo({module: 'SitesManager', action: 'ignoreNoDataMessage'}) }}\"
               class=\"btn ignoreSitesWithoutData\">{{ 'SitesManager_SiteWithoutDataIgnoreMessage'|translate }}</a>

        </div>

        {{ postEvent('Template.siteWithoutData.afterTrackingHelp') }}
    </div>

{% endblock %}
", "@SitesManager/siteWithoutData.twig", "/home/admin/web/descubriendoargentina.com/public_html/public/matomo/plugins/SitesManager/templates/siteWithoutData.twig");
    }
}
