<?php

/* tv/tv.twig */
class __TwigTemplate_c748151998df28353b8de8db176e9886f620f58cb250bace9e5a724c4441b2cf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout.twig", "tv/tv.twig", 2);
        $this->blocks = array(
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
        ob_start();
        echo "Series - ";
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 2
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_style($context, array $blocks = array())
    {
        // line 4
        echo "  .series{padding-top:50px}
  .series-container{position:relative;margin-bottom:5px}
  .series-inner{position:relative;background:no-repeat top center; background-size:cover; padding:15px}
  .series-content{padding:30px 15px;color:#ffffff}
  .series-status{position:absolute;top:0;right:30px}
  .series-actions{position:absolute;top:8px;left:30px;z-index:10}
  .search-result{padding-top:30px;padding-bottom:15px;border-bottom:1px solid #eee}
  .search-result.even{background-color:#fbfbfb}
  .search-result:hover{background-color:#eee}
  .search-result img{opacity:.8}
  .search-result:hover img{opacity:1.0}
  .series-content h1,.series-content h3{ margin-top:0px; margin-bottom:5px;}
  .series-content h2{margin-top:15px;}
  .search-result .series-overview{height:120px}
  .firstAired{text-transform: capitalize;}
  .lead, .series-genres {font-size:15px; margin-top:0;}

  .episode-detailed{padding-top:20px}
  .episode-detailed .episode{margin-bottom:10px}
  .episode-detailed .episode-inner{position:relative;background:transparent no-repeat center center;background-size:cover;padding:5px}
  .episode-detailed .episode-content{background-color:rgba(0,0,0,0.5);padding:15px;color:#dedede}
  .episode-detailed .episode-content h3,.episode-detailed .episode-content h4{overflow:hidden;white-space:nowrap;text-overflow:ellipsis}
  .episode-detailed .episode-content h3{margin-top:0}
  .episode-detailed .episode-content h4{padding:5px 0}
  .episode-detailed .episode-status{position:absolute;top:5px;right:40px}
  .episode-detailed .episode-actions{position:absolute;bottom:-20px;padding-left:40px;left:0;right:-40px;z-index:10}
  .episode-detailed,.episode-list{padding-top:20px}
  .episode-detailed .episode-overview,.episode-list .episode-overview{height:60px;overflow:hidden}
  .episode-detailed .episode-content,.episode-list .episode-content{overflow:hidden}
  .episode-list .episode{position:relative}
  .episode-list .episode-status{position:absolute;top:8px;left:30px}
  .episode-list .episode-overview{margin-bottom:20px;height:120px}
  .label-default{ background-color:";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute(($context["palette"] ?? null), 2, array()), "html", null, true);
        echo ";}
  .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover{ background-color:";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute(($context["palette"] ?? null), 2, array()), "html", null, true);
        echo ";}
";
    }

    // line 39
    public function block_content($context, array $blocks = array())
    {
        // line 40
        echo "<div class=\"container-fluid\" style=\"padding:0; margin:0px;\">
  <div class=\"series-container\">
      <div class=\"row\">
        ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["palette"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["color"]) {
            // line 44
            echo "        <div class=\"col-lg-1\" style=\"width:150px; height:150px; background: ";
            echo twig_escape_filter($this->env, $context["color"], "html", null, true);
            echo "; line-height:150px; text-align:center; color:white;\">
          ";
            // line 45
            echo twig_escape_filter($this->env, $context["color"], "html", null, true);
            echo "
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['color'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "      </div>
      <div class=\"series-inner\" style=\"background: linear-gradient(to bottom right, ";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute(($context["palette"] ?? null), 0, array()), "html", null, true);
        echo ",";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["palette"] ?? null), 2, array()), "html", null, true);
        echo ");\">
          <div class=\"series-content\">
            <div class=\"row\">
                <div class=\"col-md-2 col-lg-2\" style=\"text-align:left;\">
                    <img src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute(($context["poster_path"] ?? null), "small", array()), "html", null, true);
        echo "\">
                </div>
                <div class=\"col-md-8 col-lg-8\">
                    <h1 class=\"series-title\">";
        // line 56
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "</h1>
                    <h4 class=\"series-genres\">
                      ";
        // line 58
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["genres"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["key"] => $context["genre"]) {
            // line 59
            echo "                        ";
            echo twig_escape_filter($this->env, $context["genre"], "html", null, true);
            if ( !$this->getAttribute($context["loop"], "last", array())) {
                echo ",";
            }
            // line 60
            echo "                      ";
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
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['genre'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "                    </h4>
                    <div class=\"series-detail\">
                      <h2>Synopsis</h2>
                      <p class=\"lead\">";
        // line 64
        echo twig_escape_filter($this->env, ($context["overview"] ?? null), "html", null, true);
        echo "</p>
                    </div>
                </div>
                <div class=\"col-sm-2 col-md-2 col-lg-2\" style=\"text-align:right;\">
                    <h2>Production</h2>
                    <dl>
                        <dt>Chaîne :</dt>
                        <dd><span class=\"label label-default\">
                            <em>";
        // line 72
        echo twig_escape_filter($this->env, ($context["network"] ?? null), "html", null, true);
        echo "</em>
                        </span></dd>
                        <dt>Première diffusion :</dt>
                        <dd><small class=\"firstAired\">";
        // line 75
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute(($context["firstAired"] ?? null), "date", array()), "l d F Y"), "html", null, true);
        echo "</small></dd>
                        <dt>Diffusée le :</dt>
                        <dd><small>";
        // line 77
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["last_air_date"] ?? null), "l d F Y"), "html", null, true);
        echo "</small></dd>
                        <dt>Notée :</dt>
                        <dd><span class=\"label label-default\">";
        // line 79
        echo twig_escape_filter($this->env, ($context["vote_average"] ?? null), "html", null, true);
        echo "</span></dd>
                    </dl>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-md-12 col-lg-12\">
                  <div class=\"text-right\">
                    <h2>Actions</h2>
                    ";
        // line 87
        if ((($context["config"] ?? null) != null)) {
            // line 88
            echo "
                      ";
            // line 89
            if (($this->getAttribute($this->getAttribute(($context["config"] ?? null), "GUI", array()), "display_show_specials", array()) == 0)) {
                // line 90
                echo "                        <a class=\"btn btn-default\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("paused", array("tvdbId" => $this->getAttribute(($context["external_ids"] ?? null), "tvdb_id", array()), "etat" => 0)), "html", null, true);
                echo "\">
                          <span class=\"glyphicon glyphicon-zoom-in\" aria-hidden=\"true\"></span>
                          Afficher les extras
                        </a>
                      ";
            } else {
                // line 95
                echo "                        <a class=\"btn btn-default\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("paused", array("tvdbId" => $this->getAttribute(($context["external_ids"] ?? null), "tvdb_id", array()), "etat" => 0)), "html", null, true);
                echo "\">
                          <span class=\"glyphicon glyphicon-zoom-out\" aria-hidden=\"true\"></span>
                          Cacher les extras
                        </a>
                      ";
            }
            // line 100
            echo "                      ";
            if (($this->getAttribute(($context["config"] ?? null), "paused", array()) == 1)) {
                // line 101
                echo "                        <a class=\"btn btn-success\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("paused", array("tvdbId" => $this->getAttribute(($context["external_ids"] ?? null), "tvdb_id", array()), "etat" => 0)), "html", null, true);
                echo "\">
                          <span class=\"glyphicon glyphicon-play\" aria-hidden=\"true\"></span>
                          Reprendre
                        </a>
                      ";
            } else {
                // line 106
                echo "                        <a class=\"btn btn-warning\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("paused", array("tvdbId" => $this->getAttribute(($context["external_ids"] ?? null), "tvdb_id", array()), "etat" => 1)), "html", null, true);
                echo "\">
                          <span class=\"glyphicon glyphicon-pause\" aria-hidden=\"true\"></span>
                          Pause
                        </a>
                      ";
            }
            // line 111
            echo "                      <a class=\"btn btn-info\">
                        <span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span>
                        Editer
                      </a>
                      <a class=\"btn btn-danger\" href=\"";
            // line 115
            echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("delete", array("tvdbId" => $this->getAttribute(($context["external_ids"] ?? null), "tvdb_id", array()))), "html", null, true);
            echo "\">
                        <span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span>
                        Retirer
                      </a>
                    ";
        } else {
            // line 120
            echo "                      <a class=\"btn btn-success\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("add", array("tvdbId" => $this->getAttribute(($context["external_ids"] ?? null), "tvdb_id", array()))), "html", null, true);
            echo "\">
                        <span class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></span>
                        Ajouter
                      </a>
                    ";
        }
        // line 125
        echo "                </div>
                </div>
            </div>
          </div>
      </div>
  </div>
<div>
";
        // line 132
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["actors"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["actor"]) {
            // line 133
            echo "    ";
            if ($this->getAttribute($context["loop"], "first", array())) {
                // line 134
                echo "      <h3>Acteurs :</h3>
    ";
            }
            // line 136
            echo "    <img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["actor"], "image", array()), "small", array()), "html", null, true);
            echo "\" alt=\"...\" class=\"img-responsive img-thumbnail\" width=\"100\">
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['actor'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 138
        echo "<div class=\"container-fluid\">
  <ul class=\"nav nav-pills\">
    ";
        // line 140
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["seasons"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["season"]) {
            // line 141
            echo "      ";
            if ((($this->getAttribute($this->getAttribute(($context["config"] ?? null), "GUI", array()), "display_show_specials", array()) == 0) && ($context["key"] == 0))) {
                // line 142
                echo "      ";
            } else {
                // line 143
                echo "        <li ";
                if (($context["key"] == 1)) {
                    echo "class=\"active\"";
                }
                echo ">
          <a data-toggle=\"tab\" href=\"";
                // line 144
                if (($context["key"] == 1)) {
                    echo "#home";
                } else {
                    echo "#season";
                    echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                }
                echo "\">
            ";
                // line 145
                if (($context["key"] == 0)) {
                    echo "Extra";
                } else {
                    echo "Saison ";
                    echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                }
                // line 146
                echo "          </a>
        </li>
      ";
            }
            // line 149
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['season'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 150
        echo "  </ul>
  <div class=\"episode-detailed row\">
    <div class=\"tab-content\">
      ";
        // line 153
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["seasons"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["season"]) {
            // line 154
            echo "        <div id=\"";
            if (($context["key"] == 1)) {
                echo "home";
            } else {
                echo "season";
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            }
            echo "\" class=\"tab-pane ";
            if (($context["key"] == 1)) {
                echo "in active";
            }
            echo "\">
          ";
            // line 155
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["season"]);
            foreach ($context['_seq'] as $context["key"] => $context["ep"]) {
                // line 156
                echo "            <div class=\"episode col-xs-12 col-sm-6 col-md-4\">
              <div class=\"episode-inner\" style=\"background-image:url('";
                // line 157
                if (($this->getAttribute($context["ep"], "thumbnail", array()) != null)) {
                    echo twig_escape_filter($this->env, $this->getAttribute($context["ep"], "thumbnail", array()), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, ($context["fanArt"] ?? null), "html", null, true);
                }
                echo "');\">
                <div class=\"episode-content\">
                  <h3>";
                // line 159
                echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
                echo "</h3>
                  <h4><span class=\"label label-default\">S";
                // line 160
                echo twig_escape_filter($this->env, $this->getAttribute($context["ep"], "season", array()), "html", null, true);
                echo "E";
                echo twig_escape_filter($this->env, $this->getAttribute($context["ep"], "number", array()), "html", null, true);
                echo "</span> ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["ep"], "name", array()), "html", null, true);
                echo "</h4>
                  <h6>";
                // line 161
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($context["ep"], "firstAired", array()), "date", array()), "l d F Y"), "html", null, true);
                echo "</h6>
                  <p class=\"episode-overview\">
                  ";
                // line 163
                if (($this->getAttribute($context["ep"], "overview", array()) != null)) {
                    // line 164
                    echo "                    ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["ep"], "overview", array()), "html", null, true);
                    echo "
                  ";
                } else {
                    // line 166
                    echo "                    Nous ne disposons pas d'un résumé traduit en français.
                  ";
                }
                // line 168
                echo "                  </p>
                </div>
              </div>
            </div>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['ep'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 173
            echo "        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['season'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 175
        echo "    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "tv/tv.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  463 => 175,  456 => 173,  446 => 168,  442 => 166,  436 => 164,  434 => 163,  429 => 161,  421 => 160,  417 => 159,  408 => 157,  405 => 156,  401 => 155,  387 => 154,  383 => 153,  378 => 150,  372 => 149,  367 => 146,  360 => 145,  351 => 144,  344 => 143,  341 => 142,  338 => 141,  334 => 140,  330 => 138,  313 => 136,  309 => 134,  306 => 133,  289 => 132,  280 => 125,  271 => 120,  263 => 115,  257 => 111,  248 => 106,  239 => 101,  236 => 100,  227 => 95,  218 => 90,  216 => 89,  213 => 88,  211 => 87,  200 => 79,  195 => 77,  190 => 75,  184 => 72,  173 => 64,  168 => 61,  154 => 60,  148 => 59,  131 => 58,  126 => 56,  120 => 53,  111 => 49,  108 => 48,  99 => 45,  94 => 44,  90 => 43,  85 => 40,  82 => 39,  76 => 37,  72 => 36,  38 => 4,  35 => 3,  31 => 2,  26 => 1,  11 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% set title %}Series - {{name}}{% endset %}
{% extends \"layout.twig\" %}
{% block style %}
  .series{padding-top:50px}
  .series-container{position:relative;margin-bottom:5px}
  .series-inner{position:relative;background:no-repeat top center; background-size:cover; padding:15px}
  .series-content{padding:30px 15px;color:#ffffff}
  .series-status{position:absolute;top:0;right:30px}
  .series-actions{position:absolute;top:8px;left:30px;z-index:10}
  .search-result{padding-top:30px;padding-bottom:15px;border-bottom:1px solid #eee}
  .search-result.even{background-color:#fbfbfb}
  .search-result:hover{background-color:#eee}
  .search-result img{opacity:.8}
  .search-result:hover img{opacity:1.0}
  .series-content h1,.series-content h3{ margin-top:0px; margin-bottom:5px;}
  .series-content h2{margin-top:15px;}
  .search-result .series-overview{height:120px}
  .firstAired{text-transform: capitalize;}
  .lead, .series-genres {font-size:15px; margin-top:0;}

  .episode-detailed{padding-top:20px}
  .episode-detailed .episode{margin-bottom:10px}
  .episode-detailed .episode-inner{position:relative;background:transparent no-repeat center center;background-size:cover;padding:5px}
  .episode-detailed .episode-content{background-color:rgba(0,0,0,0.5);padding:15px;color:#dedede}
  .episode-detailed .episode-content h3,.episode-detailed .episode-content h4{overflow:hidden;white-space:nowrap;text-overflow:ellipsis}
  .episode-detailed .episode-content h3{margin-top:0}
  .episode-detailed .episode-content h4{padding:5px 0}
  .episode-detailed .episode-status{position:absolute;top:5px;right:40px}
  .episode-detailed .episode-actions{position:absolute;bottom:-20px;padding-left:40px;left:0;right:-40px;z-index:10}
  .episode-detailed,.episode-list{padding-top:20px}
  .episode-detailed .episode-overview,.episode-list .episode-overview{height:60px;overflow:hidden}
  .episode-detailed .episode-content,.episode-list .episode-content{overflow:hidden}
  .episode-list .episode{position:relative}
  .episode-list .episode-status{position:absolute;top:8px;left:30px}
  .episode-list .episode-overview{margin-bottom:20px;height:120px}
  .label-default{ background-color:{{palette.2}};}
  .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover{ background-color:{{palette.2}};}
{% endblock %}
{% block content %}
<div class=\"container-fluid\" style=\"padding:0; margin:0px;\">
  <div class=\"series-container\">
      <div class=\"row\">
        {% for key, color in palette %}
        <div class=\"col-lg-1\" style=\"width:150px; height:150px; background: {{color}}; line-height:150px; text-align:center; color:white;\">
          {{color}}
        </div>
        {% endfor %}
      </div>
      <div class=\"series-inner\" style=\"background: linear-gradient(to bottom right, {{palette.0}},{{palette.2}});\">
          <div class=\"series-content\">
            <div class=\"row\">
                <div class=\"col-md-2 col-lg-2\" style=\"text-align:left;\">
                    <img src=\"{{ poster_path.small}}\">
                </div>
                <div class=\"col-md-8 col-lg-8\">
                    <h1 class=\"series-title\">{{name}}</h1>
                    <h4 class=\"series-genres\">
                      {% for key, genre in genres %}
                        {{genre}}{% if not loop.last %},{% endif %}
                      {% endfor %}
                    </h4>
                    <div class=\"series-detail\">
                      <h2>Synopsis</h2>
                      <p class=\"lead\">{{overview}}</p>
                    </div>
                </div>
                <div class=\"col-sm-2 col-md-2 col-lg-2\" style=\"text-align:right;\">
                    <h2>Production</h2>
                    <dl>
                        <dt>Chaîne :</dt>
                        <dd><span class=\"label label-default\">
                            <em>{{network}}</em>
                        </span></dd>
                        <dt>Première diffusion :</dt>
                        <dd><small class=\"firstAired\">{{firstAired.date|date('l d F Y')}}</small></dd>
                        <dt>Diffusée le :</dt>
                        <dd><small>{{last_air_date|date('l d F Y')}}</small></dd>
                        <dt>Notée :</dt>
                        <dd><span class=\"label label-default\">{{vote_average}}</span></dd>
                    </dl>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-md-12 col-lg-12\">
                  <div class=\"text-right\">
                    <h2>Actions</h2>
                    {% if config != null %}

                      {% if config.GUI.display_show_specials == 0 %}
                        <a class=\"btn btn-default\" href=\"{{ path_for('paused', {'tvdbId': external_ids.tvdb_id,'etat': 0}) }}\">
                          <span class=\"glyphicon glyphicon-zoom-in\" aria-hidden=\"true\"></span>
                          Afficher les extras
                        </a>
                      {% else %}
                        <a class=\"btn btn-default\" href=\"{{ path_for('paused', {'tvdbId': external_ids.tvdb_id,'etat': 0}) }}\">
                          <span class=\"glyphicon glyphicon-zoom-out\" aria-hidden=\"true\"></span>
                          Cacher les extras
                        </a>
                      {% endif %}
                      {% if config.paused == 1%}
                        <a class=\"btn btn-success\" href=\"{{ path_for('paused', {'tvdbId': external_ids.tvdb_id,'etat': 0}) }}\">
                          <span class=\"glyphicon glyphicon-play\" aria-hidden=\"true\"></span>
                          Reprendre
                        </a>
                      {% else %}
                        <a class=\"btn btn-warning\" href=\"{{ path_for('paused', {'tvdbId': external_ids.tvdb_id,'etat': 1}) }}\">
                          <span class=\"glyphicon glyphicon-pause\" aria-hidden=\"true\"></span>
                          Pause
                        </a>
                      {% endif %}
                      <a class=\"btn btn-info\">
                        <span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span>
                        Editer
                      </a>
                      <a class=\"btn btn-danger\" href=\"{{ path_for('delete', {'tvdbId': external_ids.tvdb_id}) }}\">
                        <span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span>
                        Retirer
                      </a>
                    {% else %}
                      <a class=\"btn btn-success\" href=\"{{ path_for('add', {'tvdbId': external_ids.tvdb_id}) }}\">
                        <span class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></span>
                        Ajouter
                      </a>
                    {% endif %}
                </div>
                </div>
            </div>
          </div>
      </div>
  </div>
<div>
{% for actor in actors %}
    {% if loop.first %}
      <h3>Acteurs :</h3>
    {% endif %}
    <img src=\"{{actor.image.small}}\" alt=\"...\" class=\"img-responsive img-thumbnail\" width=\"100\">
{% endfor %}
<div class=\"container-fluid\">
  <ul class=\"nav nav-pills\">
    {% for key, season in seasons %}
      {% if config.GUI.display_show_specials == 0 and key == 0 %}
      {% else %}
        <li {% if key == 1 %}class=\"active\"{% endif %}>
          <a data-toggle=\"tab\" href=\"{% if key == 1 %}#home{% else %}#season{{key}}{% endif %}\">
            {% if key == 0 %}Extra{% else %}Saison {{key}}{% endif %}
          </a>
        </li>
      {% endif %}
    {% endfor %}
  </ul>
  <div class=\"episode-detailed row\">
    <div class=\"tab-content\">
      {% for key, season in seasons %}
        <div id=\"{% if key == 1 %}home{% else %}season{{key}}{% endif %}\" class=\"tab-pane {% if key == 1 %}in active{% endif %}\">
          {% for key, ep in season %}
            <div class=\"episode col-xs-12 col-sm-6 col-md-4\">
              <div class=\"episode-inner\" style=\"background-image:url('{% if ep.thumbnail != null %}{{ep.thumbnail}}{% else %}{{fanArt}}{% endif %}');\">
                <div class=\"episode-content\">
                  <h3>{{name}}</h3>
                  <h4><span class=\"label label-default\">S{{ep.season}}E{{ep.number}}</span> {{ep.name}}</h4>
                  <h6>{{ep.firstAired.date|date(\"l d F Y\")}}</h6>
                  <p class=\"episode-overview\">
                  {% if ep.overview != null %}
                    {{ep.overview}}
                  {% else %}
                    Nous ne disposons pas d'un résumé traduit en français.
                  {% endif %}
                  </p>
                </div>
              </div>
            </div>
          {% endfor %}
        </div>
      {% endfor %}
    </div>
  </div>
</div>
{% endblock %}
", "tv/tv.twig", "/Users/aurelien/DediMedia-Web/app/views/tv/tv.twig");
    }
}
