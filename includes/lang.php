<?php
/**
 * ============================================================
 *  MULTI-LANGUAGE SUPPORT  (English / French / Arabic)
 * ============================================================
 *  Switch language with ?lang=en | fr | ar  (saved in session
 *  and a cookie). Use t('key') anywhere to print translated text.
 * ============================================================
 */

$GLOBALS['LANGS'] = [
    'en' => ['label' => 'EN', 'name' => 'English',  'dir' => 'ltr'],
    'fr' => ['label' => 'FR', 'name' => 'Français', 'dir' => 'ltr'],
    'ar' => ['label' => 'AR', 'name' => 'العربية',  'dir' => 'rtl'],
];

$GLOBALS['TRANSLATIONS'] = [
    // -------- English --------
    'en' => [
        'tagline'          => 'Custom 3D Printed Creations',
        'nav_shop'         => 'Shop',
        'nav_about'        => 'About',
        'nav_contact'      => 'Contact',
        'nav_admin'        => 'Admin',
        'lang_label'       => 'Language',

        'hero_eyebrow'     => '3D Printed · Made to order',
        'hero_title'       => 'Unique things, printed layer by layer.',
        'hero_lead'        => 'Browse the collection and message me to order any piece — custom colors and sizes welcome.',
        'hero_browse'      => 'Browse products',
        'hero_custom'      => 'Request a custom print',

        'shop_products'    => 'Products',
        'shop_search_ph'   => 'Search products…',
        'shop_search_btn'  => 'Search',
        'shop_all'         => 'All',
        'shop_empty'       => 'No products found. Please check back soon.',
        'shop_view'        => 'View details',

        'order_hint'       => 'Leave your name and phone — we\'ll call you to confirm.',
        'order_name'       => 'Your name',
        'order_phone'      => 'Phone',
        'order_now'        => 'Order now',
        'order_sending'    => 'Sending…',
        'order_error'      => 'Something went wrong. Please try again.',
        'order_network'    => 'Network error. Please try again.',
        'success_title'    => 'Congratulations!',
        'success_text'     => 'Your order has been sent successfully. We\'ll call you soon to confirm the details.',
        'success_btn'      => 'Great, thanks!',
        'modal_close'      => 'Close',

        'about_eyebrow'    => 'About',
        'about_title'      => 'What I do',
        'about_lead'       => 'Hi, I\'m the maker behind %s. I design and 3D print original, functional and decorative objects — from articulated toys and home decor to practical desk gadgets and fully custom pieces.',
        'about_p1'         => 'Every item you see here is printed by me on my own machines, using quality PLA and PETG filaments. I care about clean layers, strong parts and finishes that feel good in the hand.',
        'about_p2'         => 'Need something specific? I take custom orders — send me your idea, a reference image, the colors and the size, and I\'ll print it for you.',
        'about_f1_t'       => 'Custom colors',
        'about_f1_d'       => 'Choose the filament color and finish that fits your space or gift.',
        'about_f2_t'       => 'Made to order',
        'about_f2_d'       => 'Each piece is printed fresh when you order, no mass production.',
        'about_f3_t'       => 'Local & fast',
        'about_f3_d'       => 'Based in %s, quick to respond and ship.',
        'about_see_shop'   => 'See the shop',
        'about_get_touch'  => 'Get in touch',

        'contact_eyebrow'  => 'Contact',
        'contact_title'    => 'Let\'s make something',
        'contact_lead'     => 'Have a question about a product or a custom idea? Send me a message and I\'ll get back to you.',
        'contact_email'    => 'Email',
        'contact_phone'    => 'Phone',
        'contact_location' => 'Location',
        'contact_sent_t'   => 'Message sent!',
        'contact_sent_d'   => 'Thanks — your message has been received. I\'ll reply as soon as possible.',
        'contact_back'     => 'Back to shop',
        'contact_f_name'   => 'Your name *',
        'contact_f_email'  => 'Email *',
        'contact_f_phone'  => 'Phone',
        'contact_f_subject'=> 'Subject',
        'contact_f_msg'    => 'Message *',
        'contact_send'     => 'Send message',
        'err_name'         => 'Please enter your name.',
        'err_email'        => 'Please enter a valid email address.',
        'err_body'         => 'Please write a message.',

        'footer_rights'    => 'All rights reserved.',
    ],

    // -------- French --------
    'fr' => [
        'tagline'          => 'Créations Personnalisées en Impression 3D',
        'nav_shop'         => 'Boutique',
        'nav_about'        => 'À propos',
        'nav_contact'      => 'Contact',
        'nav_admin'        => 'Admin',
        'lang_label'       => 'Langue',

        'hero_eyebrow'     => 'Imprimé en 3D · Sur commande',
        'hero_title'       => 'Des objets uniques, imprimés couche par couche.',
        'hero_lead'        => 'Parcourez la collection et écrivez-moi pour commander une pièce — couleurs et tailles personnalisées bienvenues.',
        'hero_browse'      => 'Voir les produits',
        'hero_custom'      => 'Demander une impression sur mesure',

        'shop_products'    => 'Produits',
        'shop_search_ph'   => 'Rechercher des produits…',
        'shop_search_btn'  => 'Rechercher',
        'shop_all'         => 'Tous',
        'shop_empty'       => 'Aucun produit trouvé. Revenez bientôt.',
        'shop_view'        => 'Voir les détails',

        'order_hint'       => 'Laissez votre nom et téléphone — nous vous appellerons pour confirmer.',
        'order_name'       => 'Votre nom',
        'order_phone'      => 'Téléphone',
        'order_now'        => 'Commander',
        'order_sending'    => 'Envoi…',
        'order_error'      => 'Une erreur est survenue. Veuillez réessayer.',
        'order_network'    => 'Erreur réseau. Veuillez réessayer.',
        'success_title'    => 'Félicitations !',
        'success_text'     => 'Votre commande a bien été envoyée. Nous vous appellerons bientôt pour confirmer les détails.',
        'success_btn'      => 'Parfait, merci !',
        'modal_close'      => 'Fermer',

        'about_eyebrow'    => 'À propos',
        'about_title'      => 'Ce que je fais',
        'about_lead'       => 'Bonjour, je suis le créateur derrière %s. Je conçois et imprime en 3D des objets originaux, fonctionnels et décoratifs — des jouets articulés à la déco, en passant par des gadgets de bureau et des pièces entièrement personnalisées.',
        'about_p1'         => 'Chaque article ici est imprimé par mes soins sur mes propres machines, avec des filaments PLA et PETG de qualité. Je soigne les couches, la solidité et les finitions agréables au toucher.',
        'about_p2'         => 'Besoin de quelque chose de précis ? J\'accepte les commandes sur mesure — envoyez-moi votre idée, une image de référence, les couleurs et la taille, et je l\'imprime pour vous.',
        'about_f1_t'       => 'Couleurs personnalisées',
        'about_f1_d'       => 'Choisissez la couleur et la finition du filament adaptées à votre espace ou cadeau.',
        'about_f2_t'       => 'Sur commande',
        'about_f2_d'       => 'Chaque pièce est imprimée à la commande, sans production de masse.',
        'about_f3_t'       => 'Local & rapide',
        'about_f3_d'       => 'Basé à %s, réponse et expédition rapides.',
        'about_see_shop'   => 'Voir la boutique',
        'about_get_touch'  => 'Me contacter',

        'contact_eyebrow'  => 'Contact',
        'contact_title'    => 'Créons quelque chose',
        'contact_lead'     => 'Une question sur un produit ou une idée sur mesure ? Envoyez-moi un message et je vous répondrai.',
        'contact_email'    => 'E-mail',
        'contact_phone'    => 'Téléphone',
        'contact_location' => 'Localisation',
        'contact_sent_t'   => 'Message envoyé !',
        'contact_sent_d'   => 'Merci — votre message a bien été reçu. Je répondrai dès que possible.',
        'contact_back'     => 'Retour à la boutique',
        'contact_f_name'   => 'Votre nom *',
        'contact_f_email'  => 'E-mail *',
        'contact_f_phone'  => 'Téléphone',
        'contact_f_subject'=> 'Sujet',
        'contact_f_msg'    => 'Message *',
        'contact_send'     => 'Envoyer le message',
        'err_name'         => 'Veuillez saisir votre nom.',
        'err_email'        => 'Veuillez saisir une adresse e-mail valide.',
        'err_body'         => 'Veuillez écrire un message.',

        'footer_rights'    => 'Tous droits réservés.',
    ],

    // -------- Arabic --------
    'ar' => [
        'tagline'          => 'إبداعات مخصصة بالطباعة ثلاثية الأبعاد',
        'nav_shop'         => 'المتجر',
        'nav_about'        => 'من نحن',
        'nav_contact'      => 'اتصل بنا',
        'nav_admin'        => 'الإدارة',
        'lang_label'       => 'اللغة',

        'hero_eyebrow'     => 'طباعة ثلاثية الأبعاد · حسب الطلب',
        'hero_title'       => 'قطع فريدة، مطبوعة طبقةً تلو الأخرى.',
        'hero_lead'        => 'تصفّح المجموعة وراسلني لطلب أي قطعة — الألوان والأحجام المخصّصة مرحّب بها.',
        'hero_browse'      => 'تصفّح المنتجات',
        'hero_custom'      => 'اطلب طباعة مخصّصة',

        'shop_products'    => 'المنتجات',
        'shop_search_ph'   => 'ابحث عن المنتجات…',
        'shop_search_btn'  => 'بحث',
        'shop_all'         => 'الكل',
        'shop_empty'       => 'لا توجد منتجات. يرجى العودة قريبًا.',
        'shop_view'        => 'عرض التفاصيل',

        'order_hint'       => 'اترك اسمك ورقم هاتفك — سنتصل بك للتأكيد.',
        'order_name'       => 'اسمك',
        'order_phone'      => 'الهاتف',
        'order_now'        => 'اطلب الآن',
        'order_sending'    => 'جارٍ الإرسال…',
        'order_error'      => 'حدث خطأ ما. يرجى المحاولة مرة أخرى.',
        'order_network'    => 'خطأ في الشبكة. يرجى المحاولة مرة أخرى.',
        'success_title'    => 'تهانينا!',
        'success_text'     => 'تم إرسال طلبك بنجاح. سنتصل بك قريبًا لتأكيد التفاصيل.',
        'success_btn'      => 'رائع، شكرًا!',
        'modal_close'      => 'إغلاق',

        'about_eyebrow'    => 'من نحن',
        'about_title'      => 'ماذا أفعل',
        'about_lead'       => 'مرحبًا، أنا صاحب %s. أصمّم وأطبع بتقنية ثلاثية الأبعاد قطعًا أصلية وعملية وزخرفية — من الألعاب المفصّلة وديكور المنزل إلى أدوات المكتب العملية والقطع المخصّصة بالكامل.',
        'about_p1'         => 'كل قطعة تراها هنا مطبوعة بنفسي على آلاتي الخاصة، باستخدام خيوط PLA وPETG عالية الجودة. أهتمّ بالطبقات النظيفة والأجزاء المتينة واللمسات النهائية المريحة.',
        'about_p2'         => 'تحتاج شيئًا محدّدًا؟ أقبل الطلبات المخصّصة — أرسل لي فكرتك وصورة مرجعية والألوان والحجم، وسأطبعها لك.',
        'about_f1_t'       => 'ألوان مخصّصة',
        'about_f1_d'       => 'اختر لون الخيط واللمسة النهائية التي تناسب مساحتك أو هديتك.',
        'about_f2_t'       => 'حسب الطلب',
        'about_f2_d'       => 'تُطبع كل قطعة طازجة عند الطلب، دون إنتاج ضخم.',
        'about_f3_t'       => 'محلي وسريع',
        'about_f3_d'       => 'مقرّي في %s، سريع في الرد والشحن.',
        'about_see_shop'   => 'تصفّح المتجر',
        'about_get_touch'  => 'تواصل معي',

        'contact_eyebrow'  => 'اتصل بنا',
        'contact_title'    => 'لنصنع شيئًا',
        'contact_lead'     => 'لديك سؤال عن منتج أو فكرة مخصّصة؟ أرسل لي رسالة وسأعود إليك.',
        'contact_email'    => 'البريد الإلكتروني',
        'contact_phone'    => 'الهاتف',
        'contact_location' => 'الموقع',
        'contact_sent_t'   => 'تم إرسال الرسالة!',
        'contact_sent_d'   => 'شكرًا — تم استلام رسالتك. سأرد في أقرب وقت ممكن.',
        'contact_back'     => 'العودة إلى المتجر',
        'contact_f_name'   => 'اسمك *',
        'contact_f_email'  => 'البريد الإلكتروني *',
        'contact_f_phone'  => 'الهاتف',
        'contact_f_subject'=> 'الموضوع',
        'contact_f_msg'    => 'الرسالة *',
        'contact_send'     => 'إرسال الرسالة',
        'err_name'         => 'يرجى إدخال اسمك.',
        'err_email'        => 'يرجى إدخال بريد إلكتروني صحيح.',
        'err_body'         => 'يرجى كتابة رسالة.',

        'footer_rights'    => 'جميع الحقوق محفوظة.',
    ],
];

/** Resolve and persist the active language. */
function init_lang() {
    $langs = $GLOBALS['LANGS'];
    if (isset($_GET['lang']) && isset($langs[$_GET['lang']])) {
        $_SESSION['lang'] = $_GET['lang'];
        setcookie('lang', $_GET['lang'], time() + 60 * 60 * 24 * 365, '/');
    } elseif (empty($_SESSION['lang'])) {
        $_SESSION['lang'] = (isset($_COOKIE['lang']) && isset($langs[$_COOKIE['lang']]))
            ? $_COOKIE['lang'] : 'en';
    }
    return $_SESSION['lang'];
}

/** Current language code. */
function current_lang() {
    return $_SESSION['lang'] ?? 'en';
}

/** Current text direction (ltr / rtl). */
function lang_dir() {
    $lang = current_lang();
    return $GLOBALS['LANGS'][$lang]['dir'] ?? 'ltr';
}

/** Translate a key for the active language, with optional sprintf args. */
function t($key, ...$args) {
    $lang = current_lang();
    $str = $GLOBALS['TRANSLATIONS'][$lang][$key]
        ?? $GLOBALS['TRANSLATIONS']['en'][$key]
        ?? $key;
    if ($args) {
        $str = vsprintf($str, $args);
    }
    return $str;
}

/** Build a URL to the current page with a different language. */
function lang_url($code) {
    $params = $_GET;
    $params['lang'] = $code;
    return strtok($_SERVER['REQUEST_URI'], '?') . '?' . http_build_query($params);
}









// ============================================================
//  NEW: English-text-as-key translations
//  Add your translations here (only what you actually use)
// ============================================================
$GLOBALS['ENGLISH_TRANSLATIONS'] = [
    'en' => [
        'tagline'          => 'Custom 3D Printed Creations',
        'nav_shop'         => 'Shop',
        'nav_about'        => 'About',
        'nav_contact'      => 'Contact',
        'nav_admin'        => 'Admin',
        'lang_label'       => 'Language',

        'hero_eyebrow'     => '3D Printed · Made to order',
        'hero_title'       => 'Unique things, printed layer by layer.',
        'hero_lead'        => 'Browse the collection and message me to order any piece — custom colors and sizes welcome.',
        'hero_browse'      => 'Browse products',
        'hero_custom'      => 'Request a custom print',

        'shop_products'    => 'Products',
        'shop_search_ph'   => 'Search products…',
        'shop_search_btn'  => 'Search',
        'shop_all'         => 'All',
        'shop_empty'       => 'No products found. Please check back soon.',
        'shop_view'        => 'View details',

        'order_hint'       => 'Leave your name and phone — we\'ll call you to confirm.',
        'order_name'       => 'Your name',
        'order_phone'      => 'Phone',
        'order_now'        => 'Order now',
        'order_sending'    => 'Sending…',
        'order_error'      => 'Something went wrong. Please try again.',
        'order_network'    => 'Network error. Please try again.',
        'success_title'    => 'Congratulations!',
        'success_text'     => 'Your order has been sent successfully. We\'ll call you soon to confirm the details.',
        'success_btn'      => 'Great, thanks!',
        'modal_close'      => 'Close',

        'about_eyebrow'    => 'About',
        'about_title'      => 'What I do',
        'about_lead'       => 'Hi, I\'m the maker behind %s. I design and 3D print original, functional and decorative objects — from articulated toys and home decor to practical desk gadgets and fully custom pieces.',
        'about_p1'         => 'Every item you see here is printed by me on my own machines, using quality PLA and PETG filaments. I care about clean layers, strong parts and finishes that feel good in the hand.',
        'about_p2'         => 'Need something specific? I take custom orders — send me your idea, a reference image, the colors and the size, and I\'ll print it for you.',
        'about_f1_t'       => 'Custom colors',
        'about_f1_d'       => 'Choose the filament color and finish that fits your space or gift.',
        'about_f2_t'       => 'Made to order',
        'about_f2_d'       => 'Each piece is printed fresh when you order, no mass production.',
        'about_f3_t'       => 'Local & fast',
        'about_f3_d'       => 'Based in %s, quick to respond and ship.',
        'about_see_shop'   => 'See the shop',
        'about_get_touch'  => 'Get in touch',

        'contact_eyebrow'  => 'Contact',
        'contact_title'    => 'Let\'s make something',
        'contact_lead'     => 'Have a question about a product or a custom idea? Send me a message and I\'ll get back to you.',
        'contact_email'    => 'Email',
        'contact_phone'    => 'Phone',
        'contact_location' => 'Location',
        'contact_sent_t'   => 'Message sent!',
        'contact_sent_d'   => 'Thanks — your message has been received. I\'ll reply as soon as possible.',
        'contact_back'     => 'Back to shop',
        'contact_f_name'   => 'Your name *',
        'contact_f_email'  => 'Email *',
        'contact_f_phone'  => 'Phone',
        'contact_f_subject'=> 'Subject',
        'contact_f_msg'    => 'Message *',
        'contact_send'     => 'Send message',
        'err_name'         => 'Please enter your name.',
        'err_email'        => 'Please enter a valid email address.',
        'err_body'         => 'Please write a message.',

        'footer_rights'    => 'All rights reserved.',
    ],
    'fr' => [
        'tagline'          => 'Créations Personnalisées en Impression 3D',
        'nav_shop'         => 'Boutique',
        'nav_about'        => 'À propos',
        'nav_contact'      => 'Contact',
        'nav_admin'        => 'Admin',
        'lang_label'       => 'Langue',

        'hero_eyebrow'     => 'Imprimé en 3D · Sur commande',
        'hero_title'       => 'Des objets uniques, imprimés couche par couche.',
        'hero_lead'        => 'Parcourez la collection et écrivez-moi pour commander une pièce — couleurs et tailles personnalisées bienvenues.',
        'hero_browse'      => 'Voir les produits',
        'hero_custom'      => 'Demander une impression sur mesure',

        'shop_products'    => 'Produits',
        'shop_search_ph'   => 'Rechercher des produits…',
        'shop_search_btn'  => 'Rechercher',
        'shop_all'         => 'Tous',
        'shop_empty'       => 'Aucun produit trouvé. Revenez bientôt.',
        'shop_view'        => 'Voir les détails',

        'order_hint'       => 'Laissez votre nom et téléphone — nous vous appellerons pour confirmer.',
        'order_name'       => 'Votre nom',
        'order_phone'      => 'Téléphone',
        'order_now'        => 'Commander',
        'order_sending'    => 'Envoi…',
        'order_error'      => 'Une erreur est survenue. Veuillez réessayer.',
        'order_network'    => 'Erreur réseau. Veuillez réessayer.',
        'success_title'    => 'Félicitations !',
        'success_text'     => 'Votre commande a bien été envoyée. Nous vous appellerons bientôt pour confirmer les détails.',
        'success_btn'      => 'Parfait, merci !',
        'modal_close'      => 'Fermer',

        'about_eyebrow'    => 'À propos',
        'about_title'      => 'Ce que je fais',
        'about_lead'       => 'Bonjour, je suis le créateur derrière %s. Je conçois et imprime en 3D des objets originaux, fonctionnels et décoratifs — des jouets articulés à la déco, en passant par des gadgets de bureau et des pièces entièrement personnalisées.',
        'about_p1'         => 'Chaque article ici est imprimé par mes soins sur mes propres machines, avec des filaments PLA et PETG de qualité. Je soigne les couches, la solidité et les finitions agréables au toucher.',
        'about_p2'         => 'Besoin de quelque chose de précis ? J\'accepte les commandes sur mesure — envoyez-moi votre idée, une image de référence, les couleurs et la taille, et je l\'imprime pour vous.',
        'about_f1_t'       => 'Couleurs personnalisées',
        'about_f1_d'       => 'Choisissez la couleur et la finition du filament adaptées à votre espace ou cadeau.',
        'about_f2_t'       => 'Sur commande',
        'about_f2_d'       => 'Chaque pièce est imprimée à la commande, sans production de masse.',
        'about_f3_t'       => 'Local & rapide',
        'about_f3_d'       => 'Basé à %s, réponse et expédition rapides.',
        'about_see_shop'   => 'Voir la boutique',
        'about_get_touch'  => 'Me contacter',

        'contact_eyebrow'  => 'Contact',
        'contact_title'    => 'Créons quelque chose',
        'contact_lead'     => 'Une question sur un produit ou une idée sur mesure ? Envoyez-moi un message et je vous répondrai.',
        'contact_email'    => 'E-mail',
        'contact_phone'    => 'Téléphone',
        'contact_location' => 'Localisation',
        'contact_sent_t'   => 'Message envoyé !',
        'contact_sent_d'   => 'Merci — votre message a bien été reçu. Je répondrai dès que possible.',
        'contact_back'     => 'Retour à la boutique',
        'contact_f_name'   => 'Votre nom *',
        'contact_f_email'  => 'E-mail *',
        'contact_f_phone'  => 'Téléphone',
        'contact_f_subject'=> 'Sujet',
        'contact_f_msg'    => 'Message *',
        'contact_send'     => 'Envoyer le message',
        'err_name'         => 'Veuillez saisir votre nom.',
        'err_email'        => 'Veuillez saisir une adresse e-mail valide.',
        'err_body'         => 'Veuillez écrire un message.',

        'footer_rights'    => 'Tous droits réservés.',
    ],
    'ar' => [
        'tagline'          => 'إبداعات مخصصة بالطباعة ثلاثية الأبعاد',
        'nav_shop'         => 'المتجر',
        'nav_about'        => 'من نحن',
        'nav_contact'      => 'اتصل بنا',
        'nav_admin'        => 'الإدارة',
        'lang_label'       => 'اللغة',

        'hero_eyebrow'     => 'طباعة ثلاثية الأبعاد · حسب الطلب',
        'hero_title'       => 'قطع فريدة، مطبوعة طبقةً تلو الأخرى.',
        'hero_lead'        => 'تصفّح المجموعة وراسلني لطلب أي قطعة — الألوان والأحجام المخصّصة مرحّب بها.',
        'hero_browse'      => 'تصفّح المنتجات',
        'hero_custom'      => 'اطلب طباعة مخصّصة',

        'shop_products'    => 'المنتجات',
        'shop_search_ph'   => 'ابحث عن المنتجات…',
        'shop_search_btn'  => 'بحث',
        'shop_all'         => 'الكل',
        'shop_empty'       => 'لا توجد منتجات. يرجى العودة قريبًا.',
        'shop_view'        => 'عرض التفاصيل',

        'order_hint'       => 'اترك اسمك ورقم هاتفك — سنتصل بك للتأكيد.',
        'order_name'       => 'اسمك',
        'order_phone'      => 'الهاتف',
        'order_now'        => 'اطلب الآن',
        'order_sending'    => 'جارٍ الإرسال…',
        'order_error'      => 'حدث خطأ ما. يرجى المحاولة مرة أخرى.',
        'order_network'    => 'خطأ في الشبكة. يرجى المحاولة مرة أخرى.',
        'success_title'    => 'تهانينا!',
        'success_text'     => 'تم إرسال طلبك بنجاح. سنتصل بك قريبًا لتأكيد التفاصيل.',
        'success_btn'      => 'رائع، شكرًا!',
        'modal_close'      => 'إغلاق',

        'about_eyebrow'    => 'من نحن',
        'about_title'      => 'ماذا أفعل',
        'about_lead'       => 'مرحبًا، أنا صاحب %s. أصمّم وأطبع بتقنية ثلاثية الأبعاد قطعًا أصلية وعملية وزخرفية — من الألعاب المفصّلة وديكور المنزل إلى أدوات المكتب العملية والقطع المخصّصة بالكامل.',
        'about_p1'         => 'كل قطعة تراها هنا مطبوعة بنفسي على آلاتي الخاصة، باستخدام خيوط PLA وPETG عالية الجودة. أهتمّ بالطبقات النظيفة والأجزاء المتينة واللمسات النهائية المريحة.',
        'about_p2'         => 'تحتاج شيئًا محدّدًا؟ أقبل الطلبات المخصّصة — أرسل لي فكرتك وصورة مرجعية والألوان والحجم، وسأطبعها لك.',
        'about_f1_t'       => 'ألوان مخصّصة',
        'about_f1_d'       => 'اختر لون الخيط واللمسة النهائية التي تناسب مساحتك أو هديتك.',
        'about_f2_t'       => 'حسب الطلب',
        'about_f2_d'       => 'تُطبع كل قطعة طازجة عند الطلب، دون إنتاج ضخم.',
        'about_f3_t'       => 'محلي وسريع',
        'about_f3_d'       => 'مقرّي في %s، سريع في الرد والشحن.',
        'about_see_shop'   => 'تصفّح المتجر',
        'about_get_touch'  => 'تواصل معي',

        'contact_eyebrow'  => 'اتصل بنا',
        'contact_title'    => 'لنصنع شيئًا',
        'contact_lead'     => 'لديك سؤال عن منتج أو فكرة مخصّصة؟ أرسل لي رسالة وسأعود إليك.',
        'contact_email'    => 'البريد الإلكتروني',
        'contact_phone'    => 'الهاتف',
        'contact_location' => 'الموقع',
        'contact_sent_t'   => 'تم إرسال الرسالة!',
        'contact_sent_d'   => 'شكرًا — تم استلام رسالتك. سأرد في أقرب وقت ممكن.',
        'contact_back'     => 'العودة إلى المتجر',
        'contact_f_name'   => 'اسمك *',
        'contact_f_email'  => 'البريد الإلكتروني *',
        'contact_f_phone'  => 'الهاتف',
        'contact_f_subject'=> 'الموضوع',
        'contact_f_msg'    => 'الرسالة *',
        'contact_send'     => 'إرسال الرسالة',
        'err_name'         => 'يرجى إدخال اسمك.',
        'err_email'        => 'يرجى إدخال بريد إلكتروني صحيح.',
        'err_body'         => 'يرجى كتابة رسالة.',

        'footer_rights'    => 'جميع الحقوق محفوظة.',
    ],
];

/**
 * Translate an English string to the current language.
 * If no translation is found, returns the original string.
 */
function __($text) {
    $lang = current_lang();
    if ($lang === 'en') return $text;
    $map = $GLOBALS['ENGLISH_TRANSLATIONS'][$lang] ?? [];
    return $map[$text] ?? $text;
}