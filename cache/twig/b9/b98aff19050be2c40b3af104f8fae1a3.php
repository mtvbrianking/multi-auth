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

/* namespace.twig */
class __TwigTemplate_03053f3222de7bbaeef12e7ff320f2a3 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body_class' => [$this, 'block_body_class'],
            'page_id' => [$this, 'block_page_id'],
            'below_menu' => [$this, 'block_below_menu'],
            'page_content' => [$this, 'block_page_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        $macros["__internal_parse_12"] = $this->macros["__internal_parse_12"] = $this->loadTemplate("macros.twig", "namespace.twig", 2)->unwrap();
        // line 1
        $this->parent = $this->loadTemplate("layout/layout.twig", "namespace.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        ((((isset($context["namespace"]) || array_key_exists("namespace", $context) ? $context["namespace"] : (function () { throw new RuntimeError('Variable "namespace" does not exist.', 3, $this->source); })()) == "")) ? (print (twig_escape_filter($this->env, Doctum\Tree::getGlobalNamespaceName(), "html", null, true))) : (print ((isset($context["namespace"]) || array_key_exists("namespace", $context) ? $context["namespace"] : (function () { throw new RuntimeError('Variable "namespace" does not exist.', 3, $this->source); })()))));
        echo " | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 4
    public function block_body_class($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "namespace";
    }

    // line 5
    public function block_page_id($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, ("namespace:" . twig_replace_filter(((((isset($context["namespace"]) || array_key_exists("namespace", $context) ? $context["namespace"] : (function () { throw new RuntimeError('Variable "namespace" does not exist.', 5, $this->source); })()) == "")) ? (Doctum\Tree::getGlobalNamespacePageName()) : ((isset($context["namespace"]) || array_key_exists("namespace", $context) ? $context["namespace"] : (function () { throw new RuntimeError('Variable "namespace" does not exist.', 5, $this->source); })()))), ["\\" => "_"])), "html", null, true);
    }

    // line 7
    public function block_below_menu($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    <div class=\"namespace-breadcrumbs\">
        <ol class=\"breadcrumb\">
            <li><span class=\"label label-default\">";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("Namespace");
        // line 10
        echo "</span></li>
            ";
        // line 11
        echo twig_call_macro($macros["__internal_parse_12"], "macro_breadcrumbs", [(isset($context["namespace"]) || array_key_exists("namespace", $context) ? $context["namespace"] : (function () { throw new RuntimeError('Variable "namespace" does not exist.', 11, $this->source); })())], 11, $context, $this->getSourceContext());
        echo "
        </ol>
    </div>
";
    }

    // line 16
    public function block_page_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 17
        echo "
    <div class=\"page-header\">
        <h1>";
        // line 19
        ((((isset($context["namespace"]) || array_key_exists("namespace", $context) ? $context["namespace"] : (function () { throw new RuntimeError('Variable "namespace" does not exist.', 19, $this->source); })()) == "")) ? (print (twig_escape_filter($this->env, Doctum\Tree::getGlobalNamespaceName(), "html", null, true))) : (print ((isset($context["namespace"]) || array_key_exists("namespace", $context) ? $context["namespace"] : (function () { throw new RuntimeError('Variable "namespace" does not exist.', 19, $this->source); })()))));
        echo "</h1>
    </div>

    ";
        // line 22
        if ((isset($context["subnamespaces"]) || array_key_exists("subnamespaces", $context) ? $context["subnamespaces"] : (function () { throw new RuntimeError('Variable "subnamespaces" does not exist.', 22, $this->source); })())) {
            // line 23
            echo "        <h2>";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("Namespaces");
            echo "</h2>
        <div class=\"namespace-list\">
            ";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["subnamespaces"]) || array_key_exists("subnamespaces", $context) ? $context["subnamespaces"] : (function () { throw new RuntimeError('Variable "subnamespaces" does not exist.', 25, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["ns"]) {
                echo twig_call_macro($macros["__internal_parse_12"], "macro_namespace_link", [$context["ns"]], 25, $context, $this->getSourceContext());
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ns'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "        </div>
    ";
        }
        // line 28
        echo "
    ";
        // line 29
        if ((isset($context["classes"]) || array_key_exists("classes", $context) ? $context["classes"] : (function () { throw new RuntimeError('Variable "classes" does not exist.', 29, $this->source); })())) {
            // line 30
            echo "        <h2>";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("Classes");
            echo "</h2>";
            // line 31
            echo twig_call_macro($macros["__internal_parse_12"], "macro_render_classes", [(isset($context["classes"]) || array_key_exists("classes", $context) ? $context["classes"] : (function () { throw new RuntimeError('Variable "classes" does not exist.', 31, $this->source); })())], 31, $context, $this->getSourceContext());
        }
        // line 33
        echo "
    ";
        // line 34
        if ((isset($context["interfaces"]) || array_key_exists("interfaces", $context) ? $context["interfaces"] : (function () { throw new RuntimeError('Variable "interfaces" does not exist.', 34, $this->source); })())) {
            // line 35
            echo "        <h2>";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("Interfaces");
            echo "</h2>";
            // line 36
            echo twig_call_macro($macros["__internal_parse_12"], "macro_render_classes", [(isset($context["interfaces"]) || array_key_exists("interfaces", $context) ? $context["interfaces"] : (function () { throw new RuntimeError('Variable "interfaces" does not exist.', 36, $this->source); })())], 36, $context, $this->getSourceContext());
        }
        // line 38
        echo "
    ";
        // line 39
        if ((isset($context["functions"]) || array_key_exists("functions", $context) ? $context["functions"] : (function () { throw new RuntimeError('Variable "functions" does not exist.', 39, $this->source); })())) {
            // line 40
            echo "        <h2>";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("Functions");
            echo "</h2>

        <div class=\"container-fluid underlined\">
            ";
            // line 43
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["functions"]) || array_key_exists("functions", $context) ? $context["functions"] : (function () { throw new RuntimeError('Variable "functions" does not exist.', 43, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["function"]) {
                // line 44
                echo "                <div class=\"row\" id=\"function_";
                echo twig_get_attribute($this->env, $this->source, $context["function"], "name", [], "any", false, false, false, 44);
                echo "\">
                    <div class=\"col-md-2 type\">
                        ";
                // line 46
                if (twig_get_attribute($this->env, $this->source, $context["function"], "isStatic", [], "method", false, false, false, 46)) {
                    echo "static";
                }
                // line 47
                echo "                        ";
                if (twig_get_attribute($this->env, $this->source, $context["function"], "isProtected", [], "method", false, false, false, 47)) {
                    echo "protected";
                }
                // line 48
                echo "                        ";
                if (twig_get_attribute($this->env, $this->source, $context["function"], "isPrivate", [], "method", false, false, false, 48)) {
                    echo "private";
                }
                // line 49
                echo "                        ";
                echo twig_call_macro($macros["__internal_parse_12"], "macro_hint_link", [twig_get_attribute($this->env, $this->source, $context["function"], "hint", [], "any", false, false, false, 49)], 49, $context, $this->getSourceContext());
                echo "
                    </div>
                    <div class=\"col-md-8\">
                        ";
                // line 52
                echo twig_get_attribute($this->env, $this->source, $context["function"], "name", [], "any", false, false, false, 52);
                // line 53
                echo twig_call_macro($macros["__internal_parse_12"], "macro_function_parameters_signature", [$context["function"]], 53, $context, $this->getSourceContext());
                // line 54
                echo "<br>
                        ";
                // line 55
                if (twig_get_attribute($this->env, $this->source, $context["function"], "isInternal", [], "method", false, false, false, 55)) {
                    echo "<span class=\"label label-warning\">";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("internal");
                    echo "</span>";
                }
                // line 56
                echo "                        ";
                if (twig_get_attribute($this->env, $this->source, $context["function"], "isDeprecated", [], "method", false, false, false, 56)) {
                    echo "<span class=\"label label-danger\">";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("deprecated");
                    echo "</span>";
                }
                // line 57
                echo "                        ";
                if (twig_get_attribute($this->env, $this->source, $context["function"], "hasSince", [], "method", false, false, false, 57)) {
                    // line 58
                    echo "                            <i>";
                    echo twig_escape_filter($this->env, \Wdes\phpI18nL10n\Launcher::gettext("Since:"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["function"], "getSince", [], "method", false, false, false, 58), "html", null, true);
                    echo "</i>
                            <br>
                        ";
                }
                // line 61
                echo "                        ";
                if ( !twig_get_attribute($this->env, $this->source, $context["function"], "shortdesc", [], "any", false, false, false, 61)) {
                    // line 62
                    echo "                            <p class=\"no-description\">";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("No description");
                    echo "</p>
                        ";
                } else {
                    // line 64
                    echo "                            <p>";
                    echo $this->extensions['Doctum\Renderer\TwigExtension']->markdownToHtml($this->extensions['Doctum\Renderer\TwigExtension']->parseDesc(twig_get_attribute($this->env, $this->source, $context["function"], "shortdesc", [], "any", false, false, false, 64), $context["function"]));
                    echo "</p>";
                }
                // line 66
                echo "                    </div>
                    <div class=\"col-md-2\">
                        <div class=\"location\">";
                // line 69
                if ( !(twig_get_attribute($this->env, $this->source, $context["function"], "namespace", [], "any", false, false, false, 69) === (isset($context["namespace"]) || array_key_exists("namespace", $context) ? $context["namespace"] : (function () { throw new RuntimeError('Variable "namespace" does not exist.', 69, $this->source); })()))) {
                    // line 70
                    echo "<em><a href=\"";
                    echo $this->extensions['Doctum\Renderer\TwigExtension']->pathForFunction($context, $context["function"]);
                    echo "\">";
                    echo $context["function"];
                    echo "</a></em>";
                }
                // line 71
                echo twig_call_macro($macros["__internal_parse_12"], "macro_method_source_link", [$context["function"]], 71, $context, $this->getSourceContext());
                echo "
                        </div>
                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['function'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            echo "        </div>
    ";
        }
        // line 78
        echo "
    ";
        // line 79
        if ((isset($context["exceptions"]) || array_key_exists("exceptions", $context) ? $context["exceptions"] : (function () { throw new RuntimeError('Variable "exceptions" does not exist.', 79, $this->source); })())) {
            // line 80
            echo "        <h2>";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("Exceptions");
            echo "</h2>";
            // line 81
            echo twig_call_macro($macros["__internal_parse_12"], "macro_render_classes", [(isset($context["exceptions"]) || array_key_exists("exceptions", $context) ? $context["exceptions"] : (function () { throw new RuntimeError('Variable "exceptions" does not exist.', 81, $this->source); })())], 81, $context, $this->getSourceContext());
        }
        // line 83
        echo "
";
    }

    public function getTemplateName()
    {
        return "namespace.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  284 => 83,  281 => 81,  277 => 80,  275 => 79,  272 => 78,  268 => 76,  257 => 71,  250 => 70,  248 => 69,  244 => 66,  239 => 64,  233 => 62,  230 => 61,  221 => 58,  218 => 57,  211 => 56,  205 => 55,  202 => 54,  200 => 53,  198 => 52,  191 => 49,  186 => 48,  181 => 47,  177 => 46,  171 => 44,  167 => 43,  160 => 40,  158 => 39,  155 => 38,  152 => 36,  148 => 35,  146 => 34,  143 => 33,  140 => 31,  136 => 30,  134 => 29,  131 => 28,  127 => 26,  118 => 25,  112 => 23,  110 => 22,  104 => 19,  100 => 17,  96 => 16,  88 => 11,  85 => 10,  80 => 8,  76 => 7,  69 => 5,  62 => 4,  53 => 3,  48 => 1,  46 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout/layout.twig\" %}
{% from \"macros.twig\" import breadcrumbs, render_classes, class_link, namespace_link, hint_link, deprecated, function_parameters_signature, method_source_link %}
{% block title %}{{ namespace == '' ? global_namespace_name() : namespace|raw }} | {{ parent() }}{% endblock %}
{% block body_class 'namespace' %}
{% block page_id 'namespace:' ~ ((namespace == '' ? global_namespace_page_name() : namespace)|replace({'\\\\': '_'})) %}

{% block below_menu %}
    <div class=\"namespace-breadcrumbs\">
        <ol class=\"breadcrumb\">
            <li><span class=\"label label-default\">{% trans 'Namespace' %}</span></li>
            {{ breadcrumbs(namespace) }}
        </ol>
    </div>
{% endblock %}

{% block page_content %}

    <div class=\"page-header\">
        <h1>{{ namespace == '' ? global_namespace_name() : namespace|raw }}</h1>
    </div>

    {% if subnamespaces %}
        <h2>{% trans 'Namespaces' %}</h2>
        <div class=\"namespace-list\">
            {% for ns in subnamespaces %}{{ namespace_link(ns) }}{% endfor %}
        </div>
    {% endif %}

    {% if classes %}
        <h2>{% trans 'Classes' %}</h2>
        {{- render_classes(classes) -}}
    {% endif %}

    {% if interfaces %}
        <h2>{% trans 'Interfaces' %}</h2>
        {{- render_classes(interfaces) -}}
    {% endif %}

    {% if functions %}
        <h2>{% trans 'Functions' %}</h2>

        <div class=\"container-fluid underlined\">
            {% for function in functions %}
                <div class=\"row\" id=\"function_{{ function.name|raw }}\">
                    <div class=\"col-md-2 type\">
                        {% if function.isStatic() %}static{% endif %}
                        {% if function.isProtected() %}protected{% endif %}
                        {% if function.isPrivate() %}private{% endif %}
                        {{ hint_link(function.hint) }}
                    </div>
                    <div class=\"col-md-8\">
                        {{ function.name|raw }}
                        {{- function_parameters_signature(function) -}}
                        <br>
                        {% if function.isInternal() %}<span class=\"label label-warning\">{% trans 'internal' %}</span>{% endif %}
                        {% if function.isDeprecated() %}<span class=\"label label-danger\">{% trans 'deprecated' %}</span>{% endif %}
                        {% if function.hasSince() %}
                            <i>{{ 'Since:'|trans }} {{ function.getSince() }}</i>
                            <br>
                        {% endif %}
                        {% if not function.shortdesc %}
                            <p class=\"no-description\">{% trans 'No description' %}</p>
                        {% else %}
                            <p>{{ function.shortdesc|desc(function)|md_to_html }}</p>
                        {%- endif %}
                    </div>
                    <div class=\"col-md-2\">
                        <div class=\"location\">
                        {%- if function.namespace is not same as(namespace) -%}
                            <em><a href=\"{{ function_path(function) }}\">{{ function|raw }}</a></em>
                        {%- endif -%}{{ method_source_link(function) }}
                        </div>
                    </div>
                </div>
            {% endfor %}
        </div>
    {% endif %}

    {% if exceptions %}
        <h2>{% trans 'Exceptions' %}</h2>
        {{- render_classes(exceptions) -}}
    {% endif %}

{% endblock %}
", "namespace.twig", "/home/runner/work/multi-auth/multi-auth/vendor/code-lts/doctum/src/Resources/themes/default/namespace.twig");
    }
}
