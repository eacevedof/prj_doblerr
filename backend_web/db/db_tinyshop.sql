CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_tinyshop` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_tinyshop`;

create table app_order_head
(
    processflag tinytext null,
    insert_platform tinytext null,
    insert_user tinytext null,
    insert_date timestamp null,
    update_platform tinytext null,
    update_user tinytext null,
    update_date timestamp null,
    delete_platform tinytext null,
    delete_user tinytext null,
    delete_date timestamp null,
    cru_csvnote varchar(500) null,
    is_erpsent tinytext null,
    is_enabled tinytext null,
    i int null,
    id int auto_increment primary key,
    code_erp tinytext null,
    description tinytext null,
    id_user_client int not null,
    id_user_seller int not null,
    total decimal(10,3) default 0.000 null,
    status varchar(25) null,
    notes varchar(2000) null
)
    comment 'cabecera de pedidos';

create table app_order_lines
(
    processflag text null,
    insert_platform text null,
    insert_user text null,
    insert_date timestamp default CURRENT_TIMESTAMP null,
    update_platform varchar(3) null,
    update_user varchar(15) null,
    update_date timestamp default CURRENT_TIMESTAMP null on update CURRENT_TIMESTAMP,
    delete_platform text null,
    delete_user text null,
    delete_date timestamp null,
    cru_csvnote varchar(500) null,
    is_erpsent text null,
    is_enabled text null,
    i int null,
    id int auto_increment primary key,
    code_erp text null,
    description text null,
    id_order_head int null,
    id_product int null,
    price decimal(10,3) null
)
    comment 'lineas de pedido';

create table app_product
(
    processflag tinytext null,
    insert_platform tinytext null,
    insert_user tinytext null,
    insert_date timestamp default CURRENT_TIMESTAMP null,
    update_platform varchar(3) null,
    update_user varchar(15) null,
    update_date timestamp default CURRENT_TIMESTAMP null on update CURRENT_TIMESTAMP,
    delete_platform tinytext null,
    delete_user tinytext null,
    delete_date timestamp null,
    cru_csvnote varchar(500) null,
    is_erpsent tinytext null,
    is_enabled tinytext null,
    i int null,
    id int auto_increment primary key,
    code_erp tinytext null,
    type tinytext null,
    id_tosave tinytext null,
    description tinytext null,
    order_by int null,
    id_user int null,
    price decimal(10,3) default 0.000 null,
    code_cache varchar(500) null
);

create table app_product_images
(
    processflag tinytext null,
    insert_platform tinytext null,
    insert_date timestamp default CURRENT_TIMESTAMP null,
    update_platform varchar(3) null,
    update_user varchar(15) null,
    update_date timestamp default CURRENT_TIMESTAMP null on update CURRENT_TIMESTAMP,
    cru_csvnote varchar(500) null,
    is_erpsent tinytext null,
    is_enabled tinytext null,
    i int null,
    id int auto_increment primary key,
    id_type int null,
    description tinytext null,
    id_product int not null,
    path_file varchar(2000) not null,
    slug tinytext null,
    order_by int default 100 null,
    code_cache varchar(500) null
);

create table app_products_tags
(
    processflag tinytext null,
    insert_platform tinytext null,
    insert_user tinytext null,
    insert_date timestamp default CURRENT_TIMESTAMP null,
    update_platform varchar(3) null,
    update_user varchar(15) null,
    update_date timestamp default CURRENT_TIMESTAMP null on update CURRENT_TIMESTAMP,
    delete_platform tinytext null,
    delete_user tinytext null,
    delete_date timestamp null,
    cru_csvnote varchar(500) null,
    is_erpsent tinytext null,
    is_enabled tinytext null,
    i int null,
    id int auto_increment primary key,
    id_product int null,
    id_tag int null,
    code_cache varchar(500) null
);

create table app_tag
(
    processflag varchar(5) null,
    insert_platform varchar(3) null,
    insert_user varchar(15) null,
    insert_date timestamp default CURRENT_TIMESTAMP null,
    update_platform varchar(3) null,
    update_user varchar(15) null,
    update_date timestamp default CURRENT_TIMESTAMP null on update CURRENT_TIMESTAMP,
    delete_platform varchar(3) null,
    delete_user varchar(15) null,
    delete_date timestamp null,
    cru_csvnote varchar(500) null,
    is_erpsent varchar(3) default '0' null,
    is_enabled varchar(3) default '1' null,
    i int null,
    id int auto_increment primary key,
    id_type int null,
    description varchar(50) null,
    id_user int null,
    slug varchar(100) null comment 'la descripcion en slug',
    order_by int(5) default 100 not null,
    code_cache varchar(500) null
)
    engine=MyISAM;

create table app_tag_array
(
    processflag varchar(5) null,
    insert_platform varchar(3) null,
    insert_user varchar(15) null,
    insert_date timestamp default CURRENT_TIMESTAMP null,
    update_platform varchar(3) null,
    update_user varchar(15) null,
    update_date timestamp default CURRENT_TIMESTAMP null on update CURRENT_TIMESTAMP,
    delete_platform varchar(3) null,
    delete_user varchar(15) null,
    delete_date timestamp null,
    cru_csvnote varchar(500) null,
    is_erpsent varchar(3) default '0' null,
    is_enabled varchar(3) default '1' null,
    i int null,
    id int auto_increment
        primary key,
    code_erp varchar(25) null,
    type varchar(15) null,
    id_tosave varchar(25) null,
    description varchar(250) null,
    order_by int(5) default 100 not null
)
    engine=MyISAM;

create table base_user
(
    processflag varchar(5) null,
    insert_platform varchar(3) default '1' null,
    insert_user varchar(15) null,
    insert_date timestamp default CURRENT_TIMESTAMP null,
    update_platform varchar(3) null,
    update_user varchar(15) null,
    update_date timestamp default CURRENT_TIMESTAMP null on update CURRENT_TIMESTAMP,
    delete_platform varchar(3) null,
    delete_user varchar(15) null,
    delete_date timestamp null,
    cru_csvnote varchar(500) null,
    is_erpsent varchar(3) default '0' null,
    is_enabled varchar(3) default '1' null,
    i int null,
    id int auto_increment
        primary key,
    code_erp varchar(25) null,
    description varchar(250) null,
    email varchar(100) not null,
    password varchar(100) null,
    phone varchar(20) null,
    fullname varchar(100) null,
    address varchar(250) null,
    age tinyint null,
    geo_location varchar(500) null,
    id_gender int null,
    id_nationality int null,
    id_country int null comment 'app_array.type=country',
    id_language int null comment 'su idioma de preferencia',
    path_picture varchar(100) null,
    id_profile int null comment 'app_array.type=profile: user,maintenaince,system',
    tokenreset varchar(250) null,
    log_attempts int(5) default 0 null,
    rating int null comment 'la puntuacion',
    date_validated varchar(14) null comment 'cuando valido su cuenta por email',
    code_cache varchar(500) null,
    constraint base_user_email_uindex
        unique (email)
);

create table base_user_array
(
    processflag varchar(5) null,
    insert_platform varchar(3) default '1' null,
    insert_user varchar(15) null,
    insert_date timestamp default CURRENT_TIMESTAMP null,
    update_platform varchar(3) null,
    update_user varchar(15) null,
    update_date timestamp default CURRENT_TIMESTAMP null on update CURRENT_TIMESTAMP,
    delete_platform varchar(3) null,
    delete_user varchar(15) null,
    delete_date timestamp null,
    cru_csvnote varchar(500) null,
    is_erpsent varchar(3) default '0' null,
    is_enabled varchar(3) default '1' null,
    i int null,
    id int auto_increment
        primary key,
    code_erp varchar(25) null,
    type varchar(15) null,
    id_tosave varchar(25) null,
    description varchar(250) null,
    order_by int(5) default 100 not null,
    code_cache varchar(500) null
);