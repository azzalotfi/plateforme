<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* home/index.html.twig */
class __TwigTemplate_be0ffc76239628d0a207e95af47b72a7 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "home/index.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Bibliothèque";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "<div class=\"container mt-4\">
    ";
        // line 8
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 8, $this->source); })()), "flashes", [], "any", false, false, false, 8));
        foreach ($context['_seq'] as $context["message_type"] => $context["messages"]) {
            // line 9
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 10
                yield "            <div class=\"alert alert-";
                yield ((($context["message_type"] == "error")) ? ("danger") : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message_type"], "html", null, true)));
                yield "\">
                ";
                // line 11
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            yield "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['message_type'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        yield "
    ";
        // line 17
        yield "    <div class=\"jumbotron bg-light p-5 rounded shadow-sm mb-4\">
        <h1 class=\"display-4\">Bienvenue à la Bibliothèque</h1>
        <p class=\"lead\">Parcourez notre collection de livres et empruntez ceux qui vous intéressent.</p>
        <hr class=\"my-4\">
        
        ";
        // line 23
        yield "        ";
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 24
            yield "            <p>Bonjour ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 24, $this->source); })()), "user", [], "any", false, false, false, 24), "nom", [], "any", false, false, false, 24), "html", null, true);
            yield "! Vous êtes connecté.</p>
            
            ";
            // line 26
            if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 26, $this->source); })()), "user", [], "any", false, false, false, 26), "emprunts", [], "any", false, false, false, 26))) {
                // line 27
                yield "                <div class=\"alert alert-info mb-3\">
                    Vous avez actuellement ";
                // line 28
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 28, $this->source); })()), "user", [], "any", false, false, false, 28), "emprunts", [], "any", false, false, false, 28)), "html", null, true);
                yield " livre(s) emprunté(s).
                    <a href=\"";
                // line 29
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_account");
                yield "\" class=\"alert-link\">Voir mes emprunts</a>
                </div>
            ";
            }
            // line 32
            yield "            
            <div class=\"d-flex gap-2\">
                <a class=\"btn btn-primary\" href=\"";
            // line 34
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livre_index");
            yield "\">Parcourir les livres</a>
                <a class=\"btn btn-success\" href=\"";
            // line 35
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_account");
            yield "\">Mon compte</a>
                <a class=\"btn btn-outline-secondary\" href=\"";
            // line 36
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            yield "\">Se déconnecter</a>
            </div>
        ";
        } else {
            // line 39
            yield "            <p>Connectez-vous pour emprunter des livres ou créez un compte.</p>
            <div class=\"d-flex gap-2\">
                <a class=\"btn btn-primary\" href=\"";
            // line 41
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\">Se connecter</a>
                <a class=\"btn btn-outline-secondary\" href=\"";
            // line 42
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
            yield "\">S'inscrire</a>
            </div>
        ";
        }
        // line 45
        yield "    </div>

    ";
        // line 48
        yield "    <div class=\"card mb-5 shadow-sm\">
        <div class=\"card-header bg-primary text-white\">
            <h2 class=\"h5 mb-0\">Rechercher un livre</h2>
        </div>
        <div class=\"card-body\">
            ";
        // line 53
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["search_form"]) || array_key_exists("search_form", $context) ? $context["search_form"] : (function () { throw new RuntimeError('Variable "search_form" does not exist.', 53, $this->source); })()), 'form_start');
        yield "
            <div class=\"row\">
                <div class=\"col-md-4 mb-3\">
                    ";
        // line 56
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["search_form"]) || array_key_exists("search_form", $context) ? $context["search_form"] : (function () { throw new RuntimeError('Variable "search_form" does not exist.', 56, $this->source); })()), "titre", [], "any", false, false, false, 56), 'row');
        yield "
                </div>
                <div class=\"col-md-4 mb-3\">
                    ";
        // line 59
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["search_form"]) || array_key_exists("search_form", $context) ? $context["search_form"] : (function () { throw new RuntimeError('Variable "search_form" does not exist.', 59, $this->source); })()), "auteur", [], "any", false, false, false, 59), 'row');
        yield "
                </div>
                <div class=\"col-md-4 mb-3\">
                    ";
        // line 62
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["search_form"]) || array_key_exists("search_form", $context) ? $context["search_form"] : (function () { throw new RuntimeError('Variable "search_form" does not exist.', 62, $this->source); })()), "genre", [], "any", false, false, false, 62), 'row');
        yield "
                </div>
            </div>
            <div class=\"text-center\">
                ";
        // line 66
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["search_form"]) || array_key_exists("search_form", $context) ? $context["search_form"] : (function () { throw new RuntimeError('Variable "search_form" does not exist.', 66, $this->source); })()), "rechercher", [], "any", false, false, false, 66), 'row');
        yield "
            </div>
            ";
        // line 68
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["search_form"]) || array_key_exists("search_form", $context) ? $context["search_form"] : (function () { throw new RuntimeError('Variable "search_form" does not exist.', 68, $this->source); })()), 'form_end');
        yield "
        </div>
    </div>

    ";
        // line 73
        yield "    <div class=\"row mb-4\">
        <div class=\"col-12\">
            <h2 class=\"border-bottom pb-2 mb-4\">Livres Populaires</h2>
        </div>
        
        ";
        // line 78
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["livres_populaires"]) || array_key_exists("livres_populaires", $context) ? $context["livres_populaires"] : (function () { throw new RuntimeError('Variable "livres_populaires" does not exist.', 78, $this->source); })()))) {
            // line 79
            yield "            <div class=\"col-12\">
                <div class=\"alert alert-info\">
                    Aucun livre disponible pour le moment.
                </div>
            </div>
        ";
        } else {
            // line 85
            yield "            ";
            // line 86
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["livres_populaires"]) || array_key_exists("livres_populaires", $context) ? $context["livres_populaires"] : (function () { throw new RuntimeError('Variable "livres_populaires" does not exist.', 86, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["livre"]) {
                // line 87
                yield "                <div class=\"col-md-6 col-lg-4 mb-4\">
                    <div class=\"card h-100 shadow-sm\">
                        <div class=\"card-header bg-light\">
                            <h5 class=\"card-title mb-0 text-truncate\">";
                // line 90
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "titre", [], "any", false, false, false, 90), "html", null, true);
                yield "</h5>
                        </div>
                        <div class=\"card-body\">
                            <p class=\"card-text\"><strong>Auteur:</strong> ";
                // line 93
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "auteur", [], "any", false, false, false, 93), "nom", [], "any", false, false, false, 93), "html", null, true);
                yield "</p>
                            <p class=\"card-text\"><strong>Genre:</strong> ";
                // line 94
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "genre", [], "any", false, false, false, 94), "nom", [], "any", false, false, false, 94), "html", null, true);
                yield "</p>
                            <p class=\"card-text\">
                                ";
                // line 96
                if (CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "disponible", [], "any", false, false, false, 96)) {
                    // line 97
                    yield "                                    <span class=\"badge bg-success\">Disponible</span>
                                ";
                } else {
                    // line 99
                    yield "                                    <span class=\"badge bg-danger\">Indisponible</span>
                                ";
                }
                // line 101
                yield "                            </p>
                        </div>
                        <div class=\"card-footer bg-white border-top-0 d-flex justify-content-between\">
                            <a href=\"";
                // line 104
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livre_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "id", [], "any", false, false, false, 104)]), "html", null, true);
                yield "\" class=\"btn btn-info btn-sm\">Détails</a>
                            ";
                // line 105
                if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_USER") && CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "disponible", [], "any", false, false, false, 105))) {
                    // line 106
                    yield "                                <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_emprunt_livre", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "id", [], "any", false, false, false, 106)]), "html", null, true);
                    yield "\" class=\"btn btn-success btn-sm\">Emprunter</a>
                            ";
                }
                // line 108
                yield "                        </div>
                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['livre'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 112
            yield "        ";
        }
        // line 113
        yield "    </div>

    ";
        // line 116
        yield "    ";
        if ((isset($context["recherche_effectuee"]) || array_key_exists("recherche_effectuee", $context) ? $context["recherche_effectuee"] : (function () { throw new RuntimeError('Variable "recherche_effectuee" does not exist.', 116, $this->source); })())) {
            // line 117
            yield "        <div class=\"mt-4\">
            <h3 class=\"border-bottom pb-2 mb-3\">Résultats de la recherche</h3>
            ";
            // line 119
            if (Twig\Extension\CoreExtension::testEmpty((isset($context["livres"]) || array_key_exists("livres", $context) ? $context["livres"] : (function () { throw new RuntimeError('Variable "livres" does not exist.', 119, $this->source); })()))) {
                // line 120
                yield "                <div class=\"alert alert-info\">
                    Aucun livre ne correspond à votre recherche.
                </div>
            ";
            } else {
                // line 124
                yield "                <div class=\"table-responsive\">
                    <table class=\"table table-striped table-hover\">
                        <thead class=\"table-dark\">
                            <tr>
                                <th>Titre</th>
                                <th>Auteur</th>
                                <th>Genre</th>
                                <th>Disponibilité</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
                // line 136
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["livres"]) || array_key_exists("livres", $context) ? $context["livres"] : (function () { throw new RuntimeError('Variable "livres" does not exist.', 136, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["livre"]) {
                    // line 137
                    yield "                                <tr>
                                    <td>";
                    // line 138
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "titre", [], "any", false, false, false, 138), "html", null, true);
                    yield "</td>
                                    <td>";
                    // line 139
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "auteur", [], "any", false, false, false, 139), "nom", [], "any", false, false, false, 139), "html", null, true);
                    yield "</td>
                                    <td>";
                    // line 140
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "genre", [], "any", false, false, false, 140), "nom", [], "any", false, false, false, 140), "html", null, true);
                    yield "</td>
                                    <td>
                                        ";
                    // line 142
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "disponible", [], "any", false, false, false, 142)) {
                        // line 143
                        yield "                                            <span class=\"badge bg-success\">Disponible</span>
                                        ";
                    } else {
                        // line 145
                        yield "                                            <span class=\"badge bg-danger\">Indisponible</span>
                                        ";
                    }
                    // line 147
                    yield "                                    </td>
                                    <td>
                                        <a href=\"";
                    // line 149
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livre_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "id", [], "any", false, false, false, 149)]), "html", null, true);
                    yield "\" class=\"btn btn-sm btn-info\">Détails</a>
                                        
                                        ";
                    // line 151
                    if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_USER") && CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "disponible", [], "any", false, false, false, 151))) {
                        // line 152
                        yield "                                            <a href=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_emprunt_livre", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "id", [], "any", false, false, false, 152)]), "html", null, true);
                        yield "\" class=\"btn btn-sm btn-success\">Emprunter</a>
                                        ";
                    }
                    // line 154
                    yield "                                    </td>
                                </tr>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['livre'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 157
                yield "                        </tbody>
                    </table>
                </div>
            ";
            }
            // line 161
            yield "        </div>
    ";
        }
        // line 163
        yield "</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "home/index.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  428 => 163,  424 => 161,  418 => 157,  410 => 154,  404 => 152,  402 => 151,  397 => 149,  393 => 147,  389 => 145,  385 => 143,  383 => 142,  378 => 140,  374 => 139,  370 => 138,  367 => 137,  363 => 136,  349 => 124,  343 => 120,  341 => 119,  337 => 117,  334 => 116,  330 => 113,  327 => 112,  318 => 108,  312 => 106,  310 => 105,  306 => 104,  301 => 101,  297 => 99,  293 => 97,  291 => 96,  286 => 94,  282 => 93,  276 => 90,  271 => 87,  266 => 86,  264 => 85,  256 => 79,  254 => 78,  247 => 73,  240 => 68,  235 => 66,  228 => 62,  222 => 59,  216 => 56,  210 => 53,  203 => 48,  199 => 45,  193 => 42,  189 => 41,  185 => 39,  179 => 36,  175 => 35,  171 => 34,  167 => 32,  161 => 29,  157 => 28,  154 => 27,  152 => 26,  146 => 24,  143 => 23,  136 => 17,  133 => 15,  127 => 14,  118 => 11,  113 => 10,  108 => 9,  103 => 8,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Bibliothèque{% endblock %}

{% block body %}
<div class=\"container mt-4\">
    {# Affichage des messages flash #}
    {% for message_type, messages in app.flashes %}
        {% for message in messages %}
            <div class=\"alert alert-{{ message_type == 'error' ? 'danger' : message_type }}\">
                {{ message }}
            </div>
        {% endfor %}
    {% endfor %}

    {# Bannière d'accueil #}
    <div class=\"jumbotron bg-light p-5 rounded shadow-sm mb-4\">
        <h1 class=\"display-4\">Bienvenue à la Bibliothèque</h1>
        <p class=\"lead\">Parcourez notre collection de livres et empruntez ceux qui vous intéressent.</p>
        <hr class=\"my-4\">
        
        {# Affichage différent selon que l'utilisateur est connecté ou non #}
        {% if is_granted('IS_AUTHENTICATED_FULLY') %}
            <p>Bonjour {{ app.user.nom }}! Vous êtes connecté.</p>
            
            {% if app.user.emprunts is not empty %}
                <div class=\"alert alert-info mb-3\">
                    Vous avez actuellement {{ app.user.emprunts|length }} livre(s) emprunté(s).
                    <a href=\"{{ path('app_account') }}\" class=\"alert-link\">Voir mes emprunts</a>
                </div>
            {% endif %}
            
            <div class=\"d-flex gap-2\">
                <a class=\"btn btn-primary\" href=\"{{ path('app_livre_index') }}\">Parcourir les livres</a>
                <a class=\"btn btn-success\" href=\"{{ path('app_account') }}\">Mon compte</a>
                <a class=\"btn btn-outline-secondary\" href=\"{{ path('app_logout') }}\">Se déconnecter</a>
            </div>
        {% else %}
            <p>Connectez-vous pour emprunter des livres ou créez un compte.</p>
            <div class=\"d-flex gap-2\">
                <a class=\"btn btn-primary\" href=\"{{ path('app_login') }}\">Se connecter</a>
                <a class=\"btn btn-outline-secondary\" href=\"{{ path('app_register') }}\">S'inscrire</a>
            </div>
        {% endif %}
    </div>

    {# Formulaire de recherche rapide #}
    <div class=\"card mb-5 shadow-sm\">
        <div class=\"card-header bg-primary text-white\">
            <h2 class=\"h5 mb-0\">Rechercher un livre</h2>
        </div>
        <div class=\"card-body\">
            {{ form_start(search_form) }}
            <div class=\"row\">
                <div class=\"col-md-4 mb-3\">
                    {{ form_row(search_form.titre) }}
                </div>
                <div class=\"col-md-4 mb-3\">
                    {{ form_row(search_form.auteur) }}
                </div>
                <div class=\"col-md-4 mb-3\">
                    {{ form_row(search_form.genre) }}
                </div>
            </div>
            <div class=\"text-center\">
                {{ form_row(search_form.rechercher) }}
            </div>
            {{ form_end(search_form) }}
        </div>
    </div>

    {# Section des livres populaires #}
    <div class=\"row mb-4\">
        <div class=\"col-12\">
            <h2 class=\"border-bottom pb-2 mb-4\">Livres Populaires</h2>
        </div>
        
        {% if livres_populaires is empty %}
            <div class=\"col-12\">
                <div class=\"alert alert-info\">
                    Aucun livre disponible pour le moment.
                </div>
            </div>
        {% else %}
            {# Affichage des livres populaires sous forme de cartes #}
            {% for livre in livres_populaires %}
                <div class=\"col-md-6 col-lg-4 mb-4\">
                    <div class=\"card h-100 shadow-sm\">
                        <div class=\"card-header bg-light\">
                            <h5 class=\"card-title mb-0 text-truncate\">{{ livre.titre }}</h5>
                        </div>
                        <div class=\"card-body\">
                            <p class=\"card-text\"><strong>Auteur:</strong> {{ livre.auteur.nom }}</p>
                            <p class=\"card-text\"><strong>Genre:</strong> {{ livre.genre.nom }}</p>
                            <p class=\"card-text\">
                                {% if livre.disponible %}
                                    <span class=\"badge bg-success\">Disponible</span>
                                {% else %}
                                    <span class=\"badge bg-danger\">Indisponible</span>
                                {% endif %}
                            </p>
                        </div>
                        <div class=\"card-footer bg-white border-top-0 d-flex justify-content-between\">
                            <a href=\"{{ path('app_livre_show', {'id': livre.id}) }}\" class=\"btn btn-info btn-sm\">Détails</a>
                            {% if is_granted('ROLE_USER') and livre.disponible %}
                                <a href=\"{{ path('app_emprunt_livre', {'id': livre.id}) }}\" class=\"btn btn-success btn-sm\">Emprunter</a>
                            {% endif %}
                        </div>
                    </div>
                </div>
            {% endfor %}
        {% endif %}
    </div>

    {# Résultats de la recherche (si une recherche a été effectuée) #}
    {% if recherche_effectuee %}
        <div class=\"mt-4\">
            <h3 class=\"border-bottom pb-2 mb-3\">Résultats de la recherche</h3>
            {% if livres is empty %}
                <div class=\"alert alert-info\">
                    Aucun livre ne correspond à votre recherche.
                </div>
            {% else %}
                <div class=\"table-responsive\">
                    <table class=\"table table-striped table-hover\">
                        <thead class=\"table-dark\">
                            <tr>
                                <th>Titre</th>
                                <th>Auteur</th>
                                <th>Genre</th>
                                <th>Disponibilité</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {% for livre in livres %}
                                <tr>
                                    <td>{{ livre.titre }}</td>
                                    <td>{{ livre.auteur.nom }}</td>
                                    <td>{{ livre.genre.nom }}</td>
                                    <td>
                                        {% if livre.disponible %}
                                            <span class=\"badge bg-success\">Disponible</span>
                                        {% else %}
                                            <span class=\"badge bg-danger\">Indisponible</span>
                                        {% endif %}
                                    </td>
                                    <td>
                                        <a href=\"{{ path('app_livre_show', {'id': livre.id}) }}\" class=\"btn btn-sm btn-info\">Détails</a>
                                        
                                        {% if is_granted('ROLE_USER') and livre.disponible %}
                                            <a href=\"{{ path('app_emprunt_livre', {'id': livre.id}) }}\" class=\"btn btn-sm btn-success\">Emprunter</a>
                                        {% endif %}
                                    </td>
                                </tr>
                            {% endfor %}
                        </tbody>
                    </table>
                </div>
            {% endif %}
        </div>
    {% endif %}
</div>
{% endblock %} ", "home/index.html.twig", "C:\\Users\\ASUS\\OneDrive\\Bureau\\symphonie_project\\templates\\home\\index.html.twig");
    }
}
