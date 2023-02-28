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

/* class.twig */
class __TwigTemplate_b8e6e03a8bc371d24d89aa43a65502cc extends Template
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
            'class_signature' => [$this, 'block_class_signature'],
            'method_signature' => [$this, 'block_method_signature'],
            'method_parameters_signature' => [$this, 'block_method_parameters_signature'],
            'parameters' => [$this, 'block_parameters'],
            'return' => [$this, 'block_return'],
            'exceptions' => [$this, 'block_exceptions'],
            'examples' => [$this, 'block_examples'],
            'see' => [$this, 'block_see'],
            'constants' => [$this, 'block_constants'],
            'properties' => [$this, 'block_properties'],
            'methods' => [$this, 'block_methods'],
            'methods_details' => [$this, 'block_methods_details'],
            'method' => [$this, 'block_method'],
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
        $macros["__internal_parse_13"] = $this->macros["__internal_parse_13"] = $this->loadTemplate("macros.twig", "class.twig", 2)->unwrap();
        // line 1
        $this->parent = $this->loadTemplate("layout/layout.twig", "class.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 3, $this->source); })());
        echo " | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 4
    public function block_body_class($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "class";
    }

    // line 5
    public function block_page_id($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, ("class:" . twig_replace_filter(twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 5, $this->source); })()), "name", [], "any", false, false, false, 5), ["\\" => "_"])), "html", null, true);
    }

    // line 7
    public function block_below_menu($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 8, $this->source); })()), "namespace", [], "any", false, false, false, 8)) {
            // line 9
            echo "        <div class=\"namespace-breadcrumbs\">
            <ol class=\"breadcrumb\">
                <li><span class=\"label label-default\">";
            // line 11
            echo twig_call_macro($macros["__internal_parse_13"], "macro_class_category_name", [twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 11, $this->source); })()), "getCategoryId", [], "method", false, false, false, 11)], 11, $context, $this->getSourceContext());
            echo "</span></li>
                ";
            // line 12
            echo twig_call_macro($macros["__internal_parse_13"], "macro_breadcrumbs", [twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 12, $this->source); })()), "namespace", [], "any", false, false, false, 12)], 12, $context, $this->getSourceContext());
            // line 13
            echo "<li>";
            echo twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 13, $this->source); })()), "shortname", [], "any", false, false, false, 13);
            echo "</li>
            </ol>
        </div>
    ";
        }
    }

    // line 19
    public function block_page_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 20
        echo "
    <div class=\"page-header\">
        <h1>";
        // line 23
        echo twig_last($this->env, twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 23, $this->source); })()), "name", [], "any", false, false, false, 23), "\\"));
        // line 24
        echo twig_call_macro($macros["__internal_parse_13"], "macro_deprecated", [(isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 24, $this->source); })())], 24, $context, $this->getSourceContext());
        echo "
            ";
        // line 25
        if (twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 25, $this->source); })()), "isReadOnly", [], "method", false, false, false, 25)) {
            echo "<small><span class=\"label label-primary\">";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("read-only");
            echo "</span></small>";
        }
        // line 26
        echo "</h1>
    </div>

    ";
        // line 29
        if (twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 29, $this->source); })()), "hasSince", [], "method", false, false, false, 29)) {
            // line 30
            echo "        <i>";
            echo twig_escape_filter($this->env, \Wdes\phpI18nL10n\Launcher::gettext("Since:"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 30, $this->source); })()), "getSince", [], "method", false, false, false, 30), "html", null, true);
            echo "</i>
        <br>
    ";
        }
        // line 33
        echo "
    <p>";
        // line 34
        $this->displayBlock("class_signature", $context, $blocks);
        echo "</p>

    ";
        // line 36
        echo twig_call_macro($macros["__internal_parse_13"], "macro_deprecations", [(isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 36, $this->source); })())], 36, $context, $this->getSourceContext());
        echo "
    ";
        // line 37
        echo twig_call_macro($macros["__internal_parse_13"], "macro_internals", [(isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 37, $this->source); })())], 37, $context, $this->getSourceContext());
        echo "

    ";
        // line 39
        if ((twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 39, $this->source); })()), "shortdesc", [], "any", false, false, false, 39) || twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 39, $this->source); })()), "longdesc", [], "any", false, false, false, 39))) {
            // line 40
            echo "        <div class=\"description\">
            ";
            // line 41
            if (twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 41, $this->source); })()), "shortdesc", [], "any", false, false, false, 41)) {
                // line 42
                echo "<p>";
                echo $this->extensions['Doctum\Renderer\TwigExtension']->markdownToHtml($this->extensions['Doctum\Renderer\TwigExtension']->parseDesc(twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 42, $this->source); })()), "shortdesc", [], "any", false, false, false, 42), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 42, $this->source); })())));
                echo "</p>";
            }
            // line 44
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 44, $this->source); })()), "longdesc", [], "any", false, false, false, 44)) {
                // line 45
                echo "<p>";
                echo $this->extensions['Doctum\Renderer\TwigExtension']->markdownToHtml($this->extensions['Doctum\Renderer\TwigExtension']->parseDesc(twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 45, $this->source); })()), "longdesc", [], "any", false, false, false, 45), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 45, $this->source); })())));
                echo "</p>";
            }
            // line 47
            echo "        </div>
    ";
        }
        // line 49
        echo twig_call_macro($macros["__internal_parse_13"], "macro_todos", [(isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 49, $this->source); })())], 49, $context, $this->getSourceContext());
        // line 51
        if ((isset($context["traits"]) || array_key_exists("traits", $context) ? $context["traits"] : (function () { throw new RuntimeError('Variable "traits" does not exist.', 51, $this->source); })())) {
            // line 52
            echo "        <h2>";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("Traits");
            echo "</h2>

        ";
            // line 54
            echo twig_call_macro($macros["__internal_parse_13"], "macro_render_classes", [(isset($context["traits"]) || array_key_exists("traits", $context) ? $context["traits"] : (function () { throw new RuntimeError('Variable "traits" does not exist.', 54, $this->source); })())], 54, $context, $this->getSourceContext());
            echo "
    ";
        }
        // line 56
        echo "
    ";
        // line 57
        if ((isset($context["constants"]) || array_key_exists("constants", $context) ? $context["constants"] : (function () { throw new RuntimeError('Variable "constants" does not exist.', 57, $this->source); })())) {
            // line 58
            echo "        <h2>";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("Constants");
            echo "</h2>";
            // line 60
            $this->displayBlock("constants", $context, $blocks);
            echo "
    ";
        }
        // line 62
        echo "
    ";
        // line 63
        if ((isset($context["properties"]) || array_key_exists("properties", $context) ? $context["properties"] : (function () { throw new RuntimeError('Variable "properties" does not exist.', 63, $this->source); })())) {
            // line 64
            echo "        <h2>";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("Properties");
            echo "</h2>

        ";
            // line 66
            $this->displayBlock("properties", $context, $blocks);
            echo "
    ";
        }
        // line 68
        echo "
    ";
        // line 69
        if ((isset($context["methods"]) || array_key_exists("methods", $context) ? $context["methods"] : (function () { throw new RuntimeError('Variable "methods" does not exist.', 69, $this->source); })())) {
            // line 70
            echo "        <h2>";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("Methods");
            echo "</h2>

        ";
            // line 72
            $this->displayBlock("methods", $context, $blocks);
            echo "

        <h2>";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("Details");
            // line 74
            echo "</h2>

        ";
            // line 76
            $this->displayBlock("methods_details", $context, $blocks);
            echo "
    ";
        }
        // line 78
        echo "
";
    }

    // line 81
    public function block_class_signature($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 82
        if (twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 82, $this->source); })()), "final", [], "any", false, false, false, 82)) {
            echo "final ";
        }
        // line 83
        echo "    ";
        if (( !twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 83, $this->source); })()), "interface", [], "any", false, false, false, 83) && twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 83, $this->source); })()), "abstract", [], "any", false, false, false, 83))) {
            echo "abstract ";
        }
        // line 84
        echo "    ";
        echo twig_call_macro($macros["__internal_parse_13"], "macro_class_category_name", [twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 84, $this->source); })()), "getCategoryId", [], "method", false, false, false, 84)], 84, $context, $this->getSourceContext());
        echo "
    <strong>";
        // line 85
        echo twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 85, $this->source); })()), "shortname", [], "any", false, false, false, 85);
        echo "</strong>";
        // line 86
        if (twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 86, $this->source); })()), "parent", [], "any", false, false, false, 86)) {
            // line 87
            echo "        ";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("extends");
            echo " ";
            echo twig_call_macro($macros["__internal_parse_13"], "macro_class_link", [twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 87, $this->source); })()), "parent", [], "any", false, false, false, 87)], 87, $context, $this->getSourceContext());
        }
        // line 89
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 89, $this->source); })()), "interfaces", [], "any", false, false, false, 89)) > 0)) {
            // line 90
            echo "        ";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("implements");
            // line 91
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 91, $this->source); })()), "interfaces", [], "any", false, false, false, 91));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["interface"]) {
                // line 92
                echo twig_call_macro($macros["__internal_parse_13"], "macro_class_link", [$context["interface"]], 92, $context, $this->getSourceContext());
                // line 93
                if ( !twig_get_attribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 93)) {
                    echo ", ";
                }
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['interface'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 96
        if (twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 96, $this->source); })()), "hasMixins", [], "any", false, false, false, 96)) {
            // line 97
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 97, $this->source); })()), "getMixins", [], "method", false, false, false, 97));
            foreach ($context['_seq'] as $context["_key"] => $context["mixin"]) {
                // line 98
                echo "            <i>mixin</i> ";
                echo twig_call_macro($macros["__internal_parse_13"], "macro_class_link", [twig_get_attribute($this->env, $this->source, $context["mixin"], "class", [], "any", false, false, false, 98)], 98, $context, $this->getSourceContext());
                echo "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mixin'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 101
        echo twig_call_macro($macros["__internal_parse_13"], "macro_source_link", [(isset($context["project"]) || array_key_exists("project", $context) ? $context["project"] : (function () { throw new RuntimeError('Variable "project" does not exist.', 101, $this->source); })()), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 101, $this->source); })())], 101, $context, $this->getSourceContext());
        echo "
";
    }

    // line 104
    public function block_method_signature($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 105
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 105, $this->source); })()), "final", [], "any", false, false, false, 105)) {
            echo "final";
        }
        // line 106
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 106, $this->source); })()), "abstract", [], "any", false, false, false, 106)) {
            echo "abstract";
        }
        // line 107
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 107, $this->source); })()), "static", [], "any", false, false, false, 107)) {
            echo "static";
        }
        // line 108
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 108, $this->source); })()), "protected", [], "any", false, false, false, 108)) {
            echo "protected";
        }
        // line 109
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 109, $this->source); })()), "private", [], "any", false, false, false, 109)) {
            echo "private";
        }
        // line 110
        echo "    ";
        echo twig_call_macro($macros["__internal_parse_13"], "macro_hint_link", [twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 110, $this->source); })()), "hint", [], "any", false, false, false, 110)], 110, $context, $this->getSourceContext());
        echo "
    <strong>";
        // line 111
        echo twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 111, $this->source); })()), "name", [], "any", false, false, false, 111);
        echo "</strong>";
        $this->displayBlock("method_parameters_signature", $context, $blocks);
    }

    // line 114
    public function block_method_parameters_signature($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 115
        $macros["__internal_parse_14"] = $this->loadTemplate("macros.twig", "class.twig", 115)->unwrap();
        // line 116
        echo twig_call_macro($macros["__internal_parse_14"], "macro_method_parameters_signature", [(isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 116, $this->source); })())], 116, $context, $this->getSourceContext());
        echo "
    ";
        // line 117
        echo twig_call_macro($macros["__internal_parse_13"], "macro_deprecated", [(isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 117, $this->source); })())], 117, $context, $this->getSourceContext());
    }

    // line 120
    public function block_parameters($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 121
        echo "    <table class=\"table table-condensed\">
        ";
        // line 122
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 122, $this->source); })()), "parameters", [], "any", false, false, false, 122));
        foreach ($context['_seq'] as $context["_key"] => $context["parameter"]) {
            // line 123
            echo "            <tr>
                <td>";
            // line 124
            if (twig_get_attribute($this->env, $this->source, $context["parameter"], "hint", [], "any", false, false, false, 124)) {
                echo twig_call_macro($macros["__internal_parse_13"], "macro_hint_link", [twig_get_attribute($this->env, $this->source, $context["parameter"], "hint", [], "any", false, false, false, 124)], 124, $context, $this->getSourceContext());
            }
            echo "</td>
                <td>";
            // line 125
            if (twig_get_attribute($this->env, $this->source, $context["parameter"], "variadic", [], "any", false, false, false, 125)) {
                echo "...";
            }
            echo "\$";
            echo twig_get_attribute($this->env, $this->source, $context["parameter"], "name", [], "any", false, false, false, 125);
            echo "</td>
                <td>";
            // line 126
            echo $this->extensions['Doctum\Renderer\TwigExtension']->markdownToHtml($this->extensions['Doctum\Renderer\TwigExtension']->parseDesc(twig_get_attribute($this->env, $this->source, $context["parameter"], "shortdesc", [], "any", false, false, false, 126), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 126, $this->source); })())));
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['parameter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 129
        echo "    </table>
";
    }

    // line 132
    public function block_return($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 133
        echo "    <table class=\"table table-condensed\">
        <tr>
            <td>";
        // line 135
        echo twig_call_macro($macros["__internal_parse_13"], "macro_hint_link", [twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 135, $this->source); })()), "hint", [], "any", false, false, false, 135)], 135, $context, $this->getSourceContext());
        echo "</td>
            <td>";
        // line 136
        echo $this->extensions['Doctum\Renderer\TwigExtension']->markdownToHtml($this->extensions['Doctum\Renderer\TwigExtension']->parseDesc(twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 136, $this->source); })()), "hintDesc", [], "any", false, false, false, 136), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 136, $this->source); })())));
        echo "</td>
        </tr>
    </table>
";
    }

    // line 141
    public function block_exceptions($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 142
        echo "    <table class=\"table table-condensed\">
        ";
        // line 143
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 143, $this->source); })()), "exceptions", [], "any", false, false, false, 143));
        foreach ($context['_seq'] as $context["_key"] => $context["exception"]) {
            // line 144
            echo "            <tr>
                <td>";
            // line 145
            echo twig_call_macro($macros["__internal_parse_13"], "macro_class_link", [twig_get_attribute($this->env, $this->source, $context["exception"], 0, [], "array", false, false, false, 145)], 145, $context, $this->getSourceContext());
            echo "</td>
                <td>";
            // line 146
            echo $this->extensions['Doctum\Renderer\TwigExtension']->markdownToHtml($this->extensions['Doctum\Renderer\TwigExtension']->parseDesc(twig_get_attribute($this->env, $this->source, $context["exception"], 1, [], "array", false, false, false, 146), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 146, $this->source); })())));
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['exception'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 149
        echo "    </table>
";
    }

    // line 152
    public function block_examples($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 153
        echo "    <table class=\"table table-condensed\">
        ";
        // line 154
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 154, $this->source); })()), "getExamples", [], "method", false, false, false, 154));
        foreach ($context['_seq'] as $context["_key"] => $context["example"]) {
            // line 155
            echo "            <tr>
                <td><pre class=\"examples\">";
            // line 157
            echo twig_nl2br(twig_escape_filter($this->env, twig_join_filter($context["example"], " "), "html", null, true));
            // line 158
            echo "</pre></td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['example'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 161
        echo "    </table>
";
    }

    // line 164
    public function block_see($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 165
        echo "    <table class=\"table table-condensed\">
        ";
        // line 166
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 166, $this->source); })()), "getSee", [], "method", false, false, false, 166));
        foreach ($context['_seq'] as $context["_key"] => $context["see"]) {
            // line 167
            echo "            <tr>
                <td>
                    ";
            // line 169
            if (twig_get_attribute($this->env, $this->source, $context["see"], 4, [], "array", false, false, false, 169)) {
                // line 170
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["see"], 4, [], "array", false, false, false, 170), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["see"], 4, [], "array", false, false, false, 170), "html", null, true);
                echo "</a>
                    ";
            } elseif (twig_get_attribute($this->env, $this->source,             // line 171
$context["see"], 3, [], "array", false, false, false, 171)) {
                // line 172
                echo "                        ";
                echo twig_call_macro($macros["__internal_parse_13"], "macro_method_link", [twig_get_attribute($this->env, $this->source, $context["see"], 3, [], "array", false, false, false, 172), false, false], 172, $context, $this->getSourceContext());
                echo "
                    ";
            } elseif (twig_get_attribute($this->env, $this->source,             // line 173
$context["see"], 2, [], "array", false, false, false, 173)) {
                // line 174
                echo "                        ";
                echo twig_call_macro($macros["__internal_parse_13"], "macro_class_link", [twig_get_attribute($this->env, $this->source, $context["see"], 2, [], "array", false, false, false, 174)], 174, $context, $this->getSourceContext());
                echo "
                    ";
            } else {
                // line 176
                echo "                        ";
                echo twig_get_attribute($this->env, $this->source, $context["see"], 0, [], "array", false, false, false, 176);
                echo "
                    ";
            }
            // line 178
            echo "                </td>
                <td>";
            // line 179
            echo twig_get_attribute($this->env, $this->source, $context["see"], 1, [], "array", false, false, false, 179);
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['see'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 182
        echo "    </table>
";
    }

    // line 185
    public function block_constants($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 186
        echo "    <table class=\"table table-condensed\">
        ";
        // line 187
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["constants"]) || array_key_exists("constants", $context) ? $context["constants"] : (function () { throw new RuntimeError('Variable "constants" does not exist.', 187, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["constant"]) {
            // line 188
            echo "            <tr>
                <td>
                    ";
            // line 191
            echo "                    ";
            // line 192
            echo "                    ";
            if (twig_get_attribute($this->env, $this->source, $context["constant"], "isPrivate", [], "method", false, false, false, 192)) {
                echo "private
                    ";
            } elseif (twig_get_attribute($this->env, $this->source,             // line 193
$context["constant"], "isProtected", [], "method", false, false, false, 193)) {
                echo "protected";
            }
            // line 194
            echo "                    ";
            if (twig_get_attribute($this->env, $this->source, $context["constant"], "isInternal", [], "method", false, false, false, 194)) {
                echo "<span class=\"label label-warning\">";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("internal");
                echo "</span>";
            }
            // line 195
            echo "                    ";
            if (twig_get_attribute($this->env, $this->source, $context["constant"], "isDeprecated", [], "method", false, false, false, 195)) {
                echo "<span class=\"label label-danger\">";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("deprecated");
                echo "</span>";
            }
            // line 196
            echo "                    ";
            echo twig_get_attribute($this->env, $this->source, $context["constant"], "name", [], "any", false, false, false, 196);
            echo "
                    ";
            // line 197
            if (twig_get_attribute($this->env, $this->source, $context["constant"], "hasSince", [], "method", false, false, false, 197)) {
                // line 198
                echo "                        <i>";
                echo twig_escape_filter($this->env, \Wdes\phpI18nL10n\Launcher::gettext("Since:"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["constant"], "getSince", [], "method", false, false, false, 198), "html", null, true);
                echo "</i>
                        <br>
                    ";
            }
            // line 201
            echo "                </td>
                <td class=\"last\">
                    <p><em>";
            // line 203
            echo $this->extensions['Doctum\Renderer\TwigExtension']->markdownToHtml($this->extensions['Doctum\Renderer\TwigExtension']->parseDesc(twig_get_attribute($this->env, $this->source, $context["constant"], "shortdesc", [], "any", false, false, false, 203), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 203, $this->source); })())));
            echo "</em></p>
                    <p>";
            // line 204
            echo $this->extensions['Doctum\Renderer\TwigExtension']->markdownToHtml($this->extensions['Doctum\Renderer\TwigExtension']->parseDesc(twig_get_attribute($this->env, $this->source, $context["constant"], "longdesc", [], "any", false, false, false, 204), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 204, $this->source); })())));
            echo "</p>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['constant'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 208
        echo "    </table>
";
    }

    // line 211
    public function block_properties($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 212
        echo "    <table class=\"table table-condensed\">
        ";
        // line 213
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["properties"]) || array_key_exists("properties", $context) ? $context["properties"] : (function () { throw new RuntimeError('Variable "properties" does not exist.', 213, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["property"]) {
            // line 214
            echo "            <tr>
                <td class=\"type\" id=\"property_";
            // line 215
            echo twig_get_attribute($this->env, $this->source, $context["property"], "name", [], "any", false, false, false, 215);
            echo "\">
                    ";
            // line 216
            if (twig_get_attribute($this->env, $this->source, $context["property"], "isStatic", [], "method", false, false, false, 216)) {
                echo "static";
            }
            // line 217
            echo "                    ";
            if (twig_get_attribute($this->env, $this->source, $context["property"], "isProtected", [], "method", false, false, false, 217)) {
                echo "protected";
            }
            // line 218
            echo "                    ";
            if (twig_get_attribute($this->env, $this->source, $context["property"], "isPrivate", [], "method", false, false, false, 218)) {
                echo "private";
            }
            // line 219
            echo "                    ";
            echo twig_call_macro($macros["__internal_parse_13"], "macro_hint_link", [twig_get_attribute($this->env, $this->source, $context["property"], "hint", [], "any", false, false, false, 219)], 219, $context, $this->getSourceContext());
            echo "
                    ";
            // line 220
            if (twig_get_attribute($this->env, $this->source, $context["property"], "isInternal", [], "method", false, false, false, 220)) {
                echo "<span class=\"label label-warning\">";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("internal");
                echo "</span>";
            }
            // line 221
            echo "                    ";
            if (twig_get_attribute($this->env, $this->source, $context["property"], "isDeprecated", [], "method", false, false, false, 221)) {
                echo "<span class=\"label label-danger\">";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("deprecated");
                echo "</span>";
            }
            // line 222
            echo "                    ";
            if (twig_get_attribute($this->env, $this->source, $context["property"], "isReadOnly", [], "method", false, false, false, 222)) {
                echo "<span class=\"label label-primary\">";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("read-only");
                echo "</span>";
            }
            // line 223
            echo "                    ";
            if (twig_get_attribute($this->env, $this->source, $context["property"], "isWriteOnly", [], "method", false, false, false, 223)) {
                echo "<span class=\"label label-success\">";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("write-only");
                echo "</span>";
            }
            // line 224
            echo "
                    ";
            // line 225
            if (twig_get_attribute($this->env, $this->source, $context["property"], "hasSince", [], "method", false, false, false, 225)) {
                // line 226
                echo "                        <i>";
                echo twig_escape_filter($this->env, \Wdes\phpI18nL10n\Launcher::gettext("Since:"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["property"], "getSince", [], "method", false, false, false, 226), "html", null, true);
                echo "</i>
                        <br>
                    ";
            }
            // line 229
            echo "                </td>
                <td>\$";
            // line 230
            echo twig_get_attribute($this->env, $this->source, $context["property"], "name", [], "any", false, false, false, 230);
            echo "</td>
                <td class=\"last\">";
            // line 231
            echo $this->extensions['Doctum\Renderer\TwigExtension']->markdownToHtml($this->extensions['Doctum\Renderer\TwigExtension']->parseDesc(twig_get_attribute($this->env, $this->source, $context["property"], "shortdesc", [], "any", false, false, false, 231), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 231, $this->source); })())));
            echo "</td>
                <td>";
            // line 233
            if ( !(twig_get_attribute($this->env, $this->source, $context["property"], "class", [], "any", false, false, false, 233) === (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 233, $this->source); })()))) {
                // line 234
                echo "<small>";
                echo twig_sprintf(\Wdes\phpI18nL10n\Launcher::gettext("from&nbsp;%s"), twig_call_macro($macros["__internal_parse_13"], "macro_property_link", [$context["property"], false, true], 234, $context, $this->getSourceContext()));
                echo "</small>";
            }
            // line 236
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['property'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 239
        echo "    </table>
";
    }

    // line 242
    public function block_methods($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 243
        echo "    <div class=\"container-fluid underlined\">
        ";
        // line 244
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["methods"]) || array_key_exists("methods", $context) ? $context["methods"] : (function () { throw new RuntimeError('Variable "methods" does not exist.', 244, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["method"]) {
            // line 245
            echo "            <div class=\"row\">
                <div class=\"col-md-2 type\">
                    ";
            // line 247
            if (twig_get_attribute($this->env, $this->source, $context["method"], "static", [], "any", false, false, false, 247)) {
                echo "static&nbsp;";
            }
            echo twig_call_macro($macros["__internal_parse_13"], "macro_hint_link", [twig_get_attribute($this->env, $this->source, $context["method"], "hint", [], "any", false, false, false, 247)], 247, $context, $this->getSourceContext());
            echo "
                </div>
                <div class=\"col-md-8\">
                    <a href=\"#method_";
            // line 250
            echo twig_get_attribute($this->env, $this->source, $context["method"], "name", [], "any", false, false, false, 250);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["method"], "name", [], "any", false, false, false, 250);
            echo "</a>";
            $this->displayBlock("method_parameters_signature", $context, $blocks);
            echo "
                    ";
            // line 251
            if ( !twig_get_attribute($this->env, $this->source, $context["method"], "shortdesc", [], "any", false, false, false, 251)) {
                // line 252
                echo "                        <p class=\"no-description\">";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("No description");
                echo "</p>
                    ";
            } else {
                // line 254
                echo "                        <p>";
                echo $this->extensions['Doctum\Renderer\TwigExtension']->markdownToHtml($this->extensions['Doctum\Renderer\TwigExtension']->parseDesc(twig_get_attribute($this->env, $this->source, $context["method"], "shortdesc", [], "any", false, false, false, 254), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 254, $this->source); })())));
                echo "</p>";
            }
            // line 256
            echo "                </div>
                <div class=\"col-md-2\">";
            // line 258
            if ( !(twig_get_attribute($this->env, $this->source, $context["method"], "class", [], "any", false, false, false, 258) === (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 258, $this->source); })()))) {
                // line 259
                echo "<small>";
                echo twig_sprintf(\Wdes\phpI18nL10n\Launcher::gettext("from&nbsp;%s"), twig_call_macro($macros["__internal_parse_13"], "macro_method_link", [$context["method"], false, true], 259, $context, $this->getSourceContext()));
                echo "</small>";
            }
            // line 261
            echo "</div>
            </div>
        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['method'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 264
        echo "    </div>
";
    }

    // line 267
    public function block_methods_details($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 268
        echo "    <div id=\"method-details\">
        ";
        // line 269
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["methods"]) || array_key_exists("methods", $context) ? $context["methods"] : (function () { throw new RuntimeError('Variable "methods" does not exist.', 269, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["method"]) {
            // line 270
            echo "            <div class=\"method-item\">
                ";
            // line 271
            $this->displayBlock("method", $context, $blocks);
            echo "
            </div>
        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['method'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 274
        echo "    </div>
";
    }

    // line 277
    public function block_method($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 278
        echo "    <h3 id=\"method_";
        echo twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 278, $this->source); })()), "name", [], "any", false, false, false, 278);
        echo "\">
        <div class=\"location\">";
        // line 279
        if ( !(twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 279, $this->source); })()), "class", [], "any", false, false, false, 279) === (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 279, $this->source); })()))) {
            echo twig_sprintf(\Wdes\phpI18nL10n\Launcher::gettext("in %s"), twig_call_macro($macros["__internal_parse_13"], "macro_method_link", [(isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 279, $this->source); })()), false, true], 279, $context, $this->getSourceContext()));
            echo " ";
        }
        echo twig_call_macro($macros["__internal_parse_13"], "macro_method_source_link", [(isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 279, $this->source); })())], 279, $context, $this->getSourceContext());
        echo "</div>
        <code>";
        // line 280
        $this->displayBlock("method_signature", $context, $blocks);
        echo "</code>
    </h3>
    <div class=\"details\">";
        // line 283
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 283, $this->source); })()), "hasSince", [], "method", false, false, false, 283)) {
            // line 284
            echo "<i>";
            echo twig_escape_filter($this->env, \Wdes\phpI18nL10n\Launcher::gettext("Since:"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 284, $this->source); })()), "getSince", [], "method", false, false, false, 284), "html", null, true);
            echo "</i>
            <br>";
        }
        // line 287
        echo twig_call_macro($macros["__internal_parse_13"], "macro_deprecations", [(isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 287, $this->source); })())], 287, $context, $this->getSourceContext());
        echo "
        ";
        // line 288
        echo twig_call_macro($macros["__internal_parse_13"], "macro_internals", [(isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 288, $this->source); })())], 288, $context, $this->getSourceContext());
        echo "

        <div class=\"method-description\">
            ";
        // line 291
        if (( !twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 291, $this->source); })()), "shortdesc", [], "any", false, false, false, 291) &&  !twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 291, $this->source); })()), "longdesc", [], "any", false, false, false, 291))) {
            // line 292
            echo "                <p class=\"no-description\">";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("No description");
            echo "</p>
            ";
        } else {
            // line 294
            echo "                ";
            if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 294, $this->source); })()), "shortdesc", [], "any", false, false, false, 294)) {
                // line 295
                echo "<p>";
                echo $this->extensions['Doctum\Renderer\TwigExtension']->markdownToHtml($this->extensions['Doctum\Renderer\TwigExtension']->parseDesc(twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 295, $this->source); })()), "shortdesc", [], "any", false, false, false, 295), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 295, $this->source); })())));
                echo "</p>";
            }
            // line 297
            echo "                ";
            if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 297, $this->source); })()), "longdesc", [], "any", false, false, false, 297)) {
                // line 298
                echo "<p>";
                echo $this->extensions['Doctum\Renderer\TwigExtension']->markdownToHtml($this->extensions['Doctum\Renderer\TwigExtension']->parseDesc(twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 298, $this->source); })()), "longdesc", [], "any", false, false, false, 298), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 298, $this->source); })())));
                echo "</p>";
            }
        }
        // line 301
        echo twig_call_macro($macros["__internal_parse_13"], "macro_todos", [(isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 301, $this->source); })())], 301, $context, $this->getSourceContext());
        // line 302
        echo "</div>
        <div class=\"tags\">
            ";
        // line 304
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 304, $this->source); })()), "parameters", [], "any", false, false, false, 304)) {
            // line 305
            echo "                <h4>";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("Parameters");
            echo "</h4>

                ";
            // line 307
            $this->displayBlock("parameters", $context, $blocks);
            echo "
            ";
        }
        // line 309
        echo "
            ";
        // line 310
        if ((twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 310, $this->source); })()), "hintDesc", [], "any", false, false, false, 310) || twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 310, $this->source); })()), "hint", [], "any", false, false, false, 310))) {
            // line 311
            echo "                <h4>";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("Return Value");
            echo "</h4>

                ";
            // line 313
            $this->displayBlock("return", $context, $blocks);
            echo "
            ";
        }
        // line 315
        echo "
            ";
        // line 316
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 316, $this->source); })()), "exceptions", [], "any", false, false, false, 316)) {
            // line 317
            echo "                <h4>";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("Exceptions");
            echo "</h4>

                ";
            // line 319
            $this->displayBlock("exceptions", $context, $blocks);
            echo "
            ";
        }
        // line 321
        echo "
            ";
        // line 322
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 322, $this->source); })()), "tags", [0 => "see"], "method", false, false, false, 322)) {
            // line 323
            echo "                <h4>";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("See also");
            echo "</h4>

                ";
            // line 325
            $this->displayBlock("see", $context, $blocks);
            echo "
            ";
        }
        // line 327
        echo "
            ";
        // line 328
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 328, $this->source); })()), "hasExamples", [], "method", false, false, false, 328)) {
            // line 329
            echo "                <h4>";
echo \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("Examples");
            echo "</h4>

                ";
            // line 331
            $this->displayBlock("examples", $context, $blocks);
            echo "
            ";
        }
        // line 333
        echo "        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "class.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1077 => 333,  1072 => 331,  1066 => 329,  1064 => 328,  1061 => 327,  1056 => 325,  1050 => 323,  1048 => 322,  1045 => 321,  1040 => 319,  1034 => 317,  1032 => 316,  1029 => 315,  1024 => 313,  1018 => 311,  1016 => 310,  1013 => 309,  1008 => 307,  1002 => 305,  1000 => 304,  996 => 302,  994 => 301,  988 => 298,  985 => 297,  980 => 295,  977 => 294,  971 => 292,  969 => 291,  963 => 288,  959 => 287,  951 => 284,  949 => 283,  944 => 280,  936 => 279,  931 => 278,  927 => 277,  922 => 274,  905 => 271,  902 => 270,  885 => 269,  882 => 268,  878 => 267,  873 => 264,  857 => 261,  852 => 259,  850 => 258,  847 => 256,  842 => 254,  836 => 252,  834 => 251,  826 => 250,  817 => 247,  813 => 245,  796 => 244,  793 => 243,  789 => 242,  784 => 239,  776 => 236,  771 => 234,  769 => 233,  765 => 231,  761 => 230,  758 => 229,  749 => 226,  747 => 225,  744 => 224,  737 => 223,  730 => 222,  723 => 221,  717 => 220,  712 => 219,  707 => 218,  702 => 217,  698 => 216,  694 => 215,  691 => 214,  687 => 213,  684 => 212,  680 => 211,  675 => 208,  665 => 204,  661 => 203,  657 => 201,  648 => 198,  646 => 197,  641 => 196,  634 => 195,  627 => 194,  623 => 193,  618 => 192,  616 => 191,  612 => 188,  608 => 187,  605 => 186,  601 => 185,  596 => 182,  587 => 179,  584 => 178,  578 => 176,  572 => 174,  570 => 173,  565 => 172,  563 => 171,  556 => 170,  554 => 169,  550 => 167,  546 => 166,  543 => 165,  539 => 164,  534 => 161,  526 => 158,  524 => 157,  521 => 155,  517 => 154,  514 => 153,  510 => 152,  505 => 149,  496 => 146,  492 => 145,  489 => 144,  485 => 143,  482 => 142,  478 => 141,  470 => 136,  466 => 135,  462 => 133,  458 => 132,  453 => 129,  444 => 126,  436 => 125,  430 => 124,  427 => 123,  423 => 122,  420 => 121,  416 => 120,  412 => 117,  408 => 116,  406 => 115,  402 => 114,  396 => 111,  391 => 110,  386 => 109,  381 => 108,  376 => 107,  371 => 106,  367 => 105,  363 => 104,  357 => 101,  347 => 98,  342 => 97,  340 => 96,  323 => 93,  321 => 92,  303 => 91,  300 => 90,  298 => 89,  292 => 87,  290 => 86,  287 => 85,  282 => 84,  277 => 83,  273 => 82,  269 => 81,  264 => 78,  259 => 76,  255 => 74,  249 => 72,  243 => 70,  241 => 69,  238 => 68,  233 => 66,  227 => 64,  225 => 63,  222 => 62,  217 => 60,  213 => 58,  211 => 57,  208 => 56,  203 => 54,  197 => 52,  195 => 51,  193 => 49,  189 => 47,  184 => 45,  181 => 44,  176 => 42,  174 => 41,  171 => 40,  169 => 39,  164 => 37,  160 => 36,  155 => 34,  152 => 33,  143 => 30,  141 => 29,  136 => 26,  130 => 25,  126 => 24,  124 => 23,  120 => 20,  116 => 19,  106 => 13,  104 => 12,  100 => 11,  96 => 9,  93 => 8,  89 => 7,  82 => 5,  75 => 4,  66 => 3,  61 => 1,  59 => 2,  52 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout/layout.twig\" %}
{% from \"macros.twig\" import render_classes, breadcrumbs, namespace_link, class_link, property_link, method_link, hint_link, source_link, method_source_link, deprecated, deprecations, internals, todo, todos, class_category_name %}
{% block title %}{{ class|raw }} | {{ parent() }}{% endblock %}
{% block body_class 'class' %}
{% block page_id 'class:' ~ (class.name|replace({'\\\\': '_'})) %}

{% block below_menu %}
    {% if class.namespace %}
        <div class=\"namespace-breadcrumbs\">
            <ol class=\"breadcrumb\">
                <li><span class=\"label label-default\">{{ class_category_name(class.getCategoryId()) }}</span></li>
                {{ breadcrumbs(class.namespace) -}}
                <li>{{ class.shortname|raw }}</li>
            </ol>
        </div>
    {% endif %}
{% endblock %}

{% block page_content %}

    <div class=\"page-header\">
        <h1>
            {{- class.name|split('\\\\')|last|raw -}}
            {{- deprecated(class) }}
            {% if class.isReadOnly() %}<small><span class=\"label label-primary\">{% trans 'read-only' %}</span></small>{% endif -%}
        </h1>
    </div>

    {% if class.hasSince() %}
        <i>{{ 'Since:'|trans }} {{ class.getSince() }}</i>
        <br>
    {% endif %}

    <p>{{ block('class_signature') }}</p>

    {{ deprecations(class) }}
    {{ internals(class) }}

    {% if class.shortdesc or class.longdesc %}
        <div class=\"description\">
            {% if class.shortdesc -%}
                <p>{{ class.shortdesc|desc(class)|md_to_html }}</p>
            {%- endif %}
            {% if class.longdesc -%}
                <p>{{ class.longdesc|desc(class)|md_to_html }}</p>
            {%- endif %}
        </div>
    {% endif %}
    {{- todos(class) -}}

    {% if traits %}
        <h2>{% trans 'Traits' %}</h2>

        {{ render_classes(traits) }}
    {% endif %}

    {% if constants %}
        <h2>{% trans 'Constants' %}</h2>

        {{- block('constants') }}
    {% endif %}

    {% if properties %}
        <h2>{% trans 'Properties' %}</h2>

        {{ block('properties') }}
    {% endif %}

    {% if methods %}
        <h2>{% trans 'Methods' %}</h2>

        {{ block('methods') }}

        <h2>{% trans 'Details' %}</h2>

        {{ block('methods_details') }}
    {% endif %}

{% endblock %}

{% block class_signature -%}
    {% if class.final %}final {% endif %}
    {% if not class.interface and class.abstract %}abstract {% endif %}
    {{ class_category_name(class.getCategoryId()) }}
    <strong>{{ class.shortname|raw }}</strong>
    {%- if class.parent %}
        {% trans 'extends' %} {{ class_link(class.parent) }}
    {%- endif %}
    {%- if class.interfaces|length > 0 %}
        {% trans 'implements' %}
        {% for interface in class.interfaces %}
            {{- class_link(interface) }}
            {%- if not loop.last %}, {% endif %}
        {%- endfor %}
    {%- endif %}
    {%- if class.hasMixins %}
        {% for mixin in class.getMixins() %}
            <i>mixin</i> {{ class_link(mixin.class) }}
        {% endfor %}
    {%- endif %}
    {{- source_link(project, class) }}
{% endblock %}

{% block method_signature -%}
    {% if method.final %}final{% endif %}
    {% if method.abstract %}abstract{% endif %}
    {% if method.static %}static{% endif %}
    {% if method.protected %}protected{% endif %}
    {% if method.private %}private{% endif %}
    {{ hint_link(method.hint) }}
    <strong>{{ method.name|raw }}</strong>{{ block('method_parameters_signature') }}
{%- endblock %}

{% block method_parameters_signature -%}
    {%- from \"macros.twig\" import method_parameters_signature -%}
    {{ method_parameters_signature(method) }}
    {{ deprecated(method) }}
{%- endblock %}

{% block parameters %}
    <table class=\"table table-condensed\">
        {% for parameter in method.parameters %}
            <tr>
                <td>{% if parameter.hint %}{{ hint_link(parameter.hint) }}{% endif %}</td>
                <td>{%- if parameter.variadic %}...{% endif %}\${{ parameter.name|raw }}</td>
                <td>{{ parameter.shortdesc|desc(class)|md_to_html }}</td>
            </tr>
        {% endfor %}
    </table>
{% endblock %}

{% block return %}
    <table class=\"table table-condensed\">
        <tr>
            <td>{{ hint_link(method.hint) }}</td>
            <td>{{ method.hintDesc|desc(class)|md_to_html }}</td>
        </tr>
    </table>
{% endblock %}

{% block exceptions %}
    <table class=\"table table-condensed\">
        {% for exception in method.exceptions %}
            <tr>
                <td>{{ class_link(exception[0]) }}</td>
                <td>{{ exception[1]|desc(class)|md_to_html }}</td>
            </tr>
        {% endfor %}
    </table>
{% endblock %}

{% block examples %}
    <table class=\"table table-condensed\">
        {% for example in method.getExamples() %}
            <tr>
                <td><pre class=\"examples\">
                    {{- example|join(' ')|nl2br -}}
                </pre></td>
            </tr>
        {% endfor %}
    </table>
{% endblock %}

{% block see %}
    <table class=\"table table-condensed\">
        {% for see in method.getSee() %}
            <tr>
                <td>
                    {% if see[4] %}
                        <a href=\"{{see[4]}}\">{{see[4]}}</a>
                    {% elseif see[3] %}
                        {{ method_link(see[3], false, false) }}
                    {% elseif see[2] %}
                        {{ class_link(see[2]) }}
                    {% else %}
                        {{ see[0]|raw }}
                    {% endif %}
                </td>
                <td>{{ see[1]|raw }}</td>
            </tr>
        {% endfor %}
    </table>
{% endblock %}

{% block constants %}
    <table class=\"table table-condensed\">
        {% for constant in constants %}
            <tr>
                <td>
                    {# Keep in order with an else if, it can be set by typehints and by annotations #}
                    {# More restricted wins #}
                    {% if constant.isPrivate() %}private
                    {% elseif constant.isProtected() %}protected{% endif %}
                    {% if constant.isInternal() %}<span class=\"label label-warning\">{% trans 'internal' %}</span>{% endif %}
                    {% if constant.isDeprecated() %}<span class=\"label label-danger\">{% trans 'deprecated' %}</span>{% endif %}
                    {{ constant.name|raw }}
                    {% if constant.hasSince() %}
                        <i>{{ 'Since:'|trans }} {{ constant.getSince() }}</i>
                        <br>
                    {% endif %}
                </td>
                <td class=\"last\">
                    <p><em>{{ constant.shortdesc|desc(class)|md_to_html }}</em></p>
                    <p>{{ constant.longdesc|desc(class)|md_to_html }}</p>
                </td>
            </tr>
        {% endfor %}
    </table>
{% endblock %}

{% block properties %}
    <table class=\"table table-condensed\">
        {% for property in properties %}
            <tr>
                <td class=\"type\" id=\"property_{{ property.name|raw }}\">
                    {% if property.isStatic() %}static{% endif %}
                    {% if property.isProtected() %}protected{% endif %}
                    {% if property.isPrivate() %}private{% endif %}
                    {{ hint_link(property.hint) }}
                    {% if property.isInternal() %}<span class=\"label label-warning\">{% trans 'internal' %}</span>{% endif %}
                    {% if property.isDeprecated() %}<span class=\"label label-danger\">{% trans 'deprecated' %}</span>{% endif %}
                    {% if property.isReadOnly() %}<span class=\"label label-primary\">{% trans 'read-only' %}</span>{% endif %}
                    {% if property.isWriteOnly() %}<span class=\"label label-success\">{% trans 'write-only' %}</span>{% endif %}

                    {% if property.hasSince() %}
                        <i>{{ 'Since:'|trans }} {{ property.getSince() }}</i>
                        <br>
                    {% endif %}
                </td>
                <td>\${{ property.name|raw }}</td>
                <td class=\"last\">{{ property.shortdesc|desc(class)|md_to_html }}</td>
                <td>
                    {%- if property.class is not same as(class) -%}
                        <small>{{ 'from&nbsp;%s'|trans|format(property_link(property, false, true))|raw }}</small>
                    {%- endif -%}
                </td>
            </tr>
        {% endfor %}
    </table>
{% endblock %}

{% block methods %}
    <div class=\"container-fluid underlined\">
        {% for method in methods %}
            <div class=\"row\">
                <div class=\"col-md-2 type\">
                    {% if method.static %}static&nbsp;{% endif %}{{ hint_link(method.hint) }}
                </div>
                <div class=\"col-md-8\">
                    <a href=\"#method_{{ method.name|raw }}\">{{ method.name|raw }}</a>{{ block('method_parameters_signature') }}
                    {% if not method.shortdesc %}
                        <p class=\"no-description\">{% trans 'No description' %}</p>
                    {% else %}
                        <p>{{ method.shortdesc|desc(class)|md_to_html }}</p>
                    {%- endif %}
                </div>
                <div class=\"col-md-2\">
                    {%- if method.class is not same as(class) -%}
                        <small>{{ 'from&nbsp;%s'|trans|format(method_link(method, false, true))|raw }}</small>
                    {%- endif -%}
                </div>
            </div>
        {% endfor %}
    </div>
{% endblock %}

{% block methods_details %}
    <div id=\"method-details\">
        {% for method in methods %}
            <div class=\"method-item\">
                {{ block('method') }}
            </div>
        {% endfor %}
    </div>
{% endblock %}

{% block method %}
    <h3 id=\"method_{{ method.name|raw }}\">
        <div class=\"location\">{% if method.class is not same as(class) %}{{ 'in %s'|trans|format(method_link(method, false, true))|raw }} {% endif %}{{ method_source_link(method) }}</div>
        <code>{{ block('method_signature') }}</code>
    </h3>
    <div class=\"details\">
        {%- if method.hasSince() -%}
            <i>{{ 'Since:'|trans }} {{ method.getSince() }}</i>
            <br>
        {%- endif -%}
        {{ deprecations(method) }}
        {{ internals(method) }}

        <div class=\"method-description\">
            {% if not method.shortdesc and not method.longdesc %}
                <p class=\"no-description\">{% trans 'No description' %}</p>
            {% else %}
                {% if method.shortdesc -%}
                <p>{{ method.shortdesc|desc(class)|md_to_html }}</p>
                {%- endif %}
                {% if method.longdesc -%}
                <p>{{ method.longdesc|desc(class)|md_to_html }}</p>
                {%- endif %}
            {%- endif %}
            {{- todos(method) -}}
        </div>
        <div class=\"tags\">
            {% if method.parameters %}
                <h4>{% trans 'Parameters' %}</h4>

                {{ block('parameters') }}
            {% endif %}

            {% if method.hintDesc or method.hint %}
                <h4>{% trans 'Return Value' %}</h4>

                {{ block('return') }}
            {% endif %}

            {% if method.exceptions %}
                <h4>{% trans 'Exceptions' %}</h4>

                {{ block('exceptions') }}
            {% endif %}

            {% if method.tags('see') %}
                <h4>{% trans 'See also' %}</h4>

                {{ block('see') }}
            {% endif %}

            {% if method.hasExamples() %}
                <h4>{% trans 'Examples' %}</h4>

                {{ block('examples') }}
            {% endif %}
        </div>
    </div>
{% endblock %}
", "class.twig", "/home/runner/work/multi-auth/multi-auth/vendor/code-lts/doctum/src/Resources/themes/default/class.twig");
    }
}
