<?php

/* layout.twig */
class __TwigTemplate_b25605743061ec99678c7640cd8bc0a03e22b6ab7f47f53707e30f75210dfc44 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'style' => array($this, 'block_style'),
            'content' => array($this, 'block_content'),
            'js' => array($this, 'block_js'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
  <head>
    <title>:: MediaDb : ";
        // line 4
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo " ::</title>
    <link rel=\"stylesheet\" href=\"/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"/css/dashboard.css\">
    <link rel=\"stylesheet\" href=\"/css/bootstrap-notify.css\">
    <style media=\"screen\">
    ";
        // line 9
        $this->displayBlock('style', $context, $blocks);
        // line 10
        echo "    ul.ui-autocomplete {
      z-index: 1100;
    }
    </style>

    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  </head>
  <body>
    <nav class=\"navbar navbar-inverse navbar-fixed-top\">
      <div class=\"container\">
        <div class=\"navbar-header\">
          <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
          <a href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("tvs"), "html", null, true);
        echo "\" class=\"navbar-brand\">MediaDb</a>
        </div>
        <div id=\"navbar\" class=\"navbar-collapse collapse\">
          <ul class=\"nav navbar-nav navbar-left\">
            <li><a href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("tvs"), "html", null, true);
        echo "\">Séries</a></li>
          <li><a href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("movies"), "html", null, true);
        echo "\">Films</a></li>
          </ul>
          <form class=\"navbar-form navbar-left\">
            <input type=\"text\" class=\"form-control\" data-provide=\"typeahead\" placeholder=\"Recherche...\">
          </form>
        </div>
      </div>
    </nav>

    <div class=\"container-fluid\" style=\"padding:0; margin:0px;\">
      <div class='notifications top-right'>
        ";
        // line 45
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('Knlv\Slim\Views\TwigMessages')->getMessages("Flash"));
        foreach ($context['_seq'] as $context["type"] => $context["msg"]) {
            // line 46
            echo "          <div class=\"alert alert-";
            echo twig_escape_filter($this->env, $context["type"], "html", null, true);
            echo "\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            ";
            // line 48
            echo twig_escape_filter($this->env, $context["msg"], "html", null, true);
            echo "
          </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['msg'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "      </div>
      ";
        // line 52
        $this->displayBlock('content', $context, $blocks);
        // line 53
        echo "    </div>
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
    <script src=\"http://localhost:59906/livereload.js\" charset=\"utf-8\"></script>
    <link rel=\"stylesheet\" href=\"http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css\">
    <script src=\"https://code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>
    <script>window.jQuery || document.write('<script src=\"js/vendor/jquery.min.js\"><\\/script>')</script>
    <script src=\"/js/bootstrap.min.js\"></script>
    <script src=\"/js/color-thief.js\" charset=\"utf-8\"></script>
    <script src=\"/js/bootstrap-typeahead.min.js\" charset=\"utf-8\"></script>
    <script type=\"text/javascript\">";
        // line 62
        $this->displayBlock('js', $context, $blocks);
        echo "</script>
    <script type=\"text/javascript\">
    \$(document).ready(function(){
  \t\t\$( \"input.form-control\" ).autocomplete({
  \t\t\tsource: function( request, response ) {
  \t\t\t\t\$.ajax( {
  \t\t\t\t\turl: \"/search\",
            folder: true,
  \t\t\t\t\tdataType: \"json\",
  \t\t\t\t\tdata: {
  \t\t\t\t\t\tid: request.term
  \t\t\t\t\t},
  \t\t\t\t\tsuccess: function( data ) {
  \t\t\t\t\t\tresponse(data);
  \t\t\t\t\t}
  \t\t\t\t});
  \t\t\t},
  \t\t\tminLength: 2,
        select: function( event, ui ) {
          window.location.href = \"/\"+ui.item.type+\"/\"+ui.item.id+\"/\";

        }

  \t\t} );
    });
    </script>
  </body>
</html>
";
    }

    // line 9
    public function block_style($context, array $blocks = array())
    {
    }

    // line 52
    public function block_content($context, array $blocks = array())
    {
    }

    // line 62
    public function block_js($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 62,  156 => 52,  151 => 9,  118 => 62,  107 => 53,  105 => 52,  102 => 51,  93 => 48,  87 => 46,  83 => 45,  69 => 34,  65 => 33,  58 => 29,  37 => 10,  35 => 9,  27 => 4,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"en\">
  <head>
    <title>:: MediaDb : {{title}} ::</title>
    <link rel=\"stylesheet\" href=\"/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"/css/dashboard.css\">
    <link rel=\"stylesheet\" href=\"/css/bootstrap-notify.css\">
    <style media=\"screen\">
    {% block style %}{% endblock %}
    ul.ui-autocomplete {
      z-index: 1100;
    }
    </style>

    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  </head>
  <body>
    <nav class=\"navbar navbar-inverse navbar-fixed-top\">
      <div class=\"container\">
        <div class=\"navbar-header\">
          <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
          <a href=\"{{path_for('tvs')}}\" class=\"navbar-brand\">MediaDb</a>
        </div>
        <div id=\"navbar\" class=\"navbar-collapse collapse\">
          <ul class=\"nav navbar-nav navbar-left\">
            <li><a href=\"{{path_for('tvs')}}\">Séries</a></li>
          <li><a href=\"{{path_for('movies')}}\">Films</a></li>
          </ul>
          <form class=\"navbar-form navbar-left\">
            <input type=\"text\" class=\"form-control\" data-provide=\"typeahead\" placeholder=\"Recherche...\">
          </form>
        </div>
      </div>
    </nav>

    <div class=\"container-fluid\" style=\"padding:0; margin:0px;\">
      <div class='notifications top-right'>
        {% for type,msg in flash('Flash') %}
          <div class=\"alert alert-{{type}}\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            {{ msg }}
          </div>
        {% endfor %}
      </div>
      {% block content %}{% endblock %}
    </div>
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
    <script src=\"http://localhost:59906/livereload.js\" charset=\"utf-8\"></script>
    <link rel=\"stylesheet\" href=\"http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css\">
    <script src=\"https://code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>
    <script>window.jQuery || document.write('<script src=\"js/vendor/jquery.min.js\"><\\/script>')</script>
    <script src=\"/js/bootstrap.min.js\"></script>
    <script src=\"/js/color-thief.js\" charset=\"utf-8\"></script>
    <script src=\"/js/bootstrap-typeahead.min.js\" charset=\"utf-8\"></script>
    <script type=\"text/javascript\">{% block js %}{% endblock %}</script>
    <script type=\"text/javascript\">
    \$(document).ready(function(){
  \t\t\$( \"input.form-control\" ).autocomplete({
  \t\t\tsource: function( request, response ) {
  \t\t\t\t\$.ajax( {
  \t\t\t\t\turl: \"/search\",
            folder: true,
  \t\t\t\t\tdataType: \"json\",
  \t\t\t\t\tdata: {
  \t\t\t\t\t\tid: request.term
  \t\t\t\t\t},
  \t\t\t\t\tsuccess: function( data ) {
  \t\t\t\t\t\tresponse(data);
  \t\t\t\t\t}
  \t\t\t\t});
  \t\t\t},
  \t\t\tminLength: 2,
        select: function( event, ui ) {
          window.location.href = \"/\"+ui.item.type+\"/\"+ui.item.id+\"/\";

        }

  \t\t} );
    });
    </script>
  </body>
</html>
", "layout.twig", "/Users/aurelien/DediMedia-Web/app/views/layout.twig");
    }
}
