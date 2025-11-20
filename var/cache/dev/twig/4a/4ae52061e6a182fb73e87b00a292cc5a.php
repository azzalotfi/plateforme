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

/* livre/index.html.twig */
class __TwigTemplate_6eaf6e95623d07fd4cdeb852232fdf43 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "livre/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "livre/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "livre/index.html.twig", 1);
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

        yield "Liste des Livres";
        
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
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1>Liste des Livres</h1>
        <a href=\"";
        // line 9
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livre_new");
        yield "\" class=\"btn btn-success\">Ajouter un livre</a>
    </div>

    <div class=\"table-responsive\">
        <table class=\"table table-striped table-hover\">
            <thead class=\"table-dark\">
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>ISBN</th>
                    <th>Disponible</th>
                    <th>Auteur</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["livres"]) || array_key_exists("livres", $context) ? $context["livres"] : (function () { throw new RuntimeError('Variable "livres" does not exist.', 26, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["livre"]) {
            // line 27
            yield "                <tr>
                    <td>";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "id", [], "any", false, false, false, 28), "html", null, true);
            yield "</td>
                    <td>";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "titre", [], "any", false, false, false, 29), "html", null, true);
            yield "</td>
                    <td>";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "ISBN", [], "any", false, false, false, 30), "html", null, true);
            yield "</td>
                    <td>
                        ";
            // line 32
            if (CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "disponible", [], "any", false, false, false, 32)) {
                // line 33
                yield "                            <span class=\"badge bg-success\">Oui</span>
                        ";
            } else {
                // line 35
                yield "                            <span class=\"badge bg-danger\">Non</span>
                        ";
            }
            // line 37
            yield "                    </td>
                    <td>";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "auteur", [], "any", false, false, false, 38), "nom", [], "any", false, false, false, 38), "html", null, true);
            yield "</td>
                    <td>";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "genre", [], "any", false, false, false, 39), "nom", [], "any", false, false, false, 39), "html", null, true);
            yield "</td>
                    <td>
                        <div class=\"btn-group\" role=\"group\">
                            <a href=\"";
            // line 42
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livre_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "id", [], "any", false, false, false, 42)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-info\">Voir</a>
                            <a href=\"";
            // line 43
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livre_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["livre"], "id", [], "any", false, false, false, 43)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-warning\">Modifier</a>
                        </div>
                    </td>
                </tr>
            ";
            $context['_iterated'] = true;
        }
        // line 47
        if (!$context['_iterated']) {
            // line 48
            yield "                <tr>
                    <td colspan=\"7\" class=\"text-center\">Aucun livre trouvé</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['livre'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        yield "            </tbody>
        </table>
    </div>
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
        return "livre/index.html.twig";
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
        return array (  193 => 52,  184 => 48,  182 => 47,  173 => 43,  169 => 42,  163 => 39,  159 => 38,  156 => 37,  152 => 35,  148 => 33,  146 => 32,  141 => 30,  137 => 29,  133 => 28,  130 => 27,  125 => 26,  105 => 9,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Liste des Livres{% endblock %}

{% block body %}
<div class=\"container mt-4\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1>Liste des Livres</h1>
        <a href=\"{{ path('app_livre_new') }}\" class=\"btn btn-success\">Ajouter un livre</a>
    </div>

    <div class=\"table-responsive\">
        <table class=\"table table-striped table-hover\">
            <thead class=\"table-dark\">
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>ISBN</th>
                    <th>Disponible</th>
                    <th>Auteur</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {% for livre in livres %}
                <tr>
                    <td>{{ livre.id }}</td>
                    <td>{{ livre.titre }}</td>
                    <td>{{ livre.ISBN }}</td>
                    <td>
                        {% if livre.disponible %}
                            <span class=\"badge bg-success\">Oui</span>
                        {% else %}
                            <span class=\"badge bg-danger\">Non</span>
                        {% endif %}
                    </td>
                    <td>{{ livre.auteur.nom }}</td>
                    <td>{{ livre.genre.nom }}</td>
                    <td>
                        <div class=\"btn-group\" role=\"group\">
                            <a href=\"{{ path('app_livre_show', {'id': livre.id}) }}\" class=\"btn btn-sm btn-info\">Voir</a>
                            <a href=\"{{ path('app_livre_edit', {'id': livre.id}) }}\" class=\"btn btn-sm btn-warning\">Modifier</a>
                        </div>
                    </td>
                </tr>
            {% else %}
                <tr>
                    <td colspan=\"7\" class=\"text-center\">Aucun livre trouvé</td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
    </div>
</div>
{% endblock %}
", "livre/index.html.twig", "C:\\Users\\ASUS\\OneDrive\\Bureau\\symphonie_project\\templates\\livre\\index.html.twig");
    }
}
