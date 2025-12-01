/**
 * Centralized Translation Script
 * Handles language switching for the entire application.
 */

(function () {
    const t = {
        fr: {
            // Global / Navigation
            nav_home: 'Accueil',
            nav_services: 'Services',
            nav_ai_assistant: '🤖 Assistant IA',
            nav_dashboard: 'Tableau de bord',
            nav_payment: 'Paiement',
            nav_profile: 'Mon Profil',
            nav_login: 'Connexion',
            nav_register: 'S\'inscrire',
            nav_logout: 'Déconnexion',

            // Home Page
            badge_text: 'Plateforme N°1 en Tunisie',
            hero_title: 'Trouvez le prestataire parfait',
            hero_description: 'Connectez-vous avec des professionnels qualifiés pour tous vos besoins',
            btn_find_service: 'Trouver un service →',
            btn_become_provider: 'Devenir prestataire',
            stat_users: 'Utilisateurs actifs',
            stat_services: 'Services complétés',
            stat_rating: 'Note moyenne',
            stat_satisfaction: 'Satisfaction client',
            overlay_reviews: '1000+ avis vérifiés',
            why_choose_badge: 'Pourquoi nous choisir',
            why_choose_title: 'Pourquoi nous choisir',
            why_choose_description: 'Nous offrons une expérience unique pour connecter clients et prestataires de services professionnels',
            feature_verified: 'Prestataires vérifiés',
            feature_verified_desc: 'Tous nos prestataires sont vérifiés et évalués',
            feature_secure: 'Paiement sécurisé',
            feature_secure_desc: 'Système de points sécurisé et transparent',
            feature_support: 'Support 24/7',
            feature_support_desc: 'Notre équipe est toujours là pour vous aider',
            services_title: 'Nos Services',
            services_description: 'Découvrez nos meilleurs professionnels',
            btn_view_all: 'Voir tous les services →',
            price_from: 'À partir de',
            price_on_demand: 'Prix sur demande',
            btn_reserve: 'Réserver',
            how_it_works_title: 'Comment ça marche ?',
            how_it_works_description: 'Trouvez le professionnel parfait en quelques clics',
            step1_title: 'Parcourez les services',
            step1_desc: 'Explorez notre catalogue de professionnels qualifiés dans différents domaines',
            step2_title: 'Réservez en ligne',
            step2_desc: 'Choisissez votre prestataire et réservez directement sur la plateforme',
            step3_title: 'Profitez du service',
            step3_desc: 'Recevez votre service et laissez votre avis pour aider la communauté',
            cta_title: 'Prêt à trouver le service parfait ?',
            cta_description: 'Rejoignez des milliers d\'utilisateurs satisfaits et trouvez le professionnel qu\'il vous faut en quelques clics',
            btn_start_now: 'Commencer maintenant →',

            // Services Page
            services_subtitle: 'Découvrez nos professionnels qualifiés pour tous vos besoins',
            search_placeholder: 'Rechercher un service...',
            found_suffix: ' services trouvés',
            sort_label: 'Tri:',
            sort_name_asc: 'Nom ↑',
            sort_name_desc: 'Nom ↓',
            sort_price_asc: 'Prix ↑',
            sort_price_desc: 'Prix ↓',
            sort_new: 'Nouveaux',
            category_all: 'Toutes les catégories',

            // Login Page
            login_badge: '🚀 Rejoignez ServicePro',
            login_welcome: 'Bienvenue de retour',
            login_desc: 'Connectez-vous pour accéder à vos services professionnels',
            login_form_title: 'Se connecter',
            login_form_desc: 'Connectez-vous pour continuer',
            login_placeholder_email: 'Votre email',
            login_placeholder_password: 'Mot de passe',
            login_role_client: '👤 Client',
            login_role_provider: '🧰 Prestataire',
            login_btn_submit: 'Se connecter',
            login_no_account: 'Pas encore de compte ?',
            login_link_register: 'S’inscrire',

            // Register Page
            register_badge: '🚀 Rejoignez ServicePro',
            register_welcome: 'Commencez dès aujourd’hui',
            register_desc: 'Créez votre compte et découvrez tous nos services professionnels',
            register_form_title: 'Créer un compte',
            register_form_desc: 'Rejoignez ServicePro dès maintenant',
            register_placeholder_name: 'Votre nom',
            register_placeholder_email: 'Email',
            register_placeholder_phone: 'Téléphone',
            register_placeholder_address: 'Adresse',
            register_placeholder_password: 'Mot de passe',
            register_placeholder_confirm: 'Confirmer mot de passe',
            register_role_client: 'Client',
            register_role_provider: 'Prestataire',
            register_btn_submit: 'S\'inscrire',
            register_already_member: 'Déjà membre ?',
            register_link_login: 'Connectez-vous',

            // Profile Page
            profile_header_edit: 'Modifier',
            profile_header_cancel: 'Annuler',
            profile_header_logout: 'Déconnexion',
            profile_personal_info: 'Informations personnelles',
            profile_label_name: 'Nom',
            profile_label_firstname: 'Prénom',
            profile_label_email: 'Email',
            profile_label_phone: 'Téléphone',
            profile_label_address: 'Adresse',
            profile_bio_title: 'Biographie',
            profile_bio_placeholder: 'Parlez de votre expérience et vos compétences...',
            profile_skills_title: 'Compétences',
            profile_skills_placeholder: 'Plomberie, Chauffage, Sanitaire',
            profile_btn_save: 'Enregistrer les modifications',
            profile_btn_cancel_form: 'Annuler',
            profile_stat_gains: 'Gains totaux',
            profile_stat_completed: 'Prestations complétées',
            profile_stat_reviews: 'Avis reçus',

            // Dashboard
            dashboard_welcome_prefix: 'Bienvenue, ',
            dashboard_overview: 'Voici un aperçu de vos activités',
            dashboard_stat_reservations: 'Total Réservations',
            dashboard_stat_pending: 'En Cours',
            dashboard_stat_completed: 'Complétées',
            dashboard_stat_total: 'Montant Total',
            dashboard_recent_reservations: 'Réservations Récentes',
            dashboard_view_all: 'Voir tout',
            dashboard_available_services: 'Services Disponibles',
            dashboard_empty_reservations: 'Aucune réservation pour le moment',
            dashboard_btn_explore: 'Explorer les services',
            dashboard_empty_services: 'Aucun service disponible pour le moment',
            dashboard_service_btn: 'Réserver',

            // Add Service Page
            add_service_page_title: 'Ajouter un service - ServicePro',
            add_service_title: 'Ajouter un service',
            add_service_label_name: 'Nom du service',
            add_service_label_category: 'Catégorie',
            add_service_placeholder_category: 'Plomberie, Peinture...',
            add_service_label_price: 'Prix (TND)',
            add_service_label_duration: 'Durée (minutes)',
            add_service_label_description: 'Description',
            add_service_btn_cancel: 'Annuler',
            add_service_btn_save: 'Enregistrer',

            // Provider Dashboard
            provider_page_title: 'Espace Prestataire - ServicePro',
            provider_welcome_desc: 'Gérez vos services et vos réservations depuis votre espace prestataire.',
            provider_stat_reservations: 'Total Réservations',
            provider_stat_pending: 'En attente',
            provider_stat_completed: 'Terminées',
            provider_stat_earnings: 'Gains Totaux',
            provider_recent_reservations: 'Réservations Récentes',
            provider_my_services: 'Mes Services',
            provider_btn_add_service: 'Ajouter',
            provider_empty_reservations: 'Aucune réservation pour le moment.',
            provider_empty_services: 'Vous n\'avez pas encore ajouté de services.',
            provider_btn_create_service: 'Créer un service',

            // Chat & Notifications
            chat_title: 'Messagerie',
            chat_empty: 'Vous n\'avez pas encore de conversations.',
            chat_placeholder: 'Écrivez votre message...',
            notifications_title: 'Notifications',
            notifications_empty: 'Aucune notification.',
            notifications_mark_all_read: 'Tout marquer comme lu',

            // Payment
            payment_card_number: 'Numéro de carte',
            payment_card_holder: 'Titulaire de la carte',
            payment_expiration_mm: 'Expiration MM',
            payment_expiration_yy: 'Expiration AA',
            payment_cvv: 'CVV',
            payment_btn_submit: 'Payer',
            payment_login_required: 'Vous devez être connecté pour accéder au paiement.',
            payment_btn_login: 'Se connecter',
            payment_btn_login: 'Se connecter',

            // Footer
            footer_desc: 'La plateforme qui connecte clients et prestataires de services en Tunisie',
            footer_title_services: 'Services',
            footer_title_about: 'À propos',
            footer_title_contact: 'Contact',
            footer_link_who: 'Qui sommes-nous',
            footer_link_how: 'Comment ça marche',
            footer_link_terms: 'Conditions',
            footer_link_privacy: 'Confidentialité',
            footer_rights: '© 2025 ServicePro. Tous droits réservés.',

            // AI Assistant
            ai_assistant_title: 'Assistant IA',
            ai_assistant_subtitle: 'Posez vos questions sur nos services',
            ai_service_online: 'En ligne',
            ai_service_offline: 'Hors ligne',
            ai_start_conversation: 'Commencez une conversation avec l\'assistant',
            ai_input_placeholder: 'Tapez votre message...',
            ai_send: 'Envoyer',
            ai_clear_history: 'Effacer l\'historique',
            ai_service_unavailable: 'Service temporairement indisponible',
            ai_info_title: 'À propos de l\'assistant',
            ai_info_description: 'Cet assistant répond uniquement aux questions concernant les services disponibles sur notre plateforme. Il utilise l\'intelligence artificielle pour vous fournir des informations précises basées sur notre base de données.',

            // About Page
            about_title: 'À propos de Nous',
            about_mission_title: 'Notre Mission',
            about_mission_desc: 'Connecter les talents, simplifier la vie.',
            about_text_1: 'Notre plateforme a été créée pour faciliter la vie des utilisateurs en leur permettant de trouver rapidement tous les services dont ils ont besoin, au même endroit.',
            about_text_2: 'Que vous cherchiez un électricien, un coiffeur, un plombier, un réparateur informatique ou tout autre service, notre site vous met en relation avec des prestataires fiables, qualifiés et proches de chez vous.',
            about_feature_speed_title: 'Rapidité',
            about_feature_speed_desc: 'Trouvez le bon prestataire en quelques clics seulement.',
            about_feature_reliability_title: 'Fiabilité',
            about_feature_reliability_desc: 'Des professionnels qualifiés et vérifiés pour votre tranquillité.',
            about_feature_proximity_title: 'Proximité',
            about_feature_proximity_desc: 'Des services disponibles près de chez vous, quand vous en avez besoin.',
            about_feature_payment_title: 'Paiement Sécurisé',
            about_feature_payment_desc: 'Transactions cryptées et sécurisées pour votre tranquillité d\'esprit.',
            about_cta_btn: 'Découvrir nos services',

        },
        en: {
            // Global / Navigation
            nav_home: 'Home',
            nav_services: 'Services',
            nav_ai_assistant: '🤖 AI Assistant',
            nav_dashboard: 'Dashboard',
            nav_payment: 'Payment',
            nav_profile: 'My Profile',
            nav_login: 'Login',
            nav_register: 'Register',
            nav_logout: 'Logout',

            // About Page
            about_title: 'About Us',
            about_mission_title: 'Our Mission',
            about_mission_desc: 'Connecting talents, simplifying life.',
            about_text_1: 'Our platform was created to make life easier for users by allowing them to quickly find all the services they need in one place.',
            about_text_2: 'Whether you are looking for an electrician, a hairdresser, a plumber, a computer repairer, or any other service, our site connects you with reliable, qualified providers near you.',
            about_feature_speed_title: 'Speed',
            about_feature_speed_desc: 'Find the right provider in just a few clicks.',
            about_feature_reliability_title: 'Reliability',
            about_feature_reliability_desc: 'Qualified and verified professionals for your peace of mind.',
            about_feature_proximity_title: 'Proximity',
            about_feature_proximity_desc: 'Services available near you, when you need them.',
            about_feature_payment_title: 'Secure Payment',
            about_feature_payment_desc: 'Encrypted and secure transactions for your peace of mind.',
            about_cta_btn: 'Discover our services',

            // Home Page
            badge_text: 'N°1 Platform in Tunisia',
            hero_title: 'Find the perfect provider',
            hero_description: 'Connect with qualified professionals for all your needs',
            btn_find_service: 'Find a service →',
            btn_become_provider: 'Become a provider',
            stat_users: 'Active users',
            stat_services: 'Completed services',
            stat_rating: 'Average rating',
            stat_satisfaction: 'Client satisfaction',
            overlay_reviews: '1000+ verified reviews',
            why_choose_badge: 'Why choose us',
            why_choose_title: 'Why choose us',
            why_choose_description: 'We offer a unique experience to connect clients and professional service providers',
            feature_verified: 'Verified providers',
            feature_verified_desc: 'All our providers are verified and rated',
            feature_secure: 'Secure payment',
            feature_secure_desc: 'Secure and transparent points system',
            feature_support: '24/7 Support',
            feature_support_desc: 'Our team is always here to help you',
            services_title: 'Our Services',
            services_description: 'Discover our best professionals',
            btn_view_all: 'View all services →',
            price_from: 'From',
            price_on_demand: 'Price on demand',
            btn_reserve: 'Reserve',
            how_it_works_title: 'How it works?',
            how_it_works_description: 'Find the perfect professional in a few clicks',
            step1_title: 'Browse services',
            step1_desc: 'Explore our catalog of qualified professionals in different fields',
            step2_title: 'Book online',
            step2_desc: 'Choose your provider and book directly on the platform',
            step3_title: 'Enjoy the service',
            step3_desc: 'Receive your service and leave your review to help the community',
            cta_title: 'Ready to find the perfect service?',
            cta_description: 'Join thousands of satisfied users and find the professional you need in a few clicks',
            btn_start_now: 'Start now →',

            // Services Page
            services_subtitle: 'Discover our qualified professionals for all your needs',
            search_placeholder: 'Search a service...',
            found_suffix: ' services found',
            sort_label: 'Sort:',
            sort_name_asc: 'Name ↑',
            sort_name_desc: 'Name ↓',
            sort_price_asc: 'Price ↑',
            sort_price_desc: 'Price ↓',
            sort_new: 'Newest',
            category_all: 'All categories',

            // Login Page
            login_badge: '🚀 Join ServicePro',
            login_welcome: 'Welcome back',
            login_desc: 'Login to access your professional services',
            login_form_title: 'Login',
            login_form_desc: 'Login to continue',
            login_placeholder_email: 'Your email',
            login_placeholder_password: 'Password',
            login_role_client: '👤 Client',
            login_role_provider: '🧰 Provider',
            login_btn_submit: 'Login',
            login_no_account: 'No account yet?',
            login_link_register: 'Register',

            // Register Page
            register_badge: '🚀 Join ServicePro',
            register_welcome: 'Start today',
            register_desc: 'Create your account and discover all our professional services',
            register_form_title: 'Create an account',
            register_form_desc: 'Join ServicePro now',
            register_placeholder_name: 'Your name',
            register_placeholder_email: 'Email',
            register_placeholder_phone: 'Phone',
            register_placeholder_address: 'Address',
            register_placeholder_password: 'Password',
            register_placeholder_confirm: 'Confirm password',
            register_role_client: 'Client',
            register_role_provider: 'Provider',
            register_btn_submit: 'Register',
            register_already_member: 'Already a member?',
            register_link_login: 'Login',

            // Profile Page
            profile_header_edit: 'Edit',
            profile_header_cancel: 'Cancel',
            profile_header_logout: 'Logout',
            profile_personal_info: 'Personal Information',
            profile_label_name: 'Name',
            profile_label_firstname: 'First Name',
            profile_label_email: 'Email',
            profile_label_phone: 'Phone',
            profile_label_address: 'Address',
            profile_bio_title: 'Biography',
            profile_bio_placeholder: 'Tell us about your experience and skills...',
            profile_skills_title: 'Skills',
            profile_skills_placeholder: 'Plumbing, Heating, Sanitary',
            profile_btn_save: 'Save changes',
            profile_btn_cancel_form: 'Cancel',
            profile_stat_gains: 'Total Earnings',
            profile_stat_completed: 'Completed Services',
            profile_stat_reviews: 'Reviews Received',

            // Dashboard
            dashboard_welcome_prefix: 'Welcome, ',
            dashboard_overview: 'Here is an overview of your activities',
            dashboard_stat_reservations: 'Total Reservations',
            dashboard_stat_pending: 'Pending',
            dashboard_stat_completed: 'Completed',
            dashboard_stat_total: 'Total Amount',
            dashboard_recent_reservations: 'Recent Reservations',
            dashboard_view_all: 'View all',
            dashboard_available_services: 'Available Services',
            dashboard_empty_reservations: 'No reservations yet',
            dashboard_btn_explore: 'Explore services',
            dashboard_empty_services: 'No services available yet',
            dashboard_service_btn: 'Reserve',

            // Payment
            payment_card_number: 'Card Number',
            payment_card_holder: 'Card Holder',
            payment_expiration_mm: 'Expiration MM',
            payment_expiration_yy: 'Expiration YY',
            payment_cvv: 'CVV',
            payment_btn_submit: 'Pay',
            payment_login_required: 'You must be logged in to access payment.',
            payment_btn_login: 'Login',

            // Add Service Page
            add_service_page_title: 'Add a Service - ServicePro',
            add_service_title: 'Add a service',
            add_service_label_name: 'Service Name',
            add_service_label_category: 'Category',
            add_service_placeholder_category: 'Plumbing, Painting...',
            add_service_label_price: 'Price (TND)',
            add_service_label_duration: 'Duration (minutes)',
            add_service_label_description: 'Description',
            add_service_btn_cancel: 'Cancel',
            add_service_btn_save: 'Save',

            // Provider Dashboard
            provider_page_title: 'Provider Area - ServicePro',
            provider_welcome_desc: 'Manage your services and reservations from your provider area.',
            provider_stat_reservations: 'Total Reservations',
            provider_stat_pending: 'Pending',
            provider_stat_completed: 'Completed',
            provider_stat_earnings: 'Total Earnings',
            provider_recent_reservations: 'Recent Reservations',
            provider_my_services: 'My Services',
            provider_btn_add_service: 'Add',
            provider_empty_reservations: 'No reservations yet.',
            provider_empty_services: 'You have not added any services yet.',
            provider_btn_create_service: 'Create a service',

            // Chat & Notifications
            chat_title: 'Messages',
            chat_empty: 'You have no conversations yet.',
            chat_placeholder: 'Write your message...',
            notifications_title: 'Notifications',
            notifications_empty: 'No notifications.',
            notifications_mark_all_read: 'Mark all as read',
            payment_btn_login: 'Login',

            // Footer
            footer_desc: 'The platform connecting clients and service providers in Tunisia',
            footer_title_services: 'Services',
            footer_title_about: 'About',
            footer_title_contact: 'Contact',
            footer_link_who: 'Who we are',
            footer_link_how: 'How it works',
            footer_link_terms: 'Terms',
            footer_link_privacy: 'Privacy',
            footer_rights: '© 2025 ServicePro. All rights reserved.',

            // AI Assistant
            ai_assistant_title: 'AI Assistant',
            ai_assistant_subtitle: 'Ask questions about our services',
            ai_service_online: 'Online',
            ai_service_offline: 'Offline',
            ai_start_conversation: 'Start a conversation with the assistant',
            ai_input_placeholder: 'Type your message...',
            ai_send: 'Send',
            ai_clear_history: 'Clear history',
            ai_service_unavailable: 'Service temporarily unavailable',
            ai_info_title: 'About the assistant',
            ai_info_description: 'This assistant only answers questions about services available on our platform. It uses artificial intelligence to provide you with accurate information based on our database.'

        }
    };

    function applyLang(lang) {
        const dict = t[lang] || t.fr;

        // --- GLOBAL ---
        document.documentElement.setAttribute('lang', lang);
        localStorage.setItem('lang', lang);

        // Update Select Value if it exists
        const langSelect = document.getElementById('langSelect');
        if (langSelect && langSelect.value !== lang) {
            langSelect.value = lang;
        }

        // --- GENERIC DATA-I18N HANDLER ---
        document.querySelectorAll('[data-i18n]').forEach(element => {
            const key = element.getAttribute('data-i18n');
            if (dict[key]) {
                if (element.tagName === 'INPUT' && (element.type === 'submit' || element.type === 'button')) {
                    element.value = dict[key];
                } else if (element.tagName === 'INPUT' && element.type === 'text' && element.hasAttribute('placeholder')) {
                    element.placeholder = dict[key];
                } else {
                    element.textContent = dict[key];
                }
            }
        });

        // Handle data-i18n-placeholder attributes
        document.querySelectorAll('[data-i18n-placeholder]').forEach(element => {
            const key = element.getAttribute('data-i18n-placeholder');
            if (dict[key]) {
                element.placeholder = dict[key];
            }
        });


        // --- HOME PAGE ---

        // Hero section
        const badgeText = document.querySelector('.badge span:last-child');
        if (badgeText) badgeText.textContent = dict.badge_text;

        const heroTitle = document.querySelector('.hero-title');
        if (heroTitle) heroTitle.textContent = dict.hero_title;

        const heroDesc = document.querySelector('.hero-description');
        if (heroDesc) heroDesc.textContent = dict.hero_description;

        const btnFindService = document.querySelector('.hero-buttons .btn-gradient');
        if (btnFindService) btnFindService.textContent = dict.btn_find_service;

        const btnBecomeProvider = document.querySelector('.hero-buttons .btn-outline');
        if (btnBecomeProvider) btnBecomeProvider.textContent = dict.btn_become_provider;

        // Stats
        const statLabels = document.querySelectorAll('.stat-label');
        if (statLabels.length >= 4) {
            statLabels[0].textContent = dict.stat_users;
            statLabels[1].textContent = dict.stat_services;
            statLabels[2].textContent = dict.stat_rating;
            statLabels[3].textContent = dict.stat_satisfaction;
        }

        // Overlay
        const overlayText = document.querySelector('.overlay-text');
        if (overlayText) overlayText.textContent = dict.overlay_reviews;

        // Why choose us
        const whyBadge = document.querySelector('.why-choose-us .section-badge span:last-child');
        if (whyBadge) whyBadge.textContent = dict.why_choose_badge;

        const whyTitle = document.querySelector('.why-choose-us .section-title');
        if (whyTitle) whyTitle.textContent = dict.why_choose_title;

        const whyDesc = document.querySelector('.why-choose-us .section-description');
        if (whyDesc) whyDesc.textContent = dict.why_choose_description;

        const featureTitles = document.querySelectorAll('.feature-title');
        const featureDescs = document.querySelectorAll('.feature-description');
        // We check length to avoid errors if structure changes
        if (featureTitles.length >= 3 && featureDescs.length >= 3) {
            featureTitles[0].textContent = dict.feature_verified;
            featureDescs[0].textContent = dict.feature_verified_desc;
            featureTitles[1].textContent = dict.feature_secure;
            featureDescs[1].textContent = dict.feature_secure_desc;
            featureTitles[2].textContent = dict.feature_support;
            featureDescs[2].textContent = dict.feature_support_desc;
        }

        // Services section (Home & Services Page)
        // Note: .services .section-title is on Home, .services-main-title is on Services page
        const servicesTitle = document.querySelector('.services .section-title');
        if (servicesTitle) servicesTitle.textContent = dict.services_title;

        const servicesMainTitle = document.querySelector('.services-main-title');
        if (servicesMainTitle) servicesMainTitle.textContent = dict.services_title;

        const servicesDesc = document.querySelector('.services .section-description');
        if (servicesDesc) servicesDesc.textContent = dict.services_description;

        const servicesSubtitle = document.querySelector('.services-subtitle');
        if (servicesSubtitle) servicesSubtitle.textContent = dict.services_subtitle;

        const btnViewAll = document.querySelector('.services-header .btn-outline');
        if (btnViewAll) btnViewAll.textContent = dict.btn_view_all;

        // Service cards (Common)
        const priceFrom = document.querySelectorAll('.service-price');
        priceFrom.forEach(el => {
            const text = el.textContent;
            // We need a robust way to replace text while keeping the price number
            // Assuming structure "À partir de X TND" or "From X TND"
            // We look for the number
            const priceMatch = text.match(/(\d+)/);
            if (priceMatch) {
                el.innerHTML = dict.price_from + ' <span>' + priceMatch[1] + ' TND</span>';
            } else if (text.includes('Prix sur demande') || text.includes('Price on demand')) {
                el.textContent = dict.price_on_demand;
            }
        });

        const reserveBtns = document.querySelectorAll('.reserve-btn');
        reserveBtns.forEach(btn => {
            btn.textContent = dict.btn_reserve;
        });

        // How it works
        const howTitle = document.querySelector('.how-it-works .section-title');
        if (howTitle) howTitle.textContent = dict.how_it_works_title;

        const howDesc = document.querySelector('.how-it-works .section-description');
        if (howDesc) howDesc.textContent = dict.how_it_works_description;

        const stepTitles = document.querySelectorAll('.step-title');
        const stepDescs = document.querySelectorAll('.step-description');
        if (stepTitles.length >= 3 && stepDescs.length >= 3) {
            stepTitles[0].textContent = dict.step1_title;
            stepDescs[0].textContent = dict.step1_desc;
            stepTitles[1].textContent = dict.step2_title;
            stepDescs[1].textContent = dict.step2_desc;
            stepTitles[2].textContent = dict.step3_title;
            stepDescs[2].textContent = dict.step3_desc;
        }

        // CTA
        const ctaTitle = document.querySelector('.cta-title');
        if (ctaTitle) ctaTitle.textContent = dict.cta_title;

        const ctaDesc = document.querySelector('.cta-description');
        if (ctaDesc) ctaDesc.textContent = dict.cta_description;

        const btnStartNow = document.querySelector('.cta .btn-white, .cta .signup-btn'); // Adjusted selector
        if (btnStartNow) btnStartNow.textContent = dict.btn_start_now;

        // --- SERVICES PAGE SPECIFIC ---
        const search = document.getElementById('serviceSearch');
        if (search) search.placeholder = dict.search_placeholder;

        const resultsCount = document.querySelector('.results-count');
        if (resultsCount) {
            const nb = (resultsCount.textContent.match(/^\d+/) || ['0'])[0];
            resultsCount.textContent = nb + dict.found_suffix;
        }

        // --- LOGIN PAGE ---
        const loginBadge = document.querySelector('.left-section .badge');
        if (loginBadge && loginBadge.textContent.includes('ServicePro')) loginBadge.textContent = dict.login_badge;

        const loginWelcome = document.querySelector('.left-section h1');
        if (loginWelcome) loginWelcome.textContent = dict.login_welcome;

        const loginDesc = document.querySelector('.left-section p');
        if (loginDesc) loginDesc.textContent = dict.login_desc;

        const loginFormTitle = document.querySelector('.form-section h2');
        if (loginFormTitle) loginFormTitle.textContent = dict.login_form_title;

        const loginFormDesc = document.querySelector('.form-section p');
        if (loginFormDesc) loginFormDesc.textContent = dict.login_form_desc;

        const loginEmail = document.querySelector('input[name="_username"]');
        if (loginEmail) loginEmail.placeholder = dict.login_placeholder_email;

        const loginPassword = document.querySelector('input[name="_password"]');
        if (loginPassword) loginPassword.placeholder = dict.login_placeholder_password;

        const loginRoleClient = document.querySelector('.role-option[data-role="client"]');
        if (loginRoleClient) loginRoleClient.innerHTML = dict.login_role_client;

        const loginRoleProvider = document.querySelector('.role-option[data-role="prestataire"]');
        if (loginRoleProvider) loginRoleProvider.innerHTML = dict.login_role_provider;

        const loginBtn = document.querySelector('.form-section .submit-btn');
        if (loginBtn) loginBtn.textContent = dict.login_btn_submit;

        const loginLink = document.querySelector('.form-section .login-link');
        if (loginLink) {
            loginLink.childNodes[0].textContent = dict.login_no_account + ' ';
            const a = loginLink.querySelector('a');
            if (a) a.textContent = dict.login_link_register;
        }

        // --- REGISTER PAGE ---
        const registerBadge = document.querySelector('.left-section .badge');
        if (registerBadge && registerBadge.textContent.includes('ServicePro')) registerBadge.textContent = dict.register_badge;

        const registerWelcome = document.querySelector('.left-section h1');
        if (registerWelcome) registerWelcome.textContent = dict.register_welcome;

        const registerDesc = document.querySelector('.left-section p');
        if (registerDesc) registerDesc.textContent = dict.register_desc;

        const registerFormTitle = document.querySelector('.form-section h2');
        if (registerFormTitle) registerFormTitle.textContent = dict.register_form_title;

        const registerFormDesc = document.querySelector('.form-section p');
        if (registerFormDesc) registerFormDesc.textContent = dict.register_form_desc;

        const regName = document.querySelector('input[name="nom"]');
        if (regName) regName.placeholder = dict.register_placeholder_name;

        const regEmail = document.querySelector('input[name="email"]');
        if (regEmail) regEmail.placeholder = dict.register_placeholder_email;

        const regTel = document.querySelector('input[name="tel"]');
        if (regTel) regTel.placeholder = dict.register_placeholder_phone;

        const regAddr = document.querySelector('input[name="adresse"]');
        if (regAddr) regAddr.placeholder = dict.register_placeholder_address;

        const regPass = document.querySelector('input[name="password"]');
        if (regPass) regPass.placeholder = dict.register_placeholder_password;

        const regConfirm = document.querySelector('input[name="confirm_password"]');
        if (regConfirm) regConfirm.placeholder = dict.register_placeholder_confirm;

        const regRoleClient = document.querySelector('.role-option[data-role="client"] span');
        if (regRoleClient) regRoleClient.textContent = dict.register_role_client;

        const regRoleProvider = document.querySelector('.role-option[data-role="prestataire"] span');
        if (regRoleProvider) regRoleProvider.textContent = dict.register_role_provider;

        const regBtn = document.querySelector('.form-section .submit-btn');
        if (regBtn) regBtn.textContent = dict.register_btn_submit;

        const regLink = document.querySelector('.form-section .login-link');
        if (regLink) {
            regLink.childNodes[0].textContent = dict.register_already_member + ' ';
            const a = regLink.querySelector('a');
            if (a) a.textContent = dict.register_link_login;
        }

        // --- PROFILE PAGE ---
        const profileEditBtn = document.getElementById('edit-btn');
        if (profileEditBtn) profileEditBtn.textContent = dict.profile_header_edit;

        const profileCancelBtn = document.getElementById('cancel-btn');
        if (profileCancelBtn) profileCancelBtn.textContent = dict.profile_header_cancel;

        const profileLogoutBtn = document.querySelector('.btn-logout');
        if (profileLogoutBtn) profileLogoutBtn.innerHTML = '<i class="bi bi-box-arrow-right"></i> ' + dict.profile_header_logout;

        const profileSections = document.querySelectorAll('.profile-section h3');
        if (profileSections.length >= 3) {
            profileSections[0].textContent = dict.profile_personal_info;
            profileSections[1].textContent = dict.profile_bio_title;
            profileSections[2].textContent = dict.profile_skills_title;
        }

        const profileLabels = document.querySelectorAll('.profile-section label');
        if (profileLabels.length >= 5) {
            profileLabels[0].textContent = dict.profile_label_name;
            profileLabels[1].textContent = dict.profile_label_firstname;
            profileLabels[2].textContent = dict.profile_label_email;
            profileLabels[3].textContent = dict.profile_label_phone;
            profileLabels[4].textContent = dict.profile_label_address;
        }

        const profileBio = document.querySelector('textarea[name="bio"]');
        if (profileBio) profileBio.placeholder = dict.profile_bio_placeholder;

        const profileSkills = document.querySelector('input[name="competences"]');
        if (profileSkills) profileSkills.placeholder = dict.profile_skills_placeholder;

        const profileSaveBtn = document.querySelector('.form-actions .btn-primary');
        if (profileSaveBtn) profileSaveBtn.textContent = dict.profile_btn_save;

        const profileCancelFormBtn = document.getElementById('cancel-form-btn');
        if (profileCancelFormBtn) profileCancelFormBtn.textContent = dict.profile_btn_cancel_form;

        const profileStatLabels = document.querySelectorAll('.profile-card .stat-label');
        if (profileStatLabels.length >= 3) {
            profileStatLabels[0].textContent = dict.profile_stat_gains;
            profileStatLabels[1].textContent = dict.profile_stat_completed;
            profileStatLabels[2].textContent = dict.profile_stat_reviews;
        }

        // --- DASHBOARD (CLIENT) ---
        // Note: Provider dashboard uses similar classes but might need specific targeting if they conflict
        // We will check for provider specific elements first or use specific selectors

        const dashWelcome = document.querySelector('.welcome-section h1');
        if (dashWelcome) {
            const name = dashWelcome.textContent.replace('Bienvenue, ', '').replace('Welcome, ', '').replace(' !', '');
            dashWelcome.textContent = dict.dashboard_welcome_prefix + name + ' !';
        }

        const dashOverview = document.querySelector('.welcome-section p');
        if (dashOverview) {
            // Check if it's provider dashboard or client dashboard
            // Provider text: "Gérez vos services..."
            // Client text: "Voici un aperçu..."
            // We can check the text content or just overwrite if we are sure
            // But better to check context.
            // Let's assume if we are on provider dashboard, we use provider text.
            // How to know? Maybe check for "Mes Services" card?
            const myServicesCard = document.querySelector('.sidebar .card-header h2');
            if (myServicesCard && myServicesCard.textContent.includes('Services')) {
                dashOverview.textContent = dict.provider_welcome_desc;
            } else {
                dashOverview.textContent = dict.dashboard_overview;
            }
        }

        const dashStatContents = document.querySelectorAll('.stat-content p');
        // Client dashboard uses .stat-content p. Provider dashboard uses .stat-label.
        // Let's handle Provider Dashboard Stats
        const providerStatLabels = document.querySelectorAll('.dashboard-container .stat-label');
        if (providerStatLabels.length >= 4) {
            providerStatLabels[0].textContent = dict.provider_stat_reservations;
            providerStatLabels[1].textContent = dict.provider_stat_pending;
            providerStatLabels[2].textContent = dict.provider_stat_completed;
            providerStatLabels[3].textContent = dict.provider_stat_earnings;
        } else if (dashStatContents.length >= 4) {
            // Client Dashboard
            dashStatContents[0].textContent = dict.dashboard_stat_reservations;
            dashStatContents[1].textContent = dict.dashboard_stat_pending;
            dashStatContents[2].textContent = dict.dashboard_stat_completed;
            dashStatContents[3].textContent = dict.dashboard_stat_total;
        }

        const dashCardHeaders = document.querySelectorAll('.card-header h2');
        if (dashCardHeaders.length >= 2) {
            // Check if provider dashboard
            if (dashCardHeaders[1].innerHTML.includes('Services') && dashCardHeaders[1].innerHTML.includes('Mes')) {
                dashCardHeaders[0].innerHTML = '<i class="bi bi-calendar-check"></i> ' + dict.provider_recent_reservations;
                dashCardHeaders[1].innerHTML = '<i class="bi bi-tools"></i> ' + dict.provider_my_services;
            } else {
                dashCardHeaders[0].innerHTML = '<i class="bi bi-list-ul"></i> ' + dict.dashboard_recent_reservations;
                dashCardHeaders[1].innerHTML = '<i class="bi bi-grid"></i> ' + dict.dashboard_available_services;
            }
        }

        const dashViewAll = document.querySelectorAll('.view-all');
        dashViewAll.forEach(el => el.textContent = dict.dashboard_view_all);

        const dashEmpty = document.querySelectorAll('.empty-state p');
        if (dashEmpty.length > 0) {
            dashEmpty.forEach(el => {
                if (el.textContent.includes('réservation') || el.textContent.includes('reservation')) {
                    el.textContent = dict.provider_empty_reservations; // or dashboard_empty_reservations, same text mostly
                }
                if (el.textContent.includes('service') && el.textContent.includes('ajouté')) {
                    el.textContent = dict.provider_empty_services;
                } else if (el.textContent.includes('service')) {
                    el.textContent = dict.dashboard_empty_services;
                }
            });
        }

        const dashExploreBtn = document.querySelector('.empty-state .btn-primary');
        if (dashExploreBtn) {
            if (dashExploreBtn.textContent.includes('Créer')) {
                dashExploreBtn.textContent = dict.provider_btn_create_service;
            } else {
                dashExploreBtn.textContent = dict.dashboard_btn_explore;
            }
        }

        const dashServiceBtns = document.querySelectorAll('.service-btn');
        dashServiceBtns.forEach(btn => btn.textContent = dict.dashboard_service_btn);

        const providerAddServiceBtn = document.querySelector('.card-header .btn-primary');
        if (providerAddServiceBtn) providerAddServiceBtn.innerHTML = '<i class="bi bi-plus"></i> ' + dict.provider_btn_add_service;


        // --- PAYMENT ---
        const payCardNum = document.querySelector('.inputBox:nth-child(1) span');
        if (payCardNum) payCardNum.textContent = dict.payment_card_number;

        const payCardHolder = document.querySelector('.inputBox:nth-child(2) span');
        if (payCardHolder) payCardHolder.textContent = dict.payment_card_holder;

        const payExpMM = document.querySelector('.flexbox .inputBox:nth-child(1) span');
        if (payExpMM) payExpMM.textContent = dict.payment_expiration_mm;

        const payExpYY = document.querySelector('.flexbox .inputBox:nth-child(2) span');
        if (payExpYY) payExpYY.textContent = dict.payment_expiration_yy;

        const payCVV = document.querySelector('.flexbox .inputBox:nth-child(3) span');
        if (payCVV) payCVV.textContent = dict.payment_cvv;

        const paySubmit = document.querySelector('.submit-btn');
        if (paySubmit && (paySubmit.value === 'Submit' || paySubmit.value === 'Payer')) paySubmit.value = dict.payment_btn_submit;

        const payNotLogged = document.querySelector('.not-logged h2');
        if (payNotLogged) payNotLogged.textContent = dict.payment_login_required;

        const payLoginBtn = document.querySelector('.not-logged .btn-primary');
        if (payLoginBtn) payLoginBtn.textContent = dict.payment_btn_login;

        // --- ADD SERVICE PAGE ---
        const addServiceTitle = document.querySelector('.page-container h1');
        if (addServiceTitle) {
            addServiceTitle.textContent = dict.add_service_title;
            document.title = dict.add_service_page_title;
        }

        const addServiceLabelName = document.querySelector('label[for="nomService"]');
        if (addServiceLabelName) addServiceLabelName.textContent = dict.add_service_label_name;

        const addServiceLabelCat = document.querySelector('label[for="categorie"]');
        if (addServiceLabelCat) addServiceLabelCat.textContent = dict.add_service_label_category;

        const addServiceInputCat = document.querySelector('input[name="categorie"]');
        if (addServiceInputCat) addServiceInputCat.placeholder = dict.add_service_placeholder_category;

        const addServiceLabelPrice = document.querySelector('label[for="prix"]');
        if (addServiceLabelPrice) addServiceLabelPrice.textContent = dict.add_service_label_price;

        const addServiceLabelDuration = document.querySelector('label[for="duree"]');
        if (addServiceLabelDuration) addServiceLabelDuration.textContent = dict.add_service_label_duration;

        const addServiceLabelDesc = document.querySelector('label[for="description"]');
        if (addServiceLabelDesc) addServiceLabelDesc.textContent = dict.add_service_label_description;

        const addServiceBtnCancel = document.querySelector('.service-form .btn-outline');
        if (addServiceBtnCancel) addServiceBtnCancel.textContent = dict.add_service_btn_cancel;

        const addServiceBtnSave = document.querySelector('.service-form .btn-primary');
        if (addServiceBtnSave) addServiceBtnSave.textContent = dict.add_service_btn_save;

        // --- CHAT & NOTIFICATIONS ---
        const chatHeader = document.querySelector('.chat-header h1');
        if (chatHeader) chatHeader.textContent = dict.chat_title;

        const chatEmpty = document.querySelector('.chat-container .empty-state p');
        if (chatEmpty) chatEmpty.textContent = dict.chat_empty;

        const chatPlaceholder = document.querySelector('.message-input');
        if (chatPlaceholder) chatPlaceholder.placeholder = dict.chat_placeholder;

        const notifHeader = document.querySelector('.notifications-header h1');
        if (notifHeader) notifHeader.textContent = dict.notifications_title;

        const notifEmpty = document.querySelector('.notifications-container .empty-state p');
        if (notifEmpty) notifEmpty.textContent = dict.notifications_empty;

        const notifMarkAll = document.querySelector('.btn-mark-read');
        if (notifMarkAll) notifMarkAll.textContent = dict.notifications_mark_all_read;

        // Dispatch event for other scripts
        const event = new CustomEvent('langchange', { detail: { lang: lang } });
        document.dispatchEvent(event);
    }

    // Initialize
    function init() {
        // Listen for selector change
        const langSelect = document.getElementById('langSelect');
        if (langSelect) {
            // Remove old listener to avoid duplicates if re-initialized
            const newSelect = langSelect.cloneNode(true);
            langSelect.parentNode.replaceChild(newSelect, langSelect);

            newSelect.addEventListener('change', function () {
                applyLang(this.value);
            });

            // Set initial value
            const storedLang = localStorage.getItem('lang') || 'fr';
            if (newSelect.value !== storedLang) {
                newSelect.value = storedLang;
            }
        }

        // Load saved language
        const storedLang = localStorage.getItem('lang') || 'fr';
        applyLang(storedLang);
    }

    document.addEventListener('DOMContentLoaded', init);
    document.addEventListener('turbo:load', init);

    // Expose globally if needed
    window.applyLang = applyLang;

})();
