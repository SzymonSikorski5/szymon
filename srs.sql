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
create table aukcje (
a_id int not null auto_increment,
a_tytul varchar(49) not null,
a_opis varchar(255) not null,
a_zdjecia varchar(255),
a_dodano datetime not null,
a_wygasa datetime,
u_id int not null,
r_id int not null,
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