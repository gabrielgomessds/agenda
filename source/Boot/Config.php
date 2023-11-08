<?php
/**
 * DATABASE
 */
const CONF_DB_HOST = "localhost";
const CONF_DB_USER = "root";
const CONF_DB_PASS = "";
const CONF_DB_NAME = "dummy_db";

/**
 * PROJECT URLs
 */
const CONF_URL_BASE = "https://www.cafecontrol.com.br";
const CONF_URL_TEST = "https://www.localhost/teste-smart-solucoes";

/**
 * SITE
 */
const CONF_SITE_NAME = "CRUD";
const CONF_SITE_TITLE = "Completo";
const CONF_SITE_DESC =
    "O CafeControl é um gerenciador de contas simples, poderoso e gratuito. O prazer de tomar um café e ter o controle total de suas contas.";
const CONF_SITE_LANG = "pt_BR";
const CONF_SITE_DOMAIN = "upinside.com.br";
const CONF_SITE_ADDR_STREET = "SC 406 - Rod. Drº Antônio Luiz Moura Gonzaga";
const CONF_SITE_ADDR_NUMBER = "3339";
const CONF_SITE_ADDR_COMPLEMENT = "Bloco A, Sala 208";
const CONF_SITE_ADDR_CITY = "Florianópolis";
const CONF_SITE_ADDR_STATE = "SC";
const CONF_SITE_ADDR_ZIPCODE = "88048-301";

/**
 * SOCIAL
 */
const CONF_SOCIAL_TWITTER_CREATOR = "@creator";
const CONF_SOCIAL_TWITTER_PUBLISHER = "@creator";
const CONF_SOCIAL_FACEBOOK_APP = "5555555555";
const CONF_SOCIAL_FACEBOOK_PAGE = "pagename";
const CONF_SOCIAL_FACEBOOK_AUTHOR = "author";
const CONF_SOCIAL_GOOGLE_PAGE = "5555555555";
const CONF_SOCIAL_GOOGLE_AUTHOR = "5555555555";
const CONF_SOCIAL_INSTAGRAM_PAGE = "insta";
const CONF_SOCIAL_YOUTUBE_PAGE = "youtube";

/**
 * DATES
 */
const CONF_DATE_BR = "d/m/Y H:i:s";
const CONF_DATE_APP = "Y-m-d H:i:s";

/**
 * PASSWORD
 */
const CONF_PASSWD_MIN_LEN = 8;
const CONF_PASSWD_MAX_LEN = 40;
const CONF_PASSWD_ALGO = PASSWORD_DEFAULT;
const CONF_PASSWD_OPTION = ["cost" => 10];

/**
 * VIEW
 */
const CONF_VIEW_PATH = __DIR__ . "/../../shared/views";
const CONF_VIEW_EXT = "php";
const CONF_VIEW_THEME = "web";

/**
 * UPLOAD
 */
const CONF_UPLOAD_DIR = "storage";
const CONF_UPLOAD_IMAGE_DIR = "images";
const CONF_UPLOAD_FILE_DIR = "files";
const CONF_UPLOAD_MEDIA_DIR = "medias";

/**
 * IMAGES
 */
const CONF_IMAGE_CACHE = CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache";
const CONF_IMAGE_SIZE = 2000;
const CONF_IMAGE_QUALITY = ["jpg" => 75, "png" => 5];

/**
 * MAIL
 */
const CONF_MAIL_HOST = "smtp.sendgrid.net";
const CONF_MAIL_PORT = "587";
const CONF_MAIL_USER = "apikey";
const CONF_MAIL_PASS = "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";
const CONF_MAIL_SENDER = ["name" => "Robson V. Leite", "address" => "sender@email.com"];
const CONF_MAIL_SUPPORT = "sender@support.com";
const CONF_MAIL_OPTION_LANG = "br";
const CONF_MAIL_OPTION_HTML = true;
const CONF_MAIL_OPTION_AUTH = true;
const CONF_MAIL_OPTION_SECURE = "tls";
const CONF_MAIL_OPTION_CHARSET = "utf-8";




