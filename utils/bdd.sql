create database blog;
use blog;

create table utilisateur(
    id_util int auto_increment primary key not null,
    name_util varchar(50) null,
    first_name_util varchar(50) null,
    mail_util varchar(100) not null,
    mdp_util varchar(100) not null,
    id_role int
);

create table role(
    id_role int auto_increment primary key not null,
    name_role varchar(50) not null
);

create table commentaire(
    id_com int auto_increment primary key not null,
    content_com varchar(255) not null,
    date_com date,
    id_util int,
    id_art int
);

create table categorie(
    id_cat int auto_increment primary key not null,
    name_cat varchar(50) not null
);


create table article(
    id_art int auto_increment primary key not null,
    name_art varchar(50),
    content_art text,
    date_art date,
    id_cat int
);

alter table utilisateur
add constraint fk_posseder_role
foreign key(id_role)
references role(id_role);

alter table article
add constraint fk_filtrer_categorie
foreign key(id_cat)
references categorie (id_cat);




alter table commentaire
add constraint fk_ajouter_utilisateur
foreign key(id_util)
references utilisateur (id_util);


alter table commentaire
add constraint fk_commenter_article
foreign key(id_art)
references article (id_art);

insert into role (name_role) values 
("Admin"),
("Utilisateur"),
("Banni");



