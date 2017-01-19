<?php

/* tv/home.twig */
class __TwigTemplate_e8d22aab3da2ac7eeb132a6b8813d0428aa54c1b4a5186951fb6f71dd9cd31a8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout.twig", "tv/home.twig", 2);
        $this->blocks = array(
            'js' => array($this, 'block_js'),
            'style' => array($this, 'block_style'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["title"] = "Séries";
        // line 2
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_js($context, array $blocks = array())
    {
        // line 4
        echo "\$(document).ready(function(){
    \$('[data-toggle=\"tooltip\"]').tooltip();
});
";
    }

    // line 8
    public function block_style($context, array $blocks = array())
    {
        // line 9
        echo "  .thumbnail{display:block;padding:4px;margin-bottom:20px;line-height:1.42857143;background-color:#fff;border:1px solid #ddd;border-radius:4px;-webkit-transition:all .2s ease-in-out;transition:all .2s ease-in-out}
  .thumbnail>img,.thumbnail a>img{margin-right:auto;margin-left:auto}
  a.thumbnail:hover,a.thumbnail:focus,a.thumbnail.active{border-color:#428bca}
  .thumbnail .caption{padding:9px;color:#333}
";
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "<div class=\"row\" style=\"text-align: center; display: table-row;\">
  ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tvs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["tv"]) {
            // line 17
            echo "    <div class=\"col-md-2 col-sm-4 col-xs-4 posters\">
      <a href=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("tv", array("tvdbId" => $this->getAttribute($context["tv"], "indexerid", array()))), "html", null, true);
            echo "\"  class=\"thumbnail\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Voir la serie ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["tv"], "show_name", array()), "html", null, true);
            echo "\">
        <img src=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["tv"], "banner", array()), "small", array()), "html", null, true);
            echo "\" alt=\"Vignette de ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["tv"], "show_name", array()), "html", null, true);
            echo "\" id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["tv"], "indexerid", array()), "html", null, true);
            echo "\">
        <div class=\"progress\">
          ";
            // line 21
            $context["pourcent"] = (($this->getAttribute($this->getAttribute($this->getAttribute($context["tv"], "stats", array()), "downloaded", array()), "total", array()) / $this->getAttribute($this->getAttribute($context["tv"], "stats", array()), "total", array())) * 100);
            // line 22
            echo "          <div class=\"progress-bar progress-bar-success progress-bar-striped\" role=\"progressbar\" aria-valuenow=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["tv"], "stats", array()), "total", array()), "html", null, true);
            echo "\" aria-valuemin=\"0\" aria-valuemax=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["tv"], "stats", array()), "downloaded", array()), "total", array()), "html", null, true);
            echo "\" style=\"width:";
            echo twig_escape_filter($this->env, twig_round(($context["pourcent"] ?? null)), "html", null, true);
            echo "%;\">
            <span class=\"sr-only\">";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["tv"], "stats", array()), "total", array()), "html", null, true);
            echo "% Complete (success)</span>
          </div>
        </div>
      </a>
    </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tv'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "tv/home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 29,  93 => 23,  84 => 22,  82 => 21,  73 => 19,  67 => 18,  64 => 17,  60 => 16,  57 => 15,  54 => 14,  46 => 9,  43 => 8,  36 => 4,  33 => 3,  29 => 2,  27 => 1,  11 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% set title = \"Séries\" %}
{% extends \"layout.twig\" %}
{% block js %}
\$(document).ready(function(){
    \$('[data-toggle=\"tooltip\"]').tooltip();
});
{% endblock %}
{% block style %}
  .thumbnail{display:block;padding:4px;margin-bottom:20px;line-height:1.42857143;background-color:#fff;border:1px solid #ddd;border-radius:4px;-webkit-transition:all .2s ease-in-out;transition:all .2s ease-in-out}
  .thumbnail>img,.thumbnail a>img{margin-right:auto;margin-left:auto}
  a.thumbnail:hover,a.thumbnail:focus,a.thumbnail.active{border-color:#428bca}
  .thumbnail .caption{padding:9px;color:#333}
{% endblock %}
{% block content %}
<div class=\"row\" style=\"text-align: center; display: table-row;\">
  {% for tv in tvs %}
    <div class=\"col-md-2 col-sm-4 col-xs-4 posters\">
      <a href=\"{{ path_for('tv', {'tvdbId': tv.indexerid}) }}\"  class=\"thumbnail\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Voir la serie {{tv.show_name}}\">
        <img src=\"{{ tv.banner.small}}\" alt=\"Vignette de {{tv.show_name}}\" id=\"{{tv.indexerid}}\">
        <div class=\"progress\">
          {% set pourcent = tv.stats.downloaded.total/tv.stats.total*100 %}
          <div class=\"progress-bar progress-bar-success progress-bar-striped\" role=\"progressbar\" aria-valuenow=\"{{ tv.stats.total}}\" aria-valuemin=\"0\" aria-valuemax=\"{{ tv.stats.downloaded.total}}\" style=\"width:{{pourcent|round}}%;\">
            <span class=\"sr-only\">{{ tv.stats.total}}% Complete (success)</span>
          </div>
        </div>
      </a>
    </div>
  {% endfor %}
</div>
{% endblock %}
", "tv/home.twig", "/Users/aurelien/DediMedia-Web/app/views/tv/home.twig");
    }
}
