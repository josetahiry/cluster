create database venteonline;
create table user
(
    id varchar(10)
    email varchar(100),
    mdp varchar(30),
    primary key (id)
)engine=innodb;
create table image
(
    id varchar(10),
    nom varchar(30),
    format varchar(10),
    location varchar(50),
    primary key (id)
)engine=innodb;
insert into image values('IMG1','acer aspire cori5','jpg','img/acer aspire cori5.jpg');
insert into image values('IMG2','lenovo cori5','jpg','img/lenovo corei5.jpg');
insert into image values('IMG3','wiko fever','jpg','img/wikofever.jpg');
insert into image values('IMG4','robe rouge','jpg','img/robe rouge.jpg');
insert into image values('IMG5','chemisebleu','jpg','img/chemisebleu.jpg');
insert into image values('IMG6','vesteteddy','jpg','img/vesteteddy.jpg');
insert into image values('IMG7','montre','jpg','img/montre.jpg');
insert into image values('IMG8','bellagio noire','jpg','img/bellagio noire.jpg');
insert into image values('IMG9','Kaxidy','jpg','img/Kaxidy.jpg');
insert into image values('IMG10','machinelaver','jpg','img/machinelaver.jpg');
insert into image values('IMG11','kitchenAid','jpg','img/kitchenAid.jpg');
insert into image values('IMG12','frigo','jpg','img/frigo.jpg');
insert into image values('IMG13','cookies_bisson','png','img/cookies_bisson.png');
insert into image values('IMG14','Cereral-Bio','jpg','img/Cereral-Bio.jpg');
insert into image values('IMG15','confiture-passion','jpg','img/confiture-passion.jpg');
insert into image values('IMG16','vestimentaire','jpg','img/portofilio/vestimentaire.jpg');
insert into image values('IMG17','hightech','jpg','img/portofilio/hightech.jpg');
insert into image values('IMG18','maison','jpg','img/portofilio/maison.jpg');
insert into image values('IMG19','accessoire','jpg','img/portofilio/accessoire.jpg');
insert into image values('IMG20','alimentaire','jpg','img/portofilio/alimentaire.jpg');
create table type
(
    id varchar(10),
    idimage varchar(10),
    nom varchar(20),
    description varchar(100),
    primary key (id),
    foreign key (idimage) references image (id)
)engine=innodb;
insert into type value('TP1','IMG17','High tech','La technologie de nos jours a votre service');
insert into type value('TP2','IMG16','Vestimentaire','Vetemnt homme et femme');
insert into type value('TP3','IMG19','Accessoire','Les accesoires pour rendre votre vie plus agréable');
insert into type value('TP4','IMG18','maison','Rendre votre maison encore plus belle');
insert into type value('TP5','IMG20','Alimentaire','Manger des produits BIO');
create table sexe
(
    id varchar(10),
    nom varchar(10),
    primary key (id)
)engine=innodb;
insert into sexe value('SEX1','homme');
insert into sexe value('SEX2','femme');
insert into sexe value('SEX3','tous');
create table unite
(
    id int,
    nom varchar(10),
    primary key (id)
)engine=innodb;
insert into unite values(1,'Ar');
insert into unite values(2,'Francs');
create table article
(
    id varchar(10),
    idimage varchar(10),
    nom varchar(30),
    description varchar(200),
    idtype varchar(10),
    idsexe varchar(10),
    prixunitaire double,
    idunite int,
    actif int,
    primary key (id),
    foreign key (idtype) references type (id),
     foreign key (idimage) references image (id),
    foreign key (idimage) references image (id),
    foreign key (idunite) references unite (id),
    foreign key (idsexe) references sexe (id)
)engine=innodb;
insert into article values('ART1','IMG1','acer aspire cori5','corei 5 8go de RAM 15 pouce','TP1','SEX3',8000000,1,1);
insert into article values('ART2','IMG2','lenovo cori5','corei5 portable 4go de RAM  Gamer Ideapad ','TP1','SEX3',7000000,1,1);
insert into article values('ART3','IMG3','WIKO FEVER Anthracite ','Mobile & smartphone Wiko Fever SE Scary Pack Anthracite Smartphone 4G-LTE Dual SIM' ,'TP1','SEX3',450000,1,1);
insert into article values('ART4','IMG4','Robe rouge','pratique en été avec tissu arabienne','TP2','SEX2',40000,1,1);
insert into article values('ART5','IMG5','Chemise bleu','chemise a carreaux hommme mode slim','TP2','SEX1',35000,1,1);
insert into article values('ART6','IMG6','Veste Teddy','veste teddy personnalise mixte','TP2','SEX3',40000,1,1);
insert into article values('ART7','IMG7','montre en argent','bien','TP3','SEX3',50000,1,1);
insert into article values('ART8','IMG8','Bellagio noire','Chaussure de ville pours les hommes Richellieus','TP3','SEX3',60000,1,1);
insert into article values('ART9','IMG9','kaxidy','KAXIDY Sac à Main Femme Cuir Vernis ','TP3','SEX3',20000,1,1);
insert into article values('ART10','IMG10','Machine a laver','Lave linge hublot Listo LF1206 D4','TP4','SEX3',975000,1,1);
insert into article values('ART11','IMG11','Kitchen Aid','KitchenAid K45SSOB 4.5 classique Mixer','TP4','SEX3',200000,1,1);
insert into article values('ART12','IMG12','Refrigerateur americain','Frigo américain Liebherr Sbses 7252-1 Métallisé froid ventilé','TP4','SEX3',950000,1,1);
insert into article values('ART13','IMG13','Cookies bisson','1 Cookies gros éclats double chocolat noir et lait de Bisson','TP5','SEX3',30000,1,1);
insert into article values('ART14','IMG14','Cereal BIO','plat cuisiné bio légumineuses','TP5','SEX3',30000,1,1);
insert into article values('ART15','IMG15','Confiture Passion','Confiture Bio extra au gout serise fraise','TP5','SEX3',30000,1,1);
create table panier
(
    idPseudo varchar(30),
    idArticle varchar(10),
    quantite int,
    foreign key (idArticle) references article (id) 
)engine=innodb;
create table stock
(
    idArticle varchar(10),
    quantite int,
    foreign key (idArticle) references article (id) 
)engine=innodb;
insert into stock values ('ART1',10);
insert into stock values ('ART2',8);
insert into stock values ('ART3',9);
insert into stock values ('ART4',20);
insert into stock values ('ART5',31);
insert into stock values ('ART6',20);
insert into stock values ('ART7',15);
insert into stock values ('ART8',11);
insert into stock values ('ART9',18);
insert into stock values ('ART10',20);
insert into stock values ('ART11',9);
insert into stock values ('ART12',8);
insert into stock values ('ART13',37);
insert into stock values ('ART14',22);
insert into stock values ('ART15',11);
create table menu
(
    nom varchar(20),
    texte varchar(30)
)engine=innodb;
create table contenu
(
    id varchar(20),
    nom varchar(20),
    primary key (id)
)engine=innodb;
create table listecontenu
(
    idcontenu varchar(20),
    nom varchar(20),
    texte varchar(30),
    foreign key (idcontenu) references contenu (id)
)engine=innodb;

