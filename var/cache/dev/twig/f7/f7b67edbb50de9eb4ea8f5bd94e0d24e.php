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

/* genre/index.html.twig */
class __TwigTemplate_dec200aa086f14670b678f6eaeb84f91 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "genre/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "genre/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "genre/index.html.twig", 1);
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

        yield "Liste des Genres";
        
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
        <h1>Liste des Genres</h1>
        <a href=\"";
        // line 9
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_genre_new");
        yield "\" class=\"btn btn-success\">Ajouter un genre</a>
    </div>

    <div class=\"table-responsive\">
        <table class=\"table table-striped table-hover\">
            <thead class=\"table-dark\">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Nombre de livres</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["genres"]) || array_key_exists("genres", $context) ? $context["genres"] : (function () { throw new RuntimeError('Variable "genres" does not exist.', 23, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["genre"]) {
            // line 24
            yield "                <tr>
                    <td>";
            // line 25
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["genre"], "id", [], "any", false, false, false, 25), "html", null, true);
            yield "</td>
                    <td>";
            // line 26
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["genre"], "nom", [], "any", false, false, false, 26), "html", null, true);
            yield "</td>
                    <td><span class=\"badge bg-secondary\">";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["genre"], "livres", [], "any", false, false, false, 27)), "html", null, true);
            yield "</span></td>
                    <td>
                        <div class=\"btn-group\" role=\"group\">
                            <a href=\"";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_genre_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["genre"], "id", [], "any", false, false, false, 30)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-info\">Voir</a>
                            <a href=\"";
            // line 31
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_genre_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["genre"], "id", [], "any", false, false, false, 31)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-warning\">Modifier</a>
                        </div>
                    </td>
                </tr>
            ";
            $context['_iterated'] = true;
        }
        // line 35
        if (!$context['_iterated']) {
            // line 36
            yield "                <tr>
                    <td colspan=\"4\" class=\"text-center\">Aucun genre trouvé</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['genre'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
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
        return "genre/index.html.twig";
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
        return array (  168 => 40,  159 => 36,  157 => 35,  148 => 31,  144 => 30,  138 => 27,  134 => 26,  130 => 25,  127 => 24,  122 => 23,  105 => 9,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Liste des Genres{% endblock %}

{% block body %}
<div class=\"container mt-4\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1>Liste des Genres</h1>
        <a href=\"{{ path('app_genre_new') }}\" class=\"btn btn-success\">Ajouter un genre</a>
    </div>

    <div class=\"table-responsive\">
        <table class=\"table table-striped table-hover\">
            <thead class=\"table-dark\">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Nombre de livres</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {% for genre in genres %}
                <tr>
                    <td>{{ genre.id }}</td>
                    <td>{{ genre.nom }}</td>
                    <td><span class=\"badge bg-secondary\">{{ genre.livres|length }}</span></td>
                    <td>
                        <div class=\"btn-group\" role=\"group\">
                            <a href=\"{{ path('app_genre_show', {'id': genre.id}) }}\" class=\"btn btn-sm btn-info\">Voir</a>
                            <a href=\"{{ path('app_genre_edit', {'id': genre.id}) }}\" class=\"btn btn-sm btn-warning\">Modifier</a>
                        </div>
                    </td>
                </tr>
            {% else %}
                <tr>
                    <td colspan=\"4\" class=\"text-center\">Aucun genre trouvé</td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
    </div>
</div>
{% endblock %}
", "genre/index.html.twig", "C:\\Users\\ASUS\\OneDrive\\Bureau\\symphonie_project\\templates\\genre\\index.html.twig");
    }
}
