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

/* @Installation/layout.twig */
class __TwigTemplate_0573db6569a2e7ae6fb0a1382d8e2b8ea59c02bba3fbaaa74ffe7aab0566dc4f extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html id=\"ng-app\" ng-app=\"piwikApp\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"robots\" content=\"noindex,nofollow\">
    <meta name=\"google\" content=\"notranslate\">
    <title>Matomo ";
        // line 7
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["piwikVersion"]) || array_key_exists("piwikVersion", $context) ? $context["piwikVersion"] : (function () { throw new RuntimeError('Variable "piwikVersion" does not exist.', 7, $this->source); })()), "html", null, true);
        echo " &rsaquo; ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["Installation_Installation"]), "html", null, true);
        echo "</title>

    <link rel=\"stylesheet\" type=\"text/css\" href=\"index.php?module=Installation&action=getInstallationCss\"/>
    <script type=\"text/javascript\" src=\"index.php?module=Installation&action=getInstallationJs\"></script>

    <link rel=\"shortcut icon\" href=\"plugins/CoreHome/images/favicon.png\"/>
</head>
<body ng-app=\"app\" id=\"installation\">
<div class=\"container\">

    <div class=\"header\">
        <div class=\"logo\">
            <img title=\"Matomo ";
        // line 19
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["piwikVersion"]) || array_key_exists("piwikVersion", $context) ? $context["piwikVersion"] : (function () { throw new RuntimeError('Variable "piwikVersion" does not exist.', 19, $this->source); })()), "html", null, true);
        echo " - ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["General_OpenSourceWebAnalytics"]), "html_attr");
        echo "\" src=\"plugins/Morpheus/images/logo.png\"/>
            <p>";
        // line 20
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["General_OpenSourceWebAnalytics"]), "html", null, true);
        echo "</p>
        </div>
        <div class=\"language-selector\">
            ";
        // line 23
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), ["Template.topBar"]);
        echo "
        </div>

        <div class=\"installation-progress\">
            <h4>
                ";
        // line 28
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["Installation_InstallationStatus"]), "html", null, true);
        echo "
                <small>";
        // line 29
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["percentDone"]) || array_key_exists("percentDone", $context) ? $context["percentDone"] : (function () { throw new RuntimeError('Variable "percentDone" does not exist.', 29, $this->source); })()), "html", null, true);
        echo "%</small>
            </h4>
            <div class=\"progress\">
                <div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ";
        // line 32
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["percentDone"]) || array_key_exists("percentDone", $context) ? $context["percentDone"] : (function () { throw new RuntimeError('Variable "percentDone" does not exist.', 32, $this->source); })()), "html", null, true);
        echo "%;\"></div>
            </div>
        </div>

        <div class=\"clearfix\"></div>
    </div>

    <div class=\"row\">
        <div class=\"col s3\">
            <ul class=\"list-group\">
                ";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["allStepsTitle"]) || array_key_exists("allStepsTitle", $context) ? $context["allStepsTitle"] : (function () { throw new RuntimeError('Variable "allStepsTitle" does not exist.', 42, $this->source); })()));
        foreach ($context['_seq'] as $context["stepId"] => $context["stepName"]) {
            // line 43
            echo "                    ";
            if ((1 === twig_compare((isset($context["currentStepId"]) || array_key_exists("currentStepId", $context) ? $context["currentStepId"] : (function () { throw new RuntimeError('Variable "currentStepId" does not exist.', 43, $this->source); })()), $context["stepId"]))) {
                // line 44
                echo "                        ";
                $context["stepClass"] = "disabled";
                // line 45
                echo "                    ";
            } elseif ((0 === twig_compare((isset($context["currentStepId"]) || array_key_exists("currentStepId", $context) ? $context["currentStepId"] : (function () { throw new RuntimeError('Variable "currentStepId" does not exist.', 45, $this->source); })()), $context["stepId"]))) {
                // line 46
                echo "                        ";
                $context["stepClass"] = "active";
                // line 47
                echo "                    ";
            } else {
                // line 48
                echo "                        ";
                $context["stepClass"] = "";
                // line 49
                echo "                    ";
            }
            // line 50
            echo "                    <li class=\"list-group-item ";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["stepClass"]) || array_key_exists("stepClass", $context) ? $context["stepClass"] : (function () { throw new RuntimeError('Variable "stepClass" does not exist.', 50, $this->source); })()), "html", null, true);
            echo "\">";
            echo \Piwik\piwik_escape_filter($this->env, ($context["stepId"] + 1), "html", null, true);
            echo ". ";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), [$context["stepName"]]), "html", null, true);
            echo "</li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['stepId'], $context['stepName'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "            </ul>
        </div>
        <div class=\"col s9 content\">
            ";
        // line 55
        ob_start();
        // line 56
        echo "                <p class=\"next-step\">
                    <a class=\"btn\" href=\"";
        // line 57
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), [["action" => (isset($context["nextModuleName"]) || array_key_exists("nextModuleName", $context) ? $context["nextModuleName"] : (function () { throw new RuntimeError('Variable "nextModuleName" does not exist.', 57, $this->source); })()), "token_auth" => null, "method" => null]]), "html", null, true);
        echo "\">
                        ";
        // line 58
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["General_Next"]), "html", null, true);
        echo " &raquo;</a>
                </p>
            ";
        $context["nextButton"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 61
        echo "            ";
        if ((array_key_exists("showNextStepAtTop", $context) && (isset($context["showNextStepAtTop"]) || array_key_exists("showNextStepAtTop", $context) ? $context["showNextStepAtTop"] : (function () { throw new RuntimeError('Variable "showNextStepAtTop" does not exist.', 61, $this->source); })()))) {
            // line 62
            echo "                ";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["nextButton"]) || array_key_exists("nextButton", $context) ? $context["nextButton"] : (function () { throw new RuntimeError('Variable "nextButton" does not exist.', 62, $this->source); })()), "html", null, true);
            echo "
            ";
        }
        // line 64
        echo "
            ";
        // line 65
        $this->displayBlock('content', $context, $blocks);
        // line 66
        echo "
            ";
        // line 67
        if ((isset($context["showNextStep"]) || array_key_exists("showNextStep", $context) ? $context["showNextStep"] : (function () { throw new RuntimeError('Variable "showNextStep" does not exist.', 67, $this->source); })())) {
            // line 68
            echo "                ";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["nextButton"]) || array_key_exists("nextButton", $context) ? $context["nextButton"] : (function () { throw new RuntimeError('Variable "nextButton" does not exist.', 68, $this->source); })()), "html", null, true);
            echo "
            ";
        }
        // line 70
        echo "        </div>
    </div>

</div>

<div id=\"should-get-hidden\"
     style=\"color: red;margin-left: 16px;margin-bottom: 16px;font-weight:bold;font-size: 20px\">
    <p class=\"should-get-hidden-by-js\">
        ";
        // line 78
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreHome_JsDidntLoad"]), "html", null, true);
        echo "
    </p>
    <p class=\"should-get-hidden-by-css\">
        ";
        // line 81
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreHome_CssDidntLoad"]), "html", null, true);
        echo "
    </p>
</div>
";
        // line 84
        $this->loadTemplate("@CoreHome/_adblockDetect.twig", "@Installation/layout.twig", 84)->display($context);
        // line 85
        echo "</body>
</html>
";
    }

    // line 65
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "@Installation/layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  219 => 65,  213 => 85,  211 => 84,  205 => 81,  199 => 78,  189 => 70,  183 => 68,  181 => 67,  178 => 66,  176 => 65,  173 => 64,  167 => 62,  164 => 61,  158 => 58,  154 => 57,  151 => 56,  149 => 55,  144 => 52,  131 => 50,  128 => 49,  125 => 48,  122 => 47,  119 => 46,  116 => 45,  113 => 44,  110 => 43,  106 => 42,  93 => 32,  87 => 29,  83 => 28,  75 => 23,  69 => 20,  63 => 19,  46 => 7,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html id=\"ng-app\" ng-app=\"piwikApp\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"robots\" content=\"noindex,nofollow\">
    <meta name=\"google\" content=\"notranslate\">
    <title>Matomo {{ piwikVersion }} &rsaquo; {{ 'Installation_Installation'|translate }}</title>

    <link rel=\"stylesheet\" type=\"text/css\" href=\"index.php?module=Installation&action=getInstallationCss\"/>
    <script type=\"text/javascript\" src=\"index.php?module=Installation&action=getInstallationJs\"></script>

    <link rel=\"shortcut icon\" href=\"plugins/CoreHome/images/favicon.png\"/>
</head>
<body ng-app=\"app\" id=\"installation\">
<div class=\"container\">

    <div class=\"header\">
        <div class=\"logo\">
            <img title=\"Matomo {{ piwikVersion }} - {{ 'General_OpenSourceWebAnalytics'|translate|escape('html_attr') }}\" src=\"plugins/Morpheus/images/logo.png\"/>
            <p>{{ 'General_OpenSourceWebAnalytics'|translate }}</p>
        </div>
        <div class=\"language-selector\">
            {{ postEvent('Template.topBar')|raw }}
        </div>

        <div class=\"installation-progress\">
            <h4>
                {{ 'Installation_InstallationStatus'|translate }}
                <small>{{ percentDone }}%</small>
            </h4>
            <div class=\"progress\">
                <div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: {{ percentDone }}%;\"></div>
            </div>
        </div>

        <div class=\"clearfix\"></div>
    </div>

    <div class=\"row\">
        <div class=\"col s3\">
            <ul class=\"list-group\">
                {% for stepId,stepName in allStepsTitle %}
                    {% if currentStepId > stepId %}
                        {% set stepClass = 'disabled' %}
                    {% elseif currentStepId == stepId %}
                        {% set stepClass = 'active' %}
                    {% else %}
                        {% set stepClass = '' %}
                    {% endif %}
                    <li class=\"list-group-item {{ stepClass }}\">{{ stepId + 1 }}. {{ stepName|translate }}</li>
                {% endfor %}
            </ul>
        </div>
        <div class=\"col s9 content\">
            {% set nextButton %}
                <p class=\"next-step\">
                    <a class=\"btn\" href=\"{{ linkTo({'action':nextModuleName, 'token_auth':null, 'method':null }) }}\">
                        {{ 'General_Next'|translate }} &raquo;</a>
                </p>
            {% endset %}
            {% if showNextStepAtTop is defined and showNextStepAtTop %}
                {{ nextButton }}
            {% endif %}

            {% block content %}{% endblock %}

            {% if showNextStep %}
                {{ nextButton }}
            {% endif %}
        </div>
    </div>

</div>

<div id=\"should-get-hidden\"
     style=\"color: red;margin-left: 16px;margin-bottom: 16px;font-weight:bold;font-size: 20px\">
    <p class=\"should-get-hidden-by-js\">
        {{ 'CoreHome_JsDidntLoad'|translate }}
    </p>
    <p class=\"should-get-hidden-by-css\">
        {{ 'CoreHome_CssDidntLoad'|translate }}
    </p>
</div>
{% include \"@CoreHome/_adblockDetect.twig\" %}
</body>
</html>
", "@Installation/layout.twig", "/home/admin/web/descubriendoargentina.com/public_html/public/matomo/plugins/Installation/templates/layout.twig");
    }
}
