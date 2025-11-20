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

/* search/index.html.twig */
class __TwigTemplate_a4f4830806987864b225106f911e040f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "search/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "search/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "search/index.html.twig", 1);
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

        yield "Recherche de livres";
        
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
        yield "    <div class=\"card shadow-sm mb-4\">
        <div class=\"card-header bg-primary text-white\">
            <h1 class=\"h3 mb-0\">Recherche avancée</h1>
        </div>
        <div class=\"card-body\">
            ";
        // line 13
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["search_form"]) || array_key_exists("search_form", $context) ? $context["search_form"] : (function () { throw new RuntimeError('Variable "search_form" does not exist.', 13, $this->source); })()), 'form_start');
        yield "
            <div class=\"row\">
                ";
        // line 16
        yield "                <div class=\"col-md-4 mb-3\">
                    ";
        // line 17
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["search_form"]) || array_key_exists("search_form", $context) ? $context["search_form"] : (function () { throw new RuntimeError('Variable "search_form" does not exist.', 17, $this->source); })()), "titre", [], "any", false, false, false, 17), 'row');
        yield "
                </div>
                ";
        // line 20
        yield "                <div class=\"col-md-4 mb-3\">
                    ";
        // line 21
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["search_form"]) || array_key_exists("search_form", $context) ? $context["search_form"] : (function () { throw new RuntimeError('Variable "search_form" does not exist.', 21, $this->source); })()), "auteur", [], "any", false, false, false, 21), 'row');
        yield "
                </div>
                ";
        // line 24
        yield "                <div class=\"col-md-4 mb-3\">
                    ";
        // line 25
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["search_form"]) || array_key_exists("search_form", $context) ? $context["search_form"] : (function () { throw new RuntimeError('Variable "search_form" does not exist.', 25, $this->source); })()), "genre", [], "any", false, false, false, 25), 'row');
        yield "
                </div>
            </div>
            <div class=\"text-center\">
                ";
        // line 29
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["search_form"]) || array_key_exists("search_form", $context) ? $context["search_form"] : (function () { throw new RuntimeError('Variable "search_form" does not exist.', 29, $this->source); })()), "rechercher", [], "any", false, false, false, 29), 'row');
        yield "
            </div>
            ";
        // line 31
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["search_form"]) || array_key_exists("search_form", $context) ? $context["search_form"] : (function () { throw new RuntimeError('Variable "search_form" does not exist.', 31, $this->source); })()), 'form_end');
        yield "
        </div>
    </div>

    ";
        // line 36
        yield "    <div class=\"mt-4\">
        <h2 class=\"border-bottom pb-2 mb-3\">Résultats de la recherche</h2>
        
        ";
        // line 40
        yield "        ";
        if ((isset($context["recherche_effectuee"]) || array_key_exists("recherche_effectuee", $context) ? $context["recherche_effectuee"] : (function () { throw new RuntimeError('Variable "recherche_effectuee" does not exist.', 40, $this->source); })())) {
            // line 41
            yield "            <div class=\"alert alert-info mb-3\">
                La recherche a retourné ";
            // line 42
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["livres"]) || array_key_exists("livres", $context) ? $context["livres"] : (function () { throw new RuntimeError('Variable "livres" does not exist.', 42, $this->source); })())), "html", null, true);
            yield " résultat(s).
            </div>
        ";
        }
        // line 45
        yield "        
        ";
        // line 47
        yield "        ";
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["livres"]) || array_key_exists("livres", $context) ? $context["livres"] : (function () { throw new RuntimeError('Variable "livres" does not exist.', 47, $this->source); })()))) {
            // line 48
            yield "            <div class=\"alert alert-warning\">
                Aucun livre trouvé.
            </div>
        ";
        } else {
            // line 52
            yield "            ";
            // line 53
            yield "            <div class=\"table-responsive\">
                <table class=\"table table-striped table-hover shadow-sm\">
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
            // line 65
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["livres"]) || array_key_exists("livres", $context) ? $context["livres"] : (function () { throw new RuntimeError('Variable "livres" does not exist.', 65, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["livre"]) {
                // line 66
                yield "                            <tr>
                                <td>";
                // line 67
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "titre", [], "any", false, false, false, 67), "html", null, true);
                yield "</td>
                                <td>";
                // line 68
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "auteur", [], "any", false, false, false, 68), "nom", [], "any", false, false, false, 68), "html", null, true);
                yield "</td>
                                <td>";
                // line 69
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "genre", [], "any", false, false, false, 69), "nom", [], "any", false, false, false, 69), "html", null, true);
                yield "</td>
                                <td>
                                    ";
                // line 71
                if (CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "disponible", [], "any", false, false, false, 71)) {
                    // line 72
                    yield "                                        <span class=\"badge bg-success\">Disponible</span>
                                    ";
                } else {
                    // line 74
                    yield "                                        <span class=\"badge bg-danger\">Indisponible</span>
                                    ";
                }
                // line 76
                yield "                                </td>
                                <td>
                                    <div class=\"btn-group\" role=\"group\">
                                        <a href=\"";
                // line 79
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livre_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "id", [], "any", false, false, false, 79)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-info\">Détails</a>
                                        
                                        ";
                // line 81
                if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_USER") && CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "disponible", [], "any", false, false, false, 81))) {
                    // line 82
                    yield "                                            <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_emprunt_livre", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "id", [], "any", false, false, false, 82)]), "html", null, true);
                    yield "\" class=\"btn btn-sm btn-success\">Emprunter</a>
                                        ";
                }
                // line 84
                yield "                                    </div>
                                </td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['livre'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 88
            yield "                    </tbody>
                </table>
            </div>
        ";
        }
        // line 92
        yield "    </div>
</div>
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
        return "search/index.html.twig";
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
        return array (  261 => 92,  255 => 88,  246 => 84,  240 => 82,  238 => 81,  233 => 79,  228 => 76,  224 => 74,  220 => 72,  218 => 71,  213 => 69,  209 => 68,  205 => 67,  202 => 66,  198 => 65,  184 => 53,  182 => 52,  176 => 48,  173 => 47,  170 => 45,  164 => 42,  161 => 41,  158 => 40,  153 => 36,  146 => 31,  141 => 29,  134 => 25,  131 => 24,  126 => 21,  123 => 20,  118 => 17,  115 => 16,  110 => 13,  103 => 8,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Recherche de livres{% endblock %}

{% block body %}
<div class=\"container mt-4\">
    {# Formulaire de recherche avancée #}
    <div class=\"card shadow-sm mb-4\">
        <div class=\"card-header bg-primary text-white\">
            <h1 class=\"h3 mb-0\">Recherche avancée</h1>
        </div>
        <div class=\"card-body\">
            {{ form_start(search_form) }}
            <div class=\"row\">
                {# Champ de recherche par titre #}
                <div class=\"col-md-4 mb-3\">
                    {{ form_row(search_form.titre) }}
                </div>
                {# Liste déroulante des auteurs #}
                <div class=\"col-md-4 mb-3\">
                    {{ form_row(search_form.auteur) }}
                </div>
                {# Liste déroulante des genres #}
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

    {# Section des résultats de recherche #}
    <div class=\"mt-4\">
        <h2 class=\"border-bottom pb-2 mb-3\">Résultats de la recherche</h2>
        
        {# Message d'information sur le nombre de résultats #}
        {% if recherche_effectuee %}
            <div class=\"alert alert-info mb-3\">
                La recherche a retourné {{ livres|length }} résultat(s).
            </div>
        {% endif %}
        
        {# Affichage quand aucun livre n'est trouvé #}
        {% if livres is empty %}
            <div class=\"alert alert-warning\">
                Aucun livre trouvé.
            </div>
        {% else %}
            {# Tableau des résultats de recherche #}
            <div class=\"table-responsive\">
                <table class=\"table table-striped table-hover shadow-sm\">
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
                                    <div class=\"btn-group\" role=\"group\">
                                        <a href=\"{{ path('app_livre_show', {'id': livre.id}) }}\" class=\"btn btn-sm btn-info\">Détails</a>
                                        
                                        {% if is_granted('ROLE_USER') and livre.disponible %}
                                            <a href=\"{{ path('app_emprunt_livre', {'id': livre.id}) }}\" class=\"btn btn-sm btn-success\">Emprunter</a>
                                        {% endif %}
                                    </div>
                                </td>
                            </tr>
                        {% endfor %}
                    </tbody>
                </table>
            </div>
        {% endif %}
    </div>
</div>
{% endblock %} ", "search/index.html.twig", "C:\\Users\\ASUS\\OneDrive\\Bureau\\symphonie_project\\templates\\search\\index.html.twig");
    }
}
