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

/* auteur/index.html.twig */
class __TwigTemplate_41389e7123bbc0c90cf2b12b1ea6400e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "auteur/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "auteur/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "auteur/index.html.twig", 1);
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

        yield "Liste des Auteurs";
        
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
        <h1>Liste des Auteurs</h1>
        <a href=\"";
        // line 9
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_auteur_new");
        yield "\" class=\"btn btn-success\">Ajouter un auteur</a>
    </div>

    <div class=\"table-responsive\">
        <table class=\"table table-striped table-hover\">
            <thead class=\"table-dark\">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Date de naissance</th>
                    <th>Nombre de livres</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["auteurs"]) || array_key_exists("auteurs", $context) ? $context["auteurs"] : (function () { throw new RuntimeError('Variable "auteurs" does not exist.', 24, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["auteur"]) {
            // line 25
            yield "                <tr>
                    <td>";
            // line 26
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["auteur"], "id", [], "any", false, false, false, 26), "html", null, true);
            yield "</td>
                    <td>";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["auteur"], "nom", [], "any", false, false, false, 27), "html", null, true);
            yield "</td>
                    <td>";
            // line 28
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["auteur"], "dateDeNaissance", [], "any", false, false, false, 28)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["auteur"], "dateDeNaissance", [], "any", false, false, false, 28), "d/m/Y"), "html", null, true)) : ("Non renseignée"));
            yield "</td>
                    <td><span class=\"badge bg-secondary\">";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["auteur"], "livres", [], "any", false, false, false, 29)), "html", null, true);
            yield "</span></td>
                    <td>
                        <div class=\"btn-group\" role=\"group\">
                            <a href=\"";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_auteur_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["auteur"], "id", [], "any", false, false, false, 32)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-info\">Voir</a>
                            <a href=\"";
            // line 33
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_auteur_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["auteur"], "id", [], "any", false, false, false, 33)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-warning\">Modifier</a>
                        </div>
                    </td>
                </tr>
            ";
            $context['_iterated'] = true;
        }
        // line 37
        if (!$context['_iterated']) {
            // line 38
            yield "                <tr>
                    <td colspan=\"5\" class=\"text-center\">Aucun auteur trouvé</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['auteur'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
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
        return "auteur/index.html.twig";
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
        return array (  173 => 42,  164 => 38,  162 => 37,  153 => 33,  149 => 32,  143 => 29,  139 => 28,  135 => 27,  131 => 26,  128 => 25,  123 => 24,  105 => 9,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Liste des Auteurs{% endblock %}

{% block body %}
<div class=\"container mt-4\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1>Liste des Auteurs</h1>
        <a href=\"{{ path('app_auteur_new') }}\" class=\"btn btn-success\">Ajouter un auteur</a>
    </div>

    <div class=\"table-responsive\">
        <table class=\"table table-striped table-hover\">
            <thead class=\"table-dark\">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Date de naissance</th>
                    <th>Nombre de livres</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {% for auteur in auteurs %}
                <tr>
                    <td>{{ auteur.id }}</td>
                    <td>{{ auteur.nom }}</td>
                    <td>{{ auteur.dateDeNaissance ? auteur.dateDeNaissance|date('d/m/Y') : 'Non renseignée' }}</td>
                    <td><span class=\"badge bg-secondary\">{{ auteur.livres|length }}</span></td>
                    <td>
                        <div class=\"btn-group\" role=\"group\">
                            <a href=\"{{ path('app_auteur_show', {'id': auteur.id}) }}\" class=\"btn btn-sm btn-info\">Voir</a>
                            <a href=\"{{ path('app_auteur_edit', {'id': auteur.id}) }}\" class=\"btn btn-sm btn-warning\">Modifier</a>
                        </div>
                    </td>
                </tr>
            {% else %}
                <tr>
                    <td colspan=\"5\" class=\"text-center\">Aucun auteur trouvé</td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
    </div>
</div>
{% endblock %}
", "auteur/index.html.twig", "C:\\Users\\ASUS\\OneDrive\\Bureau\\symphonie_project\\templates\\auteur\\index.html.twig");
    }
}
