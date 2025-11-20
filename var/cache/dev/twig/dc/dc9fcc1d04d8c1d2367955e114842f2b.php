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

/* account/index.html.twig */
class __TwigTemplate_028f730f6984c2a47789661f8029e151 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "account/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "account/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "account/index.html.twig", 1);
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

        yield "Mon Compte";
        
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
    <div class=\"row\">
        <div class=\"col-md-4\">
            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">Mon Profil</h5>
                </div>
                <div class=\"card-body\">
                    <p><strong>Nom :</strong> ";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 22, $this->source); })()), "nom", [], "any", false, false, false, 22), "html", null, true);
        yield "</p>
                    <p><strong>Email :</strong> ";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 23, $this->source); })()), "email", [], "any", false, false, false, 23), "html", null, true);
        yield "</p>
                    <p><strong>Téléphone :</strong> ";
        // line 24
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "telephone", [], "any", true, true, false, 24) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 24, $this->source); })()), "telephone", [], "any", false, false, false, 24)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 24, $this->source); })()), "telephone", [], "any", false, false, false, 24), "html", null, true)) : ("Non renseigné"));
        yield "</p>
                </div>
            </div>
        </div>
        <div class=\"col-md-8\">
            <div class=\"card\">
                <div class=\"card-header d-flex justify-content-between align-items-center\">
                    <h5 class=\"mb-0\">Mes Emprunts</h5>
                </div>
                <div class=\"card-body\">
                    ";
        // line 34
        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 34, $this->source); })()), "emprunts", [], "any", false, false, false, 34))) {
            // line 35
            yield "                        <p class=\"text-center\">Vous n'avez pas encore emprunté de livres.</p>
                        <div class=\"text-center mt-3\">
                            <a href=\"";
            // line 37
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livre_index");
            yield "\" class=\"btn btn-primary\">Parcourir les livres</a>
                        </div>
                    ";
        } else {
            // line 40
            yield "                        <div class=\"table-responsive\">
                            <table class=\"table\">
                                <thead>
                                    <tr>
                                        <th>Livre</th>
                                        <th>Date d'emprunt</th>
                                        <th>Date de retour</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ";
            // line 52
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 52, $this->source); })()), "emprunts", [], "any", false, false, false, 52));
            foreach ($context['_seq'] as $context["_key"] => $context["emprunt"]) {
                // line 53
                yield "                                    <tr>
                                        <td>
                                            <a href=\"";
                // line 55
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livre_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["emprunt"], "livre", [], "any", false, false, false, 55), "id", [], "any", false, false, false, 55)]), "html", null, true);
                yield "\">
                                                ";
                // line 56
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["emprunt"], "livre", [], "any", false, false, false, 56), "titre", [], "any", false, false, false, 56), "html", null, true);
                yield "
                                            </a>
                                        </td>
                                        <td>";
                // line 59
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["emprunt"], "dateEmprunt", [], "any", false, false, false, 59), "d/m/Y"), "html", null, true);
                yield "</td>
                                        <td>";
                // line 60
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["emprunt"], "dateRetour", [], "any", false, false, false, 60), "d/m/Y"), "html", null, true);
                yield "</td>
                                        <td>
                                            ";
                // line 62
                $context["today"] = $this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y-m-d");
                // line 63
                yield "                                            ";
                if (((isset($context["today"]) || array_key_exists("today", $context) ? $context["today"] : (function () { throw new RuntimeError('Variable "today" does not exist.', 63, $this->source); })()) > $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["emprunt"], "dateRetour", [], "any", false, false, false, 63), "Y-m-d"))) {
                    // line 64
                    yield "                                                <span class=\"badge bg-danger\">En retard</span>
                                            ";
                } else {
                    // line 66
                    yield "                                                <span class=\"badge bg-success\">En cours</span>
                                            ";
                }
                // line 68
                yield "                                        </td>
                                        <td>
                                            <a href=\"";
                // line 70
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_emprunt_retour", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["emprunt"], "id", [], "any", false, false, false, 70)]), "html", null, true);
                yield "\" 
                                               class=\"btn btn-sm btn-primary\"
                                               onclick=\"return confirm('Êtes-vous sûr de vouloir retourner ce livre?')\">
                                                Retourner
                                            </a>
                                        </td>
                                    </tr>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['emprunt'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 78
            yield "                                </tbody>
                            </table>
                        </div>
                    ";
        }
        // line 82
        yield "                </div>
            </div>
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
        return "account/index.html.twig";
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
        return array (  253 => 82,  247 => 78,  233 => 70,  229 => 68,  225 => 66,  221 => 64,  218 => 63,  216 => 62,  211 => 60,  207 => 59,  201 => 56,  197 => 55,  193 => 53,  189 => 52,  175 => 40,  169 => 37,  165 => 35,  163 => 34,  150 => 24,  146 => 23,  142 => 22,  132 => 14,  126 => 13,  117 => 10,  112 => 9,  107 => 8,  103 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mon Compte{% endblock %}

{% block body %}
<div class=\"container mt-4\">
    {% for message_type, messages in app.flashes %}
        {% for message in messages %}
            <div class=\"alert alert-{{ message_type == 'error' ? 'danger' : message_type }}\">
                {{ message }}
            </div>
        {% endfor %}
    {% endfor %}

    <div class=\"row\">
        <div class=\"col-md-4\">
            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"mb-0\">Mon Profil</h5>
                </div>
                <div class=\"card-body\">
                    <p><strong>Nom :</strong> {{ user.nom }}</p>
                    <p><strong>Email :</strong> {{ user.email }}</p>
                    <p><strong>Téléphone :</strong> {{ user.telephone ?? 'Non renseigné' }}</p>
                </div>
            </div>
        </div>
        <div class=\"col-md-8\">
            <div class=\"card\">
                <div class=\"card-header d-flex justify-content-between align-items-center\">
                    <h5 class=\"mb-0\">Mes Emprunts</h5>
                </div>
                <div class=\"card-body\">
                    {% if user.emprunts is empty %}
                        <p class=\"text-center\">Vous n'avez pas encore emprunté de livres.</p>
                        <div class=\"text-center mt-3\">
                            <a href=\"{{ path('app_livre_index') }}\" class=\"btn btn-primary\">Parcourir les livres</a>
                        </div>
                    {% else %}
                        <div class=\"table-responsive\">
                            <table class=\"table\">
                                <thead>
                                    <tr>
                                        <th>Livre</th>
                                        <th>Date d'emprunt</th>
                                        <th>Date de retour</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {% for emprunt in user.emprunts %}
                                    <tr>
                                        <td>
                                            <a href=\"{{ path('app_livre_show', {'id': emprunt.livre.id}) }}\">
                                                {{ emprunt.livre.titre }}
                                            </a>
                                        </td>
                                        <td>{{ emprunt.dateEmprunt|date('d/m/Y') }}</td>
                                        <td>{{ emprunt.dateRetour|date('d/m/Y') }}</td>
                                        <td>
                                            {% set today = \"now\"|date('Y-m-d') %}
                                            {% if today > emprunt.dateRetour|date('Y-m-d') %}
                                                <span class=\"badge bg-danger\">En retard</span>
                                            {% else %}
                                                <span class=\"badge bg-success\">En cours</span>
                                            {% endif %}
                                        </td>
                                        <td>
                                            <a href=\"{{ path('app_emprunt_retour', {'id': emprunt.id}) }}\" 
                                               class=\"btn btn-sm btn-primary\"
                                               onclick=\"return confirm('Êtes-vous sûr de vouloir retourner ce livre?')\">
                                                Retourner
                                            </a>
                                        </td>
                                    </tr>
                                    {% endfor %}
                                </tbody>
                            </table>
                        </div>
                    {% endif %}
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %} ", "account/index.html.twig", "C:\\Users\\ASUS\\OneDrive\\Bureau\\symphonie_project\\templates\\account\\index.html.twig");
    }
}
