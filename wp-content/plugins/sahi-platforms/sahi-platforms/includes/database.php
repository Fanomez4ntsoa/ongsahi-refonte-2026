<?php

function sahi_create_volunteers_table(){

    global $wpdb;

    $table = $wpdb->prefix . "sahi_volunteers";
    $charset = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table (

    id INT(11) NOT NULL AUTO_INCREMENT,

    fullname VARCHAR(255) NOT NULL,
    birthdate DATE,
    nationality VARCHAR(100),

    passport_number VARCHAR(100),
    passport_expiry DATE,

    photo VARCHAR(255),

    address TEXT,
    phone VARCHAR(50),
    email VARCHAR(200),

    education_level VARCHAR(200),
    field_of_study VARCHAR(200),

    professional_experience TEXT,
    cv VARCHAR(255),

    skills TEXT,

    languages TEXT,

    motivation TEXT,
    motivation_letter TEXT,

    availability VARCHAR(100),
    mobility VARCHAR(100),

    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY  (id)

    ) $charset;";

    require_once ABSPATH.'wp-admin/includes/upgrade.php';
    dbDelta($sql);

}

function sahi_create_axes_table(){

    global $wpdb;

    $table = $wpdb->prefix . "sahi_axes";
    $charset = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table (
        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(200) NOT NULL,
        description TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id)
    ) $charset;";

    require_once ABSPATH.'wp-admin/includes/upgrade.php';
    dbDelta($sql);
}

function sahi_create_volunteer_axes_table(){

    global $wpdb;

    $table = $wpdb->prefix . "sahi_volunteer_axes";
    $charset = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table (
        id INT(11) NOT NULL AUTO_INCREMENT,
        volunteer_id INT(11) NOT NULL,
        axis_id INT(11) NOT NULL,
        PRIMARY KEY  (id)
    ) $charset;";

    require_once ABSPATH.'wp-admin/includes/upgrade.php';
    dbDelta($sql);
}

function sahi_create_axis_employability(){

    global $wpdb;

    $table = $wpdb->prefix . "sahi_axis_employability";
    $charset = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table (

    id INT(11) NOT NULL AUTO_INCREMENT,
    volunteer_id INT(11) NOT NULL,

    country_interest VARCHAR(200),
    province_interest VARCHAR(200),

    international_experience TEXT,

    language_test VARCHAR(100),

    migration_status VARCHAR(200),

    financial_capacity VARCHAR(200),

    intention VARCHAR(100),

    PRIMARY KEY  (id)

    ) $charset;";

    require_once ABSPATH.'wp-admin/includes/upgrade.php';
    dbDelta($sql);

}

function sahi_create_axis_capacity(){

    global $wpdb;

    $table = $wpdb->prefix . "sahi_axis_capacity";
    $charset = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table (

    id INT(11) NOT NULL AUTO_INCREMENT,
    volunteer_id INT(11) NOT NULL,

    skills_to_share TEXT,
    skills_to_develop TEXT,

    training_experience TEXT,

    weekly_availability VARCHAR(100),

    interest_area VARCHAR(200),

    PRIMARY KEY  (id)

    ) $charset;";

    require_once ABSPATH.'wp-admin/includes/upgrade.php';
    dbDelta($sql);

}

function sahi_create_axis_charity(){

    global $wpdb;

    $table = $wpdb->prefix . "sahi_axis_charity";
    $charset = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table (

    id INT(11) NOT NULL AUTO_INCREMENT,
    volunteer_id INT(11) NOT NULL,

    social_experience TEXT,

    intervention_zone VARCHAR(200),

    field_work_capacity VARCHAR(10),

    driving_license VARCHAR(10),

    references_contact TEXT,

    PRIMARY KEY  (id)

    ) $charset;";

    require_once ABSPATH.'wp-admin/includes/upgrade.php';
    dbDelta($sql);

}

function sahi_create_axis_fundraising(){

    global $wpdb;

    $table = $wpdb->prefix . "sahi_axis_fundraising";
    $charset = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table (

    id INT(11) NOT NULL AUTO_INCREMENT,
    volunteer_id INT(11) NOT NULL,

    fundraising_experience TEXT,

    professional_network TEXT,

    skills TEXT,

    linkedin_crm VARCHAR(100),

    international_donors_experience TEXT,

    PRIMARY KEY  (id)

    ) $charset;";

    require_once ABSPATH.'wp-admin/includes/upgrade.php';
    dbDelta($sql);

}

function sahi_create_tables(){

    sahi_create_volunteers_table();
    sahi_create_axes_table();
    sahi_create_volunteer_axes_table();

    sahi_create_axis_employability();
    sahi_create_axis_capacity();
    sahi_create_axis_charity();
    sahi_create_axis_fundraising();

}

