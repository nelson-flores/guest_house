start transaction;

drop database if exists hotel;
create database hotel;

use hotel;


create table if not exists options(
    id bigint auto_increment not null primary key,
    name varchar(400) not null,
    code varchar(300) not null unique,
    content longtext,
    content_type enum('plain_text','rich_text','number') default 'rich_text',
    active boolean not null default true,
    multiple boolean not null default false,
    parent_id bigint null,
    created_at timestamp default current_timestamp,
    updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at timestamp default null
);



create table if not exists genders(
    id bigint auto_increment not null primary key,
    name varchar(60),
    code varchar(191) not null unique,
    created_at timestamp default current_timestamp,
    updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at timestamp default null
);

create table if not exists countries(
    id bigint auto_increment not null primary key,
    code varchar(191) not null unique,
    name varchar(100),
    native_name varchar(100),
    locale varchar(50),
    idd varchar(50),
    phone_digits_num int default 9,
    created_at timestamp default current_timestamp,
    updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at timestamp default null
);

create table if not exists cities(
    id bigint auto_increment not null primary key,
    code varchar(191) not null unique,
    name varchar(191) not null,
    country_id bigint,
    latitude float,
    longitude float,
    timezone int(6),
    created_at timestamp default current_timestamp,
    updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at timestamp default null,
    foreign key(country_id) references countries(id) on delete cascade
);

create table if not exists roles(
    id bigint auto_increment not null primary key,
    name varchar(191),
    code varchar(191) not null unique,
    description text,
    created_at timestamp default current_timestamp,
    updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at timestamp default null
);

create table if not exists permissions(
    id bigint auto_increment not null primary key,
    module_id bigint not null,
    name varchar(191),
    code varchar(191) not null unique,
    description text,
    created_at timestamp default current_timestamp,
    updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at timestamp default null
);

create table if not exists role_permissions(
    id bigint auto_increment not null primary key,
    permission_id bigint not null,
    role_id bigint not null,
    needs_maker_checker boolean not null default false,
    created_at timestamp default current_timestamp,
    updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at timestamp default null,
    foreign key(permission_id) references permissions(id) on delete cascade,
    foreign key(role_id) references roles(id) on delete cascade
);

create table if not exists users(
    id bigint auto_increment not null primary key,
    code varchar(191) not null unique,
    profile_picture varchar(191),
    name varchar(191),
    last_name varchar(191),
    password varchar(80),
    active boolean not null default true,
    city_id bigint null,
    phone varchar(20) null,
    email varchar(150) null,
    national_id varchar(150) null,
    activation_token varchar(100),
    remember_token varchar(100),
    otp varchar(100) null,
    gender_id bigint,
    role_id bigint null,
    type varchar(100) not null default 'user' comment 'user,admin',
    created_at timestamp default current_timestamp,
    updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at timestamp default null,
    foreign key(role_id) references roles(id) on delete set null,
    foreign key(city_id) references cities(id) on delete cascade,
    foreign key(gender_id) references genders(id) on delete cascade
);

create table if not exists notifications(
    id bigint auto_increment not null primary key,
    code varchar(191) not null unique,
    title varchar(100),
    message text,
    user_id bigint not null,
    isread boolean not null default true,
    created_at timestamp default current_timestamp,
    updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at timestamp default null,
    foreign key(user_id) references users(id) on delete cascade
);

create table if not exists password_changes(
    id bigint auto_increment not null primary key,
    code varchar(191) not null unique,
    user_id bigint not null,
    password varchar(200),
    new_password varchar(200) not null,
    created_at timestamp default current_timestamp,
    updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at timestamp default null,
    foreign key(user_id) references users(id) on delete cascade
);

create table if not exists session_histories(
    id bigint auto_increment not null primary key,
    code varchar(191) not null unique,
    ip varchar(100),
    browser varchar(191),
    device varchar(191),
    user_agent varchar(191),
    sessionid varchar(191),
    latiutde float,
    longitude float,
    success boolean not null default false,
    user_id bigint not null,
    created_at timestamp default current_timestamp,
    updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at timestamp default null,
    foreign key(user_id) references users(id) on delete cascade
);

create table if not exists operation_histories(
    id bigint not null auto_increment primary key,
    user_id bigint not null,
    code varchar(190) default null,
    description text default null,
    classmethod varchar(400) default null,
    old_serialized_object text default null,
    current_serialized_object text default null,
    object_table varchar(190) default null,
    sessionid varchar(190) default null,
    module_id bigint,
    created_at timestamp default current_timestamp,
    updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at timestamp default null,
    foreign key(user_id) references users(id) on delete cascade
);

create table if not exists payment_methods(
    id bigint not null auto_increment primary key,
    code varchar(191) not null unique,
    name varchar(191) not null,
    created_at timestamp default current_timestamp,
    updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at timestamp default null
);



-- =========================
-- HÓSPEDES
-- =========================
CREATE TABLE guests (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100),
    email VARCHAR(191),
    phone VARCHAR(50),
    document_number VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =========================
-- TIPOS DE QUARTO
-- =========================
CREATE TABLE room_types (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price_per_night DECIMAL(10,2) NOT NULL,
    max_adults INT DEFAULT 2,
    max_children INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =========================
-- QUARTOS
-- =========================
CREATE TABLE rooms (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    room_number VARCHAR(20) NOT NULL UNIQUE,
    room_type_id BIGINT NOT NULL,
    floor INT,
    status ENUM(
        'available',
        'occupied',
        'maintenance'
    ) DEFAULT 'available',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (room_type_id) REFERENCES room_types(id)
);

-- =========================
-- RESERVAS
-- =========================
CREATE TABLE reservations (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    guest_id BIGINT NOT NULL,
    room_id BIGINT NOT NULL,

    check_in DATE NOT NULL,
    check_out DATE NOT NULL,

    adults INT NOT NULL DEFAULT 1,
    children INT NOT NULL DEFAULT 0,

    status ENUM(
        'pending',
        'confirmed',
        'checked_in',
        'checked_out',
        'cancelled'
    ) DEFAULT 'pending',

    total_amount DECIMAL(10,2),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (guest_id) REFERENCES guests(id),
    FOREIGN KEY (room_id) REFERENCES rooms(id)
);

-- =========================
-- PAGAMENTOS
-- =========================
CREATE TABLE payments (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    reservation_id BIGINT NOT NULL,

    amount DECIMAL(10,2) NOT NULL,
    method ENUM(
        'cash',
        'card',
        'mpesa',
        'emola',
        'mkesh',
        'bank_transfer'
    ),

    status ENUM(
        'pending',
        'paid',
        'failed'
    ) DEFAULT 'pending',

    transaction_reference VARCHAR(191),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (reservation_id) REFERENCES reservations(id)
);

-- =========================
-- SERVIÇOS DO HOTEL
-- =========================
CREATE TABLE services (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =========================
-- SERVIÇOS UTILIZADOS NA RESERVA
-- =========================
CREATE TABLE reservation_services (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    reservation_id BIGINT NOT NULL,
    service_id BIGINT NOT NULL,

    quantity INT DEFAULT 1,
    total_price DECIMAL(10,2),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (reservation_id) REFERENCES reservations(id),
    FOREIGN KEY (service_id) REFERENCES services(id)
);

-- =========================
-- DISPONIBILIDADE DIÁRIA
-- =========================
CREATE TABLE room_availability (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,

    room_id BIGINT NOT NULL,
    date DATE NOT NULL,

    status ENUM(
        'available',
        'reserved',
        'occupied',
        'maintenance',
        'blocked'
    ) DEFAULT 'available',

    reservation_id BIGINT NULL,

    price DECIMAL(10,2),

    UNIQUE(room_id, date),

    FOREIGN KEY (room_id) REFERENCES rooms(id),
    FOREIGN KEY (reservation_id) REFERENCES reservations(id)
);

-- =========================
-- LIMPEZA / HOUSEKEEPING
-- =========================
CREATE TABLE housekeeping (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    room_id BIGINT NOT NULL,
    cleaned_by VARCHAR(100),
    cleaned_at TIMESTAMP,
    notes TEXT,

    FOREIGN KEY (room_id) REFERENCES rooms(id)
);


create table if not exists partners(    
    id bigint not null auto_increment primary key,
    name varchar(800),
    logo varchar(400) null, 
    description longtext,
    created_at timestamp default current_timestamp,
    updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at timestamp default null
);

create table if not exists services(
    id bigint not null auto_increment primary key,
    
    fa_icon varchar(100) default "fa fa-circle",
    name varchar(191) not null,
    description longtext, 
    created_at timestamp default current_timestamp,
    updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at timestamp default null 
);

create table if not exists subscribers(
    id bigint not null auto_increment primary key,
    
    email varchar(191) not null,
    ative boolean default false,
    created_at timestamp default current_timestamp,
    updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at timestamp default null 
);

create table if not exists messages(
    id bigint not null auto_increment primary key,
    
    email varchar(191) not null,
    subject varchar(191) not null,
    name varchar(191) not null,
    message text not null,
    refused boolean default false,
    created_at timestamp default current_timestamp,
    updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at timestamp default null 
);

create table if not exists faqs(
    id bigint auto_increment not null primary key,
    question varchar(191),
    
    answer longtext,
    created_at timestamp default current_timestamp,
    updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at timestamp default null
);






CREATE TABLE if not exists medias(
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    type ENUM('image', 'video', 'audio') DEFAULT 'image',
    file_path VARCHAR(500) NOT NULL,
    thumbnail_path VARCHAR(500) NULL,
    title VARCHAR(255) NULL,
    description TEXT NULL,
    size BIGINT UNSIGNED NULL,
    mime_type VARCHAR(100) NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL
);










commit;