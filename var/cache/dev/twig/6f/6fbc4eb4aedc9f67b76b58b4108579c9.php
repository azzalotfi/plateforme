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

/* livre/show.html.twig */
class __TwigTemplate_2f97998717f16270792939d3be2b47e4 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "livre/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "livre/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "livre/show.html.twig", 1);
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

        yield "Détails du livre";
        
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
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 7, $this->source); })()), "flashes", [], "any", false, false, false, 7));
        foreach ($context['_seq'] as $context["message_type"] => $context["messages"]) {
            // line 8
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 9
                yield "            <div class=\"alert alert-";
                yield ((($context["message_type"] == "error")) ? ("danger") : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message_type"], "html", null, true)));
                yield "\">
                ";
                // line 10
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 13
            yield "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['message_type'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        yield "
    <div class=\"card mb-4\">
        <div class=\"card-header\">
            <div class=\"d-flex justify-content-between align-items-center\">
                <h1 class=\"h3 mb-0\">";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livre"]) || array_key_exists("livre", $context) ? $context["livre"] : (function () { throw new RuntimeError('Variable "livre" does not exist.', 18, $this->source); })()), "titre", [], "any", false, false, false, 18), "html", null, true);
        yield "</h1>
                <div>
                    <a href=\"";
        // line 20
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livre_index");
        yield "\" class=\"btn btn-secondary\">Retour à la liste</a>
                    <a href=\"";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livre_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["livre"]) || array_key_exists("livre", $context) ? $context["livre"] : (function () { throw new RuntimeError('Variable "livre" does not exist.', 21, $this->source); })()), "id", [], "any", false, false, false, 21)]), "html", null, true);
        yield "\" class=\"btn btn-warning\">Modifier</a>
                </div>
            </div>
        </div>
        <div class=\"card-body\">
            <div class=\"row\">
                <div class=\"col-md-8\">
                    <table class=\"table table-bordered\">
                        <tbody>
                            <tr>
                                <th class=\"bg-light\" style=\"width: 150px;\">ID</th>
                                <td>";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livre"]) || array_key_exists("livre", $context) ? $context["livre"] : (function () { throw new RuntimeError('Variable "livre" does not exist.', 32, $this->source); })()), "id", [], "any", false, false, false, 32), "html", null, true);
        yield "</td>
                            </tr>
                            <tr>
                                <th class=\"bg-light\">Titre</th>
                                <td>";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livre"]) || array_key_exists("livre", $context) ? $context["livre"] : (function () { throw new RuntimeError('Variable "livre" does not exist.', 36, $this->source); })()), "titre", [], "any", false, false, false, 36), "html", null, true);
        yield "</td>
                            </tr>
                            <tr>
                                <th class=\"bg-light\">ISBN</th>
                                <td>";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livre"]) || array_key_exists("livre", $context) ? $context["livre"] : (function () { throw new RuntimeError('Variable "livre" does not exist.', 40, $this->source); })()), "ISBN", [], "any", false, false, false, 40), "html", null, true);
        yield "</td>
                            </tr>
                            <tr>
                                <th class=\"bg-light\">Disponible</th>
                                <td>
                                    ";
        // line 45
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["livre"]) || array_key_exists("livre", $context) ? $context["livre"] : (function () { throw new RuntimeError('Variable "livre" does not exist.', 45, $this->source); })()), "disponible", [], "any", false, false, false, 45)) {
            // line 46
            yield "                                        <span class=\"badge bg-success\">Disponible</span>
                                    ";
        } else {
            // line 48
            yield "                                        <span class=\"badge bg-danger\">Indisponible</span>
                                    ";
        }
        // line 50
        yield "                                </td>
                            </tr>
                            <tr>
                                <th class=\"bg-light\">Auteur</th>
                                <td>
                                    <a href=\"";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_auteur_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["livre"]) || array_key_exists("livre", $context) ? $context["livre"] : (function () { throw new RuntimeError('Variable "livre" does not exist.', 55, $this->source); })()), "auteur", [], "any", false, false, false, 55), "id", [], "any", false, false, false, 55)]), "html", null, true);
        yield "\">
                                        ";
        // line 56
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["livre"]) || array_key_exists("livre", $context) ? $context["livre"] : (function () { throw new RuntimeError('Variable "livre" does not exist.', 56, $this->source); })()), "auteur", [], "any", false, false, false, 56), "nom", [], "any", false, false, false, 56), "html", null, true);
        yield "
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th class=\"bg-light\">Genre</th>
                                <td>
                                    <a href=\"";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_genre_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["livre"]) || array_key_exists("livre", $context) ? $context["livre"] : (function () { throw new RuntimeError('Variable "livre" does not exist.', 63, $this->source); })()), "genre", [], "any", false, false, false, 63), "id", [], "any", false, false, false, 63)]), "html", null, true);
        yield "\">
                                        ";
        // line 64
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["livre"]) || array_key_exists("livre", $context) ? $context["livre"] : (function () { throw new RuntimeError('Variable "livre" does not exist.', 64, $this->source); })()), "genre", [], "any", false, false, false, 64), "nom", [], "any", false, false, false, 64), "html", null, true);
        yield "
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    ";
        // line 71
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_USER") && CoreExtension::getAttribute($this->env, $this->source, (isset($context["livre"]) || array_key_exists("livre", $context) ? $context["livre"] : (function () { throw new RuntimeError('Variable "livre" does not exist.', 71, $this->source); })()), "disponible", [], "any", false, false, false, 71))) {
            // line 72
            yield "                        <div class=\"mt-3\">
                            <a href=\"";
            // line 73
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_emprunt_livre", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["livre"]) || array_key_exists("livre", $context) ? $context["livre"] : (function () { throw new RuntimeError('Variable "livre" does not exist.', 73, $this->source); })()), "id", [], "any", false, false, false, 73)]), "html", null, true);
            yield "\" class=\"btn btn-success\">
                                Emprunter ce livre
                            </a>
                        </div>
                    ";
        } elseif ( !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_USER")) {
            // line 78
            yield "                        <div class=\"alert alert-info mt-3\">
                            <a href=\"";
            // line 79
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\">Connectez-vous</a> pour emprunter ce livre.
                        </div>
                    ";
        }
        // line 82
        yield "                </div>
                <div class=\"col-md-4\">
                    <div class=\"card border-primary\">
                        <div class=\"card-header bg-primary text-white\">
                            Statut d'emprunt
                        </div>
                        <div class=\"card-body\">
                            ";
        // line 89
        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livre"]) || array_key_exists("livre", $context) ? $context["livre"] : (function () { throw new RuntimeError('Variable "livre" does not exist.', 89, $this->source); })()), "emprunts", [], "any", false, false, false, 89))) {
            // line 90
            yield "                                <p class=\"card-text\">Ce livre n'a pas d'emprunts en cours.</p>
                            ";
        } else {
            // line 92
            yield "                                <p class=\"card-text\">Ce livre a ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["livre"]) || array_key_exists("livre", $context) ? $context["livre"] : (function () { throw new RuntimeError('Variable "livre" does not exist.', 92, $this->source); })()), "emprunts", [], "any", false, false, false, 92)), "html", null, true);
            yield " emprunt(s) en cours.</p>
                                <ul class=\"list-group mt-3\">
                                    ";
            // line 94
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livre"]) || array_key_exists("livre", $context) ? $context["livre"] : (function () { throw new RuntimeError('Variable "livre" does not exist.', 94, $this->source); })()), "emprunts", [], "any", false, false, false, 94));
            foreach ($context['_seq'] as $context["_key"] => $context["emprunt"]) {
                // line 95
                yield "                                        <li class=\"list-group-item d-flex justify-content-between align-items-center\">
                                            ";
                // line 96
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["emprunt"], "utilisateur", [], "any", false, false, false, 96), "nom", [], "any", false, false, false, 96), "html", null, true);
                yield "
                                            <span class=\"badge bg-info\">
                                                Retour: ";
                // line 98
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["emprunt"], "dateRetour", [], "any", false, false, false, 98), "d/m/Y"), "html", null, true);
                yield "
                                            </span>
                                        </li>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['emprunt'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 102
            yield "                                </ul>
                            ";
        }
        // line 104
        yield "                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"card-footer\">
            ";
        // line 110
        yield Twig\Extension\CoreExtension::include($this->env, $context, "livre/_delete_form.html.twig");
        yield "
        </div>
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
        return "livre/show.html.twig";
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
        return array (  305 => 110,  297 => 104,  293 => 102,  283 => 98,  278 => 96,  275 => 95,  271 => 94,  265 => 92,  261 => 90,  259 => 89,  250 => 82,  244 => 79,  241 => 78,  233 => 73,  230 => 72,  228 => 71,  218 => 64,  214 => 63,  204 => 56,  200 => 55,  193 => 50,  189 => 48,  185 => 46,  183 => 45,  175 => 40,  168 => 36,  161 => 32,  147 => 21,  143 => 20,  138 => 18,  132 => 14,  126 => 13,  117 => 10,  112 => 9,  107 => 8,  103 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Détails du livre{% endblock %}

{% block body %}
<div class=\"container mt-4\">
    {% for message_type, messages in app.flashes %}
        {% for message in messages %}
            <div class=\"alert alert-{{ message_type == 'error' ? 'danger' : message_type }}\">
                {{ message }}
            </div>
        {% endfor %}
    {% endfor %}

    <div class=\"card mb-4\">
        <div class=\"card-header\">
            <div class=\"d-flex justify-content-between align-items-center\">
                <h1 class=\"h3 mb-0\">{{ livre.titre }}</h1>
                <div>
                    <a href=\"{{ path('app_livre_index') }}\" class=\"btn btn-secondary\">Retour à la liste</a>
                    <a href=\"{{ path('app_livre_edit', {'id': livre.id}) }}\" class=\"btn btn-warning\">Modifier</a>
                </div>
            </div>
        </div>
        <div class=\"card-body\">
            <div class=\"row\">
                <div class=\"col-md-8\">
                    <table class=\"table table-bordered\">
                        <tbody>
                            <tr>
                                <th class=\"bg-light\" style=\"width: 150px;\">ID</th>
                                <td>{{ livre.id }}</td>
                            </tr>
                            <tr>
                                <th class=\"bg-light\">Titre</th>
                                <td>{{ livre.titre }}</td>
                            </tr>
                            <tr>
                                <th class=\"bg-light\">ISBN</th>
                                <td>{{ livre.ISBN }}</td>
                            </tr>
                            <tr>
                                <th class=\"bg-light\">Disponible</th>
                                <td>
                                    {% if livre.disponible %}
                                        <span class=\"badge bg-success\">Disponible</span>
                                    {% else %}
                                        <span class=\"badge bg-danger\">Indisponible</span>
                                    {% endif %}
                                </td>
                            </tr>
                            <tr>
                                <th class=\"bg-light\">Auteur</th>
                                <td>
                                    <a href=\"{{ path('app_auteur_show', {'id': livre.auteur.id}) }}\">
                                        {{ livre.auteur.nom }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th class=\"bg-light\">Genre</th>
                                <td>
                                    <a href=\"{{ path('app_genre_show', {'id': livre.genre.id}) }}\">
                                        {{ livre.genre.nom }}
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    {% if is_granted('ROLE_USER') and livre.disponible %}
                        <div class=\"mt-3\">
                            <a href=\"{{ path('app_emprunt_livre', {'id': livre.id}) }}\" class=\"btn btn-success\">
                                Emprunter ce livre
                            </a>
                        </div>
                    {% elseif not is_granted('ROLE_USER') %}
                        <div class=\"alert alert-info mt-3\">
                            <a href=\"{{ path('app_login') }}\">Connectez-vous</a> pour emprunter ce livre.
                        </div>
                    {% endif %}
                </div>
                <div class=\"col-md-4\">
                    <div class=\"card border-primary\">
                        <div class=\"card-header bg-primary text-white\">
                            Statut d'emprunt
                        </div>
                        <div class=\"card-body\">
                            {% if livre.emprunts is empty %}
                                <p class=\"card-text\">Ce livre n'a pas d'emprunts en cours.</p>
                            {% else %}
                                <p class=\"card-text\">Ce livre a {{ livre.emprunts|length }} emprunt(s) en cours.</p>
                                <ul class=\"list-group mt-3\">
                                    {% for emprunt in livre.emprunts %}
                                        <li class=\"list-group-item d-flex justify-content-between align-items-center\">
                                            {{ emprunt.utilisateur.nom }}
                                            <span class=\"badge bg-info\">
                                                Retour: {{ emprunt.dateRetour|date('d/m/Y') }}
                                            </span>
                                        </li>
                                    {% endfor %}
                                </ul>
                            {% endif %}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"card-footer\">
            {{ include('livre/_delete_form.html.twig') }}
        </div>
    </div>
</div>
{% endblock %}
", "livre/show.html.twig", "C:\\Users\\ASUS\\OneDrive\\Bureau\\symphonie_project\\templates\\livre\\show.html.twig");
    }
}
