Create database srs;
use srs;
create table uzytkownicy (
u_id int not null auto_increment,
u_email varchar(24) not null,
u_nick varchar(24) not null,
u_haslo varchar(32) not null,
u_imie varchar(16) not null,
u_nazwisko varchar(32) not null,
u_zdjecie varchar(255),
primary key (u_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
create table rodzaje (
r_id int not null auto_increment,
r_rodzaj varchar(32) not null,
primary key (r_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
INSERT INTO rodzaje (r_id, r_rodzaj) VALUES (1,'Aukcja klasyczna');
INSERT INTO rodzaje (r_id, r_rodzaj) VALUES (2,'Aukcja z ceną minimalną');
INSERT INTO rodzaje (r_id, r_rodzaj) VALUES (3,'Aukcja holenderska');
create table aukcje (
a_id int not null auto_increment,
a_tytul varchar(49) not null,
a_opis varchar(255) not null,
a_zdjecie varchar(255),
a_kwota int,
a_cenabazowa int not null,
a_dodano datetime not null,
a_czaswygasania int not null,
a_minelo int not null,
u_id int not null,
r_id int not null,
a_zwyciezca int,
a_stanaukcji int(1) not null,
primary key (a_id),
foreign key (u_id)
references uzytkownicy (u_id),
foreign key (r_id)
references rodzaje (r_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
create table zdjecia (
z_id int not null auto_increment,
z_sciezka varchar(255) not null,
a_id int not null,
primary key (z_id),
foreign key (a_id)
references aukcje (a_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;