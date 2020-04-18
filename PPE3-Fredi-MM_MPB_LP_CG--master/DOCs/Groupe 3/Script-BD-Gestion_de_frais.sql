#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Clubs
#------------------------------------------------------------

CREATE TABLE Clubs(
        IDClub        Int  Auto_increment  NOT NULL ,
        RaisonSociale Varchar (50) NOT NULL ,
        AdresseClub   Varchar (100) NOT NULL ,
        CPClub        Int NOT NULL ,
        VilleClub     Varchar (100) NOT NULL ,
        TypeOrganisme Varchar (50) NOT NULL
	,CONSTRAINT Clubs_PK PRIMARY KEY (IDClub)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Utilisateurs
#------------------------------------------------------------

CREATE TABLE Utilisateurs(
        IDUser     Int  Auto_increment  NOT NULL ,
        NomUser    Varchar (50) NOT NULL ,
        PrenomUser Varchar (50) NOT NULL ,
        MailUser   Varchar (50) NOT NULL ,
        Statut     Varchar (50) NOT NULL ,
        UserType   Varchar (50) NOT NULL ,
        IDClub     Int NOT NULL
	,CONSTRAINT Utilisateurs_PK PRIMARY KEY (IDUser)

	,CONSTRAINT Utilisateurs_Clubs_FK FOREIGN KEY (IDClub) REFERENCES Clubs(IDClub)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Adhérents
#------------------------------------------------------------

CREATE TABLE Adherents(
        IDUser             Int NOT NULL ,
        NumLicence         Int NOT NULL ,
        Sexe               Varchar (50) NOT NULL ,
        DateNaissance      Date NOT NULL ,
        AdresseAdherent    Varchar (100) NOT NULL ,
        CPAdherent         Int NOT NULL ,
        VilleAdherent      Varchar (50) NOT NULL ,
        FraisDeplacement   Float NOT NULL ,
        ResponsableFiscale Bool NOT NULL ,
        NomResponsable     Varchar (50) ,
        PrenomResponsable  Varchar (50) ,
        NomUser            Varchar (50) NOT NULL ,
        PrenomUser         Varchar (50) NOT NULL ,
        MailUser           Varchar (50) NOT NULL ,
        Statut             Varchar (50) NOT NULL ,
        UserType           Varchar (50) NOT NULL ,
        IDClub             Int NOT NULL
	,CONSTRAINT Adherents_PK PRIMARY KEY (IDUser)

	,CONSTRAINT Adherents_Utilisateurs_FK FOREIGN KEY (IDUser) REFERENCES Utilisateurs(IDUser)
	,CONSTRAINT Adherents_Clubs0_FK FOREIGN KEY (IDClub) REFERENCES Clubs(IDClub)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Administrateurs
#------------------------------------------------------------

CREATE TABLE Administrateurs(
        IDUser     Int NOT NULL ,
        NomUser    Varchar (50) NOT NULL ,
        PrenomUser Varchar (50) NOT NULL ,
        MailUser   Varchar (50) NOT NULL ,
        Statut     Varchar (50) NOT NULL ,
        UserType   Varchar (50) NOT NULL ,
        IDClub     Int NOT NULL
	,CONSTRAINT Administrateurs_PK PRIMARY KEY (IDUser)

	,CONSTRAINT Administrateurs_Utilisateurs_FK FOREIGN KEY (IDUser) REFERENCES Utilisateurs(IDUser)
	,CONSTRAINT Administrateurs_Clubs0_FK FOREIGN KEY (IDClub) REFERENCES Clubs(IDClub)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Controleurs
#------------------------------------------------------------

CREATE TABLE Controleurs(
        IDUser       Int NOT NULL ,
        MatriculePro Int NOT NULL ,
        NomUser      Varchar (50) NOT NULL ,
        PrenomUser   Varchar (50) NOT NULL ,
        MailUser     Varchar (50) NOT NULL ,
        Statut       Varchar (50) NOT NULL ,
        UserType     Varchar (50) NOT NULL ,
        IDClub       Int NOT NULL
	,CONSTRAINT Controleurs_PK PRIMARY KEY (IDUser)

	,CONSTRAINT Controleurs_Utilisateurs_FK FOREIGN KEY (IDUser) REFERENCES Utilisateurs(IDUser)
	,CONSTRAINT Controleurs_Clubs0_FK FOREIGN KEY (IDClub) REFERENCES Clubs(IDClub)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Periode
#------------------------------------------------------------

CREATE TABLE Periode(
        Annee         Int NOT NULL ,
        StatutPeriode Bool NOT NULL
	,CONSTRAINT Periode_PK PRIMARY KEY (Annee)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MotifDeplacement
#------------------------------------------------------------

CREATE TABLE MotifDeplacement(
        IDMotif   Int  Auto_increment  NOT NULL ,
        LibMotif  Varchar (50) NOT NULL ,
        CoutMotif Decimal NOT NULL
	,CONSTRAINT MotifDeplacement_PK PRIMARY KEY (IDMotif)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Frais
#------------------------------------------------------------

CREATE TABLE Frais(
        IDFrais       Int  Auto_increment  NOT NULL ,
        Trajet        Varchar (50) NOT NULL ,
        KMParcourus   Decimal NOT NULL ,
        FraisParKM    Decimal NOT NULL ,
        TotalDesFrais Decimal NOT NULL ,
        DateFrais     Date NOT NULL ,
        IDMotif       Int NOT NULL
	,CONSTRAINT Frais_PK PRIMARY KEY (IDFrais)

	,CONSTRAINT Frais_MotifDeplacement_FK FOREIGN KEY (IDMotif) REFERENCES MotifDeplacement(IDMotif)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Depenser
#------------------------------------------------------------

CREATE TABLE Depenser(
        IDUser  Int NOT NULL ,
        IDFrais Int NOT NULL ,
        Annee   Int NOT NULL
	,CONSTRAINT Depenser_PK PRIMARY KEY (IDUser,IDFrais,Annee)

	,CONSTRAINT Depenser_Utilisateurs_FK FOREIGN KEY (IDUser) REFERENCES Utilisateurs(IDUser)
	,CONSTRAINT Depenser_Frais0_FK FOREIGN KEY (IDFrais) REFERENCES Frais(IDFrais)
	,CONSTRAINT Depenser_Periode1_FK FOREIGN KEY (Annee) REFERENCES Periode(Annee)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: DepenseParAnnee
#------------------------------------------------------------

CREATE TABLE DepenseParAnnee(
        Annee             Int NOT NULL ,
        IDUser            Int NOT NULL ,
        TotalLigneDeFrais Decimal NOT NULL
	,CONSTRAINT DepenseParAnnee_PK PRIMARY KEY (Annee,IDUser)

	,CONSTRAINT DepenseParAnnee_Periode_FK FOREIGN KEY (Annee) REFERENCES Periode(Annee)
	,CONSTRAINT DepenseParAnnee_Utilisateurs0_FK FOREIGN KEY (IDUser) REFERENCES Utilisateurs(IDUser)
)ENGINE=InnoDB;

